<?php
include('../functions.php');
$item_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_packagesDesc'])) {
        $PackageDesc->deletePackageDesc($_POST['item_id']);
    }
    if (isset($_POST['deleteItem_PackageImage'])) {
        $PackageImage->deletePackageImage($_POST['item_id']);
    }
    if (isset($_POST['deleteItem_PackageIncluded'])) {
        $PackageIncluded->deletePackageIncluded($_POST['item_id']);
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
                                foreach ($Packages->getData() as $packages) :
                                    if ($packages['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <h2>العنوان</h2>
                                            <h3><?php echo $packages['title_en']; ?></h3>
                                            <h3><?php echo $packages['title_ar']; ?></h3>
                                            <br><br>

                                            <h2>الوصف</h2>
                                            <h3><?php echo $packages['description_en']; ?></h3>
                                            <h3><?php echo $packages['description_ar']; ?></h3>


                                            <br><br>

                                            <h2>السعر</h2>

                                            <h3><?php echo $packages["price"] ?></h3>
                                            <br><br>


                                            <h3><?php echo $packages["sale"] == 0 ? 'not on sale' : 'on sale' ?></h3>

                                            <br><br>

                                            <h2>الصوره</h2>

                                            <img src="../../uploads/packages/<?php echo $packages["img"];  ?>" alt="" width="200px">
                                            <br><br>

                                            <h2>متضمنات</h2>


                                            <h3><?php echo $packages["included_en"] ?></h3>
                                            <h3><?php echo $packages["included_ar"] ?></h3>
                                            <br><br>
                                            <br><br>

                                            <h2>الخيارات</h2>

                                            <?php
                                            foreach ($PackageIncluded->getData() as $packagesdesc) :
                                                if ($packagesdesc['package_id'] == $item_id) :

                                            ?>
                                                    <div class="">
                                                        <h2>العنوان</h2>
                                                        <h5><?php echo $packagesdesc['title_en']; ?></h5>
                                                        <h5><?php echo $packagesdesc['title_ar']; ?></h5>
                                                        <br><br>
                                                        <h2>السعر</h2>

                                                        <p><?php echo $packagesdesc['price']; ?></p>
                                                        <br><br>

                                                        <div>
                                                            <form method="post">

                                                                <input type="hidden" value="<?php echo $packagesdesc["id"] ?>" name="item_id">
                                                                <button name="deleteItem_PackageIncluded" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                            </form>
                                                            <a href="<?php printf('%s?id=%s', '../package_included/updatePackageIncluded.php',  $packagesdesc['id']); ?>">
                                                                <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                            <a href="<?php printf('%s?package_id=%s', '../package_included/addPackageIncluded2.php',  $packages['id']); ?>">
                                                <button class="btn btn-outline-success">اضف خيارات</button>
                                            </a>
                                            <br>
                                            <br>

                                            <h2>مستبعدات</h2>

                                            <h3><?php echo $packages["excluded_en"] ?></h3>
                                            <h3><?php echo $packages["excluded_ar"] ?></h3>

                                            <h2>الوجهه</h2>

                                            <h3> <?php
                                                    foreach ($Destination->getData() as $destenation) :

                                                    ?>
                                                    <?php echo $packages['destination_id'] == $destenation['id'] ? $destenation['title_en'] : ''; ?>
                                                <?php
                                                    endforeach;

                                                ?></h3>

                                            <br><br>
                                            <br><br>
                                            <br><br>
                                            <h2>التفاصيل</h2>
                                            <?php
                                            foreach ($PackageDesc->getData() as $packagesdesc) :
                                                if ($packagesdesc['package_id'] == $item_id) :

                                            ?>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h2>العنوان</h2>
                                                            <h5><?php echo $packagesdesc['title_en']; ?></h5>
                                                            <h5><?php echo $packagesdesc['title_ar']; ?></h5>
                                                            <br><br>
                                                            <h2>الوصف</h2>

                                                            <p><?php echo $packagesdesc['description_en']; ?></p>
                                                            <p><?php echo $packagesdesc['description_ar']; ?></p>
                                                            <br><br>
                                                            <h2>الوجبات</h2>

                                                            <p><?php echo $packagesdesc['meals_en']; ?></p>
                                                            <p><?php echo $packagesdesc['meals_ar']; ?></p>

                                                            <br><br>
                                                            <h2>الزيارات</h2>

                                                            <p><?php echo $packagesdesc['visits_en']; ?></p>
                                                            <p><?php echo $packagesdesc['visits_ar']; ?></p>

                                                        </div>

                                                        <div>
                                                            <form method="post">

                                                                <input type="hidden" value="<?php echo $packagesdesc["id"] ?>" name="item_id">
                                                                <button name="deleteItem_packagesDesc" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                            </form>
                                                            <a href="<?php printf('%s?id=%s', '../package_desc/updatePackageDesc.php',  $packagesdesc['id']); ?>">
                                                                <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <hr>
                                                    <br><br><br>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                            <br><br>
                                            <br><br>
                                            <br><br>
                                            <?php
                                            foreach ($PackageImage->getData() as $packagesdesc) :
                                                if ($packagesdesc['package_id'] == $item_id) :

                                            ?>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <img src="../../uploads/packageImages/<?php echo $packagesdesc["img"] ?>" alt="" width="300px">

                                                        </div>

                                                        <div>
                                                            <form method="post">

                                                                <input type="hidden" value="<?php echo $packagesdesc["id"] ?>" name="item_id">
                                                                <button name="deleteItem_PackageImage" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                            </form>
                                                            <a href="<?php printf('%s?id=%s', '../packages_images/updatePackageImage.php',  $packagesdesc['id']); ?>">
                                                                <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                            <br>


                                            <a href="<?php printf('%s?package_id=%s', '../package_desc/addPackageDesc2.php',  $packages['id']); ?>">
                                                <button class="btn btn-outline-success">اضف تفاصيل</button>
                                            </a>
                                            <br>
                                            <br>

                                            <a class="btn btn-outline-info" href="<?php printf('%s?package_id=%s', '../packages_images/addPackagesImages2.php',  $packages['id']); ?>">
                                                اضف صوره
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