@extends('adminlte::page')

@section('title', 'Tahun Pengajuan')

@section('content_header')
<h1>Tahun Pengajuan <a id="btn_add"
  class="btn btn-flat btn-primary">Tambah Tahun</a></h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tahun Pengajuan</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tab_data" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Tahun</th>
            <th>Aksi</th>
            <th></th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

<div id="createModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">

        <span id="form_result"></span>
				<form method="post" id="add" class="form-horizontal">
					@csrf
                    <input type="hidden" name="_method" class="method">
					<div class="form-group">
						<label class="control-label col-md-4" >Tahun <small class="text-danger">*</small> </label>
						<div class="col-md-8">
							<input type="text" name="year" id="year" class="form-control" />
						</div>
					</div>

          <br />
          <div class="form-group" align="center">
						<input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Submit" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title"></h2>
          </div>
          <div class="modal-body">
              <h4 align="center" style="margin:0;"></h4>
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
				url: "{{ route('year.index') }}",
			},
			columns:[
			{
				data: 'year',
				name: 'year',
			},
            {
                data: 'action',
				name: 'action',
				orderable: false
            }
			]
    });

  $('#btn_add').click(function(){
    $('.notifError').remove();
    $('#createModal').modal('show');
    $('#year').val("");
    $('#form_result').hide();
    $('#add').attr('action',"{{route('year.store')}}");
    $('#add #method').val('POST');
    $('#createModal .modal-title').text("Tambah Tahun");
    $('#action').val("tambah");
  });

    $(document).on('click','.edit',function(){
      var y = $(this).attr('tahun');
      $('#year').val(y);
      $('#add').attr('action',$(this).attr('url'));
      $('#add #method').val('PUT');
      $('#action').val("edit");
      $('.notifError').remove();
      $('#createModal').modal('show');
      $('#form_result').hide();
      $('#createModal .modal-title').text("Edit Tahun");
    });

      var id_table;
      var method;
      $(document).on('click','.delete',function(){
			  id_table = $(this).attr('url');
        method ="DELETE";
			  $('#confirmModal .modal-title').html('Hapus data');
			  $('#confirmModal .modal-body h4').html('Apakah anda yakin ingin menghapus data ini?');
			  $('#confirmModal').modal('show');
			  $('#ok_button').removeClass('btn-info');
			  $('#ok_button').addClass('btn-danger');
			  $('#ok_button').text('Hapus');
		  });

      $(document).on('click','.isactive',function(){
			  id_table = $(this).attr('url');
              method = "POST";
			  $('#confirmModal .modal-title').html('Aktifkan Tahun');
			  $('#confirmModal .modal-body h4').html('Apakah anda yakin ingin mengaktifkan tahun ini?');
			  $('#confirmModal').modal('show');
			  $('#ok_button').addClass('btn-info');
			  $('#ok_button').removeClass('btn-danger');
			  $('#ok_button').text('Aktif');
		  });

      $('#ok_button').click(function(){
		$.ajax({
				url:id_table,
                method:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    _method:method
                },
				beforeSend:function(){
                    if(method == "DELETE"){
					$('#ok_button').text('Deleting...');
                    }else{
                    $('#ok_button').text('Loading...');
                    }
				},
				success:function(data) {
					setTimeout(function(){
						$('#confirmModal').modal('hide');
						$('#tab_data').DataTable().ajax.reload();
					}, 2000);
                    if(method == "DELETE"){
						toastr.success('Data tahun berhasil dihapus!', 'Success', {timeOut: 5000});
                    }else{
						toastr.success('Data tahun berhasil diaktifkan!', 'Success', {timeOut: 5000});
                        }
				}
			})
		});

    $('#add').on('submit',function(event){
      $('.notifError').remove();
          event.preventDefault();
          if($('#action').val() == 'tambah'){
              $.ajax({
                url: $(this).attr('url'),
                method:"POST",
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                data: new FormData(this),
                success:function(data){
                  $('#form_result').hide();
                    if(data.success){
                      html = '<div class="alert alert-success">' + data.success + '</div>';
                      setTimeout(function(){
                        $('#createModal').modal('hide');
                    },1000);
                    $('#tab_data').DataTable().ajax.reload();
                      toastr.success('Tahun berhasil ditambahkan!', 'Success', {timeOut: 5000});
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
                } //end error
              });
            }else{
              $.ajax({
                url:$(this).attr('url'),
                method:"POST",
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                data: new FormData(this),
                success:function(data) {
                  // $('#form_result').show();
                  if(data.errors) {
                      html = '<div class="alert alert-danger">';
                      for(var count = 0; count < data.errors.length; count++)
                      {
                        html += '<p>' + data.errors[count] + '</p>';
                      }
                      html += '</div>';
                      $('#form_result').html(html);
                    }
                    if(data.success) {
                      html = '<div class="alert alert-success">' + data.success + '</div>';
                      setTimeout(function(){
                        $('#createModal').modal('hide');

                    },1000);
                    $('#tab_data').DataTable().ajax.reload();
                      toastr.success('Tahun berhasil diperbarui!', 'Success', {timeOut: 5000});
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
                }//end error
              });
            }
        });
    });
</script>
@stop
