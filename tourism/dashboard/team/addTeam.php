<?php
include('../functions.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $name = "'" . $_POST['name'] . "'";
        $description = "'" . $_POST['description'] . "'";
        $img =  $_FILES['img'];
        $video =  $_FILES['video'];
        $name_ar = "'" . $_POST['name_ar'] . "'";
        $description_ar = "'" . $_POST['description_ar'] . "'";
        $Team->addTeam($name, $img, $description, $video, $name_ar, $description_ar);
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
                                    <p style="font-size: 2rem; font-weight: 800;">اضف فرد</p>
                                    <div class="input-group">
                                        <input type="text" placeholder="الاسم بالانجليزيه" name="name" required class="form-control">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <input type="text" placeholder="الاسم بالعربيه" name="name_ar" required class="form-control">
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea cols="30" rows="10" placeholder="الوصف بالانجليزيه" name="description" required class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <textarea cols="30" rows="10" placeholder="الوصف بالعربيه" name="description_ar" required class="form-control"></textarea>
                                    </div>
                                    <br>
                                    <div>
                                        <p>الصوره</p>
                                        <br>
                                        <input type="file" name="img" required class="form-control">
                                    </div>
                                    <br>

                                    <div>
                                        <p>الفيديو</p>
                                        <br>
                                        <input type="file" name="video" required class="form-control">
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