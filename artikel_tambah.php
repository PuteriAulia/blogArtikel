<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>BlogArtikel-Tambah Artikel</title>

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
                                    <a class="nav-main-link active" href="dashboard.php">
                                        <i class="nav-main-link-icon si si-compass"></i>
                                        <span class="nav-main-link-name">Dashboard</span>
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
                    <div class="row">
                        <div class="col-12">
                            <div class="block block-rounded">
                                <div class="block-content">
                                    <form action="function/function.php" method="POST" enctype="multipart/form-data">
                                        <div class="block block-rounded">
                                            <div class="block-header block-header-default">
                                                <h3 class="block-title">Form Tambah Artikel</h3>
                                                <div class="block-options">
                                                    <button type="submit" class="btn btn-sm btn-primary" name="tambah_artikel">
                                                        Publish
                                                    </button>
                                                    <button type="reset" class="btn btn-sm btn-alt-primary">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="block-content">
                                                <div class="row justify-content-center py-sm-3 py-md-5">
                                                    <div class="col-sm-10 col-md-11">
                                                        <!-- Start tanggal artikel -->
                                                        <div class="form-group">
                                                            <label for="block-form1-password">Tanggal publish</label>
                                                            <input type="date" class="form-control form-control-alt" id="block-form1-password" name="tanggal" placeholder="Masukkan tanggal publish" required>
                                                        </div>
                                                        <!-- End tanggal artikel -->

                                                        <!-- Start gambar -->
                                                        <div class="form-group">
                                                            <label>Gambar</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="example-file-input-custom" name="gambar">
                                                                <label class="custom-file-label" for="example-file-input-custom">Pilih gambar</label>
                                                            </div>
                                                        </div>
                                                        <!-- End gambar-->

                                                        <!-- Start Judul artikel -->
                                                        <div class="form-group">
                                                            <label for="block-form1-password">Judul artikel</label>
                                                            <input type="text" class="form-control form-control-alt" id="block-form1-password" name="judul" placeholder="Masukkan judul" required>
                                                        </div>
                                                        <!-- End Judul artikel -->

                                                         <!-- Start Judul artikel -->
                                                        <div class="form-group">
                                                            <label for="block-form1-password">Isi artikel</label>
                                                            <textarea id="js-ckeditor" name="isi"></textarea>
                                                        </div>
                                                        <!-- End Judul artikel -->

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/ckeditor/ckeditor.js"></script>

        <!-- Page JS Helpers (CKEditor plugin) -->
        <script>jQuery(function () {
            One.helpers(['ckeditor']);
        });</script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/be_pages_dashboard_v1.min.js"></script>
    </body>
</html>
