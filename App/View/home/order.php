<?php
use Didikala\Model\Order;
$order = Order::find($data);
?>
<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#f7858d">
    <meta name="msapplication-navbutton-color" content="#f7858d">
    <meta name="apple-mobile-web-app-status-bar-style" content="#f7858d">
    <title>Shopping-complete-buy Page</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/vendor/bootstrap.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/vendor/jquery.horizontalmenu.css">
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/vendor/nouislider.min.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/vendor/materialdesignicons.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/main.css">
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/colors/default.css" id="colorswitch">
</head>

<body>

    <div class="wrapper shopping-page">

        <!-- Start header-shopping -->
        <header class="header-shopping dt-sl">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center pt-2">
                        <div class="header-shopping-logo dt-sl">
                            <a href="<?= URLRoot ?>">
                                <img src="<?= AssetsAddress ?>/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <ul class="checkout-steps">
                            <li>
                                <a href="#" class="active">
                                    <span>اطلاعات ارسال</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#" class="active">
                                    <span>پرداخت</span>
                                </a>
                            </li>
                            <li class="active">
                                <a href="#" class="active">
                                    <span>اتمام خرید و ارسال</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- End header-shopping -->

        <!-- Start main-content -->
        <main class="main-content dt-sl mt-4 mb-3">
            <div class="container main-container">

                <div class="row">
                    <div class="cart-page-content col-12 px-0">
                        <div class="checkout-alert dt-sn mb-4">
                            <div class="circle-box-icon successful">
                                <i class="mdi mdi-check-bold"></i>
                            </div>
                            <div class="checkout-alert-title">
                                <h4> سفارش <span
                                        class="checkout-alert-highlighted checkout-alert-highlighted-success"><?= $order->reference_id ?></span>
                                    با موفقیت در سیستم ثبت شد.
                                </h4>
                            </div>
                        </div>
                        <section class="checkout-details dt-sl dt-sn mt-4 pt-2 pb-3 pr-3 pl-3 mb-5 px-res-1">
                            <div class="checkout-details-title">
                                <h4>
                                    کد سفارش:
                                    <span>
                                        <?= $order->reference_id    ?>
                                    </span>
                                </h4>
                                <div class="row">
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <div class="checkout-details-title">
                                            <p>
                                                سفارش شما با موفقیت در سیستم ثبت شد و هم اکنون
                                                <span class="text-highlight text-highlight-success">تکمیل شده</span>
                                                است.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 px-res-0">
                                        <div class="checkout-table">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <p>
                                                        نام تحویل گیرنده:
                                                        <span>
                                                            جلال بهرامی راد
                                                        </span></p>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <p>
                                                        شماره تماس :
                                                        <span>
                                                            ۰۹۰۳۰۸۱۳۷۴۲
                                                        </span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <p>
                                                        تعداد مرسوله :
                                                        <span>
                                                            ۱
                                                        </span></p>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <p>
                                                        مبلغ کل:
                                                        <span>
                                                            <?= number_format($order->total) ?> تومان
                                                        </span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <p>
                                                        روش پرداخت:
                                                        <span>
                                                            پرداخت اینترنتی
                                                            <span class="green">
                                                                (موفق)
                                                            </span></span></p>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <p>
                                                        وضعیت سفارش:
                                                        <span>
                                                            پرداخت شد
                                                        </span></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <p>آدرس : استان خراسان شمالی
                                                        ، شهربجنورد، خراسان شمالی-بجنورد</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>

                </div>

            </div>
        </main>
        <!-- End main-content -->

        <!-- Start mini-footer -->
        <footer class="mini-footer dt-sl">
            <div class="container main-container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 text-left">
                        <i class="mdi mdi-phone-outline"></i>
                        شماره تماس : <a href="#">
                            ۶۱۹۳۰۰۰۰
                            - ۰۲۱
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <i class="mdi mdi-email-outline"></i>
                        آدرس ایمیل : <a href="#">info@gmail.com</a>
                    </div>
                    <div class="col-12 text-center mt-2">
                        <p class="text-secondary text-footer">
                            استفاده از کارت هدیه یا کد تخفیف، درصفحه ی پرداخت امکان پذیر است.
                        </p>
                    </div>
                    <div class="col-12 text-center">
                        <div class="copy-right-mini-footer">
                            Copyright © 2019 Didikala
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End mini-footer -->

    </div>

    <!-- colorPanel -->
    <div id="colorswitch-option">
        <button><i class="mdi mdi-settings"></i></button>
        <ul>
            <li class="active" data-path="<?= AssetsAddress ?>/css/colors/default.css"><span style="background-color: #f7858d;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/amber-color.css"><span style="background-color: #ffab00;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/blue-color.css"><span style="background-color: #2979ff;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/blue-grey-color.css"><span style="background-color: #607d8b;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/brown-color.css"><span style="background-color: #795548;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/cyan-color.css"><span style="background-color: #00bcd4;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/green-color.css"><span style="background-color: #4caf50;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/indigo-color.css"><span style="background-color: #3f51b5;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/lime-color.css"><span style="background-color: #cddc39;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/orange-color.css"><span style="background-color: #ff9800;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/red-color.css"><span style="background-color: #f44336;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/teal-color.css"><span style="background-color: #009688;"></span></li>
            <li data-path="<?= AssetsAddress ?>/css/colors/purple-color.css"><span style="background-color: #9c27b0;"></span></li>
        </ul>
    </div>
    <!-- end colorPanel -->


    <!-- Core JS Files -->
    <script src="<?= AssetsAddress ?>/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="<?= AssetsAddress ?>/js/vendor/popper.min.js"></script>
    <script src="<?= AssetsAddress ?>/js/vendor/bootstrap.min.js"></script>
    <!-- Plugins -->
    <script src="<?= AssetsAddress ?>/js/vendor/owl.carousel.min.js"></script>
    <script src="<?= AssetsAddress ?>/js/vendor/jquery.horizontalmenu.js"></script>
    <script src="<?= AssetsAddress ?>/js/vendor/nouislider.min.js"></script>
    <script src="<?= AssetsAddress ?>/js/vendor/wNumb.js"></script>
    <script src="<?= AssetsAddress ?>/js/vendor/ResizeSensor.min.js"></script>
    <script src="<?= AssetsAddress ?>/js/vendor/theia-sticky-sidebar.min.js"></script>
    <!-- Main JS File -->
    <script src="<?= AssetsAddress ?>/js/main.js"></script>
</body>

</html>