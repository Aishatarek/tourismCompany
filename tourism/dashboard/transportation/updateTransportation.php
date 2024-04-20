<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $title_en = "'" . $_POST['title_en'] . "'";
        $description_en = "'" . $_POST['description_en'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";
        $price = "'" . $_POST['price'] . "'";
        $photo =  $_FILES['photo'];
        $video =  $_FILES['video'];
        $Transportation->updateTransportation($item_id,$title_en, $description_en, $title_ar, $description_ar, $price, $video, $photo);
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
                                foreach ($Transportation->getData() as $Transportationt) :
                                    if ($Transportationt['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <form method="post" enctype="multipart/form-data">
                                                <p>العنوان بالانجليزيه</p>
                                                <input class="form-control" type="text" name="title_en" value="<?php echo $Transportationt['title_en']; ?>">
                                                <br><br>
                                                <p>العنوان بالعربيه</p>
                                                <input class="form-control" type="text" name="title_ar" value="<?php echo $Transportationt['title_ar']; ?>">
                                                <br><br>
                                                <p>الوصف بالانجليزيه</p>
                                                <textarea  class="form-control" name="description_en" id="" cols="30" rows="10"><?php echo $Transportationt['description_en']; ?></textarea>
                                                <br><br>
                                                <p>الوصف بالعربيه</p>
                                                <textarea  class="form-control" name="description_ar" id="" cols="30" rows="10"><?php echo $Transportationt['description_ar']; ?></textarea>
                                                <br><br>
                                                <p>السعر</p>
                                                <input class="form-control" type="text" name="price" value="<?php echo $Transportationt['price']; ?>">

                                                <br><br>
                                                <p>الصوره</p>
                                                <img src="../../uploads/transportation/<?php echo $Transportationt['photo']; ?>" alt="" width="100px">
                                                <br>
                                                <input  class="form-control" type="file" name="photo">
                                                <br><br>
                                                <p>الفيديو</p>
                                                <video src="../../uploads/transportation/<?php echo $Transportationt['video']; ?>"  width="300px" controls></video>
                                                <br>
                                                <input  class="form-control" type="file" name="video">
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