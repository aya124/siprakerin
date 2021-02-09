@extends('adminlte::page')

@section('title', 'Nilai')

@section('content_header')
  <h1>Nilai</h1>
@stop

@section('content')
  @if (session('status'))
    <div class="alert alert-{{ session('status.color') }}">{{ session('status.message') }}</div>
  @endif

  <div class="box">
    <div class="box-header">
      @role(['admin', 'wali-kelas', 'kepsek', 'wks']) 
      <h3 class="box-title">Data nilai</h3>
      @endrole
      @role('siswa')
      <h3 class="box-title">Nilai</h3>
      @endrole
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="tab_data" class="table table-bordered table-striped">
        <thead>
          <tr>
            @role(['admin', 'wali-kelas', 'kepsek', 'wks']) 
            <th>Nama siswa</th>
            @endrole
            <th>Industri</th>
            <th>Nilai 1</th>
            <th>Nilai 2</th>
            <th>Nilai 3</th>
            <th>Nilai 4</th>
            <th>Nilai 5</th>
            <th>Nilai 6</th>
            @role(['admin', 'wali-kelas'])
            <th>Aksi</th>
            @endrole
          </tr>
        </thead>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

  @role(['admin', 'wali-kelas'])
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update nilai</h4>
        </div>
        <div class="modal-body">
          <span id="form_result"></span>
          <form method="post" id="add" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="control-label col-md-4">Nilai 1: </label>
              <div class="col-md-8">
                <input class="form-control" id="score_1" name="score_1" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai 2: </label>
              <div class="col-md-8">
                <input class="form-control" id="score_2" name="score_2" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai 3: </label>
              <div class="col-md-8">
                <input class="form-control" id="score_3" name="score_3" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai 4: </label>
              <div class="col-md-8">
                <input class="form-control" id="score_4" name="score_4" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai 5: </label>
              <div class="col-md-8">
                <input class="form-control" id="score_5" name="score_5" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai 6: </label>
              <div class="col-md-8">
                <input class="form-control" id="score_6" name="score_6" type="number" min="0" max="100" />
              </div>
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
        @role('siswa')
        info: false,
        paging: false,
        searching: false,
        @endrole
        ajax: {
          url: "{{ route('score.index') }}",
        },
        columns: [
          @role(['admin', 'wali-kelas', 'kepsek', 'wks']) 
          {
            data: 'student_name',
            name: 'student_name',
          },
          @endrole {
            data: 'industry_name',
            name: 'industry_name',
          },
          {
            data: 'score_1',
            name: 'score_1',
            render(h) {
              return h || 'Belum ada nilai'
            },
          },
          {
            data: 'score_2',
            name: 'score_2',
            render(h) {
              return h || 'Belum ada nilai'
            },
          },
          {
            data: 'score_3',
            name: 'score_3',
            render(h) {
              return h || 'Belum ada nilai'
            },
          },
          {
            data: 'score_4',
            name: 'score_4',
            render(h) {
              return h || 'Belum ada nilai'
            },
          },
          {
            data: 'score_5',
            name: 'score_5',
            render(h) {
              return h || 'Belum ada nilai'
            },
          },
          {
            data: 'score_6',
            name: 'score_6',
            render(h) {
              return h || 'Belum ada nilai'
            },
          },
          @role(['admin', 'wali-kelas']) {
            data: 'action',
            name: 'action',
            orderable: false
          }
          @endrole
        ]
      });
      // $('#nilai').dataTable();

      @role(['admin', 'wali-kelas'])
      $('#btn_add').click(function() {
        $('#createModal').modal('show');
        $('#form_result').hide();
        $('#createModal .modal-title').text("Tambah Nilai");
        $('#action').val("tambah");
      });
      @endrole
      let sub_id;
      $(document).on('click', '.edit', function() {
        sub_id = $(this).data('id');
        $('#submission').val(sub_id);
        $('#createModal').modal('show');
        $('#form_result').hide();
        $.ajax({
        url:"/score/"+sub_id+"/edit",
        dataType:"json",
        success:function(html){
          $('#score_1').val(html.data.score_1);
          $('#score_2').val(html.data.score_2);
          $('#score_3').val(html.data.score_3);
          $('#score_4').val(html.data.score_4);
          $('#score_5').val(html.data.score_5);
          $('#score_6').val(html.data.score_6);
        }
      });
      });

      $('#add').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: `/score`,
          method: "POST",
          contentType: false,
          cache: false,
          processData: false,
          dataType: "json",
          data: new FormData(this),
          success: function(data) {
            $('#form_result').show();
            if (data.errors) {

              html = '<div class="alert alert-danger">';
              for (var count = 0; count < data.errors.length; count++) {
                html += '<p>' + data.errors[count] + '</p>';
              }
              html += '</div>';
              $('#form_result').html(html);
            }
            if (data.success) {
              html = '<div class="alert alert-success">' + data.success +
                '</div>';
              setTimeout(function() {
                $('#createModal').modal('hide');

              }, 1000);
              $('#tab_data').DataTable().ajax.reload();
              toastr.success('Nilai berhasil diperbarui!', 'Success', {
                timeOut: 5000
              });
            }

          },
          error: function(xhr) {
            console.log(xhr);
          } //end error
        });
      });
    });

  </script>
@stop
