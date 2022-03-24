<?php
if (!isset($_SESSION['admin'])) {
    blockUrlHackers($_SESSION['admin'], "signin.php");
} else {
    $admin_id = $_SESSION['admin'];
}

$admin_details = where("admins", "id", $admin_id);

foreach ($admin_details as $admin) {
    extract($admin);
}


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Admin Dashboard</title>

    <meta name="description" content="Admin Dashboard">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Admin Dashboard">
    <meta property="og:site_name" content="Dashmix">
    <meta property="og:description" content="Admin Dashboard">
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
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="assets/css/dashmix.min.css">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/xwork.min.css"> -->
    <!-- END Stylesheets -->
</head>

<body>
   
    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        <!-- Side Overlay-->
        <aside id="side-overlay">
            <!-- Side Header -->
            <div class="bg-image" style="background-image: url('assets/media/various/bg_side_overlay_header.jpg');">
                <div class="bg-primary-op">
                    <div class="content-header">
                        <!-- User Avatar -->
                        <a class="img-link mr-1" href="be_pages_generic_profile.html">
                            <img class="img-avatar img-avatar48" src="assets/media/avatars/avatar10.jpg" alt="">
                        </a>
                        <!-- END User Avatar -->

                        <!-- User Info -->
                        <div class="ml-2">
                            <a class="text-white font-w600" href="be_pages_generic_profile.html"></a>
                            <div class="text-white-75 font-size-sm"><?= $fullname; ?></div>
                        </div>
                        <!-- END User Info -->

                        <!-- Close Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="ml-auto text-white" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Side Overlay -->
                    </div>
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Side Content -->
            <?php require_once 'drawer.php';?>
            <!-- END Side Content -->
        </aside>
        <!-- END Side Overlay -->

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
            <!-- Side Header -->
            <div class="bg-header-dark">
                <div class="content-header bg-white-10">
                    <!-- Logo -->
                    <a class="font-w600 text-white tracking-wide" href="index.html">
                        <span class="smini-visible">
                            D<span class="opacity-75">x</span>
                        </span>
                        <span class="smini-hidden">
                            BCA<span class="opacity-75">Mellon</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Toggle Sidebar Style -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                        <a class="js-class-toggle text-white-75" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');" href="javascript:void(0)">
                            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
                        </a>
                        <!-- END Toggle Sidebar Style -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times-circle"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
            </div>
            <!-- END Side Header -->

            <!-- Sidebar Scrolling -->
            <div class="js-sidebar-scroll">
                <!-- Side Navigation -->
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="./">
                                <i class="nav-main-link-icon fa fa-location-arrow"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                  
                        <li class="nav-main-heading">Account</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-users"></i>
                                <span class="nav-main-link-name">Users</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="users.php">
                                        <span class="nav-main-link-name">All Users</span>
                                    </a>
                                </li>
                            
                            </ul>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-boxes"></i>
                                <span class="nav-main-link-name">Transactions</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="confirm.php">
                                        <span class="nav-main-link-name">Confirm Transactions</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="credit_account.php">
                                        <span class="nav-main-link-name">Credit Account</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                     
                        <li class="nav-main-heading">Authentication</li>
                       
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-user-friends"></i>
                                <span class="nav-main-link-name">Auth</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="">
                                        <span class="nav-main-link-name">Profile</span>
                                    </a>
                                </li>
                                
                                <li class="nav-main-item">
                                    <!-- <a class="nav-main-link" href="signup.php">
                                        <span class="nav-main-link-name">Add Admin</span>
                                    </a> -->
                                </li>
                        
                            </ul>
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
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <!-- <button type="button" class="btn btn-dual" data-toggle="layout" data-action="header_search_on">
                        <i class="fa fa-fw fa-search"></i> <span class="ml-1 d-none d-sm-inline-block">Search</span>
                    </button> -->
                    <!-- END Open Search Section -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div>
                    <!-- User Dropdown -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block">Admin</span>
                            <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                            <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                                User Options
                            </div>
                            <div class="p-2">
                                <!-- <a class="dropdown-item" href="be_pages_generic_profile.html">
                                    <i class="far fa-fw fa-user mr-1"></i> Profile
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                                    <span><i class="far fa-fw fa-envelope mr-1"></i> Inbox</span>
                                    <span class="badge badge-primary badge-pill">3</span>
                                </a>
                                <a class="dropdown-item" href="be_pages_generic_invoice.html">
                                    <i class="far fa-fw fa-file-alt mr-1"></i> Invoices
                                </a> -->
                                <div role="separator" class="dropdown-divider"></div>

                                <!-- Toggle Side Overlay -->
                                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                <!-- <a class="dropdown-item" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
                                    <i class="far fa-fw fa-building mr-1"></i> Settings
                                </a> -->
                                <!-- END Side Overlay -->

                                <div role="separator" class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                                </a>
                                <a class="dropdown-item" href="settings.php">
                                    <i class="far fa fa-cog mr-1"></i> Settings
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END User Dropdown -->

                    <!-- Notifications Dropdown -->
                    <div class="dropdown d-inline-block">
                        <!-- <button type="button" class="btn btn-dual" id="page-header-notifications-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="badge badge-secondary badge-pill">5</span>
                        </button> -->
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0" aria-labelledby="page-header-notifications-dropdown">
                            <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                                Notifications
                            </div>
                            <ul class="nav-items my-2">
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mx-3">
                                            <i class="fa fa-fw fa-check-circle text-success"></i>
                                        </div>
                                        <div class="media-body font-size-sm pr-2">
                                            <div class="font-w600">App was updated to v5.6!</div>
                                            <div class="text-muted font-italic">3 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mx-3">
                                            <i class="fa fa-fw fa-user-plus text-info"></i>
                                        </div>
                                        <div class="media-body font-size-sm pr-2">
                                            <div class="font-w600">New Subscriber was added! You now have 2580!</div>
                                            <div class="text-muted font-italic">10 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mx-3">
                                            <i class="fa fa-fw fa-times-circle text-danger"></i>
                                        </div>
                                        <div class="media-body font-size-sm pr-2">
                                            <div class="font-w600">Server backup failed to complete!</div>
                                            <div class="text-muted font-italic">30 min ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mx-3">
                                            <i class="fa fa-fw fa-exclamation-circle text-warning"></i>
                                        </div>
                                        <div class="media-body font-size-sm pr-2">
                                            <div class="font-w600">You are running out of space. Please consider upgrading your plan.</div>
                                            <div class="text-muted font-italic">1 hour ago</div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="text-dark media py-2" href="javascript:void(0)">
                                        <div class="mx-3">
                                            <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                        </div>
                                        <div class="media-body font-size-sm pr-2">
                                            <div class="font-w600">New Sale! + $30</div>
                                            <div class="text-muted font-italic">2 hours ago</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="p-2 border-top">
                                <a class="btn btn-light btn-block text-center" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-eye mr-1"></i> View All
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- END Notifications Dropdown -->

                    <!-- Toggle Side Overlay -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-dual" data-toggle="layout" data-action="side_overlay_toggle">
                        <i class="far fa-fw fa-list-alt"></i>
                    </button>
                    <!-- END Toggle Side Overlay -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-header-dark">
                <div class="bg-white-10">
                    <div class="content-header">
                        <form class="w-100" action="be_pages_generic_search.html" method="POST">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-alt-primary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-fw fa-times-circle"></i>
                                    </button>
                                </div>
                                <input type="text" class="form-control border-0" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
            <div id="page-header-loader" class="overlay-header bg-header-dark">
                <div class="bg-white-10">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-sun fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>