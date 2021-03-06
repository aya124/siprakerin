@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
  <h1>Dashboard</h1>
@stop

@section('content')
  <!-- <p><h4> Selamat Datang di SIPRAKERIN!</h4></p> -->

  <div class="callout callout-warning">
    <h4>Attention, please!</h4>
    <b>Bagi anda yang telah berhasil login dan menggunakan menu serta fitur SIPrakerin, 
    kami minta tolong partisipasinya untuk mengisi kuesioner melalui link berikut.</b><br />
    <a href="https://forms.gle/yzcdkVaW8YSfWgUHA">Kuesioner Usability</a>
  </div>
    
  <p><h4>Petunjuk Penggunaan SIPrakerin</h4></p>
  <div class="box box-widget">
    <div class="box-header with-border">
      <div class="user-block">
        <span class="username">Menu Data Industri</span>
        <!-- <span class="description">by Admin</span> -->
      </div>
      <!-- /.user-block -->
      <div class="box-tools">
        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
          <i class="fa fa-circle-o"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <p>Sebelum anda menggunakan menu-menu SIPrakerin, pastikan anda telah membaca dan memahami seluruh petunjuk di bawah ini.</p>
          @role('siswa')
          <p>Sebagai Siswa, anda dapat mengakses menu Data Industri, Pengajuan Prakerin, Laporan & Sertifikat serta Nilai.</p>
          @endrole
          @role('wali-kelas')
          <p>Sebagai Wali Kelas, anda dapat mengakses menu Data Industri, Laporan & Sertifikat, Nilai, juga mencetak rekap data Pengajuan, Laporan & Sertifikat dan Nilai.</p>
          @endrole
          @role('kps')
          <p>Sebagai Ketua Program Keahlian, anda dapat mengakses menu Data Industri, Validasi Pengajuan, Laporan & Sertifikat
          Nilai, juga mencetak rekap data Pengajuan, Laporan & Sertifikat dan Nilai.</p>
          @endrole
          @role('admin')
          <p>Sebagai Admin, anda memiliki akses pada 2 menu utama, yakni Data Industri dan Validasi Pengajuan. 
          Di samping itu, anda juga berhak mengakses menu-menu pada bagian Management. </p>
          @endrole
          <p>Pada menu Data Industri, anda dapat mengetahui industri mana saja yang bisa menjadi tempat dalam melaksanakan praktik kerja industri.
          @role(['wali-kelas','siswa'])
          <img class="img-responsive pad" src="../pictures/png/industry-view.png" alt="Industri">
          @endrole
          @role(['admin','kps'])
          <img class="img-responsive pad" src="../pictures/png/industry-view-admin.png" alt="Industry-View">
          @endrole

          <p>Untuk memudahkan pencarian, anda dapat menggunakan fitur <b><i>Search</i></b>.</p>
          <img class="img-responsive pad" src="../pictures/png/industry-search.png" alt="Cari-Industri"> 
          <p>Anda dapat melihat masing-masing data industri lebih lengkap melalui tombol <b><i>Detail</i></b>.</p>
          <img class="img-responsive pad" src="../pictures/png/industry-detail.png" alt="Detail-Industri">
          <p>Anda berhak menambah data industri sesuai dengan informasi yang anda ketahui melalui tombol <b><u>Tambah Industri</u></b>. <br />
          Pastikan data yang anda input benar-benar valid.</p>
          
          @role(['wali-kelas','siswa'])
          <p>Setelah menambah industri baru, anda masih bisa mengubah data industri melalui tombol <b><i>Edit</i></b>.</p>
          <img class="img-responsive pad" src="../pictures/png/industry-edit.png" alt="Edit-Industri">
          <p>Jika tombol <b><i>Edit</i></b> tidak tersedia, maka anda bisa memberikan info mengenai industri melalui tombol <b><u>Saran</u></b>.</p>
          <p>Saran yang telah ditambahkan dapat anda baca melalui tombol <b><u>Lihat Saran</u></b>.</p>
          @endrole
          @role(['admin','kps'])
          <p>Setelah menambah industri baru, anda bisa mengubah data industri melalui tombol <b><i>Edit</i></b>.</p>
          
          <p>Apabila anda menekan tombol <b><i>Edit</i></b>, perhatikan kolom <b>Status</b>. Secara <i>default</i>, status industri yang baru ditambahkan adalah <b>"Belum disetujui"</b>.</br />
          <img class="img-responsive pad" src="../pictures/png/industry-view-admin-status.png" alt="Industry-Status">
          Sehingga, status harus diganti menjadi <b>"Disetujui"</b> agar industri tersebut bisa dipilih siswa saat membuat pengajuan.</p>
          <p>Anda dapat memperoleh informasi baru yang mengenai industri melalui tombol <b><u>Lihat Saran</u></b>.</p>
          @endrole
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>

      @role('siswa')
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Menu Pengajuan Prakerin</span>
            <!-- <span class="description">by Admin</span> -->
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <p>Pada menu Pengajuan Prakerin, anda dapat membuat pengajuan praktik kerja industri melalui tombol <b><u>Tambah Pengajuan</u></b>.</p>
          <img class="img-responsive pad" src="../pictures/png/submission-empty.png" alt="Pengajuan-Kosong">
          <p>Setelah itu, pilih <b>nama industri</b> yang anda inginkan serta isi <b>tanggal mulai</b> dan <b>tanggal selesai</b> dengan benar. Lalu, klik <b><i>Submit</i></b>.</p>
          <img class="img-responsive pad" src="../pictures/png/submission-making.png" alt="Membuat-Pengajuan">
          Anda hanya berkesempatan membuat 1 (satu) Pengajuan yang dimana disebut sebagai pengajuan <b>Utama</b>.
          <img class="img-responsive pad" src="../pictures/png/submission-main.png" alt="Pengajuan-Utama">
          <p>Selama menunggu persetujuan, anda masih bisa mengganti industri dan tanggal pelaksanaan prakerin serta mencetak <b>Form Pengajuan</b>.</p>
          <img class="img-responsive pad" src="../pictures/png/submission-edit.png" alt="Mengubah-Pengajuan">
          <p>Jika pengajuan telah disetujui, anda dapat mengunggah berkas-berkas yang diperlukan, yaitu
          <b>Surat Pengantar Prakerin</b> dan <b>Surat Balasan dari Industri</b>.</p>
          <img class="img-responsive pad" src="../pictures/png/submission-approved.png" alt="Pengajuan-Disetujui">
          <p>Berkas pertama yang diunggah adalah <b>Surat Pengantar Prakerin</b> yang anda peroleh setelah menyerahkan <b>Form Pengajuan</b> ke BKK.</p>
          <img class="img-responsive pad" src="../pictures/png/submit-surat-pengantar.png" alt="Unggah-Surat-Pengantar">
          <p>Sedangkan, <b>Surat Balasan dari Industri</b> adalah berkas yang anda peroleh setelah menyerahkan <b>Surat Pengantar Prakerin</b> kepada pihak Industri.</p>
          <img class="img-responsive pad" src="../pictures/png/submit-surat-balasan.png" alt="Unggah-Surat-Balasan">
          <p>Selama proses mengunggah berkas, anda dapat memberikan keterangan atau info mengenai pengajuan anda melalui tombol <b><i>Tambah Feedback</i></b>.</p>
          <img class="img-responsive pad" src="../pictures/png/submit-berkas-lengkap.png" alt="Berkas-Lengkap">
          <p>Keterangan atau info tersebut bisa berupa <b>"Belum ada jawaban/respon dari industri"</b>, <b>"Ada industri alternatif"</b> atau info lain yang menerangkan progress pengajuan anda.</p>
          <img class="img-responsive pad" src="../pictures/png/submit-tambah-feedback.png" alt="Tambah-Feedback">
          <p><i>Feedback</i> yang telah ditambahkan dapat anda baca melalui tombol <b><i>Lihat Feedback</i></b>.</p>
          <img class="img-responsive pad" src="../pictures/png/submit-lihat-feedback.png" alt="Lihat-Feedback">
          <p>Apabila pengajuan <b>Utama</b> tidak bisa dilanjutkan, maka anda dapat membuat pengajuan <b>Alternatif</b>. </p>
          <img class="img-responsive pad" src="../pictures/png/submission-alt.png" alt="Pengajuan-Alt">
         
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        <p><b><i>Untuk menghindari hal-hal yang tidak diinginkan, disarankan untuk menghubungi pihak Industri terlebih dahulu apakah mereka siap menerima siswa Prakerin atau tidak.</i></b></p>
        </div>
        <!-- /.box-footer -->
      </div>
      @endrole

      @role(['admin','kps'])
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Menu Validasi Pengajuan</span>
            <!-- <span class="description">by Admin</span> -->
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <p>Pada menu Validasi Prakerin, anda dapat melakukan validasi pada pengajuan praktik kerja industri yang dibuat oleh siswa. 
          Terdapat 3 tab dengan masing-masing fungsi yang berbeda.
          <img class="img-responsive pad" src="../pictures/png/validation-view.png" alt="Validation-View">
          <p>Tab pertama berupa tabel daftar pengajuan yang membutuhkan validasi.</p>
          <p>Tab kedua berupa tabel daftar pengajuan yang telah disetujui.</p>
          <img class="img-responsive pad" src="../pictures/png/validation-approved.png" alt="Validasi-Disetujui">
          <p>Sedangkan, tabel terakhir berupa tabel daftar pengajuan yang telah ditolak.</p>
          <p>Anda dapat memperoleh keterangan atau info mengenai progress pengajuan yang dibuat siswa melalui tombol <b><i>Lihat Feedback</i></b>.</p>
          <img class="img-responsive pad" src="../pictures/png/validation-lihat-feedback.png" alt="Lihat-Feedback">
          
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      @endrole

      @role(['kps','wali-kelas'])
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Menu Rekap Pengajuan</span>
            <!-- <span class="description">by Admin</span> -->
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <p>Pada menu ini, anda dapat mencetak rekap data pengajuan praktik kerja industri.</p>
          <p>Tentukan tanggal Dari dan Hingga, lalu klik Submit.</p>
          <p>Kemudian, sistem akan men-generate file rekap data dalam format PDF.</p>
          <!-- <img class="img-responsive pad" src="../images/png/submissions-recap.png" alt="Rekap-Pengajuan"> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      @endrole

      @role(['kps','wali-kelas','siswa'])
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Menu Laporan & Sertifikat</span>
            <!-- <span class="description">by Admin</span> -->
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        @role('siswa')
          <p>Pada menu ini, anda dapat mengunggah laporan & sertifikat praktik kerja industri.
          Unggah berkas-berkas tersebut setelah anda menyelesaikan praktik kerja industri.</p>
          <img class="img-responsive pad" src="../pictures/png/reports-view-siswa.png" alt="Laporan-Sertifikat">
        @endrole
        @role('wali-kelas')
          <p>Pada menu ini, anda dapat melihat laporan & sertifikat praktik kerja industri yang telah diunggah oleh siswa.</p>
          <img class="img-responsive pad" src="../pictures/png/reports-view-walas.png" alt="Laporan-Sertifikat">
        @endrole
        @role(['admin','kps'])
          <p>Pada menu ini, anda dapat melihat laporan & sertifikat praktik kerja industri yang telah diunggah oleh siswa.</p>
          <img class="img-responsive pad" src="../pictures/png/reports-view-kps.png" alt="Laporan-Sertifikat">
        @endrole
          <!-- <p>Terdapat 3 tab yang masing-masing memiliki fungsi berbeda. Tab pertama paling atas berupa tabel daftar pengajuan yang membutuhkan validasi.</p> -->
          <!-- <img class="img-responsive pad" src="../images/png/reports.png" alt="Laporan-Sertifikat"> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      @endrole

       @role(['kps','wali-kelas'])
       <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Menu Rekap Laporan & Sertifikat</span>
            <!-- <span class="description">by Admin</span> -->
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <p>Pada menu ini, anda dapat mencetak rekap data laporan & sertifikat praktik kerja industri.</p>
          <p>Tentukan tanggal Dari dan Hingga, lalu klik Submit.</p>
          <p>Kemudian, sistem akan men-generate file rekap data dalam format PDF.</p>
          <!-- <img class="img-responsive pad" src="../images/png/report-recap.png" alt="Rekap-Laporan-Sertifikat"> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      @endrole

      @role(['kps','wali-kelas','siswa'])
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Menu Nilai</span>
            <!-- <span class="description">by Admin</span> -->
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        @role('siswa')
          <p>Pada menu ini, anda dapat melihat nilai praktik kerja industri. 
          Untuk lebih lengkap, anda bisa klik tombol <b>Detail</b>.</p>
          <img class="img-responsive pad" src="../pictures/png/score-view-siswa.png" alt="Nilai">
        @endrole
        @role('wali-kelas')
          <p>Pada menu ini, anda berhak meng-input nilai praktik kerja industri siswa melalui tombol <b>Ubah Nilai</b>.
          <img class="img-responsive pad" src="../pictures/png/score-view-walas.png" alt="Nilai">
        @endrole
        @role(['admin','kps'])
          <p>Pada menu ini, anda dapat melihat nilai praktik kerja industri yang telah di-input oleh wali kelas.</p>
          <img class="img-responsive pad" src="../pictures/png/score-view-kps.png" alt="Nilai">
        @endrole
        @role(['admin','kps','wali-kelas'])
        Anda juga dapat mencetak nilai praktik kerja industri per siswa dengan klik tombol <b>Cetak Nilai</b>.</p>
        @endrole
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      @endrole

       @role(['kps','wali-kelas'])
       <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Menu Rekap Nilai</span>
            <!-- <span class="description">by Admin</span> -->
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <p>Pada menu ini, anda dapat mencetak rekap data nilai praktik kerja industri.</p>
          <p>Tentukan tanggal Dari dan Hingga, lalu klik Submit.</p>
          <p>Kemudian, sistem akan men-generate file rekap data dalam format PDF.</p>
          <!-- <img class="img-responsive pad" src="../pictures/png/score-recap.png" alt="Rekap-Nilai"> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      @endrole

      @role('admin')
      <div class="box box-widget">
        <div class="box-header with-border">
          <div class="user-block">
            <span class="username">Management</span>
            <!-- <span class="description">by Admin</span> -->
          </div>
          <!-- /.user-block -->
          <div class="box-tools">
            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="Mark as read">
              <i class="fa fa-circle-o"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <p>Pada bagian Management, anda berhak untuk melakukan manajemen (CRUD) pada menu User, Kelas, dan Status.</p>
          <p>Pada menu User, anda dapat meng-input user baru dengan ketentuan yang lebih spesifik.</p>
           <img class="img-responsive pad" src="../pictures/png/user-view.png" alt="User-View">
          <p>Perhatikan tampilan berikut. Melalui menu ini, anda dapat mengaktifkan user yang memiliki <i>Role</i> sebagai <b>"siswa"</b>.</p>
          <img class="img-responsive pad" src="../pictures/jpg/unlocking-user.jpg" alt="User-Activation">
          <p>Klik tombol <b><i>Unlock</i></b> lalu klik <b>Aktifkan</b> agar user tersebut dapat membuat pengajuan lagi.</p>
          <img class="img-responsive pad" src="../pictures/png/user-unlock.png" alt="User-Activation-Confirm">
          <p>Pada menu Kelas, anda dapat menambah dan mengubah data kelas.</p>
          <p>Pada menu Status, anda dapat melakukan manajemen data status sebagai keterangan pada pengajuan prakerin.</p>
          <!-- <p>Pada menu Role, anda dapat melakukan manajemen data role atau peran sesuai dengan kebutuhan.</p> -->
          <!-- <p>Pada menu Permission, anda dapat melakukan manajemen data permission yang berupa tugas untuk masing-masing role.</p> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      @endrole
@stop