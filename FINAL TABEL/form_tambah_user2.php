<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Form Tambah Siswa</title>
</head>
<body class="bg-gray-50 text-gray-800">

  <main class="min-h-screen py-10 flex items-center justify-center px-4">
    <div class="w-full max-w-lg bg-white p-6 sm:p-8 rounded-xl shadow-sm border border-gray-200">
      
      <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Form Tambah Siswa</h2>
      
      <form action="aksi_tambah_user.php" method="POST" class="space-y-6">
        
        <!-- Section: Data Profil Siswa -->
        <div class="space-y-4">
          <h3 class="text-base font-semibold text-gray-700 border-b pb-2">Data Profil Siswa</h3>
          
          <!-- NIS -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="nis">NIS</label>
            <input
              class="w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
              id="nis"
              type="text"
              name="nis"
              placeholder="Nomor induk siswa | Contoh: 12345"
              required
            />
          </div>

          <!-- Nama Lengkap -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="nama">Nama Lengkap</label>
            <input
              class="w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
              id="nama"
              type="text"
              name="nama"
              placeholder="Nama lengkap siswa | Contoh: M Nasir Alam"
              required
            />
          </div>

          <!-- Kelas -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="kelas">Kelas</label>
            <input
              class="w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
              id="kelas"
              type="text"
              name="kelas"
              placeholder="Kelas Siswa | Contoh: XI RPL 1"
              required
            />
          </div>

          <!-- Jenis Kelamin -->
          <div>
            <span class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</span>
            <div class="flex items-center gap-6">
              <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-900">
                <input 
                  type="radio" 
                  name="jenis_kelamin" 
                  value="L" 
                  class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" 
                  checked
                />
                Laki-laki
              </label>

              <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-900">
                <input 
                  type="radio" 
                  name="jenis_kelamin" 
                  value="P" 
                  class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                />
                Perempuan
              </label>
            </div>
          </div>
        </div>

        <!-- Section: Data Kredensial Akun -->
        <div class="space-y-4 pt-2">
          <h3 class="text-base font-semibold text-gray-700 border-b pb-2">Data Kredensial Akun</h3>

          <!-- Username -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="username">Username</label>
            <input
              class="w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
              id="username"
              type="text"
              name="username"
              placeholder="Username akun"
              required
            />
          </div>

          <!-- Password -->
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Password</label>
            <input
              class="w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 focus:outline-none"
              id="password"
              type="password"
              name="password"
              placeholder="Password akun"
              required
            />
          </div>

          <!-- Role -->
          <input
            type="hidden"
            name="role"
            value="siswa"
          />
        </div>

        <!-- Action Buttons -->
        <div class="space-y-3 pt-4">
          <button
            type="submit"
            name="submit"
            class="w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 cursor-pointer"
          >
            Simpan Data
          </button>
          
          <button
            type="button"
            onclick="history.back()"
            class="w-full rounded-lg border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 cursor-pointer text-center"
          >
            Kembali
          </button>
        </div>

      </form>
    </div>
  </main>

</body>
</html>