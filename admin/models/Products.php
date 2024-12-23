<?php

class Products
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllProduct()
    {
        $sql = "SELECT 
                    p.id, 
                    p.category_id,
                    c.category_name, 
                    p.product_name, 
                    p.description, 
                    p.image, 
                    p.price, 
                    p.brand, 
                    p.model, 
                    p.color, 
                    p.material, 
                    p.water_resistant, 
                    p.stock_quantity, 
                    p.created_at, 
                    p.updated_at 
                FROM products p
                INNER JOIN categories c
                ON p.category_id = c.id 
                ORDER BY p.created_at DESC";
        return $this->db->getAll($sql);

    }

    public function getOneProduct($id)
    {
        $sql = "SELECT 
                    p.id, 
                    p.category_id,
                    c.category_name, 
                    p.product_name, 
                    p.description, 
                    p.image, 
                    p.price, 
                    p.brand, 
                    p.model, 
                    p.color, 
                    p.material, 
                    p.water_resistant, 
                    p.stock_quantity, 
                    p.created_at, 
                    p.updated_at 
                FROM products p
                INNER JOIN categories c
                ON p.category_id = c.id 
                WHERE p.id = $id";
        return $this->db->getOne($sql);

    }

    public function addProduct($category_id, $product_name, $description, $image, $price, $brand, $model, $color, $material, $water_resistant, $stock_quantity)
    {
        $sql = "INSERT INTO `products`(`category_id`, `product_name`, `description`, `image`, `price`, `brand`, `model`, `color`, `material`, `water_resistant`, `stock_quantity`) 
        VALUES ($category_id,'$product_name','$description','$image',$price,'$brand','$model','$color','$material','$water_resistant','$stock_quantity')";
        return $this->db->add($sql);

    }

    public function updateProduct($id ,$category_id, $product_name, $description, $image, $price, $brand, $model, $color, $material, $water_resistant, $stock_quantity)
    {
        if (empty($image)) {
            $sql = "UPDATE `products` SET `category_id`='$category_id',`product_name`='$product_name',`description`='$description',
                    `price`='$price',`brand`='$brand',`model`='$model',`color`='$color',`material`='$material',`water_resistant`='$water_resistant',`stock_quantity`='$stock_quantity' WHERE id = $id";
        } else {
            $sql = "UPDATE `products` SET `category_id`='$category_id',`product_name`='$product_name',`description`='$description',
                    `image`='$image',`price`='$price',`brand`='$brand',`model`='$model',`color`='$color',`material`='$material',`water_resistant`='$water_resistant',`stock_quantity`='$stock_quantity' WHERE id = $id";
        }

        $this->db->add($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE id = $id";
        $this->db->add($sql);
    }

    public function getProductStatistics()
{
    $sql = "SELECT category_id, COUNT(*) as product_count FROM products GROUP BY category_id";
    return $this->db->getAll($sql); // Giả sử bạn đã có thuộc tính $db là thể hiện của Database
}
}