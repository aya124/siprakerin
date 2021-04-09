@extends('adminlte::page')

@section('title', 'Data by Year')

@section('content_header')
<h1>Data Berdasarkan Tahun Pengajuan</h1>
{{-- <a id="btn_add" class="btn btn-flat btn-primary">Tambah Tahun</a></h1> --}}
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>
@endif

<div class="box">
    <div class="box-header">
        <label class="control-label">Pilih tahun: </label>
        <form method="post" id="add" class="form-horizontal" enctype="multipart/form-data">
			@csrf
			    <div class="form-group">
					<div class="col-md-2">
							<select class="form-control" id="year" name="year">
                        @foreach ($year as $item)
						<option value="{{$item->id}}">{{$item->year}}</option>
                        @endforeach
							</select>
					</div>
                </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tab_data" class="table table-bordered table-striped" style="width:100%">
        <thead>
          <tr>
            <th>Nama Siswa</th>
            <th>Nama Industri</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Pengajuan</th>
            <th>Status</th>
            <th>Persuratan</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
</div>
<!-- end row -->


  <div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Hapus data</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;" class="set">Apakah anda yakin ingin menghapus data ini?</h4>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="setuju" id="setuju" />
              <button type="button" name="ok_button" id="ok_button" class="btn btn-success">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
@stop

@section('js')
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
$(function() {
    $('#tab_data').DataTable({
		processing: true,
		serverSide: true,
		ajax:{
		url: "{{ route('validation.byyear') }}",
      },
      columns:[
	  {
		data: 'username',
		name: 'username',
      },
      {
		data: 'name',
		name: 'name',
	  },
	  {
		data: 'start_date',
        name: 'start_date',
	  },
      {
		data: 'finish_date',
        name: 'finish_date',
      },
      {
        data: 'submit_type',
        render:function(data){
          if (data == 1) {
            return 'Utama'
          }
          else{
            return 'Alternatif'
          }
        }
      },
      {
        data: 'status_name',
		name: 'status_name',
      },
      {
        data: 'correspondence',
		name: 'correspondence',
      },
      {
        data: 'action',
		name: 'action',
		orderable: false
      }
	]
      // $('#validasi').dataTable();

  });

  var id_table;

});
</script>
@stop
