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
  <title>Tentang | Smart Class</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <link rel="stylesheet" href="style.css">
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
        <a class="nav-link" data-widget="login" href="#" onclick="togglePopup()" role="button">
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
  <div class="content-wrapper" style="background-color: #F5F7F8;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tentang Smart Class</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda</a></li>
              <li class="breadcrumb-item active">Tentang Smart Class</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
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
            
        <div class="card card-primary card-outline" >
          <div class="card-header">
            <h3 class="card-title"></h3>
          </div> <!-- /.card-body -->
          <div class="card-body">
              <div class="content">
              <div class="content2">
                <img src="logo2.png" alt="" >
              </div>
              <div class="content1"  >
                <div class="text">
                <h1 >Selamat Datang di Smart Class</h1>
                <p >SmartClass adalah konsep pendidikan yang memanfaatkan teknologi untuk memberikan solusi terintegrasi dalam mengatur, data siswa, jadwal tugas dan mengkomunikasikan informasi penting dalam lingkungan pembelajaran.
                            Smart Class merupakan sebuah aplikasi yang menyediakan informasi penting mengenai data diri murid, jadwal pelajaran, jadwal piket kelas, maupun informasi mengenai tugas-tugas yang telah diberikan oleh guru.</p>
                <p>Smart Class sendiri dapat digunakan sebagai salah satu platform untuk mempermudah kita saat ingin melihat mengenai data diri murid, jadwal pelajaran, jadwal piket, serta tugas pekerjaan rumah yang diberikan oleh guru.
                  Smart Class merupakan sebuah aplikasi yang sangat praktis dan  efektif ketika kita kehilangan ataupun kita malas mencari sebuah data diri kita ataupun sebuah jadwal pelajaran, jadwal piket, maupun pekerjaan rumah yang telah diberikan oleh guru.</p>
                </div>
              </div>
            </div>
            <div>            
            </div>
          </div>
          
          <!-- /.card-body -->
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Fungsi
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              Smart Class adalah ruang kelas yang dilengkapi dengan teknologi digital untuk menciptakan cara mengajar dan belajar secara modern. 
              <br>Fungsinya adalah untuk mengelola data murid yang ada dikelas itu, mengelola penjadwalan, dan membuat daftar tugas.
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Fiture
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                  Dalam konteks perencanaan tugas, SmartClass menyediakan platform untuk mengelola dan menampilkan jadwal tugas secara otomatis bagi siswa.
                <br>Selain itu kami juga menambahkan fitur data siswa. Dimana siswa dapat melihat data diri sendiri apabila pihak sekolah meminta data tersebut. 
                <br>SmartClass menampilkan sistem penjadwalan kelas dan informasi jadwal piket dalam format yang mudah diakses.
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-text-width"></i>
                  Keuntungan
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul>
                Sebagai aplikasi pengolah data kelas, Smart Class sendiri memiliki beberapa keunggulan yaitu :
                  <li>meningkatkan efisiensi waktu siswa dengan kejelasan tugas yang harus diselesaikan.</li>
                  <li>mengurangi potensi tabrakan jadwal.</li>
                  <li>memberikan lingkungan belajar yang terstruktur.</li>
                  <li>memastikan siswa dapat memperoleh data diri secara lebih efektif dan memudahkan dalam mencari data tersebut.</li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
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
