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
      @role(['admin', 'wali-kelas', 'kepsek', 'wks', 'kps'])
      <h3 class="box-title">Data Nilai</h3>
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
            @role(['admin', 'wali-kelas', 'kps', 'kepsek', 'wks1', 'wks4'])
            <th>Nama Siswa</th>
            @endrole
            <th>Nama Industri</th>
            <th>SisKom</th>
            <th>KomJar</th>
            <th>PemDas</th>
            <th>DDG</th>
            <th>IaaS</th>
            <th>PaaS</th>
            <th>SaaS</th>
            <th>SIoT</th>
            <th>SKJ</th>
            <!-- <th>Disiplin</th>
            <th>Inisiatif</th>
            <th>Kerjasama</th>
            <th>Tanggung Jawab</th>
            <th>Kebersihan</th> -->
            <th>Aksi</th>
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
          <h4 class="modal-title">Input Nilai</h4>
        </div>
        <div class="modal-body">
          <span id="form_result"></span>
          <form method="post" id="add" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="control-label col-md-4">Nilai SisKom <small class="text-danger">*</small></label>
              <div class="col-md-8">
                <input class="form-control" id="score_1" name="score_1" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai KomJar <small class="text-danger">*</small></label>
              <div class="col-md-8">
                <input class="form-control" id="score_2" name="score_2" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai PemDas <small class="text-danger">*</small></label>
              <div class="col-md-8">
                <input class="form-control" id="score_3" name="score_3" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai DDG <small class="text-danger">*</small></label>
              <div class="col-md-8">
                <input class="form-control" id="score_4" name="score_4" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai IaaS <small class="text-danger">*</small></label>
              <div class="col-md-8">
                <input class="form-control" id="score_5" name="score_5" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai PaaS <small class="text-danger">*</small></label>
              <div class="col-md-8">
                <input class="form-control" id="score_6" name="score_6" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai SaaS <small class="text-danger">*</small></label>
              <div class="col-md-8">
                <input class="form-control" id="score_7" name="score_7" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai Sistem IoT <small class="text-danger">*</small></label>
              <div class="col-md-8">
                <input class="form-control" id="score_8" name="score_8" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">Nilai SKJ <small class="text-danger">*</small></label>
              <div class="col-md-8">
                <input class="form-control" id="score_9" name="score_9" type="number" min="0" max="100" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4" >Nilai Disiplin <small class="text-danger">*</small></label>
                  <div class="col-md-8">
                    <select class="form-control" name="score_a" id="score_a">
                      <option value="belum disetujui">Baik</option>
                      <option value="disetujui">Amat Baik</option>
                      <option value="tidak disetujui">Cukup</option>
                    </select>
                  </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4" >Nilai Kerjasama <small class="text-danger">*</small></label>
                  <div class="col-md-8">
                    <select class="form-control" name="score_b" id="score_b">
                      <option value="belum disetujui">Baik</option>
                      <option value="disetujui">Amat Baik</option>
                      <option value="tidak disetujui">Cukup</option>
                    </select>
                  </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4" >Nilai Inisiatif <small class="text-danger">*</small></label>
                  <div class="col-md-8">
                    <select class="form-control" name="score_c" id="score_c">
                      <option value="belum disetujui">Baik</option>
                      <option value="disetujui">Amat Baik</option>
                      <option value="tidak disetujui">Cukup</option>
                    </select>
                  </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4" >Nilai Tanggung Jawab <small class="text-danger">*</small></label>
                  <div class="col-md-8">
                    <select class="form-control" name="score_d" id="score_d">
                      <option value="belum disetujui">Baik</option>
                      <option value="disetujui">Amat Baik</option>
                      <option value="tidak disetujui">Cukup</option>
                    </select>
                  </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4" >Nilai Kebersihan <small class="text-danger">*</small></label>
                  <div class="col-md-8">
                    <select class="form-control" name="score_e" id="score_e">
                      <option value="belum disetujui">Baik</option>
                      <option value="disetujui">Amat Baik</option>
                      <option value="tidak disetujui">Cukup</option>
                    </select>
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

  <div id="detailModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>Detail Nilai</b></h4>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            @php
            $i=0;
            @endphp
            <tr>
              <th align="center" style="width: 30px;">A.</th>
              <th align="center" style="width: 240px;">ASPEK TEKNIS</th>
              <th align="center" style="width: 180px;">NILAI</th>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Sistem Komputer</td>
              <td id="score_1" align="center"></td>
            </tr>
            <tr>
            <td align="center">{{++$i}}.</td>
              <td>Komputer dan Jaringan</td>
              <td id="score_2" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Pemrograman Dasar</td>
              <td id="score_3" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Dasar Desain Grafis</td>
              <td id="score_4" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Infrastruktur Komputasi Awan (IaaS)</td>
              <td id="score_5" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Platform Komputasi Awan (PaaS)</td>
              <td id="score_6" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Layanan Komputasi Awan (SaaS)</td>
              <td id="score_7" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Sistem Internet of Things (SIoT)</td>
              <td id="score_8" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Sistem Keamanan Jaringan</td>
              <td id="score_9" align="center"></td>
            </tr>
            <tr>
              <td>&nbsp;.</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <th align="center" style="width: 30px;">B.</th>
              <th align="center" style="width: 240px;">ASPEK NONTEKNIS</th>
              <th align="center" style="width: 180px;">KUALIFIKASI</th>
            </tr>
            <!-- <tr>
              <th align="center" style="width: 20px;">NO.</th>
              <th>ASPEK YANG DINILAI</th>
              <th style="width: 120px;">KUALIFIKASI</th>
            </tr> -->
              @php
              $i=0;
              @endphp
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Disiplin</td>
              <td id="score_a" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Kerjasama</td>
              <td id="score_b" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Inisiatif</td>
              <td id="score_c" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Tanggung Jawab</td>
              <td id="score_d" align="center"></td>
            </tr>
            <tr>
              <td align="center">{{++$i}}.</td>
              <td>Kebersihan</td>
              <td id="score_e" align="center"></td>
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
          @role(['admin', 'wali-kelas', 'kps', 'kepsek', 'wks'])
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
          {
            data: 'score_7',
            name: 'score_7',
            render(h) {
              return h || 'Belum ada nilai'
            },
          },
          {
            data: 'score_8',
            name: 'score_8',
            render(h) {
              return h || 'Belum ada nilai'
            },
          },
          {
            data: 'score_9',
            name: 'score_9',
            render(h) {
              return h || 'Belum ada nilai'
            },
          },
          {
            data: 'action',
            name: 'action',
            orderable: false
          }
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
        success:function(html) {
          $('#score_1').val(html.data.score_1);
          $('#score_2').val(html.data.score_2);
          $('#score_3').val(html.data.score_3);
          $('#score_4').val(html.data.score_4);
          $('#score_5').val(html.data.score_5);
          $('#score_6').val(html.data.score_6);
          $('#score_7').val(html.data.score_7);
          $('#score_8').val(html.data.score_8);
          $('#score_9').val(html.data.score_9);
          $('#score_a').val(html.data.score_a);
          $('#score_b').val(html.data.score_b);
          $('#score_c').val(html.data.score_c);
          $('#score_d').val(html.data.score_d);
          $('#score_e').val(html.data.score_e);
        }
      });
     });

      // let sub_id;
      $(document).on('click','.detail',function(){
      var id =$(this).attr('id');
      // $('#submission').val(sub_id);
      $('#detailModal').modal('show');
      $.ajax({
        url:"/score/"+id+"/edit",
        dataType:"json",
        success:function(html){
          $('#score_1').val(html.data.score_1);
          $('#score_2').val(html.data.score_2);
          $('#score_3').val(html.data.score_3);
          $('#score_4').val(html.data.score_4);
          $('#score_5').val(html.data.score_5);
          $('#score_6').val(html.data.score_6);
          $('#score_7').val(html.data.score_7);
          $('#score_8').val(html.data.score_8);
          $('#score_9').val(html.data.score_9);
          $('#score_a').val(html.data.score_a);
          $('#score_b').val(html.data.score_b);
          $('#score_c').val(html.data.score_c);
          $('#score_d').val(html.data.score_d);
          $('#score_e').val(html.data.score_e);
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
            $('#form_result').hide();
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
