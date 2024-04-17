<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN LOẠI SIM</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysuals">
                <input type="hidden" name="MaLS" value="<?php echo $loaisim_ht["MaLS"]; ?>">
                <div class="row g-3">
                    <div class="col my-3">
                        <label for="txttenloaisim" class="form-label">Tên loại sim</label>
                        <input class="form-control" type="text" name="txttenloaisim" value="<?php echo $loaisim_ht['TenLS']; ?>">
                    </div>
                    <div class="col my-3">
                        <label>Loại gói cước</label>
                        <select class="form-control" name="optloaigoicuoc">
                            <?php foreach ($goicuoc as $gc) { ?>
                                <option value="<?php echo $gc["MaGC"]; ?>" <?php if ($gc["MaGC"] == $loaisim_ht["MaGC"]) echo "selected"; ?>><?php echo $gc["Ten"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtgiagoc" class="form-label">Giá Gốc</label>
                        <input class="form-control" type="number" name="giagoc" value="<?php echo $loaisim_ht['GiaGoc']; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtgiaban" class="form-label">Giá Bán</label>
                        <input class="form-control" type="number" name="giaban" value="<?php echo $loaisim_ht['GiaBan']; ?>">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtluotmua" class="form-label">Lượt mua</label>
                        <input class="form-control" type="number" name="txtluotmua" required value="<?php echo $loaisim_ht['LuotMua']; ?>">
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập thời hạn của loại sim.</div>
                    </div>
                </div>
                </br>
                <div class="my-3">
                    <a href="index.php?action=loaisim" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input class="btn btn-primary" type="submit" value="Lưu">
                    <input class="btn btn-warning" type="reset" value="Hủy">
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>