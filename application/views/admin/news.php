<h2>Tất cả bài viết</h2>
<div class="alert">
    <?php echo $this->session->tempdata('add_alert'); ?>
</div>
<section class="news">
    <div class="grid">
        <div class="row heading">
            <div class="col l-1">ID</div>
            <div class="col l-2">Ảnh</div>
            <div class="col l-3">Tên bài viết</div>
            <div class="col l-2">Danh mục</div>
            <div class="col l-2">Ngày đăng</div>
            <div class="col l-1">Lượt xem</div>
            <div class="col l-1">Thao tác</div>
        </div>
        <?php foreach ($news as $row) : ?>
        <div class="row item">
            <div class="col l-1"><?= $row['News_ID'] ?></div>
            <div class="col l-2">
                <div class="imgBx">
                    <img src="<?= base_url() . $row['Image'] ?>" alt="<?= $row['Name'] ?>">
                </div>
            </div>
            <div class="news-name col l-3"><?= $row['Name'] ?></div>
            <div class="news-name col l-2"><?= $row['Category'] ?></div>
            <div class="col l-2"><?= $row['Date'] ?></div>
            <div class="col l-1"><?= $row['View'] ?></div>
            <div class="col l-1 action">
                <a href="#" class="button edit"><i class="fas fa-edit"></i></a>
                <a href="#" class="button delete" value="<?= $row['News_ID'] ?>"><i class="fas fa-trash"></i></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
<script>
$('.button.delete').click(function(e) {
    e.preventDefault();
    var del_id = $(this).attr('value');
    var cfr = confirm("Bạn muốn xoá bài viết này?");
    if (cfr == true) {
        $.ajax({
            url: '<?= base_url() ?>admin/news/delete',
            type: 'post',
            dataType: 'json',
            data: {
                id: del_id
            },
            success: function(data) {
                location.reload();
            }
        });
    }
});
</script>