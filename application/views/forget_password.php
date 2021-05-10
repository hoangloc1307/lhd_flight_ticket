<div class="step-1">
    <label for="">
        Nhập email:
        <input type="email" name="email">
    </label>
    <button name="next-step-1">Tiếp tục</button>
</div>
<div class="step-2" style="display: none;">
    <label for="">
        Nhập mã xác minh (Vui lòng kiểm tra email để lấy mã xác minh):
        <input type="text" name="code">
    </label>
    <button name="next-step-2">Tiếp tục</button>
</div>
<div class="step-3" style="display: none;">
    <label for="">
        Mật khẩu
        <input type="password" name="password" placeholder="Mật khẩu">
    </label>
    <label for="">
        Nhập lại mật khẩu
        <input type="password" name="cfm-password" placeholder="Xác nhận mật khẩu">
    </label>
    <button name="next-step-3">Xác nhận</button>
</div>
<script>
$(document).on('click', 'button[name="next-step-1"]', function(e) {
    e.preventDefault();
    if ($('input[name="email"]').val() != '') {
        $('.loader-container').removeClass('hide');
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>account/forgetpassword",
            data: {
                email: $('input[name="email"]').val()
            },
            dataType: "json",
            success: function(response) {
                $('.loader-container').addClass('hide');
                if (response == "Vui lòng kiểm tra email để lấy mật khẩu mới") {
                    toastr["success"](response);
                    setTimeout(function() {
                        location.replace("<?= base_url() ?>");
                    }, 3000);
                } else {
                    toastr["error"](response);
                }
            }
        });
    } else {
        toastr["error"]("Vui lòng nhập email");
        $('.step-1 input[name="email"]').focus();
    }
});
</script>