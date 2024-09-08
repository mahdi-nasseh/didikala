<div class="col-md-9 col-sm-12 mx-auto">
    <div class="px-3 px-res-0">
        <div
            class="section-title text-sm-title title-wide mb-1 no-after-title-wide dt-sl mb-2 px-res-1">
            <h2>اضافه کردن پست جدید</h2>
        </div>
        <div class="form-ui additional-info dt-sl dt-sn pt-4">
            <form action="<?= URLRoot ?>/product/edit/<?= $data['product_id'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-row-title">
                    <h3>عنوان</h3>
                </div>
                <div class="form-row">
                    <input type="text" class="input-ui pr-2" placeholder="عنوان محصول را وارد نمایید"
                           value="<?= $data['title'] ?>" name="title">
                </div>
                <div class="form-row-title">
                    <h3>توضیحات</h3>
                </div>
                <div class="form-row">
                    <textarea class="input-ui pr-2" placeholder="توضیحات محصول را وارد نمایید" name="content">
                        <?= $data['content'] ?>
                    </textarea>
                </div>
                <div class="form-row-title">
                    <h3>قیمت</h3>
                </div>
                <div class="form-row">
                    <input type="text" class="input-ui pl-2 text-left dir-ltr" name="price"
                           placeholder="قیمت را وارد نمایید" value="<?= $data['price'] ?>">
                </div>
                <div class="form-row-title">
                    <h3>موجودی</h3>
                </div>
                <div class="form-row">
                    <input type="text" class="input-ui pl-2 text-left dir-ltr"
                           placeholder="موجودی محصول را وارد نمایید" value="<?= $data['stock'] ?>" name="stock">
                </div>
                <div class="form-row-title">
                    <h3>عکس پروفایل</h3>
                </div>
                <div class="form-row mt-2">
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input <?= isset($data['thumbnail_err']) ? 'border-danger' : '' ?>"
                                   id="inputGroupFile04" name="thumbnail" required
                                   aria-describedby="inputGroupFileAddon04">
                            <label class="custom-file-label" for="inputGroupFile04">انتخاب
                                عکس</label>
                        </div>
                    </div>
                    <p class="text-danger mt-2">لطفا عکس را انتخاب کنید</p>
                </div>
                <div class="dt-sl">
                    <div class="form-row mt-3 justify-content-center">
                        <button class="btn-primary-cm btn-with-icon ml-2">
                            <i class="mdi mdi-account-circle-outline"></i>
                            ثبت اطلاعات محصول
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

