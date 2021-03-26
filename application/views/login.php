<section class="background-login">
    <div class="login-container <?php echo isset($active) ? 'active' : ''; ?>">

        <div class="user signin-box">
            <div class="form-box">
                <form action="<?php echo base_url(); ?>login/login" method="post">
                    <h2>Đăng nhập</h2>
                    <input type="text" name="username" placeholder="Tài khoản" required />
                    <input type="password" name="password" placeholder="Mật khẩu" required />
                    <button type="submit">Đăng nhập</button>
                    <p class="error"><?php echo isset($error_login) ? $error_login : ''; ?></p>
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
                <form action="<?php echo base_url(); ?>login/register" method="post">
                    <h2>Đăng ký</h2>
                    <input type="text" name="username" placeholder="Tài khoản" required />
                    <input type="password" name="password" placeholder="Mật khẩu" required />
                    <input type="password" name="cfpassword" placeholder="Nhập lại mật khẩu" required />
                    <input type="email" name="email" placeholder="Email" required />
                    <input type="text" name="phone" placeholder="Số điện thoại" required />
                    <button type="submit">Đăng ký</button>
                    <p class="error"><?php echo isset($error_register) ? $error_register : ''; ?></p>
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
}
</script>