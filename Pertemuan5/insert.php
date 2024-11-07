<?php
include "koneksi.php";
$npm = $_GET['npm'];
$nama = $_GET['nama'];
$prodi = $_GET['prodi'];
$query = "INSERT INTO biodata (npm,nama,prodi) VALUES('$npm','$nama','$prodi')";
$mysqli->query($query);
header('location:index.php');
?>