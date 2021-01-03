@extends('adminlte::page')

@section('title', 'Tambah Siswa')

@section('content_header')
<h1>Tambah Siswa</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Siswa</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="box-body">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" 
                placeholder="Masukkan nama siswa" value="{{ old('name') }}">
                @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
                </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Email</label> 
                <input type="email" name="email" class="form-control" id="email" 
                placeholder="Masukkan email siswa" value="{{ old('email') }}">
                @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" 
                placeholder="Masukkan password siswa">
                @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<!-- /.box-body -->
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

</script>
@stop
