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
				<input class="input-img" id="news-img-input" type="input" name='image'>
				<button class="button-img" id="ckfinder_input">Chọn hình ảnh</button>
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

var button1 = document.getElementById('ckfinder_input');
button1.onclick = function(e) {
	e.preventDefault();
	CKFinder.modal({
		chooseFiles: true,
		width: 800,
		height: 600,
		onInit: function(finder) {
			finder.on('files:choose', function(evt) {
				var file = evt.data.files.first();
				var output = document.getElementById('news-img-input');
				output.value = file.getUrl();

				// Show image khi chọn file xong.
				var img = document.querySelector(".news-thumb > img");
				img.src = file.getUrl();
			});
		}
	});
};
</script>