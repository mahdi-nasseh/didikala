<?php
if (!$data) {
    header("Location:" . URLRoot . "/Error");
}
global $DIR;
include_once "$DIR/App/View/template/header.php";

use Didikala\Model\Comment;
use Didikala\Model\Product;

//get product
$product = Product::with('categories')->find($data['product_id']);
?>
    <!-- Start main-content -->
    <main class="main-content dt-sl mt-4 mb-3">
        <div class="container main-container">
            <!-- Start title - breadcrumb -->
            <div class="title-breadcrumb-special dt-sl mb-3">
                <div class="breadcrumb dt-sl">
                    <nav>
                        <?php foreach ($product->categories as $cat): ?>
                            <a href="#"></a>
                            <a href="#"><?= $cat->title ?></a>
                        <?php endforeach; ?>
                    </nav>
                </div>
            </div>
            <!-- End title - breadcrumb -->

            <!-- Start Product -->
            <div class="dt-sn mb-5 dt-sl">
                <div class="row">
                    <!-- Product Gallery-->
                    <div class="col-lg-4 col-md-6 pb-5 ps-relative">
                        <!-- Product Options-->
                        <ul class="gallery-options">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <?php if ($product->is_liked_by($_SESSION['user_id'])) { ?>
                                    <li>
                                        <a href="<?= URLRoot ?>/product/unlike/<?= $product->ID ?>">
                                            <button class="favorites"><i class="mdi mdi-heart text-danger"></i></button>
                                        </a>
                                        <span class="tooltip-option"> برداشتن از علاقه مندی ها</span>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a href="<?= URLRoot ?>/product/like/<?= $product->ID ?>">
                                            <button><i class="mdi mdi-heart"></i></button>
                                        </a>
                                        <span class="tooltip-option"> افزودن به علاقه مندی ها</span>
                                    </li>
                                <?php }endif; ?>
                        </ul>
                        <?php if ($product->has_discount()): ?>
                            <div class="product-timeout position-relative pt-5 mb-3">
                                <div class="promotion-badge">
                                    فروش ویژه
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="product-gallery">
                            <span class="badge"><?= $product->has_discount() ? $product->discount_percent . '%' : '' ?></span>
                            <div class="product-carousel owl-carousel">
                                <div class="item">
                                    <a class="gallery-item"
                                       href="<?= AssetsAddress ?>/img/single-product/thumbnail-1.jpg"
                                       data-fancybox="gallery1" data-hash="one">
                                        <img src="<?= URLRoot . '/Public/' . $product->thumbnail ?>" alt="Product">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="col-lg-8 col-md-6 pb-5">
                        <div class="product-info dt-sl d-flex flex-column justify-content-around">
                            <div class="product-title dt-sl mb-5">
                                <h1 class="mt-2">
                                    <?= $product->title ?>
                                </h1>
                            </div>
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl mt-5">
                                <h2>قیمت : <span class="price"><?= $product->get_price() ?> تومان</span></h2>
                            </div>
                            <div class="dt-sl mt-4">
                                <a href="<?= URLRoot ?>/cart/add/<?= $product->ID ?>"
                                   class="btn-primary-cm btn-with-icon">
                                    <img src="<?= AssetsAddress ?>/img/theme/shopping-cart.png" alt="">
                                    <?= \Didikala\Model\Cart::has_product_in_cart($product->ID) ? 'افزایش تعداد محصول در سبد خرید' : 'افزودن به سبد خرید' ?>
                                </a>
                                <?php if ($product->stock < 10): ?>
                                    <p class="mt-5 text-danger">فقط <?= $product->stock ?> محصول باقی مانده</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dt-sn mb-5 px-0 dt-sl pt-0">
                <!-- Start tabs -->
                <section class="tabs-product-info mb-3 dt-sl">
                    <div class="ah-tab-wrapper dt-sl">
                        <div class="ah-tab dt-sl">
                            <a class="ah-tab-item" data-ah-tab-active="true" href=""><i
                                        class="mdi mdi-glasses"></i>نقد و بررسی</a>
                            <a class="ah-tab-item" href=""><i
                                        class="mdi mdi-comment-text-multiple-outline"></i>نظرات کاربران</a>
                        </div>
                    </div>
                    <div class="ah-tab-content-wrapper product-info px-4 dt-sl">
                        <div class="ah-tab-content dt-sl" data-ah-tab-active="true">
                            <div class="section-title text-sm-title title-wide no-after-title-wide mb-0 dt-sl">
                                <h2>نقد و بررسی</h2>
                            </div>
                            <div class="product-title dt-sl">
                                <h1 class="mb-4"><?= $product->title ?>
                                </h1>
                            </div>
                            <div class="description-product dt-sl mt-3 mb-3">
                                <div class="container">
                                    <p><?= $product->content ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="ah-tab-content dt-sl">

                            <div class="section-title title-wide no-after-title-wide dt-sl">
                                <h2>دیدگاه ها</h2>
                                <p class="count-comment"><?= isset($_SESSION['user_id']) ? 'دیدگاه خود را درمورد محصول مطرح کنید' : 'برای ثبت دیدگاه ابتدا وارد حساب خود شوید' ?></p>
                            </div>
                            <?php if (isset($_SESSION['user_id'])): ?>
                            <div class="form-question-answer dt-sl mb-3">
                                <form action="<?= URLRoot ?>/comment/add/<?= $product->ID ?>" method="post">
                                    <textarea
                                            class="form-control mb-3 text-dark <?= isset($data['content_err']) ? 'border-danger' : '' ?>"
                                            rows="5" name="content">
                                        <?= isset($data['content']) ? $data['content'] : '' ?>
                                    </textarea>
                                    <p class="text-danger"><?= isset($data['content_err']) ? $data['content_err'] : '' ?></p>
                                    <p class="text-success"><?= isset($data['message']) ? $data['message'] : '' ?></p>
                                    <button type="submit" class="btn btn-dark float-right ml-3">ثبت دیدگاه</button>
                                </form>
                                <?php endif; ?>
                            </div>

                            <div class="comments-area default">
                                <div class="section-title text-sm-title title-wide no-after-title-wide mt-5 mb-0 dt-sl">
                                    <h2>دیدگاه ها</h2>
                                    <?php $comments = Comment::where('product_id', '=', $product->ID)->where('status', '=', 'accept')->get() ?>
                                    <p class="count-comment"><?= count($comments) ?> دیدگاه</p>
                                </div>
                                <ol class="comment-list">
                                    <!-- #comment-## -->
                                    <?php foreach ($comments as $comment): ?>
                                        <li>
                                            <div class="comment-body">
                                                <div class="comment-author">
                                                    <span class="icon-comment">?</span>
                                                    <cite class="fn"><?= $comment->user->username ?></cite>
                                                    <span class="says">گفت:</span>
                                                    <div class="commentmetadata">
                                                        <a>
                                                          <?= toJalaliWithTime($comment->created_at) ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <p>
                                                   <?= $comment->content ?>
                                                </p>

                                                <div class="reply"><a class="comment-reply-link" href="#">پاسخ</a></div>
                                            </div>
                                            <?php if ($comment->replies->count() > 0): ?>
                                                <ol class="children">
                                                    <li>
                                                        <div class="comment-body">
                                                            <div class="comment-author">
                                                            <span
                                                                    class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                                <cite class="fn">بهرامی راد</cite> <span
                                                                        class="says">گفت:</span>
                                                                <div class="commentmetadata">
                                                                    <a href="#">
                                                                        اسفند ۲۰, ۱۳۹۶ در ۹:۴۷ ب.ظ
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <p>لورم ایپسوم متن ساختگی با تولید سادگی
                                                                نامفهوم از صنعت چاپ و با استفاده از
                                                                طراحان گرافیک است.
                                                                چاپگرها و متون بلکه روزنامه و مجله در
                                                                ستون و سطرآنچنان که لازم است و برای
                                                                شرایط فعلی تکنولوژی
                                                                مورد نیاز و کاربردهای متنوع با هدف بهبود
                                                                ابزارهای کاربردی می باشد.</p>

                                                            <div class="reply"><a class="comment-reply-link"
                                                                                  href="#">پاسخ</a></div>
                                                        </div>
                                                        <ol class="children">
                                                            <li>
                                                                <div class="comment-body">
                                                                    <div class="comment-author">
                                                                        <span class="icon-comment">?</span>
                                                                        <cite class="fn">محمد</cite>
                                                                        <span class="says">گفت:</span>
                                                                        <div class="commentmetadata">
                                                                            <a href="#">
                                                                                خرداد ۳۰, ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <p>عالیه</p>

                                                                    <div class="reply"><a class="comment-reply-link"
                                                                                          href="#">پاسخ</a></div>
                                                                </div>
                                                                <ol class="children">
                                                                    <li>
                                                                        <div class="comment-body">
                                                                            <div class="comment-author">
                                                                            <span
                                                                                    class="icon-comment mdi mdi-lightbulb-on-outline"></span>
                                                                                <cite class="fn">اشکان</cite>
                                                                                <span class="says">گفت:</span>
                                                                                <div class="commentmetadata">
                                                                                    <a href="#">
                                                                                        خرداد ۳۰, ۱۳۹۷ در ۸:۵۳ ق.ظ
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <p>لورم ایپسوم متن ساختگی با
                                                                                تولید سادگی نامفهوم از
                                                                                صنعت چاپ و با استفاده از
                                                                                طراحان
                                                                                گرافیک است. چاپگرها و
                                                                                متون بلکه روزنامه و مجله
                                                                                در ستون و سطرآنچنان که
                                                                                لازم است و
                                                                                برای شرایط فعلی تکنولوژی
                                                                                مورد نیاز و کاربردهای
                                                                                متنوع با هدف بهبود
                                                                                ابزارهای
                                                                                کاربردی می باشد.</p>

                                                                            <div class="reply"><a
                                                                                        class="comment-reply-link"
                                                                                        href="#">پاسخ</a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <!-- #comment-## -->
                                                                </ol>
                                                                <!-- .children -->
                                                            </li>
                                                            <!-- #comment-## -->
                                                        </ol>
                                                        <!-- .children -->
                                                    </li>
                                                    <!-- #comment-## -->
                                                </ol>
                                            <?php endif; ?>
                                            <!-- .children -->
                                        </li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End tabs -->
            </div>
            <!-- End Product -->


        </div>
    </main>
    <!-- End main-content -->
    <script>
        setTimeout(function () {
            <?php
            $product->view += 1;
            $product->save();
            ?>
        }, 10000)
    </script>
<?php
include "$DIR/App/View/template/footer.php";
?>