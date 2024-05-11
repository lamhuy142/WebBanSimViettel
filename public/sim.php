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
						<?php foreach ($loaisim as $l) :
							if ($l["TrangThai"] == 1) { ?>
								<li class="nav-item p-b-10">
									<!-- id="<php echo $l['MaLS'] ?>_tab" -->
									<a style="font-family: 'Tilt Neon', sans-serif !important;" id="<?php echo $l['MaLS'] ?>_tab" class="nav-link
								<?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false) echo "active"; ?>" data-toggle="tab" href="#<?php echo $l['MaLS'] ?>" role="tab"><?php echo $l['TenLS'] ?></a> <!--role="tab"-->
								</li>
						<?php }
						endforeach; ?>
					</ul>
				</div>
			</div>
			<!-- TÌM KIẾM SIM -->
			<form action="" method="post">
				<input type="hidden" name="action" value="timkiemsim">
				<div class="row input-group">
					<div class="col-4 flex-w flex-c-m m-tb-10">
						<input type="text" placeholder="Tìm kiếm" name="timkiem" class="form-control">
						<input style="width:85px; margin-left:3px;background-color:#EF0033; color:white;" class="btn" type="submit" name="" id="" value="tìm kiếm">
					</div>
					<div class="col">
					</div>
				</div>
			</form>
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

			<div class="tab-content p-t-50">

				<!-- if ($l["MaLS"] == 2) { ?> -->
				<div class="row mx-auto" style=" width: 200px;">
					<div class="col-6">
						<a id="traTruocLink" class="filter-link  text-decoration-none" href="index.php?type=1" data-type="1">Trả trước</a>
					</div>
					<div class="col-6">
						<a id="traSauLink" class="filter-link  text-decoration-none" href="index.php?type=0" data-type="0">Trả sau</a>
					</div>
				</div>
				<!-- <php } ?> -->
				<!-- - -->
				<?php foreach ($loaisim as $l) : ?>

					<div style="max-height: 500px; overflow-y: auto;" class="tab-pane fade  <?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false || $l['MaLS'] == 3) echo "show active"; ?>" id="<?php echo $l["MaLS"] ?>" role="tabpanel">
						<!-- SIM -->
						<table class="table" id="simTable<?php echo $l["MaLS"] ?>">
							<thead class="rounded-top" style="background-color: #E4E4E4; color:#444966; ">
								<tr>
									<th scope=" col">Mã</th>
									<th scope="col">Sim Số</th>
									<th scope="col">Giá Sim</th>
									<th scope="col">Chọn Mua</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($sim as $s) :
									if ($s['MaLS'] == $l['MaLS'] && $s["TinhTrang"] == 1 && $l["TrangThai"] == 1 && $s["MaSim"] != null) { ?>
										<tr class="table-hover-bg-factor" data-type="<?php echo $s['LoaiThueBao']; ?>">
											<td scope=" row"><?php echo $s['MaSim'] ?></td>
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
											<td><a style="background-color: #EF0033; color: white;" class="btn" href="index.php?action=themvaogiohang&MaSim=<?php echo $s['MaSim'] ?>&DonGia=<?php echo $giaban ?>">Chọn Mua</a></td>
										</tr>
								<?php
									}
								endforeach;
								// endforeach;
								?>
							</tbody>
						</table>
					</div>
				<?php endforeach;

				?>
			</div>
		</section>
	</div>
</div>


<script>
	document.addEventListener('DOMContentLoaded', function() {
		const filterLinks = document.querySelectorAll('.filter-link');
		const simTypeLinks = document.querySelectorAll('.nav-link'); // Selector cho các liên kết loại sim

		filterLinks.forEach(link => {
			link.addEventListener('click', function(e) {
				e.preventDefault();
				const type = this.dataset.type; // '1' cho trả trước, '0' cho trả sau

				document.querySelectorAll('[id^="simTable"]').forEach(table => {
					const rows = table.querySelectorAll('tbody tr');
					rows.forEach(row => {
						if (row.dataset.type === type || type === 'all') {
							row.style.display = '';
						} else {
							row.style.display = 'none';
						}
					});
				});
			});
		});

		// Thêm sự kiện click cho các liên kết loại sim
		simTypeLinks.forEach(link => {
			link.addEventListener('click', function(e) {
				// Khi một loại sim được chọn, reset bảng hiển thị tất cả các hàng
				document.querySelectorAll('[id^="simTable"]').forEach(table => {
					const rows = table.querySelectorAll('tbody tr');
					rows.forEach(row => {
						row.style.display = ''; // Dòng này đặt thuộc tính CSS display của mỗi hàng dữ liệu thành một chuỗi trống ''.
					});
				});
			});
		});
	});
</script>
<?php include("inc/bottom.php") ?>