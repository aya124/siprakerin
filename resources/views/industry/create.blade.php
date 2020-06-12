@extends('adminlte::page')

@section('title', 'Tambah Profil Industri')

@section('content_header')
<h1>Tambah Industri</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Industri</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{ route('industry.store') }}" method="post">
        @csrf
        <div class="box-body">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" id="name" 
                placeholder="Masukkan nama industri" value="{{ old('name') }}">
                @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
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
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" 
                placeholder="Masukkan no telepon industri" value="{{ old('phone') }}">
                @if ($errors->has('phone'))
                <span class="help-block">{{ $errors->first('phone') }}</span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                <label for="detail">Detail</label>
                <input type="text" name="detail" class="form-control" id="detail" 
                placeholder="Masukkan detail industri" value="{{ old('detail') }}">
                @if ($errors->has('detail'))
                <span class="help-block">{{ $errors->first('detail') }}</span>
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
