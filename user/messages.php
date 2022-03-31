<?php
require_once '../admin/inc/functions/config.php';
$title = "ticket";
require_once 'inc/header.php';

$sql = "SELECT * FROM tickets WHERE sender_acc = '$acc_number' AND status =  1";
$result = returnQuery($sql);

?>
<!-- END Header -->

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content">
        <!-- Quick Overview -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Messages
        </h2>

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <?php
                    foreach ($result as $reply) {
                        extract($reply); ?>

                            <div class="card shadow mb-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-comment"></i>
                                            </span>
                                        </div>
                                        <input type="text" readonly class="form-control" value="<?= $reply; ?>">
                                    </div>
                                </div>

                                <p class="card-text ml-3"><?= $query; ?></p>
                            </div>

                <?php } ?>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Footer -->
<?php require_once 'inc/footer.php';     ?>
<script src="js/get_recipent.js"></script>