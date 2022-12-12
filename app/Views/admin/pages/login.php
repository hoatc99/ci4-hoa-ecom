<?= $this->extend('admin\layouts\auth') ?>

<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Đăng nhập</h4>
    </div>

    <div class="card-body">
        <form action="<?= url_to('Admin\HomeController::auth') ?>" method="post" class="needs-validation" novalidate="">
            <?= csrf_field() ?>
            <div class="form-group">
                <label>Tên đăng nhập</label>
                <input type="text" class="form-control" name="ten_dang_nhap" tabindex="1" required autofocus>
                <div class="invalid-feedback">Vui lòng điền tên đăng nhập</div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label class="control-label">Mật khẩu</label>
                    <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                            Bạn đã quên mật khẩu?
                        </a>
                    </div>
                </div>
                <input type="password" class="form-control" name="mat_khau" tabindex="2" required>
                <div class="invalid-feedback">Vui lòng điền mật khẩu</div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Đăng nhập</button>
            </div>
        </form>
    </div>
</div>
<div class="mt-5 text-muted text-center">
    Bạn chưa có tài khoản? <a href="auth-register.html">Đăng ký ngay</a>
</div>
<?= $this->endSection() ?>