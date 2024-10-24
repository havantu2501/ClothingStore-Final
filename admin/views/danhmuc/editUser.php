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
                        Edit User

                    </div>

                </div>

            </div>
            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-info alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">x</a>
                    <i class="fa fa-coffee"></i>
                    <?= htmlspecialchars($_SESSION['success']) ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php elseif (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger alert-dismissable">
                    <a class="panel-close close" data-dismiss="alert">x</a>
                    <i class="fa fa-coffee"></i>
                    <?php
                    if (is_array($_SESSION['error'])):
                        foreach ($_SESSION['error'] as $error): ?>
                            <p><?= htmlspecialchars($error) ?></p>
                        <?php endforeach;
                    else: ?>
                        <p><?= htmlspecialchars($_SESSION['error']) ?></p>
                    <?php endif; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="<?= BASE_URL_ADMIN . '?act=edit-user' ?>" method="POST">
                            <input type="text" name="id" value="<?= $user['id'] ?>" hidden>


                            <div class="position-relative row form-group">
                                <label for="name" class="col-md-3 text-md-right col-form-label">Name</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="fullname" id="name" placeholder="Name" type="text"
                                        class="form-control" value="<?= $user['fullname'] ?>">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="email"
                                    class="col-md-3 text-md-right col-form-label">Email</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="email" id="email" placeholder="Email" type="email"
                                        class="form-control" value="<?= $user['email'] ?>">
                                </div>
                            </div>

                            <!-- <div class="position-relative row form-group">
                                <label for="password"
                                    class="col-md-3 text-md-right col-form-label">Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="password" id="password" placeholder="Password" type="password"
                                        class="form-control" value="<?= $user['password'] ?>">
                                </div>
                            </div> -->

                            <div class="position-relative row form-group">
                                <label for="address" class="col-md-3 text-md-right col-form-label">
                                    Street Address
                                </label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="address" id="street_address"
                                        placeholder=" Address" type="text" class="form-control"
                                        value="<?= $user['address'] ?>">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="phone"
                                    class="col-md-3 text-md-right col-form-label">Phone</label>
                                <div class="col-md-9 col-xl-8">
                                    <input required name="phone_number" id="phone_number" placeholder="Phone" type="tel"
                                        class="form-control" value="<?= $user['phone_number'] ?>">
                                </div>
                            </div>

                            <div class="position-relative row form-group">
                                <label for="role_id"
                                    class="col-md-3 text-md-right col-form-label">Level</label>
                                <div class="col-md-9 col-xl-8">
                                    <select required name="role_id" id="role_id" class="form-control">


                                        <option <?= $user['role_id'] == 1 ? 'selected' : '' ?> value=1>
                                            Admin
                                        </option>
                                        <option <?= $user['role_id'] !== 1 ? 'selected' : '' ?> value=2>
                                            Client
                                        </option>

                                    </select>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">


                                    <button type="submit"
                                        class="btn-shadow btn-hover-shine btn btn-primary">
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

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">

                    <div>
                        <i class="fa-regular fa-user"></i>
                        Change Password

                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <form action="<?= BASE_URL_ADMIN . '?act=edit-password' ?>" method="POST">
                            <input type="text" name="id" value="<?= $user['id'] ?>" hidden>

                            <div class="position-relative row form-group">
                                <label for="password"
                                    class="col-md-3 text-md-right col-form-label">Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="old_pass" id="password" placeholder="Password" type="password"
                                        class="form-control" value="">
                                    <?php if (isset($_SESSION['error']['old_pass'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['old_pass'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="password"
                                    class="col-md-3 text-md-right col-form-label">New Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="new_pass" id="password" placeholder="Password" type="password"
                                        class="form-control" value="">
                                    <?php if (isset($_SESSION['error']['new_pass'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['new_pass'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="position-relative row form-group">
                                <label for="password"
                                    class="col-md-3 text-md-right col-form-label">Confirm Password</label>
                                <div class="col-md-9 col-xl-8">
                                    <input name="confirm_pass" id="password" placeholder="Password" type="password"
                                        class="form-control" value="">
                                    <?php if (isset($_SESSION['error']['confirm_pass'])) { ?>
                                        <p class="text-danger"><?= $_SESSION['error']['confirm_pass'] ?></p>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="position-relative row form-group mb-1">
                                <div class="col-md-9 col-xl-8 offset-md-2">


                                    <button type="submit"
                                        class="btn-shadow btn-hover-shine btn btn-primary">
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
                        elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
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