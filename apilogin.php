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

// Retrieve POST data
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validate username and password (replace this with your authentication logic)
$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
$result = $koneksi->query($query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(array("message" => "Login failed. Invalid username or password."));
}

$koneksi->close();
?>
