<?php
    require_once '../admin/inc/functions/config.php';

    if (isset($_POST['submit'])) {
        $response = verifyLogin($_POST);

        if ($response === true) {
            redirect_to("confirm-pin");
        } else {
            $errors = $response;
            if (is_array($errors)) {
                foreach ($errors as $err) {
                    echo "<script>alert('$err')</script>";
                }
            } else {
                echo "<script>alert('$errors')</script>";
            }
            
        }
    }
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Verify Login | Swiss Apex Financial</title>

        <meta name="description" content="Sign In | BCA Mellon Bank created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- Open Graph Meta -->
        <meta property="og:title" content="Sign In | BCA Mellon Bank">
        <meta property="og:site_name" content="BCA Mellon">
        <meta property="og:description" content="Sign In | BCA Mellon Bank">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:image" content="">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="../admin/assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="../admin/assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="../admin/assets/media/favicons/apple-touch-icon-180x180.png">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Fonts and Dashmix framework -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="../admin/assets/css/dashmix.min.css">

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="../admin/assets/css/themes/xwork.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available classes for #page-container:

        GENERIC

            'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

        SIDEBAR & SIDE OVERLAY

            'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
            'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
            'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
            'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
            'sidebar-dark'                              Dark themed sidebar

            'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
            'side-overlay-o'                            Visible Side Overlay by default

            'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

            'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

        HEADER

            ''                                          Static Header if no class is added
            'page-header-fixed'                         Fixed Header


        Footer

            ''                                          Static Footer if no class is added
            'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

        HEADER STYLE

            ''                                          Classic Header style if no class is added
            'page-header-dark'                          Dark themed Header
            'page-header-glass'                         Light themed Header with transparency by default
                                                        (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
            'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                        (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

        MAIN CONTENT LAYOUT

            ''                                          Full width Main Content if no class is added
            'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
            'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
        -->
        <div id="page-container">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('../admin/assets/media/photos/jason-grove-B4kmaRADNAc-unsplash.jpg'); object-fit: cover !important;">
                    <div class="row no-gutters bg-primary-op">
                        <!-- Main Section -->
                        <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                            <div class="p-3 w-100">
                                <!-- Header -->
                                <div class="mb-3 text-center">
                                    <a class="link-fx font-w700 font-size-h1" href="index.html">
                                        <span class="text-dark">SAF</span><span class="text-primary">Swiss Apex Financial</span>
                                    </a>
                                    <p class="text-uppercase font-w700 font-size-sm text-muted">Verify Login</p>
                                </div>
                                <!-- END Header -->

                                <!-- Sign In Form -->
                                <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                                <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <div class="row no-gutters justify-content-center">
                                    <div class="col-sm-8 col-xl-6">
                                        <form action="" method="POST">
                                            <div class="py-3">
                                                <div class="form-group">
                                                    <input type="number" class="form-control form-control-alt" name="otp" placeholder="Enter OTP">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Proceed
                                                </button>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                        <!-- END Main Section -->

                        <!-- Meta Info Section -->
                        <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                            <div class="p-3">
                                <p class="display-4 font-w700 text-white mb-3">
                                VERIFY LOGIN
                                </p>
                                <p class="text-white">An OTP was sent to your email!</p>
                                <p class="font-size-lg font-w600 text-white-75 mb-0">
                                    Copyright &copy; <span data-toggle="year-copy"></span>
                                </p>
                            </div>
                        </div>
                        <!-- END Meta Info Section -->
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!--
            Dashmix JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out ../admin/assets/_js/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the ../admin/assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            ../admin/assets/js/core/jquery.min.js
            ../admin/assets/js/core/bootstrap.bundle.min.js
            ../admin/assets/js/core/simplebar.min.js
            ../admin/assets/js/core/jquery-scrollLock.min.js
            ../admin/assets/js/core/jquery.appear.min.js
            ../admin/assets/js/core/js.cookie.min.js
        -->
        <script src="../admin/assets/js/dashmix.core.min.js"></script>

        <!--
            Dashmix JS

            Custom functionality including Blocks/Layout API as well as other vital and optional helpers
            webpack is putting everything together at ../admin/assets/_js/main/app.js
        -->
        <script src="../admin/assets/js/dashmix.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="../admin/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="../admin/assets/js/pages/op_auth_signin.min.js"></script>
    </body>
</html>

<?php
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
    echo "<script>alert('$msg')</script>";
    }

?>
