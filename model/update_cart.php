<?php
session_start();

// Kiểm tra nếu có dữ liệu gửi đến
if (isset($_POST['index']) && isset($_POST['quantity'])) {
    $index = $_POST['index'];  // Lấy chỉ số sản phẩm trong giỏ hàng
    $quantity = $_POST['quantity'];  // Số lượng mới của sản phẩm

    // Kiểm tra xem giỏ hàng có tồn tại trong session không
    if (isset($_SESSION['mycart']) && isset($_SESSION['mycart'][$index])) {
        // Cập nhật lại số lượng và tổng tiền của sản phẩm
        $_SESSION['mycart'][$index][4] = $quantity;  // Cập nhật số lượng
        $_SESSION['mycart'][$index][6] = $_SESSION['mycart'][$index][3] * $quantity;  // Cập nhật tổng tiền (giá * số lượng)
    }

    // Trả về kết quả
    echo "Giỏ hàng đã được cập nhật.";
}
?>
