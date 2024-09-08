<?php
global $DIR;
include($DIR . '/App/View/template/header.php');


?>

    <!-- Start main-content -->
    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <?php if($data == 'empty'): ?>
                <h1 class="text-center">محصولی وجود ندارد</h1>
            <?php else: ?>
            <div class="row">
                <!-- Start Content -->
                <div class="col-sm-12 search-card-res">
                    <div class="dt-sl dt-sn px-0 search-amazing-tab">
                        <!-- Tab -->
                        <div class="ah-tab-wrapper dt-sl">
                            <div class="ah-tab dt-sl">
                                <a class="ah-tab-item" data-ah-tab-active="true" href="">جدیدترین</a>
                                <a class="ah-tab-item" href="">پربازدید ترین</a>
                                <a class="ah-tab-item" href="">جدید ترین</a>
                                <a class="ah-tab-item" href="">پرفروش ترین</a>
                                <a class="ah-tab-item" href="">ارزان ترین</a>
                                <a class="ah-tab-item" href="">گران ترین</a>
                            </div>
                        </div>

                        <!-- body -->
                        <div class="ah-tab-content-wrapper dt-sl px-res-0">
                            <div class="ah-tab-content dt-sl" data-ah-tab-active="true">

                                <div class="row mb-3 mx-0 px-res-0">
                                    <?php foreach ($data['posts'] as $post): ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0" >
                                            <div class="product-card mb-2 mx-res-0" style="height: 400px">
                                                <?php if ($post->has_discount()): ?>
                                                    <div class="promotion-badge">
                                                        فروش ویژه
                                                    </div>
                                                    <div class="product-head mb-4">
                                                        <div class="discount">
                                                            <span><?= $post->discount_percent ?>%</span>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <a class="product-thumb" href="<?= URLRoot ?>/product_list/product/<?= $post->ID ?>">
                                                    <img src="<?= URLRoot ?>/Public/<?= $post->thumbnail ?>"
                                                         alt="Product Thumbnail">
                                                </a>
                                                <div class="product-card-body">
                                                    <h5 class="product-title">
                                                        <a href="<?= URLRoot ?>/product_list/product/<?= $post->ID ?>"><?= $post->title ?>></a>
                                                    </h5>
                                                    <a class="product-meta" href="shop-categories.html"><?= @$data['category']->title ?></a>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <span class="product-price"><?= $post->get_price() ?> تومان</span>
                                                        <del class="product-price text-secondary mx-1 <?= $post->has_discount() ? '' : 'd-none' ?>"
                                                             style="font-size: 12px"><?= $post->price ?> تومان</del>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <!-- pagination -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination">
                                            <a href="#" class="prev"><i
                                                        class="mdi mdi-chevron-double-right"></i></a>
                                            <a href="#">1</a>
                                            <a href="#" class="active-page">2</a>
                                            <a href="#">3</a>
                                            <a href="#">4</a>
                                            <a href="#">...</a>
                                            <a href="#">7</a>
                                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/010.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">170,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/07.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/017.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/019.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">54,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/013.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">135,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/09.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">145,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/011.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/018.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">59,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/020.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination">
                                            <a href="#" class="prev"><i
                                                        class="mdi mdi-chevron-double-right"></i></a>
                                            <a href="#">1</a>
                                            <a href="#" class="active-page">2</a>
                                            <a href="#">3</a>
                                            <a href="#">4</a>
                                            <a href="#">...</a>
                                            <a href="#">7</a>
                                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/017.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/013.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">135,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/09.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">145,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/010.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">170,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/018.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">59,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/011.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/07.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/020.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/019.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">54,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination">
                                            <a href="#" class="prev"><i
                                                        class="mdi mdi-chevron-double-right"></i></a>
                                            <a href="#">1</a>
                                            <a href="#" class="active-page">2</a>
                                            <a href="#">3</a>
                                            <a href="#">4</a>
                                            <a href="#">...</a>
                                            <a href="#">7</a>
                                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/018.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">59,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/07.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/017.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/011.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/020.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/019.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">54,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/013.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">135,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/09.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">145,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/010.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">170,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination">
                                            <a href="#" class="prev"><i
                                                        class="mdi mdi-chevron-double-right"></i></a>
                                            <a href="#">1</a>
                                            <a href="#" class="active-page">2</a>
                                            <a href="#">3</a>
                                            <a href="#">4</a>
                                            <a href="#">...</a>
                                            <a href="#">7</a>
                                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/07.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/017.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/010.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">170,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/011.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/013.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">135,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/018.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">59,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/020.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/019.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">54,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/09.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">145,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination">
                                            <a href="#" class="prev"><i
                                                        class="mdi mdi-chevron-double-right"></i></a>
                                            <a href="#">1</a>
                                            <a href="#" class="active-page">2</a>
                                            <a href="#">3</a>
                                            <a href="#">4</a>
                                            <a href="#">...</a>
                                            <a href="#">7</a>
                                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ah-tab-content dt-sl">
                                <div class="row mb-3 mx-0 px-res-0">
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/09.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">145,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/010.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">170,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/011.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/018.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">59,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="promotion-badge">
                                                فروش ویژه
                                            </div>
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                                <div class="discount">
                                                    <span>20%</span>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/07.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">157,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/020.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/019.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">تیشرت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">54,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/017.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">کت مردانه</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس مردانه</a>
                                                <span class="product-price">199,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 px-10 mb-1 px-res-0">
                                        <div class="product-card mb-2 mx-res-0">
                                            <div class="product-head">
                                                <div class="rating-stars">
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star active"></i>
                                                    <i class="mdi mdi-star"></i>
                                                </div>
                                            </div>
                                            <a class="product-thumb" href="shop-single.html">
                                                <img src="<?= AssetsAddress ?>/img/products/013.jpg"
                                                     alt="Product Thumbnail">
                                            </a>
                                            <div class="product-card-body">
                                                <h5 class="product-title">
                                                    <a href="shop-single.html">مانتو زنانه مدل هودی تیک تین</a>
                                                </h5>
                                                <a class="product-meta" href="shop-categories.html">لباس زنانه</a>
                                                <span class="product-price">135,000 تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination">
                                            <a href="#" class="prev"><i
                                                        class="mdi mdi-chevron-double-right"></i></a>
                                            <a href="#">1</a>
                                            <a href="#" class="active-page">2</a>
                                            <a href="#">3</a>
                                            <a href="#">4</a>
                                            <a href="#">...</a>
                                            <a href="#">7</a>
                                            <a href="#" class="next"><i class="mdi mdi-chevron-double-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Content -->
            </div>
            <?php endif; ?>

        </div>
    </main>
    <!-- End main-content -->

<?php
include $DIR . '/App/View/template/footer.php';
?>