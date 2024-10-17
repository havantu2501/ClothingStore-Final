<!-- header -->
<?php include './views/layout/header.php' ?>

<!-- sidebar  -->
<?php include './views/layout/sidebar.php' ?>

<div class="app-main__outer">

    <!-- Main -->
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        <i class="fa-regular fa-file-alt"></i>
                        Edit Order : <?= $order['order_code'] ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="<?= BASE_URL_ADMIN . '?act=edit-order' ?>" method="POST">
                            <input type="text" name="order_id" value="<?= $order['id'] ?>" hidden>


                            <div class="position-relative row form-group">
                                <label for="fullname" class="col-md-3 text-md-right col-form-label">Fullname</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="fullname" id="fullname" placeholder="Fullname" type="text" class="form-control"
                                        value="<?= $order['fullname'] ?>" required>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="email" id="email" placeholder="Email" type="email" class="form-control"
                                        value="<?= $order['email'] ?>" required>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="phone_number" class="col-md-3 text-md-right col-form-label">Phone</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="phone_number" id="phone_number" placeholder="Phone number" type="text" class="form-control"
                                        value="<?= $order['phone_number'] ?>" required>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="address" class="col-md-3 text-md-right col-form-label">Address</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="address" id="address" placeholder="Address" type="text" class="form-control"
                                        value="<?= $order['address'] ?>" required>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="address" class="col-md-3 text-md-right col-form-label">Notes</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="notes" id="notes" placeholder="Notes" type="text" class="form-control"
                                        value="<?= $order['notes'] ?>" required>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="status" class="col-md-3 text-md-right col-form-label">Status</label>
                                <div class="col-md-9 col-xl-8">
                                    <select name="status_id" id="status_id" class="form-control" required>
                                        <option <?= $order['status_id'] == 1 ? 'selected' : '' ?> value="1">Đã Xử Lý</option>
                                        <option <?= $order['status_id'] == 2 ? 'selected' : '' ?> value="2">Chưa Xử Lý</option>
                                        <option <?= $order['status_id'] == 3 ? 'selected' : '' ?> value="3">Đang Giao Hàng</option>
                                        <option <?= $order['status_id'] == 4 ? 'selected' : '' ?> value="4">Đã Giao Hàng</option>
                                        <option <?= $order['status_id'] == 5 ? 'selected' : '' ?> value="5">Hủy Bỏ</option>
                                        <option <?= $order['status_id'] == 6 ? 'selected' : '' ?> value="6">Hoàn Hàng</option>
                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="total_money" class="col-md-3 text-md-right col-form-label">Total Money</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="total_money" id="total_money" placeholder="Total Money" type="text"
                                        class="form-control" value="<?= $order['total_money'] ?>" required>
                                </div>
                            </div>
                            <!-- Trong editOrder.php -->
                            <div class="position-relative row form-group">
                                <label class="col-md-3 text-md-right col-form-label">Ngày đặt hàng</label>
                                <div class="col-md-9 col-xl-8">
                                    <input type="date" name="order_date" class="form-control" value="<?= date('Y-m-d', strtotime($order['order_date'])) ?>" required>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-3">
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
<?php include './views/layout/footer.php' ?>

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