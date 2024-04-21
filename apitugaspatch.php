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

// Handle PATCH request to update data  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a field named "id" in your form
    $id = isset($_GET['id']) ? $_GET['id'] : null;


    // Fetch the existing data for the specified ID
    $fetchQuery = "SELECT * FROM tugas WHERE id = $id";
    $result = $koneksi->query($fetchQuery);

    if ($result->num_rows > 0) {
        $existingData = $result->fetch_assoc();

        // $mapel1 = mysqli_real_escape_string($koneksi, $_POST['mapel']);

        // Assuming you have fields named "field1", "field2", etc. in your form
        $tanggal = isset($_POST['tanggal']) ? mysqli_real_escape_string($koneksi, $_POST['tanggal']) : $existingData['tanggal'];
        $mapel = isset($_POST['mapel']) ?  mysqli_real_escape_string($koneksi, $_POST['mapel']) : $existingData['mapel'];
        $namatugas = isset($_POST['namatugas']) ? mysqli_real_escape_string($koneksi, $_POST['namatugas']) : $existingData['namatugas'];
        $tugas = isset($_POST['tugas']) ? mysqli_real_escape_string($koneksi, $_POST['tugas']) : $existingData['tugas'];
        $waktu = isset($_POST['waktu']) ? mysqli_real_escape_string($koneksi, $_POST['waktu']) : $existingData['waktu'];
        // Add more fields as needed

        // Update data in the "tugas" table
        $updateQuery = "UPDATE tugas SET tanggal = '$tanggal', mapel = '$mapel', namatugas = '$namatugas', tugas = '$tugas', waktu = '$waktu' WHERE id = '$id'";
        if ($koneksi->query($updateQuery) === TRUE) {
            $response = array("message" => "Data berhasil diperbarui");
        } else {
            $response = array("message" => "Gagal memperbarui data: " . $koneksi->error);
        }
    } else {
        $response = array("message" => "Data dengan ID $id tidak ditemukan");
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
