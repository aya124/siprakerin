@extends('adminlte::page')

@section('title', 'Pengajuan')

@section('content_header')
<h1>Pengajuan
@if (Auth::user()->submit_lock != 1)
<a id="btn_add" class="btn btn-flat btn-primary">Tambah Pengajuan</a></h1>
@endif
@stop

@section('content')
@if (session('status'))
<div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>
@endif

<div class="callout callout-info">
  <h4>Info!</h4>
  <b>Admin akan mengecek sistem setiap pukul 10:00 WIB dan 16:00 WIB.</b>
        <!-- <a href="http://getbootstrap.com/javascript/#modals">Bootstrap documentation</a> -->
</div>
<div class="box">
  <div class="box-header">
      {{-- <h3 class="box-title">Pengajuan</h3> --}}
  </div>
  
  <!-- /.box-header -->
  <div class="box-body">
    <table id="tab_data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Nama Industri</th>
          <th>Tanggal Mulai</th>
          <th>Tanggal Selesai</th>
          <th>Status</th>
          <th>Pengajuan</th>
          <th>Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

<!-- Modal -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Tambah Feedback</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form method="post" id="tambahInfo" class="form-horizontal" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="submission_id" id="submission_id">
        <div class="modal-body">
        <div class="form-group ">
          <textarea class="form-control" name="info" id="info" rows="3"></textarea>
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

<div id="createModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Pengajuan </h4>
			</div>
			<div class="modal-body">

        <span id="form_result"></span>
			<form method="post" id="add" class="form-horizontal" enctype="multipart/form-data">
			@csrf
			    <div class="form-group">
					<label class="control-label col-md-4" >Nama Industri <small class="text-danger">*</small> </label>
						<div class="col-md-8">
							<select class="form-control" id="name" name="name">
                        @foreach ($industry as $item)
						<option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
							</select>
					    </div>
          </div>
          <div class="form-group">
						<label class="control-label col-md-4" >Tanggal Mulai Prakerin <small class="text-danger">*</small> </label>
						<div class="col-md-8">
							<input type="date" name="startdate" id="startdate" class="dateform form-control" />
						</div>
          </div>
          <div class="form-group">
						<label class="control-label col-md-4" >Tanggal Selesai Prakerin <small class="text-danger">*</small> </label>
						<div class="col-md-8">
							<input type="date" name="finishdate" id="finishdate" class="dateform form-control" />
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

<div id="createModalUpload" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
        <span id="form_result"></span>
				<form  method="post" class="form-horizontal" id="ups" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="control-label col-md-4 balasan" >File Surat Pengantar <small class="text-danger">*</small> </label>
          <div class="col-md-8">
            <div class="file-preview">
              <input type="file" name="upload" id="upload" accept=".jpeg,.jpg,.png,.pdf" class="form-control" />
            </div>
            <small class="control-label col-md-8">Format file berupa jpg/png/pdf</small>
          </div>
        </div>
        <br />
			        <div class="form-group" align="center">
				        <input type="hidden" name="hidden_name" id="hidden_name" />
				        <input type="hidden" name="hidden_id" id="hidden_id2" />
				        <input type="submit" class="btn btn-primary" value="Submit" />
			        </div>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="createModalUpload2" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			</div>
			<div class="modal-body">
        <span id="form_result"></span>
			<form method="post" class="form-horizontal" id="upss" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label class="control-label col-md-4" >File Surat Balasan <small class="text-danger">*</small> </label>
          <div class="col-md-8">
            <div class="file-preview">
              <input type="file" name="upload" id="upload2" accept=".jpeg,.jpg,.png,.pdf" class="form-control" />
            </div>
            <small class="control-label col-md-8">Format file berupa jpg/png/pdf</small>
          </div>
        </div>
        <br />
					<div class="form-group" align="center">
						<input type="hidden" name="hidden_name2" id="hidden_name2" />
						<input type="hidden" name="hidden_id" id="hidden_id3" />
						<input type="submit" class="btn btn-primary" value="Submit" />
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
		url: "{{ route('submission.index') }}",
      },
      columns:[
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
                }else{
                    return 'Alternatif'
                }
            }
        },
        {
            data: 'action',
			name: 'action',
			orderable: false
        }
	]
      // $('#pengajuan').dataTable();
  });

  $('#btn_add').click(function() {
    $('.notifError').remove();
    $('#createModal').modal('show');
    $('#name').val("");
    $('#form_result').hide();
    $('#createModal .modal-title').text("Tambah Pengajuan");
    $('#action').val("tambah");
    $('#startdate').val("");
    $('#finishdate').val("");
  });

