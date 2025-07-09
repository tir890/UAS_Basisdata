<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah Matakuliah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <h3 class="mb-4">Form Tambah Matakuliah</h3>
    <form method="POST" action="">
      <div class="mb-3">
        <label>Kode MK</label>
        <input type="text" name="kd_mk" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Nama Matakuliah</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>SKS</label>
        <input type="number" name="sks" class="form-control" min="1" max="4" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $kode = $_POST['kd_mk'];
      $nama = $_POST['nama'];
      $sks = $_POST['sks'];

      $insert = mysqli_query($conn, "INSERT INTO matakuliah (kd_mk, nama, sks) 
                                     VALUES ('$kode', '$nama', '$sks')");
      if ($insert) {
        echo "<div class='alert alert-success mt-3'>Matakuliah berhasil ditambahkan.</div>";
      } else {
        echo "<div class='alert alert-danger mt-3'>Gagal: " . mysqli_error($conn) . "</div>";
      }
    }
    ?>
  </div>

</body>
</html>
