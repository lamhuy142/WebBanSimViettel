<?php include("../inc/top.php"); ?>


<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">San Pham Goi Cuoc</h6>
            <p><a class=" btn btn-danger" href="index.php?action=them">Thêm</a></p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên Gói Cước</th>
                        <th scope="col">Giá Gốc</th>
                        <th scope="col">Giá Bán</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sim as $s) : ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo $s["SoSim"] ?></td>
                            <td><?php echo $s["GiaGoc"] ?></td>
                            <td><?php echo $s["GiaBan"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Table End -->


<?php include("../inc/bottom.php"); ?>