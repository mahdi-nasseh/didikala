<!-- Start Content -->
<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">

    <div class="row">
        <!-- lastProducts -->
        <div class="col-12">
            <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>آخرین محصولات</h2>
                <a href="<?= URLRoot ?>/product/add">
                    افزودن محصول جدید
                </a>
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
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($data['products'] as $product): ?>
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
                                <td><?= $product->has_discount() ? $product->discount_percent : '0' ?>%</td>
                                <td><?= number_format($product->get_price()) ?> تومان</td>
                                <td><?= $product->stock ?></td>
                                <td><?= $product->sale_count ?></td>
                                <td>
                                    <a href="<?= URLRoot ?>/product/edit/<?= $product->ID ?>"><i
                                                class="mdi mdi-pencil text-success" style="font-size: 18px"></i></a>
                                    <a href="<?= URLRoot ?>/product/delete/<?= $product->ID ?>"><i
                                                class="mdi mdi-trash-can-outline text-danger"
                                                style="font-size: 18px"></i></a>
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
<!-- End Content -->
