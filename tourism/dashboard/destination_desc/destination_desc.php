<?php

class DestinationDesc
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM destination_desc");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }


    public function getDestinationDesc($item_id = null)
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM destination_desc WHERE id={$item_id}  ");

            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function addDestinationDesc($title_en, $description_en, $title_ar, $description_ar, $destination_id)
    {

        if (isset($title_en) && isset($description_en) && isset($title_ar) && isset($description_ar) && isset($destination_id)) {

            $params = array(
                "title_en" => $title_en,
                "description_en" => $description_en,
                "title_ar" => $title_ar,
                "description_ar" => $description_ar,
                "destination_id" => $destination_id,

            );
            $this->insertIntoDestinationDesc($params);
        }
    }
    public function insertIntoDestinationDesc($params = null, $table = "destination_desc")
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
    public function deleteDestinationDesc($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM destination_desc WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateDestinationDesc($item_id = null, $title_en, $description_en, $title_ar, $description_ar)
    {
        if ($item_id != null) {

            $this->db->con->query("UPDATE destination_desc SET title_en={$title_en},description_en={$description_en},title_ar={$title_ar},description_ar={$description_ar} WHERE id={$item_id}");
            if (isset($image) && isset($image['name'])) {
                $image = img($image);
                $this->db->con->query("UPDATE destination_desc SET image={$image} WHERE id={$item_id}");
            }
        }
    }
}
