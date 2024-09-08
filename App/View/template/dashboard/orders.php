<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <div class="col-12">
            <div class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>همه سفارش‌ها</h2>
            </div>
            <div class="dt-sl">
                <div class="table-responsive">
                    <table class="table table-order">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>شماره سفارش</th>
                            <th>تاریخ ثبت سفارش</th>
                            <th>مبلغ کل</th>
                            <th>عملیات پرداخت</th>
                            <th>جزییات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($data['dashboardOrders'] as $order): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td><?= $order->reference_id ?></td>
                                <td><?= toJalaliWithTime($order->created_at) ?></td>
                                <td><?= number_format($order->total) ?> تومان</td>
                                <td><?= $order->status == 'complete' ? 'ثبت شده' : 'ثبت نشده' ?></td>
                                <td class="details-link">
                                    <a href="<?= URLRoot ?>/dashboard/detail_order/<?= $order->ID ?>">
                                        <i class="mdi mdi-chevron-left"></i>
                                    </a>
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