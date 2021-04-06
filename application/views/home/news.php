<section id="news">
    <div class="grid wide">
        <div class="news-header">
            <div class="news-title">
                <h2>Tất cả bài viết</h2>
            </div>
            <div class="news-icon">
                <i class="far fa-newspaper"></i>
            </div>
        </div>
        <div class="row">
            <div class="col l-3 category">
                <h3 class="category-title"> Danh mục bài viết</h3>

                <ul class="category-list">
                    <?php foreach ($news_category as $item) : ?>
                    <li class="category-item">
                        <a href="<?= base_url() . 'news/' . $item['Link'] ?>"><?= $item['Name'] ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col l-9">
                <div class="row">
                    <?php foreach ($news as $item) : ?>
                    <div class="col l-4 m-4 s-6 news-item">
                        <div class="news-wrap">
                            <a href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>"
                                title="<?= $item['Name'] ?>" class="img-wrap">
                                <img src="<?= base_url() . $item['Image'] ?>">
                            </a>
                            <div class="heading-description">
                                <a href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>"
                                    class="news-heading" title="<?= $item['Name'] ?>">
                                    <?= $item['Name'] ?>
                                </a>
                                <p class="news-description">
                                    <?= $item['Description'] ?>
                                </p>
                                <div class="date-view">
                                    <p class="news-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <?= $item['Date'] ?>
                                    </p>
                                    <div class="news-view">
                                        <i class="far fa-eye"></i>
                                        <?= $item['View'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>