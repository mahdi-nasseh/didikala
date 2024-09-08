<!-- Start Content -->
<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <div class="col-12">
            <div
                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>علاقمندی ها</h2>
            </div>
            <div class="dt-sl">
                <div class="row">
                    <?php

                    use Didikala\Model\Product;

                    $likedPosts = Product::whereHas('likes', function ($query) use ($user) {
                        $query->where('user_id', $user->ID);
                    })->orderBy('created_at', 'desc')->get();
                    foreach ($likedPosts as $likedPost) :
                    ?>
                    <div class="col-lg-6 col-md-12">
                        <div class="card-horizontal-product">
                            <div class="card-horizontal-product-thumb">
                                <a href="#">
                                    <img src="<?= URLRoot ?>/Public/<?= $likedPost->thumbnail ?>" alt="">
                                </a>
                            </div>
                            <div class="card-horizontal-product-content">
                                <div class="card-horizontal-product-title">
                                    <a href="<?= URLRoot ?>/product_list/product/<?= $likedPost->ID ?>">
                                        <h3><?= $likedPost->title ?></h3>
                                    </a>
                                </div>
                                <div class="card-horizontal-product-price">
                                    <span><?= $likedPost->get_price() ?> تومان</span>
                                </div>
                                <div class="card-horizontal-product-buttons">
                                    <a href="<?= URLRoot ?>/product_list/product/<?= $likedPost->ID ?>" class="btn">مشاهده محصول</a>
                                   <a href="<?= URLRoot?>/profile/unlike/<?= $likedPost->ID ?>"> <button class="remove-btn">
                                        <i class="mdi mdi-trash-can-outline"></i>
                                    </button></a>
                                    <?php if($likedPost->stock <= 0 ): ?>
                                    <span class="label-card-horizontal-product">ناموجود</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
