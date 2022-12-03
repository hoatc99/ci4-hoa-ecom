<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= url_to('Admin\HomeController::index') ?>">HoaBinhGroup</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= url_to('Admin\HomeController::index') ?>">HBG</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Trang chủ</li>
            <li class="dropdown">
                <a href="<?= url_to('Admin\HomeController::index') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Trang chủ</span></a>
            </li>
            <li class="menu-header">Quản lý bán hàng</li>
            <li class="dropdown">
                <a href="<?= url_to('Admin\OrderController::index') ?>" class="nav-link beep beep-sidebar"><i class="fas fa-columns"></i> <span>Quản lý đơn hàng</span></a>
            </li>
            <li class="menu-header">Quản lý cửa hàng</li>
            <li class="dropdown">
                <a href="<?= url_to('Admin\ProductController::index') ?>" class="nav-link beep beep-sidebar"><i class="fas fa-th-large"></i> <span>Quản lý sản phẩm</span></a>
            </li>
            <li class="dropdown">
                <a href="<?= url_to('Admin\CategoryController::index') ?>" class="nav-link"><i class="far fa-file-alt"></i> <span>Quản lý danh mục</span></a>
            </li>
            <li class="dropdown">
                <a href="<?= url_to('Admin\BrandController::index') ?>" class="nav-link"><i class="far fa-file-alt"></i> <span>Quản lý thương hiệu</span></a>
            </li>
            <li class="dropdown">
                <a href="<?= url_to('Admin\UserController::index') ?>" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>Quản lý tài khoản</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="<?= url_to('ClientController::index') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Xem cửa hàng
            </a>
        </div>
    </aside>
</div>