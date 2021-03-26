<h2>Tất cả tin tức</h2>
<?php foreach ($news as $news_item) : ?>
<div>
    <h3><?php echo $news_item['Name']; ?></h3>
    <p><?php echo $news_item['Description'] ?></p>
    <p><?php echo $news_item['Date'] ?></p>
    <p><?php echo $news_item['Content'] ?></p>
    <p><?php echo $news_item['Image'] ?></p>
    <a target="_blank"
        href="<?= base_url() . 'news/' . ($news_item['LinkCustom'] != '' ? $news_item['LinkCustom'] : $news_item['LinkDefault']) ?>">
        View article</a>
</div>
<?php endforeach; ?>