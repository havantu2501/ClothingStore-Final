<!-- header -->
<?php include 'views/LayoutClient/header.php' ?>
<!--pos page start-->

<!--header middel end-->
<?php include 'views/LayoutClient/menu.php' ?>
<!--header end -->

<!--pos home section-->
<div class=" pos_home_section">
    <div class="row pos_home">
        <div class="col-lg-3 col-md-12">
            <!--layere categorie"-->
            <div class="sidebar_widget shop_c">
                <div class="categorie__titile">
                    <h4>Categories</h4>
                </div>
                <div class="layere_categorie">
                    <ul>
                        <li>
                            <input id="acces" type="checkbox">
                            <label for="acces">Accessories<span>(1)</span></label>
                        </li>
                        <li>
                            <input id="dress" type="checkbox">
                            <label for="dress">Dresses <span>(2)</span></label>
                        </li>
                        <li>
                            <input id="tops" type="checkbox">
                            <label for="tops">Tops<span>(3)</span></label>
                        </li>
                        <li>
                            <input id="bag" type="checkbox">
                            <label for="bag">HandBags<span>(4)</span></label>
                        </li>
                    </ul>
                </div>
            </div>
            <!--layere categorie end-->

            <!-- Sidebar  -->
            <?php include 'views/LayoutClient/sidebar.php' ?>
            <!-- Sidebar  -->

        </div>
        <div class="col-lg-9 col-md-12">
            <!--banner slider start-->
            <div class="banner_slider mb-35">
                <img src="assets/img/banner/bannner10.jpg" alt="">
            </div>
            <!--banner slider start-->



            <!--shop tab product-->
            <div class="shop_tab_product">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="large" role="tabpanel">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a href="single-product.html"><img src="assets/img/product/product1.jpg" alt=""></a>
                                        <div class="img_icone">
                                            <img src="assets/img/cart/span-new.png" alt="">
                                        </div>
                                        <div class="product_action">
                                            <a href="#"> <i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <span class="product_price">$50.00</span>
                                        <h3 class="product_title"><a href="single-product.html">Curabitur sodales</a></h3>
                                    </div>
                                    <div class="product_info">
                                        <ul>
                                            <li><a href="#" title=" Add to Wishlist ">Add to Wishlist</a></li>
                                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="Quick view">View Detail</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
            </div>
            <!--shop tab product end-->

        </div>
    </div>
</div>
<!--pos home section end-->
</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->

<!--footer area start-->
<?php include 'views/LayoutClient/footer.php' ?>
<!--footer area end-->

<?php include 'views/LayoutClient/detailProduct.php' ?>




<!-- all js here -->
<script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>

<!-- Mirrored from htmldemo.net/coron/coron/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Sep 2024 12:50:52 GMT -->

</html>