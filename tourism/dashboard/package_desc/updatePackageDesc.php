<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {

        $title_en = "'" . $_POST['title_en'] . "'";
        $description_en = "'" . $_POST['description_en'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";
        $meals_en = "'" . $_POST['meals_en'] . "'";
        $visits_en = "'" . $_POST['visits_en'] . "'";
        $meals_ar = "'" . $_POST['meals_ar'] . "'";
        $visits_ar = "'" . $_POST['visits_ar'] . "'";

        $PackageDesc->updatePackageDesc($item_id, $title_en, $description_en, $title_ar, $description_ar, $meals_en, $visits_en, $meals_ar, $visits_ar);
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
                                foreach ($PackageDesc->getData() as $PackageDesct) :
                                    if ($PackageDesct['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <form method="post" enctype="multipart/form-data">
                                                <p>العنوان بالانجليزيه</p>
                                                <input class="form-control" type="text" name="title_en" value="<?php echo $PackageDesct['title_en']; ?>">
                                                <p>العنوان بالعربيه</p>
                                                <input class="form-control" type="text" name="title_ar" value="<?php echo $PackageDesct['title_ar']; ?>">
                                                <br><br>
                                                <p>الوصف بالانجليزيه</p>

                                                <textarea name="description_en" id="" cols="30" rows="10" class="form-control" placeholder="الوصف"><?php echo $PackageDesct['description_en']; ?></textarea>
                                                <p>الوصف بالعربيه</p>
                                                <textarea name="description_ar" id="" cols="30" rows="10" class="form-control" placeholder="الوصف"><?php echo $PackageDesct['description_ar']; ?></textarea>
                                                <br><br>

                                                <p>الوجبات بالانجليزيه</p>
                                                <textarea name="meals_en" id="" cols="30" rows="10" class="form-control" placeholder="الوجبات"><?php echo $PackageDesct['meals_en']; ?></textarea>
                                                <p>الوجبات بالعربيه</p>
                                                <textarea name="meals_ar" id="" cols="30" rows="10" class="form-control" placeholder="الوجبات"><?php echo $PackageDesct['meals_ar']; ?></textarea>
                                                <br><br>

                                                <p>الزيارات بالانجليزيه</p>
                                                <textarea name="visits_en" id="" cols="30" rows="10" class="form-control" placeholder="الزيارات"><?php echo $PackageDesct['visits_en']; ?></textarea>

                                                <p>الزيارات بالعربيه</p>
                                                <textarea name="visits_ar" id="" cols="30" rows="10" class="form-control" placeholder="الزيارات"><?php echo $PackageDesct['visits_ar']; ?></textarea>

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