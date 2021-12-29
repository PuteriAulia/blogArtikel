<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>BlogArtikel-Detail Artikel</title>

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
        <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="assets/js/plugins/magnific-popup/magnific-popup.css">

        <!-- Fonts and OneUI framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container" class="page-header-fixed main-content-narrow">

            <!-- Header -->
            <header id="page-header">
                <!-- Horizontal Navigation - Hover Centered Dark -->
                    <div class="bg-sidebar-dark p-3 push">
                        <!-- Toggle Navigation -->
                        <div class="d-lg-none">
                            <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                            <button type="button" class="btn btn-block btn-secondary d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#horizontal-navigation-hover-centered-dark" data-class="d-none">
                                Menu - Hover Centered Dark
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <!-- END Toggle Navigation -->

                        <!-- Navigation -->
                        <div id="horizontal-navigation-hover-centered-dark" class="d-none d-lg-block mt-2 mt-lg-0">
                            <ul class="nav-main nav-main-horizontal nav-main-hover nav-main-horizontal-center nav-main-dark">
                                <li class="nav-main-item">
                                    <a class="nav-main-link active" href="index.php">
                                        <i class="nav-main-link-icon fa fa-home"></i>
                                        <span class="nav-main-link-name">Halaman Utama</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END Navigation -->
                    </div>
                    <!-- END Horizontal Navigation - Hover Centered Dark -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <?php
                    include("function/config.php");
                    include("function/function.php");

                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];

                        //deteksi data di db berdasarkan id
                        $data = mysqli_query($dbconnect, "SELECT * FROM artikel WHERE artikel_id = '$id'");

                        //mengambil data yg sudah di deteksi
                        $data = mysqli_fetch_assoc($data);
                    }
                ?>

                <!-- Hero Content -->
                <div class="bg-image" style="min-height: 600px; background-image: url('imgArtikel/<?= $data['artikel_gambar'] ?>');"></div>
                <!-- END Hero Content -->

                <!-- Page Content -->
                <div class="bg-white">
                    <div class="content content-boxed">
                        <div class="text-center font-size-sm push">
                            <h1 class="text-black mt-3 invisible" data-toggle="appear" data-class="animated fadeIn"><?= $data['artikel_judul'] ?></h1>
                            <span class="d-inline-block py-2 px-4 bg-body-light rounded">
                                <?= date('F j, Y'); ?> 
                            </span>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-sm-8">
                                <!-- Story -->
                                <article class="story">
                                    <p><?= $data['artikel_isi']; ?></p>
                                </article>
                                <!-- END Story -->

                                <!-- Actions -->
                                <div class="mt-5 d-flex justify-content-between push">
                                   <!--  <a class="btn btn-alt-primary" href="?aksi=suka&artikel_id='.$data['artikel_id'].'">
                                        <i class="fa fa-heart mr-1">'.$dataArtikelLikeNum2.'</i>
                                    </a> -->

                                    <!-- Start like button -->
                                    <?php
                                      // deteksi kesamaan ip
                                      $artikel_like_ip = $_SERVER['REMOTE_ADDR'];
                                      $dataArtikelLike= mysqli_query($dbconnect,"SELECT * FROM artikel_like WHERE artikel_id IN ('$id') AND artikel_like_ip LIKE '%".$artikel_like_ip."%'");
                                      $dataArtikelLikeNum = mysqli_num_rows($dataArtikelLike);

                                      // menampilkan jumlah likenya
                                       $dataArtikelLike2= mysqli_query($dbconnect,"SELECT * FROM artikel_like WHERE artikel_id IN ('$id')");
                                       $dataArtikelLikeNum2 = mysqli_num_rows($dataArtikelLike2);

                                      if($dataArtikelLikeNum == 0) {
                                        echo '
                                            <a class="btn btn-alt-primary" href="function/function.php?aksi=suka&artikel_id='.$data['artikel_id'].'">
                                                <i class="fa fa-heart mr-2">'.$dataArtikelLikeNum2.'</i>
                                            </a>
                                        ';
                                      }

                                      else { 
                                        echo '
                                           <a class="btn btn-alt-primary" href="">
                                                <i class="fa fa-heart mr-1">'.$dataArtikelLikeNum2.'</i>
                                            </a>
                                        ';
                                      }
                                    ?>
                                    <!-- End like button -->
                                </div>
                                <!-- END Actions -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->

            <!-- Footer -->
            <?php include("template/footer.php"); ?>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
        <script src="assets/js/oneui.core.min.js"></script>
        <script src="assets/js/oneui.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Page JS Helpers (Magnific Popup Plugin) -->
        <script>jQuery(function () { One.helpers('magnific-popup'); });</script>
    </body>
</html>
