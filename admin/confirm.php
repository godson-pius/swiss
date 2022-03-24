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
            <i class="fa fa-angle-right text-muted mr-1"></i> Confirm Transactions
        </h2>

        <div class="row">
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">All Transactions</h3>

                    </div>

                    <div class="block-content">
                        <!-- All Products Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">ID</th>
                                        <th class="d-none d-sm-table-cell text-center">Added</th>
                                        <th>To</th>
                                        <th class="d-none d-sm-table-cell text-right">Amount</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_transactions = where("transactions", "approved", 0);
                                    foreach ($all_transactions as $transaction) {
                                        extract($transaction); ?>

                                        <tr>
                                            <td class="text-center font-size-sm">
                                                <a class="font-w600" href="be_pages_ecom_product_edit.html">
                                                    <strong>TID00<?= $id; ?></strong>
                                                </a>
                                            </td>
                                            <td class="d-none d-sm-table-cell text-center font-size-sm"><?= $created_at; ?></td>
                                            
                                            <td>
                                                <span class="badge badge-success"><?= $to_user; ?></span>
                                            </td>
                                            <td class="text-right d-none d-sm-table-cell font-size-sm">
                                                <strong>$<?= number_format($amount); ?></strong>
                                            </td>
                                            <td class="text-center font-size-sm">
                                                <a data-id="<?= $user_id; ?>" data-tid="<?= $id; ?>" data-amount="<?= $amount ?>" data-acct="<?= $to_user; ?>" onclick="approve(this)" class="btn btn-sm btn-alt-secondary">
                                                    <i class="fa fa-fw fa-check"></i>
                                                </a>
                                                <a data-id="<?= $id; ?>" onclick="unapprove(this)" class="btn btn-sm btn-alt-secondary">
                                                    <i class="fa fa-fw fa-times text-danger"></i>
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