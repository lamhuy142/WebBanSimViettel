<?php include("inc/top.php") ?>

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-109 cl4">
			Giỏ hàng
		</span>
	</div>
</div>
<?php
// Kiểm tra nếu giỏ hàng rỗng
if (empty($giohang)) { ?>
	<div class="container">
		<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
			<div class="m-l-25 m-r--38 m-lr-0-xl">
				<div class="container-fluid py-5">
					<div class="container py-5">

						<div class="untree_co-section">
							<div class="container">
								<div class="row">
									<div class="col-md-12 text-center pt-5">
										<img src="../img/icons/cart-cross-svgrepo-com.svg" alt="Image Description thumnail" width="150px" height="150px" class="display-3 thankyou-icon text-secondary">

										<h2 class="display-3 text-black">Giỏ hàng rỗng!</h2>
										<p class="lead mb-5">Hãy chọn mua hàng.</p>
										<p><a href="index.php?action=macdinh" class="btn btn-sm btn-outline-black hov-btn3">Trở lại cửa hàng</a></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } else { ?>
	<!-- Shoping Cart -->
	<form method="post" class="bg0 p-t-75 p-b-85">
		<input type="hidden" name="action" value="dathang">
		<input type="hidden" name="MaND" value="<?php echo $_SESSION["nguoidung"]["MaND"]; ?>">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-1">Số sim</th>
									<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-3">Giá</th>
									<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5">Số lượng</th>
									<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5">Tổng tiền</th>
									<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5">Thao tác</th>
								</tr>
								<?php foreach ($giohang as $gh) : //lap qua tung gio hang
									foreach ($sim as $s) :
										if ($gh["MaND"] == $_SESSION["nguoidung"]["MaND"] && $s["MaSim"] == $gh["MaS"]) { ?>
											<tr class="table_row">
												<td class="column-2 pl-4"><?php echo $s["SoSim"]; ?></td>
												<td class="column-3"><?php echo  number_format($gh["DonGia"]); ?>đ</td>
												<td class="column-4">
													<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">
												</td>
												<td style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5"><?php echo number_format($gh["DonGia"]); ?>đ</td>
												<td style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5">
													<a class="text-decoration-none" style="color:#EF0033 ;" href="index.php?action=xoamotsim&id=<?php echo $s["MaSim"] ?>">
														Xóa
													</a>
												</td>
											</tr>
								<?php }
									endforeach;
								endforeach;
								?>
							</table>
						</div>

					</div>
				</div>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 style="font-family: 'Tilt Neon', sans-serif !important;" class="mtext-109 cl2 p-b-30">
							Tính Tiền
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-110 cl2">
									Tổng:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
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
								</span>
							</div>
						</div>



						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span style="font-family: 'Tilt Neon', sans-serif !important;" class="mtext-101 cl2">
									Tổng số tiền:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
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
								</span>
							</div>
						</div>
						<input style="font-family: 'Tilt Neon', sans-serif !important;" type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Đặt hàng"></input>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php } ?>
<?php include("inc/bottom.php") ?>