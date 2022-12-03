<?= $this->extend('admin\layouts\master') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Danh sách thương hiệu</h4>
                <div class="card-header-action">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#taothuonghieuModal">Tạo thương hiệu</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Tên</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($brands as $key => $brand) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= esc($brand->name) ?></td>
                                    <td><?= esc($brand->product_count) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#suathuonghieuModal<?= esc($brand->id) ?>">Sửa</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="taothuonghieuModal">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="<?= url_to('Admin\BrandController::create') ?>" method="post" class="needs-validation" novalidate>
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title">Tạo thương hiệu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên thương hiệu</label>
                        <input type="text" class="form-control" name="ten_thuong_hieu" required>
                        <div class="invalid-feedback">Vui lòng nhập tên thương hiệu</div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($brands as $brand) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="suathuonghieuModal<?= esc($brand->id) ?>">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="<?= url_to('Admin\BrandController::update', $brand->id) ?>" method="post" class="needs-validation" novalidate>
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa thương hiệu</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên thương hiệu</label>
                            <input type="text" class="form-control" name="ten_thuong_hieu" value="<?= esc($brand->name) ?>" required>
                            <div class="invalid-feedback">Vui lòng nhập tên thương hiệu</div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection() ?>