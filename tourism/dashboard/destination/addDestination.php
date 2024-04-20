<?php
include('../functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $title_en = "'" . $_POST['title_en'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";
        $img =  $_FILES['img'];
        $Destination->addDestination($title_en, $title_ar, $img);
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
                                    <h2 style="font-size: 2rem; font-weight: 800;">اضف وجهه </h2>
                                    <div class="input-group">
                                        <input type="text" placeholder="العنوان بالانجليزيه" name="title_en" required class="form-control">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <input type="text" placeholder="العنوان بالعربيه" name="title_ar" required class="form-control">
                                    </div>

                                    <br>

                                    <p>صوره</p>
                                    <div class="input-group">
                                        <input type="file" name="img" required class="form-control">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <button name="submit" class="btn addtotable"> اضف</button>
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