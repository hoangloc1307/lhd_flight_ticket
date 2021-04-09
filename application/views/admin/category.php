<h2>Tat ca danh muc</h2>
<section class="category">
	<div class="grid">
		<div class="form">
			<label for="category-name">
				Tên danh mục
				<input type="text" name="name" id="category-name">
			</label>
			<button id="add-category-btn">Thêm mới</button>
		</div>
		<div class="row heading">
			<div class="col l-2">STT</div>
			<div class="col l-4">Tên danh mục</div>
			<div class="col l-4">Đường dẫn</div>
			<div class="col l-2">Thao tác</div>
		</div>
		<div class="items">
		</div>
	</div>

	<div id="edit_modal">
		<div class="modal-cate__close">
			<button class="button close"><i class="fas fa-times"></i></button>
		</div>
		<div class="modal-cate__content">

			<div class="modal-cate__ID">
				<label>
					<p>ID: </p>
					<input type="text" name="id" disabled>
				</label>
			</div>
			<div class="modal-cate__name">
				<label>
					<p>Tên danh mục: </p>
					<input type="text" name="name">
				</label>
			</div>
		</div>
		<div class="modal-cate__submit">
			<button class="button-submit button submit">Cập nhật</button>
		</div>
	</div>
	<div class="overlay"></div>

</section>

<script>
//Add Category
$('#add-category-btn').click(function() {
	if ($('#category-name').val() != '') {
		$.ajax({
			type: "post",
			url: '<?= base_url() ?>admin/news/addcategory',
			data: {
				name: $('#category-name').val()
			},
			dataType: "json",
			success: function(data) {
				fetch();

				if (data.response == 'success') {
					toastr["success"](data.message);

					toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": false,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "2000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				} else {
					toastr["error"](data.message);

					toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": false,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "2000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				}
			}
		});
	} else {
		$('#category-name').focus();
		toastr["error"]('Bạn phải nhập tên danh mục');

		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": false,
			"positionClass": "toast-top-right",
			"preventDuplicates": true,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "2000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	}
});

//Fetch Category
function fetch() {
	$.ajax({
		type: "post",
		url: '<?= base_url() ?>admin/news/fetchcategory',
		dataType: "json",
		success: function(data) {
			var item = "";
			var stt = 1;
			for (var i in data) {
				item += '<div class="row item">';
				item += '<div class="col l-2">' + stt++ + '</div>';
				item += '<div class="col l-4 name">';
				item += data[i]['Name'];
				item += '</div>';
				item += '<div class="col l-4 link">';
				item += '<a target="_blank" href="<?= base_url() . 'news/' ?>' + data[i]['Link'] +
					'">';
				item += data[i]['Link'] + '</a>';
				item += '</div>';
				item += '<div class="col l-2 action">';
				item += '<a href="#" class="button edit" value="' + data[i]['News_Category_ID'] +
					'">';
				item += '<i class="fas fa-edit"></i>';
				item += '</a>';
				item += '<a href="#" class="button delete" value="' + data[i]['News_Category_ID'] +
					'">';
				item += '<i class="fas fa-trash"></i>';
				item += '</a>';
				item += '</div>';
				item += '</div>';
			}
			$('.items').html(item);
		}
	});
}
fetch();

//Delete Category
$(document).on('click', '.button.delete', function(e) {
	e.preventDefault();
	var id = $(this).attr('value');
	var cfm = confirm("Bạn có chắc muốn xoá danh mục này?");
	if (cfm == true) {
		$.ajax({
			type: "post",
			url: "<?= base_url() ?>admin/news/deletecategory",
			dataType: "json",
			data: {
				id: id
			},
			success: function(data) {
				fetch();
				if (data.response == 'success') {
					toastr["success"](data.message);

					toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": false,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "2000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				} else {
					toastr["error"](data.message);

					toastr.options = {
						"closeButton": true,
						"debug": false,
						"newestOnTop": false,
						"progressBar": false,
						"positionClass": "toast-top-right",
						"preventDuplicates": false,
						"onclick": null,
						"showDuration": "300",
						"hideDuration": "1000",
						"timeOut": "2000",
						"extendedTimeOut": "1000",
						"showEasing": "swing",
						"hideEasing": "linear",
						"showMethod": "fadeIn",
						"hideMethod": "fadeOut"
					}
				}
			}
		});
	}
});

//Edit Category
//Show modal
$(document).on('click', '.button.edit', function(e) {
	e.preventDefault();
	$('#edit_modal').addClass('show');
	$.ajax({
		type: "post",
		url: "<?= base_url() ?>admin/news/editcategory",
		data: {
			id: $(this).attr('value')
		},
		dataType: "json",
		success: function(data) {
			$('#edit_modal input[name="id"]').val(data.category.News_Category_ID);
			$('#edit_modal input[name="name"]').val(data.category.Name);
		}
	});
});
//Click close button
$('#edit_modal + .overlay').click(function() {
	$('#edit_modal .button.close').trigger('click');
});
$('#edit_modal .button.close').click(function() {
	$('#edit_modal').removeClass('show');
});
//Click submit button
$('#edit_modal .button.submit').click(function() {

	var id = $('#edit_modal input[name="id"]').val();
	var name = $('#edit_modal input[name="name"]').val();

	if (name == "") {
		alert("Tên danh mục không được để trống");
		$('#edit_modal input[name="name"]').focus();
	} else {
		$.ajax({
			type: "post",
			url: "<?= base_url() ?>admin/news/updatecategory",
			data: {
				id: id,
				name: name
			},
			dataType: "json",
			success: function(data) {
				$('#edit_modal .button.close').trigger('click');
				fetch();
				toastr["success"](data.message);

				toastr.options = {
					"closeButton": true,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "2000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			}
		});
	}
});
</script>