@extends('adminlte::page')

@section('title', 'Edit Profil Industri')

@section('content_header')
<h1>Edit Profil Industri</h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>  
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Profil Industri</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{ route('industry.update', $industry) }}" method="post">
        @csrf @method('put')
        <div class="box-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" 
                        placeholder="Masukkan nama industri" value="{{ old('name', $industry->name) }}">
                        @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                        </div>
                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address">Alamat</label> 
                        <input type="text" name="address" class="form-control" id="address" 
                        placeholder="Masukkan alamat industri" value="{{ old('address', $industry->address) }}">
                        @if ($errors->has('address'))
                        <span class="help-block">{{ $errors->first('address') }}</span>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                    <label for="city">Kota</label>
                    <input type="text" name="city" class="form-control" id="city" 
                    placeholder="Masukkan kota industri" value="{{ old('city', $industry->city) }}">
                    @if ($errors->has('city'))
                    <span class="help-block">{{ $errors->first('city') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" 
                    placeholder="Masukkan no telepon industri" value="{{ old('phone', $industry->phone) }}">
                    @if ($errors->has('phone'))
                    <span class="help-block">{{ $errors->first('phone') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                    <label for="detail">Detail</label>
                    <input type="text" name="detail" class="form-control" id="detail" 
                    placeholder="Masukkan detail industri" value="{{ old('detail', $industry->detail) }}">
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
