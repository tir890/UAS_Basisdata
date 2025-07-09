<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Daftar Dosen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Dosen</h2>
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th>Kode Dosen</th>
          <th>Nama Dosen</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM dosen";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['kd_ds']}</td>
                  <td>{$row['nama']}</td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
