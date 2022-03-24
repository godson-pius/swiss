<?php
    require_once '../admin/inc/functions/config.php';

    if (isset($_POST['submit'])) {
        $response = user_register($_POST);
        if ($response === true) {
            // echo "<script>alert('entered')</script>";
            redirect_to("signin.php");
        } else {
            // echo "<script>alert('error')</script>";
            $errors = $response;
            foreach($errors as $err) {
                echo "<script>alert($err)</script>";
            }
        }
    }


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Sign Up | BCA Mellon Bank</title>

    <meta name="description" content="Sign Up | BCA Mellon Bank">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Sign Up | BCA Mellon Bank">
    <meta property="og:site_name" content="BCA Mellon">
    <meta property="og:description" content="Sign Up | BCA Mellon Bank">
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
            <div class="bg-image" style="background-image: url('../admin/assets/media/photos/photo12@2x.jpg');">
                <div class="row no-gutters justify-content-center bg-black-75">
                    <!-- Main Section -->
                    <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                        <div class="p-3 w-100">
                            <!-- Header -->
                            <div class="mb-3 text-center">
                                <a class="link-fx text-success font-w700 font-size-h1" href="index.html">
                                    <span class="text-dark">BCA</span><span class="text-success">Mellon</span>
                                </a>
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Create New Account</p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign Up Form -->
                            <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <div class="row no-gutters justify-content-center">
                                <div class="col-sm-8 col-xl-6">
                                    <form action="" method="POST">
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control form-control-alt" name="fullname" placeholder="Full Name">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control form-control-alt" name="username" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control form-control form-control-alt" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <textarea name="address" class="form-control form-control form-control-alt" placeholder="Address"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="date" title="Date of Birth" class="form-control form-control form-control-alt" name="dob">
                                            </div>
                                            <div class="form-group">
                                                <select name="acc_type" class="form-control form-control form-control-alt">
                                                    <option value="ty">Savings</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt" name="password" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt" name="confirm_pwd" placeholder="Password Confirm">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox custom-control-primary">
                                                    <input type="checkbox" class="custom-control-input" id="signup-terms" name="terms">
                                                    <label class="custom-control-label" for="signup-terms">I agree to Terms &amp; Conditions</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-block btn-hero-lg btn-hero-success">
                                                <i class="fa fa-fw fa-plus mr-1"></i> Create Account
                                            </button>
                                            <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                                <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="signin.php">
                                                    <i class="fa fa-sign-in-alt text-muted mr-1"></i> Sign In
                                                </a>
                                                <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="" data-toggle="modal" data-target="#modal-terms">
                                                    <i class="fa fa-book text-muted mr-1"></i> Read Terms
                                                </a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Sign Up Form -->
                        </div>
                    </div>
                    <!-- END Main Section -->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- Terms Modal -->
    <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Terms &amp; Conditions</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                        <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit metus mi.</p>
                    </div>
                    <div class="block-content block-content-full text-right bg-light">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Terms Modal -->


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
    <script src="../admin/assets/js/pages/op_auth_signup.min.js"></script>
</body>

</html>