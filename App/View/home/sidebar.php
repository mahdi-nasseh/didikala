<!-- side bar start -->
<div class="dt-sl dt-sn mb-3">
    <div class="profile-menu-section dt-sl">
        <div class="label-profile-menu mt-2 mb-2">
            <span>حساب کاربری شما</span>
        </div>
        <div class="profile-menu">
            <ul>
                <li>
                    <a href="<?= URLRoot ?>/user/profile"
                       class="<?= isset($data['profile']) ? 'active' : '' ?>">
                        <i class="mdi mdi-account-circle-outline"></i>
                        پروفایل
                    </a>
                </li>
                <li>
                    <a href="<?= URLRoot ?>/user/orders"
                       class="<?= isset($data['orders']) ? 'active' : '' ?>">
                        <i class="mdi mdi-basket"></i>
                        همه سفارش ها
                    </a>
                </li>
                <li>
                    <a href="<?= URLRoot ?>/user/likes" class="<?= isset($data['likes']) ? 'active' : '' ?>">
                        <i class="mdi mdi-heart-outline"></i>
                        لیست علاقمندی ها
                    </a>
                </li>
                <li>
                    <a href="<?= URLRoot ?>/user/comments" class="<?= isset($data['comments']) ? 'active' : '' ?>">
                        <i class="mdi mdi-glasses"></i>
                        نقد و نظرات
                    </a>
                </li>
                <li>
                    <a href="<?= URLRoot ?>/user/address" class="<?= isset($data['address']) ? 'active' : '' ?>">
                        <i class="mdi mdi-sign-direction"></i>
                        آدرس ها
                    </a>
                </li>
                <li>
                    <a href="<?= URLRoot ?>/user/edit" class="<?= isset($data['edit']) ? 'active' : '' ?>">
                        <i class="mdi mdi-account-edit-outline"></i>
                        اطلاعات شخصی
                    </a>
                </li>
                <?php if ($user->role == 'admin'): ?>
                    <li>
                        <hr>
                    </li>
                    <li>
                        <a href="<?= URLRoot ?>/dashboard"
                           class="<?= isset($data['dashboard']) ? 'active' : '' ?>">
                            <i class="mdi mdi-home"></i>
                            داشبورد
                        </a>
                    </li>
                    <li>
                        <a href="<?= URLRoot ?>/dashboard/users"
                           class="<?= isset($data['users']) ? 'active' : '' ?>">
                            <i class="mdi mdi-account-circle-outline"></i>
                            کاربران
                        </a>
                    </li>
                    <li>
                        <a href="<?= URLRoot ?>/dashboard/products"
                           class="<?= isset($data['products']) ? 'active' : '' ?>">
                            <i class="mdi mdi-cart"></i>
                            محصولات
                        </a>
                    </li>
                    <li>
                        <a href="<?= URLRoot ?>/dashboard/orders"
                           class="<?= isset($data['dashboardOrders']) ? 'active' : '' ?>">
                            <i class="mdi mdi-basket"></i>
                            سفارشات
                        </a>
                    </li>
                    <li>
                        <a href="<?= URLRoot ?>/dashboard/categories"
                           class="<?= isset($data['categories']) ? 'active' : '' ?>">
                            <i class="mdi mdi-alpha-c"></i>
                            دسته بندی ها
                        </a>
                    </li> <li>
                        <a href="<?= URLRoot ?>/dashboard/comments"
                           class="<?= isset($data['dashboardComments']) ? 'active' : '' ?>">
                            <i class="mdi mdi-comment"></i>
                            کامنت ها
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>
</div>
</div>
<!-- End Sidebar -->