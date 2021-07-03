<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndustryRequest;
use App\Industry;
use App\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndustryController extends Controller
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
    // index: untuk menampilkan seluruh resource
    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of(Industry::latest()->get())
                ->addColumn('action', function($data){
                    if(Auth::user()->hasRole(['admin', 'kps'])) {
                        $button = '<button type="button"
                        id="'.$data->id.'"
                        class="detail btn btn-info btn-sm">
                        <i class="fa fa-info-circle"></i> Detail</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button"
                        id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                        <i class="fa fa-edit"></i> Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button"
                        id="'.$data->id.'" class="delete btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Hapus</button>';
                        $button .= '&nbsp;&nbsp;';
                        if ($data->check == 1){
                        $button .= '<button type="button"
                        url="'.route('suggestion.show',$data->id).'"
                        class="lihatsaran btn btn-warning btn-sm">
                        <i class="fa fa-eye"></i> Lihat Saran</button>';
                        $button .= '&nbsp;&nbsp;';
                        }
                        return $button;
                      }else {
                        $button = '<button type="button"
                        id="'.$data->id.'" class="detail btn btn-success
                        btn-sm"><i class="fa fa-info-circle"></i> Detail</button>';
                        $button .= '&nbsp;&nbsp;';
                        if($data->status!='disetujui'){
                            $button .= '<button type="button"
                            id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                            <i class="fa fa-edit"></i> Edit</button>';
                            $button .= '&nbsp;&nbsp;';
                        }
                        else {
                            $button .= '<button type="button"
                            id="'.$data->id.'" class="saran btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Saran</button>';
                            $button .= '&nbsp;&nbsp;';
                        if ($data->check == 1) {
                            $button .= '<button type="button"
                            url="'.route('suggestion.show',$data->id).'"
                            class="lihatsaran btn btn-info btn-sm">
                            <i class="fa fa-eye"></i> Lihat Saran</button>';
                            $button .= '&nbsp;&nbsp;';
                            }
                        }
                        return $button;
                      }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('industry.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndustryRequest $request)
    {
        try {
            $data = $request->all();
            $data['status'] = $request->status ?: 'Belum disetujui';
            $data['user_id'] = Auth::user()->id;
            Industry::create($data);
            return response()->json(['success' => 'Data industri berhasil ditambah.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => ['input' => 'Gagal menambah data industri.']],500);
        }
    }

    public function addSuggestion(Request $request)
    {
        $data = $request->all();
        return DB::transaction(function () Use($data, $request){
            $data['user_id']= Auth::user()->id;
            Suggestion::create($data);
            $a = Industry::findOrFail($request->industry_id);
            $a->check = true;
            $a->save();
            return response()->json('success', 200);
        });
    }
    private function deleteSuggestion($idIndustry)
    {
        try {
            Suggestion::where('industry_id', $idIndustry)->delete();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function showSuggestion($id)
    {
        $data = Suggestion::with('user')->where('industry_id', $id)->get();
        return view('industry.saran',compact('data'));
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
        $data = Industry::findOrFail($id);
        return response()->json(compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IndustryRequest $request)
    {
        $data = $request->all();
        $industry = Industry::findOrFail($request->hidden_id);
        $industry->update($data);
        return response()->json(['success' => 'Data industri berhasil diperbarui.']);
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $industry = Industry::findOrFail($id);
        $this->deleteSuggestion($id);
        $industry->delete();
        return response()->json(['success' => 'Data industri berhasil dihapus.']);
    }

}
