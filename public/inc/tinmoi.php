<!--   Weekly-News start -->
<div class="weekly-news-area pt-50">
    <div class="container">
        <div class="weekly-wrapper">
            <!-- section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle mb-30">
                        <h3>Tin Moi</h3>
                    </div>
                </div>
            </div>
            <?php
            $url = "https://vnexpress.net/rss/tin-moi-nhat.rss";
            $xml = simplexml_load_file($url);
            $i = 0;
            //echo $xml->channel;
            // if ($sxe === false) {
            //     echo "Failed loading XML\n";
            //     foreach (libxml_get_errors() as $error) {
            //         echo "\t", $error->message;
            //     }
            // } else {
//                 <description>
// <![CDATA[ <a href="https://vnexpress.net/dung-cat-nhan-tao-thay-the-hoan-toan-cat-tu-nhien-khong-kha-thi-4717391.html">
//<img src="https://i1-vnexpress.vnecdn.net/2024/03/01/DSC4546JPG-1709302878-4428-1709303165.jpg?w=1200&h=0&q=100&dpr=1&fit=crop&s=PkkOtAsKhFCLs21jMIL6LA" >
//</a></br>
//Nếu dùng cát nhân tạo cần khai thác các mỏ đá với khối lượng lớn, bố trí nhiều dây chuyền sản xuất và giá thành cao hơn nhiều so với cát tự nhiên, theo Thủ tướng. ]]>
// </description>
            foreach ($xml->channel->item as $e) :
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="weekly-news-active dot-style d-flex dot-style">
                        <div class="weekly-single">
                            <div class="weekly-img">
                                <?php echo "$e->description <br>"; ?>
                                <!-- <img src="assets/img/news/weeklyNews2.jpg" alt=""> -->
                            </div>
                            <div class="weekly-caption">
                                <span class="color1">Strike</span>
                                <h4><a href="#"><?php echo "$e->title <br>"; ?></a></h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                $i++;
                if ($i > 5) {
                    break;
                }
            endforeach;
            //}
            ?>

        </div>
    </div>
</div>
<!-- End Weekly-News -->