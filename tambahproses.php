<?php 
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "smart_class");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Retrieve data from the form
$tanggal = $_POST['tanggal'];
$mapel = $_POST['mapel'];
$namatugas = $_POST['namatugas'];
$tugas = $_POST['tugas'];
$waktu = $_POST['waktu'];

// Retrieve the id_kelas_admin from the session
$id_kelas_admin = $_SESSION['id_kelas_admin'];

// Insert data into the tugas table with id_kelas_admin
mysqli_query($koneksi, "INSERT INTO tugas VALUES ('0', '$tanggal', '$mapel', '$namatugas', '$tugas', '$waktu', '$id_kelas_admin')");

// Redirect to datatugas.php
header("location:datatugas.php");
?>
