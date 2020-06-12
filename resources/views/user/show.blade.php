@extends('adminlte::page')

@section('title', 'Lihat Siswa')

@section('content_header')
<h1>Detail {{$user->name}}</h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>    
@endif

<div class="col-md-6">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Data Siswa</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table">
          <tbody>
            <tr>
              <td style="font-weight:800; width:40%">Nama</td>
              <td>{{$user->name}}</td>
            </tr>
            <tr>
              <td style="font-weight:800; width:40%">E-mail</td>
              <td>{{$user->email}}</td>
            </tr>
          </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
