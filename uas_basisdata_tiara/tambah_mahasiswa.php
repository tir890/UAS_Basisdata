<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <h3 class="mb-4">Form Tambah Mahasiswa</h3>
    <form method="POST" action="">
      <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jk" class="form-select">
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>
      <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date" name="tgl_lahir" class="form-control">
      </div>
      <div class="mb-3">
        <label>Kota</label>
        <input type="text" name="kota" class="form-control">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $nim = $_POST['nim'];
      $nama = $_POST['nama'];
      $jk = $_POST['jk'];
      $tgl = $_POST['tgl_lahir'];
      $kota = $_POST['kota'];

      $insert = mysqli_query($conn, "INSERT INTO mahasiswa (nim, nama, jk, tgl_lahir, kota) 
                                     VALUES ('$nim', '$nama', '$jk', '$tgl', '$kota')");
      if ($insert) {
        echo "<div class='alert alert-success mt-3'>Data berhasil ditambahkan.</div>";
      } else {
        echo "<div class='alert alert-danger mt-3'>Gagal: " . mysqli_error($conn) . "</div>";
      }
    }
    ?>
  </div>

</body>
</html>
