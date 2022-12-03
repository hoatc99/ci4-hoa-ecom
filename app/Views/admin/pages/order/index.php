<?= $this->extend('admin\layouts\master') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Danh sách đơn hàng</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Tên khách</th>
                                <th>Ngày đặt hàng</th>
                                <th>Ngày giao hàng</th>
                                <th>SL sản phẩm</th>
                                <th>Tổng tiền</th>
                                <th>PTTT</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $key => $order) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= esc($order->fullname) ?></td>
                                    <td><?= esc(date('d/m/Y H:i:s', strtotime($order->created_at))) ?></td>
                                    <td><?= esc(date('d/m/Y', strtotime($order->delivery_date))) ?></td>
                                    <td><?= esc($order->product_count) ?></td>
                                    <td><?= number_format(esc($order->sum_total)) ?></td>
                                    <td><?= esc($order->payment_method) ?></td>
                                    <td>
                                        <div class="badge badge-<?= $order->order_status_id ? 'success' : 'danger' ?>"><?= $order->order_status_id ? 'Đang bán' : 'Ngưng bán' ?></div>
                                    </td>
                                    <td>
                                        <div class="dropdown d-inline mr-2">
                                            <button class="btn btn-sm btn-primary dropdown-toggle w-50" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= url_to('Admin\OrderController::show', $order->id) ?>">Xem chi tiết</a>
                                                <a class="dropdown-item" href="#">Cập nhật trạng thái</a>
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