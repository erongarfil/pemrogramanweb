<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content ="width=device-width,initial-scale=1.0">
    <title>Form Tambah Mahasiswa</title>
</head>
<body>
    <form action="insert.php" method="get">
        <label for="npm">NPM</label>
        <input type="text" name="npm" /><br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" /><br>
        <label for="prodi">Prodi</label>
        <select name="prodi">
            <option value="Sistem Informasi (S1)">Sistem Informasi (S1)</option>
            <option value="Teknik Informatika (S1)">Teknik Informatika (S1)</option>
            <option value="Manajemen Informatika (S1)">Manajemen Informatika (D3)</option>
        </select>
        <br>
        <input type="submit" value="Simpan" />
    </form>
</body>
</html>