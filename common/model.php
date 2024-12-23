<?php
//CRUD ->  Create/Read/Update/Delete
if (!function_exists('get_str_keys')) {
    function get_str_keys($data)
    {
        return implode(',', array_keys($data));
    }
}

if (!function_exists('get_virtual_params')) {
    function get_virtual_params($data) {
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = ":$key";
        }
        return implode(",", $tmp);
    }
}

if (!function_exists('get_set_params')) {
    function get_set_params($data) {
        $keys = array_keys($data);
        $tmp = [];
        foreach ($keys as $key) {
            $tmp[] = "$key = :$key";
        }
        return implode(",", $tmp);
    }
}


// Show tất cả trường trong 1 bảng

if (!function_exists('listAll')) {
    function listAll($tableName)
    {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY id DESC";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

// Show theo $str trong 1 bảng

if (!function_exists('listTo_str')) {
    function strlistAll($tableName,$str)
    {
        try {
            $sql = "SELECT * FROM $tableName ORDER BY id LIMIT $str ";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

// 

if (!function_exists('strlistAll_cate')) {
    function strlistAll_cate($tableName,$name,$strcate)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE $name = $strcate";

            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('showOne')) {
    function showOne($tableName, $id)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE id = :id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('insert')) {   
    function insert($tableName, $data = [])
    {
        try {
            $virtualParams = get_virtual_params($data);
            $keys = array_keys($data);
            $strKeys = implode(',', $keys);
            $sql = "INSERT INTO $tableName($strKeys) VALUE ($virtualParams)";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('update')) {
    function update($tableName, $id, $data = [])
    {
        try {
            $setParams = get_set_params($data);

            $sql = "UPDATE $tableName SET $setParams WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            foreach ($data as $fieldName => &$value) {
                $stmt->bindParam(":$fieldName", $value);
            }

            $stmt -> bindParam(":id", $id);

            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('delete')) {
    function delete2($tableName, $id)
    {
        try {
            $sql = "DELETE FROM $tableName WHERE id = :id";

            $stmt = $GLOBALS['conn']->prepare($sql);

            $stmt -> bindParam(":id", $id);

            $stmt->execute();
        } catch (Exception $e) {
            debug($e);
        }
    }
}
?>