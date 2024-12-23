<?php

class ProductVariant
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllProductVariant()
    {
        $sql = "SELECT 
                    pv.id, 
                    pv.product_id,
                    p.product_name, 
                    pv.sku, 
                    pv.image, 
                    pv.price, 
                    pv.stock_quantity, 
                    v.option_name, 
                    v.option_value, 
                    pv.created_at, 
                    pv.updated_at 
                FROM product_variants pv
                JOIN variant_options v
                ON v.id = pv.variant_id 
                JOIN products p
                ON pv.product_id = p.id 
                ORDER BY pv.created_at DESC;";
        return $this->db->getAll($sql);

    }

    public function getOne($id)
    {
        $sql = "SELECT 
                    pv.id, 
                    pv.product_id,
                    p.product_name, 
                    pv.sku, 
                    pv.image, 
                    pv.price, 
                    pv.stock_quantity, 
                    v.option_name, 
                    v.option_value, 
                    pv.created_at, 
                    pv.updated_at 
                FROM product_variants pv
                JOIN variant_options v
                ON v.id = pv.variant_id 
                JOIN products p
                ON pv.product_id = p.id 
                WHERE pv.id = $id";
        return $this->db->getOne($sql);

    }

    public function addProductVariant($product_id, $variant_id, $sku, $image, $price, $stock_quantity)
    {
        $sql = "INSERT INTO `product_variants`(`product_id`, `variant_id`, `sku`, `image`, `price`, `stock_quantity`) 
        VALUES ('$product_id','$variant_id','$sku','$image',$price,'$stock_quantity')";
        return $this->db->add($sql);

    }

    public function update($id, $product_id, $variant_id, $sku, $price, $image, $stock_quantity)
    {
        if (empty($image)) {
            $sql = "UPDATE `product_variants` SET `product_id`='$product_id',`variant_id`='$variant_id',`sku`='$sku',`price`='$price',`stock_quantity`='$stock_quantity' WHERE id = $id";
        } else {
            $sql = "UPDATE `product_variants` SET `product_id`='$product_id',`variant_id`='$variant_id',`sku`='$sku',`price`='$price',`image`='$image',`stock_quantity`='$stock_quantity' WHERE id = $id";
        }

        $this->db->add($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `product_variants` WHERE id = $id";
        $this->db->add($sql);
    }
}