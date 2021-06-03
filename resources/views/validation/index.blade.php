@extends('adminlte::page')

@section('title', ' Validasi Pengajuan')

@section('content_header')
<h1>Validasi Pengajuan</h1>
@if (Auth::user()->submit_type == 1)
@endif
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>
@endif

<div class="box">
    <div class="box-header">
        {{-- <h3 class="box-title">Validasi Pengajuan</h3> --}}
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
            <th>Status</th>
            <th>Pengajuan</th>
            <th>Persuratan</th>
            <th>Aksi</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- /.box-body -->
  </div>

  <div class="box box-success collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Pengajuan yang disetujui</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
    </div>
    <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
        <table id="tab_data2" class="table table-bordered table-striped  dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Nama Siswa</th>
            <th>Nama Industri</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
            <th>Pengajuan</th>
            <th>Persuratan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        </table>
        </div>
      </div>
    <!-- /.box-body -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="lihatInfoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Lihat Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="box box-danger collapsed-box">
    <div class="box-header with-border">
      <h3 class="box-title">Pengajuan yang ditolak</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
    </div>
    <!-- /.box-header -->
      <div class="box-body">
        <div class="table-responsive">
        <table id="tab_data3" class="table table-bordered table-striped  dt-responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Nama Siswa</th>
            <th>Nama Industri</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Status</th>
            <th>Pengajuan</th>
            <th>Persuratan</th>
            {{-- <th>Aksi</th> --}}
          </tr>
        </thead>
        </table>
        </div>
      </div>
    <!-- /.box-body -->
  </div>

  <!-- Modal -->
  <div class="modal fade" id="lihatInfoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Lihat Info</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

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
		url: "{{ route('validation.index') }}",
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
        data: 'status_name',
		name: 'status_name',
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

  $('#tab_data2').DataTable({
		processing: true,
		serverSide: true,
		ajax:{
			url: "{{ route('tab.setuju') }}",
      },
      columns:[
      {
		    data: 'user_name',
		    name: 'user_name',
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
        data: 'status_name',
		name: 'status_name',
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

  $('#tab_data3').DataTable({
		processing: true,
		serverSide: true,
		ajax:{
		url: "{{ route('tab.tolak') }}",
      },
      columns:[
        {
			data: 'user_name',
			name: 'user_name',
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
            data: 'status_name',
			name: 'status_name',
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
            data: 'correspondence',
			name: 'correspondence',
      },
    //   {
    //     data: 'action',
	// 	name: 'action',
	// 	orderable: false
    //   }
	]
      // $('#validasi').dataTable();
  });

  var id_table;

  $(document).on('click','.setuju',function(){
    id_table = $(this).attr('id');
    console.log(id_table);
    $('#confirmModal').modal('show');
    $('#setuju').val("setuju");
    $('#confirmModal .modal-title').text("Setuju");
    $('#confirmModal .set').text("Apa anda yakin ingin menyetujui pengajuan ini?");
    $('#ok_button').text('OK');
    });

  $(document).on('click','.tolak',function(){
    id_table = $(this).attr('id');
    console.log(id_table);
    $('#confirmModal').modal('show');
    $('#setuju').val("tolak");
    $('#confirmModal .modal-title').text("Tolak");
    $('#confirmModal .set').text("Apa anda yakin ingin menolak pengajuan ini?");
    $('#ok_button').text('OK');
    });

  $('#ok_button').click(function(){
    if($('#setuju').val() == 'setuju'){
      $.ajax({
        url:"validation/update/"+id_table,
        beforeSend:function(){
        $('#ok_button').text('Menyetujui...');
      },
      success:function(data){
        setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#tab_data').DataTable().ajax.reload();
          $('#tab_data2').DataTable().ajax.reload();
          $('#tab_data3').DataTable().ajax.reload();
          }, 2000);
          toastr.success('Pengajuan telah disetujui!', 'Success', {timeOut: 5000});
        }
      })
    }else{
      console.log("tolak kesini");
      $.ajax({
        url:"validation/decline/"+id_table,
        beforeSend:function(){
        $('#ok_button').text('Menolak...');
      },
      success:function(data){
        setTimeout(function(){
          $('#confirmModal').modal('hide');
          $('#tab_data').DataTable().ajax.reload();
          $('#tab_data2').DataTable().ajax.reload();
          $('#tab_data3').DataTable().ajax.reload();
          }, 2000);
          toastr.success('Pengajuan telah ditolak!', 'Success', {timeOut: 5000});
        }
      })
    }
  });

  $(document).on('click', '.info', function(){
      id = $(this).attr('id');
      $('#submission_id').val(id);
      $('#infoModal').modal('show');
    });

  $(document).on('click', '.lihatinfo',function(){
         $('#lihatInfoModal .modal-body').load($(this).attr('url'));
         $('#lihatInfoModal').modal('show');
        });
});
</script>
@stop
