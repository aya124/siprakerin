<?php

namespace App\Http\Controllers;

use App\Industry;
use App\Report;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            $data = Report::select('*');
            if (auth()->user()->hasRole('siswa')) {
                $data->where('user_id', auth()->user()->id);
            }
            $data = DB::table('submissions as s')
                ->join('industries as i', 'i.id', '=', 's.industry_id')
                ->join('users as u', 'u.username', '=', 's.username');
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
                    <i class="fas fa-file"></i> Lihat laporan</a>';
                    }
                    if (auth()->user()->hasRole('siswa')) {
                        $html .= '<button class="btn btn-default btn-sm edit" data-id="' . $data->id . '">
                    <i class="fas fa-file"></i> Upload/ganti laporan</button>';
                    }
                    return $html;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('report.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'submission_id' => 'required',
            'report' => 'required|file|mimes:doc,docx,pdf'
        ]);

        $original_name = $request->report->getClientOriginalName();
        $saved_name = 'file_' . date('Ymd') . '_' . str_pad(Report::all()->count() + 1, 4, '0', STR_PAD_LEFT).'.'.$request->report->extension();
        $path = $request->report->storeAs('reports', $saved_name);

        $report = Report::create([
            'original_name' => $original_name, 
            'saved_name' => $saved_name,
            'user_id' => auth()->user()->id
        ]);

        $submission = Submission::find($request->submission_id);
        $submission->report_id = $report->id;
        $submission->save();

        return response()->json(['success' => 'Laportan berhasil diunggah.']);
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
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
