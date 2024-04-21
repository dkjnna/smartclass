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
$id = isset($_GET['id']) ? $_GET['id'] : null;
$query = "DELETE FROM tugas where id='$id'";
$result = $koneksi->query($query);

$data = [];

if (isset($result)) {
    $data = array("message" => "Data berhasil dihapus");
} else {
    $data = array("message" => "Tidak ada data absen yang ditemukan");
}

// Tampilkan data dalam format JSON
echo json_encode($data);
?>
