<?php
require_once '../admin/inc/functions/config.php';
$title = "ticket";
require_once 'inc/header.php';



if (isset($_POST['submit'])) {
    if (isset($_SESSION['user'])) {
        $id = $_SESSION['user'];
    }

    $response = sendTicket($_POST);
    if ($response === true) {
        echo "<script>alert('Ticket created successful!')</script>";
        echo "<script>alert('You will get a reply within the next 24hrs!')</script>";
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
            <i class="fa fa-angle-right text-muted mr-1"></i> Create Ticket
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
                            <input type="text" readonly name="acc_number" class="form-control" id="account_number" placeholder="Account Number" value="<?= $acc_number; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-user"></i>
                                </span>
                            </div>
                            <input type="text" readonly name="username" class="form-control" id="username" placeholder="Username" value="<?= $fullname; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-tag"></i>
                                </span>
                            </div>
                            <input type="text" name="subject" class="form-control" placeholder="Enter Subject">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </div>
                            <textarea name="query" class="form-control" placeholder="Enter Query"></textarea>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group" id="make_transfer">
                        <div class="input-group">
                            <div class="input-group-append">
                                <button type="submit" name="submit" class="btn btn-alt-success">Raise Ticket</button>
                            </div>
                        </div>
                    </div>
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