<?php include 'views/LayoutClient/header.php' ?>
<!--header middel end-->
<?php include 'views/LayoutClient/menu.php' ?>
<!--header end -->
<section class="main_content_area">
    <div class="account_dashboard">
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <!-- Nav tabs -->
                <div class="dashboard_tab_button">
                    <ul role="tablist" class="nav flex-column dashboard-list">
                        <li><a href="#dashboard" data-bs-toggle="tab" class="nav-link active">Dashboard</a></li>
                        <li> <a href="#orders" data-bs-toggle="tab" class="nav-link">Orders</a></li>

                        <li><a href="#address" data-bs-toggle="tab" class="nav-link">Account</a></li>
                        <li><a href="#account-details" data-bs-toggle="tab" class="nav-link">Account details</a></li>
                        <li><a href="<?= BASE_URL . '?act=logout' ?>" class="nav-link">logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 col-lg-9">
                <!-- Tab panes -->
                <div class="tab-content dashboard_content">
                    <div class="tab-pane fade show active" id="dashboard">
                        <h3>Dashboard</h3>
                        <p>Từ bảng điều khiển tài khoản của bạn, bạn có thể dễ dàng kiểm tra &amp; xem các <a href="#">đơn hàng gần đây</a>, quản lý <a href="#">địa chỉ giao hàng và thanh toán</a>, và <a href="#">chỉnh sửa mật khẩu và chi tiết tài khoản của bạn.</a></p>
                    </div>
                    <div class="tab-pane fade" id="orders">
                        <h3>Orders</h3>
                        <div class="">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Code Order</th>
                                        <th>Tên Người Nhận</th>
                                        <th>Status</th>
                                        <th>Status Change</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($orders as $key => $order): ?>
                                        <form method="post" action="">
                                            <tr>
                                                <td class="text-center"><?= htmlspecialchars($order['order_code']) ?></td>
                                                <td>
                                                    <div class="widget-content p-0">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left flex2">
                                                                <div class="widget-heading"><?= htmlspecialchars($order['fullname']) ?> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="text-center">
                                                    <?php
                                                    // Hiển thị trạng thái hiện tại
                                                    switch ($order['status_id']) {
                                                        case 1:
                                                            echo 'Đã Xử Lý';
                                                            break;
                                                        case 2:
                                                            echo 'Chưa Xử Lý';
                                                            break;
                                                        case 3:
                                                            echo 'Đang Giao Hàng';
                                                            break;
                                                        case 4:
                                                            echo 'Đã Giao Hàng';
                                                            break;
                                                        case 6:
                                                            echo 'Hoàn Hàng';
                                                            break;
                                                        default:
                                                            echo 'Hủy Bỏ';
                                                            break;
                                                    }
                                                    ?>
                                                </td>

                                                <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                                                <td class="text-center">
                                                    <select name="new_status_id">

                                                        <option value="6" <?= $order['status_id'] == 6 ? 'selected' : '' ?>>Hoàn Hàng</option>
                                                        <option value="5" <?= $order['status_id'] == 5 ? 'selected' : '' ?>>Hủy Hàng</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <?= number_format($order['total_money'], 0, ',', '.') ?> $
                                                </td>
                                                <td class="text-center">
                                                    <button type="submit" name="update_status" class="btn btn-outline-danger" ?>Update Status</button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="tab-pane" id="address">
                        <div class="col-lg-6 mb-30" style="background:#f8f9fa; border-radius:10px; padding:20px; box-shadow:0 4px 8px rgba(0,0,0,0.1); margin-bottom:25px;">
                            <p style="font-weight:bold; font-size:20px; color:#444; margin-bottom:15px;">Thông tin tài khoản</p>
                            <p style="font-size:18px; color:#333; margin:10px 0;"><strong>Full Name:</strong> <?= htmlspecialchars($user['fullname']) ?></p>
                            <p style="font-size:18px; color:#333; margin:10px 0;"><strong>Phone:</strong> <?= htmlspecialchars($user['phone_number']) ?></p>
                            <p style="font-size:18px; color:#333; margin:10px 0;"><strong>Address:</strong> <?= htmlspecialchars($user['address']) ?></p>
                            <p style="font-size:18px; color:#333; margin:10px 0;"><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="account-details">
                        <h3>Account details</h3>
                        <div class="login">
                            <div class="login_form_container">
                                <div class="account_login_form">
                                    <form action="<?= BASE_URL . '?act=my-account' ?>">
                                        <label>Name</label>
                                        <input type="text" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>">
                                        <label>Email</label>
                                        <input type="text" name="email" value="<?= htmlspecialchars($user['email']) ?>">
                                        <label>Password</label>
                                        <input type="password" name="user-password">

                                        <br>
                                        <div class="save_button primary_btn default_button">
                                            <button type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php include 'views/LayoutClient/footer.php' ?>