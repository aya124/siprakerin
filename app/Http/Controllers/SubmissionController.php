<?php

namespace App\Http\Controllers;

use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Industry;
use App\SubmissionDetail;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\Team;

class SubmissionController extends Controller

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
        $user = Auth::user();
        if(request()->ajax())
        {
            $user = Auth::user();
            $data = DB::table('submissions as sub')
            ->join('industries as i', 'i.id', '=', 'sub.industry_id')
            ->join('statuses as st', 'st.id', '=', 'sub.status_id')
            ->select('sub.id','i.name','sub.start_date','sub.finish_date', 
            DB::raw('st.name as status_name'))
            ->where('sub.username',$user->username)
            ->get();

            return datatables()->of($data)
                ->addColumn('action', function($data){

                    // switch ($data) {
                    //     case 'wait':
                    //         if($data->status_name == '1')
                    //         $button= '<button type="button" name="edit" 
                    //         id="'.$data->id.'" class="edit btn btn-info btn-sm">
                    //         <i class="fa fa-edit"></i> Edit</button>';
                    //         $button .= '&nbsp;&nbsp;';
                    //         $button .= '<button type="button" name="delete" 
                    //         id="'.$data->id.'" class="delete btn btn-danger btn-sm">
                    //         <i class="fa fa-trash"></i> Hapus</button>';
                    //         return $button;
                    //         break;
                        
                    //     case 'suratpengantar':
                    //         # code...
                    //         break;

                    //     case 'suratindustri':
                    //         # code...
                    //         break;

                    //     default:
                    //     # code...
                    //     break;
                    // }
                    
                if($data->status_name == 'Menunggu persetujuan'){
                    $button= '<button type="button" name="edit" 
                    id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i> Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" 
                    id="'.$data->id.'" class="delete btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Hapus</button>';
                    // return $button;

                }elseif ($data->status_name == 'Pengajuan disetujui') {
                
                    $button = '<button type="button" name="upload" 
                    id="'.$data->id.'" class="upload btn btn-default btn-sm">
                    <i class="fas fa-upload"></i> Upload Surat Pengantar</button>';
                    $button .= '&nbsp;&nbsp;';
                    // $button .= '<button type="button" name="upload2" 
                    // id="'.$data->id.'" class="upload2 btn btn-default btn-sm disabled">
                    // <i class="fas fa-upload"></i> Upload Surat Balasan</button>';
                    // return $button;
                }else{
                    $button = '<button type="button" name="upload" 
                    id="'.$data->id.'" class="upload btn btn-default btn-sm">
                    <i class="fas fa-upload"></i> Upload Surat Pengantar</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="upload2" 
                    id="'.$data->id.'" class="upload2 btn btn-default btn-sm">
                    <i class="fas fa-upload"></i> Upload Surat Balasan</button>';
                }
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href= "submission/print/'.$data->id.'" 
                    target="_blank" type="button" name="print" 
                    class="btn btn-default btn-sm">
                    <i class="fas fa-print"></i> Cetak Form Pengajuan</a>';
                    return $button;
  
                })

            //menampilkan format tanggal d-m-Y
            ->editColumn('start_date',function($data){
                    $start = date('d-m-Y',strtotime($data->start_date));
                    $hasil = '<span>'.$start.'</span>';
                    return $hasil;
            })
            ->editColumn('finish_date',function($data){
                    $start = date('d-m-Y',strtotime($data->finish_date));
                    $hasil = '<span>'.$start.'</span>';
                    return $hasil;
            })

            ->rawColumns(['action','start_date','finish_date'])
            ->make(true);
        }
        $industry = DB::table('industries')
            ->select('name', 'id')
            ->get();
       
        return view('submission.index', compact('industry'));
        // $submissions = Submission::all();
        // return view('submission.index', compact('submissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('submission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request-> validate([
            'name' => ['required'],
            'startdate' => ['required', 'date'],
            'finishdate' => ['required', 'date', 'after:startdate'],
        ], [
            'required' => 'Kolom :attribute tidak boleh kosong!',
            'after' => 'Tanggal selesai tidak boleh sebelum tanggal mulai!'
        ]);

        $submission = Submission::create([
            'industry_id' => $request->name,
            'start_date' => $request->startdate,
            'finish_date' => $request->finishdate,
            'username' => $user->username,
            'status_id' => 1
        ]);
        // dd($request->all());
        return response()->json(['success' => 'Pengajuan berhasil diperbarui.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax()){
            // $data = Submission::findOrFail($id);
            $data = DB::table('submissions')
            ->select('industry_id','start_date','finish_date','id')
            ->where('id',$id)
            ->get();
            return response()->json(compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request-> validate([
            'name' => ['required'],
            'startdate' => ['required', 'date'],
            'finishdate' => ['required', 'date', 'after:startdate'],
        ], [
            'required' => 'Kolom :attribute tidak boleh kosong',
            'after' => 'Tanggal selesai tidak boleh sebelum tanggal mulai!'
        ]);

        $user = Auth::user();
        $data = Submission::findOrFail($request->hidden_id);
        $data->update([
            'industry_id' => $request->name,
            'start_date' => $request->startdate,
            'finish_date' => $request->finishdate,
        ]);
        return response()->json(['success' => 'Pengajuan berhasil diperbarui.']);
    }

    public function uploadprocess(Request $request)
    {
        $user = Auth::user();
        if (request()->ajax()){

        $data = DB::table('submissions as sub')
        ->join('statuses as st', 'st.id', '=', 'sub.status_id')
        // ->select(DB::raw('st.name as status_name'))
        ->whereIn('sub.status_id',[4,6,7])
        ->get();
        $upload_dest = public_path().'/images';
        $loc1 = $upload_dest.'/suratpengantar/';
        $loc2 = $upload_dest.'/suratbalasan/';
        
        // dd($request->all(),$upload_dest);
        $this->validate($request,  [
            'upload' => 'required|mimes:jpeg,jpg,png,pdf|max:512'
        ],[
            'required' => 'Kolom :attribute tidak boleh kosong',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('upload');
        $namaasli = $file->getClientOriginalName();
        $fileext = $file->getClientOriginalExtension();
        // $gantinama = $namaasli.$submission->username.$fileext;

        if ($request->hidden_name == 'suratpengantar'){
            $detail = SubmissionDetail::create([
                'name' => $file->getClientOriginalName(),
                'upload_type' => 'suratpengantar',
                'full_path' => $loc1,
                'submission_id' =>$request->hidden_id
            ]);
            $file->move($loc1,$file->getClientOriginalName());
            $data = Submission::findOrFail($request->hidden_id);
            $data->update([
                'status_id' => '6'
            ]);
            return response()->json(['success' => 'Surat Pengantar berhasil di-upload.']);
            // $file->move($loc1,$gantinama);
        }else{
            $detail = SubmissionDetail::create([
                'name' => $file->getClientOriginalName(),
                'upload_type' => 'suratbalasan',
                'full_path' => $loc2,
                'submission_id' =>$request->hidden_id
            ]);
            $file->move($loc2,$file->getClientOriginalName());
            $data = Submission::findOrFail($request->hidden_id);
            $data->update([
                'status_id' => '7'
            ]);
            return response()->json(['success' => 'Surat Balasan berhasil di-upload.']);
            }
        }
        
        // // nama file
		// echo 'File Name: '.$file->getClientOriginalName();
		// echo '<br>';
 
      	// // real path
		// echo 'File Real Path: '.$file->getRealPath();
		// echo '<br>';
 
      	// // ukuran file
		// echo 'File Size: '.$file->getSize().' bytes';
        // echo '<br>';
    }

    public function print_pdf($id)
    {
        // $x = date('Y-m-d',strtotime($request->startdate));
        // $y = date('Y-m-d',strtotime($request->finishdate));
        function tgl($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
            // $tg= $pecahkan[2].toString().replace(/^0/g,'');
            return $pecahkan[2]. ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
        $user = Auth::user();
        $now = tgl(date('Y-m-d'));

        // $data = Submission::findOrFail($request->id);
        $data = DB::table('submissions as sub')
            ->join ('users as u', 'u.username', '=', 'sub.username')
            ->join('industries as i', 'i.id', '=', 'sub.industry_id')
            // ->join('statuses as st', 'st.id', '=', 'sub.status_id')
            ->select('u.name','i.address','sub.start_date','sub.finish_date', 
            DB::raw('i.name as industry_name'))
            ->where('sub.username',$user->username)
            ->where('sub.id',$id)
            ->get();

            $x = 0;
            $y = 0;
            
        for ($i=0; $i <=count($data)-1 ; $i++) { 
            $x = date('Y-m-d',strtotime($data[$i]->start_date));
            $y = date('Y-m-d',strtotime($data[$i]->finish_date));
            
        }
        $date1 = tgl($x);
        $date2 = tgl($y);
        // dd($date1,$date2,$now);
        $pdf = PDF::loadview('submission.print',compact('data','date1','date2','now'))
        ->setPaper('legal', 'portrait');
        $pdf->render();
        return $pdf->stream('form-pengajuan.pdf');
        // view('submission.print',compact('data','now'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Submission  $submission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $submission = Submission::findOrFail($id);
        $submission->delete();
        return response()->json(['success' => 'Pengajuan berhasil dihapus.']);
    }
}