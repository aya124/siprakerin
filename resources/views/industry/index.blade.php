@extends('adminlte::page')

@section('title', 'Industri')

@section('content_header')
<h1>Industri <a id="btn_add"
  class="btn btn-flat btn-primary">Tambah industri</a></h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Industri</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tab_data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama Industri</th>
          <th>Alamat</th>
          <th>Status</th>
          <th>Aksi</th>
        </tr>
      </thead>
      </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
<!-- Modal -->
<div class="modal fade" id="saranModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Saran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        <form method="post" id="tambahSaran" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="industry_id" id="industry_id">
      <div class="modal-body">
      <div class="form-group ">
        <textarea class="form-control" name="saran" id="saran" rows="3"></textarea>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="lihatSaranModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Lihat Saran</h5>
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

<div id="createModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Data Industri</h4>
			</div>
			<div class="modal-body">

				<span id="form_result"></span>
				<form method="post" id="add" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label class="control-label col-md-4" >Nama Industri <small class="text-danger">*</small> </label>
						<div class="col-md-8">
							<input type="text" name="name" id="name" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4" >Alamat <small class="text-danger">*</small> </label>
						<div class="col-md-8">
							<input type="text" name="address" id="address" class="form-control" />
						</div>
          </div>
          <div class="form-group">
						<label class="control-label col-md-4" >Kota <small class="text-danger">*</small> </label>
						<div class="col-md-8">
							<input type="text" name="city" id="city" class="form-control" />
						</div>
          </div>
          <div class="form-group">
						<label class="control-label col-md-4" >Phone <small class="text-danger">*</small> </label>
						<div class="col-md-8">
							<input type="text" name="phone" id="phone" class="form-control" />
						</div>
          </div>
          <div class="form-group">
						<label class="control-label col-md-4" >Detail </label>
						<div class="col-md-8">
							<input type="text" name="detail" id="detail" class="form-control" rows="3"/>
						</div>
          </div>
          @role('admin')
          <div class="form-group">
            <label class="control-label col-md-4" >Status </label>
            <div class="col-md-8">
              <select class="form-control" name="status" id="status">
                <option value="belum disetujui">Belum disetujui</option>
                <option value="disetujui">Disetujui</option>
                <option value="tidak disetujui">Tidak disetujui</option>
              </select>
            </div>
          </div>
          @endrole
					<br />
					<div class="form-group" align="center">
						<input type="hidden" name="action" id="action" />
						<input type="hidden" name="hidden_id" id="hidden_id" />
						<input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Submit" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="detailModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Detail Industri</h2>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr>
              <th style="width: 20%">Nama</th>
              <td id="name_detail"></td>
            </tr>
            <tr>
              <th>Alamat</th>
              <td id="address_detail"></td>
            </tr>
            <tr>
              <th>Kota</th>
              <td id="city_detail"></td>
            </tr>
            <tr>
              <th>Phone</th>
              <td id="phone_detail"></td>
            </tr>
            <tr>
              <th>Detail</th>
              <td id="detail_detail"></td>
            </tr>
            <tr>
              <th>Status</th>
              <td id="status_detail"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title">Hapus Data</h2>
          </div>
          <div class="modal-body">
              <h4 align="center" style="margin:0;">Apakah anda yakin ingin menghapus data ini?</h4>
          </div>
          <div class="modal-footer">
           <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
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
				url: "{{ route('industry.index') }}",
			},
			columns:[

			{
				data: 'name',
				name: 'name',
			},
			{
				data: 'address',
                name: 'address',
			},
			{
				data: 'status',
                name: 'status',
			},
            {
                data: 'action',
				name: 'action',
				orderable: false
            }
			]
		});
      // $('#industri').dataTable();

    $('#btn_add').click(function(){
      $('.notifError').remove();
      $('#createModal').modal('show');
      $('#name').val("");
      $('#form_result').hide();
      $('#createModal .modal-title').text("Tambah Industri");
      $('#action').val("tambah");
    });

    $(document).on('click','.edit',function(){
      $('.notifError').remove();
      var x =$(this).attr('id');
      $('#action').val("edit");
      $('#createModal').modal('show');
      $('#form_result').hide();
      $('#createModal .modal-title').text("Edit Industri");
      $.ajax({
        url:"/industry/"+x+"/edit",
        dataType:"json",
        success:function(html){
          $('#name').val(html.data.name);
          $('#address').val(html.data.address);
          $('#city').val(html.data.city);
          $('#phone').val(html.data.phone);
          $('#detail').val(html.data.detail);
          $('#hidden_id').val(html.data.id);
          @role('admin')
          $('#status').val(html.data.status);
          @endrole
        }
      });
    });
    var id_table;
    $(document).on('click','.delete',function(){
			id_table = $(this).attr('id');
			$('#confirmModal').modal('show');
			$('#ok_button').text('OK');
    });

    $(document).on('click','.detail',function(){
      var id =$(this).attr('id');
      $('#detailModal').modal('show');
      $.ajax({
        url:"/industry/"+id+"/edit",
        dataType:"json",
        success:function(html){
          $('#name_detail').text(html.data.name);
          $('#address_detail').text(html.data.address);
          $('#city_detail').text(html.data.city);
          $('#phone_detail').text(html.data.phone);
          $('#detail_detail').text(html.data.detail);
          $('#status_detail').text(html.data.status);
        }
      });
		});

    $('#ok_button').click(function() {
			$.ajax({
				url:"industry/destroy/"+id_table,
				beforeSend:function(){
					$('#ok_button').text('Deleting...');
				},
				success:function(data) {
					setTimeout(function() {
						$('#confirmModal').modal('hide');
						$('#tab_data').DataTable().ajax.reload();
					}, 2000);
						toastr.success('Industri berhasil dihapus!', 'Success', {timeOut: 5000});
				}
			})
		});

    $(document).on('click', '.saran', function(){
      id = $(this).attr('id');
      $('#industry_id').val(id);
      $('#saranModal').modal('show');
    });

      $('#tambahSaran').on('submit',function(event) {
        $('.notifError').remove();
        event.preventDefault();
          $.ajax({
              url:"{{route('suggestion.add')}}",
              method:"POST",
              contentType: false,
              cache:false,
              processData: false,
              dataType:"json",
              data: new FormData(this),
              success:function(data) {
                console.log('success');
                  setTimeout(function(){
                    $('#saranModal').modal('hide');
                    },1000);
                    $('#tab_data').DataTable().ajax.reload();
                    toastr.success('Saran berhasil ditambahkan!', 'Success', {timeOut: 5000});
                },
                error:function(xhr) {
                  console.log(xhr);
                  $('#form_result').show();
                  html = '<div class="alert alert-danger">';
                  $.each(xhr.responseJSON.errors, function (key, item) {
                    html+='<p>' +item+'</p>';
                  });
                  html += '</div>';
                  $('#form_result').html(html);
                    $.each(xhr.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="notifError text-strong text-danger"> <strong>' +error+ '</strong></span>');
                    });
                }
            });
        });

        $(document).on('click', '.lihatsaran',function(){
         $('#lihatSaranModal .modal-body').load($(this).attr('url'));
         $('#lihatSaranModal').modal('show');
        });

    $('#add').on('submit',function(event) {
        $('.notifError').remove();
        event.preventDefault();
        if($('#action').val() == 'tambah'){
            $.ajax({
              url:"{{route('industry.store')}}",
              method:"POST",
              contentType: false,
              cache:false,
              processData: false,
              dataType:"json",
              data: new FormData(this),
              success:function(data) {
                $('#form_result').hide();
                if(data.success) {
                  html = '<div class="alert alert-success">' + data.success + '</div>';
                  setTimeout(function(){
                    $('#createModal').modal('hide');
                    },1000);
                    $('#tab_data').DataTable().ajax.reload();
                    toastr.success('Industri berhasil ditambahkan!', 'Success', {timeOut: 5000});
                  }
                },
                error:function(xhr) {
                  console.log(xhr);
                  $('#form_result').show();
                  html = '<div class="alert alert-danger">';
                  $.each(xhr.responseJSON.errors, function (key, item) {
                    html+='<p>' +item+'</p>';
                  });
                  html += '</div>';
                  $('#form_result').html(html);
                    $.each(xhr.responseJSON.errors,function(field_name,error){
                        $(document).find('[name='+field_name+']').after('<span class="notifError text-strong text-danger"> <strong>' +error+ '</strong></span>');
                    });
                }//end error
              });
            }else{
              $.ajax({
                url:"{{route('ind.update')}}",
                method:"POST",
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                data: new FormData(this),
                success:function(data){
                    if(data.success) {
                      html = '<div class="alert alert-success">' + data.success + '</div>';
                      setTimeout(function(){
                        $('#createModal').modal('hide');
                    },1000);
                    $('#tab_data').DataTable().ajax.reload();
                      toastr.success('Data industri berhasil diperbarui!', 'Success', {timeOut: 5000});
                    }
                },
                error:function(xhr) {
                  console.log(xhr);
                  $('#form_result').show();
                  html = '<div class="alert alert-danger">';
                  $.each(xhr.responseJSON.errors, function (key, item) {
                    html+='<p>' +item+'</p>';
                  });
                  html += '</div>';
                  $('#form_result').html(html);
                  $.each(xhr.responseJSON.errors,function(field_name,error){
                    $(document).find('[name='+field_name+']').after('<span class="notifError text-strong text-danger"> <strong>' +error+ '</strong></span>');
                  });
                }//end error
              });
            }
        });
  });
</script>
@stop
