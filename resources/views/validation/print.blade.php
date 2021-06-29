<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Surat Pengantar Prakerin</title>
    <style>
        .table-bordered, td{
            border-collapse: collapse;
            border: 1px solid black;
            /* background-color: #a9a9a9; */
            padding: 1px;
            margin: 1px;
            text-indent: 5px;
            font: /*normal*/ sans-serif;
            font-size: 10pt;
            margin-left: 30px;
        }
        .borderless{
            border: 0px;
            text-indent: 0px;
            margin: none;
            font: /*normal*/ sans-serif;
            font-size: 9.5pt;
            margin-left: 30px;
        }
        .borderless1{
            border: 0px;
            text-indent: 0px;

        }
        th{
            border: 1px solid black;
            /* background-color: #dddddd; */
        }
        tr{
            border: 1px solid black;
        }
        .small{
            margin: auto;
            text-indent: 5px;
            line-height: 9pt;
            /* letter-spacing: 2px; */
        }
        .address{
          font: /*normal*/ sans-serif;
          font-size:8.5pt;
          text-align: center;
          /* margin-left: 20px; */
          /* letter-spacing: 0.5px; */
        }
        span.header{
          font: /*normal*/ sans-serif;
          font-size:11pt;
          /* text-align: center; */
          line-height: 120%;
          /* letter-spacing: 0.5px; */
          margin-left: 20px;
        }
        div{
          margin: none;
        }
        hr {
            /* display: block; */
            /* margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto; */
            border-style: inset;
            border-width: 2px;
            /* border-top: 1px solid black */
            margin-left: 30px;
        }
        p{
          font: /*normal*/ sans-serif;
          font-size: 10pt;
          line-height: 120%;
          margin-left: 30px;
        }
    </style>
  </head>

  <body>
  <header>
  <div width="100%" style="text-align: center">

    <img src="{{ ('pictures/png/Coat_of_arms_of_Yogyakarta_640x480.svg.png') }}" width="10%" alt="image" style="border:black; float: center; padding: 5px; padding-left: 50px; margin: -5px;"/>
    <span class="header"><b>PEMERINTAH DAERAH DAERAH ISTIMEWA YOGYAKARTA</b></span><br>
    <span class="header"><b>DINAS PENDIDIKAN, PEMUDA, DAN OLAHRAGA</b></span><br>
    <span class="header"><b>SMK NEGERI 2 DEPOK</b></span><br>
    <span class="address">Mrican, Caturtunggal, Depok, Sleman   Telepon (0274) 513515   Faksimile (0274) 546809</span><br>
    <span class="address">Laman: www.smkn2depoksleman.sch.id   Email: smkn2depok@yahoo.com   Kode Pos 55281</span><br>
    <hr style="width: 660px;">
  </div>
  </header>
  <div width="100%" class="container">
    <table class="borderless" style="width: 725px;">
      <tbody>
        @foreach ($data as $d)
      <tr>
          <td class="borderless"></td>
          <td class="borderless"></td>
          <td class="borderless"></td>
          <td class="borderless">Sleman, {{$now}}</td>
        </tr>
        <tr>
          <td class="borderless">&nbsp;</td>
          <td class="borderless"></td>
          <td class="borderless"></td>
          <td class="borderless"></td>
        </tr>
    	<tr>
          <td class="borderless">Nomor</td>
          <td class="borderless">:</td>
          <td class="borderless"></td>
          <td class="borderless"><b>Kepada</b></td>
    	</tr>
    	<tr>
          <td class="borderless" style="width:64px;">Lampiran</td>
          <td class="borderless" style="width:5px;">:</td>
          <td class="borderless">-</td>
          <td class="borderless"><b>Yth. Direktur {{$d->in_name}}</b></td>
    	</tr>
    	<tr>
          <td class="borderless">Hal</td>
          <td class="borderless">:</td>
          <td class="borderless" style="width:280px;">Permohonan Izin Praktik Kerja Industri /</td>
          <td class="borderless"><b>{{$d->in_address}}</b></td>
    	</tr>
    	<tr>
          <td class="borderless"></td>
          <td class="borderless"></td>
          <td class="borderless">Prakerin untuk tahun {{$currentyear}}</td>
          <td class="borderless"><b>{{$d->in_city}}</b></td>
    	</tr>
      </tbody>
    </table>
	</div><br>

    <div width="100%" class="col-lg-6" style="width: 690px;">
      <p>Dengan hormat,</p>
      <p align="justify">Dalam rangka memenuhi kurikulum Sekolah sebagaimana ditetapkan oleh Kementerian Pendidikan Nasional,
         dengan ini kami mengajukan permohonan Praktik Kerja Industri / Prakerin untuk tahun {{$currentyear}},
         bagi siswa-siswa kami kelas XII SMK Negeri 2 Depok (STM Pembangunan Yogyakarta),
         untuk mendapatkan tambahan kemampuan praktek melalui Program Praktik Kerja Industri / Prakerin di {{$d->in_name}},
         {{$d->in_address}} {{$d->in_city}}.
      </p>
      <p align="justify">Berikut kami sampaikan daftar nama siswa-siswa kami yang mengajukan Praktik Industri :</p>

    <table class="table-bordered" style="width: 690px;">
    	<thead>
    		<tr>
              <td align="center" style="width: 40px;">No.</td>
              <td align="center">Nama</td>
              <td align="center" style="width: 90px;">NIS</td>
              <td align="center" style="width: 140px;">Program Keahlian</td>
    		</tr>
    	</thead>
    	<tbody>
            @php
                $i=0;
            @endphp
            <tr>
                <td align="center">{{++$i}}.</td>
                <td>{{$d->name}}</td>
                <td align="center">{{$d->nis}}</td>
                <td align="center">{{$d->classname}}</td>
    		</tr>
            @endforeach
    	</tbody>
      </table>
    </div>

    <div width="100%" style="width: 690px;">
      <p align="justify">Adapun waktu pelaksanaan Praktik Kerja Industri / Prakerin direncanakan pada : <b>Tgl {{$date1}} s.d {{$date2}}</b>.
         Sehubungan dengan hal itu, kami mohon bantuan Bapak/Ibu agar berkenan menerima siswa-siswa kami tersebut
         sehingga kegiatan dimaksud dapat terlaksana. Surat balasan bisa melalui telepon/faximile No. (0274) 546809,
         atau email: <u>bkk_smkn2depok@yahoo.co.id</u>.
      </p>
      <p align="justify">Demikian hal ini kami sampaikan, besar harapan kami untuk dikabulkannya permohonan ini. Atas perkenan,
      perhatian, dan kerja samanya kami sampaikan terima kasih.</p>
    </div><br><br>
    <div width="100%" class="container">
    <table align="left" class="borderless" style="width: 690px;">
    	<tbody>
          <tr class="borderless">
            <td class="borderless" align="justify" style="width: 220px;">&nbsp;</td>
            <td class="borderless" style="width: 200px;">&nbsp;</td>
            <td class="borderless" align="justify">Kepala SMK Negeri 2 Depok</td>
          </tr>
          <tr class="borderless">
            <td class="borderless" style="width: 220px; height:25px;"></td>
            <td class="borderless" style="width: 200px;"></td>
            <td class="borderless"></td>
          </tr>
          <tr class="borderless">
            <td class="borderless" style="width: 220px; height:25px;"></td>
            <td class="borderless" style="width: 200px;"></td>
            <td class="borderless"></td>
          </tr>
          <tr class="borderless">
            <td class="borderless" style="width: 220px; height:25px;"></td>
            <td class="borderless" style="width: 200px;"></td>
            <td class="borderless"></td>
          </tr>
          <tr class="borderless">
            <td class="borderless"></td>
            <td class="borderless" style="width: 200px;"></td>
            <td class="borderless">{{$kepsek['user']->name}}</td>
          </tr>
          <tr class="borderless">
            <td class="borderless"></td>
            <td class="borderless" style="width: 200px;"></td>
            <td class="borderless">Pembina IV/a</td>
          </tr>
          <tr class="borderless">
            <td class="borderless" align="justify" style="width: 220px;"></td>
            <td class="borderless" style="width: 200px;"></td>
            <td class="borderless" align="justify">NIP. {{$kepsek['teacher']->nip}}</td>
          </tr>
      </tbody>
      </table>
  </div>
  </body>
  <footer>
  </footer>
</html>
