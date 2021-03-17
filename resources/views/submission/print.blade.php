<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">
  
  <title>Form Pengajuan Praktik Industri</title>
  <style>
    .table-bordered,
    td {
      border-collapse: collapse;
      border: 1px solid black;
      padding: 1px;
      margin: 1px;
      text-indent: 5px;
    }
    
    .borderless {
      border: 0px;
      text-indent: 0px;
      margin: none;
    }
    
    .borderless1 {
      border: 0px;
      text-indent: 0px;
      margin: 40px;
    }
    
    th {
      border: 1px solid black;
      background-color: #dddddd;
    }
    
    tr {
      border: 1px solid black;
    }
    
    ul {
      margin: 0;
      list-style-type: none;
    }
    
    ul.dashed>li {
      text-indent: -17px;
    }
    
    ul.dashed>li:before {
      content: "-";
      margin-right: 17px;
    }
    
    p.small {
      line-height: 0.3;
    }
    
  </style>
</head>

<body>
  <div class="col-lg-6">
    <table align="center" class="table-bordered" style="width: 705px;">
      <tbody>
        <tr>
          <td align="center" rowspan="2">SMK NEGERI 2 DEPOK</td>
          <td>No. Dokumen</td>
          <td>F/41/WKS4/1</td>
        </tr>
        <tr>
          <td>Revisi Ke</td>
          <td>2</td>
        </tr>
        <tr>
          <td align="center" rowspan="3">
            <b>FORMULIR PENGAJUAN PERMOHONAN<br>PRAKTIK INDUSTRI</b>
          </td>
          <td>Tanggal Berlaku</td>
          <td>01 Juli 2014</td>
        </tr>
        <tr>
          <td>Halaman</td>
          <td>1/1</td>
        </tr>
        <tr>
          <td>Nama File</td>
          <td>Form-WKS4</td>
        </tr>
      </tbody>
    </table>
  </div><br>
  <div class="col-lg-6">
    {{-- @for ($i = 0; $i <= count($data) - 1; $i++)
      --}}
      <p>Kepada<br>Yth. Bapak Kepala Sekolah<br>SMK N 2 Depok Sleman</p><br>
      <p class="small">Bersama surat ini kami mohon untuk diterbitkan Surat Permohonan Praktik Kerja Industri
        pada:</p>
        <table class="borderless">
          <tr class="borderless">
            <td class="borderless">Nama Perusahaan</td>
            <td class="borderless"> :</td>
            <td class="borderless"><strong>{{ $data[0]->industry_name }}</strong></td>
          </tr>
          <tr class="borderless">
            <td class="borderless">&nbsp;</td>
          </tr>
          <tr class="borderless">
            <td class="borderless">Alamat Perusahaan</td>
            <td class="borderless"> :</td>
            <td class="borderless"><strong>{{ $data[0]->address }}</strong> </td>
          </tr>
          <tr class="borderless">
            <td class="borderless">&nbsp;</td>
          </tr>
        </table>
      </div>
      <p class="small">Adapun nama siswa-siswa/kelompok yang kami ajukan adalah sebagai berikut:</p>
      <div class="container">
        <table class="table-bordered" style="width: 705px;">
          <thead>
            <tr>
              <td align="center" style="width: 40px;">No.</td>
              <td align="center">Nama</td>
              <td align="center" style="width: 100px;">NIS</td>
              <td align="center" style="width: 140px;">Kelas</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td align="center">1</td>
              <td align="center">{{ $user->name }}</td>
              <td align="center">...</td>
              <td align="center">...</td>
            </tr>
          </tbody>
        </table>
      </div>
      <p>Waktu pelaksanaan Praktik Industri adalah tanggal {{ $date1 }} sampai tanggal {{ $date2 }}.</p>
      <p class="small">Demikian permohonan dari kami atas perhatiannya diucapkan terima kasih.</p>
      
      <div class="container">
        <table align="left" class="borderless1" style="width: 720px;">
          <tbody>
            <tr class="borderless">
              <td class="borderless"></td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless" align="justify" style="width: 240px;height: 5%">Sleman, {{ $now }} </td>
            </tr>
            <tr class="borderless">
              <td class="borderless" align="justify" style="width: 240px;">Kaur Prakerin</td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless" align="justify">Ketua Program Studi</td>
            </tr>
            <tr class="borderless">
              <td class="borderless" style="width: 240px; height:25px;"></td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless"></td>
            </tr>
            <tr class="borderless">
              <td class="borderless" style="width: 240px; height:25px;"></td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless"></td>
            </tr>
            <tr class="borderless">
              <td class="borderless" style="width: 240px; height:25px;"></td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless"></td>
            </tr>
            <tr class="borderless">
              <td class="borderless" align="justify"><u>{{$kaur['user']->name}}</u></td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless">..................................</td>
            </tr>
            <tr class="borderless">
              <td class="borderless" align="justify" style="width: 240px;">NIP. {{$kaur['teacher']->nip}} </td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless" align="justify"></td>
            </tr>
            <tr class="borderless">
              <td class="borderless"></td>
              <td class="borderless" align="center" style="width: 200px;">Mengetahui</td>
              <td class="borderless"></td>
            </tr>
            <tr class="borderless">
              <td class="borderless" align="justify">Wakil Kepala Sekolah IV</td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless" align="justify">Wakil Kepala Sekolah I</td>
            </tr>
            <tr class="borderless">
              <td class="borderless" style="width: 240px; height:25px;"></td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless"></td>
            </tr>
            <tr class="borderless">
              <td class="borderless" style="width: 240px; height:25px;"></td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless"></td>
            </tr>
            <tr class="borderless">
              <td class="borderless" style="width: 240px; height:25px;"></td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless"></td>
            </tr>
            <tr class="borderless">
              <td class="borderless" align="justify"><u>{{$wks4['user']->name}}</u></td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless" align="justify"><u>{{$wks1['user']->name}}</u></td>
            </tr>
            <tr class="borderless">
              <td class="borderless" align="justify">NIP. {{$wks4['teacher']->nip}}</td>
              <td class="borderless" style="width: 200px;"></td>
              <td class="borderless" align="justify" style="width: 240px;">NIP. {{$wks1['teacher']->nip}}</td>
            </tr>
          </tbody>
        </table>
        
      </div>
      <div class="container">
        <span class="" style="font-size:80%"><i>Dibuat rangkap 2 (dua):</i></span>
        <ul class="dashed">
          <li style="font-size:80%"><i> 1 lb untuk arsip KPS</i></li>
          <li style="font-size:80%"><i> 1 lb untuk arsip WKS 4</i></li>
        </ul>
      </div>
    </body>
    </html>