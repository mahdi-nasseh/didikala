<?php
use Didikala\Model\Product;

?>
<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <div class="col-xl-6 col-lg-12">
            <div class="px-3">
                <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                    <h2>اطلاعات شخصی</h2>
                </div>
                <div class="profile-section dt-sl">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="label-info">
                                <span>نام کاربری:</span>
                            </div>
                            <div class="value-info">
                                <span><?= $user->username ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="label-info">
                                <span>پست الکترونیک:</span>
                            </div>
                            <div class="value-info">
                                <span><?= $user->email ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="label-info">
                                <span>نام و نام خانوداگی:</span>
                            </div>
                            <div class="value-info">
                                <span><?= is_null($user->name) ? '-' : $user->getFullName() ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="label-info">
                                <span>شماره تلفن:</span>
                            </div>
                            <div class="value-info">
                                <span><?= is_null($user->phone) ? '-' : $user->phone ?></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="label-info">
                                <span>کد پستی:</span>
                            </div>
                            <div class="value-info">
                                <span><?= is_null($user->zip_code) ? '-' : $user->zip_code ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="profile-section-link">
                        <a href="<?= URLRoot ?>/user/editProfile" class="border-bottom-dt">
                            <i class="mdi mdi-account-edit-outline"></i>
                            ویرایش اطلاعات شخصی
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-12">
            <div class="px-3">
                <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2">
                    <h2>لیست آخرین علاقه‌مندی‌ها</h2>
                </div>
                <div class="profile-section dt-sl">
                    <ul class="list-favorites">
                        <?php $likedPosts = Product::whereHas('likes', function ($query) use ($user) {
                            $query->where('user_id', $user->ID);
                        })->orderBy('created_at', 'desc')->limit(3)->get();
                        ?>
                        <?php foreach ($likedPosts as $post): ?>
                            <li>
                                <a href="<?= URLRoot ?>/product_list/product/<?= $post->ID ?>">
                                    <img src="<?= URLRoot ?>/Public/<?= $post->thumbnail ?>" alt="">
                                    <span><?= mb_substr($post->title, 0, 45) ?>...</span>
                                </a>
                                <a href="<?= URLRoot ?>/profile/unlike/<?= $post->ID ?>">
                                    <button>
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </button>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="profile-section-link">
                        <a href="<?= URLRoot ?>/user/likes" class="border-bottom-dt">
                            <i class="mdi mdi-square-edit-outline"></i>
                            مشاهده و ویرایش لیست مورد علاقه
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div
                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>آخرین سفارش‌ها</h2>
            </div>
            <div class="dt-sl">
                <div class="table-responsive">
                    <table class="table table-order">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>شماره سفارش</th>
                            <th>تاریخ ثبت سفارش</th>
                            <th>مبلغ قابل پرداخت</th>
                            <th>مبلغ کل</th>
                            <th>عملیات پرداخت</th>
                            <th>جزییات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $orders = $user->orders()->limit(3)->orderBy('created_at', 'desc')->get();
                        ?>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td> <?= $order->order_items->count() ?> </td>
                                <td><?= $order->reference_id ?></td>
                                <td><?= toJalaliWithTime($order->created_at)  ?></td>
                                <td><?= number_format($order->total) ?></td>
                                <td><?= number_format($order->subtotal) ?> تومان</td>
                                <td><?= $order->status == 'complete' ? 'کامل شده' : 'لقو شده' ?></td>
                                <td class="details-link">
                                    <a href="#">
                                        <i class="mdi mdi-chevron-left"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="link-to-orders" colspan="7"><a href="<?= URLRoot ?>/user/orders">مشاهده
                                    لیست سفارش
                                    ها</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>