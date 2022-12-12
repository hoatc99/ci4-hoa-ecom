<?php $wishlist = array_values(session()->get('tmp_wishlist')) ?>
<?php $sum_total = 0 ?>

<!-- Wishlist -->
<div class="wrap-header-wishlist js-panel-wishlist">
    <div class="s-full js-hide-wishlist text-right"></div>

    <div class="header-wishlist flex-col-l p-l-45 p-r-25">
        <div class="header-wishlist-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Danh sách yêu thích
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-wishlist">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-wishlist-content flex-w js-pscroll">
            <ul class="header-wishlist-wrapitem w-full">
                <?php foreach ($wishlist as $item) : ?>
                    <?php $sum_total += $item->total ?>
                    <li class="header-wishlist-item flex-w flex-t m-b-12">
                        <a href="<?= url_to('ClientController::remove_from_wishlist', $item->id) ?>">
                            <div class="header-wishlist-item-img">
                                <img src="/assets/<?= esc($item->image) ?>" alt="IMG">
                            </div>
                        </a>

                        <div class="header-wishlist-item-txt p-t-8">
                            <a href="<?= url_to('ClientController::single', $item->slug) ?>" class="header-wishlist-item-name m-b-18 hov-cl1 trans-04">
                                <?= $item->name ?>
                            </a>

                            <span class="header-wishlist-item-info">
                                <?= number_format($item->unit_price) ?>đ
                            </span>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>