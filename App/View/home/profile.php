<?php global $DIR;
include($DIR . '/App/View/template/header.php');

use Didikala\Model\User;

//get user
$user = User::find($_SESSION['user_id']);
?>
<!-- Start main-content -->
<main class="main-content dt-sl mt-4 mb-3">
    <div class="container main-container">
        <div class="row">

            <!-- Start Sidebar -->
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-12 sticky-sidebar">
                <div class="profile-sidebar dt-sl">
                    <div class="dt-sl dt-sn mb-3">
                        <div class="profile-sidebar-header dt-sl">
                            <div class="profile-avatar float-right">
                                <img src="<?= AssetsAddress ?>/img/theme/avatar.png" alt="">
                            </div>
                            <div class="profile-header-content mr-3 mt-2 float-right">
                                <span class="d-block profile-username"><?= $user->username ?></span>
                                <span class="d-block profile-phone"><?= $user->email ?></span>
                            </div>
                            <div class="profile-link mt-2 dt-sl">
                                <div class="row">
                                    <div class="col-6 text-center">
                                        <a href="<?= URLRoot ?>/user/editPassword">
                                            <i class="mdi mdi-lock-reset"></i>
                                            <span class="d-block">تغییر رمز</span>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="<?= URLRoot ?>/user/logout">
                                            <i class="mdi mdi-logout-variant"></i>
                                            <span class="d-block">خروج از حساب</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidBar -->
                    <?php include 'sidebar.php'; ?>
                    <!-- end SidBar-->

                    <!-- profile -->
                    <?php if (isset($data['profile'])): ?>
                        <?php include "$DIR/App/View/template/profile/profile.php"; ?>
                    <?php endif; ?>
                    <!-- end Profile-->

                    <!-- Orders -->
                    <?php if (isset($data['orders'])):
                    include "$DIR/App/View/template/profile/order.php";
                    elseif(isset($data['order_detail'])):
                        include "$DIR/App/View/template/profile/order-detail.php";
                    endif;
                    ?>
                    <!-- end Orders -->


                    <!-- Likes -->
                    <?php
                    if (isset($data['likes'])):
                    include "$DIR/App/View/template/profile/likes.php";
                    endif;
                    ?>
                    <!-- end Likes -->


                    <!-- Comments -->
                    <?php
                    if (isset($data['comments'])):
                        include "$DIR/App/View/template/profile/Comment.php";
                    endif;
                    ?>
                    <!-- end Comments -->

                    <!-- address -->
                    <?php
                    if (isset($data['address'])):
                        include "$DIR/App/View/template/profile/address.php";
                    endif;
                    ?>
                    <!-- end address -->

                    <!-- edit personal info -->
                    <?php
                    if (isset($data['edit'])):
                        include "$DIR/App/View/template/profile/edit.php";
                    endif;
                    ?>
                    <!-- end edit personal info -->

                    <!-- Admin Part -->
                    <!-- dashboard -->
                    <?php
                    if (isset($data['dashboard'])):
                        include "$DIR/App/View/template/dashboard/dashboard.php";
                    endif;
                    ?>
                    <!-- end dashboard -->

                    <!-- users -->
                    <?php
                    if (isset($data['users'])):
                        include "$DIR/App/View/template/dashboard/users.php";
                    endif;
                    ?>
                    <!-- end users -->

                    <!-- products -->
                    <?php
                    if (isset($data['products'])):
                        include "$DIR/App/View/template/dashboard/products.php";
                    endif;
                    ?>
                    <!-- end users -->

                    <!-- orders -->
                    <?php
                    if (isset($data['dashboardOrders'])):
                        include "$DIR/App/View/template/dashboard/orders.php";
                    elseif(isset($data['dashboard_detail_order'])):
                        include "$DIR/App/View/template/dashboard/order-detail.php";
                    endif;
                    ?>
                    <!-- end orders -->

                    <!-- categories -->
                    <?php
                    if (isset($data['categories'])):
                        include "$DIR/App/View/template/dashboard/categories.php";
                    endif;
                    ?>
                    <!-- end categories -->

                    <!-- comments -->
                    <?php
                    if (isset($data['dashboardComments'])):
                    include "$DIR/App/View/template/dashboard/comments.php";
                    endif;
                    ?>
                    <!-- end comments -->

                    <!-- add product -->
                    <?php
                    if (isset($data['add_post'])):
                    include "$DIR/App/View/template/dashboard/add_product.php";
                    endif;
                    ?>
                    <!-- end add product -->

                    <!-- edit product -->
                    <?php
                    if (isset($data['edit_post'])):
                        include "$DIR/App/View/template/dashboard/edit_post.php";
                    endif;
                    ?>
                    <!-- end edit product -->

                </div>
            </div>
</main>
<!-- End main-content -->

<?php include($DIR . '/App/View/template/footer.php'); ?>;