<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Koneksi ke database
$host = "localhost";
$username = "root";
$password = "";
$database = "smart_class";

$koneksi = new mysqli($host, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi database gagal: " . $koneksi->connect_error);
}

// Query untuk mengambil semua data dari tabel absen
$query = "SELECT * FROM data_siswa";
$result = $koneksi->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = array("message" => "Tidak ada data absen yang ditemukan");
}

// Tampilkan data dalam format JSON
echo json_encode($data);
?>
