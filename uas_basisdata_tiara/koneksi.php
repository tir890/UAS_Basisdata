    <?php
    $servername = "localhost"; // Nama host, biasanya localhost
    $username = "root"; // Nama pengguna database, biasanya root
    $password = ""; // Kata sandi database, biasanya kosong
    $database = "uas_basisdata_tiara"; // Nama database yang Anda buat

    // Buat koneksi ke database
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Cek koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
        //echo "Koneksi berhasil"; // Opsional: untuk mengecek koneksi
    ?>