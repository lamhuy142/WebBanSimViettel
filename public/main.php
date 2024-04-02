<?php include("inc/top.php");
// <!-- Slider -->
include("inc/sider.php");
// <!-- Banner -->
include("inc/banner.php");
$selectedOption = isset($_POST['inlineRadioOptions']) ? $_POST['inlineRadioOptions'] : 'all';
?>



<!-- Product -->
<section class="sec-product bg0 p-t-100 p-b-50">
	<div class="container">
		<div class="p-b-32">
			<h3 class="ltext-105 cl5 txt-center respon1">
				Bán Sim
			</h3>
		</div>

		<!-- Tab01 -->
		<div class="tab01">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php foreach ($loaisim as $l) : ?>
					<li class="nav-item p-b-10">
						<a id="<?php echo $l['MaLS'] ?>_tab" class="nav-link  
		<?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false  || $l['MaLS'] == 3) echo "active"; ?>
		" data-toggle="tab" href="#<?php echo $l['MaLS'] ?>" role="tab"><?php echo $l['TenLS'] ?></a>
					</li>
				<?php endforeach; ?>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content p-t-50">
				<?php foreach ($loaisim as $l) : ?>
					<!-- - -->
					<div class="tab-pane fade  <?php if (strpos($_SERVER["REQUEST_URI"], $l['MaLS']) != false || $l['MaLS'] == 3) echo "show active"; ?>" id="<?php echo $l["MaLS"] ?>" role="tabpanel">
						<!-- SIM DATA -->
						<div class=" row mx-auto" style=" width: 200px;">
							<div class="form-check form-check-inline">
								<input style="margin-left: 5px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
								<label class="form-check-label" for="inlineRadio1"> Trả Trước</label>
							</div>
							<div class="form-check form-check-inline">
								<input style="margin-left: 5px;" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
								<label class="form-check-label" for="inlineRadio2"> Trả Sau</label>
							</div>
						</div>

						<table class="table">
							<thead class="rounded-top" style="background-color: #E4E4E4; color:#444966; ">
								<tr>
									<th scope=" col">STT</th>
									<th scope="col">Sim Số</th>
									<th scope="col">Giá Sim</th>
									<th scope="col">Chọn Mua</th>
								</tr>
							</thead>
							<?php foreach ($sim as $s) :
								// Kiểm tra nếu sim không thuộc loại được chọn thì bỏ qua
								if ($s['MaLS'] == $l['MaLS'] && ($selectedOption == 'all' || $selectedOption == $s['TrangThai'])) { ?>
									<tbody>
										<tr class="table-hover-bg-factor">
											<td scope="row"><?php echo $s['MaSim'] ?></td>
											<td><?php echo $s['SoSim'] ?></td>
											<td><?php echo number_format($l['GiaBan']);  ?></td>
											<td><a style="background-color: #EF0033; color: white;" class="btn" href="">Mua Ngay</a></td>
										</tr>
									</tbody>
							<?php
								}
							endforeach; ?>
						</table>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<!-- Blog -->
<?php include("inc/blog.php") ?>

<?php include("inc/bottom.php") ?>