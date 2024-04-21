<?php
// error_reporting(E_ERROR | E_PARSE);
session_start();

// Fungsi untuk memeriksa apakah pengguna sudah login sebagai admin
function isAdminLoggedIn() {
  return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}



function hasClassAccess($admin_kelas, $siswa_kelas) {
  return $admin_kelas == $siswa_kelas;
}

// Fungsi untuk menampilkan tombol aksi sesuai hak akses admin
function displayActionButtons($id, $siswa_kelas) {
  if (isAdminLoggedIn() && hasClassAccess($_SESSION['admin_kelas'], $siswa_kelas)) {
      echo '<td>';
      echo '<a href="edit_siswa.php?id=' . $id . '" class="btn btn-sm btn-primary" style="background-color: #001E6C; border:none; margin-right:1rem;">Edit</a>';
      // Tambahkan tombol tambah dan hapus sesuai kebutuhan
      echo '</td>';
  }
}

// Fungsi untuk menampilkan tombol log out jika pengguna sudah login
function displayLogoutButton() {
    echo '
    <a href="logout.php" class="btn btn-warning ml-3 mb-2 mt-1 mr-2" style="float: right; width:100px;" onclick="return confirmLogout();">Logout</a><br>
    ';
}

function displayprofile(){
  echo '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smart Class | Data Siswa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- jsGrid -->
  <link rel="stylesheet" href="plugins/jsgrid/jsgrid.min.css">
  <link rel="stylesheet" href="plugins/jsgrid/jsgrid-theme.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
        <a href="in.php" class="nav-link">Beranda</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <?php


// // Periksa apakah user sudah login
// if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'user') {
//     // Jika belum login, alihkan ke halaman login
//     header("Location: index.php");
//     exit();
// }
// if (!isset($_SESSION['id_admin']) || $_SESSION['role'] != 'admin') {
//   // Jika belum login, alihkan ke halaman login
//   header("Location: index.php");
//   exit();
// }

// Ambil informasi user atau admin dari sesi
if ($_SESSION['role'] === 'user') {
  // Jika yang login adalah user
  $id_user = $_SESSION['id_user'];
  $id_kelas = $_SESSION['id_kelas'];
} elseif ($_SESSION['role'] === 'admin') {
  // Jika yang login adalah admin
  $id_admin = $_SESSION['id_admin'];
  $id_kelas = $_SESSION['id_kelas_admin'];
}


// Koneksi ke database (gantilah dengan detail koneksi Anda)
$koneksi = mysqli_connect("localhost", "root", "", "smart_class");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Kueri untuk menampilkan tugas sesuai kelas user
// Warning
// : Undefined array key "id_user" in
// C:\xampp\htdocs\sc\datasiswa.php
// on line
// 123


// Warning
// : Undefined array key "id_kelas" in
// C:\xampp\htdocs\sc\datasiswa.php
// on line
// 124


// Warning
// : Undefined array key "id_kelas" in
// C:\xampp\htdocs\sc\datasiswa.php
// on line
// 128

// Tampilkan data tugas user

// Tutup koneksi
mysqli_close($koneksi);
?>

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
    <a href="index.php" class="brand-link">
      <img src="logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Smart Class</span>
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
            <h1>Data Siswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
              <li class="breadcrumb-item active">Data Siswa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php
        include 'koneksi.php'; // Pastikan file 'koneksi.php' tersedia dan sudah benar

        $query_siswa_user = "SELECT * FROM data_siswa WHERE id_kelas = '$id_kelas'";
$result_siswa_user = mysqli_query($koneksi, $query_siswa_user);// Pastikan koneksi ke database telah dibuat
        ?>
          
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
    <button class="btn btn-secondary" onclick="togglePopup()">Kembali</button>
</div>

                  <!-- ========================================================================= -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Siswa</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="background-color:#FCD900">No</th>
                    <th style="background-color:#FCD900">Nama</th>
                    <th style="background-color:#FCD900">NISN</th>
                    <th style="background-color:#FCD900">NIK</th>
                    <th style="background-color:#FCD900">Alamat</th>
                    <th style="background-color:#FCD900">Telepon</th>
                    <th style="background-color:#FCD900">Nomor Wali</th>
                  
                      
                    </tr>
                  </thead>
                  <tbody>
                  <?php
    $id = 1;
    while ($row_siswa_user = mysqli_fetch_assoc($result_siswa_user)) {
        echo "<tr>";
        echo "<td>" . $id++ . "</td>";
        echo "<td>" . $row_siswa_user['nama'] . "</td>";
        echo "<td>" . $row_siswa_user['nisn'] . "</td>";
        echo "<td>" . $row_siswa_user['nik'] . "</td>";
        echo "<td>" . $row_siswa_user['alamat'] . "</td>";
        echo "<td>" . $row_siswa_user['no_hp'] . "</td>";
        echo "<td>" . $row_siswa_user['no_rumah'] . "</td>";

        
        echo "</tr>";
    }
    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
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
