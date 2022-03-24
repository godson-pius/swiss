<?php
if (!isset($_SESSION['user'])) {
    blockUrlHackers($_SESSION['user'], "signin.php");
} else {
    $user_id = $_SESSION['user'];
}

$user_details = where("users", "id", $user_id);

foreach ($user_details as $user) {
    extract($user);

    if ($access == 0) {
        redirect_to("signin.php?msg=Your account have been blocked!");
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title><?= $fullname; ?> Dashboard</title>

    <meta name="description" content="User Dashboard created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="User Dashboard">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="User Dashboard created by pixelcave and published on Themeforest">
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
    <link rel="stylesheet" id="css-theme" href="../admin/assets/css/themes/xwork.min.css">
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
    <div id="page-container" class="sidebar-o side-scroll page-header-fixed page-header-dark main-content-boxed">

        <!-- Sidebar -->
        <!--
                Sidebar Mini Mode - Display Helper classes

                Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

                Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
                Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
                Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
            -->
        <nav id="sidebar" aria-label="Main Navigation">
            <!-- Side Header (mini Sidebar mode) -->
            <div class="smini-visible-block">
                <div class="content-header bg-header-dark">
                    <!-- Logo -->
                    <a class="font-w600 text-white tracking-wide" href="index.html">
                        D<span class="opacity-75">x</span>
                    </a>
                    <!-- END Logo -->
                </div>
            </div>
            <!-- END Side Header (mini Sidebar mode) -->

            <!-- Side Header (normal Sidebar mode) -->
            <div class="smini-hidden">
                <div class="content-header justify-content-lg-center bg-header-dark">
                    <!-- Logo -->
                    <a class="font-w600 text-white tracking-wide" href="index.html">
                        Swiss<span class="opacity-75"> Apex</span>
                        <span class="font-w400">Banking</span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div class="d-lg-none">
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
            </div>
            <!-- END Side Header (normal Sidebar mode) -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Actions -->
                <div class="content-side content-side-full text-center bg-body-light">
                    <div class="smini-hide">
                        <img class="img-avatar" src="../admin/assets/media/avatars/avatar10.jpg" alt="">
                        <div class="mt-3 font-w600"><?= $fullname; ?></div>
                        <a class="link-fx text-muted" href="javascript:void(0)"><?= $acc_number; ?></a>
                    </div>
                </div>
                <!-- END Side Actions -->

                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="./">
                                <i class="nav-main-link-icon fa fa-rocket"></i>
                                <span class="nav-main-link-name">Overview</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Manage</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-piggy-bank"></i>
                                <span class="nav-main-link-name">Accounts</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <span class="nav-main-link-name text-success">Active</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <span class="nav-main-link-name">Manage</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="signup.php">
                                        <i class="nav-main-link-icon fa fa-plus-circle"></i>
                                        <span class="nav-main-link-name">New Account</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-money-check"></i>
                                <span class="nav-main-link-name">Transactions</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="transactions">
                                        <span class="nav-main-link-name">Approved</span>
                                        <span class="nav-main-link-badge badge badge-pill badge-success"><?= getTotalAnd("transactions", "approved", 1, "user_id", $user_id); ?></span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="pending">
                                        <span class="nav-main-link-name">Pending</span>
                                        <span class="nav-main-link-badge badge badge-pill badge-warning"><?= getTotalAnd("transactions", "approved", 0, "user_id", $user_id); ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-money-bill-wave-alt"></i>
                                <span class="nav-main-link-name">Services</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="transfer">
                                        <span class="nav-main-link-name">Domestic Transfer</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="inter">
                                        <span class="nav-main-link-name">Inter Bank Transfer</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="wire">
                                        <span class="nav-main-link-name">Wire Transfer</span>
                                    </a>
                                </li>
                                <!-- <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <span class="nav-main-link-name">Loans</span>
                                    </a>
                                </li> -->
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="credit.php">
                                        <span class="nav-main-link-name">Credit</span>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-main-heading">Personal</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="edit-profile.php">
                                <i class="nav-main-link-icon fa fa-user-circle"></i>
                                <span class="nav-main-link-name">Profile</span>
                            </a>
                        </li>

                        <li class="nav-main-item">
                            <a class="nav-main-link" href="">
                                <i class="nav-main-link-icon fa fa-cog"></i>
                                <span class="nav-main-link-name">Settings</span>
                            </a>
                        </li>

                        <li class="nav-main-heading">Dashboards</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="../">
                                <i class="nav-main-link-icon fa fa-arrow-left"></i>
                                <span class="nav-main-link-name">Go Back</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </div>
            <!-- END Sidebar Scrolling -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div>
                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                    <button type="button" class="btn btn-dual" data-toggle="layout" data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-stream fa-flip-horizontal"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <!-- <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                        <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search..</span>
                    </button> -->
                    <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div>
                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block">
                        <!-- <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-fw fa-flag"></i>
                            <span class="badge badge-success badge-pill">3</span>
                        </button> -->
                        <!-- <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                Notifications
                            </div>
                            <ul class="nav-items my-2">
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mx-3">
                                            <i class="fa fa-fw fa-coins text-danger"></i>
                                        </div>
                                        <div class="media-body font-size-sm pr-2">
                                            <div class="font-w600">You’ve made a payment of $49 to Adobe Inc.</div>
                                            <div class="text-muted font-italic">5 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mx-3">
                                            <i class="fa fa-fw fa-coins text-danger"></i>
                                        </div>
                                        <div class="media-body font-size-sm pr-2">
                                            <div class="font-w600">Recurring payment of $29 to Dropbox was successful.</div>
                                            <div class="text-muted font-italic">30 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mx-3">
                                            <i class="fa fa-fw fa-coins text-success"></i>
                                        </div>
                                        <div class="media-body font-size-sm pr-2">
                                            <div class="font-w600">Incoming payment of <strong>$499</strong> from John Taylor!</div>
                                            <div class="text-muted font-italic">2 hrs ago</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2 border-top">
                                <a class="btn btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-eye mr-1"></i> View All
                                </a>
                            </div>
                        </div> -->
                    </div>
                    <!-- END Notifications Dropdown -->

                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-fw fa-user-circle"></i>
                            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="bg-primary-darker rounded-top font-w600 text-white text-center p-3">
                                <img class="img-avatar img-avatar48 img-avatar-thumb" src="../admin/assets/media/avatars/avatar10.jpg" alt="">
                                <div class="pt-2">
                                    <a class="text-white font-w600" href="be_pages_generic_profile.html"><?= $fullname; ?></a>
                                </div>
                            </div>
                            <div class="p-2">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <!-- <i class="fa fa-fw fa-cog mr-1"></i> Settings -->
                                </a>
                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fa fa-fw fa-arrow-alt-circle-left mr-1"></i> Log Out
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-primary">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                                    <i class="fa fa-fw fa-times-circle"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control border-0" placeholder="Search.." id="page-header-search-input" name="page-header-search-input">
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-primary-dark">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>