<h2>Tất cả bài viết</h2>
<div class="alert">
    <?php echo $this->session->tempdata('add_alert'); ?>
</div>
<section class="news table">
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
        </ul>
    </div>
</section>

<script>
//Fetch
function fetch(page, update_pagination = false) {
    $.ajax({
        url: "<?= base_url() ?>admin/manage_news/fetch/",
        dataType: "json",
        type: 'post',
        data: {
            page: page
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
            $('.items').html(item);
            //Tạo phân trang
            if (update_pagination == true) {
                var pages = Math.ceil(data.total / 5);
                var page_num = "";
                for (var i = 0; i < pages; i++) {
                    page_num += '<li class="num" value="' + (i + 1) + '">' + (i + 1) + '</li>';
                }
                $('.pagination').html(page_num);
            }
        }
    });

    $('.pagination .num').each(function() {
        if ($(this).attr('value') == page) {
            $('.pagination .num').removeClass('active');
            $(this).addClass('active');
        }
    });
}

fetch(1, true);

//Click vào số trang
$(document).on('click', '.pagination .num', function() {
    fetch($(this).attr('value'));
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
                    fetch(1, true);
                    toastr["success"](data.message);
                } else {
                    toastr["error"](data.message);
                }
            }
        });
    }
});
</script>