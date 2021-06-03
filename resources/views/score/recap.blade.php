<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Rekap Data Nilai</title>

        <style>
            table.GeneratedTable {
              width: 100%;
              /* align: center; */
              background-color: #ffffff;
              border-collapse: collapse;
              border-width: 2px;
              /* border-color: #ffcc00; */
              border-style: solid;
              color: #000000;
            }

            table.GeneratedTable td, table.GeneratedTable th {
              border-width: 2px;
              /* border-color: #ffcc00; */
              border-style: solid;
              padding: 3px;
            }

            span.header{
            font: /*normal*/ sans-serif;
            font-size:16pt;
            /* text-align: center; */
            line-height: 100%;
            /* letter-spacing: 0.5px; */
            margin-left: 20px;
            }

            .borderless1{
            border: 0px;
            text-indent: 0px;

            }
            th{
            border: 1px solid black;
            background-color: #dddddd;
            }

            tr{
            border: 1px solid black;
            }

            .address{
            font: /*normal*/ sans-serif;
            font-size:11pt;
            text-align: center;
            /* margin-left: 20px; */
            /* letter-spacing: 0.5px; */
            }
            </style>
    </head>

    <body>
        <header>
            <div width="100%" style="text-align: center">
              <span class="header"><b>SMK NEGERI 2 DEPOK</b></span><br>
              <span class="address">Mrican, Caturtunggal, Depok, Sleman   Telepon (0274) 513515   Faksimile (0274) 546809</span><br>
              <span class="address">Laman: www.smkn2depoksleman.sch.id   Email: smkn2depok@yahoo.com   Kode Pos 55281</span><br>
              <hr style="width: 660px;">
            </div>
            <div width="100%" style="text-align: center">
                <span><b>REKAP DATA NILAI PRAKERIN JURUSAN TEKNIK KOMPUTER DAN JARINGAN</b></span><br>
                <span><b>Periode {{tgl(request()->get('start'))}} – {{tgl(request()->get('end'))}} </b></span>
            </div><br>
            </header>
            <div width="100%" class="container">
            <table class="GeneratedTable">
                <thead>
                <tr>
                    <th style="width: 30px;" rowspan="2">No.</th>
                    <th style="width: 150px;" rowspan="2">Nama Siswa</th>
                    <th style="width: 150px;" rowspan="2">Nama Industri</th>
                    <th colspan="9">Bidang Pekerjaan/Kegiatan</th>
                </tr>
                <tr>
                    <th style="width: 40px;">SisKom</th>
                    <th style="width: 50px;">KomJar</th>
                    <th style="width: 50px;">PemDas</th>
                    <th style="width: 50px;">DDG</th>
                    <th style="width: 50px;">IaaS</th>
                    <th style="width: 50px;">PaaS</th>
                    <th style="width: 50px;">SaaS</th>
                    <th style="width: 50px;">SIoT</th>
                    <th style="width: 50px;">SKJ</th>
                </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach ($data as $d)
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>{{$d->name}}</td>
                        <td>{{$d->industry_name }}</td>
                        <td align="center">{{($d->s1)}}</td>
                        <td align="center">{{($d->s2)}}</td>
                        <td align="center">{{($d->s3)}}</td>
                        <td align="center">{{($d->s4)}}</td>
                        <td align="center">{{($d->s5)}}</td>
                        <td align="center">{{($d->s6)}}</td>
                        <td align="center">{{($d->s7)}}</td>
                        <td align="center">{{($d->s8)}}</td>
                        <td align="center">{{($d->s9)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br/>
            </div><br/><br>
            <div width="100%" class="container">
                <table class="borderless" style="width: 720px;">
                    <tbody>
                        <tr>
                            <td class="borderless" style="width: 280px; height:10px;">&nbsp;</td>
                            <td class="borderless" style="width: 280px; height:10px;">&nbsp;</td>
                            <td class="borderless" style="width: 250px; height:10px;">&nbsp;</td>
                            <td class="borderless" style="width: 250px; height:10px;">&nbsp;</td>
                            <td class="borderless" style="width: 160px; height:10px;">Kepala Program Studi</td></td>
                        </tr><br>
                        <tr>
                            <td class="borderless" style="width: 280px; height:10px;"></td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="borderless" style="width: 280px; height:10px;"></td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="borderless" style="width: 280px; height:10px;"></td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                        </tr>
                        <tr>
                            <td class="borderless" style="width: 280px; height:10px;"></td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                        </tr>
                        <tr class="borderless">
                            <td class="borderless" style="width: 280px; height:10px;">&nbsp;</td>
                            <td class="borderless" style="width: 280px;">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">_____________________</td>
                          </tr>
                          <tr class="borderless">
                            <td class="borderless" style="width: 280px; height:10px;">Keterangan:</td>
                            <td class="borderless" style="width: 280px;">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">NIP. {{$kps['user']->nip}}</td>
                          </tr>
                        <tr>
                            <td class="borderless" style="width: 280px; height:10px;">
                                <ul class="dashed"><li><i> SisKom: Sistem Komputer</i></li></ul>
                                <ul class="dashed"><li><i> KomJar: Komputer dan Jaringan</i></li></ul>
                                <ul class="dashed"><li><i> PemDas: Pemrograman Dasar</i></li></ul>
                                <ul class="dashed"><li><i> DDG: Dasar Desain Grafis</i></li></ul>
                                <ul class="dashed"><li><i> IaaS: Infrastruktur Komputasi Awan</i></li></ul>
                            </td>
                            <td class="borderless"style="width: 280px; height:10px;">
                                <ul class="dashed"><li><i> PaaS: Platform Komputasi Awan</i></li></ul>
                                <ul class="dashed"><li><i> SaaS: Layanan Komputasi Awan</i></li></ul>
                                <ul class="dashed"><li><i> SIoT: Sistem Internet of Things</i></li></ul>
                                <ul class="dashed"><li><i> SKJ: Sistem Keamanan Jaringan</i></li></ul>
                            </td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                            <td class="borderless">&nbsp;</td>
                  </tbody>
                  </table>
              </div>
    </body>
</html>
