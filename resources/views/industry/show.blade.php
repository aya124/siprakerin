@extends('adminlte::page')

@section('title', 'Lihat Industri')

@section('content_header')
<h1>Detail {{$data[0]->name}}</h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>    
@endif

<div class="col-md-6">
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Daftar Industri</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table class="table">
          <tbody>
            <tr>
              <td style="font-weight:800; width:40%">Nama</td>
              <td>{{$data[0]->name}}</td>
            </tr>
            <tr>
              <td style="font-weight:800; width:40%">Alamat</td>
              <td>{{$data[0]->address}}</td>
            </tr>
            <tr>
                <td style="font-weight:800; width:40%">Kota</td>
                <td>{{$data[0]->city}}</td>
            </tr>
            <tr>
                <td style="font-weight:800; width:40%">Phone</td>
                <td>{{$data[0]->phone}}</td>
            </tr>
            <tr>
                <td style="font-weight:800; width:40%">Detail</td>
                <td>{{$data[0]->detail}}</td>
            </tr>
            <tr>
              <td style="font-weight:800; width:40%">Added by</td>
              <td>{{$data[0]->username}}</td>
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
