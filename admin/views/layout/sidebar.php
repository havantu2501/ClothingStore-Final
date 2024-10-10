<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>


    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>



                <ul>
                    <li>
                        <a href="#">
                            User
                            <i class="fa-solid fa-arrow-down"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="<?= BASE_URL_ADMIN . '?act=user' ?>">
                                    <i class="metismenu-icon"></i>Admin
                                </a>
                            </li>
                            <li>
                                <a href="<?= BASE_URL_ADMIN . '?act=client' ?>">
                                    <i class="metismenu-icon"></i>Client
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="<?= BASE_URL_ADMIN . '?act=order' ?>">
                            <i class="metismenu-icon"></i>Order
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL_ADMIN . '?act=product' ?>">
                            <i class="metismenu-icon"></i>Product
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASE_URL_ADMIN . '?act=category' ?>">
                            <i class="metismenu-icon"></i>Category
                        </a>
                    </li>
                    <li>
                        <a href="./brand.html">
                            <i class="metismenu-icon"></i>Brand
                        </a>
                    </li>
                </ul>

            </ul>

        </div>
    </div>

</div>