<?php
require_once '../admin/inc/functions/config.php';
$title = "User Dashboard";
require_once 'inc/header.php';

?>
<!-- END Header -->

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content">
        <!-- Quick Overview -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Transactions
        </h2>

        <div class="row">
            <div class="col-lg-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Pending Transactions</h3>

                    </div>

                    <div class="block-content">
                        <!-- All Products Table -->
                        <div class="table-responsive">
                            <table class="table table-borderless table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">ID</th>
                                        <th class="d-none d-sm-table-cell text-center">Date Sent</th>
                                        <th>Sent to</th>
                                        <th class="d-none d-sm-table-cell">Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $all_transactions = Transactions($user_id, 0);
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
                                            <td class=" d-none d-sm-table-cell font-size-sm">
                                                <strong>$<?= number_format($amount); ?></strong>
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
<script src="js/get_recipent.js"></script>