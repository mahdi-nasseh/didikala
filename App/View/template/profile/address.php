<!-- Start Content -->
<div class="col-xl-9 col-lg-8 col-md-8 col-sm-12">
    <div class="row">
        <div class="col-12">
            <div
                    class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
                <h2>آدرس ها</h2>
            </div>
            <div class="dt-sl">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card-horizontal-address">
                            <div class="card-horizontal-address-desc">
                                <p>آدرس: </p>
                                <p>
                                    <?= empty($user->getFullAddress()) ? 'آدرسی ثبت نشده' : $user->getFullAddress() ?>
                                </p>
                            </div>
                            <div class="card-horizontal-address-data">
                                <ul class="card-horizontal-address-methods float-right">
                                    <li class="card-horizontal-address-method">
                                        <i class="mdi mdi-email-outline"></i>
                                        کدپستی :
                                        <span><?= empty($user->zip_code) ? 'کد پستی شما ثبت نشده' : $user->zip_code ?></span>
                                    </li>
                                    <li class="card-horizontal-address-method">
                                        <i class="mdi mdi-cellphone-iphone"></i>
                                        تلفن همراه : <span><?= empty($user->phone) ? '-' : $user->phone ?></span>
                                    </li>
                                </ul>
                                <div class="card-horizontal-address-actions">
                                    <button class="btn-note" data-toggle="modal"
                                            data-target="#modal-location-edit">ویرایش
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->

<!-- Start Modal location edit -->
<div class="modal fade" id="modal-location-edit" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog modal-lg send-info modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    <i class="now-ui-icons location_pin"></i>
                    ویرایش آدرس
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-ui dt-sl">
                            <form class="form-account" action="<?= URLRoot ?>/user/address" method="post">
                                <div class="row">
                                    <!-- country -->
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                کشور
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pr-2 text-right" type="text" name="country"
                                                   value="<?= $user->country ?>"
                                                   placeholder="نام کشور را وارد نمایید">
                                        </div>
                                    </div>
                                    <!-- state -->
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                نام استان خود را وارد کنید
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left" type="text" name="state"
                                                   value="<?= $user->state ?>"
                                                   placeholder="مثلا: تهران">
                                        </div>
                                    </div>
                                    <!-- city -->
                                    <div class="col-md-6 col-sm-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                نام شهر خود را وارد کنید
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left" type="text" name="city"
                                                   value="<?= $user->city ?>"
                                                   placeholder="مثلا: مشهد">
                                        </div>
                                    </div>
                                    <!-- address -->
                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                آدرس پستی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <textarea class="input-ui pr-2 text-right" name="address"
                                                      placeholder=" آدرس تحویل گیرنده را وارد نمایید"><?= $user->address ?></textarea>
                                        </div>
                                    </div>
                                    <!-- zip code -->
                                    <div class="col-12 mb-2">
                                        <div class="form-row-title">
                                            <h4>
                                                کد پستی
                                            </h4>
                                        </div>
                                        <div class="form-row">
                                            <input class="input-ui pl-2 dir-ltr text-left placeholder-right <?= !empty($data['zip_code_err']) ? 'border-danger' : '' ?>"
                                                   value="<?= !empty($data['zip_code_err']) ? $data['zip_code'] : $user->zip_code ?>"
                                                   type="text" placeholder=" کد پستی را بدون خط تیره بنویسید" name="zip_code">
                                        </div>
                                        <p class="text-danger"><?= !empty($data['zip_code_err']) ? $data['zip_code_err'] : '' ?></p>
                                    </div>
                                    <div class="col-12 pr-4 pl-4">
                                        <button type="submit" class="btn btn-sm btn-primary btn-submit-form">ثبت
                                            و
                                            ارسال به این آدرس
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <!-- Google Map Start -->
                        <div class="goole-map">
                            <div id="map-edit" style="height:440px"></div>
                        </div>
                        <!-- Google Map End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal location edit -->