<?php
include('../functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = "'" . $_POST['name'] . "'";
        $opinion = "'" . $_POST['opinion'] . "'";
        $country = "'" . $_POST['country'] . "'";
        $Reviews->addReviews($name, $opinion, $country);
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
                                <form action="" method="POST" class="login-email" enctype="multipart/form-data">
                                    <p style="font-size: 2rem; font-weight: 800;">اضافه رأى</p>
                                    <div class="input-group">
                                        <input type="text" placeholder="الاسم" name="name" required class="form-control">
                                    </div>
                                    <br>

                                    <div class="input-group">
                                        <textarea cols="30" rows="10" placeholder="الرأى" name="opinion" required class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <input type="text" placeholder="من دوله" name="country" required class="form-control">
                                    </div>
                                    <br>


                                    <div class="input-group">
                                        <button name="submit" class="btn addtotable">اضافه رأى</button>
                                    </div>
                                </form>
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