<?php
include('../functions.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_Packages'])) {
        $Packages->deletePackages($_POST['item_id']);
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
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="addPackages.php" class="addtotable">اضافه Package</a>
                                </div>
                                <table class=" table ">
                                    <tr>
                                        <th>العنوان بالانجلزيه</th>
                                        <th>الوصف بالانجليزيه</th>
                                        <th>العنوان بالعربيه</th>
                                        <th>الوصف بالعربيه</th>
                                        <th>الواجهه</th>

                                        <th>السعر</th>
                                        <th>السعر القديم</th>
                                        <th>sale</th>
                                        <th>الصوره</th>
                                        <th>المتضمنات بالانجليزيه</th>
                                        <th>لمستبعدات بالانجليزيه</th>
                                        <th>المتضمنات بالعربيه</th>
                                        <th>لمستبعدات بالعربيه</th>
                                        <th>-</th>
                                    </tr>
                                    <?php
                                    foreach ($Packages->getData() as $Packagest) :
                                    ?>
                                        <tr>

                                            <td>
                                                <p><?php echo $Packagest["title_en"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Packagest["description_en"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Packagest["title_ar"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Packagest["description_ar"] ?></p>
                                            </td>
                                            <td>
                                                <p> <?php
                                                    foreach ($Destination->getData() as $destenation) :

                                                    ?>
                                                    <?php echo $Packagest['destination_id'] == $destenation['id'] ? $destenation['title_en'] : ''; ?>
                                                <?php
                                                    endforeach;

                                                ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Packagest["price"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Packagest["sale"] == 0 ? 'not on sale' : 'on sale' ?></p>
                                            </td>

                                            <td>
                                                <img src="../../uploads/packages/<?php echo $Packagest["img"];  ?>" alt="">
                                            </td>
                                            <td>
                                                <p><?php echo $Packagest["included_en"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Packagest["excluded_en"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Packagest["included_ar"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Packagest["excluded_ar"] ?></p>
                                            </td>

                                            <td>
                                                <form method="post">

                                                    <input type="hidden" value="<?php echo $Packagest["id"] ?>" name="item_id">
                                                    <button name="deleteItem_Packages" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                </form>
                                                <a href="<?php printf('%s?id=%s', 'packagesDetail.php',  $Packagest['id']); ?>">
                                                    <button class="btn btn-outline-success"><i class="fas fa-eye"></i></button>
                                                </a>
                                                <a href="<?php printf('%s?id=%s', 'updatePackages.php',  $Packagest['id']); ?>">
                                                    <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
</div>
<?php
include("../footer.php");
?>