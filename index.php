<?php
require_once 'component/header.php';
require_once 'function/config.php';

$alamat = pg_query($koneksi, "SELECT alamat FROM indomaret");
$indomaret = pg_query($koneksi, "SELECT indomaret FROM indomaret");
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-5">
    <div class="h3 mt-5">Dashboard</div>
    <div class="py-5">
        <div class="row">
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Alamat</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= pg_num_rows($alamat) ?></div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-auto">
                                <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Indomaret</div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= pg_num_rows($indomaret) ?></div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</main>
<?php require_once 'component/footer.php'; ?>