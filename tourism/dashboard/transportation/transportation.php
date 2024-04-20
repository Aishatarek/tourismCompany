<?php

class Transportation
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM transportation ORDER BY id DESC");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function search($word)
    {
        $result = $this->db->con->query("SELECT * FROM transportation WHERE title LIKE '%$word%'");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }


    public function addTransportation($title_en, $description_en, $title_ar, $description_ar, $price, $video, $photo)
    {

        function img($img)
        {
            if (isset($img) && $img["error"] == 0) {
                $allowed = array("webp" => "image/webp", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf", "mp4" => "video/mp4");
                $filename = rand(0, 1000) . $img["name"];
                $filetype = $img["type"];
                $filesize = $img["size"];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                $maxsize = 5 * 1024 * 1024 * 1024;
                if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                if (in_array($filetype, $allowed)) {
                    if (file_exists("../../uploads/transportation/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($img["tmp_name"], "../../uploads/transportation/" . $filename);
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
        $photo = img($photo);
        $video = img($video);

        $params = array(
            "title_en" => $title_en,
            "description_en" => $description_en,
            "title_ar" => $title_ar,
            "description_ar" => $description_ar,
            "price" => $price,
            "video" => $video,
            "photo" => $photo,
        );
        $this->insertIntoTransportation($params);
    }

    public function insertIntoTransportation($params = null, $table = "transportation")
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
    public function deleteTransportation($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM transportation WHERE id={$item_id}");
        }
    }
    public function updateTransportation($item_id = null, $title_en, $description_en, $title_ar, $description_ar, $price, $video, $photo)

    {
        if ($item_id != null) {
            function img($img)
            {
                if (isset($img) && $img["error"] == 0) {
                    $allowed = array("webp" => "image/webp", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf", "mp4" => "video/mp4");
                    $filename = rand(0, 1000) . $img["name"];
                    $filetype = $img["type"];
                    $filesize = $img["size"];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
                    $maxsize = 5 * 1024 * 1024 * 1024;
                    if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                    if (in_array($filetype, $allowed)) {
                        if (file_exists("../../uploads/transportation/" . $filename)) {
                            echo $filename . " is already exists.";
                        } else {
                            $result = move_uploaded_file($img["tmp_name"], "../../uploads/transportation/" . $filename);
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
            $this->db->con->query("UPDATE transportation SET title_en={$title_en} ,description_en={$description_en},title_ar={$title_ar} ,description_ar={$description_ar},price={$price} WHERE id={$item_id}");

            if (isset($photo) && isset($photo['name'])) {
                $photo = img($photo);
                $this->db->con->query("UPDATE transportation SET photo={$photo} WHERE id={$item_id}");
            }
            if (isset($video) && isset($video['name'])) {
                $video = img($video);
                $this->db->con->query("UPDATE transportation SET video={$video} WHERE id={$item_id}");
            }
        }
    }
}
