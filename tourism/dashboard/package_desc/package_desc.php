<?php

class PackageDesc
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM package_desc");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }


    public function getPackageDesc($item_id = null)
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM package_desc WHERE id={$item_id}  ");

            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function addPackageDesc($title_en, $description_en,$title_ar, $description_ar, $package_id, $meals_en, $visits_en, $meals_ar, $visits_ar)
    {

        if (isset($title_en) && isset($description_en) && isset($package_id) && isset($meals_en) && isset($visits_en)&& isset($meals_ar) && isset($visits_ar)) {

            $params = array(
                "package_id" => $package_id,
                "title_en" => $title_en,
                "description_en" => $description_en,
                "title_ar" => $title_ar,
                "description_ar" => $description_ar,
                "meals_en" => $meals_en,
                "visits_en" => $visits_en,
                "meals_ar" => $meals_ar,
                "visits_ar" => $visits_ar,
            );
            $this->insertIntoPackageDesc($params);
        }
    }
    public function insertIntoPackageDesc($params = null, $table = "package_desc")
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
    public function deletePackageDesc($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM package_desc WHERE id={$item_id}");
            return $result;
        }
    }
    public function updatePackageDesc($item_id = null, $title_en, $description_en,$title_ar, $description_ar, $meals_en, $visits_en, $meals_ar, $visits_ar)
    {
        if ($item_id != null) {

            $this->db->con->query("UPDATE package_desc SET title_en={$title_en},description_en={$description_en},meals_en={$meals_en},visits_en={$visits_en},title_ar={$title_ar},description_ar={$description_ar},meals_ar={$meals_ar},visits_ar={$visits_ar} WHERE id={$item_id}");
         
        }
    }
}
