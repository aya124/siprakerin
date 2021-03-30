<?php

namespace App\Http\Controllers;

use App\Score;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
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
                ->join('users as u', 'u.username', '=', 's.username');
            $data->select(
                's.id',
                'sc.score_1',
                'sc.score_2',
                'sc.score_3',
                'sc.score_4',
                'sc.score_5',
                'sc.score_6',
            );
            if (auth()->user()->hasRole('siswa')) {
                $data->selectRaw('i.name as industry_name');
                $data->where('s.username', auth()->user()->username);
            } else {
                $data->selectRaw('u.name as student_name, i.name as industry_name');
            }

            return datatables()->of($data->get())
                ->addColumn('action', function ($data) {
                    $html = '';
                    $html .= '<button class="btn btn-default btn-sm edit" data-id="' . $data->id . '">
                    <i class="fas fa-file"></i> Update nilai</button>';
                    return $html;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('score.index');
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
            'score_1' => 'required|numeric|between:0,100',
            'score_2' => 'required|numeric|between:0,100',
            'score_3' => 'required|numeric|between:0,100',
            'score_4' => 'required|numeric|between:0,100',
            'score_5' => 'required|numeric|between:0,100',
            'score_6' => 'required|numeric|between:0,100',
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
            $score->save();
        } else {
            $score = Score::create([
                'score_1' => $request->score_1,
                'score_2' => $request->score_2,
                'score_3' => $request->score_3,
                'score_4' => $request->score_4,
                'score_5' => $request->score_5,
                'score_6' => $request->score_6,
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
    public function show(Score $score)
    {
        //
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
