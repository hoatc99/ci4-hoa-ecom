<?= $this->extend('admin\layouts\master') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Danh sách danh mục</h4>
                <div class="card-header-action">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#taodanhmucModal">Tạo danh mục</button>
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
                            <?php foreach ($categories as $key => $category) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= esc($category->name) ?></td>
                                    <td><?= esc($category->product_count) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#suadanhmucModal<?= esc($category->id) ?>">Sửa</button>
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
<div class="modal fade" tabindex="-1" role="dialog" id="taodanhmucModal">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <form action="<?= url_to('Admin\CategoryController::create') ?>" method="post" class="needs-validation" novalidate>
                <?= csrf_field() ?>
                <div class="modal-header">
                    <h5 class="modal-title">Tạo danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" class="form-control" name="ten_danh_muc" required>
                        <div class="invalid-feedback">Vui lòng nhập tên danh mục</div>
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

<?php foreach ($categories as $category) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="suadanhmucModal<?= esc($category->id) ?>">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <form action="<?= url_to('Admin\CategoryController::update', $category->id) ?>" method="post" class="needs-validation" novalidate>
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title">Sửa danh mục</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text" class="form-control" name="ten_danh_muc" value="<?= esc($category->name) ?>" required>
                            <div class="invalid-feedback">Vui lòng nhập tên danh mục</div>
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