<?php
include('../functions.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_product'])) {
        $Orders->deleteOrders($_POST['item_id']);
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

                                <table class=" table ">
                                    <tr>
                                        <th>العنوان</th>
                                        <th>الوصف</th>
                                        <th>السعر للفرد الواحد</th>
                                        <th>اجمالى السعر</th>
                                        <th>-</th>
                                        <th>الأسم</th>
                                        <th>البريد الألكترونى</th>
                                        <th>الهاتف</th>
                                        <th>تاريخ الحجز</th>
                                        <th>عدد الكبار</th>
                                        <th>promo code</th>
                                        <th>العنوان</th>

                                        <th>special inquiry</th>
                                        <th>تاريخ الطلب</th>

                                        <th>-</th>
                                    </tr>
                                    <?php
                                    foreach ($Orders->getData() as $order) :
                                    ?>
                                        <tr>
                                            <?php
                                            if ($order["tour_or_package"] == 1) {
                                                foreach ($Packages->getData() as $Package) {
                                                    if ($order["tour_or_package_id"] == $Package['id']) {
                                            ?>
                                                        <td>
                                                            <?php echo $Package['title'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $Package['description'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $Package['price'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($Package["price"] * $order["number_adults"]) ?>
                                                        </td>
                                                    <?php
                                                    }
                                                }
                                            } else if ($order["tour_or_package"] == 0) {
                                                foreach ($Tours->getData() as $tour) {
                                                    if ($order["tour_or_package_id"] == $tour['id']) {
                                                    ?>
                                                        <td>
                                                            <?php echo $tour['title'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $tour['description'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $tour['price'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($tour["price"] * $order["number_adults"]) ?>
                                                        </td>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>


                                            <td><?php echo $order['tour_or_package'] == 0 ? 'Tour' : 'Package' ?></td>
                                            <td><?php echo $order['name'] ?></td>
                                            <td><?php echo $order['email'] ?></td>
                                            <td><?php echo $order['phone'] ?></td>
                                            <td><?php echo $order['date'] ?></td>
                                            <td><?php echo $order['number_adults'] ?></td>
                                            <td><?php echo $order['promo_code'] ?></td>
                                            <td>
                                                <?php echo $tour['address'] ?>
                                            </td>
                                            <td><?php echo $order['special_inquiry'] ?></td>
                                            <td><?php echo $order['order_date'] ?></td>
                                            <td>
                                                <form method="post">
                                                    <input type="hidden" value="<?php echo $order["id"] ?>" name="item_id">
                                                    <button name="deleteItem_product" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                </form>

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