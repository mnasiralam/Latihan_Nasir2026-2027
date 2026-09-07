<?php  
    require_once("koneksi.php");

    // Query khusus mengambil data dari tabel siswa JOIN ke tabel users
    $sql = "SELECT siswa.*, users.username 
            FROM siswa 
            LEFT JOIN users ON siswa.user_id = users.id 
            ORDER BY siswa.id DESC";
               

    $hasil = mysqli_query($koneksi, $sql);

    // Menampung data ke dalam array
    $data = [];
    if ($hasil && mysqli_num_rows($hasil) > 0) {
      while($row = mysqli_fetch_assoc($hasil)){
        $data[] = $row;
      }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Siswa</title>
  <!-- Import Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-3 p-md-4">

  <?php require_once("navbar.php"); ?>

  <!-- Container Utama -->
  <div class="container my-4" style="max-width: 960px;">
    
    <!-- Card Wrapper -->
    <div class="card shadow-sm border-0 rounded-3">
      <div class="card-body p-4">
        
        <!-- Judul -->
        <h2 class="h3 fw-semibold text-center mb-4 text-dark">Daftar Siswa</h2>

        <!-- Kontrol Atas (Entri & Pencarian) -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-3">
          
          <!-- Filter Jumlah Baris -->
          <div class="d-flex align-items-center small">
            <span class="me-2">Tampilkan</span>
            <select class="form-select form-select-sm w-auto me-2">
              <option>10</option>
              <option>25</option>
              <option>50</option>
            </select>
            <span>data per halaman</span>
          </div>

          <!-- Kolom Pencarian -->
          <div class="d-flex align-items-center small">
            <label for="search" class="me-2 mb-0">Cari:</label>
            <input type="text" id="search" class="form-control form-control-sm" style="max-width: 200px;">
          </div>

        </div>

        <!-- Tabel -->
        <div class="table-responsive">
          <table class="table table-hover align-middle border mb-0">
            <thead class="table-light">
              <tr>
                <th scope="col" class="py-3 px-3">No</th>
                <th scope="col" class="py-3 px-3">NIS</th>
                <th scope="col" class="py-3 px-3">Nama Siswa</th>
                <th scope="col" class="py-3 px-3">Kelas</th>
                <th scope="col" class="py-3 px-3">Username</th>
                <th scope="col" class="py-3 px-3 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($data)): ?>
                <?php $no = 1; foreach ($data as $siswa): ?>
                  <tr>
                    <td class="px-3 fw-medium text-dark"><?= $no++; ?></td>
                    <td class="px-3"><?= htmlspecialchars($siswa['nis'] ?? '-'); ?></td>
                    <td class="px-3 fw-semibold"><?= htmlspecialchars($siswa['nama'] ?? '-'); ?></td>
                    <td class="px-3">
                      <span class="badge bg-secondary-subtle text-secondary px-2 py-1 rounded-2">
                        <?= htmlspecialchars($siswa['kelas'] ?? '-'); ?>
                      </span>
                    </td>
                    <td class="px-3 text-muted"><?= htmlspecialchars($siswa['username'] ?? '-'); ?></td>
                    <td class="px-3 text-center">
                      <!-- Tombol Aksi -->
                      <a href="edit_siswa.php?id=<?= $siswa['id']; ?>" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                      <a href="hapus_siswa.php?id=<?= $siswa['id']; ?>" onclick="return confirm('Yakin ingin menghapus data siswa ini?')" class="btn btn-sm btn-outline-danger">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="6" class="px-3 py-4 text-center text-muted">Belum ada data siswa dalam database.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <!-- Paginasi & Info Jumlah Data -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 text-secondary small">
          <div class="mb-3 mb-md-0">
            Menampilkan total <span class="fw-semibold text-dark"><?= count($data); ?></span> data
          </div>
          <nav aria-label="Page navigation">
            <ul class="pagination pagination-sm mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
              </li>
              <li class="page-item active" aria-current="page">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Selanjutnya</a>
              </li>
            </ul>
          </nav>
        </div>
        
      </div>
    </div>
  </div>

  <!-- Import Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>