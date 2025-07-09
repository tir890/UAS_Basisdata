<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Daftar Jadwal Mengajar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f6ff;
      font-family: 'Segoe UI', sans-serif;
    }
    .container {
      margin-top: 60px;
    }
    h3 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: bold;
      color: #003366;
    }
    table {
      background-color: white;
    }
  </style>
</head>
<body>

  <div class="container">
    <h3>Daftar Jadwal Mengajar</h3>
    
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th>Kode MK</th>
          <th>Nama Matakuliah</th>
          <th>Kode Dosen</th>
          <th>Nama Dosen</th>
          <th>Hari</th>
          <th>Jam</th>
          <th>Ruang</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // JOIN ke matakuliah dan dosen biar bisa nampilin nama mereka
        $query = "SELECT j.kd_mk, mk.nama AS nama_mk, 
                         j.kd_ds, d.nama AS nama_dosen, 
                         j.hari, j.jam, j.ruang 
                  FROM jadwalmengajar j 
                  JOIN matakuliah mk ON j.kd_mk = mk.kd_mk 
                  JOIN dosen d ON j.kd_ds = d.kd_ds";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['kd_mk']}</td>
                  <td>{$row['nama_mk']}</td>
                  <td>{$row['kd_ds']}</td>
                  <td>{$row['nama_dosen']}</td>
                  <td>{$row['hari']}</td>
                  <td>{$row['jam']}</td>
                  <td>{$row['ruang']}</td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</body>
</html>
