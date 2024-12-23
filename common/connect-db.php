<?php
// Kết nối CSDL
$host = DB_HOST;
$post = DB_POST;
$dbname = DB_NAME;

try {
  $conn = new PDO("mysql:host=$host;post=$post;dbname=$dbname", DB_USERNAME, DB_PASSWORD);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Cài đặt chế độ trả dự liệu
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
