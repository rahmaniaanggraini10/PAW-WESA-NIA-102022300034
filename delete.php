<?php
include 'connect.php';
// ==================1==================
// If statement untuk mengambil GET request dari URL kemudian simpan variabel id
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // ==================2==================
    // Definisikan $query untuk menghapus data menggunakan $id
    $query = "DELETE FROM tb_buku WHERE id = '$id'";

    // ==================3==================
    // Eksekusi query
    if (mysqli_query($conn, $query)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>
                alert('Buku berhasil dihapus');
                window.location = 'katalog_buku.php';
            </script>";
        } else {
            echo "<script>
                alert('Buku tidak ditemukan atau sudah dihapus');
                window.location = 'katalog_buku.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Gagal menghapus data: " . mysqli_error($conn) . "');
            window.location = 'katalog_buku.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID tidak valid!');
        window.location = 'katalog_buku.php';
    </script>";
}
?>