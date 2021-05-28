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
          DB::raw('st.name as status_name'),
          'sub.submit_type'
        )
        ->where('sub.status_id', 1)
        ->get();

      return datatables()->of($data)
        ->addColumn('action', function ($data) {
          $button = '<button type="button"
          name="lihatinfo" url="'.route('info.show',$data->id).'" class="lihatinfo btn btn-info btn-sm">
          <i class="fa fa-eye"></i> Lihat Info</button>';
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
          } elseif ($data->status_name == 'Menunggu persetujuan') {
            $button = '';
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
 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('validation.progress');

    }

    public function byYear()
    {
        return Submission::join('industry')->where('status_id',1,7,8)->get();
    if (request()->ajax()) {
      $user = Auth::user();
      $data = DB::table('submissions as sub')
        ->join('users as u', 'u.username', '=', 'sub.username')
        ->join('industries as i', 'i.id', '=', 'sub.industry_id')
        ->join('statuses as st', 'st.id', '=', 'sub.status_id')
        ->join('years as y', 'y.id', '=', 'sub.year_id')
        ->select(
          'sub.id',
          DB::raw('u.name as username'),
          'i.name',
          'sub.start_date',
          'sub.finish_date',
          DB::raw('st.name as status_name'),
          'sub.submit_type'
        )
        ->where('sub.status_id', 1, 7, 8)
        ->get();

      return datatables()->of($data)
        ->addColumn('correspondence', function ($data) {
          if ($data->status_name == 'Pengajuan disetujui') {
            $button = '<span class="pengantar label label-danger">
                  Surat Pengantar belum diunggah</span>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<span class="balasan label label-danger">
                  Surat Balasan belum diunggah</span>';
          } elseif ($data->status_name == 'Menunggu persetujuan') {
            $button = '';
          } elseif ($data->status_name == 'Surat dari Industri belum diunggah') {
            $button = '<a href="setuju/lihat1/' . $data->id . '"
                  target="_blank" type="button" name="lihat" class="btn btn-default btn-sm">
                  <i class="fas fa-file-image"></i> Lihat Surat Pengantar</a>';
            $button .= '&nbsp;&nbsp;';
            $button .= '<span class="balasan label label-danger">
                  Surat Balasan belum diunggah</span>';
          } elseif ($data->status_name == 'Pengajuan ditolak') {
            $button = '<a href= "validation/print/' . $data->id . '"
            target="_blank" type="button" name="print"
            class="btn btn-default btn-sm">
            <i class="fas fa-print"></i> Cetak Surat Pengantar</a>';
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
        $year = DB::table('years')
            ->select('year', 'id')
            ->get();
        return view('validation.year', compact('year'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
          DB::raw('st.name as status_name'),
          'sub.submit_type'
        )
        ->whereIn('sub.status_id', [4, 6, 7])
        ->get();

      return datatables()->of($data)
        ->addColumn('action', function ($data) {
        $button = '<button type="button"
        name="lihatinfo" url="'.route('info.show',$data->id).'" class="lihatinfo btn btn-info btn-sm">
        <i class="fa fa-eye"></i> Lihat Info</button>';
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
            $button .= '<span class="balasan label label-danger">Surat Balasan belum diunggah</span>';
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
        ->rawColumns(['action','correspondence'])
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
          DB::raw('st.name as status_name'),
          'sub.submit_type'
        )
        ->where('sub.status_id', 8)
        ->get();

      return datatables()->of($data)
        ->addColumn('action', function ($data) {
        $button = '<button type="button"
        name="lihatinfo" url="'.route('info.show',$data->id).'" class="lihatinfo btn btn-info btn-sm">
        <i class="fa fa-eye"></i> Lihat Info</button>';
            return $button;
        })
        ->addColumn('correspondence', function ($data) {
           if ($data->status_name == 'Pengajuan ditolak') {
            $button = '<a href= "validation/print/' . $data->id . '"
            target="_blank" type="button" name="print"
            class="btn btn-default btn-sm">
            <i class="fas fa-print"></i> Cetak Surat Pengantar</a>';
           }
          return $button;
        })
        ->rawColumns(['action', 'correspondence'])
        ->make(true);
    }
  }

  public function pengantar_pdf($id)
  {
    $user = Auth::user();
    $now = tgl(date('Y-m-d'));
    $currentyear = date('Y');

    $data = DB::table('submissions as sub')
      ->join('users as u', 'u.username', '=', 'sub.username')
      ->join('industries as i', 'i.id', '=', 'sub.industry_id')
      ->leftjoin('students as s', 's.id', '=', 'u.username')
      ->leftjoin('student_classes as c','c.id','=','s.class_id')
      ->select(
        'u.name as name',
        'i.name as in_name',
        'i.address as in_address',
        'i.city as in_city',
        's.nis as nis',
        'c.name as classname',
        'sub.start_date',
        'sub.finish_date'
      )
      // ->where('sub.username',$user->id)
      ->where('sub.id', $id)
      ->get();
    // dd($data);

    $x = 0;
    $y = 0;

    for ($i = 0; $i <= count($data) - 1; $i++) {
      $x = date('Y-m-d', strtotime($data[$i]->start_date));
      $y = date('Y-m-d', strtotime($data[$i]->finish_date));
    }
    $date1 = tgl($x);
    $date2 = tgl($y);
    $kepsek = ['user' => userByRole(6),'teacher'=> nip(19)];
    // dd(date('m-d',strtotime($data[$i]->start_date)));

    $pdf = PDF::loadview('validation.print', compact('data', 'date1', 'date2', 'now', 'currentyear', 'kepsek'))
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
        exit('Berkas yang diminta tidak ada di server!');
      }
    } else {
      exit('Invalid Request');
    }
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
        exit('Berkas yang diminta tidak ada di server!');
      }
    } else {
      exit('Invalid Request');
    }
  }

  public function recap_pdf(Request $request)
  {
    $data = Submission::whereBetween('submissions.created_at', [$request->start, $request->end])
                ->join('users','users.username','submissions.username')
                ->join('industries','industries.id','submissions.industry_id')
                ->join('statuses','statuses.id','submissions.status_id')
                ->select(
                    'users.name as name',
                    'industries.name as industry_name',
                    'submissions.start_date',
                    'submissions.finish_date',
                    'submissions.submit_type',
                    'statuses.name as status'
                    )
                    ->get();

    $kps = ['user' => userByRole(7)];
    $pdf = PDF::loadview('validation.recap', compact('data', 'kps'))
      ->setPaper('legal', 'landscape');
    return $pdf->stream('rekap-pengajuan.pdf');
  }
}
