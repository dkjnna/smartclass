<?php
// Mulai sesi
session_start();

// Ambil data dari formulir login
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Periksa apakah username dan password sudah ada
if (empty($username) || empty($password)) {
    // Handle kesalahan, seperti menampilkan pesan kepada pengguna
    echo "Username dan password harus diisi.";
    exit();
}

// Koneksi ke database (gantilah dengan detail koneksi Anda)
$koneksi = mysqli_connect("localhost", "root", "", "smart_class");

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Fungsi untuk mengalihkan ke halaman yang sesuai
function redirectToRole($role) {
    if ($role == 'user') {
        header("Location: in.php");
    } elseif ($role == 'admin') {
        header("Location: in.php");
    } else {
        // Jika role tidak valid, bisa diatur untuk mengarahkan ke halaman lain
        echo "Role tidak valid.";
        exit();
    }
}

// Kueri untuk login user
// Kueri untuk login user
$query_user = "SELECT id_user, id_kelas FROM users WHERE username = ? AND password = ? AND role = 'user'";
$stmt_user = mysqli_prepare($koneksi, $query_user);
mysqli_stmt_bind_param($stmt_user, "ss", $username, $password);
mysqli_stmt_execute($stmt_user);
$result_user = mysqli_stmt_get_result($stmt_user);
// ...

// Kueri untuk login admin
$query_admin = "SELECT id_admin, id_kelas FROM adm WHERE username = ? AND password = ?";
$stmt_admin = mysqli_prepare($koneksi, $query_admin);
mysqli_stmt_bind_param($stmt_admin, "ss", $username, $password);
mysqli_stmt_execute($stmt_admin);
$result_admin = mysqli_stmt_get_result($stmt_admin);
// ...

// Periksa apakah hasil kueri user ada
if ($result_user && mysqli_num_rows($result_user) > 0) {
    $row_user = mysqli_fetch_assoc($result_user);
    $_SESSION['id_user'] = $row_user['id_user'];
    $_SESSION['id_kelas'] = $row_user['id_kelas'];
    $_SESSION['username'] = $username; // Simpan nama admin ke dalam session
    $_SESSION['role'] = 'user';
    
    // Alihkan ke halaman user
    redirectToRole('user');
} elseif ($result_admin && mysqli_num_rows($result_admin) > 0) {
    // Periksa apakah hasil kueri admin ada
    $row_admin = mysqli_fetch_assoc($result_admin);
    $_SESSION['id_admin'] = $row_admin['id_admin'];
    $_SESSION['id_kelas_admin'] = $row_admin['id_kelas'];
    $_SESSION['username'] = $username; // Simpan nama admin ke dalam session
    $_SESSION['role'] = 'admin';
    // Alihkan ke halaman admin
    redirectToRole('admin');
} else {
    // Gagal login
    echo "Username atau password salah.";
    exit(); // Selesaikan eksekusi skrip jika login gagal
}

// Tutup koneksi
mysqli_close($koneksi);
?>
