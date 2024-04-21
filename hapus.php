<?php
$id=$_REQUEST['id'];
include "koneksi.php";
mysqli_query($koneksi, "delete from tugas where id='$id'");
header("location:datatugas.php");
