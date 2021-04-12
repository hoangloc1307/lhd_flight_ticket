<h2>Tất cả bài viết</h2>
<div class="alert">
	<?php echo $this->session->tempdata('add_alert'); ?>
</div>
<section class="table news">
    <div class="grid">
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
        <ul class="pagination">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
        </ul>
    </div>
</section>
<script>
//Fetch
function fetch() {
    $.ajax({
        url: "<?= base_url() ?>admin/manage_news/fetch",
        dataType: "json",
        success: function(data) {
            var item = "";
            for (var i in data) {
                item += '<div class="row item">';
                item += '<div class="col l-1">' + data[i].News_ID + '</div>';
                item += '<div class="col l-2">';
                item += '<div class="imgBx">';
                item += '<img src="<?= base_url() ?>' + data[i].Image + '">';
                item += '</div>';
                item += '</div>';
                item += '<div class="news-name col l-3">' + data[i].Name + '</div>';
                item += '<div class="news-name col l-2">' + data[i].Category + '</div>';
                item += '<div class="col l-2">' + data[i].Date + '</div>';
                item += '<div class="col l-1">' + data[i].View + '</div>';
                item += '<div class="col l-1 action">';
                item += '<a href="#" class="button edit"><i class="fas fa-edit"></i></a>';
                item += '<a href="#" class="button delete" value="' + data[i].News_ID +
                    '"><i class="fas fa-trash"></i></a>';
                item += '</div>';
                item += '</div>';
            }
            $('.items').html(item);
        }
    });
}
fetch();
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
                    fetch();
                    toastr["success"](data.message);
                } else {
                    toastr["error"](data.message);
                }
            }
        });
    }
});
</script>
