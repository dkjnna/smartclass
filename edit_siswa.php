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
            $nama = $_POST['nama'];
            $nisn = $_POST['nisn'];
            $nik = $_POST['nik'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];
            $no_rumah = $_POST['no_rumah'];

            

            $updateQuery = "UPDATE data_siswa SET
                            nama = '$nama',
                            nisn = '$nisn',
                            nik = '$nik',
                            alamat = '$alamat',
                            no_hp = '$no_hp',
                            no_rumah = '$no_rumah'
                            WHERE id = $id";

            $updateResult = mysqli_query($koneksi, $updateQuery);

            if ($updateResult) {
                echo "<div class='alert alert-success'>Data berhasil diupdate.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: " . mysqli_error($koneksi) . "</div>";
            }
            header("location:datasiswa.php");
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $selectQuery = "SELECT * FROM data_siswa WHERE id = $id";
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
                    <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
                    
                  </div>
                  <div class="form-group">
                    <label for="nisn">NISN</label>
                <input type="text" class="form-control" name="nisn" value="<?php echo $row['nisn']; ?>">
                    
                  </div>
                  <div class="form-group">
                    <label for="nik">NIK</label>
                <input type="text" class="form-control" name="nik" value="<?php echo $row['nik']; ?>">
                    
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
    <textarea class="form-control" name="alamat"><?php echo $row['alamat']; ?></textarea>
                    
                  </div>
                  <div class="form-group">
                    <label for="no_hp">Nomor Telepon</label>
                <input type="text" class="form-control" name="no_hp" value="<?php echo $row['no_hp']; ?>">
                    
                  </div>
                  <div class="form-group">
                    <label for="no_rumah">Nomor Telepon Rumah</label>
                <input type="text" class="form-control" name="no_rumah" value="<?php echo $row['no_rumah']; ?>">
                    
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                  <a href="datasiswa.php" class="btn btn-primary">Kembali</a>
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