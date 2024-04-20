<?php
include('../functions.php');

header("Access-Control-Allow-Origin: *"); //add this CORS header to enable any domain to send HTTP requests to these endpoints:
$host = "localhost";
$user = "root";
$password = "";
$dbname = "el_agamy";
$id = '';

$con = mysqli_connect($host, $user, $password, $dbname);

$method = $_SERVER['REQUEST_METHOD'];


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

switch ($method) {
    case 'GET':
        if (isset($_GET["id"])) {
            $id = $_GET['id'];
        }
        $sql = "select * from orders" . ($id ? " where id=$id" : '');
        break;
    case 'POST':
        $tour_or_package_id = $_POST["tour_or_package_id"];

        $tour_or_package = $_POST["tour_or_package"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $date = $_POST["date"];
        $number_adults = $_POST["number_adults"];
        $promo_code = $_POST["promo_code"];
        $address = $_POST["address"];
        $special_inquiry = $_POST["special_inquiry"];
        $options = $_POST["options"];

        $sql = "insert into orders(tour_or_package_id, tour_or_package, name, email, phone, date, number_adults, promo_code, address, special_inquiry,options) VALUES('$tour_or_package_id', '$tour_or_package', '$name', '$email', '$phone', '$date', '$number_adults', '$promo_code','$address' ,'$special_inquiry','$options')";
        if ($tour_or_package == 1) {
            foreach ($Packages->getData() as $Package) {
                if ($tour_or_package == $Package['id']) {
                    $title = $Package['title'];
                    $description =   $Package['description'];
                    $price = $Package['price'];
                    $totalprice = ($Package["price"] * $number_adults);
                }
            }
        } else if ($tour_or_package == 0) {
            foreach ($Tours->getData() as $tour) {
                if ($tour_or_package == $tour['id']) {
                    $title = $tour['title'];
                    $description =   $tour['description'];
                    $price = $tour['price'];
                    $totalprice = ($tour["price"] * $number_adults);
                }
            }
        }

        $tour_or_package = $tour_or_package == 0 ? 'Tour' : 'Package';
        echo "
        <script type='text/javascript' src='https://unpkg.com/@emailjs/browser@3.11.0/dist/email.min.js'>
        </script>
        <script type='text/javascript'>
            (function () {
                emailjs.init('6VEs_wJJ1GfhmXXZx');
                
            })();
        emailjs.send('service_tfpjcb4', 'template_9nb8w8m', {
            name: '$name',
            email: '$email',
            phone: '$phone',
            title : '$title',
            description : '$description',
            package_or_Tour : '$tour_or_package',
            number_of_persons: '$number_adults',
            price_per_one: '$price',
            total_one : '$totalprice',
            promo_code: '$promo_code',
            address: '$address',
            special_inquiry: '$special_inquiry',
            options: '$options'
           
        })

        </script>";


        break;
}

// run SQL statement
$result = mysqli_query($con, $sql);

// die if SQL statement failed
if (!$result) {
    http_response_code(404);
    die(mysqli_error($con));
}

if ($method == 'GET') {
    if (!$id) {
        $employeeArr = array();
        while ($row = $result->fetch_assoc()) {
            array_push($employeeArr, $row);
        }
        echo json_encode($employeeArr);
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $output = $row;
        }
        echo json_encode($output);
    }
} elseif ($method == 'POST') {
    echo json_encode($result);
} else {

    echo mysqli_affected_rows($con);
}

$con->close();
