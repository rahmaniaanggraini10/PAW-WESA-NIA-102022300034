<?php

// ==================1==================
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database

$host = "localhost";

$username = "root";

$pass = "";

$db = "db_perpustakaan.sql";

$port = 3306;

$conn = mysqli_connect($host, $username, $pass, $db, $port);

// ==================2==================
// Definisikan $conn untuk melakukan koneksi ke database 

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>