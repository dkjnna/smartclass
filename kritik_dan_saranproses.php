<?php
// Lakukan koneksi ke database, pastikan sudah memiliki informasi koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$database = "smart_class";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data yang dikirim dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    // Query untuk memasukkan data ke dalam tabel hubungi
    $sql = "INSERT INTO kritik (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman 'hubungi' setelah data berhasil disimpan
        echo "<script>alert('Inputan berhasil dikirim');</script>";
        header("Location: kritik_dan_saran.php?success=1");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi database setelah selesai
$conn->close();
?>
