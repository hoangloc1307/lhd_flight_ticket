<h2>Thêm mới bài viết</h2>
<form action="<?= base_url() ?>admin/news/add" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="news-file col l-3">
            <label class="news-img" for="">
                <div class="news-title">
                    Hình ảnh
                </div>
                <div class="news-thumb">
                    <img src="<?= base_url() ?>assets/images/no-image.png" alt="">
                </div>
                <input id="news-img-input" type="file" name='image'>
            </label>
            <label class="news-linkcustom" for="">
                <div class="news-title">
                    Đường dẫn tuỳ chỉnh
                </div>
                <input class="news-input" type="text" name="linkcustom" id="" placeholder="/">
            </label>
        </div>
        <div class="news-create col l-9 ">
            <label class="news-name" for="">
                <div class="news-title">
                    Tên bài viết
                    <font color="red">*</font>
                </div>
                <input required class="news-input" type="text" name="name" id="">
            </label>
            <label class="news-category" for="">
                <div class="news-title">
                    Danh mục
                </div>
                <select class="news-input" name="category" id="">
                    <?php foreach ($category as $item) : ?>
                    <option value="<?= $item['News_Category_ID'] ?>"><?= $item['Name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label class="news-description" for="">
                <div class="news-title">
                    Mô tả ngắn
                </div>
                <textarea class="news-input" type="text" name="description" id=""></textarea>
            </label>


        </div>
    </div>
    <div class="row">
        <div class="col l-12">
            <label class="news-content" for="">
                <div class="news-title">
                    Nội dung
                </div>
                <textarea class="news-input" name="content" id="news-content" cols="30" rows="10"></textarea>
            </label>
        </div>
    </div>
    <button class="button-submit" type="submit" name="submit">Thêm mới</button>

</form>

<script>
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
// End
</script>