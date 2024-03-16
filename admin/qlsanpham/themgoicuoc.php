<?php include("../inc/top.php"); ?>

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 style="color: #EA0029;" class="m-0 font-weight-bold ">THÊM GÓI CƯỚC</h6>
        </div>
        <div class="card-body">
            <form method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="xulythemgc">

                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txttengc" class="form-label">Tên Gói Cước</label>
                        <input class="form-control" type="text" name="txttengc" placeholder="Nhập tên gói cước">
                        <div class="invalid-feedback">
                            Không được để trống
                        </div>
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="txtdungluong" class="form-label">Dung Lượng</label>
                        <input class="form-control" type="number" name="txtdungluong" placeholder="Nhập dung lượng gói cước">
                    </div>
                    <div class="col md-3 mt-3">
                        <label for="thoigianhieuluc" class="form-label">Thời Gian Hiệu Lực</label>
                        <input class="form-control" type="date" name="thoigianhieuluc">
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col md-3 mt-3">
                        <label for="txtmota" class="form-label">Mô Tả</label>
                        <input class="form-control" id="editor" type="text" name="txtmota" placeholder="Nhập mô tả">
                    </div>
                </div>

                <div class="md-3 mt-3">
                    <a href="index.php?action=goicuoc" class="btn btn-primary"><i class="bi bi-arrow-counterclockwise"></i> Trở về </a>
                    <input type="submit" value="Lưu" class="btn btn-success"></input>
                    <input type="reset" value="Hủy" class="btn btn-warning"></input>
                </div>
        </div>

        </form>
    </div>
</div>
</div>

<?php include("../inc/bottom.php"); ?>