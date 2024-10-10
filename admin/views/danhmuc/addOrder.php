<!-- header -->
<?php include './views/layout/header.php'; ?>

<!-- sidebar -->
<?php include './views/layout/sidebar.php'; ?>

<div class="app-main__outer">

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <div>
                        <i class="fa-regular fa-box"></i>
                        Add Order
                        <div class="page-title-subheading">
                            View, create, update, delete and manage orders.
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="<?= BASE_URL_ADMIN . '?act=add-order' ?>" method="POST">

                            <div class="position-relative row form-group">
                                <label class="col-md-3 text-md-right col-form-label">Customer Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="fullname" id="fullname" placeholder="Customer Name" type="text"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="email" id="email" placeholder="Email" type="email"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label class="col-md-3 text-md-right col-form-label">Phone Number</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="phone_number" id="phone_number" placeholder="Phone Number" type="text"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label class="col-md-3 text-md-right col-form-label">Address</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="address" id="address" placeholder="Address" type="text"
                                        class="form-control" value="">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label class="col-md-3 text-md-right col-form-label">Notes</label>
                                <div class="col-md-9 col-xl-8">
                                    <textarea name="notes" id="notes" placeholder="Notes" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="status" class="col-md-3 text-md-right col-form-label">Status</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="status" id="status" class="form-control">
                                        <option value="Pending">Pending</option>
                                        <option value="Shipped">Shipped</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label class="col-md-3 text-md-right col-form-label">Total Money</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="total_money" id="total_money" placeholder="Total Money" type="number"
                                        class="form-control" value="">
                                </div>
                            </div>
                            <!-- Trong addOrder.php -->
                        <div class="position-relative row form-group">
                            <label class="col-md-3 text-md-right col-form-label">Ngày đặt hàng</label>
                            <div class="col-md-9 col-xl-8">
                                <input type="date" name="order_date" class="form-control" required>
                            </div>
                        </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">
                                    <button type="submit" class="btn-shadow btn-hover-shine btn btn-primary">
                                        <span class="btn-icon-wrapper pr-2 opacity-8">
                                            <i class="fa fa-download fa-w-20"></i>
                                        </span>
                                        <span>Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End Main -->

</div>
</div>

</div>
<!-- footer -->
<?php include './views/layout/footer.php'; ?>
