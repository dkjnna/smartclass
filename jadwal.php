<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smart Class | Penjadwalan</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
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
        <a href="index.php" class="nav-link">Beranda</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <?php
  session_start();

  if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
      echo '<li class="nav-item">';
      echo '<a class="nav-link" href="#" role="button">';
      echo '<strong>Selamat datang,</strong> ' .$_SESSION['username']; // Menampilkan nama admin yang tersimpan di session
      echo '</a>';
      echo '</li>';
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
        <a class="nav-link" data-widget="login"  href="#" onclick="togglePopup()" role="button">
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
        <!-- ======================================================================== -->
    
        <div class="overlay" id="overlay"></div>
                    <!-- Konten popup -->
                    <div class="popup" id="popup">
                    <?php
                      if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
                          echo '<p>Anda sudah login sebagai ' . $_SESSION['username'] . '</p>';
                          echo '<a href="logout.php" class="btn btn-danger">Logout</a>';
                      } else {
                          echo '<p style="font-size:20px">Silakan login untuk melanjutkan</p>';
                          echo '<a href="login.php" class="btn btn-primary ">Login</a>';
                      }
                    ?>
                    <button class="btn btn-secondary" onclick="togglePopup()" >Kembali</button>
                  </div>
                  <!-- ========================================================================= -->
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penjadwalan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
              <li class="breadcrumb-item active">Penjadwalan</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    
      <div class="container-fluid">
        <div class="card">
            <div class="card-body">
            <?php
// Koneksi ke database menggunakan PDO
$host = "localhost";
$dbname = "smart_class";
$username = "root";
$password = "";

// Fungsi untuk menghitung jumlah mata pelajaran pada waktu tertentu
function countMataPelajaran($hari, $jam, $id_kelas, $id_guru, $conn)
{
    try {
        $query = "SELECT COUNT(DISTINCT id_mapel) as count FROM jadwal WHERE hari = :hari AND jam = :jam AND id_kelas = :id_kelas AND id_guru = :id_guru";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':hari', $hari, PDO::PARAM_STR);
        $stmt->bindParam(':jam', $jam, PDO::PARAM_STR);
        $stmt->bindParam(':id_kelas', $id_kelas, PDO::PARAM_INT);
        $stmt->bindParam(':id_guru', $id_guru, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $result['count'];

        return $count;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk mendapatkan jadwal kelas tertentu
    $id_kelas = 22; // Ganti dengan id_kelas yang sesuai
    $query = "SELECT * FROM jadwal WHERE id_kelas = :id_kelas ORDER BY hari, jam";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_kelas', $id_kelas, PDO::PARAM_INT);
    $stmt->execute();
    $jadwal = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Variabel penanda untuk menandai waktu yang sudah ditampilkan
    $displayedTimes = array();
    $no=1;


    echo '<table border="1">';
    // Loop untuk menampilkan jadwal
    foreach ($jadwal as $jadwalItem) {
        // Cek apakah waktu ini sudah ditampilkan
        $timeKey = $jadwalItem['hari'] . $jadwalItem['jam'];
        if (!isset($displayedTimes[$timeKey])) {
            // Jika belum ditampilkan, tampilkan row dengan rowspan yang sesuai
            echo '<tr>';
            echo '<td>'.$no++.'<td>';
            echo '<td rowspan="' . countMataPelajaran($jadwalItem['hari'], $jadwalItem['jam'], $jadwalItem['id_kelas'], $jadwalItem['id_guru'], $conn) . '">' . $jadwalItem['hari'] . '</td>';
            echo '<td rowspan="' . countMataPelajaran($jadwalItem['hari'], $jadwalItem['jam'], $jadwalItem['id_kelas'], $jadwalItem['id_guru'], $conn) . '">' . $jadwalItem['jam'] . ' - ' . $jadwalItem['jam'] . '</td>';
            // ...
            
            echo '<td>' . $jadwalItem['id_mapel'] . '</td>';
            echo '</tr>';

            // Tandai waktu sebagai sudah ditampilkan
            $displayedTimes[$timeKey] = true;
        } else {
            // Jika waktu ini sudah ditampilkan, hanya tampilkan mata pelajaran
            echo '<tr>';
            echo '<td>' . $jadwalItem['id_mapel'] . '</td>';
            echo '</tr>';
        }
    }
    echo '</table>'; 
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>

        <!-- /.row -->
            </div>
            <!-- /.card -->
          </div>
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
