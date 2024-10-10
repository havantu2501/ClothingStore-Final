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
                        <i class="fa-regular fa-user"></i>
                        Product
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a href="<?= BASE_URL_ADMIN . '?act=form-add-product' ?>"
                        class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-plus fa-w-20"></i>
                        </span>
                        Create
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
                                    <th class="text-center">Title</th>
                                    <th class="text-center">Category_id</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Discount</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Create_At</th>
                                    <th class="text-center">Update_Up</th>
                                    <th class="text-center">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listProduct as $key => $product): ?>

                                    <tr>
                                        <td class="text-center text-muted"><?= $key + 1 ?> </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-3">

                                                    </div>
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading"><?= $product['title'] ?> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center"> <?= $product['category_id'] ?></td>

                                        <td class="text-center"> <?= $product['price'] ?></td>
                                        <td class="text-center">
                                            <?= $product['discount'] ?>
                                        </td>
                                        <td class="text-center">
                                            <img src="<?= BASE_URL . $product['thumbnail']  ?>" style="width: 100px" alt=""
                                                onerror="this.onerror=null; this.src='https://truongansafety.com/wp-content/uploads/2022/04/pr04-1-scaled-1.jpg' ">
                                        </td>
                                        <td class=" text-center">
                                            <?= $product['description'] ?>
                                        </td>
                                        <td class="text-center"> <?= $product['created_at'] ?></td>
                                        <td class="text-center"> <?= $product['updated_at'] ?></td>

                                        <td class="text-center">
                                            <a href="<?= BASE_URL_ADMIN . '?act=show-product&id_product=' . $product['id'] ?>"
                                                class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                Details
                                            </a>
                                            <a href="<?= BASE_URL_ADMIN . '?act=form-edit-product&id_product=' . $product['id'] ?>"
                                                data-toggle="tooltip" title="Edit" data-placement="bottom"
                                                class="btn btn-outline-warning border-0 btn-sm">
                                                <span class="btn-icon-wrapper opacity-8">
                                                    <i class="fa fa-edit fa-w-20"></i>
                                                </span>
                                            </a>

                                            <a href="<?= BASE_URL_ADMIN . '?act=delete-product&id_product=' . $product['id'] ?>"
                                                onclick="return confirm('Do you really want to delete this item?')">
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