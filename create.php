<?php
include 'connect.php';

// ==================1==================
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel-variabel untuk menyimpan data yang dikirim dari POST
if (isset($_POST['create'])) {
    $JudulBuku = $_POST["judul"];
    $PenulisBuku = $_POST["penulis"];
    $Tahun = $_POST["tahun_terbit"];
    
    // ==================2==================
    // Definisikan $query untuk melakukan koneksi ke database
    $query = "INSERT INTO tb_buku (judul, penulis, tahun_terbit)
              VALUES ('$JudulBuku', '$PenulisBuku', '$Tahun')";
    mysqli_query($conn, $query);

    // ==================3==================
    // Eksekusi query
    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
        exit;
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
        </script>
        ";
    }
}
?>