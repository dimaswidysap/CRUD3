<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "alif"; // Sesuaikan dengan nama database baru

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { die("Koneksi gagal: " . mysqli_connect_error()); }
?>