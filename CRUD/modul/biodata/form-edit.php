<?php
$query = "SELECT * FROM biodata WHERE id= $_GET[id]";
$result = $mysqli->query($query);
$row = $result->fetch_assoc();
?>
    <h5>From Edit Mahasiswa</h5>
</hr>
<form action="<?= 'modul/biodata/proses.php?action=update&id='.$_GET['id'];?>" method="POST">
    <label for="Npm">NPM</label>
    <input type="text" name="npm" value="<?= $row['npm'];?>" /><br>
    <label for="nama">NAMA</label>
    <input type="text" name="nama" value="<?= $row['nama'];?>"/><br>
    <label for="prodi">Prodi</label>
    <select name="prodi" class="form-control">
        <option <?= ($row['prodi'] == 'Sistem Informasi (S1)') ? ' selected': '';?> value="Sistem Informasi (S1)">Sistem Informasi (S1)</option>
        <option <?= ($row['prodi'] == 'Teknik Informatika (S1)') ? ' selected': '';?> value="Teknik Informatika (S1)">Teknik Informatika (S1)</option>
        <option <?= ($row['prodi'] == 'Bisnis Digital (S1)') ? ' selected': '';?> value="Bisnis Digital (S1)">Bisnis Digital (S1)</option>
        <option <?= ($row['prodi'] == 'Manajemen Informatika (D3)') ? ' selected': '';?> value="Manajemen Informatika (D3)">Manajemen Informatika (D3)></option>
        <option <?= ($row['prodi'] == 'Komputerisasi Akutansi(D3)') ? ' selected': '';?> value="Komputerasasi Akuntansi (D3)">Komputerasasi Akuntansi (D3)</option>
</select>
    <br>
    <input type="submit" class="btn btn-primary" value="Update" />
</form>