<?php
include('../functions.php');
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
        $img =  $_FILES['img'];
        $Packages->addPackages($title_en, $description_en, $title_ar, $description_ar,$destination_id, $price, $old_price, $sale, $img, $included_en, $excluded_en, $included_ar, $excluded_ar);
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
                                <form action="" method="POST" class="login-email" enctype="multipart/form-data">
                                    <h2 style="font-size: 2rem; font-weight: 800;">اضافه باكدج</h2>
                                    <div class="input-group">
                                        <input type="text" placeholder="العنوان بالانجليزيه" name="title_en" required class="form-control">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <input type="text" placeholder="العنوان بالعربيه" name="title_ar" required class="form-control">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="description_en" placeholder="الوصف بالانجليزيه" cols="30" rows="10" required class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="description_ar" placeholder="الوصف بالعربيه" cols="30" rows="10" required class="form-control"></textarea>
                                    </div>
                                    <div class="input-group">
                                        <select name="destenation_id" class="form-control" required>
                                            <option value="0" readonly>الوجهه</option>

                                            <?php
                                            foreach ($Destination->getData() as $destenation) :

                                            ?>
                                                <option value="<?php echo $destenation['id'] ?>"><?php echo $destenation['title_en'] ?></option>
                                            <?php
                                            endforeach;

                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <input type="number" placeholder="السعر" name="price" required class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <input type="number" placeholder="السعر القديم" name="old_price" required class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <select name="sale" class="form-control" required>
                                            <option value="0">not on sale</option>
                                            <option value="1">on sale</option>

                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <textarea name="included_en" placeholder="المتضمنات بالانجليزيه" cols="30" rows="10" required class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="included_ar" placeholder="المتضمنات بالعربيه" cols="30" rows="10" required class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea name="excluded_en" placeholder="المستبعدات بالانجليزيه" cols="30" rows="10" required class="form-control"></textarea>
                                    </div>
                                   <br>
                                    <div class="input-group">
                                        <textarea name="excluded_ar" placeholder="المستبعدات بالعربيه" cols="30" rows="10" required class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <p>صوره</p>
                                    <div class="input-group">
                                        <input type="file" name="img" required class="form-control">
                                    </div>
                                    <div class="input-group">
                                        <button name="submit" class="btn addtotable">اضف</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                include('../footer.php');
                ?>