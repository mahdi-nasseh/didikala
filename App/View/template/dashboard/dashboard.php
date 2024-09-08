<?php
?>
<!-- Start Content -->
<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <!-- lastProducts -->
        <div class="col-12">
            <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>آخرین محصولات</h2>
            </div>
            <div class="dt-sl">
                <div class="table-responsive">
                    <table class="table table-order table-order-details">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>قیمت واحد</th>
                            <th>تخفیف</th>
                            <th>قیمت فروش</th>
                            <th>موجودی</th>
                            <th>تعداد فروش</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($data['lastProducts'] as $product): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td>
                                    <div class="details-product-area">
                                        <img src="<?= URLRoot ?>/Public/<?= $product->thumbnail ?>"
                                             class="thumbnail-product" alt="">
                                        <h5 class="details-product">
                                            <span style="height: 50px;"><?= $product->title ?></span>
                                        </h5>
                                    </div>
                                </td>
                                <td><?= number_format($product->price) ?> تومان</td>
                                <td><?= $product->has_discount() ? $product->discount_percnet : '0' ?>%</td>
                                <td><?= number_format($product->get_price()) ?> تومان</td>
                                <td><?= $product->stock ?></td>
                                <td><?= $product->sale_count ?></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- bestSellingProducts -->
        <div class="col-12 mt-5">
            <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>پرفروش ترین محصولات</h2>
            </div>
            <div class="dt-sl">
                <div class="table-responsive">
                    <table class="table table-order table-order-details">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>قیمت واحد</th>
                            <th>تخفیف</th>
                            <th>قیمت فروش</th>
                            <th>موجودی</th>
                            <th>تعداد فروش</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($data['bestSellingProducts'] as $product): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td>
                                    <div class="details-product-area">
                                        <img src="<?= URLRoot ?>/Public/<?= $product->thumbnail ?>"
                                             class="thumbnail-product" alt="">
                                        <h5 class="details-product">
                                            <span style="height: 50px;"><?= $product->title ?></span>
                                        </h5>
                                    </div>
                                </td>
                                <td><?= number_format($product->price) ?> تومان</td>
                                <td><?= $product->has_discount() ? $product->discount_percnet : '0' ?>%</td>
                                <td><?= number_format($product->get_price()) ?> تومان</td>
                                <td><?= $product->stock ?></td>
                                <td><?= $product->sale_count ?></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- lastUsers -->
        <div class="col-12 mt-5">
            <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>آخرین کاربران</h2>
            </div>
            <div class="dt-sl">
                <div class="table-responsive">
                    <table class="table table-order table-order-details">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کاربری</th>
                            <th>نام کاربری</th>
                            <th>ایمیل</th>
                            <th>شماره تلفن</th>
                            <th>تاریخ ثبت نام</th>
                            <th>نقش</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($data['lastUsers'] as $user): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td>
                                    <div class="details-product-area text-center">
                                            <span style="height: 20px;color" class="text-center"><?= $user->getFullname() ?></span>
                                    </div>
                                </td>
                                <td> <?= $user->username ?> </td>
                                <td><?= $user->email ?></td>
                                <td><?= !empty($user->phone) ? $user->phone : 'ثبت نشده' ?></td>
                                <td><?= toJalali($user->created_at) ?></td>
                                <td><?= $user->role == 'admin' ? 'مدیر' : 'کاربر' ?></td>

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
