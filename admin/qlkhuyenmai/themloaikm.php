<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold">THÊM CHƯƠNG TRÌNH KHUYẾN MÃI</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="action" value="xulythemloaikm">

                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtten" class="form-label">Tên </label>
                            <input class="form-control" type="text" name="txtten" required>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng điền tên .</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtdonvi" class="form-label">Đơn Vị</label>
                            <input class="form-control" type="text" name="txtdonvi" required>
                            <div class="valid-feedback">Hợp lệ.</div>
                            <div class="invalid-feedback">Vui lòng điền đơn vị.</div>
                        </div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="opttrangthai" class="form-label">Loại trạng thái</label>
                        <select class="form-control form-select" required name="opttrangthai">
                            <option value="">Chọn loại trạng thái</option>
                            <!-- <php foreach ($trangthai as $t) : ?> -->
                                <!-- <php if ($t['TrangThai'] == 1) { ?> -->
                                    <option value="1">Hoạt Động</option>
                                <!-- <php } elseif ($t['TrangThai'] == 0) { ?> -->
                                    <option value="0">Dừng</option>
                                <!-- <php } ?> -->
                            <!-- <php endforeach; ?> -->
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại thuê bao.</div>
                    </div>
                </div>
                <div class="md-3 mt-3">
                    <a href="index.php?action=danhmuc" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>