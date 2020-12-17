<?php 
  session_start();
  include("function/config.php");

  if(isset($_SESSION['id_user']) > 0) {
    header("location: index.php");
  }

  if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = md5(htmlspecialchars($_POST['password']));
    $akses = htmlspecialchars($_POST['akses']);

    $query = pg_query($koneksi, "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");

    if (pg_num_rows($query) > 0) {
      session_start();
      $row = pg_fetch_array($query);
      
      $_SESSION['id_user'] = $row['id_user'];
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['akses'] = $row['akses'];

      header("location: index.php");
    } else {
      header("location: login.php?pesan=gagal");
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

  <title>Login</title>

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
                        <h1 class="h4 text-gray-900">Login</h1>
                        <div class="garis-bawah mb-4"></div>
                     </div>
                     <?php 
                     if (isset($_GET['pesan'])) {
                        if($_GET['pesan']=="gagal"){
                           echo "<script type='text/javascript'>alert('Username atau Password salah!')</script>";
                     } else if($_GET['pesan'] == "logout"){
                           echo "<script type='text/javascript'>alert('Anda telah berhasil logout')</script>";
                     } else if($_GET['pesan'] == "belum_login"){
                           echo "<script type='text/javascript'>alert('Anda harus login untuk mengakses halaman ini!')</script>";
                        }
                     } 
                     ?>
                     <form action="#" method="POST">
                        <div class="form-group">
                           <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Masukan username" required style="font-size:12px;">
                        </div>
                        <div class="form-group">
                           <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required style="font-size:12px;">
                        </div>
                        <button class="btn btn-dark btn-block" type="submit" name="login">Login</button>
                        <hr>
                     </form>
                     <div class="text-center">
                       <a class="small" href="register.php">Belum punya akun?</a>
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
