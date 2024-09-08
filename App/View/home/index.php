<?php
global $DIR;

use Didikala\Model\Product;

include($DIR . '/App/View/template/header.php'); ?>

<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">

        <!-- Start Main-Slider -->
        <div class="row mb-5">
            <div class="col-12 order-1 order-lg-2">
                <!-- Start main-slider -->
                <section id="main-slider" class="main-slider carousel slide carousel-fade card hidden-sm"
                         data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#main-slider" data-slide-to="1"></li>
                        <li data-target="#main-slider" data-slide-to="2"></li>
                        <li data-target="#main-slider" data-slide-to="3"></li>
                        <li data-target="#main-slider" data-slide-to="4"></li>
                        <li data-target="#main-slider" data-slide-to="5"></li>
                        <li data-target="#main-slider" data-slide-to="6"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a class="main-slider-slide" href="#"
                               style="background-image: url(<?= AssetsAddress ?>/img/main-slider/1.jpg)">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#"
                               style="background-image: url(<?= AssetsAddress ?>/img/main-slider/2.jpg)">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#"
                               style="background-image: url(<?= AssetsAddress ?>/img/main-slider/3.jpg)">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#"
                               style="background-image: url(<?= AssetsAddress ?>/img/main-slider/4.jpg)">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#"
                               style="background-image: url(<?= AssetsAddress ?>/img/main-slider/5.jpg)">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#"
                               style="background-image: url(<?= AssetsAddress ?>/img/main-slider/6.jpg)">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#"
                               style="background-image: url(<?= AssetsAddress ?>/img/main-slider/7.jpg)">
                            </a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#main-slider" role="button" data-slide="prev">
                        <i class="mdi mdi-chevron-right"></i>
                    </a>
                    <a class="carousel-control-next" href="#main-slider" data-slide="next">
                        <i class="mdi mdi-chevron-left"></i>
                    </a>
                </section>
                <section id="main-slider-res"
                         class="main-slider carousel slide carousel-fade card d-none show-sm" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#main-slider-res" data-slide-to="0" class="active"></li>
                        <li data-target="#main-slider-res" data-slide-to="1"></li>
                        <li data-target="#main-slider-res" data-slide-to="2"></li>
                        <li data-target="#main-slider-res" data-slide-to="3"></li>
                        <li data-target="#main-slider-res" data-slide-to="4"></li>
                        <li data-target="#main-slider-res" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a class="main-slider-slide" href="#">
                                <img src="<?= AssetsAddress ?>/img/main-slider/slider-responsive/1.jpg" alt=""
                                     class="img-fluid">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#">
                                <img src="<?= AssetsAddress ?>/img/main-slider/slider-responsive/2.jpg" alt=""
                                     class="img-fluid">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#">
                                <img src="<?= AssetsAddress ?>/img/main-slider/slider-responsive/3.jpg" alt=""
                                     class="img-fluid">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#">
                                <img src="<?= AssetsAddress ?>/img/main-slider/slider-responsive/4.jpg" alt=""
                                     class="img-fluid">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#">
                                <img src="<?= AssetsAddress ?>/img/main-slider/slider-responsive/5.jpg" alt=""
                                     class="img-fluid">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a class="main-slider-slide" href="#">
                                <img src="<?= AssetsAddress ?>/img/main-slider/slider-responsive/6.jpg" alt=""
                                     class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#main-slider-res" role="button" data-slide="prev">
                        <i class="mdi mdi-chevron-right"></i>
                    </a>
                    <a class="carousel-control-next" href="#main-slider-res" data-slide="next">
                        <i class="mdi mdi-chevron-left"></i>
                    </a>
                </section>
                <!-- End main-slider -->
            </div>
        </div>
        <!-- End Main-Slider -->

        <!-- Start Product-Slider -->
        <div class="row">
            <div class="col-12">
                <section class="slider-section dt-sl mb-5">
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="section-title text-sm-title title-wide no-after-title-wide">
                                <h2>پر فروش ترین ها</h2>
                                <!--                                    <a href="#">مشاهده همه</a>-->
                            </div>
                        </div>
                        <?php $productsSales = Product::limit(10)->orderBy('sale_count','desc')->get() ?>
                        <!-- Start Product-Slider -->
                        <div class="col-12 px-res-0">
                            <div class="product-carousel carousel-md owl-carousel owl-theme">
                                <?php foreach ($productsSales as $product): ?>
                                    <div class="item">
                                        <div class="product-card">
                                            <div class="product-head">
                                                <div class="discount">
                                                    <?php if($product->has_discount()): ?>
                                                    <span><?= $product->discount_percent ?>%</span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <a class="product-thumb mt-3" href="<?= URLRoot ?>/product_list/product/<?= $product->ID ?>" class="">
                                                <img src="<?= URLRoot ?>/Public/<?= $product->thumbnail ?>"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="<?= URLRoot ?>/Public/<?= $product->thumbnail ?>"><?= $product->title ?></a>
                                                </h5>
                                                <a class="product-meta" href="<?= URLRoot ?>/porduct_list/product/<?= $product->ID ?>"></a>
                                                <span class="product-price"><?= number_format($product->get_price()) ?> تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- End Product-Slider -->

                    </div>
                </section>
            </div>
        </div>
        <!-- End Product-Slider -->

        <!-- Start Banner -->
        <div class="row mt-3 mb-5">
            <div class="col-sm-6 col-12 mb-2">
                <div class="widget-banner">
                    <a href="#">
                        <img src="<?= AssetsAddress ?>/img/banner/medium-banner-1.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-sm-6 col-12 mb-2">
                <div class="widget-banner">
                    <a href="#">
                        <img src="<?= AssetsAddress ?>/img/banner/medium-banner-2.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Start Banner -->
        <div class="row mt-3 mb-5">
            <div class="col-md-3 col-sm-6 col-6 mb-2">
                <div class="widget-banner">
                    <a href="#">
                        <img src="<?= AssetsAddress ?>/img/banner/small-banner-5.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 mb-2">
                <div class="widget-banner">
                    <a href="#">
                        <img src="<?= AssetsAddress ?>/img/banner/small-banner-6.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 mb-2">
                <div class="widget-banner">
                    <a href="#">
                        <img src="<?= AssetsAddress ?>/img/banner/small-banner-7.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-6 mb-2">
                <div class="widget-banner">
                    <a href="#">
                        <img src="<?= AssetsAddress ?>/img/banner/small-banner-8.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Start Category-Section -->
        <div class="row mt-3 mb-5">
            <div class="col-12">
                <div class="category-section dt-sn dt-sl">
                    <div class="category-section-title dt-sl">
                        <h3>بیش از ۱،۵۰۰،۰۰۰ کالا در دسته‌بندی‌های مختلف</h3>
                    </div>
                    <div class="category-section-slider dt-sl">
                        <div class="category-slider owl-carousel">
                            <div class="item">
                                <a href="#" class="promotion-category">
                                    <img src="<?= AssetsAddress ?>/img/category/notebook-computer.png" alt="">
                                    <h4 class="promotion-category-name">کالای دیجیتال</h4>
                                    <h6 class="promotion-category-quantity">۱۵۶۰۰۰ کالا</h6>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="promotion-category">
                                    <img src="<?= AssetsAddress ?>/img/category/lifeline-in-a-heart-outline.png"
                                         alt="">
                                    <h4 class="promotion-category-name">آرایشی، بهداشتی و سلامت</h4>
                                    <h6 class="promotion-category-quantity">۴۸۰۰۰ کالا</h6>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="promotion-category">
                                    <img src="<?= AssetsAddress ?>/img/category/repair-tools.png" alt="">
                                    <h4 class="promotion-category-name">خودرو،ابزار و اداری</h4>
                                    <h6 class="promotion-category-quantity">۵۶۰۰۰ کالا</h6>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="promotion-category">
                                    <img src="<?= AssetsAddress ?>/img/category/hanbok.png" alt="">
                                    <h4 class="promotion-category-name">مد و پوشاک</h4>
                                    <h6 class="promotion-category-quantity">۲۱۷۰۰۰ کالا</h6>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="promotion-category">
                                    <img src="<?= AssetsAddress ?>/img/category/sofa.png" alt="">
                                    <h4 class="promotion-category-name">خانه و آشپزخانه</h4>
                                    <h6 class="promotion-category-quantity">۲۲۹۰۰۰ کالا</h6>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="promotion-category">
                                    <img src="<?= AssetsAddress ?>/img/category/school-material.png" alt="">
                                    <h4 class="promotion-category-name">لوازم تحریر و هنر</h4>
                                    <h6 class="promotion-category-quantity">۸۶۰۰۰ کالا</h6>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="promotion-category">
                                    <img src="<?= AssetsAddress ?>/img/category/baby-girl.png" alt="">
                                    <h4 class="promotion-category-name">کودک و نوزاد</h4>
                                    <h6 class="promotion-category-quantity">۳۲۰۰۰ کالا</h6>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="promotion-category">
                                    <img src="<?= AssetsAddress ?>/img/category/adventurer.png" alt="">
                                    <h4 class="promotion-category-name">ورزش و سفر</h4>
                                    <h6 class="promotion-category-quantity">۱۵۰۰۰ کالا</h6>
                                </a>
                            </div>
                            <div class="item">
                                <a href="#" class="promotion-category">
                                    <img src="<?= AssetsAddress ?>/img/category/restaurant-cutlery-circular-symbol-of-a-spoon-and-a-fork-in-a-circle.png"
                                         alt="">
                                    <h4 class="promotion-category-name">خوردنی و آشامیدنی</h4>
                                    <h6 class="promotion-category-quantity">۲۲۰۰۰ کالا</h6>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Category-Section -->

        <!-- Start Product-Slider -->
        <section class="slider-section dt-sl mb-5">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="section-title text-sm-title title-wide no-after-title-wide">
                        <h2>جدیدترین محصولات</h2>
                    </div>
                </div>

                <!-- Start Product-Slider -->
                <div class="col-12">
                    <div class="product-carousel carousel-lg owl-carousel owl-theme">
                        <?php $lastProducts = Product::limit(10)->orderBy('created_at','desc')->get() ?>
                        <?php foreach($lastProducts as $product): ?>
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <?php if ($product->has_discount()): ?>
                                    <div class="discount">
                                        <span><?= $product->discount_price ?>>%</span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <a class="product-thumb" href="<?= URLRoot ?>/product_list/product/<?= $product->ID ?>">
                                    <img src="<?= URLRoot ?>/Public/<?= $product->thumbnail ?>" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="<?= URLRoot ?>/Public/<?= $product->thumbnail ?>"><?= $product->title ?></a>
                                    </h5>
                                    <span class="product-price"><?= number_format($product->get_price()) ?> تومان</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- End Product-Slider -->

            </div>
        </section>
        <!-- End Product-Slider -->

        <!-- Start Banner -->
        <div class="row mt-3 mb-5">
            <div class="col-12">
                <div class="widget-banner">
                    <a href="#">
                        <img src="<?= AssetsAddress ?>/img/banner/large-banner.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Start Product-Slider -->
        <section class="slider-section dt-sl mb-5">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="section-title text-sm-title title-wide no-after-title-wide">
                        <h2>فروش ویژه</h2>
                    </div>
                </div>

