<?php
require_once 'inc/functions/config.php';
require_once 'inc/header.php';

if (isset($_POST['submit'])) {
    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user'];
    }
    $response = credit_user_account($_POST);
    if ($response === true) {
        echo "<script>alert('Account have been created!')</script>";
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
<!-- END Header -->

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content">
        <!-- Quick Overview -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Reply Tickets
        </h2>

        <div class="row">
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">All Tickets</h3>

                    </div>

                    <div class="block-content">
                        <!-- All Products Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">ID</th>
                                        <th class="d-none d-sm-table-cell text-center">Date Sent</th>
                                        <th>Sender</th>
                                        <th class="d-none d-sm-table-cell text-right">Subject</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tickets = where("tickets", "status", 0);
                                    foreach ($tickets as $ticket) {
                                        extract($ticket); ?>

                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_product_edit.html">
                                                    <strong>CT<?= $ticket_id; ?></strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm"><?= $created_at; ?></td>
                                            
                                            <td>
                                                <span class="badge badge-success"><?= $sender_acc . "/" . $sender_name; ?></span>
                                            </td>
                                            <td class="text-right d-none d-sm-table-cell font-size-sm">
                                                <strong><?= $subject; ?></strong>
                                            </td>
                                            <td class="text-center font-size-sm">
                                                <a href="reply?id=<?= $ticket_id; ?>" class="btn btn-sm btn-alt-secondary">
                                                    <i class="fa fa-fw fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END All Products Table -->

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Footer -->
<?php require_once 'inc/footer.php'; ?>
<script src="js/approve.js"></script>