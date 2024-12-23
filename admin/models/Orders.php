<?php

class Orders
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getAllOrder()
    {
        $sql = "SELECT
                    o.id AS order_id, 
                    o.customer_name,
                    o.customer_email,
                    o.customer_phone,
                    o.order_date,
                    o.payment_status,
                    o.shipping_status,
                    o.total_amount,
                    o.payment_method,
                    o.shipping_address,
                    o.created_at,
                    o.updated_at,
                    GROUP_CONCAT(p.product_name ORDER BY p.product_name ASC) AS product_names,
                    SUM(oi.quantity) AS total_quantity,
                    SUM(oi.subtotal) AS total_subtotal
                FROM orders o
                JOIN order_items oi ON oi.order_id = o.id
                JOIN products p ON p.id = oi.product_id
                GROUP BY o.id
                ORDER BY o.created_at DESC";
        return $this->db->getAll($sql);

    }

    public function getOneOrder($id)
    {
        $sql = "SELECT
                    o.id AS order_id, 
                    o.customer_name,
                    o.customer_email,
                    o.customer_phone,
                    o.order_date,
                    o.payment_status,
                    o.shipping_status,
                    o.total_amount,
                    o.payment_method,
                    o.shipping_address,
                    o.created_at,
                    o.updated_at,
                    GROUP_CONCAT(p.product_name ORDER BY p.product_name ASC) AS product_names,
                    SUM(oi.quantity) AS total_quantity,
                    SUM(oi.subtotal) AS total_subtotal
                FROM orders o
                JOIN order_items oi ON oi.order_id = o.id
                JOIN products p ON p.id = oi.product_id
                WHERE o.id = $id";
        return $this->db->getOne($sql);

    }

    public function updateOrder($id, $payment_status, $shipping_status)
    {

        $sql = "UPDATE `orders` SET `payment_status`='$payment_status',`shipping_status`='$shipping_status' WHERE id = $id";
        $this->db->add($sql);
    }
}