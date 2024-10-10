<?php
// Bao gồm model AdminCategory
require_once './admin/model/AdminCategory.php';
?>
<div class="header_bottom">
    <div class="row">
        <div class="col-12">
            <div class="main_menu_inner">
                <div class="main_menu d-none d-lg-block">
                    <nav>
                        <ul>
                            <li><a href="<?= BASE_URL . '?act=homepage' ?>">Home</a>

                            </li>
                            <li><a href="<?= BASE_URL . '?act=productpage' ?>">shop</a>

                            </li>
                            <?php
                            // Khởi tạo model danh mục
                            $modelCategory = new AdminCategory();
                            // Lấy tất cả danh mục
                            $categories = $modelCategory->getAllCategory();

                            // Hiển thị từng danh mục
                            foreach ($categories as $category): ?>
                                <li><a href="<?= BASE_URL . '?act=category&id=' . $category['id'] ?>"><?= $category['name'] ?></a></li>
                            <?php endforeach; ?>


                            <li><a href="contact.html">contact us</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
</div>