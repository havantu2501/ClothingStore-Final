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
                        <i class="fa-regular fa-file-alt"></i>
                        Orders
                        <div class="page-title-subheading">
                            View, update, delete, and manage orders.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <a href="<?= BASE_URL_ADMIN . '?act=form-add-order' ?>" class="btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-8">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Thêm Order
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Mã Đơn Hàng</th>
                                    <th class="text-center">Tên Người Nhận</th>
                                    <th class="text-center">Email Người Nhận</th>
                                    <th class="text-center">Số Điện Thoại</th>
                                    <th class="text-center">Địa Chỉ Người Nhận</th>
                                    <th class="text-center">Ngày Đặt Hàng</th> <!-- Thêm cột này -->
                                    <th class="text-center">Trạng Thái Đơn Hàng</th>
                                    <th class="text-center">Tổng Tiền</th>
                                    <th class="text-center">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listOrder as $key => $order): ?>
                                    <tr>
                                        <td class="text-center text-muted"><?= $key + 1 ?> </td>
                                        <td class="text-center"><?= $order['order_code'] ?></td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading"><?= $order['fullname'] ?> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="text-center"><?= $order['email'] ?></td>
                                        <td class="text-center"><?= $order['phone_number'] ?></td>
                                        <td class="text-center"><?= $order['address'] ?></td>
                                        <td class="text-center">
                                            <?= date('d/m/Y', strtotime($order['order_date'])) ?> <!-- Hiển thị ngày đặt hàng -->
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($order['status_id'] == 1) {
                                                echo 'Đã Xử Lý';
                                            } elseif ($order['status_id'] == 2) {
                                                echo 'Chưa Xử Lý';
                                            } elseif ($order['status_id'] == 3) {
                                                echo 'Đang Giao Hàng';
                                            } elseif ($order['status_id'] == 4) {
                                                echo 'Đã Giao Hàng';
                                            } else {
                                                echo 'Hủy Bỏ';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <?= number_format($order['total_money'], 0, ',', '.') ?> $
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= BASE_URL_ADMIN . '?act=show-order&id_order=' . $order['id'] ?>"
                                                class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                Chi Tiết
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=form-edit-order&id_order=' . $order['id'] ?>"
                                                data-toggle="tooltip" title="Edit" data-placement="bottom"
                                                class="btn btn-outline-warning border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=delete-order&id_order=' . $order['id'] ?>"
                                                onclick="return confirm('Bạn thực sự muốn xóa đơn hàng này?')">
                                                <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                                    type="submit" data-toggle="tooltip" title="Delete"
                                                    data-placement="bottom">
                                                    <span class="btn-icon-wrapper opacity-8">
                                                        <i class="fa fa-trash fa-w-20"></i>
                                                    </span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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

<!-- Code injected by live-server -->
<script>
    // <![CDATA[  <-- For SVG support
    if ('WebSocket' in window) {
        (function() {
            function refreshCSS() {
                var sheets = [].slice.call(document.getElementsByTagName("link"));
                var head = document.getElementsByTagName("head")[0];
                for (var i = 0; i < sheets.length; ++i) {
                    var elem = sheets[i];
                    var parent = elem.parentElement || head;
                    parent.removeChild(elem);
                    var rel = elem.rel;
                    if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
                        var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date()
                            .valueOf());
                    }
                    parent.appendChild(elem);
                }
            }
            var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
            var address = protocol + window.location.host + window.location.pathname + '/ws';
            var socket = new WebSocket(address);
            socket.onmessage = function(msg) {
                if (msg.data == 'reload') window.location.reload();
                else if (msg.data == 'refreshcss') refreshCSS();
            };
            if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
                console.log('Live reload enabled.');
                sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
            }
        })();
    } else {
        console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
    }
    // ]]>
</script>
</body>

</html>