<?php include 'views/LayoutClient/header.php' ?>
<?php include 'views/LayoutClient/menu.php' ?>

<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="index.html">home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>login</li>
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
                <h2>Login</h2>
                <?php if (isset($_SESSION['error'])) { ?>
                    <p class="text-danger"> <?= $_SESSION['error'] ?> </p>
                    <?php unset($_SESSION['error']); // Xóa lỗi sau khi hiển thị 
                    ?>
                <?php } ?>

                <form action="<?= BASE_URL . '?act=check-login ' ?>" method="post">
                    <p>
                        <label> Email <span>*</span></label>
                        <input type="text" name="email">
                    </p>
                    <p>
                        <label>Passwords <span>*</span></label>
                        <input type="password" name="password">
                    </p>
                    <div class="login_submit">
                        <button type="submit">login</button>

                        <a href="#">Lost your password?</a>
                    </div>

                </form>
            </div>
        </div>
        <!--login area start-->

        <!--register area start-->
        <!-- <div class="col-lg-6 col-md-6">
            <div class="account_form register">
                <h2>Register</h2>
                <form action="#">
                    <p>
                        <label>Email address <span>*</span></label>
                        <input type="text">
                    </p>
                    <p>
                        <label>Passwords <span>*</span></label>
                        <input type="password">
                    </p>
                    <div class="login_submit">
                        <button type="submit">Register</button>
                    </div>
                </form>
            </div>
        </div> -->
        <!--register area end-->
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

<!-- Mirrored from htmldemo.net/coron/coron/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 12:50:48 GMT -->

</html>