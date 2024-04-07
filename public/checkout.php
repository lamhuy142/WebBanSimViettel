<?php include("inc/top.php") ?>

<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Đơn Hàng
            <?php if (isset($_SESSION["nguoidung"])) { ?></h1>
        <form action="index.php" method="post">
            <input type="hidden" name="MaND" value="<?php echo $_SESSION["nguoidung"]["MaND"]; ?>">
            <input type="hidden" name="action" value="luudonhang">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Tên đăng nhập<sup>*</sup></label>
                                <input type="text" class="form-control" name="txtemail" value="<?php echo $_SESSION["nguoidung"]["TenDangNhap"]; ?>" disabled>
                            </div>
                        </div>
                        <div class=" col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
                                <input type="text" class="form-control" name="txtsodienthoai" value="<?php echo $_SESSION["nguoidung"]["Sdt"] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Họ tên<sup>*</sup></label>
                        <input type="text" class="form-control" name="txthoten" value="<?php echo $_SESSION["nguoidung"]["HoTen"]; ?>" disabled>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ <sup>*</sup></label>
                        <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="txtdiachi" value="<?php echo $_SESSION['nguoidung']['DiaChi']; ?>" disabled>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12 col-lg-6 col-xl-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Stt</th>
                                <th scope="col">Số sim</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($giohang as $gh) :
                                foreach ($sim as $s) :
                                    if ($gh["MaND"] == $_SESSION["nguoidung"]["MaND"] && $s["MaSim"] == $gh["MaS"]) { ?>
                                        <tr class="table_row">
                                            <td class="column-2 pl-4"><?php echo $i; ?></td>
                                            <td class="column-2 pl-4"><?php echo $s["SoSim"]; ?></td>
                                            <td class="column-3"><?php echo  number_format($gh["DonGia"]); ?>đ</td>
                                            <td class="column-4">
                                                <div class=" flex-w m-l-auto m-r-0">
                                                    <!-- <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1"> -->
                                                    <span>1</span>

                                                </div>
                                            </td>
                                            <td class="column-5"><?php echo number_format($gh["DonGia"]); ?>đ</td>
                                        </tr>
                            <?php $i++;
                                    }
                                endforeach;
                            endforeach;
                            ?>

                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-5">
                                    <p class="mb-0 text-dark text-uppercase py-3">TỔNG TIỀN</p>
                                </td>
                                <td class="py-5"></td>
                                <td class="py-5"></td>
                                <td class="py-5">
                                    <div class="py-3 border-bottom border-top">
                                        <?php
                                        $tongtien = 0;
                                        foreach ($giohang as $gh) :
                                            foreach ($sim as $s) :
                                                if ($gh["MaND"] == $_SESSION["nguoidung"]["MaND"] && $s["MaSim"] == $gh["MaS"]) {
                                                    $tongtien = $tongtien + $gh["DonGia"];
                                                }
                                            endforeach;
                                        endforeach;
                                        echo number_format($tongtien) . 'đ';
                                        ?>
                                        <p class="mb-0 text-dark"></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                    <input type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-success" value="Hoàn Tất Đơn Hàng"></input>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->

<?php include("inc/bottom.php") ?>