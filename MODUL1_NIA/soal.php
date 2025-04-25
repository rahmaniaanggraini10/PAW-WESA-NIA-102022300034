<?php
// **********************  1  **************************  
$nama = $email = $nim = $jurusan = $fakultas ="";
$namaErr = $emailErr = $nimErr = $jurusanErr = $fakultasErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  2  **************************  
    $nama = $_POST["nama"];
    if (empty($nama)) {
        $namaErr = "Nama harus diisi!";
    } elseif (!preg_match("/^[a-zA-Z]*s/", $nama)){
        $namaErr = "Nama harus berupa huruf";
    }
    // **********************  3  **************************  
    $email = $_POST["email"];
    if (empty($email)){
        $emailErr = "Email harus diisi!";
    }elseif (!preg_match("/^[a-zA-Z]*s/", $email)){
        $emailErr = "Email harus berupa huruf";
    }
    // **********************  4  **************************  
    $nim = $_POST["nim"];
    if (empty($nim)){
        $nimErr = "Nim harus diisi!";
    }elseif (!ctype_digit($nim)){
        $nimErr = "Nim haris berupa angka!";
    }
    // **********************  5  **************************  
    $jurusan = $_POST["jurusan"];
    if (empty($jurusan)){
        $jurusanErr = "Jurusan harus diisi!";
    }elseif (!preg_match("/^[a-zA-Z]*s/", $jurusan)){
        $jurusanErr = "Jurusan harus berupa huruf";
    }
    // **********************  6  **************************  
    $fakultas = $_POST["fakultas"];
    if (empty($fakultas)){
        $fakultas = "Fakultas hanya boleh berisi huruf!";
    }elseif (!preg_match("/^[a-zA-Z]*s/", $fakultas)){
        $fakultasErr = "Fakultas harus berupa huruf";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa Baru</title>
    <link rel="stylesheet" href="styles.css">  
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Formulir Pendaftaran Mahasiswa Baru</h2>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <?php if (!empty($namaErr) || !empty($emailErr) || !empty($nimErr) || !empty($jurusanErr) || !empty($fakultasErr)) { ?>
            <div class="alert alert-danger">
                <strong>Kesalahan!</strong> Harap perbaiki data yang salah.
            </div>
            <?php } else { ?>
            <div class="alert alert-success">
                <strong>Berhasil!</strong> Data pendaftaran telah diterima.
            </div>
            <?php } ?>
        <?php } ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <!-- **********************  7  ************************** -->
            <!-- Tambahkan value di tiap form-group/kolom untuk menampilkan kembali data di form setelah submit (retaining input) -->
            <!-- Hint : value pada input form harus berisi variabel yang menyimpan data input -->
            <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" >
            <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" >
            <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" >
            <span class="error"><?php echo $nimErr ? "* $nimErr" : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" id="jurusan" name="jurusan" >
            <span class="error"><?php echo $jurusanErr ? "* $jurusanErr" : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="fakultas">Fakultas</label>
            <input type="text" id="fakultas" name="fakultas" >
            <span class="error"><?php echo $fakultasErr ? "* $fakultasErr" : ""; ?></span>
            </div>

            <div class="button-container">
            <button type="submit">Daftar</button>
            </div>
        </form>
    </div>

    <!-- **********************  8  ************************** -->
    <!-- Panggil variabel yang berisi pesan error (Hint : gunakan if dan metode post) -->

    <?php { ?>

    <!-- **********************  9  ************************** -->
    <!-- Tampilkan data pendaftaran dalam bentuk tabel yang baru saja diinput -->
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nimErr && !$jurusanErr && !$fakultasErr){?>
        <div class = "container">
        <h3>Data Pendaftaran:</h3>
        <div class = "table-container">
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Fakultas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $nama; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $nim; ?></td>
                    <td><?php echo $jurusan; ?></td>
                    <td><?php echo $fakultas; ?></td>
                 </tr>
            </tbody>
        <?php } ?>
    </div>
 </div>
<?php } ?>
</body>
</html>


