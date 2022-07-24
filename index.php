<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>BlogArtikel-Halaman utama</title>

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
        <div id="page-container" class="page-header-dark page-header-fixed main-content-narrow">
            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Logo -->
                        <a class="font-w600 font-size-h5 tracking-wider text-dual mr-3" href="index.php">
                                Blog<span class="font-w400">Artikel</span>
                        </a>
                        <!-- END Logo -->
                    </div>
                    <!-- END Left Section -->


                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- Start dashboard button -->
                        <a href="dashboard.php" class="btn btn-sm btn-dual ml-2 btn-light" tabindex="-1" role="button" aria-disabled="true">
                            <i class="fa fa-fw fa-cog mr-1"></i> Dashboard
                        </a>
                        <a href="logout.php" class="btn btn-sm btn-primary ml-3" tabindex="-1" role="button" aria-disabled="true">
                            <i class="si si-logout mr-1"></i> Logout
                        </a>
                        <!-- END dashboard button -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero Content -->
                <div class="bg-image" style="background-image: url('assets/media/photos/photo11@2x.jpg');">
                    <div class="bg-primary-dark-op">
                        <div class="content content-full overflow-hidden">
                            <div class="mt-7 mb-5 text-center">
                                <h1 class="h2 text-white mb-2 invisible" data-toggle="appear" data-class="animated fadeInDown">Blog Artikel</h1>
                                <h2 class="h4 font-w400 text-white-75 invisible" data-toggle="appear" data-class="animated fadeInDown">Berbagi cerita bersama</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero Content -->

                <!-- Page Content -->
                <div class="content content-boxed">
                    <div class="row">
                        <?php
                            include("function/function.php");
                            $dataArtikel = mysqli_query($dbconnect,"SELECT * FROM artikel ORDER BY artikel_id DESC");

                            while ($rowArtikel = mysqli_fetch_array($dataArtikel)) {
                        ?>
                            <!-- Story -->
                            <div class="col-lg-4 invisible" data-toggle="appear" data-offset="50" data-class="animated fadeIn">
                                <a class="block block-rounded block-link-pop" href="artikel_detail.php?id=<?= $rowArtikel['artikel_id']; ?>">
                                    <img class="img-fluid" src="imgArtikel/<?= $rowArtikel['artikel_gambar'] ?>" alt="">
                                    <div class="block-content">
                                        <h4 class="mb-1"><?= $rowArtikel['artikel_judul']; ?></h4>
                                        <p class="font-size-sm">
                                            <?= date('F j, Y', strtotime($rowArtikel["artikel_tanggal"])); ?> 
                                        </p>
                                        <p class="font-size-sm">
                                            <?= substr($rowArtikel['artikel_isi'],0,300); ?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <!-- END Story -->
                        <?php
                            }
                        ?>
                    </div>
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
    </body>
</html>
