<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $title_en = "'" . $_POST['title_en'] . "'";
        $description_en = "'" . $_POST['description_en'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";

        $DestinationDesc->updateDestinationDesc($item_id,  $title_en, $description_en, $title_ar, $description_ar);
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
                                foreach ($DestinationDesc->getData() as $DestinationDesct) :
                                    if ($DestinationDesct['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <form method="post" enctype="multipart/form-data">
                                                <p>العنوان بالانجليزيه</p>
                                                <input class="form-control" type="text" name="title_en" value="<?php echo $DestinationDesct['title_en']; ?>">

                                                <p>الوصف بالانجليزيه</p>
                                                <textarea name="description_en" id="" cols="30" rows="10" class="form-control" placeholder="الوصف"><?php echo $DestinationDesct['description_en']; ?></textarea>
                                                <p>العنوان بالعربيه</p>
                                                <input class="form-control" type="text" name="title_ar" value="<?php echo $DestinationDesct['title_ar']; ?>">

                                                <p>الوصف بالعربيه</p>
                                                <textarea name="description_ar" id="" cols="30" rows="10" class="form-control" placeholder="الوصف"><?php echo $DestinationDesct['description_ar']; ?></textarea>
                                                <button type="submit" name="submit" class="addtotable">عدل</button>
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