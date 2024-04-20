<?php

class Orders
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM orders ORDER BY id DESC");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getDataPackage()
    {
        $result = $this->db->con->query("SELECT * FROM packages ORDER BY id DESC");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getDataTours()
    {
        $result = $this->db->con->query("SELECT * FROM tours ORDER BY id DESC");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function addOrder($tour_or_package_id, $tour_or_package, $name, $email, $phone, $date, $number_adults, $promo_code, $special_inquiry)
    {


        $this->db->con->query("INSERT INTO orders(tour_or_package_id, tour_or_package, name, email, phone, date, number_adults, promo_code, special_inquiry) VALUES('$tour_or_package_id', '$tour_or_package', '$name', '$email', '$phone', '$date', '$number_adults', '$promo_code', '$special_inquiry')");

    }



    public function deleteorders($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM orders WHERE id={$item_id}");
            return $result;
        }
    }
}
