@extends('adminlte::page')

@section('title', 'Edit Guru')

@section('content_header')
<h1>Edit Guru</h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>  
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Guru</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{ route('teacher.update', $teacher) }}" method="post">
        @csrf @method('put')
        <div class="box-body">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name">Guru</label>
                        <input type="text" name="name" class="form-control" id="name" 
                        placeholder="Masukkan nama guru" value="{{ old('name', $teacher->name) }}">
                        @if ($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
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
