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

<!-- EXCHANGERATES.ORG.UK LIVE CURRENCY RATES TICKER START -->
    <div class="row">
        <div class="col-12">
        <iframe src="//www.exchangerates.org.uk/widget/ER-LRTICKER.php?w=1000&s=1&mc=GBP&mbg=F0F0F0&bs=no&bc=000044&f=Verdana&fs=10px&fc=0D443B&lc=2ED1C2&lhc=FE9A00&vc=FE9A00&vcu=008000&vcd=FF0000&" width="100%" height="30" frameborder="0" scrolling="no" marginwidth="0" marginheight="0"></iframe>
<!-- EXCHANGERATES.ORG.UK LIVE CURRENCY RATES TICKER END -->
        </div>
    </div>

    <!-- Page Content -->
    <div class="content">
        <!-- Quick Overview -->
        <div class="row">
            <div class="col-lg-6">
                <h2 class="content-heading">
                    <i class="fa fa-angle-right text-muted mr-1"></i> Hi <?= $fullname; ?>, Welcome back
                </h2>
            </div>
            <div class="col-lg-6 placeholder-glow">
                <h2 class="content-heading">
                    <?php if ($access == 1) { ?>
                        <i class="fa fa-user-circle text-muted mr-1"></i> Account Status: <b class="text-success">Active</b> 
                    <?php } else { ?>
                        <i class="fa fa-user-circle text-muted mr-1"></i> Account Status: <b class="text-danger">Disabled</b>
                    <?php } ?>
                </h2>
            </div>
        </div>
        
        <?php if ($access == 0) { ?>
            <div class="row">
                <div class="col-lg-12 bg-warning mb-3 text-dark text-center p-2 rounded">
                    <b>Your account is disabled! Please contact customer service.</b>
                </div>
            </div>
        <?php } ?>

        <div class="block block-rounded invisible" data-toggle="appear">
            <div class="block-content block-content-full">
                <div class="row text-center">
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-black mb-1">
                            USD $<?= number_format($acc_balance); ?>
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Available Balance</a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-success mb-1">
                            USD $<?= number_format($income['total']); ?>
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Current Balance</a>
                    </div>
                    <div class="col-md-4 py-3">
                        <div class="font-size-h1 font-w300 text-danger mb-1">
                            USD -$<?= number_format($transfer['total']); ?>
                        </div>
                        <a class="link-fx font-size-sm font-w700 text-uppercase text-muted" href="javascript:void(0)">Recent Transfer</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Quick Overview -->

        <!-- Cards -->

        <!-- END Cards -->

        <!--  Account Details -->
        <div class="row">
            <div class="col-lg-6">
                <h2 class="content-heading">
                    <i class="fa fa-user text-muted mr-1"></i> Your account Details
                </h2>
            </div>
            <div class="col-lg-6">
            <h2 class="content-heading">
                    <i class="fa fa-desktop text-muted mr-1"></i> LOGGED IN FROM: <span class="text-default"><?= get_client_ip(); ?></span>
                </h2>
            </div>
        </div>
        <div class="row">

            <div class="col-lg-4 invisible" data-toggle="appear">
                <!-- Bank Account #1 -->
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0">
                                <span class="text-default"><?= $acc_number; ?></span>
                            </p>
                            <p class="text-muted mb-0">
                                Account Number
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                        <span class="font-size-sm text-muted">Swiss Apex Financial Bank</span>
                    </div>
                </a>
                <!-- END Bank Account #1 -->
            </div>

            <div class="col-lg-4 invisible" data-toggle="appear">
                <!-- Bank Account #1 -->
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0">
                                <span class="text-default"><?= $fullname; ?></span>
                            </p>
                            <p class="text-muted mb-0">
                                Account Holder
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                        <span class="font-size-sm text-muted">Swiss Apex Financial Bank</span>
                    </div>
                </a>
                <!-- END Bank Account #1 -->
            </div>
            
            <div class="col-lg-4 invisible" data-toggle="appear">
                <!-- Bank Account #1 -->
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                        <div>
                            <p class="font-size-lg font-w600 mb-0">
                                <span class="text-default"><?= $acc_type; ?></span>
                            </p>
                            <p class="text-muted mb-0">
                                Account Type
                            </p>
                        </div>
                        <div class="ml-3">
                            <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                        </div>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                        <span class="font-size-sm text-muted">Swiss Apex Financial Bank</span>
                    </div>
                </a>
                <!-- END Bank Account #1 -->
            </div>
          
        </div>
        <!-- END Account Deatails -->

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
                                    USD $<?= $account['acc_balance']; ?>
                                </p>
                            </div>
                            <div class="ml-3">
                                <i class="fa fa-piggy-bank fa-2x text-gray"></i>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm text-center bg-body-light">
                            <span class="font-size-sm text-muted">Swiss Apex Financial Bank</span>
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
                                <?= $symbol . $trans['amount']; ?> USD
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
                        <span class="font-size-sm text-muted">Swiss Apex Financial: At <strong><?= date("M d, Y", strtotime($trans['created_at'])); ?> - <?= date("h:i A", strtotime($trans['created_at'])) ?></strong></span>
                    </div>
                </a>
        <?php }
        } ?>

        <!-- END Latest Transactions -->

        <!-- View More -->
        <div class="text-center invisible" data-toggle="appear">
            <a class="btn btn-sm btn-alt-secondary font-w600" href="./transactions.php">
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