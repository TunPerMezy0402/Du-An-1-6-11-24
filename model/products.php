<?php
function insert_products($tensp, $giasp, $hinh, $mota, $stock_quantity)
{
    $sql = " INSERT INTO products(name,price,img,mota,stock_quantity,iddm) VALUES('$tensp','$giasp','$hinh','$mota','$stock_quantity')";
    pdo_execute($sql);
}

function delete_products($id)
{
    $sql = "DELETE FROM products WHERE id=" . $id;
    pdo_execute($sql);
}
function checkCategoryExists($category_id)
{
    $conn = pdo_get_connection();
    if ($conn) {
        $query = "SELECT COUNT(*) FROM categories WHERE id = :category_id";
        $stmt = $conn->prepare($query);
        $stmt->execute(['category_id' => $category_id]);

        $count = $stmt->fetchColumn();
        if ($count > 0) {
            return true;
        } else {
            echo "Error: No category found with ID $category_id.";
            return false;
        }
    }
    echo "Error: Unable to establish a connection to the database.";
    return false;
}
function addProduct($product_name, $price, $category_id, $stock_quantity)
{
    if (!checkCategoryExists($category_id)) {
        echo "Error: Category ID $category_id does not exist.";
        return;
    }

    $conn = pdo_get_connection();
    if ($conn) {
        try {
            $query = "INSERT INTO products (product_name, price, category_id, stock_quantity) 
                      VALUES (:product_name, :price, :category_id, :stock_quantity)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                'product_name' => $product_name,
                'price' => $price,
                'category_id' => $category_id,
                'stock_quantity' => $stock_quantity  // Cung cấp giá trị cho stock_quantity
            ]);
            echo "Product added successfully.";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
function loadall_products_home()
{
    $sql = "SELECT * FROM products ORDER BY id DESC";
    $list_sp = pdo_query($sql);
    return $list_sp;
}
function loadall_products_top10()
{
    $sql = "SELECT * FROM products WHERE 1 ORDER BY stock_quantity DESC limit 0,10";
    $list_sp = pdo_query($sql);
    return $list_sp;
}

function loadone_products($id)
{
    $sql = "SELECT * FROM products WHERE id='$id'";
    $products = pdo_query_one($sql);
    return $products;
}
function load_ten_dm($category_id)
{
    if ($category_id > 0) {
        $sql = "SELECT * FROM category WHERE id='$category_id'";
        $dm = pdo_query_one($sql);
        extract($dm);
        return $category_name;
    } else {
        return "";
    }
}

function loadall_products($kewword = "", $iddm = 0) {
    $sql = "SELECT * FROM products WHERE 1";
    if ($kewword != "") {
        $sql .= " AND product_name LIKE '%" . $kewword . "%'";
    }
    $sql .= " ORDER BY id DESC";
    return pdo_query($sql);
}
