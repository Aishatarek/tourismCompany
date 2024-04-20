<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {

        $title_en = "'" . $_POST['title_en'] . "'";
        $price = "'" . $_POST['price'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";


        $PackageIncluded->updatePackageIncluded($item_id, $title_en, $title_ar, $price);
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
                                foreach ($PackageIncluded->getData() as $PackageIncludedt) :
                                    if ($PackageIncludedt['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <form method="post" enctype="multipart/form-data">
                                                <p>العنوان بالانجليزيه</p>
                                                <input class="form-control" type="text" name="title_en" value="<?php echo $PackageIncludedt['title_en']; ?>">
                                                <p>العنوان بالعربيه</p>
                                                <input class="form-control" type="text" name="title_ar" value="<?php echo $PackageIncludedt['title_ar']; ?>">
                                                <br><br>
                                                <p> السعر</p>
                                                <input class="form-control" type="number" name="price" value="<?php echo $PackageIncludedt['price']; ?>">

                                               
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