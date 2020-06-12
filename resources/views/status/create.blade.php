@extends('adminlte::page')

@section('title', 'Tambah Status')

@section('content_header')
<h1>Tambah Status</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Status</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{ route('status.store') }}" method="post">
        @csrf
        <div class="box-body">
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                <label for="status">Status</label>
                <input type="text" name="status" class="form-control" id="status" 
                placeholder="Masukkan status" value="{{ old('status') }}">
                @if ($errors->has('status'))
                <span class="help-block">{{ $errors->first('status') }}</span>
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
