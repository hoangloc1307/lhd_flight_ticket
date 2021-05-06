<h2>Tất cả bài viết</h2>
<div class="alert">
	<?php echo $this->session->tempdata('add_alert'); ?>
</div>
<section class="table news">
	<div class="grid">
		<div class="search-from">
			<input type="text" placeholder="Tìm kiếm">
			<button><i class="fas fa-search"></i></button>
		</div>
		<div class="row heading">
			<div class="col l-1">ID</div>
			<div class="col l-2">Ảnh</div>
			<div class="col l-3">Tên bài viết</div>
			<div class="col l-2">Danh mục</div>
			<div class="col l-2">Ngày đăng</div>
			<div class="col l-1">Lượt xem</div>
			<div class="col l-1">Thao tác</div>
		</div>
		<div class="items">
		</div>
		<div class="view-more">
			<button>View More</button>
		</div>
	</div>
</section>

<script>
//Fetch
function fetch(offset) {
	$.ajax({
		url: "<?= base_url() ?>admin/manage_news/fetch/",
		dataType: "json",
		type: 'post',
		data: {
			offset: offset['offset']
		},
		success: function(data) {
			//Đổ dự liệu ra
			var item = "";
			for (var i in data['news']) {
				item += '<div class="row item">';
				item += '<div class="col l-1">' + data['news'][i].News_ID + '</div>';
				item += '<div class="col l-2">';
				item += '<div class="imgBx">';
				item += '<img src="<?= base_url() ?>' + data['news'][i].Image + '">';
				item += '</div>';
				item += '</div>';
				item += '<div class="news-name col l-3">' + data['news'][i].Name + '</div>';
				item += '<div class="news-name col l-2">' + data['news'][i].Category + '</div>';
				item += '<div class="col l-2">' + data['news'][i].Date + '</div>';
				item += '<div class="col l-1">' + data['news'][i].View + '</div>';
				item += '<div class="col l-1 action">';
				item += '<a href="#" class="button edit"><i class="fas fa-edit"></i></a>';
				item += '<a href="#" class="button delete" value="' + data['news'][i].News_ID +
					'"><i class="fas fa-trash"></i></a>';
				item += '</div>';
				item += '</div>';
			}
			$('.items').append(item);
			offset['offset'] += 5;
			offset['total'] = data['total'];
		}
	});
}
var myObj = {
	offset: 0,
	total: 0
};
fetch(myObj);

//Bám nút xem thêm
$(document).on('click', '.view-more button', function(e) {
	e.preventDefault();
	if (myObj['offset'] + 5 >= myObj['total']) {
		$(this).remove();
	}
	fetch(myObj);
});

//Delete
$(document).on('click', '.button.delete', function(e) {
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
				if (data.response == 'success') {
					toastr["success"](data.message);
				} else {
					toastr["error"](data.message);
				}
			}
		});
		$(this).parents('.item').remove();
	}
});
</script>