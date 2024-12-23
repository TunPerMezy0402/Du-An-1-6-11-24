<?php

/* Kiểm tra tài khoản */
if (!function_exists('check_AccountUser')) {
    function check_AccountUser($user_name, $user_pass)
    {
        $sql = "SELECT * FROM users WHERE email = :user_email AND password = :user_pass";
        $stmt = $GLOBALS['conn']->prepare($sql);
        $stmt->bindParam(":user_email", $user_name);
        $stmt->bindParam(":user_pass", $user_pass);
        $stmt->execute();
        $taikhoan = $stmt->fetch(PDO::FETCH_ASSOC);
        return $taikhoan;
    }
}

if (!function_exists('checkUniqueName')) {
    function checkUniqueName($tableName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE username = :username LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":username", $name);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueNameForUpdate')) {
    function checkUniqueNameForUpdate($tableName, $id, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE username = :username AND id<>:id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":username", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmail')) {
    function checkUniqueEmail($tableName, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            debug($e);
        }
    }
}

if (!function_exists('checkUniqueEmailForUpdate')) {
    function checkUniqueEmailForUpdate($tableName, $id, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email AND id<>:id LIMIT 1";
            $stmt = $GLOBALS['conn']->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            debug($e);
        }
    }
}