<!--                 Start Product-Slider -->
                <div class="col-12">
                    <div class="product-carousel carousel-lg owl-carousel owl-theme">
                        <?php $offersProduct = Product::limit(10)->orderBy('discount_percent','desc')->get() ?>
                        <?php foreach ($offersProduct as $product): ?>
                        <div class="item">
                            <div class="product-card mb-3">
                                <div class="product-head">
                                    <?php if($product->has_discount()): ?>
                                    <div class="discount">
                                        <span>20%</span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <a class="product-thumb mt-4" href="<?= URLRoot ?>/product_list/product/<?= $product->ID ?>">
                                    <img src="<?= URLRoot ?>/Public/<?= $product->thumbnail ?>" alt="Product Thumbnail">
                                </a>
                                <div class="product-card-body">
                                    <h5 class="product-title">
                                        <a href="<?= URLRoot ?>/product_list/product/<?= $product->ID ?>"><?= $product->title ?></a>
                                    </h5>
                                    <span class="product-price"><?= $product->get_price() ?> تومان</span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- End Product-Slider -->

            </div>
        </section>
        <!-- End Product-Slider -->


        <!-- Start Brand-Slider -->
        <section class="slider-section dt-sl mb-5">
            <div class="row">
                <!-- Start Product-Slider -->
                <div class="col-12">
                    <div class="brand-slider carousel-lg owl-carousel owl-theme">
                        <div class="item">
                            <img src="<?= AssetsAddress ?>/img/brand/1076.png" class="img-fluid" alt="">
                        </div>
                        <div class="item">
                            <img src="<?= AssetsAddress ?>/img/brand/1078.png" class="img-fluid" alt="">
                        </div>
                        <div class="item">
                            <img src="<?= AssetsAddress ?>/img/brand/1080.png" class="img-fluid" alt="">
                        </div>
                        <div class="item">
                            <img src="<?= AssetsAddress ?>/img/brand/2315.png" class="img-fluid" alt="">
                        </div>
                        <div class="item">
                            <img src="<?= AssetsAddress ?>/img/brand/1086.png" class="img-fluid" alt="">
                        </div>
                        <div class="item">
                            <img src="<?= AssetsAddress ?>/img/brand/5189.png" class="img-fluid" alt="">
                        </div>
                        <div class="item">
                            <img src="<?= AssetsAddress ?>/img/brand/1000006973.png" class="img-fluid" alt="">
                        </div>
                        <div class="item">
                            <img src="<?= AssetsAddress ?>/img/brand/1000014452.jpg" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
                <!-- End Product-Slider -->

            </div>
        </section>
        <!-- End Brand-Slider -->

    </div>
</main>
<!-- End main-content -->


<?php include($DIR . '/App/View/template/footer.php'); ?>;


