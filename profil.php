<?php
session_start();

// Periksa apakah admin sudah login atau belum
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header('Location: login.php');
    exit;
}

// Koneksi ke database (contoh menggunakan PDO)
$host = 'localhost';
$dbname = 'smart_class';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Ambil data admin dari tabel admin
    $query = "SELECT nama FROM admin WHERE username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $_SESSION['username']);
    $stmt->execute();

    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika data ditemukan
    if ($admin) {
        $nama_admin = $admin['nama'];
        $username_admin = $_SESSION['username'];
    } else {
        // Jika data admin tidak ditemukan, lakukan sesuai kebutuhan (misalnya, kembali ke halaman login)
        header('Location: login.php');
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Admin</title>
    <!-- Tambahkan link ke Bootstrap CSS di sini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Profil Admin</h2>
    <p>Selamat datang, <?php echo $nama_admin; ?> (Username: <?php echo $username_admin; ?>)</p>
    <a href="logout.php" class="btn btn-danger">Logout</a>
    <a href="index.php" class="btn btn-primary">Kembali ke Halaman Utama</a>
</div>

<!-- Tambahkan link ke Bootstrap JS di sini -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
