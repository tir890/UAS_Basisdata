<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Daftar Matakuliah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Matakuliah</h2>
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th>Kode MK</th>
          <th>Nama Matakuliah</th>
          <th>SKS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM matakuliah";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['kd_mk']}</td>
                  <td>{$row['nama']}</td>
                  <td>{$row['sks']}</td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
