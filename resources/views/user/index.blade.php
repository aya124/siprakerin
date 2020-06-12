@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
<h1> Daftar User 
  <a id="btn_add" class="btn btn-flat btn-primary">Tambah User</a>
  {{-- <a id="btn_add" class="btn btn-flat btn-primary">Upload File</a> --}}
</h1>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>    
@endif

<div class="box">
    <div class="box-header">
        {{-- <h3 class="box-title">User</h3> --}}
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="tab_data" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama</th>
              <th>E-mail</th>
              <th>Role</th>
              <th>Aksi</th>
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
						<label class="control-label col-md-4" >Nama: </label>
						<div class="col-md-8">
							<input type="text" name="name" id="name" class="form-control" />
						</div>
          </div>
          
          <div class="form-group">
						<label class="control-label col-md-4" >E-mail: </label>
						<div class="col-md-8">
							<input type="text" name="email" id="email" class="form-control" />
						</div>
          </div>

          <div class="form-group" id="pass">
						<label class="control-label col-md-4" >Password: </label>
						<div class="col-md-8">
							<input type="password" name="password" id="password" class="form-control" />
						</div>
          </div>
          
          <div class="form-group">
						<label class="control-label col-md-4" >Role : </label>
						<div class="col-md-8">
							<select class="form-control" id="role" name="role">
								@for($i=0; $i<= count($role)-1;$i++)
								<option value="{{$role[$i]->id}}">{{$role[$i]->name}}</option>
								@endfor
							</select>
						</div>
          </div>
          
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

<div id="changeModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Ganti Password</h4>
			</div>
			<div class="modal-body">
				<span id="change_result"></span>

				<form method="post" id="changed" class="form-horizontal" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label class="control-label col-md-4">Input password baru: </label>
						<div class="col-md-8">
							<input type="password" name="input" id="input" class="form-control" placeholder="Masukkan password baru"/>
						</div>
          </div>
          <div class="form-group">
						<label class="control-label col-md-4">Input ulang password baru: </label>
						<div class="col-md-8">
							<input type="password" name="inputnew" id="inputnew" class="form-control" placeholder="Masukkan lagi password baru"/>
						</div>
					</div>
					<br />
					<div class="form-group" align="center">
						<input type="hidden" name="change_id" id="change_id" />
						<input type="submit" name="change_button" id="change_button" class="btn btn-primary" value="submit" />
					</div>
				</form>
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
				url: "{{ route('user.index') }}",
			},
			columns:[

			{
				data: 'name',
				name: 'name',
			},
      {
				data: 'email',
				name: 'email',
			},
      {
				data: 'role',
				name: 'role',
			},
      {
        data: 'action',
				name: 'action',
				orderable: false
      }
			]
    });
    // $('#siswa').dataTable();

    $('#btn_add').click(function(){
      $('#createModal').modal('show');
      $('#name').val("");
      $('#form_result').hide();
      $('#createModal .modal-title').text("Tambah User");
      $('#action').val("tambah");
      $('#pass').show();
    });
    
    $(document).on('click','.edit',function(){
      id_table = $(this).attr('id');
      console.log(id_table);
      $('#action').val("edit");
      $('#createModal').modal('show');
      $('#form_result').hide();
      $('#createModal .modal-title').text("Edit User");
      $.ajax({
        url:"/user/"+id_table+"/edit",
        dataType:"json",
        success:function(html){
          $('#name').val(html.data[0].name);
          $('#email').val(html.data[0].email);
          $('#role').val(html.data[0].role);
          $('#pass').hide();
          $('#hidden_id').val(html.data[0].id);
        }
      });
    });

    $(document).on('click','.change',function(){
 			id_table = $(this).attr('id');
 			// console.log(id_table);
 			$('#changeModal').modal('show');
 			$('#change_result').hide();
 			$('#input').val('');
 			$.ajax({
 				url:"/user/change/"+id_table,
 				dataType:"json",
 				success:function(html)
 				{
 					$('#change_id').val(html.data.id);
 				}
 			});
 		});
    
     $('#changed').on('submit',function(event){
 			event.preventDefault();
 			$.ajax({
					url:"{{route('uspass.update')}}",
					method:"POST",
					contentType: false,
					cache:false,
					processData: false,
					dataType:"json",
					data: new FormData(this),
					success:function(data)
					{
						$('#change_result').show();
						var html = '';
							if(data.errors)
							{

								html = '<div class="alert alert-danger">';
								for(var count = 0; count < data.errors.length; count++)
								{
									html += '<p>' + data.errors[count] + '</p>';
								}
								html += '</div>';
								$('#change_result').html(html);
							}
							if(data.success)
							{
								html = '<div class="alert alert-success">' + data.success + '</div>';
								setTimeout(function(){
									$('#changeModal').modal('hide');

							},1000);
								toastr.success('Password telah berhasil diganti!', 'Success', {timeOut: 5000});
							}
							console.log(html);
					},
					error:function(xhr)
					{
						$('#change_result').show();

				 			html = '<div class="alert alert-danger">';
						 $.each(xhr.responseJSON.errors, function (key, item) 
				          {	
				          	html+='<p>' +item+'</p>';
				          });
				 			html += '</div>';
							$('#change_result').html(html);
					}//end error
				});
 		});//edit function
    
    var id_table;
    $(document).on('click','.delete',function(){
      id_table = $(this).attr('id');
      console.log(id_table);
      $('#confirmModal').modal('show');
			$('#ok_button').text('OK');
    });
    
    $('#ok_button').click(function(){
      $.ajax({
        url:"user/destroy/"+id_table,
        beforeSend:function(){
          $('#ok_button').text('Deleting...');
        },
        success:function(data){
          setTimeout(function(){
            $('#confirmModal').modal('hide');
            $('#tab_data').DataTable().ajax.reload();
            }, 2000);
            toastr.success('Data user berhasil dihapus!', 'Success', {timeOut: 5000});
        }
      })
    });
    
    $('#add').on('submit',function(event){
      event.preventDefault();
      if($('#action').val() == 'tambah'){
        $.ajax({
          url:"{{route('user.store')}}",
          method:"POST",
          contentType: false,
          cache:false,
          processData: false,
          dataType:"json",
          data: new FormData(this),
          success:function(data){
            $('#form_result').show();
            if(data.errors){
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
                toastr.success('User berhasil ditambahkan!', 'Success', {timeOut: 5000});
              }
          },
          error:function(xhr){
            console.log(xhr);
            $('#form_result').show();
            html = '<div class="alert alert-danger">';
            $.each(xhr.responseJSON.errors, function (key, item) 
            {	
              html+='<p>' +item+'</p>';
            });
            	html += '</div>';
            	$('#form_result').html(html);
            } //end error
          });
        }else{
          $.ajax({
            url:"{{route('us.update')}}",
            method:"POST",
            contentType: false,
            cache:false,
            processData: false,
            dataType:"json",
            data: new FormData(this),
            success:function(data)
            {
              $('#form_result').show();
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
                    toastr.success('Data user berhasil diperbarui!', 'Success', {timeOut: 5000});
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