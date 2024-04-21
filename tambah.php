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
                <h3 class="card-title">Tambah Data Tugas</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="tambahproses.php" >
                <div class="card-body" >
                  <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d');?>" required>
                  </div>
                  <div class="form-group">
                    <label for="mapel">Mapel</label>
                    <select class="form-control" name="mapel" required>
            <?php
                include 'koneksi.php';

                $query = "SELECT * FROM `mapel`"; // Gantilah dengan nama tabel yang sesuai
                $result = mysqli_query($koneksi, $query);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['mapel'] . "'>" . $row['mapel'] . "</option>";
                    }
                }

                mysqli_close($koneksi);
                ?>
            </select>
                  </div>
                  <div class="form-group">
                    <label for="namatugas">Nama Tugas</label>
                    <input type="text" class="form-control" id="namatugas" name="namatugas">
                  </div>
                  <div class="form-group">
                    <label for="tugas">Tugas</label>
                    <input type="text" class="form-control" rows="5" id="tugas" name="tugas">
                  </div>
                  <div class="form-group">
                    <label for="waktu">Tenggat Waktu</label>
                    <input type="date" class="form-control" id="waktu" name="waktu">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tambah</button>
                  <a href="datatugas.php" class="btn btn-primary">Kembali</a>
                </div>
              </form>
            </div>
              </form>
      </div>
      </div>
      </div>
</section>
</div>
</body>