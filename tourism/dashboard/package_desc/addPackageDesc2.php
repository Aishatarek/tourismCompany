<?php
include('../functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {

        $package_id = $_GET['package_id'];

        $title_en = "'" . $_POST['title_en'] . "'";
        $description_en = "'" . $_POST['description_en'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";
        $meals_en = "'" . $_POST['meals_en'] . "'";
        $visits_en = "'" . $_POST['visits_en'] . "'";
        $meals_ar = "'" . $_POST['meals_ar'] . "'";
        $visits_ar = "'" . $_POST['visits_ar'] . "'";
        $PackageDesc->addPackageDesc($title_en, $description_en, $title_ar, $description_ar, $package_id, $meals_en, $visits_en, $meals_ar, $visits_ar);
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
                                    <p style="font-size: 2rem; font-weight: 800;">اضف تفاصيل اكثر </p>
                                    <div class="input-group">
                                        <input type="text" placeholder="العنوان بالانجليزيه" name="title_en" required class="form-control">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <input type="text" placeholder="العنوان بالعربيه" name="title_ar" required class="form-control">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="description_en" placeholder="الوصف بالانجليزيه"  cols="30" rows="10" required class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="description_ar" placeholder="الوصف بالعربيه"  cols="30" rows="10" required class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="meals_en" placeholder="الوجبات بالانجليزيه" cols="30" rows="10" required class="form-control"></textarea>


                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="meals_ar" placeholder="الوجبات بالعربيه" cols="30" rows="10" required class="form-control"></textarea>


                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="visits_en" placeholder="الزيارات بالانجليزيه" cols="30" rows="10" required class="form-control"></textarea>

                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="visits_ar" placeholder="الزيارات بالعربيه" cols="30" rows="10" required class="form-control"></textarea>

                                    </div>
                                    <br>
                                    <br>
                                    <div class="input-group">
                                        <button name="submit" class="btn addtotable">اضف </button>
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