//   $(document).on("change",".dateform",function() {
//     this.setAttribute(
//       "data-date",
//       moment(this.value, "YYYY-MM-DD")
//       .format(this.getAttribute("data-date-format"))
//     )
//   }).trigger("change")

  $(document).on('click','.edit',function() {
    id_table = $(this).attr('id');
    console.log(id_table);
    $('#action').val("edit");
    $('#createModal').modal('show');
    $('#form_result').hide();
    $('#createModal .modal-title').text("Edit Pengajuan");
    $.ajax({
      url:"/submission/"+id_table+"/edit",
      dataType:"json",
      success:function(html) {
        $('#name').val(html.data[0].industry_id);
        $('#startdate').val(html.data[0].start_date);
        $('#finishdate').val(html.data[0].finish_date);
        $('#hidden_id').val(html.data[0].id);
      }
    });
  });

  $(document).on('click','.upload',function() {
    id_table = $(this).attr('id');
    $('#hidden_id2').val(id_table);
    $('#hidden_name').val('suratpengantar');
    $('#action').val("upload");
    $('#createModalUpload').modal('show');
    $('#form_result').hide();
	  $('#createModalUpload .modal-title').text("Upload Surat Pengantar");
  });

  $(document).on('click','.upload2',function() {
    id_table = $(this).attr('id');
    $('#hidden_id3').val(id_table);
    $('#hidden_name2').val('suratbalasan');
    $('#action').val("upload");
    $('#createModalUpload2').modal('show');
    $('#form_result').hide();
	  $('#createModalUpload2 .modal-title').text("Upload Surat Balasan Industri");
  });

  $('#ups').on('submit',function(event) {
    $('.notifError').remove();
    event.preventDefault();
    $.ajax({
      url:"submission/uploadprocess",
      method:"POST",
      contentType: false,
      cache:false,
      processData: false,
      dataType:"json",
      data: new FormData(this),
      success:function(data) {
        $('#form_result').hide();
        if (data.success) {
            html = '<div class="alert alert-success">' + data.success + '</div>';
            setTimeout(function() {
              $('#createModalUpload').modal('hide');
              $('#tab_data').DataTable().ajax.reload();
            }, 2000);
            toastr.success('File berhasil di-upload', 'Success', {timeOut: 5000}
            );
          }
        },
        error: function(xhr) {
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

  $('#upss').on('submit',function(event){
    $('.notifError').remove();
    event.preventDefault();
    $.ajax({
      url:"submission/uploadprocess",
      method:"POST",
      contentType: false,
      cache:false,
      processData: false,
      dataType:"json",
      data: new FormData(this),
      success:function(data) {
          $('#form_result').show();
          if(data.success) {
            html = '<div class="alert alert-success">' + data.success + '</div>';
            setTimeout(function(){
              $('#createModalUpload2').modal('hide');
              $('#tab_data').DataTable().ajax.reload();
            }, 2000);
              toastr.success('File berhasil di-upload', 'Success', {timeOut: 5000}
              );
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
            });//end error
          }
    });
  });

  var id_table;
    $(document).on('click','.delete',function() {
      id_table = $(this).attr('id');
      console.log(id_table);
      $('#confirmModal').modal('show');
	  $('#ok_button').text('OK');
    });

    $('#ok_button').click(function() {
      $.ajax({
        url:"submission/destroy/"+id_table,
        beforeSend:function(){
          $('#ok_button').text('Deleting...');
        },
        success:function(data){
          setTimeout(function(){
            $('#confirmModal').modal('hide');
            $('#tab_data').DataTable().ajax.reload();
            }, 2000);
            toastr.success('Data pengajuan berhasil dihapus!', 'Success', {timeOut: 5000});
        }
      })
    });

    $(document).on('click', '.info', function(){
      id = $(this).attr('id');
      $('#submission_id').val(id);
      $('#infoModal').modal('show');
    });

      $('#tambahInfo').on('submit',function(event) {
        $('.notifError').remove();
        event.preventDefault();
          $.ajax({
              url:"{{route('info.add')}}",
              method:"POST",
              contentType: false,
              cache:false,
              processData: false,
              dataType:"json",
              data: new FormData(this),
              success:function(data) {
                console.log('success');
                  setTimeout(function(){
                    $('#infoModal').modal('hide');
                    },1000);
                    $('#tab_data').DataTable().ajax.reload();
                    toastr.success('Feedback berhasil ditambahkan!', 'Success', {timeOut: 5000});
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

        $(document).on('click', '.lihatinfo',function(){
         $('#lihatInfoModal .modal-body').load($(this).attr('url'));
         $('#lihatInfoModal').modal('show');
        });

    $('#add').on('submit',function(event) {
      $('.notifError').remove();
      event.preventDefault();
      if($('#action').val() == 'tambah') {
        $.ajax({
          url:"{{route('submission.store')}}",
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
                  $('#btn_add').hide();
                  toastr.success('Pengajuan berhasil ditambahkan!', 'Success', {timeOut: 5000});
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
                url:"{{route('sub.update')}}",
                method:"POST",
                contentType: false,
                cache:false,
                processData: false,
                dataType:"json",
                data: new FormData(this),
                success:function(data) {
                  $('#form_result').show();
                    if(data.success) {
                      html = '<div class="alert alert-success">' + data.success + '</div>';
                      setTimeout(function(){
                        $('#createModal').modal('hide');
                    },1000);
                    $('#tab_data').DataTable().ajax.reload();
                      toastr.success('Pengajuan berhasil diperbarui!', 'Success', {timeOut: 5000});
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
