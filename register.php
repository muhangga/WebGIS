<?php
   include "function/config.php";

   // if(isset($_SESSION['id_user']) > 0) {
   //    header("location: dashboard.php");
   // }

   if (isset($_POST['register'])) {
      $username = htmlspecialchars($_POST['username']);
      $password = md5(htmlspecialchars($_POST['password']));
      $akses = htmlspecialchars($_POST['akses']);
      $nama = $_POST['nama'];

      // $query = pg_query($koneksi, "INSERT into tbl_user (username, password ,nama, akses) VALUES ('','$username', '$password', '$nama', ,'$akses')");
      $query = "INSERT into tbl_user (username, password, nama, akses) VALUES ('$username', '$password', '$nama' ,'$akses')";
      $sql = pg_query($koneksi, $query);
      $result = pg_fetch_assoc($sql);

      if (isset($query)) {
         echo "<script>alert('Register Berhasil, Silahkan login!');
                     document.location.href='login.php';
              </script>";
      } else {
         echo "<script>alert('Register gagal!');
                     document.location.href='register.php';
              </script>";
      }
   }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    
    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />

</head>

<body class="btn-grey">

<main class="container">
<div class="row justify-content-center mt-5">

   <div class="col-xl-10 col-lg-1 col-md-1">

      <div class="card border-0 shadow-lg my-5">
         <div class="card-body">
            <div class="row justify-content-center">
               <div class="col-lg-8">
                  <div class="p-5">
                     <div class="text-center">
                        <h1 class="h4 text-gray-900">Register</h1>
                        <div class="garis-bawah mb-4"></div>
                     </div>

                      <form action="#" method="POST" style="font-size:12px;">
                           <div class="form-group">
                              <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Masukan Nama" required style="font-size:12px;">
                           </div>

                           <div class="form-group">
                              <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan username" required style="font-size:12px;">
                           </div>

                           <div class="form-group">
                              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required style="font-size:12px;">
                           </div>

                           <div class="input-group mb-3">
                              <select class="custom-select" id="akses" name="akses">
                              <option selected class="text-center">Pilih Akses</option>
                              <option value="admin">Admin</option>
                              <option value="user">User</option>
                           </select>
                           </div>

                           <button class="btn btn-dark btn-block" type="submit" name="register">Login</button>
                           <hr>
                     </form>
                     <div class="text-center">
                       <a class="small" href="login.php">Sudah punya akun?</a>
                    </div>
                  </div>
               </div>
             </div>
          </div>
        </div>
     </div>
   </div>
</main>

<!-- Bootstrap core JavaScript-->
<script src="assets/js/jquery.min.js"></script>

</body>

</html>
