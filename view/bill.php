<div class="row mb">
    <div class="boxtrai mr">
        <form action="index.php?act=billcomfirm" method="post" onsubmit="return confirmOrder()">
            <div class="row">
                <div class="boxtitle">Thông tin đặt hàng</div>
                <div class="row boxcontent billform">
                    <table>
                        <!-- Thêm đoạn này vào của toàn -->
                        <?php
                        // Lấy thông tin từ session
                        $user_id = $_SESSION['id'] ?? '';
                        $username = $_SESSION['username'] ?? '';
                        $email = $_SESSION['email'] ?? '';
                        ?>
                        <tr>
                            <td>Người đặt hàng</td>
                            <td><input style="width:220px;height:33px;" type="text" name="username" value="<?= htmlspecialchars($username) ?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input style="width:220px;height:33px;" type="email" name="email" value="<?= htmlspecialchars($email) ?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input style="width:220px;height:33px;" type="text" name="diachi"></td>
                        </tr>
                        <tr>
                            <td>Điện thoại</td>
                            <td><input style="width:220px;height:33px;" type="text" name="dienthoai"></td>
                        </tr>
                    </table>

                    <div class="row">
                        <div class="boxtitle">Phương thức thanh toán</div>
                        <div class="boxcontent">
                            <table>
                                <tr>
                                    <td><input type="radio" name="pttt" value="credit_card" check>Thẻ tín dụng</td>
                                    <td><input type="radio" name="pttt" value="paypal" check>Paypal</td>
                                    <td><input type="radio" name="pttt" value="bank_transfer" check>Chuyển khoản ngân hàng</td>
                                    <td><input type="radio" name="pttt" value="cash_on_delivery" check>Thanh toán khi nhận hàng</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="boxtitle">Thông tin giỏ hàng</div>
                        <div class="row boxcontent cart">
                            <table>
                                <?php viewcart(0); ?>
                            </table>
                        </div>
                    </div>
                    <div class="row mb bill">
                        <input class="btn btn-primary mt-4" type="submit" value="Đồng ý đặt hàng và thanh toán" name="dongydathang">
                    </div>
        </form>
    </div>
</div>
</div>
</div>


<script>
    function confirmOrder() {
        var confirmAction = confirm("Bạn chắc chắn muốn đặt hàng?");
        if (confirmAction) {
            return true;
        } else {
            return false;
        }
    }
</script>