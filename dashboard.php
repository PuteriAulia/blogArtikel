<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>BlogArtikel-Dashboard</title>

        <meta name="description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework">
        <meta property="og:site_name" content="OneUI">
        <meta property="og:description" content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container" class="page-header-dark main-content-boxed">

            <!-- Header -->
            <?php include("template/header.php"); ?>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Navigation -->
                <div class="bg-white">
                    <div class="content py-3">
                        <!-- Toggle Main Navigation -->
                        <div class="d-lg-none">
                            <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                            <button type="button" class="btn btn-block btn-alt-secondary d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
                                Menu
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <!-- END Toggle Main Navigation -->

                        <!-- Main Navigation -->
                        <div id="main-navigation" class="d-none d-lg-block mt-2 mt-lg-0">
                            <ul class="nav-main nav-main-horizontal nav-main-hover">
                                <li class="nav-main-item">
                                    <a href="artikel_tambah.php" class="btn btn-sm btn-success mr-1" tabindex="-1" role="button" aria-disabled="true">
                                        <i class="fa fa-fw fa-plus mr-1"></i> Tambah artikel
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Main Navigation -->
                    </div>
                </div>
                <!-- END Navigation -->

                <!-- Page Content -->
                <div class="content">
                    <!-- Stats -->
                    <?php
                        include("function/config.php");
                        $dataArtikel = mysqli_query($dbconnect,"SELECT * FROM artikel");
                        $jumlahArtikel = mysqli_num_rows($dataArtikel);

                        $dataLike = mysqli_query($dbconnect,"SELECT * FROM artikel_like");
                        $jumlahLike = mysqli_num_rows($dataLike);
                    ?>

                    <div class="row">
                        <div class="col-6 col-md-6 col-lg-6 col-xl-6">
                            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Artikel</div>
                                    <div class="font-size-h2 font-w400 text-dark"><?= $jumlahArtikel ?></div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6 col-xl-6">
                            <a class="block block-rounded block-link-pop" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Likes</div>
                                    <div class="font-size-h2 font-w400 text-dark"><?= $jumlahLike ?></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->

                    <!-- Dashboard Charts -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block block-rounded block-mode-loading-oneui">
                                <!-- Pie Chart -->
                                <div class="block block-rounded">
                                    <div class="block-header">
                                        <h3 class="block-title">Pie</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                                <i class="si si-refresh"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="block-content block-content-full text-center">
                                        <div class="py-3">
                                            <!-- Pie Chart Container -->
                                            <canvas id="myChart" height="100"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <!-- END Pie Chart -->
                            </div>
                        </div>
                    </div>
                    <!-- END Dashboard  -->

                    <!-- Start tabel artikel -->
                    <div class="row">
                        <div class="col-12">
                             <div class="block block-rounded block-mode-loading-oneui">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Kelola Artikel</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                            <i class="si si-refresh"></i>
                                        </button>
                                        <button type="button" class="btn-block-option">
                                            <i class="si si-settings"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content block-content-full">
                                    <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm mb-0">
                                        <thead>
                                            <tr class="text-uppercase">
                                                <th class="font-w700" style="width: 5%;">No</th>
                                                <th class="font-w700 text-center" style="width: 65%;">Judul Artikel</th>
                                                <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 30%;">Action</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            include("function/config.php");
                                            $dataArtikel = mysqli_query($dbconnect,"SELECT * FROM artikel ORDER BY artikel_id DESC");
                                            $no=1;
                                            while ($rowArtikel = mysqli_fetch_array($dataArtikel)) {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <span class="font-w600"><?= $no; ?></span>
                                                </td>
                                                <td class="font-w600">
                                                    <?= $rowArtikel['artikel_judul']; ?>                                
                                                </td>
                                                <td class="d-none d-sm-table-cell text-center">
                                                    <a href="artikel_hapus.php?id=<?= $rowArtikel['artikel_id']; ?>" class="btn btn-sm btn-danger mr-1 mb-3" tabindex="-1" role="button" aria-disabled="true">
                                                        <i class="fa fa-fw fa-times mr-1"></i> Hapus
                                                    </a>

                                                    <a href="artikel_edit.php?id=<?= $rowArtikel['artikel_id']; ?>" class="btn btn-sm btn-success mr-1 mb-3" tabindex="-1" role="button" aria-disabled="true">
                                                        <i class="far fa-edit mr-1"></i> Edit
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    <?php
                                        $no++;
                                        }
                                    ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End tabel artikel -->
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <?php include("template/footer.php"); ?>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
        <script src="assets/js/oneui.core.min.js"></script>

        <script src="assets/js/oneui.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/chart.js/Chart.bundle.min.js"></script>
        <script type="text/javascript">
            const ctx = document.getElementById('myChart').getContext('2d');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [<?php 
                        $dataArtikel = mysqli_query($dbconnect,"SELECT * FROM artikel");
                          while ($row = $dataArtikel->fetch_array()) {
                            echo "'".substr($row['artikel_judul'], 0,10)."',";
                        }
                    ?>],
                    datasets: [{
                        axis: 'y',
                        label: '# of Votes',
                        data: [<?php  
                            $dataArtikel= mysqli_query($dbconnect,"SELECT * FROM artikel ");

                            function countLike($artikel_id){
                              include 'function/config.php';

                              $dataArtikelLike2= mysqli_query($dbconnect,"SELECT * FROM artikel_like WHERE artikel_id IN ('$artikel_id')");
                              $dataArtikelLikeNum2 = mysqli_num_rows($dataArtikelLike2);
                              return $dataArtikelLikeNum2;
                            }

                            while ($rowArtikel = $dataArtikel->fetch_array()) {
                              echo "'".countLike($rowArtikel['artikel_id'])."',";
                            }
                        ?>],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                          beginAtZero: true
                        }
                    },
                    indexAxis: 'y',
                    responsive: true,
                }
            });
        </script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_comp_charts.min.js"></script>
        <script src="assets/js/pages/be_pages_dashboard_v1.min.js"></script>
    </body>
</html>
