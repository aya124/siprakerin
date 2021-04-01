<?php

namespace App\Http\Controllers;

use App\Student;
use App\StudentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(request()->ajax())
        {
            return datatables()->of(StudentClass::latest()->get())
                    ->addColumn('action', function($data){
                        $button= '<button type="button"
                        name="edit" url="'.route('class.update',$data->id).'" nama="'.$data->name.'" accro="'.$data->accro.'" class="edit btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" url="'.route("class.destroy",$data->id).'" class="delete btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('class.index');
    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->all();
            StudentClass::create($data);
            return response()->json(['success' => 'Kelas berhasil ditambah.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => ['input' =>'Gagal menambah data.'],500]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $class = StudentClass::findOrFail($id);
        $class-> update($data);
        return response()->json(['success' => 'Data berhasil diperbarui.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = StudentClass::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data berhasil dihapus.']);

    }

}
