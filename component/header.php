<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    
    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    
    <!-- Leaflet -->
    <link rel="stylesheet" href="assets/css/leaflet.css" />
    <script src="assets/js/leaflet.min.js"></script>
    
    <!-- Firebase -->
    <script src="https://www.gstatic.com/firebasejs/3.1.0/firebase.js"></script>
   

    <!-- Datatable -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css" /> -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/datatables/dataTables.bootstrap4.css">
    <script src="assets/datatables/jquery.dataTable.js"></script>
    <script src="assets/datatables/dataTables.bootstrap4.js"></script> -->

    <title>TA_GIS - Kelompok 1</title>
  </head>
  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Kelompok 1</a>
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <span class="mr-2 d-none d-lg-inline text-white small"><?= $_SESSION['nama'] ?></span>
                  <img class="img-profile rounded-circle mr-3 py-2" src="assets/img/laptop-user.svg" style="height:50px;">
              </li>
          </ul>
     </nav>
  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-dark sidebar p-0">
        <ul class="nav flex-column">
          <div class="navbar-brand pt-5 text-center text-white mt-4" style="padding-left:10%;">
            Web Gis
          </div>
          <li class="nav-item mt-4">
            <a class="nav-link active" href="index.php" style="color: slategrey"
              ><b><i class="fas fa-home pr-2 mb-3"></i> Dashboard</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="map.php" style="color: slategrey"
              ><b><i class="fas fa-map-marker-alt pr-3 mb-3"></i>Map</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_map.php" style="color: slategrey"
              ><b><i class="fas fa-edit pr-2 mb-3"></i>Data Master</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php" style="color: slategrey"
              ><b><i class="fas fa-sign-out-alt pr-2"></i>Logout</b></a>
          </li>
        </ul>
    </nav>