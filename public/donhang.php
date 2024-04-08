<?php include("inc/top.php") ?>

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4">
			Đơn hàng
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
								<th class="column-1">Số sim</th>
								<th class="column-3">Giá</th>
								<th class="column-4">Số lượng</th>
								<th class="column-5">Tổng tiền</th>
								<th class="column-5">Trạng thái</th>
								<th class="column-5"></th>
							</tr>
							<?php foreach ($donhang as $dh) :
								foreach ($donhang_ct as $dhct) :
									foreach ($sim as $s) :
										if ($dh["MaND"] == $_SESSION["nguoidung"]["MaND"] && $dhct["MaS"] == $s["MaSim"]) { ?>
											<tr class="table_row">
												<td class="column-2 pl-4"><?php echo $s["SoSim"]; ?></td>
												<td class="column-3"><?php echo  number_format($dhct["DonGia"]); ?>đ</td>
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
												<td class="column-5"><?php echo number_format($dhct["DonGia"]); ?>đ</td>
												<!-- Trạng thái -->
												<!-- cột trạng thái -->
												<?php if ($dh["TrangThai"] == 0) { ?>
													<td class="text-success font-weight-bold">Chuẩn bị hàng </td>
													<td>
														<div class="col">
															<a href="index.php?action=huydon&id=<?php echo $dh['MaDH']; ?>&TrangThai=<?php echo $dh['TrangThai']; ?>" class="btn btn-secondary">Hủy đơn</a>
														</div>
													</td>
												<?php } elseif ($dh["TrangThai"] == 1) { ?>
													<td class="text-success font-weight-bold">Đang vận chuyển</td>
													<td>
														<div class="col">
															<a href="index.php?action=hoantat&id=<?php echo $dh['MaDH']; ?>&TrangThai=<?php echo $dh['TrangThai']; ?>" class="btn btn-warning">Hoàn tất</a>
														</div>
													</td>
												<?php } elseif ($dh["TrangThai"] == 2) { ?>
													<td class="text-success font-weight-bold">Giao hàng thành công</td>
												<?php } elseif ($dh["TrangThai"] == 3) { ?>
													<td class="text-danger font-weight-bold">Đơn đã hủy</td>
												<?php } ?>
											</tr>
							<?php }
									endforeach;
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
		</div>
	</div>
</form>


<?php include("inc/bottom.php") ?>