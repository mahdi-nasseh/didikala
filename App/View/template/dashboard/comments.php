<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <!-- lastUsers -->
        <div class="col-12 mt-5">
            <div
                class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2> کاربران</h2>
            </div>
            <div class="dt-sl">
                <div class="table-responsive">
                    <table class="table table-order table-order-details">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کاربری</th>
                            <th>نام کاربری</th>
                            <th>ایمیل</th>
                            <th>شماره تلفن</th>
                            <th>تاریخ ثبت نام</th>
                            <th>نقش</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($data['users'] as $user): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td>
                                    <div class="details-product-area text-center">
                                        <span style="height: 20px;color" class="text-center"><?= $user->getFullname() ?></span>
                                    </div>
                                </td>
                                <td> <?= $user->username ?> </td>
                                <td><?= $user->email ?></td>
                                <td><?= !empty($user->phone) ? $user->phone : 'ثبت نشده' ?></td>
                                <td><?= toJalali($user->created_at) ?></td>
                                <td><?= $user->role == 'admin' ? 'مدیر' : 'کاربر' ?></td>
                                <td>
                                    <a href="<?= URLRoot ?>/dashboard/editUser"><i class="mdi mdi-pencil text-success" style="font-size: 18px"></i></a>
                                    <?php if($user->role != 'admin'): ?>
                                        <a href="<?= URLRoot ?>/dashboard/deleteUser"><i class="mdi mdi-trash-can-outline text-danger" style="font-size: 18px"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>