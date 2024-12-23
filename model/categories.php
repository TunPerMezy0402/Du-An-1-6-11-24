<?php
function insert_categories($category_name)
{
    $sql = " INSERT INTO categories(name) VALUES('$category_name')";
    pdo_execute($sql);
}

function delete_categories($id)
{
    $sql = "DELETE FROM categories WHERE id=" . $id;
    pdo_execute($sql);
}

function loadall_categories()
{
    $sql = "SELECT * FROM categories";
    $list_dm = pdo_query($sql);
    return $list_dm;
}

function loadone_categories($id)
{
    $sql = "SELECT * FROM categories WHERE id=" . $id;
    $dm = pdo_query_one($sql);
    return $dm;
}

function update_dm($id, $category_name)
{
    $sql = " UPDATE categories SET name='$category_name' WHERE id = '$id' ";
    pdo_execute($sql);
}
?>