<?php include 'views/LayoutClient/header.php' ?>
<!--header middel end-->
<?php include 'views/LayoutClient/menu.php' ?>


<!--Checkout page section-->
<div class="Checkout_section">
    <div class="row">

    </div>
    <div class="checkout_form">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="<?= BASE_URL . '?act=payment-processing' ?>" method="POST">
                    <h3>Billing Details</h3>
                    <div class="row">

                        <div class="col-lg-6 mb-30">
                            <label>Full Name <span>*</span></label>
                            <input type="text" id="fullname" name="fullname" value="<?= $user['fullname'] ?>">
                        </div>


                        <div class="col-12 mb-30">
                            <label>Street address <span>*</span></label>
                            <input placeholder="House number and street name" name="address" type="text" value="<?= $user['address'] ?>">
                        </div>

                        <div class="col-lg-6 mb-30">
                            <label>Phone<span>*</span></label>
                            <input type="text" name="phone_number" value="<?= $user['phone_number'] ?>">

                        </div>
                        <div class="col-lg-6 mb-30">
                            <label> Email Address <span>*</span></label>
                            <input type="text" name="email" value="<?= $user['email'] ?>">

                        </div>
                        <div class="col-12">
                            <div class="order-notes">
                                <label for="order_note">Order Notes</label>
                                <textarea id="order_note" name="notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="col-lg-6 col-md-6">
                <form action="#">
                    <h3>Your order</h3>
                    <div class="order_table table-responsive mb-30">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php foreach ($detailCart as $key => $product):  ?>
                                    <tr>
                                        <td> <?= $product['title'] ?> <strong> × <?= $product['quantity'] ?></strong></td>
                                        <td>
                                            <?= $product['discount'] * $product['quantity'] ?>
                                        </td>
                                    </tr>

                                <?php endforeach ?>
                            </tbody>
                            <?php
                            // Gán giá trị mặc định nếu chưa được khởi tạo
                            $totalMoney = isset($totalMoney) ? $totalMoney : 0;
                            $shippingFee = isset($shippingFee) ? $shippingFee : 50;

                            // Tính tổng tiền bao gồm cả phí vận chuyển
                            $totalWithShipping = $totalMoney + $shippingFee;
                            ?>
                            <tfoot>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>
                                        <?= $totalMoney ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td><strong><?= $shippingFee ?></strong></td>
                                </tr>
                                <tr class="order_total">
                                    <input type="hidden" name="total_money" value="<?= $totalWithShipping ?>">
                                    <th>Order Total</th>
                                    <td><strong><?= $totalWithShipping ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="panel-default">
                            <input id="payment_defult" name="check_method" type="radio" data-bs-target="createp_account" />
                            <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="assets/img/visha/papyel.png" alt=""></label>

                            <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                <div class="card-body1">
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                </div>
                            </div>
                        </div>
                        <div class="order_button">
                            <button type="submit">Đặt Hàng</button>
                        </div>
                    </div>
                </form>
            </div>
            </form>
        </div>
    </div>
</div>
<?php include 'views/LayoutClient/footer.php' ?>