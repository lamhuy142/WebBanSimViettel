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
                        <label for="optloaisim" class="form-label">Loại Sim</label>
                        <select class="form-control form-select" name="optloaisim">
                            <?php foreach ($loaisim as $l) : ?>
                                <option value="<?php echo $l['MaLS']; ?>"><?php echo $l['TenLS']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtsosim" class="form-label">Số Sim</label>
                        <input class="form-control" type="text" name="txtsosim" placeholder="Nhập số sim">
                        <div class="invalid-feedback">
                            Không được để trống
                        </div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtmota" class="form-label">Mô Tả</label>
                        <input class="form-control" id="editor" type="text" name="txtmota" placeholder="Nhập mô tả">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtgiagoc" class="form-label">Giá Gốc</label>
                        <input class="form-control" type="number" name="txtgiagoc" value="0">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtgiaban" class="form-label">Giá bán</label>
                        <input class="form-control" type="number" name="txtgiaban" value="0">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txttinhtrang" class="form-label">Trạng Thái</label>
                        <input class="form-control" type="number" name="txttinhtrang" value="1" disabled>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtsosim" class="form-label">Hình Ảnh</label>
                        <input type="file" class="form-control" name="fileanh"></input>
                    </div>
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