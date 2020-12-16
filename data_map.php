<?php
   require_once 'component/header.php';
   require_once 'function/config.php';

   if (isset($_POST['tambah_data'])) {
      $kecamatan = addslashes($_POST['kecamatan']);
      $x = addslashes($_POST['x']);
      $y = addslashes($_POST['y']);
      $indomaret = addslashes($_POST['indomaret']);
      $alamat = addslashes($_POST['alamat']);

      $query = pg_query($koneksi, "INSERT into indomaret (kecamatan, x, y, indomaret, alamat) VALUES ('$kecamatan', '$x', '$y', '$indomaret', '$alamat')");

      if(isset($query)) {
         echo "<script> alert(\"Data berhasil ditambahkan\");document.location=\"data_map.php\"; </script>";
      } else {
         echo "<script> alert(\"Data gagal ditambahkan\");document.location=\"data_map.php\"; </script>";
      }
   }


?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
   <div class="h3 mt-5">
      Data Map
   </div>
   <form action="" method="POST" style="font-size:12px;">
    <div class="row">
       <div class="col-md-6">
          <div class="form-group">
            <label for="indomaret">Nama Indomaret</label>
            <input type="text" class="form-control form-control-sm" id="indomaret" name="indomaret" required>
          </div>
      </div>
      
      <div class="col-md-6">
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" required>
          </div>
      </div>

      <div class="col-md-6 mb-2">
        <div class="form-group">
            <label for="x">Latitude</label>
            <input type="text" class="form-control form-control-sm" id="x" name="x" required>
          </div>
      </div>

      <div class="col-md-6">
          <div class="form-group">
            <label for="y">Longitude</label>
            <input type="text" class="form-control form-control-sm" id="y" name="y" required>
          </div>
      </div>

      <div class="col-md-12">
        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan" required>
          </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block text-center mt-4 mb-2" name="tambah_data">Tambah Data</button>
   </form>

   <div class="py-0">
         <div class="card shadow mb-4 mt-4" style="font-size:12px;">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                  <thead style="font-size:14px">
                    <tr>
                      <th>No</th>
                      <th>Kecamatan</th>
                      <th>Latitude</th>
                      <th>Longitude</th>
                      <th>Nama Indomaret</th>
                      <th>Alamat</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

               <?php 
               $no = 1;
               $query = pg_query($koneksi, "SELECT * FROM indomaret ORDER BY gid ASC"); ?>

                <tbody style="font-size:13px">
                  <?php while($row = pg_fetch_assoc($query)): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $row['kecamatan'] ?></td>
                      <td><?= $row['x'] ?></td>
                      <td><?= $row['y'] ?></td>
                      <td><?= $row['indomaret'] ?></td>
                      <td><?= $row['alamat'] ?></td>
                      <td width="15%">
                        <a href="edit_data.php?gid=<?= $row['gid'] ?>" class="btn btn-info btn-sm align-items-center" title="Edit"><i class="fas fa-edit" style="font-size:12px;"></i></a>
                        <a href="hapus.php?gid=<?= $row['gid'] ?>" class="btn btn-danger btn-sm align-items-center" title="Hapus"><i class="fas fa-trash" style="font-size:12px;" onclick="return confirm('Apakah anda yakin ingin menghapus data?');"></i></a>
                      </td>
                   </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
       </div>
</main>

<script type="text/javascript">
	$(document).ready( function() {
		$('.display').DataTable();
	});
</script>
<?php require_once('component/footer.php'); ?>