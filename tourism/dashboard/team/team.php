<?php

class Team
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM team");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    public function search($word)
    {
        $result = $this->db->con->query("SELECT * FROM team WHERE title LIKE '%$word%'");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }


    public function addTeam($name, $img, $description, $video,$name_ar,$description_ar)
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
                    if (file_exists("../../uploads/teams/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {
                        $result = move_uploaded_file($img["tmp_name"], "../../uploads/teams/" . $filename);
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
        $video = img($video);

        $params = array(
            "name" => $name,
            "img" => $img,
            "description" => $description,
            "video" => $video,
            "name_ar" => $name_ar,
            "description_ar" => $description_ar,

        );
        $this->insertIntoteam($params);
    }

    public function insertIntoteam($params = null, $table = "team")
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
    public function deleteteam($item_id = null)
    {
        if ($item_id != null) {
            $this->db->con->query("DELETE FROM team WHERE id={$item_id}");
        }
    }
    public function updateTeam($item_id = null, $name, $img, $description, $video,$name_ar, $description_ar)

    {
        if ($item_id != null) {
            function img($img)
            {
                if (isset($img) && $img["error"] == 0) {
                    $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png", "rar" => "application/rar", "pdf" => "application/pdf", "mp4" => "video/mp4");
                    $filename = rand(0, 1000) . $img["name"];
                    $filetype = $img["type"];
                    $filesize = $img["size"];
                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    if (!array_key_exists($ext, $allowed)) {
                        die("Error: Please select a valid file format.");
                    } else {
                        $filename = rand(0, 100000) . "instagramImage." . $ext;
                    }
                    $maxsize = 5 * 1024 * 1024 * 1024;
                    if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
                    if (in_array($filetype, $allowed)) {
                        if (file_exists("../../uploads/teams/" . $filename)) {
                            echo $filename . " is already exists.";
                        } else {

                            $result = move_uploaded_file($img["tmp_name"], "../../uploads/teams/" . $filename);
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

            $this->db->con->query("UPDATE team SET name={$name} ,description={$description}, name_ar={$name_ar} ,description_ar={$description_ar} WHERE id={$item_id}");

            if (isset($img) && isset($img['name'])) {
                $img = img($img);
                $this->db->con->query("UPDATE team SET img={$img} WHERE id={$item_id}");
            }
            if (isset($video) && isset($video['name'])) {
                $video = img($video);
                $this->db->con->query("UPDATE team SET video={$video} WHERE id={$item_id}");
            }
        }
    }
}
