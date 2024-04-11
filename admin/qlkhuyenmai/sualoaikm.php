<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN </h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="action" value="xulysualoaikm">
                <input type="hidden" name="MaLKM" value="<?php echo $loai_ht['MaLKM'] ?>">
                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtten" class="form-label">Tên</label>
                            <input class="form-control" type="text" name="txtten" value="<?php echo $loai_ht['TenLKM'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtdonvi" class="form-label">Đơn vị</label>
                            <input class="form-control" type="text" name="txtdonvi" value="<?php echo $loai_ht['DonViKM'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="opttrangthai" class="form-label">Trạng Thái</label>
                            <select class="form-select" name="opttrangthai">
                                <option value="">Chọn loại trạng thái</option>
                                    <option value="<?php echo $loai_ht["TrangThai"]; ?>" <?php if ($loai_ht["TrangThai"] == 1) echo "selected"; ?>>Hoạt Động</option>
                                    <option value="<?php echo $loai_ht["TrangThai"]; ?>" <?php if ($loai_ht["TrangThai"] == 0) echo "selected"; ?>>Dừng</option>
                            </select>
                        </div>
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