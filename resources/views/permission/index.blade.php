@extends('adminlte::page')

@section('title', 'Permission')

@section('content_header')
<h1>Permission <a id="btn_add"
  class="btn btn-flat btn-primary">Tambah Permission</a></h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>    
@endif

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Permission Management</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="tab_data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Permission</th>
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
				<form method="post" id="add" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label class="control-label col-md-4" >Permission <small class="text-danger">*</small> </label>
						<div class="col-md-8">
							<input type="text" name="name" id="name" class="form-control" />
						</div>
                    </div>
                    
                    <br />
					<div class="form-group" align="center">
						<input type="hidden" name="action" id="action" />
						<input type="hidden" name="hidden_id" id="hidden_id" />
						<input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="submit" />
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
                <h2 class="modal-title">Hapus data</h2>
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
        url: "{{ route('permission.index') }}",
      },
      columns:[

	  {
		data: 'name',
		name: 'name',
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
        $('#name').val("");
        $('#form_result').hide();
        $('#createModal .modal-title').text("Tambah Permission");
        $('#action').val("tambah");
    });

    var id_table;
    var html = '';
    $(document).on('click','.edit',function(){
        id_table = $(this).attr('id');
        $('#action').val("edit");
        // console.log (x);
        $('#createModal').modal('show');
        $('#form_result').hide();
        $('#createModal .modal-title').text("Edit permission");
        $.ajax({
          url:"/admin/permission/"+id_table+"/edit",
          dataType:"json",
          success:function(html){
              $('#name').val(html.data.name);
              $('#hidden_id').val(html.data.id);
              console.log($('#hidden_id').val(),$('#action').val());
            }
        });
    });
    
    $(document).on('click','.delete',function(){
      id_table = $(this).attr('id');
      $('#confirmModal').modal('show');
      $('#ok_button').text('OK');
    });

    $('#ok_button').click(function(){
      console.log (id_table);
      $.ajax({
        url:"permission/destroy/"+id_table,
        beforeSend:function(){
            $('#ok_button').text('Deleting...');
          },
          success:function(data)
          {
            setTimeout(function(){
                $('#confirmModal').modal('hide');
                $('#tab_data').DataTable().ajax.reload();
            }, 2000);
            toastr.success('Permission berhasil dihapus!', 'Success', {timeOut: 5000});
          }
		})
	});

    $('#add').on('submit',function(event){
      $('.notifError').remove();
      event.preventDefault();
      if($('#action').val() == 'tambah'){
        $.ajax({
          url:"{{route('permission.store')}}",
          method:"POST",
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          data: new FormData(this),
          success:function(data)
          {
            $('#form_result').hide();
            if(data.success)
            {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              setTimeout(function(){
                $('#createModal').modal('hide');
                },1000);
                $('#tab_data').DataTable().ajax.reload();
                toastr.success('Permission berhasil ditambahkan!', 'Success', {timeOut: 5000});
              }
            },
            error:function(xhr)
            {
              console.log(xhr);
              $('#form_result').show();
              html = '<div class="alert alert-danger">';
              $.each(xhr.responseJSON.errors, function (key, item) 
              {	
                html+='<p>' +item+'</p>';
              });
              html += '</div>';
              $('#form_result').html(html);
              $.each(xhr.responseJSON.errors,function(field_name,error){
                  $(document).find('[name='+field_name+']').after('<span class="notifError text-strong text-danger"> <strong>' +error+ '</strong></span>');
              });
            }
          });
        }else{
          $.ajax({
            url:"{{route('per.update')}}",
            method:"POST",
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            data: new FormData(this),
            success:function(data)
            {
              // $('#form_result').show();
              if(data.errors)
              {
                html = '<div class="alert alert-danger">';
                for(var count = 0; count < data.errors.length; count++)
                {
                  html += '<p>' + data.errors[count] + '</p>';
                }
                html += '</div>';
                $('#form_result').html(html);
              }
              if(data.success)
              {
                html = '<div class="alert alert-success">' + data.success + '</div>';
                setTimeout(function(){
                  $('#createModal').modal('hide');
                },1000);
                $('#tab_data').DataTable().ajax.reload();
                toastr.success('Permission berhasil diperbarui!', 'Success', {timeOut: 5000});
              }
            },
            error:function(xhr)
            {
              console.log(xhr);
              $('#form_result').show();
              html = '<div class="alert alert-danger">';
              $.each(xhr.responseJSON.errors, function (key, item) 
              {	
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