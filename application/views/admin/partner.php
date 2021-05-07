<h2>Đối tác</h2>
<section class="table partner">
	<div class="grid">
		<div class="row">
			<div class="col l-3">
				<form action="">
					<div class="form-partner">
						<label>Tên đối tác</label>
						<input type="text" name="name" id="partner-name" placeholder="Tên đối tác">
					</div>
					<div class="form-partner">
						<label>Hình ảnh</label>
						<div class="partner-thumb">
							<img src="<?= base_url() ?>assets/images/no-image.png" alt="">
						</div>
						<input type="file" name="image" id="partner-image" placeholder="Hình ảnh">
					</div>
					<button type="submit" class="button-submit">Thêm mới</button>
				</form>
			</div>
			<div class="list-partner col l-9">
				<div class="row heading">
					<div class="col l-2">STT</div>
					<div class="col l-3">Ảnh</div>
					<div class="col l-5">Tên đối tác</div>
					<div class="col l-2">Thao tác</div>
				</div>
				<div class="items">
				</div>
			</div>
		</div>
	</div>
</section>
<script>
$('#add-partner-btn').click(function() {
	var isOK = true;
	$('.partner input').each(function() {
		if ($(this).val() == '') {
			$(this).focus();
			isOK = false;
			toastr["error"]($(this).attr('placeholder') + " không được để trống");
			return false;
		}
	});
	if (isOK) {
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>admin/partner/add",
			data: {
				name: $('#partner-name').val(),
				image: $('#partner-image').prop('files')[0]
			},
			dataType: "text",
			success: function(response) {
				console.log(response);
			}
		});
	}
});
</script>