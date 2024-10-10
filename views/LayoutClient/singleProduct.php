<?php include 'views/LayoutClient/header.php' ?>
<!--header middel end-->
<?php include 'views/LayoutClient/menu.php' ?>
<!--header end -->
<!-- modal area start -->
<!--product wrapper start-->
<div class="product_details">
    <div class="row">

        <div class="col-lg-5 col-md-6">
            <div class="product_tab fix">

                <div class="tab-content produc_tab_c">
                    <div class="tab-pane fade show active" id="p_tab1" role="tabpanel">
                        <div class="modal_img">
                            <a href="#"><img src="<?= BASE_URL . $product['thumbnail'] ?>" alt=""></a>
                            <div class="img_icone">
                                <img src="assets/img/cart/span-new.png" alt="">
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </div>
        <div class="col-lg-7 col-md-6">
            <div class="product_d_right">
                <h1><?= $product['title'] ?></h1>

                <div class="product_desc">
                    <p><?= $product['description'] ?></p>

                    <div class="content_price mb-15">
                        <span><?= $product['discount'] ?>$</span>
                        <span class="old-price"><?= $product['price'] ?>$</span>
                    </div>
                    <div class="box_quantity mb-20">
                        <form action="<?= BASE_URL . '?act=add-cart' ?>" method="post">
                            <input min="0" max="100" value="1" type="number" name="quantity">
                            <input type="hidden" name="product_id" value="<?= $product ['id']; ?>">
                            <button type="submit">add to cart</button>
                        </form>
                    </div>
                    <div class="product_d_size mb-20">
                        <label for="group_1">size</label>
                        <select name="size" id="group_1">
                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                        </select>
                    </div>





                </div>
            </div>
        </div>
    </div>
    <!--product details end-->

</div>

<?php include 'views/LayoutClient/footer.php' ?>