<?php include("inc/top.php");

?>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php?action=sim" class="stext-109 cl8 hov-cl1 trans-04">
			Sim
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-109 cl4">
			Tìm kiếm
		</span>
	</div>
</div>

<!-- Product -->

<section>
	<div class="container">
		<div class="heading_container heading_center p-4">
			<div class="row align-items-center">
				<div class="col">
					<h2 class="">
						<a class="text-decoration-none text-muted" href="">Sim Số</a>
					</h2>
					<div class="btn-box d-flex justify-content-end mt-3">
						<a style="color:#EF0033;" class="text-decoration-none" href="index.php?action=sim">
							Xem Tất Cả
						</a>
					</div>
					<style>
						/* Loại bỏ border-bottom mặc định của liên kết */
						a.filter-link {
							color: #979797;
							text-decoration: none;
							border-bottom: none;
							/* Loại bỏ border-bottom */
						}

						/* Màu và border-bottom khi hover hoặc focus */
						a.filter-link:hover,
						a.filter-link:focus {
							color: #EF0033;
							text-decoration: none;
							border-bottom: none;
							/* Loại bỏ border-bottom */
						}

						/* Màu khi liên kết đang được nhấn */
						a.filter-link:active {
							color: #EF0033 !important;
							text-decoration: none !important;
							border-bottom: none !important;
							/* Loại bỏ border-bottom */
						}
					</style>


					<!-- TÌM KIẾM SIM -->
					<form action="" method="post">
						<input type="hidden" name="action" value="timkiemsim">
						<div class="row input-group">
							<div class="col-4 flex-w flex-c-m m-tb-10">
								<input type="text" placeholder="Tìm kiếm" name="timkiem" class="form-control">
								<input style="width:85px; margin-left:3px; background-color:#EF0033; color:white;" class="btn" type="submit" name="" id="" value="tìm kiếm">
							</div>
							<div class="col">
							</div>
						</div>
					</form>

					<?php if (empty($sim)) { ?>
						<div class="untree_co-section">
							<div class="container">
								<div class="row">
									<div class="col-md-12 text-center pt-5">
										<h2 class="display-3 text-black">Không tìm thấy!</h2>
										<p class="lead mb-5">Bạn có thể tìm kiếm tiếp tục hoặc <a href="index.php?action=sim" style="color:white; background-color: #EF0033; " class="rounded text-decoration-none pl-1 pr-1 hov-btn3">trở lại cửa hàng</a>.</p>
									</div>
								</div>
							</div>
						</div>
					<?php } ?>

					<table class="table" id="simTable">
						<thead class="rounded-top" style="background-color: #E4E4E4; color:#444966; ">
							<tr>
								<th scope="col">STT</th>
								<th scope="col">Sim Số</th>
								<th scope="col">Giá Sim</th>
								<th scope="col">Chọn Mua</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$type = isset($_GET['type']) ? $_GET['type'] : '';
							// $type = 0;

							foreach ($sim as $s) :
								foreach ($loaisim as $ls) :
									$loaithuebao = ($s['LoaiThueBao'] == '1');
									$hienthi = ($type == '1' && $loaithuebao) || ($type == '0' && !$loaithuebao);
									// && $hienthi
									if ($ls["MaLS"] == $s["MaLS"] && $s["TinhTrang"] == 1) { ?>

										<tr class="table-hover-bg-factor">
											<td scope="row"><?php echo $s['MaSim'] ?></td>
											<td><?php echo $s['SoSim'] ?></td>
											<?php
											$giaban = $ls["GiaBan"]; // Lưu giá gốc của sim
											foreach ($khuyenmai as $km) :
												if ($km["MaLS"] == $s["MaLS"] && $km["TrangThai"] == 1) {
													$giaban = $ls["GiaBan"] * $km["GiaTriKM"] / 100; ?>
												<?php } ?>
											<?php endforeach; ?>
											<?php if ($giaban != $ls["GiaBan"]) { ?>
												<td class="text-danger"><?php echo number_format($giaban); ?></td>

											<?php } else { ?>
												<td><?php echo number_format($giaban); ?></td>
											<?php } ?>
											<td><a style="background-color: #EF0033; color: white;" class="btn" href="index.php?action=themvaogio&MaSim=<?php echo $s['MaSim'] ?>&DonGia=<?php echo $ls['GiaBan'] ?>">Chọn Mua</a></td>
										</tr>

							<?php
									}
								endforeach;
							endforeach;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Load more -->
<!-- <div class="flex-c-m flex-w w-full p-t-45 p-b-30">
	<a style="font-family: 'Tilt Neon', sans-serif !important;" href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
		Load More
	</a>
</div> -->
</div>
</div>
<?php include("inc/bottom.php") ?>