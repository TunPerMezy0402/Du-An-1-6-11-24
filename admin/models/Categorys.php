<?php

class Categorys
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllCattegory()
    {
        $sql = "SELECT * FROM `categories` ORDER BY created_at DESC";
        return $this->db->getAll($sql);
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM `categories` WHERE id = $id";
        return $this->db->getOne($sql);

    }

    public function addCattegory($category_name, $description)
    {
        $sql = "INSERT INTO `categories`(`category_name`,`description`) VALUES ('$category_name','$description')";
        $this->db->add($sql);
    }

    public function updateCattegory($id, $name , $description)
    {
        $sql = "UPDATE `categories` SET `category_name`='$name', `description` = '$description' WHERE id = $id";
        $this->db->add($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `categories` WHERE id = $id";
        $this->db->add($sql);
    }
}