<?php
use Didikala\Model\User;
$user = User::find($_SESSION['user_id'])
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
    <title>Welcome Page</title>
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

    <div class="wrapper">

        <!-- Start mini-header -->
        <header class="mini-header pt-4 pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <div class="logo-area-mini-header">
                            <a href="#">
                                <img src="<?= AssetsAddress ?>/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- End mini-header -->

        <!-- Start main-content -->
        <main class="main-content dt-sl mt-4 mb-3">
            <div class="container main-container">

                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 col-12 mx-auto">
                        <div class="form-ui dt-sl dt-sn pt-4"> 
                            <div class="section-title title-wide mb-1 no-after-title-wide">
                                <h2 class="font-weight-bold">به دیدیکالا خوش آمدید</h2>
                            </div>
                            <div class="circle-box-icon">
                                <i class="mdi mdi-account-circle-outline"></i>
                            </div>
                            <h5 class="text-center font-weight-bold">حساب کاربری شما با موفقیت ساخته شد</h5>
                            <div class="message-light">
                                    اکنون می‌توانید به صفحه‌ای که در آن بودید بازگردید و یا با تکمیل اطلاعات حساب کاربری خود به کلیه امکانات و سرویس‌های تاپ کالا و سرویس‌های وابسته به آن دسترسی داشته باشید
                            </div>
                            <div class="text-center mt-5 mb-4">
                                <a href="<?= URLRoot ?>/profile" class="btn-primary-cm btn-with-icon">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    تکمیل حساب کاربری
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <!-- End main-content -->

        <!-- Start mini-footer -->
        <footer class="mini-footer dt-sl">
            <div class="container main-container">
                <div class="row">
                    <div class="col-12">
                        <ul class="mini-footer-menu">
                            <li><a href="#">درباره دیدیکالا</a></li>
                            <li><a href="#">فرصت های شغلی</a></li>
                            <li><a href="#">تماس با ما</a></li>
                            <li><a href="#">همکاری با سازمان ها</a></li>
                        </ul>
                    </div>
                    <div class="col-12 mt-2 mb-3">
                        <div class="footer-light-text">
                            استفاده از مطالب فروشگاه اینترنتی دیدیکالا فقط برای مقاصد غیرتجاری و با ذکر منبع بلامانع است. کلیه حقوق این سایت متعلق به (فروشگاه آنلاین دیدیکالا) می‌باشد.
                        </div>
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