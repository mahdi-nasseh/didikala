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
                            <th>نام دسته بندی</th>
                            <th>تعداد پست</th>
                            <th>زیر دسته بندی</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 0;
                        foreach ($data['categories'] as $category): ?>
                            <tr>
                                <td><?= ++$i ?></td>
                                <td>
                                    <div class="details-product-area text-center">
                                        <span style="height: 20px;color"
                                              class="text-center"><?= $category->title ?></span>
                                    </div>
                                </td>
                                <td> <?= $category->posts->count() ?> </td>
                                <td class="<?= $category->parent ? 'text-secondary' : '' ?>"><?= $category->parent  ? $category->parents->title : 'اصلی' ?></td>
                                <td>
                                    <a href="<?= URLRoot ?>/dashboard/editCategory"><i class="mdi mdi-pencil text-success"
                                                                                   style="font-size: 18px"></i></a>
                                    <a href="<?= URLRoot ?>/dashboard/deleteCategory"><i
                                                class="mdi mdi-trash-can-outline text-danger"
                                                style="font-size: 18px"></i></a>

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