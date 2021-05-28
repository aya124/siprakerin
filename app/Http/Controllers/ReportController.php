<?php

namespace App\Http\Controllers;

use App\Certificate;
use App\Industry;
use App\Report;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = DB::table('submissions as s')
                ->join('industries as i', 'i.id', '=', 's.industry_id')
                ->join('users as u', 'u.username', '=', 's.username')
                ->join('statuses as st', 'st.id', '=', 's.status_id');
            $data->select('s.*');
            if (auth()->user()->hasRole('siswa')) {
                $data->selectRaw('i.name as industry_name');
                $data->where('s.username', auth()->user()->username);
            } else {
                $data->selectRaw('u.name as student_name, i.name as industry_name');
            }

            return datatables()->of($data->get())
                ->addColumn('action', function ($data) {
                    $html = '';
                    if (!empty($data->report_id)) {
                        $report = Report::findOrFail($data->report_id);
                        $html .= '<a href= "/report/' . $report->id . '"
                    target="_blank" class="btn btn-default btn-sm">
                    <i class="fas fa-download"></i> Unduh Laporan</a>';
                    }
                    if (auth()->user()->hasRole('siswa')) {
                        $html .= '<button name="report" class="btn btn-default btn-sm edit" data-id="' . $data->id . '">
                    <i class="fas fa-upload"></i> Unggah Laporan</button>';
                    }
                    if ($data->status_id == 8) {
                        $html = 'Pengajuan ditolak';
                    }
                    return $html ?: 'Laporan belum diupload';
                })
                ->addColumn('action2', function ($data) {
                    $html = '';
                    if (!empty($data->certif_id)) {
                        $report = Certificate::findOrFail($data->certif_id);
                        $html .= '<a href= "/report2/' . $report->id . '"
                    target="_blank" class="btn btn-default btn-sm">
                    <i class="fas fa-download"></i> Unduh Sertifikat</a>';
                    }
                    if (auth()->user()->hasRole('siswa')) {
                        $html .= '<button name="report2" class="btn btn-default btn-sm editCertif" data-id="' . $data->id . '">
                    <i class="fas fa-upload"></i> Unggah Sertifikat</button>';
                    }
                    if ($data->status_id == 8) {
                        $html = 'Pengajuan ditolak';
                    }
                    return $html ?: 'Sertifikat belum diupload';
                })
                ->rawColumns(['action','action2'])
                ->make(true);
        }

        return view('report.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'submission_id' => 'required|sometimes',
            'report' => 'required|file|mimes:doc,docx,pdf|max:512|sometimes',
            'report2' => 'required|file|mimes:jpeg,jpg,png,pdf|max:512|sometimes'
        ]);

        $original_name = $request->report->getClientOriginalName();
        $saved_name = 'file_laporan' . date('Ymd') . '_' . str_pad(Report::all()->count() + 1, 4, '0', STR_PAD_LEFT).'.'.$request->report->extension();
        $path = $request->report->storeAs('reports', $saved_name);

        $original_name = $request->report2->getClientOriginalName();
        $saved_name = 'file_sertifikat' . date('Ymd') . '_' . str_pad(Report::all()->count() + 1, 4, '0', STR_PAD_LEFT).'.'.$request->report2->extension();
        $path = $request->report2->storeAs('reports', $saved_name);

        $report = Report::create([
            'original_name' => $original_name,
            'saved_name' => $saved_name,
            'user_id' => auth()->user()->id
        ]);

        $certif = Certificate::create([
            'original_name' => $original_name,
            'saved_name' => $saved_name,
            'user_id' => auth()->user()->id
        ]);

        $submission = Submission::find($request->submission_id);
        $submission->report_id = $report->id;
        $submission->certif_id = $certif->id;
        $submission->save();

        return response()->json(['success' => 'Berkas berhasil diunggah.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return Storage::download('reports/'.$report->saved_name, $report->original_name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    public function progress()
    {
        return view('report.progress');
    }

    public function recap_pdf(Request $request)
    {
        $data = Submission::whereBetween('submissions.created_at', [$request->start, $request->end])
                    ->join('users','users.username','submissions.username')
                    ->join('industries','industries.id','=','submissions.industry_id')
                    ->join('reports','reports.id','=','submissions.report_id')
                    ->join('certificates','certificates.id','=','submissions.certif_id')
                    ->select(
                        'users.name as name',
                        'industries.name as industry_name',
                        'reports.created_at as up_time1',
                        'certificates.created_at as up_time2'
                        )
                        ->get();

        $kps = ['user' => userByRole(7)];
        $pdf = PDF::loadview('report.recap', compact('data', 'kps'))
        ->setPaper('legal', 'landscape');
        return $pdf->stream('rekap-laporan.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
