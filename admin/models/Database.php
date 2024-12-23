<?php

class Database
{
    public $conn;

    public function __construct()
    {
        $host = DB_HOST;
        $database = DB_NAME;
        $username = DB_USER;
        $password = DB_PASS;

        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            //   echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getAll($sql)
    {
        $stsm = $this->conn->query($sql);
        $stsm->execute();
        $result = $stsm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOne($sql)
    {
        $stsm = $this->conn->prepare($sql);
        $stsm->execute();
        $result = $stsm->fetch();
        return $result;
    }

    public function add($sql)
    {
        $stsm = $this->conn->prepare($sql);
        $stsm->execute();
    }

    public function __destruct()
    {
        $this->conn = null;
    }
    
    
}