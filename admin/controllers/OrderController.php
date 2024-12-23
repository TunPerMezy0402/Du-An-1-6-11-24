<?php

class OrderController
{
    public $Order;

    public function __construct()
    {
        $this->Order = new Orders();
    }

    public function listOrder()
    {
        $data = $this->Order->getAllOrder();

        require_once "./views/Admin/Orders/listOrder.php";
    }

    public function showOrder()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $datao = $this->Order->getOneOrder($id);
            if (empty($datao)) {
                header('Location: ?act=list-user');
            }
        } else {
            header('Location: ?act=list-order');
        }
        require_once "./views/Admin/Orders/showOrder.php";
    }

    public function updateOrder()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->Order->getOneOrder($id);
            if (empty($data)) {
                header('Location: ?act=list-order');
            }
        } else {
            header('Location: ?act=list-order');
        }

        if (isset($_POST['btnSendOrder'])) {
            $error = [];

            $current_shipping_status = $data['shipping_status']; // Trạng thái giao vận hiện tại từ DB
            $current_payment_status = $data['payment_status'];

            $payment_status = $_POST['payment_status'];
            $shipping_status = $_POST['shipping_status'];

            // Kiểm tra trạng thái thanh toán
            if ($payment_status == 'failed' && ($current_payment_status == 'paid' || $current_payment_status == 'refunded')) {
                $error['payment_status'] = "Không thể thay đổi trạng thái thanh toán sang 'không thanh toán thành công' khi đơn hàng 'đã thanh toán' hoặc 'hoàn tiền'!";
            }

            if ($payment_status == 'refunded' && ($current_shipping_status == 'pending' || $current_shipping_status == 'cancelled' || $current_shipping_status == 'in_transit')) {
                $error['payment_status'] = "Chỉ được đổi trạng thái thanh toán 'Đã hoàn lại' khi trạng thái giao vận là 'Đã trả lại' hoặc 'Đã hủy'!";
            }

            if ($current_shipping_status == 'delivered' && $payment_status != 'paid' ) {
                $error['payment_status'] = "Không thể thay đổi trạng thái thanh toán khi đơn hàng 'đã giao'!";
            }

            // Kiểm tra trạng thái giao vận
            if ($shipping_status == 'cancelled' && ($current_shipping_status == 'in_transit' || $current_shipping_status == 'delivered')) {
                $error['shipping_status'] = "Không thể thay đổi trạng thái giao vận sang 'Đã hủy' khi đơn hàng đang giao hoặc đã giao!";
            }

            if ($current_shipping_status == 'cancelled' && $shipping_status != 'cancelled') {
                $error['shipping_status'] = "Không thể thay đổi trạng thái giao vận khi đơn hàng 'Đã hủy' !";
            }

            if ($shipping_status == 'delivered' && ($current_shipping_status == 'returned' || $current_payment_status == 'failed' || $current_payment_status == 'refunded' || $current_payment_status == 'unpaid')) {
                $error['shipping_status'] = "Không thể thay đổi trạng thái giao vận sang 'đã giao' khi khác hàng 'chưa thanh toán' hoặc 'không thanh toán thành công' và 'đã hoàn tiền'!";
            }

            if (empty($error)) {
                $this->Order->updateOrder($id, $payment_status, $shipping_status);
                $_SESSION['success'] = 'Update thành công!';
                header('Location: ?act=update-order&id=' . $id);
                exit();
            }

        }
        require_once "./views/Admin/Orders/updateOrder.php";
    }


}