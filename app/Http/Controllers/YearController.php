<?php

namespace App\Http\Controllers;

use App\Submission;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class YearController extends Controller
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
            return datatables()->of(Year::latest()->get())
                    ->addColumn('action', function($data){
                        $button= '<button type="button"
                        name="edit" id="'.$data->id.'" tahun="'.$data->year.'" class="edit btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit</button>';
                        if($data->active != 1){
                            $button .= '&nbsp;&nbsp;';
                            $button .= '<button type="button" url="'.route("year.isactive",$data->id).'" 
                            class="isactive btn btn-info btn-sm">
                            <i class="fa fa-check"></i> Active</button>';
                            if(YearSubmission($data->id)){
                                $button .= '&nbsp;&nbsp;';
                                $button .= '<button type="button" url="'.route("year.destroy",$data->id).'" 
                                class="delete btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> Hapus</button>';
                            }
                        }
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('submission.year');
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
            Year::create($data);
            return response()->json(['success' => 'Tahun berhasil ditambah.']);
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
        $year = Year::findOrFail($request->hidden_id);
        $year-> update($data);
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
        $data = Year::findOrFail($id);
        $data->delete();
        return response()->json(['success' => 'Data berhasil dihapus.']);

    }

    public function isActive($id)
    {
        DB::transaction(function () use($id) {
            $before = Year::where('active', 1)->first();
            $before->active = 0;
            $before->save();

            $year = Year::findOrFail($id);
            $year->active = 1;
            $year->save();
        });
    }
}
