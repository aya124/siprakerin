@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <!-- <p><h4> Selamat Datang di SIPRAKERIN!</h4></p> -->
    
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
        <p>Sebagai Admin, anda memiliki kendali penuh terhadap semua menu utama yang terdapat pada SIPRAKERIN.</p>
        @endrole
          <p>Pada menu Data Industri, anda dapat mengetahui industri mana saja yang bisa menjadi tempat dalam melaksanakan praktik kerja industri.
          @role(['wali-kelas','siswa'])
          <img class="img-responsive pad" src="../images/png/industry-view.png" alt="Industri">
          @endrole
          @role(['admin','kps'])
          <img class="img-responsive pad" src="../images/png/industry-view-admin.png" alt="Industry-View">
          @endrole
          <p>Untuk memudahkan pencarian, anda dapat menggunakan fitur <b><i>Search</i></b>.</p>
          <img class="img-responsive pad" src="../images/png/industry-search.png" alt="Cari-Industri">
          <p>Anda dapat melihat masing-masing data industri lebih lengkap melalui tombol <b><i>Detail</i></b>.</p>
          <p>Anda berhak menambah data industri sesuai dengan informasi yang anda ketahui melalui tombol <b><u>Tambah Industri</u></b>. <br />
          Pastikan data yang anda input benar-benar valid.</p>
          
          @role(['wali-kelas','siswa'])
          <p>Setelah menambah industri baru, anda masih bisa mengubah data industri melalui tombol <b><i>Edit</i></b>.</p>
          <p>Jika tombol <b><i>Edit</i></b> tidak tersedia, maka anda bisa memberikan info mengenai industri melalui tombol <b><u>Saran</u></b>.</p>
          <p>Saran yang telah ditambahkan dapat anda baca melalui tombol <b><u>Lihat Saran</u></b>.</p>
          @endrole
          @role(['admin','kps'])
          <p>Setelah menambah industri baru, anda bisa mengubah data industri melalui tombol <b><i>Edit</i></b>.</p>
          
          <p>Apabila anda menekan tombol <b><i>Edit</i></b>, perhatikan kolom <b>Status</b>. Secara <i>default</i>, status industri yang baru ditambahkan adalah <b>"Belum disetujui"</b>.</br />
          <img class="img-responsive pad" src="../images/png/industry-view-admin-status.png" alt="Industry-Status">
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

      <!-- @role('siswa') -->
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
          <img class="img-responsive pad" src="../images/png/submission-empty.png" alt="Pengajuan-Kosong">
          <p>Setelah itu, pilih <b>nama industri</b> yang anda inginkan serta isi <b>tanggal mulai</b> dan <b>tanggal selesai</b> dengan benar. Lalu, klik <b><i>Submit</i></b>.</p>
          <img class="img-responsive pad" src="../images/png/submission-making.png" alt="Membuat-Pengajuan">
          Anda hanya berkesempatan membuat 1 (satu) Pengajuan yang dimana disebut sebagai pengajuan <b>Utama</b>.
          <img class="img-responsive pad" src="../images/png/submission-main.png" alt="Pengajuan-Utama">
          <p>Selama menunggu persetujuan, anda masih bisa mengganti industri dan tanggal pelaksanaan prakerin serta mencetak <b>Form Pengajuan</b>.</p>
          <img class="img-responsive pad" src="../images/png/submission-edit.png" alt="Mengubah-Pengajuan">
          <p>Jika pengajuan telah disetujui, anda dapat mengunggah berkas-berkas yang diperlukan, yaitu
          <b>Surat Pengantar Prakerin</b> dan <b>Surat Balasan dari Industri</b>.</p>
          <p>Berkas pertama yang diunggah adalah <b>Surat Pengantar Prakerin</b> yang anda peroleh setelah menyerahkan <b>Form Pengajuan</b> ke BKK.</p>
          <p>Sedangkan, <b>Surat Balasan dari Industri</b> adalah berkas yang anda peroleh setelah menyerahkan <b>Surat Pengantar Prakerin</b> kepada pihak Industri.</p>
          <p>Selama proses mengunggah berkas, anda dapat memberikan keterangan atau info mengenai pengajuan anda melalui tombol <b><i>Feedback</i></b>.</p>
          <p>Keterangan atau info tersebut bisa berupa <b>"Belum ada jawaban/respon dari industri"</b>, <b>"Ada industri alternatif"</b> atau info lain yang menerangkan progress pengajuan anda.</p>
          <p>Apabila memang tidak ada progress pada pengajuan <b>Utama</b>, maka anda dapat membuat pengajuan <b>Alternatif</b>.</p>
          <p><i>Feedback</i> yang telah ditambahkan dapat anda baca melalui tombol <b><i>Lihat Feedback<i></b>.</p>
          @role(['admin','kps'])
          <p>Anda dapat memperoleh keterangan atau info mengenai progress pengajuan yang dilakukan siswa melalui tombol <b><i>Lihat Feedback<i></b>.</p>
          @endrole
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        <p>Untuk menghindari hal-hal yang tidak diinginkan, disarankan untuk menghubungi pihak Industri terlebih dahulu apakah mereka siap menerima siswa Prakerin atau tidak.</p>
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- @endrole -->

      <!-- @role(['admin','kps']) -->
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
          <img class="img-responsive pad" src="../images/png/validation-view.png" alt="Validation-View">
          <p>Tab pertama berupa tabel daftar pengajuan yang membutuhkan validasi.</p>
          <p>Tab kedua berupa tabel daftar pengajuan yang telah disetujui.</p>
          <p>Sedangkan, tabel terakhir berupa tabel daftar pengajuan yang telah ditolak.</p>
          <!-- <img class="img-responsive pad" src="../images/png/validasi.png" alt="Validasi-Pengajuan"> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- @endrole -->

      <!-- @role(['admin','kps','wali-kelas']) -->
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
          <!-- <img class="img-responsive pad" src="../images/png/submission-recap.png" alt="Rekap-Pengajuan"> -->
          <!-- <p>Tunggu persetujuan dari Admin supaya data tersebut dapat anda pilih pada fitur Pengajuan Prakerin</p> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- @endrole -->

      <!-- @role(['admin','kps','wali-kelas','siswa']) -->
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
        @endrole
        @role(['admin','kps','wali-kelas'])
          <p>Pada menu ini, anda dapat melihat laporan & sertifikat praktik kerja industri yang telah diunggah oleh siswa.</p>
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
      <!-- @endrole -->

       <!-- @role(['admin','kps','wali-kelas']) -->
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
          <!-- <p>Tunggu persetujuan dari Admin supaya data tersebut dapat anda pilih pada fitur Pengajuan Prakerin</p> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- @endrole -->

      <!-- @role(['admin','kps','wali-kelas','siswa']) -->
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
          Untuk lebih lengkap, anda bisa klik tombol <b>Lihat Nilai</b>.</p>
        @endrole
        @role('wali-kelas')
          <p>Pada menu ini, anda berhak meng-input nilai praktik kerja industri siswa melalui tombol <b>Ubah Nilai</b>.
        @endrole
        @role(['admin','kps'])
          <p>Pada menu ini, anda dapat melihat nilai praktik kerja industri yang telah di-input oleh wali kelas.</p>
        @endrole
        @role(['admin','kps','wali-kelas'])
        Anda juga dapat mencetak nilai praktik kerja industri per siswa dengan klik tombol <b>Cetak Nilai</b>.</p>
        @endrole
          <!-- </p>Terdapat 3 tab yang masing-masing memiliki fungsi berbeda. Tab pertama paling atas berupa tabel daftar pengajuan yang membutuhkan validasi.</p> -->
          <!-- <img class="img-responsive pad" src="../images/png/scores.png" alt="Nilai"> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- @endrole -->

       <!-- @role(['admin','kps','wali-kelas']) -->
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
          <!-- <img class="img-responsive pad" src="../images/png/score-recap.png" alt="Rekap-Nilai"> -->
          <!-- <p>Tunggu persetujuan dari Admin supaya data tersebut dapat anda pilih pada fitur Pengajuan Prakerin</p> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- @endrole -->

      <!-- @role('admin') -->
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
          <p>Pada bagian Management, anda berhak untuk melakukan manajemen (CRUD) pada menu User, Kelas, Status, Role, dan Permission.</p>
          <p>Pada menu User, anda dapat meng-input user baru dengan ketentuan yang lebih spesifik.</p>
           <img class="img-responsive pad" src="../images/png/user-view.png" alt="User-View">
          <p>Perhatikan tampilan berikut. Melalui menu ini, anda dapat mengaktifkan user dengan <i>Role</i> <b>"siswa"</b>.</p>
          <img class="img-responsive pad" src="../images/jpg/unlocking-user.jpg" alt="User-Activation">
          <p>Klik tombol <b><u>Aktifkan</u></b> agar user tersebut dapat membuat pengajuan lagi.</p>
          <img class="img-responsive pad" src="../images/png/user-unlock.png" alt="User-Activation-Confirm">
          <p>Pada menu Kelas, anda dapat meng-input dan mengubah data kelas.</p>
          <p>Pada menu Status, anda dapat melakukan manajemen data status sebagai keterangan pada pengajuan prakerin.</p>
          <p>Pada menu Role, anda dapat melakukan manajemen data role atau peran sesuai dengan kebutuhan.</p>
          <p>Pada menu Permission, anda dapat melakukan manajemen data permission yang berupa tugas untuk masing-masing role.</p>
          <!-- <img class="img-responsive pad" src="../images/png/management.png" alt="Management"> -->
          <!-- <p>Tunggu persetujuan dari Admin supaya data tersebut dapat anda pilih pada fitur Pengajuan Prakerin</p> -->
        </div>
        <!-- /.box-body -->
        <!-- /.box-footer -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer -->
      </div>
      <!-- @endrole -->
@stop

