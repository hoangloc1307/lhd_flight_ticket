<h2>Tại sao chọn chúng tôi</h2>
<form action="<?= base_url() ?>admin/whychooseus/edit" method="post" enctype="multipart/form-data">

	<div class="row">
		<?php
		foreach ($dulieu as $value) :
		?>

		<div class="why col l-6">
			<h3><?= $value['Title'] ?></h3>
			<div class="why-wrap">
				<div class="why-col">
					<div class="why-wrap-img">
						<h4 class="why-title">
							Hình ảnh
						</h4>
						<div class="why-img">
							<img src="<?= base_url() . $value['Image'] ?>" alt="">
						</div>
					</div>
					<div class="why-file">
						<input type="file" name="image[]">
					</div>
					<input type="hidden" name="oldfile[]" value="<?= $value['Image'] ?>">
				</div>
				<div class="why-col">
					<h4 class="why-title">
						Tiêu đề
					</h4>
					<div class="why-text">
						<input class="" type="text" name="title[]" value="<?= $value['Title'] ?>">
					</div>
				</div>
			</div>

			<div class="why-wrap-content">

				<h4 class="why-title">
					Nội dung
				</h4>
				<textarea class="why-content" name="content[]" id="" cols="30"
					rows="10"><?= $value['Content'] ?></textarea>
			</div>
		</div>



		<?php
		endforeach;
		?>

	</div>
	<button class="button-submit" type="submit">Cập nhật</button>
</form>