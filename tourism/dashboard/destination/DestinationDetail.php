<?php
include('../functions.php');
$item_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_DestinationDesc'])) {
        $DestinationDesc->deleteDestinationDesc($_POST['item_id']);
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
                                foreach ($Destination->getData() as $destination) :
                                    if ($destination['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <h2>العنوان</h2>
                                            <h3><?php echo $destination['title_en']; ?></h3>
                                            <h3><?php echo $destination['title_ar']; ?></h3>

                                            <h2>الصوره</h2>
                                            <img height="300px" src="../../uploads/destinations/<?php echo $destination['img']; ?>" alt="">
                                            <h2>التفاصيل</h2>
                                            <br><br><br>
                                            <?php
                                            foreach ($DestinationDesc->getData() as $destinationdesc) :
                                                if ($destinationdesc['destination_id'] == $item_id) :

                                            ?>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5><?php echo $destinationdesc['title_en']; ?></h5>
                                                            <p><?php echo $destinationdesc['description_en']; ?></p>
                                                            <h5><?php echo $destinationdesc['title_ar']; ?></h5>
                                                            <p><?php echo $destinationdesc['description_ar']; ?></p>

                                                        </div>

                                                        <div>
                                                            <br>
                                                            <a href="../destination_desc/updateDestinationDesc.php?id=<?php echo $destinationdesc['id'] ?>">
                                                                <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                            <br>
                                                            <form method="post">

                                                                <input type="hidden" value="<?php echo $destinationdesc["id"] ?>" name="item_id">
                                                                <button name="deleteItem_DestinationDesc" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                            </form>

                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                            <a class="btn btn-outline-success" href="<?php printf('%s?destination_id=%s', '../destination_desc/addDestinationDesc2.php',  $destination['id']); ?>">
                                                اضف تفاصيل اكثر
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