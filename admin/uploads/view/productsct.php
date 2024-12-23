<main class="catalog  mb ">
    <div class="boxleft">
        <div class="mb">
            <div class="box_title">
                <?php extract($onesp);
                echo $product_name ?>
            </div>
            <div class="box_content">
                <?php
                $hinh = $img_path . $image;
                echo '<div class="spct"><img src="' . $hinh . '" width="400" height="400" ></div><br>';
                echo 'Giá : '.$price.' VNĐ <br>';
                echo 'Mô tả : '.$description.' <br>';
                echo 'Hàng tồn kho : '.$stock_quantity;
                ?>
            </div>
        </div>
        <div class="mb">
            <div class="box_title">BÌNH LUẬN</div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                $(document).ready(function () {

                    $("#binhluan").load("view/binhluan/binhluanform.php", {
                        idpro: <?= $id ?>
                    });
                });
            </script>

            <!-- card bình luận -->
            <div class="card" id="binhluan">

            </div>
        </div>
        <div class=" mb">
            <div ></div>
            <div >
                <?php
                ?>
            </div>
        </div>
    </div>
    <?php
    include "view/boxright.php";
    ?>

</main>