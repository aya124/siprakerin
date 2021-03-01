<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Submission;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Industry;
use App\SubmissionDetail;
use Illuminate\Support\Facades\Storage;
use PDF;
use File;

class ValidationController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth'); // filter kondisi apakah sudah auth/login atau belum
    //Param string / array
    //$this->middleware('guest')->only(['index', 'create']); //hanya untuk user 'guest'
  }

  public function index()
  {
    $user = Auth::user();
    if (request()->ajax()) {
      $user = Auth::user();
      $data = DB::table('submissions as sub')
        ->join('users as u', 'u.username', '=', 'sub.username')
        ->join('industries as i', 'i.id', '=', 'sub.industry_id')
        ->join('statuses as st', 'st.id', '=', 'sub.status_id')
        ->select(
          'sub.id',
          DB::raw('u.name as username'),
          'i.name',
          'sub.start_date',
          'sub.finish_date',
          DB::raw('st.name as status_name')
        )
        ->where('sub.status_id', 1)
        ->get();

      return datatables()->of($data)
        ->addColumn('action', function ($data) {
          $button = '<button type="button" name="setuju" 
          id="' . $data->id . '" class="setuju btn btn-success btn-sm">
          <i class="fa fa-thumbs-up"></i> Setuju</button>';
          $button .= '&nbsp;&nbsp;';
          $button .= '<button type="button" name="tolak" 
          id="' . $data->id . '" class="tolak btn btn-danger btn-sm">
          <i class="fa fa-thumbs-down"></i> Tolak</button>';
          return $button;
        })
        ->addColumn('correspondence', function ($data) {
          if ($data->status_name == 'Pengajuan disetujui') {
            $button = '<span class="pengantar label label-danger">
                  Surat Pengantar belum diunggah</span>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<span class="balasan label label-danger">
                  Surat Balasan belum diunggah</span>';
          } elseif ($data->status_name == 'Surat dari Industri belum diunggah') {

            $button = '<a href="setuju/lihat1/' . $data->id . '" 
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Pengantar</a>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<span class="balasan label label-danger">
                  Surat Balasan belum diunggah</span>';
          } else {

            $button = '<a href="setuju/lihat1/' . $data->id . '"
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Pengantar</a>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<a href="setuju/lihat2/' . $data->id . '"
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Balasan</a>';
          }
          $button .= '&nbsp;&nbsp;';
          $button .= '<a href= "validation/print/' . $data->id . '" 
                target="_blank" type="button" name="print" 
                class="btn btn-default btn-sm">
                <i class="fas fa-print"></i> Cetak Surat Pengantar</a>';
          return $button;
        })
        ->rawColumns(['action', 'correspondence'])
        ->make(true);
    }

    return view('validation.index');
  }


  public function update($id) //setuju
  {
    $approve = Submission::findOrFail($id);
    $approve->update([
      'status_id' => 4
    ]);
    return response()->json(['success' => 'Pengajuan telah disetujui.']);
  }

  public function decline($id) //tolak
  {
    $decline = Submission::findOrFail($id);
    $decline->update([
      'status_id' => 8
    ]);
    return response()->json(['success' => 'Pengajuan telah ditolak.']);
  }

  public function tabsetuju()
  {
    $user = Auth::user();
    if (request()->ajax()) {
      $user = Auth::user();
      $data = DB::table('submissions as sub')
        ->join('users as u', 'u.username', '=', 'sub.username')
        ->join('industries as i', 'i.id', '=', 'sub.industry_id')
        ->join('statuses as st', 'st.id', '=', 'sub.status_id')
        ->select(
          'sub.id',
          DB::raw('u.name as user_name'),
          'i.name',
          'sub.start_date',
          'sub.finish_date',
          DB::raw('st.name as status_name')
        )
        ->whereIn('sub.status_id', [4, 6, 7])
        ->get();

      return datatables()->of($data)
        ->addColumn('correspondence', function ($data) {
          if ($data->status_name == 'Pengajuan disetujui') {
            $button = '<span class="pengantar label label-danger">
                  Surat Pengantar belum diunggah</span>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<span class="balasan label label-danger">
                  Surat Balasan belum diunggah</span>';
          } elseif ($data->status_name == 'Surat dari Industri belum diunggah') {

            $button = '<a href="setuju/lihat1/' . $data->id . '" 
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Pengantar</a>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<span class="balasan label label-danger">
                  Surat Balasan belum diunggah</span>';
          } else {

            $button = '<a href="setuju/lihat1/' . $data->id . '"
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Pengantar</a>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<a href="setuju/lihat2/' . $data->id . '"
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Balasan</a>';
          }
          $button .= '&nbsp;&nbsp;';
          $button .= '<a href= "validation/print/' . $data->id . '" 
                target="_blank" type="button" name="print" 
                class="btn btn-default btn-sm">
                <i class="fas fa-print"></i> Cetak Surat Pengantar</a>';
          return $button;
        })
        ->rawColumns(['correspondence'])
        ->make(true);
    }
  }

  public function tabtolak()
  {
    $user = Auth::user();
    if (request()->ajax()) {
      $user = Auth::user();
      $data = DB::table('submissions as sub')
        ->join('users as u', 'u.username', '=', 'sub.username')
        ->join('industries as i', 'i.id', '=', 'sub.industry_id')
        ->join('statuses as st', 'st.id', '=', 'sub.status_id')
        ->select(
          'sub.id',
          DB::raw('u.name as user_name'),
          'i.name',
          'sub.start_date',
          'sub.finish_date',
          DB::raw('st.name as status_name')
        )
        ->where('sub.status_id', 8)
        ->get();

      return datatables()->of($data)
        ->addColumn('correspondence', function ($data) {
          if ($data->status_name == 'Pengajuan disetujui') {
            $button = '<span class="pengantar label label-danger">
                  Surat Pengantar belum diunggah</span>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<span class="balasan label label-danger">
                  Surat Balasan belum diunggah</span>';
          } elseif ($data->status_name == 'Surat dari Industri belum diunggah') {

            $button = '<a href="setuju/lihat1/' . $data->id . '" 
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Pengantar</a>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<span class="balasan label label-danger">
                  Surat Balasan belum diunggah</span>';
          } else {

            $button = '<a href="setuju/lihat1/' . $data->id . '"
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Pengantar</a>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<a href="setuju/lihat2/' . $data->id . '"
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Balasan</a>';
          }
          $button .= '&nbsp;&nbsp;';
          $button .= '<a href= "validation/print/' . $data->id . '" 
                target="_blank" type="button" name="print" 
                class="btn btn-default btn-sm">
                <i class="fas fa-print"></i> Cetak Surat Pengantar</a>';
          return $button;
        })
        ->rawColumns(['correspondence'])
        ->make(true);
    }
  }

  public function pengantar_pdf($id)
  {
    // $x = date('Y-m-d',strtotime($request->startdate));
    // $y = date('Y-m-d',strtotime($request->finishdate));
    function tgl($tanggal)
    {
      $bulan = array(
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
      return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    $user = Auth::user();
    $now = tgl(date('Y-m-d'));
    $currentyear = date('Y');

    $data = DB::table('submissions as sub')
      ->join('users as u', 'u.username', '=', 'sub.username')
      ->join('industries as i', 'i.id', '=', 'sub.industry_id')
      ->leftjoin('students as s', 's.username', '=', 'u.username')
      // ->join('statuses as st', 'st.id', '=', 'sub.status_id')
      ->select(
        'u.name',
        'i.address',
        'i.city',
        's.class',
        'sub.start_date',
        'sub.finish_date',
        DB::raw('i.name as industry_name')
      )
      // ->where('sub.username',$user->id)
      ->where('sub.id', $id)
      ->get();
    // dd($data);

    $x = 0;
    // $xx = 0;
    $y = 0;


    for ($i = 0; $i <= count($data) - 1; $i++) {
      $x = date('Y-m-d', strtotime($data[$i]->start_date));
      // $xx = date('m-d',strtotime($data[$i]->start_date));
      $y = date('Y-m-d', strtotime($data[$i]->finish_date));
    }
    $date1 = tgl($x);
    $date2 = tgl($y);
    // dd(date('m-d',strtotime($data[$i]->start_date)));

    $pdf = PDF::loadview('validation.print', compact('data', 'date1', 'date2', 'now', 'currentyear'))
      ->setPaper('legal', 'portrait');
    return $pdf->stream('surat-pengantar.pdf');
  }

  public function getFile1($id)
  {
    $user = Auth::user();
    $data = DB::table('submissions as sub')
      ->join('users as u', 'u.username', '=', 'sub.username')
      ->join('submission_details as sd', 'sd.submission_id', '=', 'sub.id')
      ->where('sub.id', $id)
      ->where('sd.upload_type', 'suratpengantar')
      ->value('sd.name');
    // dd($data);
    // ->get();

    if ($data) {
      // $file = asset(public_path().'/files_upload/'.$user->name.'/'.$data);
      //adi_surat_pengantar.jpeg
      //base_path().'/public/'.$user->name.'+'_surat_pengantar';
      // $file = base_path().'/public/files_upload/'.$user->name.'/'.$data;
      $file1 = base_path() . '/public/images/suratpengantar/' . $data;
      if (file_exists($file1)) {
        $ext = File::extension($file1);

        if ($ext == 'pdf') {
          $content_types = 'application/pdf';
        } elseif ($ext == 'doc') {
          $content_types = 'application/msword';
        } elseif ($ext == 'docx') {
          $content_types = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        } elseif ($ext == 'xls') {
          $content_types = 'application/vnd.ms-excel';
        } elseif ($ext == 'xlsx') {
          $content_types = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        } elseif ($ext == 'txt') {
          $content_types = 'application/octet-stream';
        } elseif ($ext == 'jpg') {
          $content_types = 'image/jpeg';
        } elseif ($ext == 'jpeg') {
          $content_types = 'image/jpeg';
        } elseif ($ext == 'png') {
          $content_types = 'image/png';
        }
        return response(file_get_contents($file1), 200)
          ->header('Content-Type', $content_types);
      } else {
        exit('Requested file does not exist on our server!');
      }
    } else {
      exit('Invalid Request');
    }
    // dd($data,$departement->id,$file,$filea);
  }

  public function getFile2($id)
  {
    $user = Auth::user();
    $data = DB::table('submissions as sub')
      ->join('users as u', 'u.username', '=', 'sub.username')
      ->join('submission_details as sd', 'sd.submission_id', '=', 'sub.id')
      ->where('sub.id', $id)
      ->where('sd.upload_type', 'suratbalasan')
      ->value('sd.name');
    // dd($data);
    // ->get();

    if ($data) {
      // $file = asset(public_path().'/files_upload/'.$user->name.'/'.$data);
      //adi_surat_pengantar.jpeg
      //base_path().'/public/'.$user->name.'+'_surat_pengantar';
      // $file = base_path().'/public/files_upload/'.$user->name.'/'.$data;
      $file2 = base_path() . '/public/images/suratbalasan/' . $data;
      if (file_exists($file2)) {
        $ext = File::extension($file2);

        if ($ext == 'pdf') {
          $content_types = 'application/pdf';
        } elseif ($ext == 'doc') {
          $content_types = 'application/msword';
        } elseif ($ext == 'docx') {
          $content_types = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
        } elseif ($ext == 'xls') {
          $content_types = 'application/vnd.ms-excel';
        } elseif ($ext == 'xlsx') {
          $content_types = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
        } elseif ($ext == 'txt') {
          $content_types = 'application/octet-stream';
        } elseif ($ext == 'jpg') {
          $content_types = 'image/jpeg';
        } elseif ($ext == 'jpeg') {
          $content_types = 'image/jpeg';
        } elseif ($ext == 'png') {
          $content_types = 'image/png';
        }
        return response(file_get_contents($file2), 200)->header('Content-Type', $content_types);
      } else {
        exit('Requested file does not exist on our server!');
      }
    } else {
      exit('Invalid Request');
    }
    // dd($data,$departement->id,$file,$filea);
  }
}
