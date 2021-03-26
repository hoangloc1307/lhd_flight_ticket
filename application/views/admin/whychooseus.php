<h2>Tại sao chọn chúng tôi</h2>
<form action="<?= base_url() ?>admin/whychooseus/edit" method="post" enctype="multipart/form-data">
    <?php
    foreach ($dulieu as $value) :
    ?>
    <div>
        <h3><?= $value['Title'] ?></h3>
        <label> Hình ảnh
            <img src="<?= $value['Image'] ?>" alt="">
            <input type="file" name="image[]">
            <input type="hidden" name="oldfile[]" value="<?= $value['Image'] ?>">
        </label>
        <label> Tiêu đề
            <input type="text" name="title[]" value="<?= $value['Title'] ?>">
        </label>
        <label> Nội dung
            <textarea name="content[]" id="" cols="30" rows="10"><?= $value['Content'] ?></textarea>
        </label>
    </div>
    <?php
    endforeach;
    ?>
    <button type="submit">Cập nhật</button>
</form>