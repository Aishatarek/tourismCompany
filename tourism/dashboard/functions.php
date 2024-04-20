<?php
require('connection.php');
require('admins/admins.php');
require('destination_desc/destination_desc.php');
require('destination/destination.php');
require('orders/orders.php');
require('packages/packages.php');
require('package_desc/package_desc.php');
require('packages_images/packages_images.php');
require('team/team.php');
require('transportation/transportation.php');
require('tours/tours.php');
require('tour_images/tour_images.php');
require('blog/blog.php');
require('blog_desc/blog_desc.php');
require('reviews/reviews.php');
require('package_included/package_included.php');













if (isset($_COOKIE['admin_id']) ) {
    $_SESSION['admin_id'] = $_COOKIE['admin_id'];
}


$db=new DBController();
$Admins=new Admins($db);
$DestinationDesc=new DestinationDesc($db);
$Orders=new Orders($db);
$Destination=new Destination($db);
$Packages=new Packages($db);
$PackageDesc=new PackageDesc($db);
$PackageImage=new PackageImage($db);
$Team=new Team($db);
$Transportation=new Transportation($db);
$Tours=new Tours($db);
$TourImage=new TourImages($db);
$Blog=new Blog($db);
$BlogDesc=new BlogDesc($db);
$Reviews=new Reviews($db);

$PackageIncluded=new PackageIncluded($db);









// $Students=new Students($db);

