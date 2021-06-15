<h2>Đối tác</h2>
<section class="table partner">
    <div class="grid">
        <div class="row">
            <div class="col l-3">
                <form action="">
                    <div class="form-partner">
                        <label>Tên đối tác
                            <font color="red">*</font>
                        </label>
                        <input type="text" name="name" id="partner-name" placeholder="Tên đối tác">
                    </div>
                    <div class="form-partner">
                        <label>Hình ảnh
                            <font color="red">*</font>
                        </label>
                        <div class="partner-thumb">
                            <img src="<?= base_url('assets/images/no-image.png') ?>" alt="">
                        </div>
                        <input class="input-img" id="partner-image" type="input" name='image'>
                        <button class="button-img" id="ckfinder_input">Chọn hình ảnh</button>
                    </div>
                    <button id="add-partner-btn" class="button-submit">Thêm mới</button>
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
                    <?php
                    $stt = 1;
                    foreach ($partners as $partner) : ?>
                    <div class="row item">
                        <div class="col l-2"><?= $stt ?></div>
                        <div class="col l-3">
                            <div class="imgBx">
                                <img src="<?= base_url($partner['Image']) ?>" alt="<?= $partner['Name'] ?>">
                            </div>
                        </div>
                        <div class="col l-5"><?= $partner['Name'] ?></div>
                        <div class="col l-2 action">
                            <a href="#" value="<?= $partner['Name'] ?>" class="button delete"><i
                                    class="fas fa-trash"></i></a>
                        </div>
                    </div>
                    <?php $stt++;
                    endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<script>
// // Show image khi chọn file xong.
// $(".form-partner input[type='file']").change(function() {
//     var input = document.querySelector(".form-partner input[type='file']");
//     var fReader = new FileReader();
//     fReader.readAsDataURL(input.files[0]);
//     fReader.onloadend = function(event) {
//         var img = document.querySelector(".partner-thumb > img");
//         img.src = event.target.result;
//     }
// });
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
                var output = document.getElementById('partner-image');
                output.value = file.getUrl();

                // Show image khi chọn file xong.
                var img = document.querySelector(".partner-thumb > img");
                img.src = file.getUrl();
            });
        }
    });
};

//Thêm đối tác
$('#add-partner-btn').click(function(e) {
    e.preventDefault();
    var isOK = true;
    $('.form-partner input').each(function() {
        if ($(this).val() == '') {
            $(this).focus();
            isOK = false;
            toastr["error"]($(this).attr('placeholder') + " không được để trống");
            return false;
        }
    });
    if (isOK) {
        // var fd = new FormData();
        // var files = $('.form-partner input[type="file"]')[0].files[0];
        // fd.append('image', files);
        // fd.append('name', $('#partner-name').val());

        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/Partner/Add') ?>",
            data: {
                name: $('#partner-name').val(),
                image: $('#partner-image').val()
            },
            // contentType: false,
            // processData: false,
            dataType: "json",
            success: function(data) {
                if (data == 'Thêm thành công') {
                    toastr["success"](data);

                    //Đổ dữ liệu vô table
                    var txt = "";
                    txt += '<div class="row item">';
                    txt += '<div class="col l-2">' + (parseInt($(
                            '.items .item:last-child > div:first-child')
                        .text()) + parseInt(1)) + '</div>';
                    txt += '<div class="col l-3">';
                    txt += '<div class="imgBx">';
                    txt += '<img src="<?= base_url() ?>' + $('#partner-image').val() + '" alt="' +
                        $(
                            '#partner-name').val() + '">';
                    txt += '</div></div>';
                    txt += '<div class="col l-5">' + $('#partner-name').val() + '</div>';
                    txt += '<div class="col l-2 action">';
                    txt += '<a href="#" value="' + $('#partner-name').val() +
                        '" class="button delete"><i class="fas fa-trash"></i></a>';
                    txt += '</div></div>';
                    $('.items').append(txt);

                    //Xoá nội dung cũ
                    $('#partner-name').val('');
                    $('.partner-thumb img').prop('src',
                        '<?= base_url("assets/images/no-image.png") ?>');
                    $('#partner-image').val('');
                } else {
                    toastr["error"](data);
                }
            }
        });
    }
});

//Xoá đối tác
$(document).on('click', '.button.delete', function(e) {
    e.preventDefault();
    var cfm = confirm("Bạn muốn xoá đối tác này?");
    if (cfm) {
        var name = $(this).attr('value');
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/Partner/Delete') ?>",
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