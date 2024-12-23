<div class="row mb">
    <div class="boxtrai mr">
        <form action="index.php?act=billcomfirm" method="post" onsubmit="return confirmOrder()">
            <div class="row mb">
                <div class="boxtitle">Thông tin đặt hàng</div>
                <div class="row boxcontent billform">
                    <table="1">
                       <?php
                       if(isset($_SESSION['users'])){
                        $username=$_SESSION['users']['username'];
                        $email=$_SESSION['users']['email'];
                       }else{
                        $username="";
                        $email="";
                       }
                       ?> 
                       <tr>
                        <td>Người đặt hàng</td>
                        <td><input type="text" name="username" value="<?=$username?>"></td>
                       </tr>
                       <tr>
                        <td>email</td>
                        <td><input type="text" name="email" value="<?=$email?>"></td>
                       </tr>
                    </table>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">Phương thức thanh toán</div>
                <div class="boxcontent">
                    <table>
                        <tr>
                            <td><input type="radio" name="pttt" check>Trả tiền khi nhận hàng</td>
                            <td><input type="radio" name="pttt">Chuyển khoản ngân hàng</td>
                            <td><input type="radio" name="pttt">thanh toán online</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row mb">
                <div class="boxtitle">Thông tin giỏ hàng</div>
                <div class="row boxcontent cart">
                    <table>
                      <?php viewcart(0);?>
                    </table>
                </div>
            </div>
            <div class="row mb bill">
                <input type="submit" value="Đồng ý đặt hàng và thanh toán" >
            </div>
        </form>
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
