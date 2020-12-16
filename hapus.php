<?php 

include("function/config.php");

$gid = $_GET['gid'];

$query = pg_query($koneksi, "DELETE FROM indomaret WHERE gid=$gid");

if(isset($query)) {
   echo "<script> alert(\"Data berhasil dihapus\");document.location=\"data_map.php\"; </script>";
} else {
   echo "<script> alert(\"Data gagal dihapus\");document.location=\"data_map.php\"; </script>";
}