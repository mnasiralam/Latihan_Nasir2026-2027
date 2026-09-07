<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah User (Admin)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

    <div class="container" style="max-width: 600px;">
        <h3 class="mb-4 text-secondary">Form Tambah User (Admin)</h3>

        <div class="card p-4 shadow-sm border-0">
            <h4 class="mb-4 text-dark">Data Kredensial Akun</h4>

            <form action="aksi_tambah_user.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label text-muted">Username Akun</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="username" 
                        name="username" 
                        placeholder="Contoh: ujang123"
                        required
                    >
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label text-muted">Password Akun</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        placeholder="Contoh: password123"
                        required
                    >
                </div>

                 <input
            type="hidden"
            name="role"
            value="admin"
                />

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">Simpan Data</button>
                    <a href="javascript:history.back()" class="btn btn-secondary px-4">Kembali</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>