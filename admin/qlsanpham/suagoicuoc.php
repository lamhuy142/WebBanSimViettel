<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN GÓI CƯỚC</h6>
        </div>
        <div class="card-body">
            <form method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysuagc">
                <input type="hidden" name="MaGC" value="<?php echo $goicuoc_ht["MaGC"]; ?>">
                <div class="row g-3">
                    <div class="col my-3">
                        <label>Tên Gói Cước</label>
                        <input class="form-control" type="text" name="txtten" required value="<?php echo $goicuoc_ht["Ten"]; ?>">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtdungluong" class="form-label">Dung Lượng</label>
                        <input class="form-control" type="number" name="txtdungluong" value="<?php echo $goicuoc_ht['DungLuong']; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="thoigianhieuluc" class="form-label">Thời Gian Hiệu Lực</label>
                        <input class="form-control" type="date" name="thoigianhieuluc" value="<?php echo $goicuoc_ht['ThoiGianHieuLuc']; ?>">
                    </div>
                </div>
                <div class="md-3 mt-3">
                    <label for="txtmota" class="form-label">Mô tả</label>
                    <textarea id="editor" rows="5" class="form-control" name="txtmota"><?php echo $goicuoc_ht['MoTa']; ?></textarea>
                </div>
                </br>
                <div class="my-3">
                    <a href="index.php?action=sim" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-warning" type="reset" value="Hủy">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>