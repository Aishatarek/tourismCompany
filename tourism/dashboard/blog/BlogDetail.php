<?php
include('../functions.php');
$item_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_BlogDesc'])) {
        $BlogDesc->deleteBlogDesc($_POST['item_id']);
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
                                foreach ($Blog->getData() as $Blogg) :
                                    if ($Blogg['id'] == $item_id) :

                                ?>
                                        <div class="theform2">

                                            <h2>العنوان</h2>
                                            <h3><?php echo $Blogg['title_en']; ?></h3>
                                            <h3><?php echo $Blogg['title_ar']; ?></h3>
<br><br>
                                            <h2>الوصف</h2>
                                            
                                            <h3><?php echo $Blogg['description_en']; ?></h3>
                                            <h3><?php echo $Blogg['description_ar']; ?></h3>
                                            <br><br>

                                            <h2>الصوره</h2>
                                            <img src="../../uploads/Blogs/<?php echo $Blogg['img']; ?>" width="300px" alt="">
<br><br>
                                          
                                            <h2>التفاصيل</h2>
                                            <?php
                                            foreach ($BlogDesc->getData() as $Blogdescc) :
                                                if ($Blogdescc['blog_id'] == $item_id) :

                                            ?>
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <h5><?php echo $Blogdescc['title_en']; ?></h5>
                                                            <p><?php echo $Blogdescc['description_en']; ?></p>
                                                            <h5><?php echo $Blogdescc['title_ar']; ?></h5>
                                                            <p><?php echo $Blogdescc['description_ar']; ?></p>
                                                        </div>

                                                        <div>
                                                            <form method="post">

                                                                <input type="hidden" value="<?php echo $Blogdescc["id"] ?>" name="item_id">
                                                                <button name="deleteItem_BlogDesc" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                            </form>
                                                            <a href="<?php printf('%s?id=%s', '../blog_desc/updateBlogDesc.php',  $Blogdescc['id']); ?>">
                                                                <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <br><br><br>
                                            <?php
                                                endif;
                                            endforeach;
                                            ?>
                                            <a href="<?php printf('%s?Blog_id=%s', '../blog_desc/addBlogDesc2.php',  $Blogg['id']); ?>">
                                                <button class="btn btn-outline-success">اضافه تفاصيل</button>
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