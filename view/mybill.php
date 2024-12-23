<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">Danh sách đơn hàng của bạn</div>
            <div class="row boxcontent">
                <?php
                $tong_tien = 0;

                ?>
                <?php if (count($orders) > 0): ?>
                    <table>
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Thanh Toán</th>
                            <th>Trạng thái</th>
                        </tr>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= htmlspecialchars($order['id']) ?></td>
                                <td><?= htmlspecialchars($order['created_at']) ?></td>
                                <td><?= number_format($order['total_amount'], 0, ',', '.') ?> VNĐ</td>

                                <td><?php
                                    if ($order['payment_status'] === 'unpaid') {
                                        echo '<span class="text-warning">Chưa thanh toán</span>';
                                    } else if ($order['payment_status'] === 'paid') {
                                        echo '<span class="text-success">Đã thanh toán</span>';
                                    } else if ($order['payment_status'] === 'refunded') {
                                        echo '<span class="text-primary">Đã hoàn lại</span>';
                                    } else {
                                        echo '<span class="text-danger">không thanh toán thành công</span>';
                                    }
                                ?></td>

                                <td><?php
                                    if ($order['shipping_status'] === 'pending') {
                                        echo '<span class="text-primary">Đang chờ xử lý</span>';
                                    } else if ($order['shipping_status'] === 'in_transit') {
                                        echo '<span class="text-secondary">Đang vận chuyển</span>';
                                    } else if ($order['shipping_status'] === 'delivered') {
                                        echo '<span class="text-success">Đã giao</span>';
                                    } else if ($order['shipping_status'] === 'returned') {
                                        echo '<span class="text-primary">Đã trả lại</span>';
                                    } else {
                                        echo '<span class="text-danger">Đã hủy</span>';
                                    }
                                ?></td>
                            </tr>

                            <?php
                            $tong_tien += $order['total_amount'];
                            ?>

                        <?php endforeach; ?>
                        <tr>
                            <td colspan="2">Tồng Tiền :</td>
                            <td colspan="3"><?= number_format($tong_tien, 0, ',', '.') . "  VNĐ"?></td>
                        </tr>
                    </table>
                <?php else: ?>
                    <p>Bạn chưa có đơn hàng nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>