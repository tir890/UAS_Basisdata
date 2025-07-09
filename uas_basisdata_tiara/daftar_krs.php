<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Data KRS Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Data KRS Mahasiswa</h2>
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th>NIM</th>
          <th>Kode MK</th>
          <th>Kode Dosen</th>
          <th>Semester</th>
          <th>Nilai</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM krsmahasiswa";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['nim']}</td>
                  <td>{$row['kd_mk']}</td>
                  <td>{$row['kd_ds']}</td>
                  <td>{$row['semester']}</td>
                  <td>{$row['nilai']}</td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
