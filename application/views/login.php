<section class="background-login">
    <div class="login-container <?php echo isset($active) ? 'active' : ''; ?>">

        <div class="user signin-box">
            <div class="form-box">
                <form>
                    <h2>Đăng nhập</h2>
                    <input type="text" name="email" placeholder="Email" required />
                    <input type="password" name="password" placeholder="Mật khẩu" required />
                    <button id='btn_login'>Đăng nhập</button>
                    <p class="error"></p>
                    <p class="signup">
                        Bạn chưa có tài khoản?
                        <a onclick="toggleForm()">Đăng ký</a>
                    </p>
                </form>
            </div>

            <div class="img-box">
                <img src="<?php echo base_url(); ?>assets/images/signin.png" alt="" />
            </div>
        </div>

        <div class="user signup-box">
            <div class="img-box">
                <img src="<?php echo base_url(); ?>assets/images/signup.png" alt="" />
            </div>

            <div class="form-box">
                <form>
                    <h2>Đăng ký</h2>
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="number" name="phone" placeholder="Số điện thoại" required />
                    <input type="password" name="password" placeholder="Mật khẩu" required />
                    <input type="password" name="cfpassword" placeholder="Nhập lại mật khẩu" required />
                    <button id="btn_register">Đăng ký</button>
                    <p class="error"></p>
                    <p class="signin">
                        Bạn đã có tài khoản!
                        <a onclick="toggleForm()">Đăng nhập</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Script -->
<script type="text/javascript">
function toggleForm() {
    var login = document.querySelector(".login-container");
    login.classList.toggle("active");
    if ($('.login-container').hasClass("active")) {
        $('head title').text('Flight Ticket - Đăng ký');
    } else {
        $('head title').text('Flight Ticket - Đăng nhập');
    }
}
//Đăng nhập
$('#btn_login').click(function(e) {
    e.preventDefault();
    var isOK = true;
    $('.signin-box form input').each(function() {
        if ($(this).val() == '') {
            isOK = false;
            toastr["error"]($(this).attr('placeholder') + ' không được để trống');
            $(this).focus();
            return false;
        }
    });
    if (isOK) {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>login/login",
            data: {
                email: $('.signin-box input[name="email"]').val(),
                password: $('.signin-box input[name="password"]').val()
            },
            dataType: "json",
            success: function(data) {
                if (data == "OK") {
                    location.replace("<?= base_url() ?>");
                } else {
                    toastr["error"](data);
                }
            }
        });
    }
});

//Đăng ký
$('#btn_register').click(function(e) {
    e.preventDefault();
    var isOK = true;
    //Kiểm tra rỗng
    $('.signup-box form input').each(function() {
        if ($(this).val() == '') {
            isOK = false;
            toastr["error"]($(this).attr('placeholder') + ' không được để trống');
            $(this).focus();
            return false;
        }
    });
    //Kiểm tra định dạng email
    if (new RegExp(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/).test($(
            '.signup-box input[name="email"]').val()) == false) {
        toastr["error"]('Email không đúng định dạng');
        isOK = false;
    }
    //Kiểm tra xác nhận mật khẩu
    if ($('.signup-box input[name="password"]').val() != $('.signup-box input[name="cfpassword"]').val()) {
        isOK = false;
        toastr["error"]('Xác nhận mật khẩu không đúng');
    }
    if (isOK) {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>login/register",
            data: {
                email: $('.signup-box input[name="email"]').val(),
                phone: $('.signup-box input[name="phone"]').val(),
                password: $('.signup-box input[name="password"]').val()
            },
            dataType: "json",
            success: function(data) {
                if (data == 'OK') {
                    toastr["success"]('Tạo tài khoản thành công');
                    setTimeout(function() {
                        location.replace("<?= base_url() ?>login");
                    }, 2000);
                } else {
                    toastr["error"](data);
                }
            }
        });
    }
});
</script>