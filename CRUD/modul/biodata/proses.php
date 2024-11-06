<?php
include "../../koneksi.php";
if($_GET['action']=="insert"){
$npm = $_POST['Npm'];
$nama = $_POST['nama'];
$prodi= $_POST['prodi'];
$query = "INSERT INTO biodata (Npm,nama,prodi) VALUES ('$Npm', '$nama', '$prodi')";
$mysqli->query($query);
header('Location:../../index.php?modul=biodata');
}elseif ($_GET['action']=="update"){
    $id = $_GET['id'];
    $npm = $_POST['Npm'];
    $nama= $_POST['nama'];
    $query = "UPDATE biodata SET Npm='$npm', nama='$nama' where id='$id'";
$mysqli->query($query);
    header('location:../../index.php?modul=biodata');
}elseif ($_GET['action']=="delete") {
    $query = "DELETE FROM biodata where id='$_GET[id]'";
$mysqli->query($query);
    header('Location:../../index.php?modul=biodata');
}else{
    header('location:../../index.php');
}