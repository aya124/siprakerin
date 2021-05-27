@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p><h4> Selamat Datang di SIPRAKERIN!</h4></p>

    <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Petunjuk Penggunaan SIPRAKERIN</span>
            <span class="description">by Admin</span>
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
          <img class="img-responsive pad" src="../dist/img/photo2.png" alt="Photo">

          <p>I took this photo this morning. What do you guys think?</p>
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
@stop

