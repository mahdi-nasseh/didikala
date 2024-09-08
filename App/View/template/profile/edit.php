<!-- Start Content -->
<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <div class="col-md-10 col-sm-12 mx-auto">
            <div class="px-3 px-res-0">
                <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                    <h2>ویرایش اطلاعات شخصی</h2>
                </div>
                <div class="form-ui additional-info dt-sl dt-sn pt-4">
                    <form action="<?= URLRoot ?>/user/edit" method="post">
                        <div class="form-row-title">
                            <h3>نام</h3>
                        </div>
                        <div class="form-row">
                            <input type="text" class="input-ui pr-2" placeholder="نام خود را وارد نمایید" value="<?= $data['name'] ?>" name="name">
                        </div>
                        <div class="form-row-title">
                            <h3>نام خانوادگی</h3>
                        </div>
                        <div class="form-row">
                            <input type="text" class="input-ui pr-2" placeholder="نام خانوادگی خود را وارد نمایید" value="<?= $data['family'] ?>" name="family">
                        </div>
                        <div class="form-row-title">
                            <h3>نام کاربری</h3>
                        </div>
                        <div class="form-row">
                            <input type="text" class="input-ui pl-2 text-left dir-ltr <?= !empty($data['username_err']) ? 'border-danger' : '' ?>" placeholder="-" value="<?= $data['username'] ?>" name="username">
                        </div>
                        <p class="text-danger"><?= $data['username_err'] ?></p>
                     <!-- phone -->
                        <div class="form-row-title">
                            <h3>شماره موبایل</h3>
                        </div>
                        <div class="form-row">
                            <input type="text" class="input-ui pl-2 text-left dir-ltr <?= !empty($data['phone_err']) ? 'border-danger' : '' ?>" name="phone"
                                   placeholder="شماره موبایل خود را وارد نمایید" value="<?= $data['phone']?>">
                        </div>
                        <p class="text-danger"><?= $data['phone_err'] ?></p>

                        <div class="dt-sl">
                            <div class="form-row mt-3 justify-content-center">
                                <button class="btn-primary-cm btn-with-icon ml-2">
                                    <i class="mdi mdi-account-circle-outline"></i>
                                    ثبت اطلاعات کاربری
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->