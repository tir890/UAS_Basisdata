<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tambah KRS Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container mt-5">
    <h3 class="mb-4">Form Tambah KRS Mahasiswa</h3>
    <form method="POST" action="">
      <div class="mb-3">
        <label>NIM</label>
        <input type="text" name="nim" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Kode Matakuliah</label>
        <input type="text" name="kd_mk" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Kode Dosen</label>
        <input type="text" name="kd_ds" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Semester</label>
        <input type="number" name="semester" class="form-control" min="1" required>
      </div>
      <div class="mb-3">
        <label>Nilai (optional)</label>
        <input type="text" name="nilai" class="form-control">
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
      $nim = $_POST['nim'];
      $kd_mk = $_POST['kd_mk'];
      $kd_ds = $_POST['kd_ds'];
      $semester = $_POST['semester'];
      $nilai = $_POST['nilai'];

      $insert = mysqli_query($conn, "INSERT INTO krsmahasiswa (nim, kd_mk, kd_ds, semester, nilai) 
                                     VALUES ('$nim', '$kd_mk', '$kd_ds', '$semester', '$nilai')");
      if ($insert) {
        echo "<div class='alert alert-success mt-3'>Data KRS berhasil ditambahkan.</div>";
      } else {
        echo "<div class='alert alert-danger mt-3'>Gagal: " . mysqli_error($conn) . "</div>";
      }
    }
    ?>
  </div>

</body>
</html>
