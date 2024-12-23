<main class="catalog mb">
    <div class="boxleft">
        <div class="banner mb-5">
            <img id="banner" src="img/anh0.jpg" alt="Banner Image">
        </div>

        <div class="items">
            <?php
            $i = 0;
            foreach ($spnew as $sp) {
                if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                extract($sp);
                $linksp = "index.php?act=productsct&id=" . $id;
                $hinh = $img_path . $image;
                echo '<div class="box_items ' . $mr . '">
                    <div class="box_items_img">
                        <a class="item_name" href="'.$linksp.'"><img src="' . $hinh . '" alt=""></a> 
                    </div>
                    <a class="item_name" href="' . $linksp . '">' . $product_name . '</a>
                    <p class="price">' . number_format($price, 0, ',', '.') . ' VNĐ</p>
                    <div class="row btnaddtocart">
                    <form action="index.php?act=addtocart" method="post">
                        <input type="hidden" name="id" value="'.$id.'">
                        <input type="hidden" name="name" value="'.$product_name.'">
                        <input type="hidden" name="image" value="'.$image.'">
                        <input type="hidden" name="price" value="'.$price.'">
                        <input type="submit" name="addtocart" value="Thêm vào giỏ hàng" style="
                            background-color: #e74c3c; 
                            color: white; 
                            font-size: 14px; 
                            padding: 10px 20px; 
                            border: none; 
                            border-radius: 5px; 
                            cursor: pointer; 
                            width: 60%; 
                            text-align: center; 
                            transition: background-color 0.3s ease, transform 0.2s ease;
                        "
                        onmouseover="this.style.backgroundColor=\'#c0392b\'; this.style.transform=\'scale(1.05)\';"
                        onmouseout="this.style.backgroundColor=\'#e74c3c\'; this.style.transform=\'scale(1)\';"/>
                    </form>
                    </div>
                </div>';
                $i += 1;
            }
            ?>
        </div>
    </div>
    <?php include "view/boxright.php"; ?>
</main>
