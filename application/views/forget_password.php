<section class="background-login">
    <div class="login-container <?php echo isset($active) ? 'active' : ''; ?>">
        <div class="user signin-box">
            <div class="form-box">
                <form action="<?= base_url('Account/ForgetPassword') ?>" method="POST">
                    <h2>Quên mật khẩu</h2>
                    <input type="email" name="email" placeholder="Vui lòng nhập Email" required>
                    <p class="error">
                        <?php echo $this->session->tempdata('alert'); ?>
                    </p>
                    <button type="submit" name="submit-button">Tiếp tục</button>
                </form>

            </div>

            <div class="img-box">
                <img src="<?= base_url('assets/images/forgot-password.png') ?>" alt="" />
            </div>
        </div>

    </div>
</section>