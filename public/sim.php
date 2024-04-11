<?php include("inc/top.php");

?>
<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Trang chủ
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span class="stext-109 cl4">
			sim
		</span>
	</div>
</div>

<!-- Product -->
<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-20">


			<!-- Search product -->
			<!-- <div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product" placeholder="Search">
				</div>
			</div> -->
		</div>

		<section class="sec-product bg0 p-t-20 p-b-50">
			<div class="container">
				<!-- Tab02 -->
				<div class="p-b-32">
					<h3 class="ltext-105 cl5 txt-center respon1">
						Mua Sim
					</h3>
				</div>

				<!-- Tab01 -->
				<div class="tab01 p-2">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<?php foreach ($loaisim as $l) : ?>
							<li class="nav-item p-b-10">
								<a id="<?php echo $l['MaLS'] ?>_tab" class="nav-link
								<?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false  || $l['MaLS'] == 3) echo "active"; ?>" data-toggle="tab" href="#<?php echo $l['MaLS'] ?>" role="tab"><?php echo $l['TenLS'] ?></a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="row mx-auto" style=" width: 200px;">
				<div class="col-6">
					<a id="traTruocLink" class="filter-link" href="index.php?type=1" data-type="1">Trả trước</a>
				</div>
				<div class="col-6">
					<a id="traSauLink" class="filter-link" href="index.php?type=0" data-type="0">Trả sau</a>
				</div>
			</div>
			<form action="" method="post">
				<input type="hidden" name="action" value="timkiemsim" > 
				<div class="row input-group">
					<div class="col-4 flex-w flex-c-m m-tb-10">
						<input type="text" placeholder="Tìm kiếm" name="timkiem" class="form-control">
						<input style="width:85px; margin-left:3px;" class="btn btn-primary " type="submit" name="" id="" value="tìm kiếm">
					</div>
					<div class="col">
					</div>
				</div>
			</form>


			<div class="tab-content p-t-50">
				<?php foreach ($loaisim as $l) : ?>
					<!-- - -->
					<div class="tab-pane fade  <?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false || $l['MaLS'] == 3) echo "show active"; ?>" id="<?php echo $l["MaLS"] ?>" role="tabpanel">
						<!-- SIM DATA -->
						<!-- <div class=" row mx-auto" style=" width: 200px;">
							<div class="form-check form-check-inline">
								<input style="margin-left: 5px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
								<label class="form-check-label" for="inlineRadio1"> Trả Trước</label>
							</div>
							<div class="form-check form-check-inline">
								<input style="margin-left: 5px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
								<label class="form-check-label" for="inlineRadio2"> Trả Sau</label>
							</div>
						</div> -->


						<table class="table" id="simTable1">
							<thead class="rounded-top" style="background-color: #E4E4E4; color:#444966; ">
								<tr>
									<th scope=" col">STT</th>
									<th scope="col">Sim Số</th>
									<th scope="col">Giá Sim</th>
									<th scope="col">Chọn Mua</th>
								</tr>
							</thead>

							<?php

							// $type = isset($_GET['type']) ? $_GET['type'] : '';

							foreach ($sim as $s) :

								// $loaithuebao = ($s['LoaiThueBao'] == '1');
								// $hienthi = ($type == '1' && $loaithuebao) || ($type == '0' && !$loaithuebao);
								// Kiểm tra nếu sim không thuộc loại được chọn thì bỏ qua
								if ($s['MaLS'] == $l['MaLS'] && $s["TinhTrang"] == 1) { ?>
									<!-- && $hienthi) { ?> -->
									<tbody>
										<tr class="table-hover-bg-factor">
											<td scope="row"><?php echo $s['MaSim'] ?></td>
											<td><?php echo $s['SoSim'] ?></td>
											<td><?php echo number_format($l['GiaBan']);  ?></td>
											<td><a style="background-color: #EF0033; color: white;" class="btn" href="index.php?action=themvaogiohang&MaSim=<?php echo $s['MaSim'] ?>&DonGia=<?php echo $l['GiaBan'] ?>">Chọn Mua</a></td>
										</tr>
									</tbody>
							<?php
								}
							endforeach; ?>
						</table>
					</div>
				<?php endforeach; ?>
			</div>
		</section>
	</div>
</div>

<!-- Load more -->
<div class="flex-c-m flex-w w-full p-t-45 p-b-30">
	<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
		Load More
	</a>
</div>
</div>
</div>


<?php include("inc/bottom.php") ?>