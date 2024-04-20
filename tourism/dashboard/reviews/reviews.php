<?php

class Reviews
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM reviews ORDER BY id DESC");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function search($word)
    {
        $result = $this->db->con->query("SELECT * FROM reviews WHERE title LIKE '%$word%'");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }


    public function addReviews($name, $opinion, $country)
    {
        $params = array(
            "name" => $name,
            "opinion" => $opinion,
            "country" => $country,
        );
        $this->insertIntoreviews($params);
    }

    public function insertIntoreviews($params = null, $table = "reviews")
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
    public function deletereviews($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM reviews WHERE id={$item_id}");
        }
    }
    public function updatereviews($item_id = null, $name, $opinion, $country)

    {
        if ($item_id != null) {

            $this->db->con->query("UPDATE reviews SET name={$name} ,opinion={$opinion},country={$country} WHERE id={$item_id}");
        }
    }
}
