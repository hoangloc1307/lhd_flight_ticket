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
                    <h3 class="related-title">
                        Bài viết liên quan
                    </h3>
                    <ul class="related-list">
                        <?php foreach ($related_news as $item) : ?>
                        <li class="related-item">
                            <a href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>"
                                class="related-thumb">
                                <img src="<?= base_url() . $item['Image'] ?>">
                            </a>
                            <h4 class="related-heading">
                                <a href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>"
                                    title=""><?= $item['Name'] ?></a>
                            </h4>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</section>