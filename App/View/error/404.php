<?php
global $DIR;
include $DIR.'/App/View/template/header.php';
?>

        <!-- Start main-content -->
        <main class="main-content dt-sl mt-4 mb-3">
            <div class="container main-container">

                <div class="row">
                    <div class="col-12">
                        <div class="dt-sl dt-sn pt-3 pb-5">
                            <div class="error-page text-center">
                                <h1>صفحه‌ای که دنبال آن بودید پیدا نشد!</h1>
                                <a href="<?= URLRoot ?>" class="btn-primary-cm">ادامه خرید در دیدیکالا</a>
                                <img src="<?= AssetsAddress ?>/img/theme/404.svg" class="img-fluid" width="60%" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
        <!-- End main-content -->

<?php
include $DIR.'/App/View/template/footer.php';
?>