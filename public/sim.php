<?php include("inc/top.php");

?>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a style="font-family: 'Tilt Neon', sans-serif !important;" href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span style="font-family: 'Tilt Neon', sans-serif !important;" class="stext-109 cl4">
			sim
		</span>
	</div>
</div>

<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-20">
		</div>
		<section class="sec-product bg0 p-t-20 p-b-50">
			<div class="container">
				<!-- Tab02 -->
				<div class="p-b-32">
					<h3 style="font-family: 'Tilt Neon', sans-serif !important;" class="ltext-105 cl5 txt-center respon1">
						Mua Sim
					</h3>
				</div>

				<!-- Tab01 -->
				<div class="tab01 p-2">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="">
						<?php foreach ($loaisim as $l) : ?>
							<li class="nav-item p-b-10">
								<!-- id=="<php echo $l['MaLS'] ?>_tab" -->
								<a style="font-family: 'Tilt Neon', sans-serif !important;" id="" class="nav-link
								<?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false  || $l['MaLS'] == 3) echo "active"; ?>" data-toggle="tab" href="#<?php echo $l['MaLS'] ?>"><?php echo $l['TenLS'] ?></a> <!--role="tab"-->
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<!-- TÌM KIẾM SIM -->
			<form action="" method="post">
				<input type="hidden" name="action" value="timkiemsim">
				<div class="row input-group">
					<div class="col-4 flex-w flex-c-m m-tb-10">
						<input type="text" placeholder="Tìm kiếm" name="timkiem" class="form-control">
						<input style="width:85px; margin-left:3px;background-color:#EF0033; color:white;" class="btn  " type="submit" name="" id="" value="tìm kiếm">
					</div>
					<div class="col">
					</div>
				</div>
			</form>


			<div class="tab-content p-t-50">
				<?php foreach ($loaisim as $l) :
					if ($l["MaLS"] == 2) { ?>
						<div class="row mx-auto" style=" width: 200px;">
							<div class="col-6">
								<a id="traTruocLink" class="filter-link" href="index.php?type=1" data-type="1">Trả trước</a>
							</div>
							<div class="col-6">
								<a id="traSauLink" class="filter-link" href="index.php?type=0" data-type="0">Trả sau</a>
							</div>
						</div>
					<?php } ?>
					<!-- - -->
					<!-- || $l['MaLS'] == 3 -->
					<div class="tab-pane fade  <?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false || $l['MaLS'] == 3) echo "show active"; ?>" id="<?php echo $l["MaLS"] ?>" role="tabpanel">
						<!-- SIM DATA -->
						<table class="table" id="simTable<?php echo $l["MaLS"] ?>">
							<thead class="rounded-top" style="background-color: #E4E4E4; color:#444966; ">
								<tr>
									<th scope=" col">STT</th>
									<th scope="col">Sim Số</th>
									<th scope="col">Giá Sim</th>
									<th scope="col">Chọn Mua</th>
								</tr>
							</thead>

							<?php

							$type = isset($_GET['type']) ? $_GET['type'] : '';

							foreach ($sim as $s) :
								$loaithuebao = ($s['LoaiThueBao'] == '1');
								$hienthi = ($type == '1' && $loaithuebao) || ($type == '0' && !$loaithuebao);
								// Kiểm tra nếu sim không thuộc loại được chọn thì bỏ qua
								if ($s['MaLS'] == $l['MaLS'] && $s["TinhTrang"] == 1 && $s["MaSim"] != null) { ?> <!-- && $hienthi) { ?> -->
									<tbody>
										<tr class="table-hover-bg-factor">
											<td scope="row"><?php echo $s['MaSim'] ?></td>
											<td><?php echo $s['SoSim'] ?></td>
											<?php
											$giaban = $l["GiaBan"]; // Lưu giá gốc của sim
											foreach ($khuyenmai as $km) :
												if ($km["MaLS"] == $s["MaLS"] && $km["TrangThai"] == 1) {
													$giaban = $l["GiaBan"] * $km["GiaTriKM"] / 100;
												}
											endforeach;
											if ($giaban != $l["GiaBan"]) { ?>
												<td class="text-danger"><?php echo number_format($giaban); ?></td>
											<?php } else { ?>
												<td><?php echo number_format($giaban); ?></td>
											<?php } ?>

											<!-- <td><php echo number_format($l['GiaBan']);  ?></td> -->
											<td><a style="background-color: #EF0033; color: white;" class="btn" href="index.php?action=themvaogiohang&MaSim=<?php echo $s['MaSim'] ?>&DonGia=<?php echo $l['GiaBan'] ?>">Chọn Mua</a></td>
										</tr>
									</tbody>
							<?php
								}
							endforeach;
							?>
						</table>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	</div>
</div>

<!-- Load more -->
<!-- <div class="flex-c-m flex-w w-full p-t-45 p-b-30">
	<a style="font-family: 'Tilt Neon', sans-serif !important;" href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
		Load More
	</a>
</div> -->
</div>
</div>


<?php include("inc/bottom.php") ?>