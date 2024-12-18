<div class="border-bottom d-flex justify-content-between py-3">
  <h4>Data Penjualan</h4>
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPenjualan">
    <i class="bi bi-plus"></i> Tambah Penjualan
  </button>
</div>

<!-- Modal Tambah Penjualan -->
<div class="modal fade" id="modalTambahPenjualan" tabindex="-1" aria-labelledby="modalTambahPenjualanLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalTambahPenjualanLabel">Tambah Data Penjualan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="modul/penjualan/proses.php?aksi=tambah" method="post">
        <div class="modal-body">
          <div class="mb-3">
            <label for="barang" class="form-label">Barang</label>
            <select class="form-select" name="barang" required>
              <option value="" disabled selected>Pilih Barang</option>
              <?php
              $sql_barang = "SELECT * FROM barang ORDER BY nama_barang ASC";
              $result_barang = $mysqli->query($sql_barang);
              while ($row_barang = $result_barang->fetch_assoc()) {
                  echo "<option value='{$row_barang['id_barang']}'>{$row_barang['nama_barang']} - {$row_barang['merk']}</option>";
              }
              ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Contoh: 10" required>
          </div>
          <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="number" name="total_harga" class="form-control" placeholder="Contoh: 70000" required>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Penjualan</label>
            <input type="date" name="tanggal" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Tabel Data Penjualan -->
<table id="penjualanTable" class="table">
  <thead>
    <tr>
      <th>No</th>
      <th>Barang</th>
      <th>Jumlah</th>
      <th>Total Harga</th>
      <th>Tanggal</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql_penjualan = "SELECT p.*, b.nama_barang, b.merk 
                      FROM penjualan p 
                      INNER JOIN barang b ON p.id_barang = b.id_barang 
                      ORDER BY p.id_penjualan ASC";
    $result_penjualan = $mysqli->query($sql_penjualan);
    $no = 1;
    while ($row_penjualan = $result_penjualan->fetch_assoc()) {
        echo "
        <tr>
          <td>{$no}</td>
          <td>{$row_penjualan['nama_barang']} - {$row_penjualan['merk']}</td>
          <td>{$row_penjualan['jumlah']}</td>
          <td>Rp " . number_format($row_penjualan['total_harga'], 0, ',', '.') . "</td>
          <td>{$row_penjualan['tanggal']}</td>
          <td>
            <a href='' data-bs-toggle='modal' data-bs-target='#modalEditPenjualan{$row_penjualan['id_penjualan']}' class='text-info'>
              <i class='bi bi-pencil-square'></i>
            </a>
            <a href='' data-bs-toggle='modal' data-bs-target='#modalHapusPenjualan{$row_penjualan['id_penjualan']}' class='text-danger'>
              <i class='bi bi-trash-fill'></i>
            </a>
          </td>
        </tr>";

        // Modal Edit Penjualan
        echo "
        <div class='modal fade' id='modalEditPenjualan{$row_penjualan['id_penjualan']}' tabindex='-1' aria-labelledby='modalEditPenjualanLabel' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h1 class='modal-title fs-5' id='modalEditPenjualanLabel'>Edit Data Penjualan</h1>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <form action='modul/penjualan/proses.php?aksi=edit&id={$row_penjualan['id_penjualan']}' method='post'>
                <div class='modal-body'>
                  <div class='mb-3'>
                    <label for='barang' class='form-label'>Barang</label>
                    <select class='form-select' name='barang' required>
                      <option value='' disabled>Pilih Barang</option>";
        $sql_barang = "SELECT * FROM barang ORDER BY nama_barang ASC";
        $result_barang = $mysqli->query($sql_barang);
        while ($row_barang = $result_barang->fetch_assoc()) {
            $selected = $row_penjualan['id_barang'] == $row_barang['id_barang'] ? "selected" : "";
            echo "<option value='{$row_barang['id_barang']}' $selected>{$row_barang['nama_barang']} - {$row_barang['merk']}</option>";
        }
        echo "
                    </select>
                  </div>
                  <div class='mb-3'>
                    <label for='jumlah' class='form-label'>Jumlah</label>
                    <input type='number' name='jumlah' class='form-control' value='{$row_penjualan['jumlah']}' required>
                  </div>
                  <div class='mb-3'>
                    <label for='total_harga' class='form-label'>Total Harga</label>
                    <input type='number' name='total_harga' class='form-control' value='{$row_penjualan['total_harga']}' required>
                  </div>
                  <div class='mb-3'>
                    <label for='tanggal' class='form-label'>Tanggal Penjualan</label>
                    <input type='date' name='tanggal' class='form-control' value='{$row_penjualan['tanggal']}' required>
                  </div>
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                  <button type='submit' class='btn btn-primary'>Ubah</button>
                </div>
              </form>
            </div>
          </div>
        </div>";

        // Modal Hapus Penjualan
        echo "
        <div class='modal fade' id='modalHapusPenjualan{$row_penjualan['id_penjualan']}' tabindex='-1' aria-labelledby='modalHapusPenjualanLabel' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <h1 class='modal-title fs-5' id='modalHapusPenjualanLabel'>Hapus Data Penjualan</h1>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body'>
                Apakah Anda yakin akan menghapus data penjualan barang {$row_penjualan['nama_barang']}?
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                <form action='modul/penjualan/proses.php?aksi=hapus&id={$row_penjualan['id_penjualan']}' method='post'>
                  <button type='submit' class='btn btn-danger'>Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>";
        $no++;
    }
    ?>
  </tbody>
</table>

<script>
  $(document).ready(function () {
    $('#penjualanTable').DataTable();
  });
</script>