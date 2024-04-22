<?php include("inc/top.php") ?>

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-109 cl4">
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
					<div class="wrap-table-shopping-cart" style="max-height: 500px; overflow-y: auto;">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-1">Số sim</th>
								<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-3">Giá</th>
								<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-4">Số lượng</th>
								<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5">Tổng tiền</th>
								<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5">Trạng thái</th>
								<th style="font-family: 'Tilt Neon', sans-serif !important;" class="column-5"></th>
							</tr>
							<?php foreach ($donhang as $dh) :
								foreach ($donhang_ct as $dhct) :
									foreach ($sim as $s) :
										if ($dh["MaND"] == $_SESSION["nguoidung"]["MaND"] && $dhct["MaS"] == $s["MaSim"] && $dhct["MaDH"] == $dh["MaDH"]) { ?>
											<tr class="table_row">
												<td class="column-2 pl-4"><?php echo $s["SoSim"]; ?></td>
												<td style="font-family: 'Tilt Neon', sans-serif !important;" class="column-3"><?php echo  number_format($dhct["DonGia"]); ?>đ</td>
												<td class="column-4">

												<td class="column-4">
													<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="1">
												</td>

												</td>
												<td class="column-5"><?php echo number_format($dhct["DonGia"]); ?>đ</td>
												<!-- Trạng thái -->
												<!-- cột trạng thái -->
												<?php if ($dh["TrangThai"] == 0) { ?>
													<td style="font-family: 'Tilt Neon', sans-serif !important;" class="text-success font-weight-bold">Chuẩn bị hàng </td>
													<td>
														<div class="col">
															<a href="index.php?action=huydon&id=<?php echo $dh['MaDH']; ?>&TrangThai=<?php echo $dh['TrangThai']; ?>" class="btn btn-secondary">Hủy đơn</a>
														</div>
													</td>
												<?php } elseif ($dh["TrangThai"] == 1) { ?>
													<td style="font-family: 'Tilt Neon', sans-serif !important;" class="text-success font-weight-bold">Đang vận chuyển</td>
													<td>
														<div class="col">
															<a href="index.php?action=hoantat&id=<?php echo $dh['MaDH']; ?>&TrangThai=<?php echo $dh['TrangThai']; ?>" class="btn btn-warning">Hoàn tất</a>
														</div>
													</td>
												<?php } elseif ($dh["TrangThai"] == 2) { ?>
													<td style="font-family: 'Tilt Neon', sans-serif !important;" class="text-success font-weight-bold">Giao hàng thành công</td>
												<?php } elseif ($dh["TrangThai"] == 3) { ?>
													<td style="font-family: 'Tilt Neon', sans-serif !important;" class="text-danger font-weight-bold">Đơn đã hủy</td>
												<?php } ?>
											</tr>
							<?php }
									endforeach;
								endforeach;
							endforeach;
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>


<?php include("inc/bottom.php") ?>