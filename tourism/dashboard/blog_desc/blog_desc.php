<?php

class BlogDesc
{
    public $db = null;
    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }
    public function getData()
    {
        $result = $this->db->con->query("SELECT * FROM blog_desc ");
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }
        return $resultArray;
    }


    public function getBlogDesc($item_id = null)
    {
        if (isset($item_id)) {
            $result = $this->db->con->query("SELECT * FROM blog_desc WHERE id={$item_id}  ");

            $resultArray = array();
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultArray[] = $item;
            }
            return $resultArray;
        }
    }

    public function addBlogDesc($title_en, $description_en, $title_ar, $description_ar, $blog_id)
    {

        if (isset($title_en) && isset($description_en) && isset($title_ar) && isset($description_ar) && isset($blog_id) ) {

            $params = array(
                "title_en" => $title_en,
                "description_en" => $description_en,
                "title_ar" => $title_ar,
                "description_ar" => $description_ar,
                "blog_id" => $blog_id,
 
            );
            $this->insertIntoBlogDesc($params);
        }
    }
    public function insertIntoBlogDesc($params = null, $table = "blog_desc")
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
    public function deleteBlogDesc($item_id = null)
    {
        if ($item_id != null) {
            $result = $this->db->con->query("DELETE FROM blog_desc WHERE id={$item_id}");
            return $result;
        }
    }
    public function updateBlogDesc($item_id = null, $title_en, $description_en, $title_ar, $description_ar)
    {
        if ($item_id != null) {
    
            $this->db->con->query("UPDATE blog_desc SET title_en={$title_en},description_en={$description_en},title_ar={$title_ar},description_ar={$description_ar} WHERE id={$item_id}");
           
        }
    }

}
