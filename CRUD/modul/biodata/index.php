<div class="row">
<div class="col">
    <h5>Biodata Data Mahasiswa</h5>
</div>
<div class="col text-end">
    <a class ="btn btn-primary" href="?modul=form-tambah">Tambah Mahaiswa</a>
</div>
</div>
<table class=table>
    <tr>
        <th>id</th>
        <th>npm</th>
        <th>nama</th>
        <th>prodi</th>
        <th>action</th>
    </tr>
    <?php
    $query = "SELECT * FROM biodata";
    $result = $mysqli-> query($query);
    $cek_data = $result->num_rows;
    $id = 0;
    if ($cek_data == 0) {
    ?> 
    <tr>
        <td colspan="5">Tidak Ada Data</td>
    </tr>
    <?php
    }else{
        while ($row = $result->fetch_assoc()) {
        $id++
           ?> 
           <tr>
               <td><?php echo $id ?></td>
               <td><?php echo $row['npm']; ?></td>
               <td><?php echo $row['nama']; ?></td>
               <td><?php echo $row['prodi']; ?></td>
               <td>
               <a href= "<?= '?modul=form-edit&id='.$row['id'];?>">Edit</a>

               <a data-bs-toggle="modal" data-bs-target="#hapusModal<?= $row['id'];?>" href="#">Hapus</a>
              
                <!-- Modal -->
                <div class="modal fade" id="hapusModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog">
                       <div class="modal-content">
                           <div class="modal-header">
                               <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Hapus</h1>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                               Apakah Anda Yakin Ingin Menghapus Data Ini? <?= $row['nama'];?>
                           </div>
                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                               <a class ="btn btn-primary" href= "<?= 'modul/biodata/proses.php?action=delete&id='.$row['id'];?>">Yakin</a>
                           </div>
                       </div>
                   </div>
               </div>
               </td>
           </tr> 
           <?php    
        }
    }
    ?>
</table>