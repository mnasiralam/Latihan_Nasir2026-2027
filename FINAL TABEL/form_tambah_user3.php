<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah User (Multi Role)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

    <div class="container" style="max-width: 650px;">
        <h3 class="mb-4 text-secondary">Form Tambah User</h3>

        <div class="card p-4 shadow-sm border-0">
            <form action="aksi_tambah_user.php" method="POST">
                
                
                <h5 class="text-primary mb-3">1. Data Akun</h5>
                
                <div class="mb-3">
                    <label for="username" class="form-label text-muted">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-muted">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                </div>

                <div class="mb-4">
                    <label for="role" class="form-label text-muted">Pilih Role</label>
                    <select class="form-select" id="role" name="role" onchange="tampilkanFormDinamis()" required>
                        <option value="" selected disabled>Pilih Role</option>
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                        <option value="guru">Guru</option>
                    </select>
                </div>

                <hr class="my-4">

                <!-- 2. Form Khusus Siswa -->
                <div id="form-siswa" style="display: none;">
                    <h5 class="text-primary mb-3">2. Data Detail Siswa</h5>
                    <div class="mb-3">
                        <label for="nis" class="form-label text-muted">NIS</label>
                        <input type="text" class="form-control field-siswa" id="nis" name="nis" placeholder="Contoh: 2223001">
                    </div>
                    <div class="mb-3">
                        <label for="nama_siswa" class="form-label text-muted">Nama Lengkap Siswa</label>
                        <input type="text" class="form-control field-siswa" id="nama_siswa" name="nama" placeholder="Contoh: Andi Wijaya">
                    </div>
                    <div class="mb-3">
                        <label for="kelas" class="form-label text-muted">Kelas</label>
                        <input type="text" class="form-control field-siswa" id="kelas" name="kelas" placeholder="Contoh: XII RPL 1">
                    </div>
                    <div class="mb-3">
                        <label for="jk_siswa" class="form-label text-muted">Jenis Kelamin</label>
                        <select class="form-select field-siswa" id="jk_siswa" name="jenis_kelamin">
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>

                <!-- 3. Form Khusus Guru-->
                <div id="form-guru" style="display: none;">
                    <h5 class="text-primary mb-3">2. Data Detail Guru</h5>
                    <div class="mb-3">
                        <label for="nip" class="form-label text-muted">NIP / NUPTK</label>
                        <input type="text" class="form-control field-guru" id="nip" name="nip" placeholder="Contoh: 198501012010011001">
                    </div>
                    <div class="mb-3">
                        <label for="nama_guru" class="form-label text-muted">Nama Lengkap Guru</label>
                        <input type="text" class="form-control field-guru" id="nama_guru" name="nama_guru" placeholder="Contoh: Budi Santoso, M.Kom">
                    </div>
                    <div class="mb-3">
                        <label for="jk_guru" class="form-label text-muted">Jenis Kelamin</label>
                        <select class="form-select field-guru" id="jk_guru" name="jk_guru">
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>

                
                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                    <a href="javascript:history.back()" class="btn btn-secondary px-4">Kembali</a>
                </div>

            </form>
        </div>
    </div>

    
    <script>
        function tampilkanFormDinamis() {
            const role = document.getElementById('role').value;
            const formSiswa = document.getElementById('form-siswa');
            const formGuru = document.getElementById('form-guru');

            const fieldSiswa = document.querySelectorAll('.field-siswa');
            const fieldGuru = document.querySelectorAll('.field-guru');

            formSiswa.style.display = 'none';
            formGuru.style.display = 'none';
            
            fieldSiswa.forEach(input => input.removeAttribute('required'));
            fieldGuru.forEach(input => input.removeAttribute('required'));

            if (role === 'siswa') {
                formSiswa.style.display = 'block';
                fieldSiswa.forEach(input => input.setAttribute('required', 'required'));
            } else if (role === 'guru') {
                formGuru.style.display = 'block';
                fieldGuru.forEach(input => input.setAttribute('required', 'required'));
            }
        }
    </script>

</body>
</html>