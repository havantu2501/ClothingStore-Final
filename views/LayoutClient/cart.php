<!-- header -->
<?php include 'views/LayoutClient/header.php' ?>
<!--pos page start-->

<!--header middel end-->
<?php include 'views/LayoutClient/menu.php' ?>
<!--header end -->
<div class="shopping_cart_area">
    <div class="row">
        <div class="col-12">
            <div class="table_desc">
                <div class="cart_page table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product_remove">Delete</th>
                                <th class="product_thumb">Image</th>
                                <th class="product_name">Product</th>
                                <th class="product-price">Price</th>
                                <th class="product_quantity">Quantity</th>
                                <th class="product_total">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($detailCart as $key => $product):  ?>
                                <tr>
                                    <td class="product_remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                                    <td class="product_thumb"><a href="#"><img src="<?= BASE_URL . $product['thumbnail'] ?>"
                                                alt=""></a></td>
                                    <td class="product_name"><a href="#"><?= $product['title'] ?></a></td>
                                    <td class="product-price"><?= $product['discount'] ?>$</td>
                                    <td class="product_quantity"><input min="0" max="100" value=<?= $product['quantity'] ?>
                                            type="number"></td>
                                    <td class="product_total">
                                        <?= $product['discount'] * $product['quantity'] ?>
                                    </td>


                                </tr>

                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="cart_submit">
                    <button type="submit">update cart</button>
                </div>
            </div>
        </div>
    </div>
    <!--coupon code area start-->
    <div class="coupon_area">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <!-- <div class="coupon_code">
                    <h3>Coupon</h3>
                    <div class="coupon_inner">
                        <p>Enter your coupon code if you have one.</p>
                        <input placeholder="Coupon code" type="text">
                        <button type="submit">Apply coupon</button>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-6 col-md-6">
                <form action="/Checkout" method="post">

                    <div class="coupon_code">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                            </div>
                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount"><?= $totalMoney ?></p>
                            </div>
                            <div class="checkout_btn">
                                <input type="text" name="total_money" value=<?= $totalMoney ?>>
                                <input type="text" name="cart_id" value=<?= $cart['id'] ?>>
                                <button type="submit">Proceed to Checkout

                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--coupon code area end-->
</div>
<!--footer area start-->
<?php include 'views/LayoutClient/footer.php' ?>
<!--footer area end-->