@extends('adminlte::page')

@section('title', 'Tambah Pengajuan')

@section('content_header')
<h1>Tambah Pengajuan</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Pengajuan</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{ route('submission.store') }}" method="post">
        @csrf
        <div class="box-body">
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                <label for="date">Tanggal</label>
                <input type="date" name="date class="form-control" id="date" 
                placeholder="Masukkan tanggal" value="{{ old('date') }}">
                @if ($errors->has('date'))
                <span class="help-block">{{ $errors->first('date') }}</span>
                @endif
                </div>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username">Added by</label>
                    <input type="text" name="username" class="form-control" id="username" 
                    placeholder="Masukkan username" value="{{ old('username') }}">
                    @if ($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
            </div>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                <label for="address">Alamat</label> 
                <input type="text" name="address" class="form-control" id="address" 
                placeholder="Masukkan alamat industri" value="{{ old('address') }}">
                @if ($errors->has('address'))
                <span class="help-block">{{ $errors->first('address') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                <label for="city">Kota</label>
                <input type="text" name="city" class="form-control" id="city" 
                placeholder="Masukkan kota industri" value="{{ old('city') }}">
                @if ($errors->has('city'))
                <span class="help-block">{{ $errors->first('city') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                <label for="province">Provinsi</label>
                <input type="text" name="province" class="form-control" id="province" 
                placeholder="Masukkan nama provinsi" value="{{ old('province') }}">
                @if ($errors->has('province'))
                <span class="help-block">{{ $errors->first('province') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" 
                placeholder="Masukkan no telepon industri" value="{{ old('phone') }}">
                @if ($errors->has('phone'))
                <span class="help-block">{{ $errors->first('phone') }}</span>
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
