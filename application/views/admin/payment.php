<h2>Phương thức thanh toán</h2>
<section class="table payment">
	<div class="grid">
		<div class="row">
			<div class="col l-12">
				<form action="">
					<div class="form-add">
						<label for="">Tên phương thức thanh toán
							<font color="red">*</font>
						</label>
						<input type="text" name="name" placeholder="Nhập...">
						<label for="">Nội dung:</label>
						<textarea class="payment-input" name="content" id="payment-content" cols="30"
							rows="10"></textarea>
						<button class="button-submit">Thêm mới</button>
					</div>
				</form>
			</div>
			<div class="list-payment col l-12">
				<div class="row heading">
					<div class="col l-2">STT</div>
					<div class="col l-8">Phương thức thanh toán</div>
					<div class="col l-2">Thao tác</div>
				</div>
				<div class="items">
					<div class="row item">
						<div class="col l-2">1</div>
						<div class="col l-8">Thanh toán tại văn phòng Flight Tickic</div>
						<div class="col l-2 action">
							<a href="#" value="" class="button edit"><i class="fas fa-edit"></i></a>
							<a href="#" value="" class="button delete"><i class="fas fa-trash"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
var editor = CKEDITOR.replace('payment-content');
CKFinder.setupCKEditor(editor);


//Xoá đối tác
$(document).on('click', '.button.delete', function(e) {
	e.preventDefault();
	var cfm = confirm("Bạn muốn xoá đối tác này?");
	if (cfm) {
		var name = $(this).attr('value');
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>admin/partner/delete",
			data: {
				name: name
			},
			dataType: "json",
			success: function(data) {
				if (data == 'Xoá thành công') {
					toastr["success"](data);
				} else {
					toastr["error"](data);
				}
			}
		});
		$(this).parents('.item').remove();
	}
});
</script>