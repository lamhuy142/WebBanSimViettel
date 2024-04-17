<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">SỬA THÔNG TIN SIM</h6>
        </div>
        <div class="card-body">
            <form class="was-validated" method="post" action="index.php" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulysua">
                <input type="hidden" name="MaSim" value="<?php echo $sim_ht["MaSim"]; ?>">
                <div class="row g-3">
                    <div class="col my-3">
                        <label for="optloaisim" class="form-label">Loại sim</label>
                        <select class="form-control form-select" required name="optloaisim">
                            <option value="">Chọn loại sim</option>
                            <?php foreach ($loai as $l) {
                                if ($l["TrangThai"] == 0) { ?>
                                    <option class="text-danger" <?php if (isset($LoaiSim)) if ($LoaiSim == $l['MaLS']) echo 'selected' ?> value="<?php echo $l["MaLS"]; ?>" <?php if ($l["MaLS"] == $sim_ht["MaLS"]) echo "selected"; ?>><?php echo $l["TenLS"]; ?></option>
                                <?php }else{ ?>
                                    <option <?php if (isset($LoaiSim)) if ($LoaiSim == $l['MaLS']) echo 'selected' ?> value="<?php echo $l["MaLS"]; ?>" <?php if ($l["MaLS"] == $sim_ht["MaLS"]) echo "selected"; ?>><?php echo $l["TenLS"]; ?></option>

                               <?php } ?>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại sim.</div>
                    </div>
                    <!-- LOẠI THUÊ BAO -->
                    <div class="col md-3 mt-3">
                        <label for="optloaithuebao" class="form-label">Loại thuê bao</label>
                        <select class="form-control form-select" required name="optloaithuebao">
                            <option value="">Chọn loại thuê bao</option>
                            <?php foreach ($loaithuebao as $tb) : ?>
                                <option <?php if (isset($ThueBao)) if ($ThueBao == $tb['LoaiThueBao']) {
                                            echo 'selected value=' . $tb['LoaiThueBao'];
                                        } ?> value="<?php echo $tb['LoaiThueBao']; ?>" <?php if ($tb['LoaiThueBao'] == $sim_ht['LoaiThueBao']) echo 'selected'; ?>>
                                    <?php echo $tb['LoaiThueBao'] == 1 ? 'Thuê Bao Trả Trước' : 'Thuê Bao Trả Sau'; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">Vui lòng chọn loại thuê bao.</div>
                    </div>

                    <div class="col my-3">
                        <label>Số Sim</label>
                        <input class="form-control" type="text" name="txtsosim" required value="<?php echo $sim_ht["SoSim"]; ?>">
                        <div class="valid-feedback">Hợp lệ.</div>
                        <div class="invalid-feedback">Vui lòng nhập số.</div>
                    </div>
                </div>
                <div class="md-1 mt-1">
                    <label for="txttinhtrang" class="form-label">Trạng Thái</label>
                    <input class="form-control" name="txttinhtrang" value="<?php echo $sim_ht['TinhTrang']; ?>" readonly></input>
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