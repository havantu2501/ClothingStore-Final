<?php include 'views/LayoutClient/header.php' ?>
<?php include 'views/LayoutClient/menu.php' ?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="<?= BASE_URL ?>">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Register</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

<!-- customer login start -->
<div class="customer_login ">
    <div class="row">
        <!--login area start-->
        <div class="justify-content-center ">
            <div class="account_form ">
                <h2>Register</h2>
                <?php if (isset($_SESSION['error'])) { ?>
                    <p class="text-danger"> <?= $_SESSION['error'] ?> </p>
                    <?php unset($_SESSION['error']); // Xóa lỗi sau khi hiển thị 
                    ?>
                <?php } ?>


                <form action="<?= BASE_URL . '?act=check-register' ?>" method="post">
                    <p>
                        <label> Full Name <span>*</span></label>
                        <input required type="text" name="fullname">
                    </p>
                    <p>
                        <label> Phone <span>*</span></label>
                        <input required type="text" name="phone_number">
                    </p>
                    <p>
                        <label> Address <span>*</span></label>
                        <input required type="text" name="address">
                    </p>
                    <p>
                        <label> Email <span>*</span></label>
                        <input required type="text" name="email">
                    </p>
                    <p>
                        <label>Passwords <span>*</span></label>
                        <input required type="password" name="password">
                    </p>
                    <p>
                        <label for="confirm_password">Xác nhận mật khẩu:</label>
                        <input type="password" name="confirm_password" required><br>
                    </p>

                    <div class="login_submit">
                        <button type="submit">Register</button>


                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
<!-- customer login end -->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

<!--footer area start-->
<?php include 'views/LayoutClient/footer.php' ?>
<!--footer area end-->



<!-- all js here -->
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>