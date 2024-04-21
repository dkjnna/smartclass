<?php
session_start();

// Fungsi untuk memeriksa apakah pengguna sudah login sebagai admin
function isAdminLoggedIn() {
  return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smart Class | Profil Sekolah</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <style>
    /* Gaya untuk latar belakang semi-transparan */
    .overlay {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 9999;
    }
    /* Gaya untuk konten popup */
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      z-index: 10000;
    }
    .popup h2 {
      margin-top: 0;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Beranda</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <?php
if (isAdminLoggedIn()) {
  // Tampilkan informasi admin yang login
  echo '<div style="background-color: #f0f0f0; padding: 10px;">';
  echo 'Selamat datang, Admin ' ; // Gantilah dengan nama variabel sesuai struktur data Anda
  echo ' | ' . $_SESSION['username'];
  echo '</div>';
}

if (!isAdminLoggedIn()) {
// Tampilkan informasi admin yang login
echo '<div style="background-color: #f0f0f0; padding: 10px;">';
echo 'Selamat datang, User ' ; // Gantilah dengan nama variabel sesuai struktur data Anda
echo ' | ' . $_SESSION['username'];
echo '</div>';
}
?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      <!-- Notifications Dropdown Menu -->
       <li class="nav-item dropdown">
        
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="login" href="#" onclick="togglePopup()"  role="button">
        <box-icon type='solid' name='user'></box-icon>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #001E6C;">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-bold" style="color: #fff; font-size: 25px;">Smart Class</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-color: #001E6C;">
      


      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Informasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profilsekolah.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil Sekolah</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tentang.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tentang Smart Class</p>
                </a>
              </li>
              
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Layanan Aplikasi
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="datasiswa.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Siswa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="penjadwalan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penjadwalan</p>
                </a>
              </li>              
              <li class="nav-item">
                <a href="datatugas.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Tugas</p>
                </a>
              </li>
            </ul>
            <li class="nav-item">
                <a href="kritik_dan_saran.php" class="nav-link">
                <i class="nav-icon fas fa-envelope"></i>
                  <p>Kritik dan Saran</p>
                </a>
              </li>
          </li>
        </ul>
        
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil Sekolah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Profil Sekolah</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>75</h3>

                <p>Jumlah Guru</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>1516</h3>

                <p>Jumlah Siswa/Siswi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>6</h3>

                <p>Jumlah Jurusan</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>45</h3>

                <p>Jumlah Kelas</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- ======================================================================== -->
    
        <div class="overlay" id="overlay"></div>
                    <!-- Konten popup -->
                    <div class="popup" id="popup">
                    <?php
                      if (isset($_SESSION['role'])) {
                        echo '<a href="logout.php" class="btn btn-danger">Logout</a>';
                    } else {
                        echo '<p style="font-size:20px">Silakan login untuk melanjutkan</p>';
                        echo '<a href="login.php" class="btn btn-danger">Logout</a>'; // Ubah warna tombol dan arahkan ke halaman logout
                    }
                    ?>
                    <button class="btn btn-secondary" onclick="togglePopup()" >Kembali</button>
                  </div>
                  <!-- ========================================================================= -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
              <div class="content">
              <div class="content2">
                <img src="logosmk.jpeg" alt="" >
              </div>
              <div class="content1"  >
                <div class="text">
                <h1 >SMKN 6 JEMBER</h1>
                <p >SMK Negeri 6 Jember merupakan salah satu instansi yang bergerak dalam bidang pendidikan yang terdapat di Kabupaten Jember Provinsi Jawa Timur yang memiliki beberapa jurusan. </p>
                <p>Sekolah ini merupakan satu dari beberapa skolah Kejuruan yang berada di kabupaten Jember.</p>
                </div>
              </div>
              </div>
            <div>
            
          </div>
          
          </div>
          <!-- /.card-body -->
          
        </div>
        <div class="video" style=" margin-top:20px;">
            <video autoplay="true" width="100%" loop="true" controls="true">
              <source src="Profil sekolah SMK NEGERI 6 JEMBER.MP4" type="video/mp4" style="margin-right:10px; margin-left:10px; ">
              Your browser does not support the video tag.
            </video>
          </div>

          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        </div>
        <!-- /.row -->

        <!-- =========================================================== -->
        <h4 class="mb-2 mt-4">Logo Jurusan </h4>
        <h5 class="mb-2">SMKN 6 JEMBER</h5>
        <div class="row">
        <div class="col-md-4">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Rekayasa Perangkat Lunak</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <img src="rpl.png" alt="" style="width: 50%; display: block; margin: auto;">
                <br>Rekayasa Perangkat Lunak adalah satu bidang profesi yang mendalami cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-black" >
              <div class="card-header" style="background-color: #000">
                <h3 class="card-title" style="color:#fff">Desain Komunikasi Visual</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <img src="dkv.png" alt="" style="width: 50%; display: block; margin: auto;">
                <br>Desain Komunikasi Visual atau lebih dikenal dengan singkatan DKV pada dasarnya merupakan istilah penggambaran untuk proses pengolahan media dalam berkomunikasi mengenai pengungkapan ide atau penyampaian informasi yang bisa terbaca atau terlihat
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Menejemen Perkantoran</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <img src="mp.png" alt="" style="width: 50%; display: block; margin: auto;">
                <br>Manajemen Perkantoran merupakan salah satu program keahlian di SMK Negeri 6 Jember yang berkontribusi dalam menjadikan peserta didik memiliki konsentrasi dalam bidang administrasi, teknologi informasi perkantoran, kearsipan, pengetikan naskah, penanganan telepon, kas kecil dan data entry.
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-4">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Akutansi</h3>

                <div class="card-tools">
                  
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" >
                <img src="ak.png" alt="" style="width: 50%; display: block; margin: auto;">
                <br>Jurusan Akuntansi di SMK Negeri 6 Jember adalah bidang studi yang mempelajari materi terkait metode pencatatan dan penyusunan laporan keuangan yang berguna membantu pemangku kepentingan dalam proses pengambilan keputusan.
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Bisnis Digital</h3>

                <div class="card-tools">
                  
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <img src="bd.png" alt="" style="width: 50%; display: block; margin: auto;">
                <br>Bisnis Digital merupakan jurusan yang mempelajari keilmuan dan praktik tentang bidang pemasaran dan pengembangan bisnis online melalui media Internet. Selama 3 tahun pembelajaran, siswa akan diajarkan bagaimana cara untuk menganalisa pasar dan menemukan peluang bisnis di dalamnya.
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-4">
            <div class="card card-cokelat" >
              <div class="card-header"style="background-color: #862B0D">
                <h3 class="card-title" style="color:#fff">Kriya Kreatif Batik Tekstil</h3>

                <div class="card-tools">
                  
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                    <i class="fas fa-expand"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <img src="kkbt.jpg" alt="" style="width: 40%; display: block; margin: auto;">
                <br>Kriya Kreatif Batik dan Tekstil merupakan suatu cabang seni kriya yang pekerjaannya membuat produk kerajinan dengan menggabungkan antara nilai fungsi dan nilai estetika atau hias dengan menggunakan bahan kain
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- =========================================================== -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<script>
  function togglePopup() {
    var popup = document.getElementById('popup');
    var overlay = document.getElementById('overlay');
    if (popup.style.display === 'block') {
      popup.style.display = 'none';
      overlay.style.display = 'none';
    } else {
      popup.style.display = 'block';
      overlay.style.display = 'block';
    }
  }
</script>
</body>
</html>
