<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Daftar Mahasiswa</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Daftar Mahasiswa</h2>

    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Umur</th>
          <th>Kota</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT nim, nama, 
                       jenis_kelamin_lengkap(jk) AS jk_lengkap, 
                       hitung_umur(tgl_lahir) AS umur, 
                       kota 
                FROM mahasiswa";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>{$row['nim']}</td>";
          echo "<td>{$row['nama']}</td>";
          echo "<td>{$row['jk_lengkap']}</td>";
          echo "<td>{$row['umur']} tahun</td>";
          echo "<td>{$row['kota']}</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
