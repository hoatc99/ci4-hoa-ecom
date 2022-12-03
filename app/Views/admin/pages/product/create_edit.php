<?= $this->extend('admin\layouts\master') ?>

<?php $state = !isset($product) ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <form action="<?= $state ? url_to('Admin\ProductController::create') : url_to('Admin\ProductController::update', $product->id) ?>" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="<?= $state ? 'post' : 'put' ?>" />
            <div class="row">
                <div class="col-md-9 col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4>Thông tin sản phẩm</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" class="form-control" name="ten_san_pham" value="<?= @esc($product->name) ?>" required>
                                    <div class="invalid-feedback">Vui lòng nhập tên sản phẩm</div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Đơn giá</label>
                                    <input type="text" class="form-control currency" name="don_gia" value="<?= @esc($product->unit_price) ?>" required>
                                    <div class="invalid-feedback">Vui lòng nhập đơn giá</div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Số lượng</label>
                                    <input type="text" class="form-control numeric" name="so_luong" value="<?= @esc($product->quantity) ?>" required>
                                    <div class="invalid-feedback">Vui lòng nhập số lượng</div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Danh mục</label>
                                    <select class="form-control select2" name="ma_danh_muc" required>
                                        <option value="">Chưa chọn danh mục</option>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= esc($category->id) ?>" <?= @$product->category_id == $category->id ? 'selected' : '' ?>><?= esc($category->name) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn danh mục</div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>Thương hiệu</label>
                                    <select class="form-control select2" name="ma_thuong_hieu" required>
                                        <option value="">Chưa chọn thương hiệu</option>
                                        <?php foreach ($brands as $brand) : ?>
                                            <option value="<?= esc($brand->id) ?>" <?= @$product->brand_id == $brand->id ? 'selected' : '' ?>><?= esc($brand->name) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Vui lòng chọn thương hiệu</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h4>Hình ảnh</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <img src="/assets/<?= esc(@$product->image) ?>" alt="" id="img_anh_dai_dien" class="w-100">
                                <input type="hidden" name="anh_dai_dien_cu" value="<?= esc(@$product->image) ?>">
                                <input type="file" class="form-control-file" accept="image/*" name="anh_dai_dien" id="input_anh_dai_dien">
                                <button class="btn btn-primary mt-3" id="btn_anh_dai_dien">Chọn hình ảnh</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Lưu thông tin</button>
            </div>
        </form>
    </div>
</div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
    $().ready(() => {
        var input = $('#input_anh_dai_dien');
        $('#btn_anh_dai_dien').click((e) => {
            e.preventDefault();
            input.click();
        });

        input.on('change', () => {
            var reader = new FileReader();
            reader.onload = (e) => {
                $('#img_anh_dai_dien').attr('src', e.target.result);
            }
            reader.readAsDataURL(event.target.files[0]);
        });
    });
</script>
<?= $this->endSection() ?>