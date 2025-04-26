<?php
$nama = $email = $nim = "";
$namaErr = $emailErr = $nimErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // **********************  1  **************************  
    $nama = $_POST["nama"];
    if (empty($nama)) {
        $namaErr = "Nama wajib diisi";
    }
    // **********************  2  **************************  
    $email = $_POST["email"];
    if (empty($email)) {
        $emailErr = "Email wajib diisi";
    }
    // **********************  3  **************************  
    $nim = $_POST["nim"];
    if (empty($nim)) {
        $nimErr = "Nim wajib diisi";
    } elseif (!ctype_digit($nim)) {
        $nimErr = "Nim harus berupa angka";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULIR PENDAFTARAN MAHASISWA BARU</title>
    <link rel="stylesheet" href="styles.css">  
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>FORMULIR PENDAFTARAN MAHASISWA BARU</h2>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <?php if (!empty($namaErr) || !empty($emailErr) || !empty($nimErr)) { ?>
                <div class="alert alert-danger">
                    <strong>Kesalahan!</strong> HARAP PERBAIKI DATA YANG SALAH!.
                </div>
            <?php } else { ?>
                <div class="alert alert-success">
                    <strong>Berhasil!</strong> DATA PENDAFTARAN TELAH DITERIMA!.
                </div>
            <?php } ?>
        <?php } ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

         <!-- **********************  4  ************************** -->

        <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
                <span class="error"><?php echo $namaErr; ?></span>
            </div>
        
        <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                <span class="error"><?php echo $emailErr; ?></span>
            </div>

            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($nim); ?>">
                <span class="error"><?php echo $nimErr; ?></span>
            </div>

            <div class="button-container">
                <button type="submit">Daftar</button>
            </div>
        </form>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($namaErr) && empty($emailErr) && empty($nimErr)) {
            echo "<p class='success'>Pendaftaran Berhasil!</p>";
        }
        ?>

        </form>
    </div>
</body>
</html>