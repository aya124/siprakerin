<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmissionRequest;
use App\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Industry;
use App\SubmissionDetail;
use Illuminate\Support\Facades\Storage;
use PDF;
use App\User;
use App\Year;
use App\AddConfig;
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
            ->select('sub.id','i.name','sub.start_date','sub.finish_date','sub.submit_type',
            DB::raw('st.name as status_name'))
            ->where('sub.username',$user->username)
            ->get();

            return datatables()->of($data)
                ->addColumn('action', function($data){

                if($data->status_name == 'Menunggu persetujuan'){
                    $button= '<button type="button" name="edit"
                    id="'.$data->id.'" class="edit btn btn-primary btn-sm">
                    <i class="fa fa-edit"></i> Edit</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete"
                    id="'.$data->id.'" class="delete btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i> Hapus</button>';
                }elseif ($data->status_name == 'Pengajuan disetujui') {
                    $button = '<button type="button"
                    id="'.$data->id.'" class="upload btn btn-default btn-sm">
                    <i class="fas fa-upload"></i> Upload Surat Pengantar</button>';
                    $button .= '&nbsp;&nbsp;';
                }elseif ($data->status_name == 'Pengajuan ditolak') {
                    $button = '';
                }else{
                    $button = '<button type="button"
                    id="'.$data->id.'" class="upload btn btn-default btn-sm">
                    <i class="fas fa-upload"></i> Upload Surat Pengantar</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button"
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
            ->where('status','disetujui')
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
        //
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmissionRequest $request)
    {
        $check = Submission::where('username',Auth::user()->username)->count();
        DB::transaction(function ()use($request, $check) {
            $data = $request->all();
            $data ['industry_id'] = $request->name;
            $data ['start_date'] = $request->startdate;
            $data ['finish_date'] = $request->finishdate;
            $data ['username'] = Auth::user()->username;
            $data ['status_id'] = $request->status ?: '1';
            $data ['year_id'] = Year::where('active',1)->first()->id;
            $data ['submit_type'] = ($check>0)?2:1;
            $submission = Submission::create($data);

            $u = User::find(Auth::user()->id);
            $u->submit_lock = 1;
            $u->save();
        });
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
    public function update(SubmissionRequest $request)
    {
        $data = $request->all();
        $data['industry_id'] = $request->name;
        // $data['username'] = Auth::user()->id;
        $submission = Submission::findOrFail($request->hidden_id);
        $submission->update($data);
        return response()->json(['success' => 'Pengajuan berhasil diperbarui.']);
    }

    public function uploadprocess(SubmissionRequest $request)
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
        $user = Auth::user();
        $now = tgl(date('Y-m-d'));

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

        $wks1 = ['user' => userByRole(5),'teacher'=> nip(20)];
        $wks4 = ['user' => userByRole(11),'teacher'=> nip(21)];
        $kaur = ['user' => userByRole(21),'teacher'=> nip(22)];

        // dd($date1,$date2,$now);
        $pdf = PDF::loadview('submission.print',compact('data','date1','date2','now','user','wks1','wks4','kaur'))
        ->setPaper('legal', 'portrait');
        // $pdf->render();
        return $pdf->stream('form-pengajuan.pdf');
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
