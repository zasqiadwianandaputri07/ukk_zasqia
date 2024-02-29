<?php  
  include "header.php";
  include "navbar.php";
?>

      <div class="card mt-2">
        <div class="card-body">
                   <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
              Tambah Data
                 </button>
        </div>
        <div class="card-body">
          <?php
            if (isset($_GET['pesan'])) {
            if ($_GET['pesan']=="simpan") {?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Disimpan
            </div>
                <?php } ?>
            <?php  if ($_GET['pesan']=="update") {?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Di Perbarui
            </div>
              <?php } ?>

            <?php  if ($_GET['pesan']=="hapus") {?>
            <div class="alert alert-success" role="alert">
                Data Berhasil Di Hapus
            </div>
            <?php } ?>

            <?php

              }
            ?>
          <table class="table">
                  <thead>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                  </thead>
                  <tbody>
                    <?php 
            include '../koneksi.php';
            $no = 1;
            $data = mysqli_query($koneksi,"select * from produk");
            while($d = mysqli_fetch_array($data)){
            ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['NamaProduk']; ?></td>
                    <td>RP.<?php echo $d['Harga']; ?></td>
                    <td><?php echo $d['Stok']; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?php echo $d['ProdukID']; ?>">
                  Edit
                      </button>

                      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?php echo $d['ProdukID']; ?>">
                  Hapus 
                      </button>
                    </td>
                  </tr>
<!-- Modal Edit Data-->
<div class="modal fade" id="edit-data<?php echo $d['ProdukID'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="proses_update_barang.php" method="post">
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="hidden" name="ProdukID" value="<?php echo $d['ProdukID'];?>">
            <input type="text" name="NamaProduk" class="form-control" value="<?php echo $d['NamaProduk']; ?>">
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="Harga" class="form-control" value="<?php echo $d['Harga'];?>">
          </div>

          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="Stok" class="form-control" value="<?php echo $d['Stok'];?>">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Perbaharui</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal Hapus Data-->
<div class="modal fade" id="hapus-data<?php echo $d['ProdukID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="proses_hapus_barang.php" method="post">
      <div class="modal-body">
        <input type="hidden" name="ProdukID" value="<?php echo $d['ProdukID']; ?>">
        Apakah anda yakin akan menghapus data produk <b> <?php echo $d['NamaProduk']; ?> </b>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Hapus</button>
      </div>
    </form>
    </div>
  </div>
</div>
      <?php } ?>
                  </tbody>
                 </table>
        </div>
      </div>

<!-- Modal Tambah Data-->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="proses_simpan_barang.php">
      <div class="modal-body">
          <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="NamaProduk" class="form-control">
          </div>

          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="Harga" class="form-control">
          </div>

          <div class="form-group">
            <label>Stok</label>
            <input type="number" name="Stok" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php  

include "footer.php";

?>
