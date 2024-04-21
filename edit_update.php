<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Smart Class | Beranda</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition sidebar-mini" >
<div class="wrapper">
<section class="content">
<div class="container mt-5">
      <div class="container-fluid" >
        
      <div class="card card-primary" >
              <div class="card-header">
                <h3 class="card-title">Edit Data Tugas</h3>
              </div>
              <?php
        include 'koneksi.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $tanggal = $_POST['tanggal'];
            $mapel = $_POST['mapel'];
            $namatugas = $_POST['namatugas'];
            $tugas = $_POST['tugas'];
            $waktu = $_POST['waktu'];

            $updateQuery = "UPDATE tugas SET
                            tanggal = '$tanggal',
                            mapel = '$mapel',
                            namatugas = '$namatugas',
                            tugas = '$tugas',
                            waktu = '$waktu'
                            WHERE id = $id";

            $updateResult = mysqli_query($koneksi, $updateQuery);

            if ($updateResult) {
                echo "<div class='alert alert-success'>Data berhasil diupdate.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($koneksi) . "</div>";
            }
            header("location:datatugas.php");
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $selectQuery = "SELECT * FROM tugas WHERE id = $id";
            $result = mysqli_query($koneksi, $selectQuery);

            if (!$result) {
                echo "Error: " . mysqli_error($koneksi);
            } else {
                $row = mysqli_fetch_assoc($result);
            }
        ?>
              <form method="post" >
                <div class="card-body" >
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" value="<?php echo $row['tanggal']; ?>">
                    
                  </div>
                  <div class="form-group">
                    <label for="mapel">Mapel</label>
                    <select  class="form-control" name="mapel">
                <option value="pkwu" <?php echo ($row['mapel'] == 'pkwu') ? 'selected' : ''; ?>>pkwu</option>
        <option value="ppl" <?php echo ($row['mapel'] == 'ppl') ? 'selected' : ''; ?>>ppl</option>
        <option value="basis data" <?php echo ($row['mapel'] == 'basis data') ? 'selected' : ''; ?>>basis data</option>
            <option value="web programming" <?php echo ($row['mapel'] == 'web programming') ? 'selected' : ''; ?>>web programming</option>
            <option value="bahasa indonesia" <?php echo ($row['mapel'] == 'bahasa indonesia') ? 'selected' : ''; ?>>bahasa indonesia</option>
            <option value="bahasa inggris" <?php echo ($row['mapel'] == 'bahasa inggris') ? 'selected' : ''; ?>>bahasa inggris</option>
            <option value="bahasa arab" <?php echo ($row['mapel'] == 'bahasa arab') ? 'selected' : ''; ?>>bahasa arab</option>
            <option value="sejarah" <?php echo ($row['mapel'] == 'sejarah') ? 'selected' : ''; ?>>sejarah</option>
            <option value="fotografi" <?php echo ($row['mapel'] == 'fotografi') ? 'selected' : ''; ?>>fotografi</option>
            <option value="matematika" <?php echo ($row['mapel'] == 'matermatika') ? 'selected' : ''; ?>>matematika</option>
            <option value="bk" <?php echo ($row['mapel'] == 'bk') ? 'selected' : ''; ?>>bk</option>
            <option value="ppkn" <?php echo ($row['mapel'] == 'ppkn') ? 'selected' : ''; ?>>ppkn</option>
            <option value="pjok" <?php echo ($row['mapel'] == 'pjok') ? 'selected' : ''; ?>>pjok</option>
            <option value="pai" <?php echo ($row['mapel'] == 'pai') ? 'selected' : ''; ?>>pai</option>
            <!-- Tambahkan pilihan mata pelajaran sesuai dengan database -->
        </select>
                  </div>
                  <div class="form-group">
                    <label for="namatugas">Nama Tugas</label>
                <input type="text" class="form-control" name="namatugas" value="<?php echo $row['namatugas']; ?>">
                    
                  </div>
                  <div class="form-group">
                    <label for="tugas">Tugas</label>
    <textarea class="form-control" name="tugas"><?php echo $row['tugas']; ?></textarea>
                    
                  </div>
                  <div class="form-group">
                    <label for="tenggat">Tenggat Waktu</label>
                <input type="date" class="form-control" name="waktu" value="<?php echo $row['waktu']; ?>">
                    
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <a href="datatugas.php" class="btn btn-primary">Kembali</a>
                </div>
              </form>
            </div>
              </form>
              <?php
            }
        

        mysqli_close($koneksi);
        ?>
      </div>
      </div>
      </div>
</section>
</div>
</body>
</html>