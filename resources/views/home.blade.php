@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!-- <p><h4> Selamat Datang di SIPRAKERIN!</h4></p> -->
    
    <p><h4>Petunjuk Penggunaan SIPrakerin</h4></p>
    <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Fitur Data Industri</span>
            <!-- <span class="description">by Admin</span> -->
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <p>Sebelum anda menggunakan fitur-fitur SIPrakerin, pastikan anda telah membaca dan memahami seluruh petunjuk di bawah ini.
        Sebagai siswa, terdapat 4 fitur yang bisa anda akses. Diantaranya, Data Industri, Pengajuan Prakerin, Laporan dan Sertifikat
        serta Nilai.</p>
          <!-- <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo"> -->
          <p>Pada fitur ini, anda dapat memilih industri mana yang akan menjadi tempat anda dalam melaksanakan praktik kerja industri. 
          Pastikan anda telah menghubungi pihak industri bahwa mereka menerima siswa praktik kerja industri. 
          Perhatikan contoh di bawah ini.</p>
          </p>Pilih industri yang anda inginkan.</p>
          <!-- <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo"> -->
          <p>Jika data industri yang ada pilih tidak muncul, anda dapat menambah data industri sesuai dengan informasi yang anda ketahui.
          Kemudian tunggu persetujuan dari Admin supaya data tersebut dapat anda pilih pada fitur Pengajuan Prakerin</p>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
@stop

