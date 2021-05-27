<section class="background-login step-2">
    <div class="login-container">

        <div class="user signin-box">
            <div class="form-box">
                <form>
                    <h2>Mã xác thực</h2>
                    <p>Kiểm tra email để lấy mã xác thực</p>
                    <input type="text" name="code" placeholder="Vui lòng nhập mã xác thực">
                    <a href="#">Gửi lại mã xác thực</a>
                    <button>OK</button>
                </form>
            </div>

            <div class="img-box">
                <img src="<?php echo base_url(); ?>assets/images/verification.png" alt="" />
            </div>
        </div>
    </div>
</section>
<section class="background-login step-3" style="display: none;">
    <div class="login-container">
        <div class="user signin-box">
            <div class="img-box">
                <img src="<?php echo base_url(); ?>assets/images/verification.png" alt="" />
            </div>
            <div class="form-box">
                <form>
                    <h2>Đổi mật khẩu</h2>
                    <input type="password" name="password" placeholder="Mật khẩu mới">
                    <input type="password" name="cfm-password" placeholder="Nhập lại mật khẩu mới">
                    <button>OK</button>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
$('.step-2 button').click(function(e) {
    e.preventDefault();
    if ($('.step-2 input[name="code"]').val() != '') {
        if ($('.step-2 input[name="code"]').val() == '<?= $this->session->tempdata('code') ?>') {
            $('.step-2').hide();
            $('.step-3').show();
        } else {
            toastr["error"]("Mã xác thực không chính xác.");
        }
    } else {
        toastr["error"]("Mã xác thực không được để trống");
        $('.step-2 input[name="code"]').focus();
    }
});

$('.step-3 button').click(function(e) {
    e.preventDefault();
    var isOK = true;
    $('.step-3 input').each(function() {
        if ($(this).val() == '') {
            toastr["error"]($(this).attr('placeholder') + " không được để trống");
            $(this).focus();
            isOK = false;
            return false;
        }
    });
    if (isOK) {
        if ($('input[name="password"]').val() == $('input[name="cfm-password"]').val()) {
            if ($('.step-2 input[name="code"]').val() == '<?= $this->session->tempdata('code') ?>') {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('account/restorepassword') ?>",
                    data: {
                        password: $('input[name="password"]').val()
                    },
                    dataType: "json",
                    success: function(data) {
                        toastr["success"](data);
                        <?php unset($_SESSION['email_forget'], $_SESSION['code'], $_SESSION['__ci_vars']); ?>
                        setTimeout(function() {
                            location.replace("<?= base_url() ?>login");
                        }, 1500);
                    }
                });
            }
        } else {
            toastr["error"]("Xác nhận mật khẩu không khớp");
        }
    }
});
</script>