<?php
include('../functions.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_PackageDesc'])) {
        $PackageDesc->deletePackageDesc($_POST['item_id']);
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
                           
                                <form action="search.php" method="get" class="d-flex">
                                    <input type="text" name="search" placeholder="Search" class="form-control">

                                    <button class="search-bar__submit search-form__submit addtotable" type="submit">
                                        <span class="icon__fallback-text">Submit</span>
                                    </button>
                                </form>
                                <br>
                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                    <a href="addPackageDesc2.php" class="addtotable">اضافه منتج</a>
                                </div>

                                <table class=" table ">
                                    <tr>

                                        <th>العنوان</th>
 
                                        <th>الوصف</th>

                                        <th>-</th>
                                    </tr>
                                    <?php
                                    foreach ($PackageDesc->getData() as $PackageDesct) :
                                    ?>
                                        <tr class="thing">
                             
                                            <td>
                                                <p><?php echo $PackageDesct["title"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $PackageDesct["describtion"] ?> </p>
                                            </td>

                            
                                            <td>
                                                <form method="post">

                                                    <input type="hidden" value="<?php echo $PackageDesct["id"] ?>" name="item_id">
                                                    <button name="deleteItem_PackageDesc" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                </form>
                                                <a href="<?php printf('%s?id=%s', 'updatePackageDesc.php',  $PackageDesct['id']); ?>">
                                                    <button class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php
                                    endforeach;
                                    ?>
                                </table>
                                <div class="controlbtns d-flex justify-content-between">
                                <button class="control back btn"><i class="fa-solid fa-backward"></i></button>

                                    <button class="control forward btn"><i class="fa-solid fa-forward"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- main-panel ends -->
</div>
<script>
    $(document).ready(function() {

        var items_per_page = 15;
        var current_page = 1;
        var total_items = $('.thing').length;
        var total_pages = Math.ceil(total_items / items_per_page);

        function page(current_page, items_per_page) {
            $('.thing').hide();
            var last_item = current_page * items_per_page;
            var first_item = last_item - items_per_page + 1;
            for (i = first_item; i <= last_item; i++) {
                $('.thing').eq(i - 1).show();
            }
        }

        // display 1st page
        page(current_page, items_per_page);

        // display next page
        $('.forward').click(function() {
            if (current_page != total_pages) current_page++;
            page(current_page, items_per_page);
        });

        // display previous page
        $('.back').click(function() {
            if (current_page != 1) current_page -= 1;
            page(current_page, items_per_page);
        });

    });
</script>

<?php
include("../footer.php");
?>