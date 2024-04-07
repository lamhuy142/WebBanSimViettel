<?php include("inc/top.php") ?>

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Giỏ hàng
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Số sim</th>
								<th class="column-3">Giá</th>
								<th class="column-4">Số lượng</th>
								<th class="column-5">Tổng tiền</th>
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
														<i class="fs-16 zmdi zmdi-minus"></i>
													</div>

													<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">

													<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
														<i class="fs-16 zmdi zmdi-plus"></i>
													</div>
												</div>
											</td>
											<td class="column-5"><?php echo number_format($gh["DonGia"]); ?>đ</td>
										</tr>
							<?php }
								endforeach;
							endforeach;
							?>
						</table>
					</div>

					<!-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<div class="flex-w flex-m m-r-20 m-tb-5">
							<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

							<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
								Apply coupon
							</div>
						</div>

						<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
							Update Cart
						</div>
					</div> -->
				</div>
			</div>
			<form method="post">
				<input type="hidden" name="action" value="dathang">
				<input type="hidden" name="MaND" value="<?php echo $_SESSION["nguoidung"]["MaND"]; ?>">
				<?php
				$tongtien = 0;
				foreach ($giohang as $gh) :
					foreach ($sim as $s) :
						if ($gh["MaND"] == $_SESSION["nguoidung"]["MaND"] && $s["MaSim"] == $gh["MaS"]) {
							$tongtien = $tongtien + $gh["DonGia"];
						}
					endforeach;
				endforeach;
				echo '<input type="hidden" name="tongtien" value="' . number_format($tongtien) . '">';
				?>
				<!-- lấy danh sách mã sim -->
				<?php
				$mas = array();
				foreach ($giohang as $gh) :
				foreach ($sim as $s) :
					if ($gh["MaS"] == $s["MaSim"]) {
						$mas[] = $gh["MaS"];
						$str_mas = implode($mas)
				?>
						<input type="hidden" name="MaS" value="<?php echo $str_mas; ?>">
				<?php	}
				endforeach;
				endforeach;
				?>
				<!-- lấy danh sách mã giỏ hàng -->
				<?php
				$magh = array();
				foreach ($giohang as $gh) :
					if ($gh["MaND"] == $_SESSION["nguoidung"]["MaND"]) {
						$magh[] = $gh["MaGH"];
						$str_magh = implode($magh)
				?>
						<input type="hidden" name="MaGH" value="<?php echo $str_magh; ?>">
				<?php	}
				endforeach;
				?>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Tính Tiền
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
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

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
								</p>

								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="time">
											<option>Select a country...</option>
											<option>USA</option>
											<option>UK</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>

									<div class="flex-w">
										<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
											Update Totals
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
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

						<input type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Đặt hàng"></input>
					</div>
				</div>
			</form>
		</div>
	</div>
</form>


<?php include("inc/bottom.php") ?>