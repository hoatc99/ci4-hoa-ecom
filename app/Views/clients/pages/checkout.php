<?= $this->extend('clients\layouts\master') ?>

<?php $sum_total = 0 ?>

<?= $this->section('content') ?>

<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="<?= url_to('ClientController::index') ?>" class="stext-109 cl8 hov-cl1 trans-04">
            Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Giỏ hàng
        </span>
    </div>
</div>

<!-- Checkout -->
<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <form action="<?= url_to('ClientController::place_order') ?>" method="post">
            <?= csrf_field() ?>
            <div class="row">
                <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                    <div class="bor10 m-l-25 m-r--38 m-lr-0-xl">
                        <div class="flex-w flex-sb-m bor10 p-t-30 p-b-15 p-lr-40 p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Thông tin mua hàng
                            </h4>
                            <p class="stext-102 cl6">
                                <span class="text-danger">Trường có dấu * là bắt buộc</span>
                            </p>
                            <div class="row p-b-25">
                                <div class="col-sm-6 p-b-5">
                                    <label class="stext-102 cl3">Họ và tên <span class="text-danger">*</span></label>
                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" name="fullname" required>
                                </div>
                                <div class="col-sm-6 p-b-5">
                                    <label class="stext-102 cl3">Số điện thoại <span class="text-danger">*</span></label>
                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" name="shipping_phone" required>
                                </div>
                                <div class="col-sm-6 p-b-5">
                                    <label class="stext-102 cl3">Email</label>
                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" name="email">
                                </div>
                                <div class="col-sm-6 p-b-5">
                                    <label class="stext-102 cl3">Địa chỉ giao hàng <span class="text-danger">*</span></label>
                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" type="text" name="shipping_address" required>
                                </div>
                                <div class="col-sm-6 p-b-5">
                                    <label class="stext-102 cl3">Ngày giao hàng <span class="text-danger">*</span></label>
                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" type="date" name="delivery_date" required>
                                </div>
                                <div class="col-sm-6 p-b-5">
                                    <label class="stext-102 cl3">Phương thức thanh toán <span class="text-danger">*</span></label>
                                    <div class="rs1-select2 bor8 bg0">
                                        <select class="js-select2" name="payment_method" required>
                                            <option value="">Chọn phương thức thanh toán</option>
                                            <option value="Tiền mặt">Tiền mặt</option>
                                            <option value="Ngân hàng">Ngân hàng</option>
                                            <option value="Cà thẻ">Cà thẻ</option>
                                            <option value="Momo">Momo</option>
                                        </select>
                                        <div class="dropDownSelect2"></div>
                                    </div>
                                </div>
                                <div class="col-12 p-b-5">
                                    <label class="stext-102 cl3">Ghi chú</label>
                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                        <h4 class="mtext-109 cl2 p-b-30">
                            Chi tiết đơn hàng
                        </h4>

                        <?php foreach ($cart as $item) : ?>
                            <?php $sum_total += $item->total ?>
                            <div class="flex-w flex-t p-b-13">
                                <div class="size-209">
                                    <span class="stext-110 cl2">
                                        <?= esc($item->quantity) ?> x <?= esc($item->name) ?>
                                    </span>
                                </div>

                                <div class="size-208 text-right">
                                    <span class="mtext-110 cl2">
                                        <?= number_format($item->total) ?>đ
                                    </span>
                                </div>
                            </div>
                        <?php endforeach ?>

                        <div class="flex-w flex-t bor12"></div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-13">
                            <div class="size-208">
                                <span class="stext-110 cl2">
                                    Tạm tính:
                                </span>
                            </div>

                            <div class="size-209 text-right">
                                <span class="mtext-110 cl2">
                                    <?= number_format($sum_total) ?>đ
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t bor12 p-t-15 p-b-13">
                            <div class="size-208 w-full-ssm">
                                <span class="stext-110 cl2">
                                    Phí giao hàng:
                                </span>
                            </div>

                            <div class="size-209 p-t-1 text-right">
                                <span class="mtext-110 cl2">
                                    0đ
                                </span>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            <div class="size-208">
                                <span class="mtext-101 cl2">
                                    Tổng tiền:
                                </span>
                            </div>

                            <div class="size-209 p-t-1 text-right font-weight-bold">
                                <span class="mtext-112 cl2">
                                    <?= number_format($sum_total) ?>đ
                                </span>
                            </div>
                        </div>

                        <button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                            Đặt hàng
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>