<?php
include('../functions.php');
$item_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['deleteItem_TourImage'])) {
        $TourImage->deleteTourImages($_POST['item_id']);
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
                                foreach ($Tours->getData() as $tours) :
                                    if ($tours['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <h2>العنوان</h2>
                                            <h3><?php echo $tours['title']; ?></h3>
                                            <h3><?php echo $tours['title_ar']; ?></h3>
                                            <br><br>
                                            <h2>الوصف</h2>
                                            <h3><?php echo $tours['description']; ?></h3>
                                            <h3><?php echo $tours['description_ar']; ?></h3>

                                            <br><br>

                                            <h2>السعر</h2>

                                            <h3><?php echo $tours["price"] ?></h3>
                                            <br><br>

                                            <h2>الوجهه</h2>

                                            <h3> <?php
                                                    foreach ($Destination->getData() as $destenation) :

                                                    ?>
                                                    <?php echo $tours['destenation_id'] == $destenation['id'] ? $destenation['title_en'] : ''; ?>
                                                <?php
                                                    endforeach;

                                                ?></h3>

                                            <br><br>

                                            <h2>الصوره</h2>

                                            <img src="../../uploads/tours/<?php echo $tours["img"];  ?>" alt="" width="200px">
                                            <br><br>

                                            <h2>مسار الرحلة</h2>


                                            <h3><?php echo $tours["Itinerary"] ?></h3>
                                            <h3><?php echo $tours["Itinerary_ar"] ?></h3>

                                            <br><br>


                                            <h2>متضمنات</h2>


                                            <h3><?php echo $tours["included"] ?></h3>
                                            <h3><?php echo $tours["included_ar"] ?></h3>

                                            <br><br>

                                            <h2>مستبعدات</h2>

                                            <h3><?php echo $tours["excluded"] ?></h3>
                                            <h3><?php echo $tours["excluded_ar"] ?></h3>





                                            <?php
                                            foreach ($TourImage->getData() as $toursdesc) :
                                                if ($toursdesc['tour_id'] == $item_id) :

                                            ?>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <img src="../../uploads/TourImages/<?php echo $toursdesc["img"] ?>" alt="" width="300px">

                                                        </div>

                                                        <div>
                                                            <form method="post">

                                                                <input type="hidden" value="<?php echo $toursdesc["id"] ?>" name="item_id">
                                                                <button name="deleteItem_TourImage" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                            </form>
                                                            <a href="<?php printf('%s?id=%s', '../tour_images/updateTourImage.php',  $toursdesc['id']); ?>">
                                                                <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>

                                            <a href="<?php printf('%s?tour_id=%s', '../tour_images/addTourImage2.php',  $tours['id']); ?>">
                                                <button class="btn btn-outline-info">اضافه صور</button>
                                            </a>
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