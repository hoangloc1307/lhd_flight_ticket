<h2>Tất cả bài viết</h2>
<?php foreach ($news as $new) : ?>
<div>
    <img src="<?= $new['Image'] ?>">
    <h3><?= $new['Name'] ?></h3>
    <p><?= $new['Description'] ?></p>
    <a href="<?= base_url() . 'news/' . ($new['LinkCustom'] != '' ? $new['LinkCustom'] : $new['LinkDefault']) ?>">Chi
        tiết</a>
    <p>Ngày đăng: <?= $new['Date'] ?></p>
</div>
<?php endforeach; ?>