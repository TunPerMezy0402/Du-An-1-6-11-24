<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">Giỏ hàng</div>
            <div class="row boxcontent cart">
                <table>

                    <?php
                    viewcart(1);
                    ?>
                </table>
            </div>
        </div>
        <div class="row mb bill css-cart">
            <?php if (isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0): ?>
                <input class="btn btn-primary" type="button" value="Đồng ý đặt hàng" onclick="window.location.href='index.php?act=bill'">
                <a class="mt-3 btn btn-danger" href="index.php?act=delcart"><input class="btn" type="button" value="Xoá giỏ hàng"></a>
            <?php endif; ?>
        </div>
    </div>
    <script>
        // Hàm cập nhật số lượng sản phẩm
        function updateQuantity(index, change) {
            // Lấy số lượng hiện tại từ phần tử HTML
            let quantityElement = document.getElementById('quantity_' + index);
            let quantity = parseInt(quantityElement.innerText);

            // Thay đổi số lượng
            quantity += change;

            // Kiểm tra số lượng không nhỏ hơn 1 và không vượt quá giới hạn
            if (quantity < 1) {
                alert("Số lượng phải lớn hơn 0.");
                return;
            }

            // Cập nhật số lượng trên giao diện
            quantityElement.innerText = quantity;

            // Lấy giá của sản phẩm từ phần tử HTML
            let price = parseInt(document.getElementById('price_' + index).innerText.replace(' VNĐ', '').replace(/\./g, ''));

            // Tính tổng tiền của sản phẩm (giá * số lượng)
            let totalPrice = price * quantity;

            // Cập nhật lại tổng tiền của sản phẩm
            document.getElementById('total_' + index).innerText = totalPrice.toLocaleString() + ' VNĐ';

            // Gửi yêu cầu AJAX để cập nhật giỏ hàng trong session
            let xhr = new XMLHttpRequest();
            xhr.open('POST', './model/update_cart.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Xử lý kết quả trả về nếu cần
                    console.log(xhr.responseText);
                }
            };

            // Gửi dữ liệu (index là vị trí sản phẩm trong giỏ hàng và quantity là số lượng mới)
            xhr.send('index=' + index + '&quantity=' + quantity);
        }
    </script>

</div>