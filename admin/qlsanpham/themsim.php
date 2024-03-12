<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">THÊM SIM</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulythem">

                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="optphanloai" class="form-label">Loại sim</label>
                        <select class="form-control form-select" name="optphanloai">
                            <?php foreach ($loai as $l) : ?>
                                <option value="<?php echo $l['id']; ?>"><?php echo $l['tenloai']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txttenmp" class="form-label">Tên mỹ phẩm</label>
                        <input class="form-control" type="text" name="txttenmp" placeholder="Nhập tên">
                        <div class="invalid-feedback">
                            Không được để trống
                        </div>
                    </div>

                    <div class="col md-3 mt-3">
                        <label for="txtthuonghieu" class="form-label">Thương hiệu</label>
                        <input class="form-control" type="text" name="txtthuonghieu" placeholder="Nhập thương hiệu">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtgianhap" class="form-label">Giá nhập</label>
                        <input class="form-control" type="number" name="txtgianhap" value="0">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtgiaban" class="form-label">Giá bán</label>
                        <input class="form-control" type="number" name="txtgiaban" value="0">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtsoluongton" class="form-label">Số lượng</label>
                        <input class="form-control" type="number" name="txtsoluongton" value="0"></input>
                    </div>
                </div>
                <div class="md-3 mt-3">
                    <label for="txtmota" class="form-label">Mô tả</label>
                    <textarea id="ckeditor5 editor" rows="5" class="form-control ckeditor5" name="txtmota" placeholder="Nhập mô tả" required=""></textarea>
                </div>
                <div class="md-3 mt-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
        </div>

        </form>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>