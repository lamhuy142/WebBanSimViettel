<section class="sec-blog bg0 p-t-60 p-b-90">
    <div class="container">
        <div class="p-b-66">
            <h3 style="font-family:FS PFBeauSansPro,sans-serif;font-weight: 600;
    letter-spacing: 0.15px;" class="ltext-105 cl5 txt-center respon1">
                Sự Kiện Khuyến Mãi
            </h3>
        </div>

        <div class="row">
            <?php foreach ($khuyenmai as $km) : ?>
                <div class="col-sm-6 col-md-4 p-b-40">
                    <div class="blog-item">
                        <div class="hov-img0">
                            <a href="index.php?action=detail&id=<?php echo $km['MaKM'] ?>">
                                <img src="../img/khuyenmai/<?php echo $km['HinhAnh']; ?>" alt="IMG-BLOG">
                            </a>
                        </div>

                        <div class="p-t-15">
                            <div class="stext-107 flex-w p-b-14">
                                <span class="m-r-3">
                                    <span class="cl4">
                                        By
                                    </span>

                                    <span class="cl5">
                                        Người viết
                                    </span>
                                </span>

                                <span>
                                    <span class="cl4">
                                        on
                                    </span>

                                    <span class="cl5">
                                        Ngày viết
                                    </span>
                                </span>
                            </div>

                            <h4 class="p-b-12">
                                <a href="index.php?action=detail&id=<?php echo $km['MaKM'] ?>" class="mtext-101 cl2 hov-cl1 trans-04">
                                    <?php echo $km['TieuDe'] ?>
                                </a>
                            </h4>

                            <p class="stext-108 cl6">
                                <?php echo mb_substr($km["MoTa"], 0, 100) . "..."; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>