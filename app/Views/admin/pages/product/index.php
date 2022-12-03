<?= $this->extend('admin\layouts\master') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Danh sách sản phẩm</h4>
                <div class="card-header-action">
                    <a href="<?= url_to('Admin\ProductController::new') ?>" class="btn btn-warning">Tạo sản phẩm</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Tên</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Đơn giá</th>
                                <th>SL tồn</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $key => $product) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= esc($product->name) ?></td>
                                    <td><?= esc($product->category->name) ?></td>
                                    <td><?= esc($product->brand->name) ?></td>
                                    <td><?= number_format(esc($product->unit_price)) ?></td>
                                    <td><?= esc($product->quantity) ?></td>
                                    <td>
                                        <div class="badge badge-<?= $product->is_active ? 'success' : 'danger' ?>"><?= $product->is_active ? 'Đang bán' : 'Ngưng bán' ?></div>
                                    </td>
                                    <td>
                                        <div class="dropdown d-inline mr-2">
                                            <button class="btn btn-sm btn-primary dropdown-toggle w-50" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= url_to('Admin\ProductController::edit', $product->id) ?>">Sửa</a>
                                                <?php if ($product->is_active) : ?>
                                                    <a href="#" class="dropdown-item text-danger" data-toggle="modal" data-target="#ngungbanModal<?= esc($product->id) ?>">Ngưng bán</a>
                                                <?php else : ?>
                                                    <a href="#" class="dropdown-item text-primary" data-toggle="modal" data-target="#mobanModal<?= esc($product->id) ?>">Mở bán</a>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('modals') ?>
<?php foreach ($products as $product) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="ngungbanModal<?= esc($product->id) ?>">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="<?= url_to('Admin\ProductController::disable', $product->id) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Ngưng bán sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Sản phẩm này sẽ không xuất hiện tại cửa hàng.
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-danger">Đồng ý ngưng bán</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="mobanModal<?= esc($product->id) ?>">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="<?= url_to('Admin\ProductController::enable', $product->id) ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Ngưng bán sản phẩm</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Sản phẩm này sẽ xuất hiện tại cửa hàng.
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Đồng ý mở bán</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>