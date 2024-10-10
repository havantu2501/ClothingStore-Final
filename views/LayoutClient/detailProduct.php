 <!-- modal area start -->
 <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
             <div class="modal_body">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-5 col-md-5 col-sm-12">
                             <div class="modal_tab">
                                 <div class="tab-content" id="pills-tabContent">
                                     <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                         <div class="modal_tab_img">
                                             <a href="#"><img src="assets/img/product/product13.jpg" alt=""></a>
                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="tab2" role="tabpanel">
                                         <div class="modal_tab_img">
                                             <a href="#"><img src="assets/img/product/product14.jpg" alt=""></a>
                                         </div>
                                     </div>
                                     <div class="tab-pane fade" id="tab3" role="tabpanel">
                                         <div class="modal_tab_img">
                                             <a href="#"><img src="assets/img/product/product15.jpg" alt=""></a>
                                         </div>
                                     </div>
                                 </div>

                             </div>
                         </div>
                         <div class="col-lg-7 col-md-7 col-sm-12">
                             <div class="modal_right">
                                 <div class="modal_title mb-10">
                                     <h2>Handbag feugiat</h2>
                                 </div>
                                 <div class="modal_price mb-10">
                                     <span class="new_price">$64.99</span>
                                     <span class="old_price">$78.99</span>
                                 </div>
                                 <div class="modal_content mb-10">
                                     <p>Short-sleeved blouse with feminine draped sleeve detail.</p>
                                 </div>
                                 <div class="modal_size mb-15">
                                     <h2>size</h2>
                                     <ul>
                                         <li><a href="#">s</a></li>
                                         <li><a href="#">m</a></li>
                                         <li><a href="#">l</a></li>
                                         <li><a href="#">xl</a></li>
                                         <li><a href="#">xxl</a></li>
                                     </ul>
                                 </div>
                                 <div class="modal_add_to_cart mb-15">
                                     <form action="<?= BASE_URL . '?act=add-cart' ?>" method="post">
                                         <input min="0" max="100" value="1" type="number" name="quantity">
                                         <input type="hidden" name="product_id" value="<?= $product=['id']; ?>">
                                         <button type="submit">add to cart</button>
                                     </form>
                                 </div>
                                 <div class="modal_description mb-15">
                                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                         incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>