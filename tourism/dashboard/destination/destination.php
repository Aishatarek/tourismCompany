<?php

class Destination
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM destination ORDER BY id DESC");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getDataa2($id)
    {
        $result = $this->db->con->query("SELECT * FROM destination WHERE id=$id");

        return $result;
    }
    public function getLastData()
    {
        $result = $this->db->con->query("SELECT * FROM destination ORDER BY ID DESC LIMIT 1");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function search($word)
    {
        $result = $this->db->con->query("SELECT * FROM destination WHERE title LIKE '%$word%'");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getDestination($item_id = null)
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM destination WHERE id={$item_id}  ");

            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function addDestination($title_en, $title_ar,    $img)
    {

        function img($img)
        {
            if (isset($img) && $img["error"] == 0) {
                $allowed = array("webp" => "image/webp", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
                $filename = rand(0, 1000) . $img["name"];
                $filetype = $img["type"];
                $filesize = $img["size"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                $maxsize = 5 * 1024 * 1024;
                if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                if (in_array($filetype, $allowed)) {
                    if (file_exists("../../uploads/destinations/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($img["tmp_name"], "../../uploads/destinations/" . $filename);
                    }
                } else {
                    echo "Error: There was a problem uploading your file. Please try again.";
                }
                if ($result) {
                    return "'" . $filename . "'";
                } else {
                    echo "Error: " . $img["error"];
                }
            }
        }
        $img = img($img);
        $params = array(
            "title_en" => $title_en,
            "title_ar" => $title_ar,
            "img" => $img,
        );
        $this->insertIntoDestination($params);
        header("location:../destination_desc/addDestinationDesc.php");
    }

    public function insertIntoDestination($params = null, $table = "destination")
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
    public function deleteDestination($item_id = null)
    {
        if ($item_id != null) {
            // $this->db->con->query("DELETE FROM Destination WHERE Destination_id={$item_id}");

            $this->db->con->query("DELETE FROM destination WHERE id={$item_id}");
        }
    }
    public function updateDestination($item_id = null, $title_en, $title_ar,  $img)
    {
        if ($item_id != null) {
            function img($img)
            {
                if (isset($img) && $img["error"] == 0) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf");
                    $filename = rand(0, 1000) . $img["name"];
                    $filetype = $img["type"];
                    $filesize = $img["size"];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) {
                        die("Error: Please select a valid file format.");
                    } else {
                        $filename = rand(0, 100000) . "instagramImage." . $ext;
                    }
                    $maxsize = 5 * 1024 * 1024;
                    if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                    if (in_array($filetype, $allowed)) {
                        if (file_exists("../../uploads/destinations/" . $filename)) {
                            echo $filename . " is already exists.";
                        } else {

                            $result = move_uploaded_file($img["tmp_name"], "../../uploads/destinations/" . $filename);
                        }
                    } else {
                        echo "Error: There was a problem uploading your file. Please try again.";
                    }
                    if ($result) {
                        return "'" . $filename . "'";
                    } else {
                        echo "Error: " . $img["error"];
                    }
                }
            }
            $this->db->con->query("UPDATE destination SET title_en={$title_en},title_ar={$title_ar} WHERE id={$item_id}");

            if (isset($img) && isset($img['name'])) {
                $img = img($img);
                $this->db->con->query("UPDATE destination SET img={$img} WHERE id={$item_id}");
            }
        }
    }
}
