<?php
global $DIR;

use Didikala\Model\Cart;

include $DIR . '/App/View/template/header.php';
?>

<?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
    <!-- Start main-content -->
    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <div class="tab-content" id="nav-tabContent">
                <!--cart items-->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                     aria-labelledby="nav-home-tab">
                    <div class="row">
                        <?php foreach ($_SESSION['cart'] as $cart): ?>
                            <?php $product = \Didikala\Model\Product::find($cart['ID']) ?>
                            <div class="col-xl-9 col-lg-8 col-12 px-0">
                                <div class="table-responsive checkout-content dt-sl">
                                    <div class="checkout-header checkout-header--express">
                                        <span class="checkout-header-extra-info"></span><span><?= $cart['quantity'] ?>کالا</span>
                                    </div>
                                    <table class="table table-cart">
                                        <tbody>
                                        <tr class="checkout-item">
                                            <td>
                                                <img class="mr-4" src="<?= URLRoot ?>/Public/<?= $product->thumbnail ?>"
                                                     alt=""
                                                     width="100px">
                                                <a href="<?= URLRoot ?>/cart/remove/<?= $product->ID ?>"><button class="checkout-btn-remove">&times;</button></a>
                                            </td>
                                            <td class="text-right">
                                                <a href="<?= URLRoot ?>/product_list/product/<?= $product->ID ?>">
                                                    <h3 class="checkout-title">
                                                        <?= $product->title ?>
                                                    </h3>
                                                </a>
                                            </td>
                                            <!--item quantity -->
                                            <td>
                                                <p class="mb-0">تعداد</p>
                                                <p><?= $cart['quantity'] ?></p>
                                            </td>
                                            <!--item price-->
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <?php if ($product->has_discount()): ?>
                                                        <del class="text-secondary ml-3"
                                                             style="font-size: 12px"><?= number_format($product->price) ?>
                                                            تومان
                                                        </del>
                                                    <?php endif; ?>
                                                    <strong style="font-size: 16px"><?= number_format($product->get_price()) ?>
                                                        تومان</strong>
                                                </div>
                                            </td>
                                            <!-- total item price-->
                                            <td>
                                                <div class="d-flex flex-column">
                                                    <?php if ($product->has_discount()): ?>
                                                        <del class="text-secondary ml-3"
                                                             style="font-size: 12px"><?= number_format(Cart::get_total_item_price($product)) ?>
                                                            تومان
                                                        </del>
                                                    <?php endif; ?>
                                                    <strong style="font-size: 16px"><?= number_format(Cart::get_total_item_sale_price($product)) ?>
                                                        تومان</strong>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="col-xl-3 col-lg-4 col-12 w-res-sidebar sticky-sidebar">
                            <div class="dt-sn mb-2">
                                <ul class="checkout-summary-summary">
                                    <li>
                                        <span>مبلغ کل (<?= count($_SESSION['cart']) ?> کالا)</span><span><?= number_format(Cart::get_total_price()) ?> تومان</span>
                                    </li>
                                    <li>
                                        <span>درصد تخفیف کل: <?= Cart::get_total_discount_percent() ?></span>
                                    </li>
                                </ul>
                                   <hr>
                                <div class="checkout-summary-content">
                                    <div class="checkout-summary-price-title">مبلغ قابل پرداخت:</div>
                                    <div class="checkout-summary-price-value">
                                        <span class="checkout-summary-price-value-amount"><?= number_format(Cart::get_total_sale_price()) ?></span>
                                        تومان
                                    </div>
                                    <a href="<?= URLRoot ?>/order/add" class="mb-2 d-block">
                                        <button class="btn-primary-cm btn-with-icon w-100 text-center pr-0">
                                            <i class="mdi mdi-arrow-left"></i>
                                            ادامه ثبت سفارش
                                        </button>
                                    </a>
                                    <div>
                                                    <span>
                                                        کالاهای موجود در سبد شما ثبت و رزرو نشده‌اند، برای ثبت سفارش
                                                        مراحل بعدی را تکمیل کنید.
                                                    </span><span class="help-sn" data-toggle="tooltip" data-html="true"
                                                                 data-placement="bottom"
                                                                 title="<div class='help-container is-right'><div class='help-arrow'></div><p class='help-text'>محصولات موجود در سبد خرید شما تنها در صورت ثبت و پرداخت سفارش برای شما رزرو می‌شوند. در صورت عدم ثبت سفارش، دیجی‌کالا هیچگونه مسئولیتی در قبال تغییر قیمت یا موجودی این کالاها ندارد.</p></div>">
                                                        <span class="mdi mdi-information-outline"></span>
                                                    </span></div>
                                </div>
                            </div>
                            <div class="dt-sn checkout-feature-aside pt-4">
                                <ul>
                                    <li class="checkout-feature-aside-item">
                                        <img src="<?= AssetsAddress ?>/img/svg/return-policy.svg" alt="">
                                        هفت روز ضمانت تعویض
                                    </li>
                                    <li class="checkout-feature-aside-item">
                                        <img src="<?= AssetsAddress ?>/img/svg/payment-terms.svg" alt="">
                                        پرداخت در محل با کارت بانکی
                                    </li>
                                    <li class="checkout-feature-aside-item">
                                        <img src="<?= AssetsAddress ?>/img/svg/delivery.svg" alt="">
                                        تحویل اکسپرس
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- End main-content -->
<?php else: ?>
    <div class="mb-5 invisible"> _</div>
    <h1 class="text-center">سبد خرید شما خالی است</h1>
<?php endif; ?>

<?php
include $DIR . '/App/View/template/footer.php';
?>