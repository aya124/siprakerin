<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Rekap Data Pengajuan</title>

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
                <span><b>REKAP DATA PENGAJUAN PRAKERIN JURUSAN TEKNIK KOMPUTER DAN JARINGAN</b></span><br>
                <span><b>Periode {{tgl(request()->get('start'))}} – {{tgl(request()->get('end'))}} </b></span>
            </div><br>
            </header>
            <div width="100%" class="container">
            <table class="GeneratedTable">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    <th>Nama Industri</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Pengajuan</th>
                    <th>Status</th>
                    <th>Surat Pengantar</th>
                    <th>Surat Balasan</th>
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
                        <td>{{tgl($d->start_date)}}</td>
                        <td>{{tgl($d->finish_date)}}</td>
                        <td>@if($d->submit_type == 1) Utama @else Alternatif @endif </td>
                        <td>{{$d->status}}</td>
                        <td>
                            @if ($d->status == 'Pengajuan disetujui' || $d->status == 'Menunggu persetujuan' || $d->status == 'Pengajuan ditolak')
                            Belum diunggah
                            @else
                            Sudah diunggah
                            @endif
                        </td>
                        <td>
                            @if($d->status == 'Pengajuan disetujui' || $d->status == 'Menunggu persetujuan' || $d->status == 'Surat dari Industri belum diunggah' || $d->status == 'Pengajuan ditolak')
                                Belum diunggah
                            @else
                                Sudah diunggah
                            @endif

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br/>
            </div><br/><br/>
            <div width="100%" class="container">
                <table align="right" class="borderless" style="width: 690px;">
                    <tbody>

                      <tr class="borderless">
                        <td class="borderless" align="justify" style="width: 220px;">&nbsp;</td>
                        <td class="borderless" style="width: 200px;">&nbsp;</td>
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
                        <td class="borderless">{{$kps['user']->name}}</td>
                      </tr>
                      {{-- <tr class="borderless">
                        <td class="borderless"></td>
                        <td class="borderless" style="width: 200px;"></td>
                        <td class="borderless">Pembina IV/a</td>
                      </tr> --}}
                      <tr class="borderless">
                        <td class="borderless" align="justify" style="width: 220px;"></td>
                        <td class="borderless" style="width: 200px;"></td>
                        <td class="borderless" align="justify">NIP. {{$kps['user']->nip}}</td>
                      </tr>
                  </tbody>
                  </table>
              </div>
    </body>
</html>
