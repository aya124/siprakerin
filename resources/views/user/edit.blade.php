@extends('adminlte::page')

@section('title', 'Edit Siswa')

@section('content_header')
<h1>Edit Siswa</h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>  
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Siswa</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{ route('user.update', $user) }}" method="post">
        @csrf @method('put')
        <div class="box-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" id="name" 
                        placeholder="Masukkan nama siswa" value="{{ old('name', $user->name) }}">
                        @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                        </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">Email</label> 
                        <input type="email" name="email" class="form-control" id="email" 
                        placeholder="Masukkan email siswa" value="{{ old('email', $user->email) }}">
                        @if ($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                </div>
                <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                    <label for="avatar">Avatar</label> 
                    <input type="file" name="avatar" class="form-control-file" id="avatar">
                    @if ($errors->has('avatar'))
                    <span class="help-block">{{ $errors->first('avatar') }}</span>
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
