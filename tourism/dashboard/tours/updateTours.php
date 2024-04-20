<?php
include('../functions.php');
$item_id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $title = "'" . $_POST['title'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $title_ar = "'" . $_POST['title_ar'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";
        $destenation_id = "'" . $_POST['destenation_id'] . "'";
        $price = "'" . $_POST['price'] . "'";
        $Itinerary = "'" . $_POST['Itinerary'] . "'";
        $included = "'" . $_POST['included'] . "'";
        $excluded = "'" . $_POST['excluded'] . "'";
        $Itinerary_ar = "'" . $_POST['Itinerary_ar'] . "'";
        $included_ar = "'" . $_POST['included_ar'] . "'";
        $excluded_ar = "'" . $_POST['excluded_ar'] . "'";
        $img =  $_FILES['img'];
        $Tours->updateTours($item_id, $title, $img, $destenation_id, $description, $price, $Itinerary, $included, $excluded, $title_ar, $description_ar, $Itinerary_ar, $included_ar, $excluded_ar);
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
                                foreach ($Tours->getData() as $Tourst) :
                                    if ($Tourst['id'] == $item_id) :

                                ?>
                                        <div class="theform2">
                                            <form method="post" enctype="multipart/form-data">
                                                <p>العنوان</p>
                                                <input class="form-control" type="text" name="title" value="<?php echo $Tourst['title']; ?>">
                                               <br>
                                                <p>العنوان بالعربيه</p>
                                                <input class="form-control" type="text" name="title_ar" value="<?php echo $Tourst['title_ar']; ?>">
                                                <br>

                                                <p>الوصف</p>
                                                <textarea name="description" class="form-control" id="" cols="30" rows="10"><?php echo $Tourst['description']; ?></textarea>
                                                <br>
                                               
                                                <p>الوصف بالعربيه</p>
                                                <textarea name="description_ar" class="form-control" id="" cols="30" rows="10"><?php echo $Tourst['description_ar']; ?></textarea>
                                                <br>

                                                <p>السعر</p>
                                                <input class="form-control" type="number" name="price" value="<?php echo $Tourst['price']; ?>">
                                              <br>
                                              
                                                <select name="destenation_id" class="form-control" required>
                                                    <option value="0" readonly>الوجهه</option>

                                                    <?php
                                                    foreach ($Destination->getData() as $destenation) :

                                                    ?>
                                                        <option value="<?php echo $destenation['id'] ?>" <?php echo $Tourst['destenation_id'] == $destenation['id'] ? 'selected' : ''; ?>><?php echo $destenation['title_en'] ?></option>
                                                    <?php
                                                    endforeach;

                                                    ?>
                                                </select>
                                               <br>

                                                <p>مسار الرحله بالانجليزيه</p>
                                                <textarea name="Itinerary" class="form-control" id="" cols="30" rows="10"><?php echo $Tourst['Itinerary']; ?></textarea>
                                                <br>
                                               
                                                <p>مسار الرحله بالعربيه</p>
                                                <textarea name="Itinerary_ar" class="form-control" id="" cols="30" rows="10"><?php echo $Tourst['Itinerary_ar']; ?></textarea>
                                                <br>

                                                <p>المتضمنات بالانجليزيه</p>
                                                <textarea name="included" class="form-control" id="" cols="30" rows="10"><?php echo $Tourst['included']; ?></textarea>
                                                <br>
                                              
                                                <p>المتضمنات بالعربيه</p>
                                                <textarea name="included_ar" class="form-control" id="" cols="30" rows="10"><?php echo $Tourst['included_ar']; ?></textarea>
                                                <br>

                                                <p>المستبعدات بالانجليزيه</p>
                                                <textarea name="excluded" class="form-control" id="" cols="30" rows="10"><?php echo $Tourst['excluded']; ?></textarea>
                                                <br>
                                               
                                                <p>المستبعدات بالعربيه</p>
                                                <textarea name="excluded_ar" class="form-control" id="" cols="30" rows="10"><?php echo $Tourst['excluded_ar']; ?></textarea>
                                                <br>


                                                <p>الصوره</p>
                                                <img src="../../uploads/Tours/<?php echo $Tourst['img']; ?>" alt="" width="100px">
                                                <br>
                                                <input type="file" name="img">
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