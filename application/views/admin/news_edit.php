<h2>Chỉnh sửa bài viết</h2>
<form action="<?= base_url('admin/news/edit/') . $news['News_ID'] ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="news-file col l-3">
            <label class="news-img" for="">
                <div class="news-title">
                    Hình ảnh
                </div>
                <div class="news-thumb">
                    <img src="<?= base_url() . ($news['Image'] == 'assets/images/news/' ? 'assets/images/no-image.png' : $news['Image']) ?>"
                        alt="">
                    <input type="hidden" name="oldfile" value="<?= $news['Image'] ?>">
                </div>
                <input id="news-img-input" type="file" name='image'>
            </label>
            <label class="news-linkcustom" for="">
                <div class="news-title">
                    Đường dẫn tuỳ chỉnh
                </div>
                <input class="news-input" type="text" name="linkcustom" placeholder="/"
                    value="<?= ($news['LinkCustom'] == '' ? '' : $news['LinkCustom']) ?>">
            </label>
        </div>
        <div class="news-create col l-9 ">
            <label class="news-name" for="">
                <div class="news-title">
                    Tên bài viết
                    <font color="red">*</font>
                </div>
                <input required class="news-input" type="text" name="name" value='<?= $news["Name"] ?>'>
            </label>
            <label class="news-category" for="">
                <div class="news-title">
                    Danh mục
                </div>
                <select class="news-input" name="category">
                    <?php foreach ($category as $item) : ?>
                    <option value="<?= $item['News_Category_ID'] ?>"><?= $item['Name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="news-description" for="">
                <div class="news-title">
                    Mô tả ngắn
                </div>
                <textarea class="news-input" type="text" name="description"><?= $news['Description'] ?></textarea>
            </label>


        </div>
    </div>
    <div class="row">
        <div class="col l-12">
            <label class="news-content" for="">
                <div class="news-title">
                    Nội dung
                </div>
                <textarea class="news-input" name="content" id="news-content" cols="30"
                    rows="10"><?= $news['Content'] ?></textarea>
            </label>
        </div>
    </div>
    <button class="button-submit" type="submit" name="submit">Lưu</button>
</form>
<script>
$(document).ready(function() {
    var editor = CKEDITOR.replace('news-content');
    CKFinder.setupCKEditor(editor);


    // Show image khi chọn file xong.
    $("#news-img-input").change(function() {
        var input = document.getElementById("news-img-input");
        var fReader = new FileReader();
        fReader.readAsDataURL(input.files[0]);
        fReader.onloadend = function(event) {
            var img = document.querySelector(".news-thumb > img");
            img.src = event.target.result;
        }
    });

    $('select[name="category"] option').each(function() {
        if ($(this).attr('value') == <?= $news['Category'] ?>) {
            $(this).attr('selected', true);
            return false;
        }
    });
});
</script>