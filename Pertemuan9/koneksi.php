<?php
$mysqli = new mysqli("localhost", "root", "", "dbretail");
if ($mysqli->connect_error) {
    die("Koneksigagal: " .$mysqli->connect_error);
}
?>