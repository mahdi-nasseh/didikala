<?php

use Didikala\Model\Order;

$order = Order::find($data['order_id']);
?>
<!-- Start Content -->
<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <div class="col-12">
            <div class="profile-navbar">
                <a href="<?= URLRoot ?>/user/orders" class="profile-navbar-btn-back">بازگشت</a>
                <h4>سفارش <span
                            class="font-en"><?= $order->reference_id ?></span><span>ثبت شده در تاریخ <?= toJalaliWithTime($order->created_at) ?></span>
                </h4>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="dt-sl dt-sn">
                <div class="row table-draught px-3">
                    <div class="col-md-6 col-sm-12">
                        <span class="title">تحویل گیرنده:</span>
                        <span class="value"><?= $order->users->getFullName() ?></span>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span class="title">شماره تماس تحویل گیرنده:</span>
                        <span class="value"><?= is_null($order->users->phone) ? '-' : $order->users->phone ?></span>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span class="title">قیمت کل:</span>
                        <span class="value"><?= number_format($order->subtotal) ?>تومان</span>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span class="title">قیمت تمام شده:</span>
                        <span class="value"><?= number_format($order->total) ?>تومان</span>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>همه محصولات در سفارش</h2>
            </div>
            <div class="dt-sl">
                <div class="table-responsive">
                    <table class="table table-order table-order-details">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>تعداد</th>
                            <th>قیمت واحد</th>
                            <th>قیمت کل</th>
                            <th>تخفیف</th>
                            <th>قیمت نهایی</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $order_items = $order->order_items;
                        $i = 0;
                        foreach ($order_items as $order_item): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td>
                                    <div class="details-product-area">
                                        <img src="<?= URLRoot ?>/Public/<?= $order_item->products->thumbnail ?>"
                                             class="thumbnail-product" alt="">
                                        <h5 class="details-product">
                                            <span style="height: 50px;"><?= $order_item->products->title ?></span>
                                        </h5>
                                    </div>
                                </td>
                                <td><?= $order_item->qantity ?></td>
                                <td><?= number_format($order_item->price) ?> تومان</td>
                                <td><?= number_format($order_item->get_total_price()) ?> تومان</td>
                                <td><?= $order_item->get_discount_percent() ?>%</td>
                                <td><?= number_format($order_item->get_total_sale_price()) ?> تومان</td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->