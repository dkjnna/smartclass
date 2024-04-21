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
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);
    // Add more fields as needed

    // Insert data into the "tugas" table
    $insertQuery = "INSERT INTO kritik (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
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
    $query = "SELECT * FROM kritik";
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
