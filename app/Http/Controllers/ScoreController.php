<?php

namespace App\Http\Controllers;

use App\Score;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class ScoreController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth'); // filter kondisi apakah sudah auth/login atau belum
    //Param string / array
    //$this->middleware('guest')->only(['index', 'create']); //hanya untuk user 'guest'
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
                ->leftjoin('scores as sc', 'sc.id', '=', 's.score_id')
                ->join('industries as i', 'i.id', '=', 's.industry_id')
                ->join('users as u', 'u.username', '=', 's.username')
                ->join('statuses as st', 'st.id', '=', 's.status_id');
            $data->select(
                's.id',
                'sc.score_1',
                'sc.score_2',
                'sc.score_3',
                'sc.score_4',
                'sc.score_5',
                'sc.score_6',
                'sc.score_7',
                'sc.score_8',
                'sc.score_9',
                'sc.score_a',
                'sc.score_b',
                'sc.score_c',
                'sc.score_d',
                'sc.score_e',
                DB::raw('st.name as status_name')
            );
            if (auth()->user()->hasRole('siswa')) {
                $data->selectRaw('i.name as industry_name');
                $data->where('s.username', auth()->user()->username);
            } else {
                $data->selectRaw('u.name as student_name, i.name as industry_name');
            }

            return datatables()->of($data->get())
                ->addColumn('action', function ($data) {
                    if($data->status_name == 'Menunggu persetujuan') {
                        $button = '';
                        return $button;
                    }
                    if($data->status_name == 'Pengajuan ditolak') {
                        $button = '';
                         $button = 'Pengajuan ditolak';
                        return $button;
                    }
                    if(Auth::user()->hasRole('siswa')) {
                        $button = '';
                        $button .= '<a href= "score/print/'.$data->id.'"
                        target="_blank" type="button" name="print"
                        class="btn btn-default btn-sm">
                        <i class="fas fa-print"></i> Cetak Nilai</a>';
                    return $button;
                    }
                    else {
                        $button = '';
                        $button = '<button class="btn btn-default btn-sm edit" data-id="' . $data->id . '">
                        <i class="fas fa-file"></i> Ubah nilai</button>';
                        $button .= '<a href= "score/print/'.$data->id.'"
                        target="_blank" type="button" name="print"
                        class="btn btn-default btn-sm">
                        <i class="fas fa-print"></i> Cetak Nilai</a>';
                        return $button;
                    }
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('score.index');
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
            'score_1' => 'required|numeric|between:0,100',
            'score_2' => 'required|numeric|between:0,100',
            'score_3' => 'required|numeric|between:0,100',
            'score_4' => 'required|numeric|between:0,100',
            'score_5' => 'required|numeric|between:0,100',
            'score_6' => 'required|numeric|between:0,100',
            'score_7' => 'required|numeric|between:0,100',
            'score_8' => 'required|numeric|between:0,100',
            'score_9' => 'required|numeric|between:0,100',
            'score_a' => 'required',
            'score_b' => 'required',
            'score_c' => 'required',
            'score_d' => 'required',
            'score_e' => 'required',
            'submission_id' => 'required',
        ]);

        $submission = Submission::find($request->submission_id);
        if ($submission->score_id) {
            $score = Score::find($submission->score_id);
            $score->score_1 = $request->score_1;
            $score->score_2 = $request->score_2;
            $score->score_3 = $request->score_3;
            $score->score_4 = $request->score_4;
            $score->score_5 = $request->score_5;
            $score->score_6 = $request->score_6;
            $score->score_7 = $request->score_7;
            $score->score_8 = $request->score_8;
            $score->score_9 = $request->score_9;
            $score->score_a = $request->score_a;
            $score->score_b = $request->score_b;
            $score->score_c = $request->score_c;
            $score->score_d = $request->score_d;
            $score->score_c = $request->score_e;
            $score->save();
        } else {
            $score = Score::create([
                'score_1' => $request->score_1,
                'score_2' => $request->score_2,
                'score_3' => $request->score_3,
                'score_4' => $request->score_4,
                'score_5' => $request->score_5,
                'score_6' => $request->score_6,
                'score_7' => $request->score_7,
                'score_8' => $request->score_8,
                'score_9' => $request->score_9,
                'score_a' => $request->score_a,
                'score_b' => $request->score_b,
                'score_c' => $request->score_c,
                'score_d' => $request->score_d,
                'score_e' => $request->score_e,
            ]);
            $submission->score_id = $score->id;
            $submission->save();
        }

        return response()->json(['success' => 'Nilai berhasil diperbarui.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('score.progress');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit($submission_id)
    {
        $data = DB::table('submissions as s')
            ->leftjoin('scores as sc', 'sc.id', '=', 's.score_id')
            ->join('industries as i', 'i.id', '=', 's.industry_id')
            ->join('users as u', 'u.username', '=', 's.username');
        $data->select(
            's.id',
            'sc.score_1',
            'sc.score_2',
            'sc.score_3',
            'sc.score_4',
            'sc.score_5',
            'sc.score_6',
            'sc.score_7',
            'sc.score_8',
            'sc.score_9',
            'sc.score_a',
            'sc.score_b',
            'sc.score_c',
            'sc.score_d',
            'sc.score_e',
        );
        $data->where('s.id', $submission_id);

        return response()->json(['data' => $data->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    public function details_pdf($id)
    {
        $data = DB::table('submissions as s')
                    ->join('users as u','u.username','=', 's.username')
                    ->join('industries as i','i.id','=','s.industry_id')
                    ->join('scores as sc','sc.id','=','s.score_id')
                    ->select(
                        'u.name as name',
                        'i.name as industry_name',
                        'sc.score_1 as s1',
                        'sc.score_2 as s2',
                        'sc.score_3 as s3',
                        'sc.score_4 as s4',
                        'sc.score_5 as s5',
                        'sc.score_6 as s6',
                        'sc.score_7 as s7',
                        'sc.score_8 as s8',
                        'sc.score_9 as s9',
                        'sc.score_a as sa',
                        'sc.score_b as sb',
                        'sc.score_c as sc',
                        'sc.score_d as sd',
                        'sc.score_e as se',
                        )
                        ->get();

        $kps = ['user' => userByRole(7)];
        $pdf = PDF::loadview('score.print', compact('data', 'kps'))
        ->setPaper('legal', 'portrait');
        return $pdf->stream('nilai.pdf');
    }

    public function recap_pdf(Request $request)
    {
        $data = Submission::whereBetween('submissions.created_at', [$request->start, $request->end])
                    ->join('users','users.username','submissions.username')
                    ->join('industries','industries.id','=','submissions.industry_id')
                    ->join('scores','scores.id','=','submissions.score_id')
                    ->select(
                        'users.name as name',
                        'industries.name as industry_name',
                        'scores.score_1 as s1',
                        'scores.score_2 as s2',
                        'scores.score_3 as s3',
                        'scores.score_4 as s4',
                        'scores.score_5 as s5',
                        'scores.score_6 as s6',
                        'scores.score_7 as s7',
                        'scores.score_8 as s8',
                        'scores.score_9 as s9',
                        'scores.score_a as sa',
                        'scores.score_b as sb',
                        'scores.score_c as sc',
                        'scores.score_d as sd',
                        'scores.score_e as se'
                        )
                        ->get();

        $kps = ['user' => userByRole(7)];
        $pdf = PDF::loadview('score.recap', compact('data', 'kps'))
        ->setPaper('legal', 'landscape');
        return $pdf->stream('rekap-nilai.pdf');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }
}
