<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Laporan KRS Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Laporan KRS Mahasiswa (Pakai Fungsi SQL + UDF)</h2>
    
    <table class="table table-bordered table-striped">
      <thead class="table-light">
        <tr>
          <th>Nama Lengkap</th>
          <th>Umur (hari)</th>
          <th>Matakuliah</th>
          <th>Dosen</th>
          <th>Hari</th>
          <th>Jam</th>
          <th>Nilai</th>
          <th>Status</th>
          <th>Total SKS</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "
          SELECT 
            CONCAT(m.nama, ' [', m.nim, ']') AS nama_lengkap,
            DATEDIFF(NOW(), m.tgl_lahir) AS umur_hari,
            UPPER(mk.nama) AS nama_matkul,
            IFNULL(d.nama, 'Belum Ada') AS nama_dosen,
            j.hari,
            TIME_FORMAT(j.jam, '%H:%i') AS jam,
            k.nilai,
            status_lulus(k.nilai) AS status_lulus,
            total_sks(m.nim) AS total_sks
          FROM mahasiswa m
          JOIN krsmahasiswa k ON m.nim = k.nim
          JOIN matakuliah mk ON k.kd_mk = mk.kd_mk
          LEFT JOIN jadwalmengajar j ON mk.kd_mk = j.kd_mk AND k.kd_ds = j.kd_ds
          LEFT JOIN dosen d ON j.kd_ds = d.kd_ds
          ORDER BY m.nama ASC
        ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
                  <td>{$row['nama_lengkap']}</td>
                  <td>{$row['umur_hari']}</td>
                  <td>{$row['nama_matkul']}</td>
                  <td>{$row['nama_dosen']}</td>
                  <td>{$row['hari']}</td>
                  <td>{$row['jam']}</td>
                  <td>{$row['nilai']}</td>
                  <td>{$row['status_lulus']}</td>
                  <td>{$row['total_sks']}</td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
