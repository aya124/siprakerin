@extends('adminlte::page')

@section('title', 'Laporan')

@section('content_header')
  <h1>Laporan/Sertifikat</h1>
@stop

@section('content')
  @if (session('status'))
    <div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>
  @endif

  <div class="box">
    <div class="box-header">
      @role(['admin', 'petugas', 'kepsek', 'wks']) 
      <h3 class="box-title">Data Laporan/Sertifikat</h3>
      @endrole
      @role('siswa')
      <h3 class="box-title">Laporan/Sertifikat</h3>
      @endrole
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tab_data" class="table table-bordered table-striped">
        <thead>
          <tr>
            @role(['admin', 'petugas', 'kepsek', 'wks']) 
            <th>Nama siswa</th>
            @endrole
            <th>Nama Industri</th>
            <th width="20%">Laporan</th>
            <th width="20%">Sertifikat</th>
          </tr>
        </thead>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  @role('siswa')
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Laporan</h4>
        </div>
        <div class="modal-body">
          <span id="form_result"></span>
          <form method="post" id="add" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="control-label col-md-4">File laporan <small class="text-danger">*</small> </label>
              <div class="col-md-8">
                <input type="file" name="report" id="report" accept=".docx,.pdf" />
              </div>
              <small class="control-label col-md-4" class="text-danger">Format laporan pdf/docx</small>
            </div>

            <div class="form-group" align="center">
              <input type="hidden" name="action" id="action" />
              <input type="hidden" name="submission_id" id="submission" />
              <input type="hidden" name="hidden_id" id="hidden_id" />
              <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Submit" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <br />

  <div id="createModal2" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Sertifikat</h4>
        </div>
        <div class="modal-body">
          <span id="form_result"></span>
          <form method="post" id="add2" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="control-label col-md-4">File Sertifikat <small class="text-danger">*</small> </label>
              <div class="col-md-8">
                <input type="file" name="report" id="report2" accept=".jpg,.jpeg,.png,.pdf" />
              </div>
              <small class="control-label col-md-4" class="text-danger">Format File Sertifikat pdf/jpg/png maks 512kB</small>
            </div>

            <div class="form-group" align="center">
              <input type="hidden" name="action2" id="action2" />
              <input type="hidden" name="submission_id" id="submission" />
              <input type="hidden" name="hidden_id" id="hidden_id2" />
              <input type="submit" name="action2_button" id="action2_button" class="btn btn-primary" value="Submit" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endrole

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
        ajax: {
          url: "{{ route('report.index') }}",
        },
        columns: [
          @role(['admin', 'petugas', 'kepsek', 'wks']) 
          {
            data: 'student_name',
            name: 'student_name',
          },
          @endrole {
            data: 'industry_name',
            name: 'industry_name',
          },
          {
            data: 'action',
            name: 'action',
            orderable: false
          },
          {
            data: 'action2',
            name: 'action2',
            orderable: false
          }
        ]
      });
      // $('#laporan').dataTable();
      @role('siswa')
      $('#btn_add').click(function() {
        $('.notifError').remove();
        $('#createModal').modal('show');
        $('#form_result').hide();
        $('#createModal .modal-title').text("Tambah Laporan");
        $('#action').val("tambah");
        $('#action2').val("tambah");
      });
      @endrole
      let sub_id;
      $(document).on('click', '.edit', function() {
        sub_id = $(this).data('id');
        $('#action').val("edit");
        $('#action2').val("edit");
        $('#submission').val(sub_id);
        $('#createModal').modal('show');
        $('#form_result').hide();
      });
      $('#add').on('submit', function(event) {
        $('.notifError').remove();
        event.preventDefault();
        $.ajax({
          url: `/report`,
          method: "POST",
          contentType: false,
          cache: false,
          processData: false,
          dataType: "json",
          data: new FormData(this),
          success: function(data) {
            $('#form_result').hide();
            // if (data.errors) {
            //   html = '<div class="alert alert-danger">';
            //   for (var count = 0; count < data.errors.length; count++) {
            //     html += '<p>' + data.errors[count] + '</p>';
            //   }
            //   html += '</div>';
            //   $('#form_result').html(html);
            // }
            if (data.success) {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              setTimeout(function() {
                $('#createModal').modal('hide');
              }, 1000);
              $('#tab_data').DataTable().ajax.reload();
              toastr.success('Data berhasil diperbarui!', 'Success', {timeOut: 5000}
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
          } //end error
        });
      });

      $('#add2').on('submit', function(event) {
        $('.notifError').remove();
        event.preventDefault();
        $.ajax({
          url: `/report2`,
          method: "POST",
          contentType: false,
          cache: false,
          processData: false,
          dataType: "json",
          data: new FormData(this),
          success: function(data) {
            $('#form_result').hide();
            // if (data.errors) {
            //   html = '<div class="alert alert-danger">';
            //   for (var count = 0; count < data.errors.length; count++) {
            //     html += '<p>' + data.errors[count] + '</p>';
            //   }
            //   html += '</div>';
            //   $('#form_result').html(html);
            // }
            if (data.success) {
              html = '<div class="alert alert-success">' + data.success + '</div>';
              setTimeout(function() {
                $('#createModal').modal('hide');
              }, 1000);
              $('#tab_data').DataTable().ajax.reload();
              toastr.success('Data berhasil diperbarui!', 'Success', {timeOut: 5000}
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
          } //end error
        });
      });
    });
  </script>
@stop
