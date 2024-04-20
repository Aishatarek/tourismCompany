<?php
include('../functions.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_Tours'])) {
        $Tours->deleteTours($_POST['item_id']);
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
                                    <a href="addTours.php" class="addtotable">اضافه رحله</a>
                                </div>
                                <table class=" table ">
                                    <tr>
                                        <th>العنوان بالانجليزيه</th>
                                        <th>العنوان بالعربيه</th>

                                        <th>الوصف بالانجليزيه</th>
                                        <th>الوصف بالعربيه</th>

                                        <th>السعر</th>
                                        <th>الوجهه</th>
                                        <th>الصوره</th>
                                        <th>مسار الرحله بالانجليزيه</th>
                                        <th>مسار الرحله بالعربيه</th>



                                        <th>المتضمنات بالانجليزيه</th>
                                        <th>المتضمنات بالعربيه</th>

                                        <th>المستبعدات بالانجليزيه</th>
                                        <th>المستبعدات بالعربيه</th>

                                        <th>-</th>
                                    </tr>
                                    <?php
                                    foreach ($Tours->getData() as $Tourst) :
                                    ?>
                                        <tr>

                                            <td>
                                                <p><?php echo $Tourst["title"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["title_ar"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["description"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["description_ar"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["price"] ?></p>
                                            </td>
                                            <td>
                                                <p> <?php
                                                    foreach ($Destination->getData() as $destenation) :

                                                    ?>
                                                        <?php echo $Tourst['destenation_id'] == $destenation['id'] ? $destenation['title_en'] : ''; ?>
                                                    <?php
                                                    endforeach;

                                                    ?></p>
                                            </td>

                                            <td>
                                                <img src="../../uploads/Tours/<?php echo $Tourst["img"];  ?>" alt="">
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["Itinerary"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["Itinerary_ar"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["included"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["included_ar"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["excluded"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Tourst["excluded_ar"] ?></p>
                                            </td>

                                            <td>
                                                <form method="post">

                                                    <input type="hidden" value="<?php echo $Tourst["id"] ?>" name="item_id">
                                                    <button name="deleteItem_Tours" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                </form>
                                                <a href="<?php printf('%s?id=%s', 'ToursDetail.php',  $Tourst['id']); ?>">
                                                    <button class="btn btn-outline-success"><i class="fas fa-eye"></i></button>
                                                </a>
                                                <a href="<?php printf('%s?id=%s', 'updateTours.php',  $Tourst['id']); ?>">
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