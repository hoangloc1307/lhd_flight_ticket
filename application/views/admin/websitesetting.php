<h2>Thông tin website</h2>
<section class="setting">
    <form>
        <label for="">
            <div class="setting-title">
                Địa chỉ
            </div>

            <input type="text" name="address">
        </label>
        <label for="">
            <div class="setting-title">
                Email
            </div>

            <input type="mail" name="email">
        </label>
        <label for="">
            <div class="setting-title">
                Số điện thoại
            </div>
            <input type="text" name="phone">
        </label>
        <label for="">
            <div class="setting-title">
                Link Facebook
            </div>
            <input type="text" name="facebook">
        </label>
        <label for="">
            <div class="setting-title">
                Zalo
            </div>
            <input type="number" name="zalo">
        </label>
        <button id="websetting-submit" class="button-submit">Lưu</button>
    </form>
</section>
<script>
//Fetch
function fetch() {
    $.ajax({
        url: "<?= base_url('admin/WebsiteSetting/Fetch') ?>",
        dataType: "json",
        success: function(data) {
            $('input[name="address"]').val(data.Address);
            $('input[name="email"]').val(data.Email);
            $('input[name="phone"]').val(data.Phone);
            $('input[name="facebook"]').val(data.Facebook);
            $('input[name="zalo"]').val(data.Zalo);
        }
    });
}
fetch();
//Update
$('#websetting-submit').click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?= base_url() ?>admin/WebsiteSetting/Update",
        data: {
            address: $('input[name="address"]').val(),
            email: $('input[name="email"]').val(),
            phone: $('input[name="phone"]').val(),
            facebook: $('input[name="facebook"]').val(),
            zalo: $('input[name="zalo"]').val()
        },
        dataType: "json",
        success: function(data) {
            if (data.response == 'success') {
                fetch();
                toastr["success"](data.message);
            } else {
                toastr["error"](data.message);
            }
        }
    });
});
</script>