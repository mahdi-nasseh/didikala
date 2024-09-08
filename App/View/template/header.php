<?php
global $DIR;
include_once $DIR . '/App/init.php';
use Didikala\Model\Category;

$categories = Category::with('children')->where('parent', '=', 0)->get();
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
    <title>Index Page</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/vendor/bootstrap.min.css">
    <!-- Plugins -->
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/vendor/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/vendor/jquery.horizontalmenu.css">
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/vendor/materialdesignicons.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/main.css">
    <link rel="stylesheet" href="<?= AssetsAddress ?>/css/colors/default.css" id="colorswitch">
</head>

<body>

<div class="wrapper">

    <!-- Start header -->
    <header class="main-header js-fixed-topbar dt-sl">

        <!-- Start topbar -->
        <div class="container main-container">
            <div class="topbar dt-sl">
                <div class="row">
                    <div class="col-lg-2 col-md-3 col-6">
                        <div class="logo-area float-right">
                            <a href="<?= URLRoot ?>">
                                <img src="<?= AssetsAddress ?>/img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 hidden-sm">
                        <div class="search-area dt-sl">
                            <form action="<?= URLRoot ?>/product_list/search/" class="search" method="post">
                                <input type="text"
                                       placeholder="نام کالا، برند و یا دسته مورد نظر خود را جستجو کنید…"
                                       name="keyword">
                                <button type="submit"><img src="<?= AssetsAddress ?>/img/theme/search.png" alt="">
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 col-6 topbar-left">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <ul class="nav float-left">
                                <li class="nav-item account dropdown">
                                    <a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <span class="label-dropdown">حساب کاربری</span>
                                        <i class="mdi mdi-account-circle-outline"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-left">
                                        <a class="dropdown-item" href="<?= URLRoot ?>/profile">
                                            <i class="mdi mdi-account-card-details-outline"></i>پروفایل
                                        </a>
                                        <a class="dropdown-item" href="<?= URLRoot ?>/user/editProfile">
                                            <i class="mdi mdi-account-edit-outline"></i>ویرایش حساب کاربری
                                        </a>
                                        <div class="dropdown-divider" role="presentation"></div>
                                        <a class="dropdown-item" href="<?= URLRoot ?>/user/logout">
                                            <i class="mdi mdi-logout-variant"></i>خروج
                                        </a>
                                    </div>
                                </li>
                            </ul
                        <?php else: ?>
                            <ul class="nav float-left">
                                <li class="nav-item account dropdown">
                                    <a class="nav-link" href="<?= URLRoot ?>/user/login">
                                        <span class="label-dropdown">ورود / عضویت</span>
                                        <i class="mdi mdi-account-circle-outline"></i>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End topbar -->

        <!-- Start bottom-header -->
        <div class="bottom-header dt-sl mb-sm-bottom-header">
            <div class="container main-container">
                <!-- Start Main-Menu -->
                <nav class="main-menu dt-sl">
                    <ul class="list float-right hidden-sm">
                        <!-- mega menu 2 column -->
                        <?php foreach ($categories as $category): ?>
                            <li class="list-item <?= $category->children->count() > 0 ? 'list-item-has-children' : '' ?> mega-menu mega-menu-col-3">
                                <a class="nav-link"
                                   href="<?= URLRoot ?>/product_list/category/<?= $category->ID ?>"><?= $category->title ?></a>
                                <?php if ($category->children->count() > 0): ?>
                                    <ul class="sub-menu nav">
                                        <li class="list-item list-item-has-children">
                                            <ul class="sub-menu nav">
                                                <?php foreach ($category->children as $child): ?>
                                                    <li class="list-item">
                                                        <a class="nav-link"
                                                           href="<?= URLRoot ?>/product_list/category/<?= $child->ID ?>"><?= $child->title ?></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </li>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <ul class="nav float-left">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLRoot ?>/cart" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <span class="label-dropdown">سبد خرید</span>
                                <i class="mdi mdi-cart-outline"></i>
                                <?php if (\Didikala\Model\Cart::has_cart()): ?>
                                <span class="count"><?= count($_SESSION['cart']) ?></span>
                                <?php endif; ?>
                            </a>
                            <div class="dropdown-menu cart dropdown-menu-sm dropdown-menu-left">
                                <div class="dropdown-header">سبد خرید</div>
                                <div class="dropdown-list-icons">
                                    <?php if (isset($_SESSION['cart'])):  $i = 0; ?>
                                        <?php foreach ($_SESSION['cart'] as $cart): $i++; if($i == 3)break;?>
                                        <?php $product = \Didikala\Model\Product::find($cart['ID']) ?>
                                            <a href="<?= URLRoot ?>/cart" class="dropdown-item">
                                                <div class="dropdown-item-icon">
                                                    <img src="<?= URLRoot ?>/Public/<?= $product->thumbnail ?>" alt="">
                                                </div>
                                                <div class="mr-3">
                                                    <p><?= mb_substr($product->title,0,30) ?>...</p>
                                                    <div class="pt-1"><?= number_format($cart['sale_price']) ?> تومان</div>
                                                </div>
                                                <button class="remove"><i class="mdi mdi-close"></i></button>
                                            </a>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <hr>
                                <div class="dropdown-footer text-center">
                                    <div class="dt-sl mb-3">
                                        <span class="float-right">جمع :</span>
                                        <span class="float-left"><?= number_format(\Didikala\Model\Cart::get_total_sale_price()) ?> تومان</span>
                                    </div>
                                    <a href="<?= URLRoot ?>/cart" class="btn btn-success">مشاهده سبد خرید</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <button class="btn-menu">
                        <div class="align align__justify">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    <div class="side-menu">
                        <div class="logo-nav-res dt-sl text-center">
                            <a href="#">
                                <img src="<?= AssetsAddress ?>/img/logo.png" alt="">
                            </a>
                        </div>
                        <div class="search-box-side-menu dt-sl text-center mt-2 mb-3">
                            <form action="">
                                <input type="text" name="s" placeholder="جستجو کنید...">
                                <i class="mdi mdi-magnify"></i>
                            </form>
                        </div>
                        <ul class="navbar-nav dt-sl">
                            <li class="sub-menu">
                                <a href="#">کالای دیجیتال</a>
                                <ul>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="#">بهداشت و سلامت</a>
                                <ul>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sub-menu">
                                <a href="#">ابزار و اداری</a>
                                <ul>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li>
                                        <a href="#">عنوان دسته</a>
                                    </li>
                                    <li class="sub-menu">
                                        <a href="#">عنوان دسته</a>
                                        <ul>
                                            <li>
                                                <a href="#">زیر منو یک</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو دو</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو سه</a>
                                            </li>
                                            <li>
                                                <a href="#">زیر منو چهار</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">مد و پوشاک</a>
                            </li>
                            <li>
                                <a href="#">خانه و آشپزخانه</a>
                            </li>
                            <li>
                                <a href="#">ورزش و سفر</a>
                            </li>
                        </ul>
                    </div>
                    <div class="overlay-side-menu">
                    </div>
                </nav>
                <!-- End Main-Menu -->
            </div>
        </div>
        <!-- End bottom-header -->
    </header>
    <!-- End header -->