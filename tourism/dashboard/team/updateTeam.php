<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = "'" . $_POST['name'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $img =  $_FILES['img'];
        $video =  $_FILES['video'];
        $name_ar = "'" . $_POST['name_ar'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";
        $Team->updateTeam($item_id, $name, $img, $description, $video, $name_ar, $description_ar);
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
                                foreach ($Team->getData() as $Teamt) :
                                    if ($Teamt['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <form method="post" enctype="multipart/form-data">
                                                <p>العنوان بالانجليزيه</p>
                                                <input class="form-control" type="text" name="name" value="<?php echo $Teamt['name']; ?>">
                                                <br><br>
                                                <p>العنوان بالعربيه</p>
                                                <input class="form-control" type="text" name="name_ar" value="<?php echo $Teamt['name_ar']; ?>">
                                                <br><br>
                                                <p>الوصف بالانجليزيه</p>
                                                <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $Teamt['description']; ?></textarea>
                                                <br><br>
                                                <p>الوصف بالعربيه</p>
                                                <textarea class="form-control" name="description_ar" id="" cols="30" rows="10"><?php echo $Teamt['description_ar']; ?></textarea>
                                                <br><br>
                                                <p>الصوره</p>
                                                <img src="../../uploads/teams/<?php echo $Teamt['img']; ?>" alt="" width="100px">
                                                <br>
                                                <input class="form-control" type="file" name="img">
                                                <br><br>
                                                <p>الفيديو</p>
                                                <video src="../../uploads/teams/<?php echo $Teamt['video']; ?>" width="300px" controls></video>
                                                <br>
                                                <input class="form-control" type="file" name="video">
                                                <br><br>
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