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
								<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-4">Số lượng</th>
								<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5">Tổng tiền</th>
							</tr>
							<?php foreach ($giohang as $gh) :
								foreach ($sim as $s) :
									if ($gh["MaND"] == $_SESSION["nguoidung"]["MaND"] && $s["MaSim"] == $gh["MaS"]) { ?>
										<tr class="table_row">
											<td class="column-2 pl-4"><?php echo $s["SoSim"]; ?></td>
											<td class="column-3"><?php echo  number_format($gh["DonGia"]); ?>đ</td>
											<td class="column-4">
												<div class="wrap-num-product flex-w m-l-auto m-r-0">
													<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
														<a class="text-decoration-none text-secondary" href="index.php?action=xoamotsim&id=<?php echo $s["MaSim"] ?>"><i class="fs-16 zmdi zmdi-minus"></i></a>
													</div>

													<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">

													<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-plus"></i>
													</div>
												</div>
											</td>
											<td style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5"><?php echo number_format($gh["DonGia"]); ?>đ</td>
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


<?php include("inc/bottom.php") ?>