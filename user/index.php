<?php
require_once '../admin/inc/functions/config.php';
$title = "User Dashboard";
require_once 'inc/header.php';

$total_transfer = fetch_transactions(1, $user_id);
foreach ($total_transfer as $transfer) {
}

$total_income = fetch_transactions(0, $user_id);
foreach ($total_income as $income) {
}

?>
<!-- END Header -->

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="content">
        <!-- Quick Overview -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Quick Overview
        </h2>
        <div class="block block-rounded invisible" data-toggle="appear">
            <div class="block-content block-content-full">
                <div class="row text-center">
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            $<?= number_format($acc_balance); ?>
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Balance</a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-success mb-1">
                            $<?= number_format($income['total']); ?>
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Total Income</a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-danger mb-1">
                            -$<?= number_format($transfer['total']); ?>
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Total Transfer</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Quick Overview -->

        <!-- Cards -->

        <!-- END Cards -->

        <!-- Bank Accounts -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Bank Accounts (<?= getTotalQuote("users", "email", $email); ?>)
        </h2>
        <div class="row">
            <?php
            $accounts = whereQuote("users", "email", $email);
            foreach ($accounts as $account) { ?>

                <div class="col-lg-6 invisible" data-toggle="appear">
                    <!-- Bank Account #1 -->
                    <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                        <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                            <div>
                                <p class="font-size-lg font-w600 mb-0">
                                    <span class="text-default"><?= $account['acc_number']; ?></span>
                                </p>
                                <p class="text-muted mb-0">
                                    $<?= $account['acc_balance']; ?>
                                </p>
                            </div>
                            <div class="ml-3">
                                <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                            <span class="font-size-sm text-muted">BCA Mellon Bank</span>
                        </div>
                    </a>
                    <!-- END Bank Account #1 -->
                </div>
            <?php } ?>

        </div>
        <!-- END Bank Accounts -->

        <!-- Latest Transactions -->
        <h2 class="content-heading">
            <i class="fa fa-angle-right text-muted mr-1"></i> Latest Transactions
        </h2>
        <?php
        $transc = fetchAllWhere("transactions", "user_id", $user_id, "id", 0, 10);
        foreach ($transc as $trans) {
            if ($trans['type'] == 0) {
                $class_style = "border-success";
                $symbol = "+";
                $arrow = "fa fa-arrow-left text-success";
            } else if ($trans['type'] == 1) {
                $class_style = "border-danger";
                $symbol = "-";
                $arrow = "fa fa-arrow-right text-danger";
            }

            $recipents = where("users", "acc_number", $trans['to_user']);
            foreach ($recipents as $recipent) { ?>

                <a class="block block-rounded block-link-shadow invisible border-left <?= $class_style; ?> border-3x" data-toggle="appear" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0">
                                <?= $symbol . $trans['amount']; ?>
                            </p>
                            <p class="text-muted mb-0">
                                <?= $recipent['acc_number']; ?> (<?= $recipent['username']; ?>)
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="<?= $arrow; ?>"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light">
                        <span class="font-size-sm text-muted">From <strong>BCA Mellon Bank</strong> at <strong><?= date("M d, Y", strtotime($trans['created_at'])); ?> - <?= date("h:i A", strtotime($trans['created_at'])) ?></strong></span>
                    </div>
                </a>
        <?php }
        } ?>

        <!-- END Latest Transactions -->

        <!-- View More -->
        <div class="text-center invisible" data-toggle="appear">
            <a class="btn btn-sm btn-alt-secondary font-w600" href="javascript:void(0)">
                <i class="fa fa-arrow-down mr-1"></i> View More..
            </a>
        </div>
        <!-- END View More -->
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Footer -->
<?php require_once 'inc/footer.php'; ?>