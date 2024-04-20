<?php

class Tours
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM tours ORDER BY id DESC");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getDataa2($id)
    {
        $result = $this->db->con->query("SELECT * FROM tours WHERE id=$id");

        return $result;
    }
    public function getLastData()
    {
        $result = $this->db->con->query("SELECT * FROM tours ORDER BY ID DESC LIMIT 1");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function search($word)
    {
        $result = $this->db->con->query("SELECT * FROM tours WHERE title LIKE '%$word%'");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }
    public function getTours($item_id = null)
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM tours WHERE id={$item_id}  ");
            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function addTours($title, $img, $destenation_id, $description, $price, $Itinerary, $included, $excluded, $title_ar, $description_ar, $Itinerary_ar, $included_ar, $excluded_ar)
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
                    if (file_exists("../../uploads/tours/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($img["tmp_name"], "../../uploads/tours/" . $filename);
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
            "title" => $title,
            "img" => $img,
            "destenation_id" => $destenation_id,
            "description" => $description,
            "price" => $price,
            "Itinerary" => $Itinerary,
            "included" => $included,
            "excluded" => $excluded,
            "title_ar" =>  $title_ar,
            "description_ar" => $description_ar,
            "Itinerary_ar" => $Itinerary_ar,
            "included_ar" => $included_ar,
            "excluded_ar" => $excluded_ar
        );
        $this->insertIntotours($params);
        header("location: ../tour_images/addTourImage.php");
    }

    public function insertIntotours($params = null, $table = "tours")
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
    public function deleteTours($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM tours WHERE id={$item_id}");
        }
    }
    public function updateTours($item_id = null, $title, $img, $destenation_id, $description, $price, $Itinerary, $included, $excluded, $title_ar, $description_ar, $Itinerary_ar, $included_ar, $excluded_ar)
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
                        if (file_exists("../../uploads/tours/" . $filename)) {
                            echo $filename . " is already exists.";
                        } else {

                            $result = move_uploaded_file($img["tmp_name"], "../../uploads/tours/" . $filename);
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
            $this->db->con->query("UPDATE tours SET destenation_id={$destenation_id} ,title={$title}, description={$description},price={$price},Itinerary={$Itinerary},  included={$included}, excluded={$excluded}, title_ar={$title_ar},description_ar={$description_ar},Itinerary_ar={$Itinerary_ar},  included_ar={$included_ar}, excluded_ar={$excluded_ar} WHERE id={$item_id}");

            if (isset($img) && isset($img['name'])) {
                $img = img($img);
                $this->db->con->query("UPDATE tours SET img={$img} WHERE id={$item_id}");
            }
        }
    }
}
