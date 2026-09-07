<?php  
    require_once("koneksi.php");

    // Query dipastikan memilih kolom id secara eksplisit agar tidak tertimpa
    $sql = "SELECT 
                users.id AS id_user,
                users.username,
                users.role,
                COALESCE(siswa.nama, guru.nama, '-') AS nama
            FROM users
            LEFT JOIN siswa ON users.id = siswa.user_id
            LEFT JOIN guru ON users.id = guru.user_id
            ORDER BY users.id DESC";

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
  <title>Daftar User</title>
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
        <h2 class="h3 fw-semibold text-center mb-4 text-dark">Daftar User</h2>

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
                <th scope="col" class="py-3 px-3">Username</th>
                <th scope="col" class="py-3 px-3">Role</th>
                <th scope="col" class="py-3 px-3">Nama Lengkap</th>
                <th scope="col" class="py-3 px-3 text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($data)): ?>
                <?php $no = 1; foreach ($data as $user): ?>
                  <tr>
                    <td class="px-3 fw-medium text-dark"><?= $no++; ?></td>
                    <td class="px-3"><?= htmlspecialchars($user['username']); ?></td>
                    <td class="px-3">
                      <!-- Dynamic Badge Color berdasarkan Role -->
                      <?php 
                        $badge_class = 'bg-secondary-subtle text-secondary';
                        if ($user['role'] === 'admin') {
                            $badge_class = 'bg-danger-subtle text-danger';
                        } elseif ($user['role'] === 'guru') {
                            $badge_class = 'bg-success-subtle text-success';
                        } elseif ($user['role'] === 'siswa') {
                            $badge_class = 'bg-primary-subtle text-primary';
                        }
                      ?>
                      <span class="badge <?= $badge_class; ?> px-2 py-1 rounded-2">
                        <?= htmlspecialchars($user['role']); ?>
                      </span>
                    </td>
                    <td class="px-3"><?= htmlspecialchars($user['nama']); ?></td>
                    <td class="px-3 text-center">
                      <!-- Tombol Aksi menggunakan id_user -->
                      <a href="edit_user.php?id=<?= $user['id_user']; ?>" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                      <a href="hapus_user.php?id=<?= $user['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus user ini?')" class="btn btn-sm btn-outline-danger">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="5" class="px-3 py-4 text-center text-muted">Belum ada data user dalam database.</td>
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