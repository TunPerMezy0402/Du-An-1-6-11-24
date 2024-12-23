<?php

class Variant
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllVariant()
    {
        $sql = "SELECT * FROM `variant_options` WHERE 1";
        return $this->db->getAll($sql);
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM `variant_options` WHERE id = $id";
        return $this->db->getOne($sql);

    }

    public function addVariant($option_name, $option_value)
    {
        $sql = "INSERT INTO `variant_options`(`option_name`,`option_value`) VALUES ('$option_name','$option_value')";
        $this->db->add($sql);
    }

    public function updateVariant($id, $option_name , $option_value)
    {
        $sql = "UPDATE `variant_options` SET `option_name`='$option_name', `option_value` = '$option_value' WHERE id = $id";
        $this->db->add($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `variant_options` WHERE id = $id";
        $this->db->add($sql);
    }
}