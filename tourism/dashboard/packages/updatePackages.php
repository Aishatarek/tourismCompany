<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $title_en = "'" . $_POST['title_en'] . "'";
        $description_en = "'" . $_POST['description_en'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";
        $destination_id = "'" . $_POST['destenation_id'] . "'";
        $price = "'" . $_POST['price'] . "'";
        $old_price = "'" . $_POST['old_price'] . "'";
        $sale = "'" . $_POST['sale'] . "'";
        $included_en = "'" . $_POST['included_en'] . "'";
        $excluded_en = "'" . $_POST['excluded_en'] . "'";
        $included_ar = "'" . $_POST['included_ar'] . "'";
        $excluded_ar = "'" . $_POST['excluded_ar'] . "'";
        $img = $_FILES['img'];
        $Packages->updatePackages($item_id, $title_en, $description_en, $title_ar, $description_ar, $destination_id, $price, $old_price, $sale, $img, $included_en, $excluded_en, $included_ar, $excluded_ar);
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
                                foreach ($Packages->getData() as $Packagest) :
                                    if ($Packagest['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <form method="post" enctype="multipart/form-data">
                                                <p>العنوان</p>
                                                <input class="form-control" type="text" name="title_en" value="<?php echo $Packagest['title_en']; ?>">

                                                <p>الوصف</p>
                                                <textarea name="description_en" class="form-control" id="" cols="30" rows="10"><?php echo $Packagest['description_en']; ?></textarea>
                                                <p>العنوان</p>
                                                <input class="form-control" type="text" name="title_ar" value="<?php echo $Packagest['title_ar']; ?>">

                                                <p>الوصف</p>
                                                <textarea name="description_ar" class="form-control" id="" cols="30" rows="10"><?php echo $Packagest['description_ar']; ?></textarea>
                                                <br>

                                                <select name="destenation_id" class="form-control" required>
                                                    <option value="0" readonly>الوجهه</option>

                                                    <?php
                                                    foreach ($Destination->getData() as $destenation) :

                                                    ?>
                                                        <option value="<?php echo $destenation['id'] ?>" <?php echo $Packagest['destenation_id'] == $destenation['id'] ? 'selected' : ''; ?>><?php echo $destenation['title_en'] ?></option>
                                                    <?php
                                                    endforeach;

                                                    ?>
                                                </select>
                                                <br>
                                                <p>السعر</p>
                                                <input class="form-control" type="text" name="price" value="<?php echo $Packagest['price']; ?>">

                                                <p>السعر القديم</p>
                                                <input class="form-control" type="text" name="old_price" value="<?php echo $Packagest['old_price']; ?>">
                                                <select name="sale" class="form-control">
                                                    <option value="0" <?php $Packagest['sale'] == 0 ? 'selected' : '' ?>>not on sale</option>
                                                    <option value="1" <?php $Packagest['sale'] == 1 ? 'selected' : '' ?>> on sale</option>

                                                </select>
                                                <p>المتضمنات بالانجليزيه</p>
                                                <textarea name="included_en" class="form-control" id="" cols="30" rows="10"><?php echo $Packagest['included_en']; ?></textarea>
                                                <p>المستبعدات بالانجليزيه</p>
                                                <textarea name="excluded_en" class="form-control" id="" cols="30" rows="10"><?php echo $Packagest['excluded_en']; ?></textarea>
                                                <p>المتضمنات بالعربيه</p>
                                                <textarea name="included_ar" class="form-control" id="" cols="30" rows="10"><?php echo $Packagest['included_ar']; ?></textarea>
                                                <p>المستبعدات العربيه</p>
                                                <textarea name="excluded_ar" class="form-control" id="" cols="30" rows="10"><?php echo $Packagest['excluded_ar']; ?></textarea>


                                                <p>الصوره</p>
                                                <img src="../../uploads/packages/<?php echo $Packagest['img']; ?>" alt="" width="100px">
                                                <br>
                                                <input type="file" name="img">
                                                <br><br>
                                                <button type="submit" name="submit" class="addtotable">تعديل</button>
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