<?php
session_start();
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "pandorasv2";

$koneksi = mysqli_connect($host, $user, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
} else {
    echo "koneksi berhasil";
}
?>
