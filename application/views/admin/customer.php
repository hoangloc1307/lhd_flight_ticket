<h2>Danh sách khách hàng</h2>
<section class="table customer">
    <div class="grid">
        <div class="search-form">
            <input type="text" placeholder="Tìm kiếm">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="row heading">
            <div class="col l-1">
                <span>STT</span>
            </div>
            <div class="col l-3">
                <span>Họ & Tên</span>
            </div>
            <div class="col l-2">
                <span>Số điện thoại</span>
            </div>
            <div class="col l-2">
                <span>Email</span>
            </div>
            <div class="col l-4" style="text-align: right">
                <span>Địa chỉ</span>
            </div>
        </div>
        <div class="items">
        </div>

        <div class="view-more">
            <button>Xem thêm</button>
        </div>
    </div>
</section>

<script>
var myobj = {
    "offset": 0,
    "stt": 1
};

function fetch() {
    $.ajax({
        type: "post",
        url: "<?= base_url("admin/Customer/Fetch") ?>",
        data: {
            offset: myobj["offset"]
        },
        dataType: "json",
        success: function(data) {
            var txt = "";
            for (i in data) {
                txt += '<div class="row item">';
                txt += '<div class="col l-1"><span>' + myobj["stt"] + '</span></div>';
                txt += '<div class="col l-3"><span>' + data[i].Name + '</span></div>';
                txt += '<div class="col l-2"><span>' + data[i].Phone + '</span></div>';
                txt += '<div class="col l-2"><span>' + data[i].Email +
                    '</span></div>';
                txt += '<div class="col l-4" style="text-align: right"><span>' + data[i].Address +
                    '</span></div>';
                txt += '</div>';
                myobj["stt"]++;
            }
            $(".customer .items").append(txt);
            myobj["offset"] += 10;
        }
    });
}
fetch();

$(document).on('click', '.search-form button', function(e) {
    e.preventDefault();
    if ($(".search-form input").val().length > 0) {
        $.ajax({
            type: "post",
            url: "<?= base_url('admin/Customer/Search') ?>",
            data: {
                keyword: $(".search-form input").val()
            },
            dataType: "JSon",
            success: function(data) {
                var txt = "";
                var stt = 1;
                if (data != "Không tìm thấy kết quả!") {
                    for (var i in data) {
                        txt += '<div class="row item">';
                        txt += '<div class="col l-1"><span>' + stt + '</span></div>';
                        txt += '<div class="col l-3"><span>' + data[i].Name +
                            '</span></div>';
                        txt += '<div class="col l-2"><span>' + data[i].Phone +
                            '</span></div>';
                        txt += '<div class="col l-2"><span>' + data[i].Email +
                            '</span></div>';
                        txt += '<div class="col l-4" style="text-align: right"><span>' +
                            data[i].Address +
                            '</span></div>';
                        txt += '</div>';
                        stt++;
                    }
                } else {
                    txt += '<div class="empty">' + data + '</div>';
                }
                $('.items').html(txt);
                $('.view-more').remove();
            }
        });
    } else {
        toastr["error"]("Vui lòng nhập từ khoá");
        $('.search-form input').focus();
    }
});

$(document).on("click", '.view-more button', function(e) {
    e.preventDefault();
    fetch();
});
</script>