<?php $cart = array_values(session()->get('tmp_cart')) ?>
<?php $wishlist = array_values(session()->get('tmp_wishlist')) ?>

<!-- Header -->
<header class="header-v4">
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
                    Miễn phí vận chuyển cho hóa đơn từ 5 triệu đồng
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Trợ giúp & Câu hỏi thường gặp
                    </a>

                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        Tài khoản
                    </a>
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="<?= url_to('ClientController::index') ?>" class="logo">
                    <img src="/assets/clients/images/icons/logo-01.png" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li>
                            <a href="<?= url_to('ClientController::index') ?>">Trang chủ</a>
                        </li>

                        <li class="label1" data-label1="hot">
                            <a href="<?= url_to('ClientController::product') ?>">Sản phẩm</a>
                        </li>

                        <li>
                            <a href="<?= url_to('ClientController::cart') ?>">Giỏ hàng</a>
                        </li>

                        <li>
                            <a href="<?= url_to('ClientController::blog') ?>">Bài viết</a>
                        </li>

                        <li>
                            <a href="<?= url_to('ClientController::about') ?>">Giới thiệu</a>
                        </li>

                        <li>
                            <a href="<?= url_to('ClientController::contact') ?>">Liên hệ</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= count($cart) ?>">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>

                    <div class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-wishlist" data-notify="<?= count($wishlist) ?>">
                        <i class="zmdi zmdi-favorite"></i>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="<?= url_to('ClientController::index') ?>"><img src="/assets/clients/images/icons/logo-01.png" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?= count($cart) ?>">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>

            <div class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-wishlist" data-notify="<?= count($wishlist) ?>">
                <i class="zmdi zmdi-favorite-outline"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
            <li>
                <div class="left-top-bar">
                    Miễn phí vận chuyển cho hóa đơn từ 5 triệu đồng
                </div>
            </li>

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Trợ giúp & Câu hỏi thường gặp
                    </a>

                    <a href="#" class="flex-c-m p-lr-10 trans-04">
                        Tài khoản
                    </a>
                </div>
            </li>
        </ul>

        <ul class="main-menu-m">
            <li>
                <a href="<?= url_to('ClientController::index') ?>">Trang chủ</a>
            </li>

            <li>
                <a href="<?= url_to('ClientController::product') ?>" class="label1 rs1" data-label1="hot">Sản phẩm</a>
            </li>

            <li>
                <a href="<?= url_to('ClientController::cart') ?>">Giỏ hàng</a>
            </li>

            <li>
                <a href="<?= url_to('ClientController::blog') ?>">Bài viết</a>
            </li>

            <li>
                <a href="<?= url_to('ClientController::about') ?>">Giới thiệu</a>
            </li>

            <li>
                <a href="<?= url_to('ClientController::contact') ?>">Liên hệ</a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/assets/clients/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Tìm kiếm...">
            </form>
        </div>
    </div>
</header>