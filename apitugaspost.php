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

// Handle POST request to insert new data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have fields named "field1", "field2", etc. in your form
    $tanggal = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $mapel = mysqli_real_escape_string($koneksi, $_POST['mapel']);
    $namatugas = mysqli_real_escape_string($koneksi, $_POST['namatugas']);
    $tugas = mysqli_real_escape_string($koneksi, $_POST['tugas']);
    $waktu = mysqli_real_escape_string($koneksi, $_POST['waktu']);
    // Add more fields as needed

    // Insert data into the "tugas" table
    $insertQuery = "INSERT INTO tugas (tanggal, mapel, namatugas, tugas, waktu) VALUES ('$tanggal', '$mapel', '$namatugas', '$tugas', '$waktu')";
    if ($koneksi->query($insertQuery) === TRUE) {
        $response = array("message" => "Data berhasil ditambahkan");
    } else {
        $response = array("message" => "Gagal menambahkan data: " . $koneksi->error);
    }

    // Tampilkan response dalam format JSON
    echo json_encode($response);
} else {
    // Handle GET request to retrieve data
    // Query untuk mengambil semua data dari tabel absen
    $query = "SELECT * FROM tugas";
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
}
?>
