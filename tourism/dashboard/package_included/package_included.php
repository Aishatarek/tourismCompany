<?php

class PackageIncluded
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM package_included");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }


    public function getPackageIncluded($item_id = null)
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM package_included WHERE id={$item_id}  ");

            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function addPackageIncluded($title_en, $title_ar, $price, $package_id)
    {

        if (isset($title_en) && isset($title_ar) && isset($price) && isset($package_id)) {

            $params = array(
                "title_en" => $title_en,
                "title_ar" => $title_ar,
                "price" => $price,
                "package_id" => $package_id,
            );
            $this->insertIntoPackageIncluded($params);
        }
    }
    public function insertIntoPackageIncluded($params = null, $table = "package_included")
    {
        if ($this->db->con != null) {
            if ($params != null) {
                $columns = implode(',', array_keys($params));
                $values = implode(',', array_values($params));
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);
                // echo  $query_string;
                $result = $this->db->con->query($query_string);

                return $result;
            }
        }
    }
    public function deletePackageIncluded($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM package_included WHERE id={$item_id}");
            return $result;
        }
    }
    public function updatePackageIncluded($item_id = null, $title_en, $title_ar, $price)
    {
        if ($item_id != null) {

            $this->db->con->query("UPDATE package_included SET title_en={$title_en},price={$price},title_ar={$title_ar} WHERE id={$item_id}");
        }
    }
}
