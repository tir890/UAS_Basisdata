<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Sistem Akademik</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f8fb;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      left: 0;
      width: 220px;
      height: 100%;
      background-color: #003366;
      color: white;
      padding-top: 60px;
    }

    .sidebar a {
      display: block;
      padding: 12px 20px;
      color: white;
      text-decoration: none;
      font-size: 16px;
    }

    .sidebar a:hover {
      background-color: #005999;
    }

    /* Header */
    .header {
      margin-left: 220px;
      background-color: #e0f2ff;
      padding: 20px 30px;
      border-bottom: 2px solid #ccc;
    }

    /* Content */
    .main-content {
      margin-left: 220px;
      padding: 40px 30px;
    }

    .welcome-box {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
    }

    .welcome-box h2 {
      color: #003366;
    }

    .icon {
      margin-right: 8px;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      .header, .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#"><i class="bi bi-house-door icon"></i> Dashboard</a>
    <a href="daftar_mahasiswa.php"><i class="bi bi-person-lines-fill icon"></i> Mahasiswa</a>
    <a href="daftar_dosen.php"><i class="bi bi-person-workspace icon"></i> Dosen</a>
    <a href="daftar_matakuliah.php"><i class="bi bi-book icon"></i> Matakuliah</a>
    <a href="daftar_krs.php"><i class="bi bi-card-checklist icon"></i> KRS</a>
    <a href="laporan_krs.php"><i class="bi bi-bar-chart icon"></i> Laporan</a>
    <a href="tambah_mahasiswa.php"><i class="bi bi-person-plus icon"></i> Tambah Mahasiswa</a>
    <a href="tambah_krs.php"><i class="bi bi-file-earmark-plus icon"></i> Tambah KRS</a>
    <a href="tambah_matakuliah.php"><i class="bi bi-journal-plus icon"></i> Tambah Matakuliah</a>

  </div>

  <!-- Header -->
  <div class="header">
    <h3>Sistem Informasi Akademik</h3>
    <p>Selamat datang di dashboard pengelolaan data akademik kampus UPB! </p>
  </div>

  <!-- Main Content -->
  <div class="main-content">
    <div class="welcome-box">
      <h2>Halo, Tir!</h2>
      <p>Silakan pilih menu di samping untuk mulai mengelola data akademik.</p>
    </div>
  </div>

</body>
</html>
