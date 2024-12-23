<?php

class Users
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM `users` ORDER BY created_at DESC";
        return $this->db->getAll($sql);
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM `users` WHERE id=$id";
        return $this->db->getOne($sql);
    }

    public function addUser($username, $email, $password , $avatar, $role)
    {
        if (empty($avatar)) {
            $sql = "INSERT INTO `users`(`username`, `email`, `password`, `role`) 
        VALUES ('$username','$email','$password','$role')";
        } else {
            $sql = "INSERT INTO `users`(`username`, `email`, `password`, `avatar`, `role`) 
        VALUES ('$username','$email','$password','$avatar','$role')";
        }
        return $this->db->add($sql);

    }

    public function updateUser($id, $username, $email, $password , $avatar, $role, $updated_at)
    {
        if (empty($avatar)) {
            $sql = "UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',
                    `role`='$role' ,`updated_at`='$updated_at' WHERE id = $id";
        } else {
            $sql = "UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',
                    `avatar`='$avatar',`role`='$role' ,`updated_at`='$updated_at' WHERE id = $id";
        }

        $this->db->add($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `users` WHERE id = $id";
        $this->db->add($sql);
    }

    public function checkUniqueName2($tableName, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE username = :username LIMIT 1";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->bindParam(":username", $name);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            echo $e;
        }
    }


    public function checkUniqueNameForUpdate2($tableName, $id, $name)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE username = :username AND id<>:id LIMIT 1";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->bindParam(":username", $name);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function checkUniqueEmail2($tableName, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email LIMIT 1";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function checkUniqueEmailForUpdate2($tableName, $id, $email)
    {
        try {
            $sql = "SELECT * FROM $tableName WHERE email = :email AND id<>:id LIMIT 1";
            $stmt = $this->db->conn->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $data = $stmt->fetch();
            return empty($data) ? true : false;
        } catch (Exception $e) {
            echo $e;
        }
    }

}