<?php 

include("function/config.php");
include("component/header.php");

if(!isset($_SESSION['id_user'])) {
   header("location: login.php?pesan=belum_login");
}

$gid = $_GET['gid'];
$sql = pg_query($koneksi, "SELECT * FROM indomaret WHERE gid='$gid'");
$row = pg_fetch_assoc($sql);

if (isset($_POST['edit'])) {
   $indomaret = addslashes($_POST['indomaret']);
   $kecamatan = addslashes($_POST['kecamatan']);
   $alamat = addslashes($_POST['alamat']);
   $x = addslashes($_POST['x']);
   $y = addslashes($_POST['y']);

   $query = pg_query($koneksi, "UPDATE indomaret SET kecamatan = '$kecamatan', x = '$x', y = '$y', indomaret = '$indomaret', alamat = '$alamat'  WHERE gid='$gid'");

   if(isset($query)) {
      echo "<script> alert(\"Data berhasil diedit\");document.location=\"data_map.php\"; </script>";
   } else {
      echo "<script> alert(\"Data gagal diedit\");document.location=\"data_map.php\"; </script>";
   }
}

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">

   <div class="h3 mt-5 mb-3">
     Edit Data Map
   </div>

      <div class="row">
         <div class="col-md-6">
            <form action="#" method="POST">
               <div class="form-group mt-3">
                  <label for="indomaret">Nama Indomaret</label>
                  <input type="text" class="form-control form-control-sm" id="indomaret" name="indomaret" required value="<?= $row['indomaret'] ?>">
               </div>

               <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan" required value="<?= $row['kecamatan'] ?>">
               </div>

               <div class="form-group mt-3">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control form-control-sm" id="alamat" name="alamat" required value="<?= $row['alamat'] ?>">
               </div>

               <div class="form-group">
                  <label for="x">Latitude</label>
                  <input type="text" class="form-control form-control-sm" id="x" name="x" required value="<?= $row['x'] ?>">
               </div>

               <div class="form-group">
                  <label for="y">Longitude</label>
                  <input type="text" class="form-control form-control-sm" id="y" name="y" required value="<?= $row['y'] ?>">
               </div>
               <button type="submit" class="btn btn-primary btn-sm" name="edit">Edit Data</button>
            </form>
         </div>
      </div>
</main>

<?php include("component/footer.php"); ?>