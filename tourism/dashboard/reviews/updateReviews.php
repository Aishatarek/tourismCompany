<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = "'" . $_POST['name'] . "'";
        $opinion = "'" . $_POST['opinion'] . "'";
        $country = "'" . $_POST['country'] . "'";


        $Reviews->updateReviews($item_id, $name, $opinion, $country);
    }
}
include("../header.php");
?>
<div class="container-scroller">
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">

        <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
            </button>


            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include("../theSideNav.php"); ?>
        <div class="main-panel maindashboard">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin">
                        <div class="card">
                            <div class="card-body">

                                <?php
                                foreach ($Reviews->getData() as $Reviewst) :
                                    if ($Reviewst['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <form method="post" enctype="multipart/form-data">
                                                <p>الاسم</p>
                                                <input class="form-control" type="text" name="name" value="<?php echo $Reviewst['name']; ?>">
                                                <br><br>
                                             
                                                <p>الرأى</p>
                                                <textarea class="form-control" name="opinion" id="" cols="30" rows="10"><?php echo $Reviewst['opinion']; ?></textarea>
                                                <br><br>
                                                <p>الدوله</p>
                                                <input class="form-control" type="text" name="country" value="<?php echo $Reviewst['country']; ?>">
                                                <br><br>
                                                <button type="submit" name="submit" class="addtotable">submit</button>
                                            </form>
                                        </div>

                                <?php

                                    endif;
                                endforeach;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../footer.php');
?>