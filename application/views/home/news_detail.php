<?php /*?>

<h2><?= $news['Name'] ?></h2>
<img src="<?= $new['Image'] ?>" alt="">
<p><?= $new['Description'] ?></p>
<p><?= $new['Content'] ?></p>
<p>Ngày đăng: <?= $new['Date'] ?></p>
<p>Lượt xem: <?= $new['View'] ?></p>
<p><?php var_dump($new['LinkCustom']); ?></p>

*/ ?>

<section id="news-detail">
    <div class="grid wide">
        <div class="row">
            <div class="col l-8 m-8 c-12 news-detail">
                <h2 class="title">
                    <?= $news['Name'] ?>
                </h2>
                <div class="detail">
                    <?= $news['Content'] ?>
                </div>
                <p class="date">
                    <?= $news['Date'] ?>
                </p>
            </div>
            <div class="col l-4 m-4 c-12 news-related">
                <div class="news-related-wrap">
                    <h4 class="related-title">
                        Tin tức liên quan
                    </h4>
                    <ul class="related-list">
                        <li class="related-item">
                            <a href="#" class="related-thumb">
                                <img src="<?= base_url() ?>assets/images/favorite/hoian.jpg" alt="">
                            </a>
                            <h4 class="related-heading">
                                <a href="#" target="_blank" title="">Tư vấn hỗ trợ đặt vé Tư vấn hỗ trợ đặt
                                    vé</a>
                            </h4>
                        </li>
                        <li class="related-item">
                            <a href="#" class="related-thumb">
                                <img src="<?= base_url() ?>assets/images/favorite/hoian.jpg" alt="">
                            </a>
                            <h4 class="related-heading">
                                <a href="#" target="_blank" title="">Tư vấn hỗ trợ đặt vé Tư vấn hỗ trợ đặt
                                    vé</a>
                            </h4>
                        </li>
                        <li class="related-item">
                            <a href="#" class="related-thumb">
                                <img src="<?= base_url() ?>assets/images/favorite/hoian.jpg" alt="">
                            </a>
                            <h4 class="related-heading">
                                <a href="#" target="_blank" title="">Tư vấn hỗ trợ đặt vé Tư vấn hỗ trợ đặt
                                    vé</a>
                            </h4>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>