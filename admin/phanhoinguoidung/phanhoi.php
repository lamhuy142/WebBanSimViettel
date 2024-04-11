<?php include("../inc/top.php"); ?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold">PHẢN HỒI NGƯỜI DÙNG</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data" action="index.php">
                <input type="hidden" name="action" value="xulyphanhoi">
                <input type="hidden" name="MaDG" value="<?php echo $danhgia_ht['MaDG']; ?>">
                <input type="hidden" name="MaND" value="<?php echo $_SESSION['nguoidung']["MaND"]; ?>">

                <div class="row">
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txtdanhgia" class="form-label">Đánh giá từ người dùng</label>
                            <textarea id="editor" rows="5" class="form-control" name="txtdanhgia"><?php echo $danhgia_ht["NoiDung"]; ?></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="md-3 mt-3">
                            <label for="txttraloi" class="form-label">Trả lời đánh giá</label>
                            <?php
                            if ($trangthai == 1) { ?>
                                <textarea id="editor1" rows="5" class="form-control" name="txttraloi"><?php echo $traloi["TraLoi"]; ?></textarea>
                            <?php } else { ?>
                                <textarea id="editor1" rows="5" class="form-control" name="txttraloi"></textarea>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="md-3 mt-3">
                    <a href="index.php?action=xem" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Trả Lời" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>