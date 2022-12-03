<?php $cart = array_values(session()->get('tmp_cart')) ?>
<?php $sum_total = 0 ?>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart text-right"></div>

    <div class="header-cart flex-col-l p-l-45 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Giỏ hàng của bạn
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                <?php foreach ($cart as $item) : ?>
                    <?php $sum_total += $item->total ?>
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <a href="<?= url_to('ClientController::remove_from_cart', $item->id) ?>">
                            <div class="header-cart-item-img">
                                <img src="/assets/<?= esc($item->image) ?>" alt="IMG">
                            </div>
                        </a>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="<?= url_to('ClientController::single', $item->slug) ?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                <?= $item->name ?>
                            </a>

                            <span class="header-cart-item-info">
                                <?= $item->quantity ?> x <?= number_format($item->unit_price) ?>đ
                            </span>

                            <span class="header-cart-item-total">
                                <?= number_format($item->total) ?>đ
                            </span>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>

            <div class="w-full">
                <div class="flex-w flex-t p-t-27 p-b-33 w-full p-tb-40">
                    <div class="size-208">
                        <span class="stext-110 cl2">
                            Tổng cộng:
                        </span>
                    </div>

                    <div class="size-209 text-right font-weight-bold">
                        <span class="mtext-112 cl2">
                            <?= number_format($sum_total) ?>đ
                        </span>
                    </div>
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="<?= url_to('ClientController::cart') ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        Xem giỏ hàng
                    </a>

                    <a href="<?= url_to('ClientController::checkout') ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Đặt hàng
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>