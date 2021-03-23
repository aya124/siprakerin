<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Teacher;
use Illuminate\Http\Request;
//use DB;

class TeacherController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Teacher::latest()->get())
                    ->addColumn('action', function($data){

                        $button= '<button type="button"
                        name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button"
                        name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus</button>';
                        return $button;

                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        //$teachers = Teacher::all();
        return view('teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        try {
            $data = $request->all();
            Teacher::create($data);
            return response()->json(['success' => 'Data guru berhasil ditambah.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Gagal menambahkan data guru.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        // $data = DB::table('teachers as t')
        // ->select('i.name')
        // ->get();
        return view ('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
        $data = Teacher::findOrFail($id);
            return response()->json(compact('data'));
        }
        // $teacher = Teacher::findOrFail($id);
        // return view ('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request)
    {
        $data = $request->all();
        $teacher = Teacher::findOrFail($request->hidden_id);
        $teacher->update($data);
        return response()->json(['success' => 'Data guru berhasil diperbarui.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return response()->json(['success' => 'Data guru berhasil dihapus.']);

    }
}
