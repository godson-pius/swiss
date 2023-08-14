<?php
require_once '../admin/inc/functions/config.php';
$title = "transfer";
require_once 'inc/header.php';


if (isset($_POST['submit'])) {
    $status = false;

    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user'];
    }

    $response = make_transfer($_POST, $id);
    if ($response === true) {
        // echo 'Processing....';
        // sleep(7);
        $status = true;
        // echo "<script>setTimeout(() => {alert('Transaction Successful')}, 10000)</script>";
        echo "<script>setTimeout(() => {window.location.href = 'pending'}, 10000)</script>";
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
            <i class="fa fa-angle-right text-muted mr-1"></i> Domestic Transfer
        </h2>

        <div class="row">

            <div class="col-lg-12 col-xl-12">
                <form action="" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-user"></i>
                                </span>
                            </div>
                            <input type="text" name="recipent" onblur="getRecipent()" class="form-control" id="account_number" placeholder="Account Number">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-terminal"></i>
                                </span>
                            </div>
                            <input type="text" maxLength="9" name="routing_number" class="form-control" placeholder="Enter Routing number">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-dollar-sign"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="amount" placeholder="Amount">
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </div>
                            <textarea name="desc" class="form-control" placeholder="Enter transaction description"></textarea>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group" id="make_transfer" style="display: none;">
                        <div class="input-group">
                            <input type="text" disabled class="form-control form-control-alt" id="recipent_name" name="example-group3-input2-alt2" placeholder="Receiver">
                            <div class="input-group-append">
                                <button type="submit" id="tbtn" name="submit" class="btn btn-alt-success">Make Transfer</button>
                            </div>
                        </div>
                    </div>

                    <?php
                        if ($status == true) { ?>
                            <p class="float-right bg-warning rounded p-2">Transaction Processing...</p>
                        <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->

<!-- Footer -->
<?php require_once 'inc/footer.php';     ?>
<script src="js/get_recipent.js"></script>