<?php

class PackageImage
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM packages_images ORDER BY id DESC");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }


    public function getPackageImage($item_id = null)
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM packages_images WHERE id={$item_id}  ");

            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function addPackageImage($img, $package_id)
    {
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
                    if (file_exists("../../uploads/packageImages/" . $filename)) {
                        echo $filename . " is already exists.";
                    } else {

                        $result = move_uploaded_file($img["tmp_name"], "../../uploads/packageImages/" . $filename);
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
        if (isset($img)  && isset($package_id)) {

            $params = array(
                "img" => $img,
                "package_id" => $package_id,
            );
            $this->insertIntoPackageImage($params);
        }
    }
    public function insertIntoPackageImage($params = null, $table = "packages_images")
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
    public function deletePackageImage($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM packages_images WHERE id={$item_id}");
            return $result;
        }
    }
    public function updatePackageImage($item_id = null, $img)
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
                        if (file_exists("../../uploads/packageImages/" . $filename)) {
                            echo $filename . " is already exists.";
                        } else {

                            $result = move_uploaded_file($img["tmp_name"], "../../uploads/packageImages/" . $filename);
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

            if (isset($img) && isset($img['name'])) {
                $img = img($img);
                $this->db->con->query("UPDATE packages_images SET img={$img} WHERE id={$item_id}");
            }
        }
    }
}
