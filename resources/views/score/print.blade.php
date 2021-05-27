<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Daftar Nilai Praktik Industri</title>

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
                <span><b>DAFTAR NILAI PRAKTIK INDUSTRI</b></span><br>
                {{-- <span><b>Periode {{tgl(request()->get('start'))}} – {{tgl(request()->get('end'))}} </b></span> --}}
            </div><br><br>
            </header>
            <div>
            <table>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td class="borderless">Nama</td>
                        <td class="borderless">:</td>
                        <td class="borderless">{{$d->name}}</td>
                        <td class="borderless"><b></b></td>
                      </tr>
                      <tr>
                        <td class="borderless" style="width:64px;">Nama Industri</td>
                        <td class="borderless" style="width:5px;">:</td>
                        <td class="borderless">{{$d->industry_name}}</td>
                        <td class="borderless"><b></b></td>
                      </tr>
                      @endforeach
                </tbody>
            </table>
            </div><br><br>
            <div width="100%" class="container">
            <table class="GeneratedTable">
                <thead>
                <tr>
                    <th style="width: 30px;">NO.</th>
                    <th>BIDANG PEKERJAAN/KEGIATAN</th>
                    <th style="width: 120px;">NILAI</th>
                    {{-- <th>&nbsp;</th> --}}
                </tr>
                </thead>
                <tbody>
                    @php
                    $i=0;
                    @endphp
                    @foreach ($data as $d)
                    {{-- <tr>
                        <td align="center">A.</td>
                        <td colspan="2">ASPEK TEKNIS</td>
                        {{-- <td align="center">&nbsp;</td> --}}
                    {{-- </tr> --}}
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>Sistem Komputer</td>
                        <td align="center">{{$d->s1}}</td>
                        {{-- <td>{{tgl($d->finish_date)}}</td> --}}
                    </tr>
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>Komputer dan Jaringan</td>
                        <td align="center">{{$d->s2}}</td>
                        {{-- <td>{{tgl($d->finish_date)}}</td> --}}
                    </tr>
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>Pemrograman Dasar</td>
                        <td align="center">{{$d->s3}}</td>
                        {{-- <td>{{tgl($d->finish_date)}}</td> --}}
                    </tr>
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>Dasar Desain Grafis</td>
                        <td align="center">{{$d->s4}}</td>
                        {{-- <td>{{tgl($d->finish_date)}}</td> --}}
                    </tr>
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>Infrastruktur Komputasi Awan (IaaS)</td>
                        <td align="center">{{$d->s5}}</td>
                        {{-- <td>{{tgl($d->finish_date)}}</td> --}}
                    </tr>
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>Platform Komputasi Awan (PaaS)</td>
                        <td align="center">{{$d->s6}}</td>
                        {{-- <td>{{tgl($d->finish_date)}}</td> --}}
                    </tr>
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>Layanan Komputasi Awan (SaaS)</td>
                        <td align="center">{{$d->s7}}</td>
                        {{-- <td>{{tgl($d->finish_date)}}</td> --}}
                    </tr>
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>Sistem Internet of Things (SIoT)</td>
                        <td align="center">{{$d->s8}}</td>
                        {{-- <td>{{tgl($d->finish_date)}}</td> --}}
                    </tr>
                    <tr>
                        <td align="center">{{++$i}}.</td>
                        <td>Sistem Keamanan Jaringan</td>
                        <td align="center">{{$d->s9}}</td>
                        {{-- <td>{{tgl($d->finish_date)}}</td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table><br/>
            </div><br/><br/>
            <div width="100%" class="col-lg-6" style="width: 690px;">
            </div>
            <div width="100%" class="container">
                <table align="right" class="borderless" style="width: 690px;">
                    <tbody>
                      <tr class="borderless">
                        <td class="borderless" align="justify" style="width: 250px;">&nbsp;</td>
                        <td class="borderless" style="width: 250px;">&nbsp;</td>
                        <td class="borderless" align="justify">Kepala Program Studi</td>
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
                        <td class="borderless" align="justify">{{$kps['user']->name}}</td>
                      </tr>
                  </tbody>
                  </table>
              </div>
    </body>
</html>
