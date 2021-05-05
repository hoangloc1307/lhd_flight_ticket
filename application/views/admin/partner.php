<h2>Đối tác</h2>
<section class="table partner">
    <div class="grid">
        <div class="partner-add">
            <label for="">
                Tên đối tác
                <input type="text" name="name" id="partner-name" placeholder="Tên">
            </label>
            <label for="">
                Hình ảnh
                <input type="file" name="image" id="partner-image" placeholder="Hình ảnh">
            </label>
            <button id="add-partner-btn">Thêm mới</button>
        </div>
        <div class="row heading">
            <div class="col l-2">STT</div>
            <div class="col l-3">Ảnh</div>
            <div class="col l-5">Tên đối tác</div>
            <div class="col l-2">Thao tác</div>
        </div>
        <div class="items">
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