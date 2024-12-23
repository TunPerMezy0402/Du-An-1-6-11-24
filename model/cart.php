<?php
function viewcart($del = 0)
{
    global $img_path;
    $tong = 0;
    $i = 0;


    echo '<table>
            <tr>
                <th>Hình</th>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>';


    if ($del == 1) {
        echo '<th>Thao tác</th>';
    }
    echo '</tr>';


    if (isset($_SESSION['mycart']) && is_array($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) {
        foreach ($_SESSION['mycart'] as $index => $cart) {
            $hinh = $img_path . $cart[2];
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;
            // debug($_SESSION['mycart']);
            $xoasp_td = ($del == 1) ? '<td><a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xoá"></a></td>' : '';


            $product_name = isset($cart[1]) ? htmlspecialchars($cart[1]) : '';
            $image = isset($hinh) ? htmlspecialchars($hinh) : '';

            echo '<tr>
                <td><img src="' . $image . '" alt="" height="80px"></td>
                <td>' . $product_name . '</td>
                
                <td class="align-middle quantity" style="width: 120px;">
                    <a onclick="updateQuantity(' . $index . ', -1)" style="border: 1px solid #ccc; padding: 0px 5px; cursor: pointer;">-</a>
                    <span id="quantity_' . $index . '" style="margin: 0 5px;">' . $cart[4] . '</span>
                    <a onclick="updateQuantity(' . $index . ', 1)" style="border: 1px solid #ccc; padding: 0px 5px; cursor: pointer;">+</a>
                </td>
                <td id="price_' . $index . '">' . number_format($cart[3], 0, ',', '.') . ' VNĐ</td>
                <td id="total_' . $index . '">' . number_format($ttien, 0, ',', '.') . ' VNĐ</td>
                
                ' . $xoasp_td . '
            </tr>';
            $i++;
        }

        echo '<tr>
                <td colspan="4"><strong>Tổng đơn hàng</strong></td>
                <td><strong>' . number_format($tong, 0, ',', '.') . ' VNĐ</strong></td>
                <td></td>
              </tr>';
    } else {
        echo '<tr><td colspan="6">Giỏ hàng của bạn hiện đang trống.</td></tr>';
    }

    echo '</table>';

}
//toàn thêm
function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {

        $ttien = $cart[3] * $cart[4];
        $tong += $ttien;
    }
    return $tong;
}
function tongsanpham()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {

        $ttien = $cart[3] * $cart[4];
    }
    return $ttien;
}
function insert_orders($user_id, $username, $email, $dienthoai, $pttt, $tongdonhang, $diachi)
{
    $sql = " INSERT INTO orders(user_id, customer_name, customer_email,customer_phone,payment_method,total_amount,shipping_address) VALUES('$user_id', '$username', '$email','$dienthoai','$pttt','$tongdonhang','$diachi')";
    return pdo_execute_return_lastInsertID($sql);
}
function insert_order_item($idorders, $product_id, $quantity, $unit_price, $tongsanpham)
{
    $sql = "INSERT INTO order_items (order_id, product_id, quantity,unit_price,subtotal) VALUES (?, ?, ?, ?, ?)";
    pdo_execute($sql, $idorders, $product_id, $quantity, $unit_price, $tongsanpham);
}
function getOrdersByUser($userId)
{
    $sql = "SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC";
    return pdo_query($sql, $userId);
}

function getOrderItems($orderId)
{
    $sql = "SELECT * FROM order_items WHERE order_id = ?";
    return pdo_query($sql, $orderId);
}
//and
?>