<?php
require_once '../admin/inc/functions/config.php';
require_once 'inc/header.php';
?>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">

                <!-- Hero -->
                <div class="bg-image" style="background-image: url('../admin/assets/media/photos/photo17@2x.jpg');">
                    <div class="bg-black-75">
                        <div class="content content-full">
                            <div class="py-5 text-center">
                                <a class="img-link" href="be_pages_generic_profile.html">
                                    <img class="img-avatar img-avatar96 img-avatar-thumb" src="../admin/assets/media/avatars/avatar10.jpg" alt="">
                                </a>
                                <h1 class="font-w700 my-2 text-white"><?= $fullname; ?></h1>
                                <h2 class="h4 font-w700 text-white-75">
                                    BCA Mellon Bank
                                </h2>
                                <a class="btn btn-hero-dark" href="./">
                                    <i class="fa fa-fw fa-arrow-left"></i> Back to Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->

                <!-- Page Content -->
                
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <?php require_once 'inc/footer.php';?>