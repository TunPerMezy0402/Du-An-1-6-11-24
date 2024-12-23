<div class="boxright">
    <div>
    </div>
    <div class="mb">
        <div class="box_title"></div>
        <div class="box_content form_account">
        <div class="mb">
    <div class="mb">
    </div>
    <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
    <div class="mb">
        <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
        <div class="box_content">
            <?php
            foreach ($dstop10 as $sp) {
                extract($sp);
                $linksp = "index.php?act=productsct&id=" . $id;
                $hinh = $img_path . $image;
                echo '<div class="selling_products" style="width:100%;">
                    <img src="' . $hinh . '" alt="anh">
                    <a href="' . $linksp . '">' . $product_name . '</a>
                </div>';
            }
            ?>
        </div>
    </div>
</div>