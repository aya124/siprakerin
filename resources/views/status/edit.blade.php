@extends('adminlte::page')

@section('title', 'Edit Status')

@section('content_header')
<h1>Edit Status</h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>  
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{ route('status.update', $statuses) }}" method="post">
        @csrf @method('put')
        <div class="box-body">
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" id="status" 
                        placeholder="Masukkan status" value="{{ old('detail', $statuses->detail) }}">
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
