<h2>Phương thức thanh toán</h2>
<section class="table payment">
    <div class="grid">
        <div class="row">
            <div class="col l-12">
                <form>
                    <div class="form-add">
                        <label for="">Tên phương thức thanh toán
                            <font color="red">*</font>
                        </label>
                        <input type="text" name="name" placeholder="Nhập...">
                        <label for="">Nội dung:</label>
                        <textarea class="payment-input" name="content" id="payment-content" cols="30"
                            rows="10"></textarea>
                        <button class="button-submit add">Thêm mới</button>
                        <button class="button-submit update" style="display: none;">Lưu</button>
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
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var editor = CKEDITOR.replace('payment-content');
CKFinder.setupCKEditor(editor);

//Fetch
function fetch() {
    $.ajax({
        type: "POST",
        url: "<?= base_url('admin/payment/fetch') ?>",
        dataType: "json",
        success: function(data) {
            var txt = "";
            for (i in data) {
                txt += "<div class='row item'>";
                txt += "<div class='col l-2'>" + (parseInt(i) + 1) + "</div>";
                txt += "<div class='col l-8 name'>" + data[i].Name + "</div>";
                txt += "<div class='col l-2 action'>";
                txt += "<input type='hidden' value='" + data[i].Content + "'>";
                txt += "<a href='#' class='button edit'><i class='fas fa-edit'></i></a>";
                txt += "<a href='#' name='" + data[i].Name +
                    "' class='button delete'><i class='fas fa-trash'></i></a>";
                txt += "</div></div>";
            }
            $('.items').html(txt);
        }
    });
}
fetch();

//Thêm
$('.button-submit.add').click(function(e) {
    e.preventDefault();
    var isOK = true;
    if ($('input[name="name"]').val() != '') {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/payment/add') ?>",
            data: {
                name: $('input[name="name"]').val(),
                content: CKEDITOR.instances['payment-content'].getData()
            },
            dataType: "json",
            success: function(data) {
                if (data == "Thêm thành công") {
                    toastr["success"](data);
                    CKEDITOR.instances['payment-content'].setData('');
                    $('input[name="name"]').val('');
                    fetch();
                } else {
                    toastr["error"](data);
                }
            }
        });
    } else {
        toastr["error"]("Tên không được để trống");
    }
});

//Xoá
$(document).on('click', '.button.delete', function(e) {
    e.preventDefault();
    var cfm = confirm("Bạn có chắc muốn xoá phương thức này");
    if (cfm == true) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/payment/delete') ?>",
            data: {
                name: $(this).attr('name')
            },
            dataType: "json",
            success: function(data) {
                if (data == "Xoá thành công") {
                    toastr["success"](data);
                    fetch();
                } else {
                    toastr["error"](data);
                }
            }
        });
    }
})

//Sửa
$(document).on('click', '.button.edit', function(e) {
    e.preventDefault();
    $('input[name="name"]').val($(this).parents('.item').find('.name').text());
    CKEDITOR.instances['payment-content'].setData($(this).parent().find('input[type="hidden"]').attr('value'));
    $(document).scrollTop('0');
    $('.button-submit.add').hide();
    $('.button-submit.update').show();
});

$(document).on('click', '.button-submit.update', function(e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "<?= base_url('admin/payment/update') ?>",
        data: {
            name: $('input[name="name"]').val(),
            content: CKEDITOR.instances['payment-content'].getData()
        },
        dataType: "json",
        success: function(data) {
            if (data == "Sửa thành công") {
                toastr["success"](data);
                fetch();
                CKEDITOR.instances['payment-content'].setData('');
                $('input[name="name"]').val('');
                $('.button-submit.add').show();
                $('.button-submit.update').hide();
            } else {
                toastr["error"](data);
            }
        }
    });
});
</script>