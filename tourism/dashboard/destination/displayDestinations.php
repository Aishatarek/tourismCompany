<?php
include('../functions.php');
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['deleteItem_Destination'])) {
        $Destination->deleteDestination($_POST['item_id']);
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
                                    <a href="addDestination.php" class="addtotable">اضافه وجهه</a>
                                </div>
                                <table class=" table ">
                                    <tr>
                                        <th>العنوان بالانجليزيه</th>
                                        <th>العنوان بالعربيه</th>

                                        <th>الصوره</th>
                                        <th>-</th>
                                    </tr>
                                    <?php
                                    foreach ($Destination->getData() as $Destinationt) :
                                    ?>
                                        <tr>

                                            <td>
                                                <p><?php echo $Destinationt["title_en"] ?></p>
                                            </td>
                                            <td>
                                                <p><?php echo $Destinationt["title_ar"] ?></p>
                                            </td>   
                                            <td>
                                                <img src="../../uploads/destinations/<?php echo $Destinationt["img"];  ?>" alt="" >
                                            </td>
                                      
                                
                                           
                                            <td>
                                                <form method="post">

                                                    <input type="hidden" value="<?php echo $Destinationt["id"] ?>" name="item_id">
                                                    <button name="deleteItem_Destination" class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i></button>

                                                </form>
                                                <a href="<?php printf('%s?id=%s', 'DestinationDetail.php',  $Destinationt['id']); ?>">
                                                    <button class="btn btn-outline-success"><i class="fas fa-eye"></i></button>
                                                </a>
                                                <a href="<?php printf('%s?id=%s', 'updateDestination.php',  $Destinationt['id']); ?>">
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