<section class="info-card">
    <div class="grid">
        <div class="row">
            <div class="col l-3">
                <div class="block">
                    <div class="row">
                        <div class="content col l-8">
                            <p><?= $number_of_news ?></p>
                            <p>Bài viết</p>
                        </div>
                        <div class="block_icon col l-4">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-3">
                <div class="block">
                    <div class="row">
                        <div class="content col l-8">
                            <p><?= $number_of_customer ?></p>
                            <p>Khách hàng</p>
                        </div>
                        <div class="block_icon col l-4">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-3">
                <div class="block">
                    <div class="row">
                        <div class="content col l-8">
                            <p><?= $number_of_order ?></p>
                            <p>Hoá đơn đặt vé</p>
                        </div>
                        <div class="block_icon col l-4">
                            <i class="fas fa-scroll"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-3">
                <div class="block">
                    <div class="row">
                        <div class="content col l-8">
                            <p>9</p>
                            <p>Đối tác</p>
                        </div>
                        <div class="block_icon col l-4">
                            <i class="fas fa-handshake"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="info-table">
    <div class="grid">
        <div class="row">
            <div class="col l-8">
                <div class="table news">
                    <div class="row link">
                        <div class="col l-9">
                            <h3>Bài viết mới nhất</h3>
                        </div>
                        <div class="col l-3 button">
                            <a href="<?= base_url() ?>admin/news">
                                Xem tất cả <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row heading">
                        <div class="col l-6 name">Tên bài viết</div>
                        <div class="col l-4">Ngày đăng</div>
                        <div class="col l-2 view">Lượt xem</div>
                    </div>
                    <?php foreach ($news as $item) : ?>
                    <a href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>"
                        class="row item" target="_blank">
                        <div class="col l-6 name"><?= $item['Name'] ?></div>
                        <div class="col l-4"><?= $item['Date'] ?></div>
                        <div class="col l-2 view"><?= $item['View'] ?></div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col l-4">
                <div class="table customer"></div>
            </div>
        </div>
    </div>
</section>