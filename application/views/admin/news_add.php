<form action="<?= base_url() ?>admin/news/add" method="post" enctype="multipart/form-data">
    <label for="">
        Tên bài viết
        <input type="text" name="name" id="">
    </label>
    <label for="">
        Hình ảnh
        <input type="file" name='image'>
    </label>
    <label for="">
        Danh mục
        <select name="category" id="">
            <?php foreach ($category as $item) : ?>
            <option value="<?= $item['News_Category_ID'] ?>"><?= $item['Name'] ?></option>
            <?php endforeach; ?>
        </select>
    </label>
    <label for="">
        Mô tả ngắn
        <input type="text" name="description" id="">
    </label>
    <label for="">
        Nội dung
        <textarea name="content" id="" cols="30" rows="10"></textarea>
    </label>
    <label for="">
        Đường dẫn tuỳ chỉnh
        <input type="text" name="linkcustom" id="">
    </label>
    <button type="submit" name="submit">Thêm mới</button>
</form>