<section class="background-login">
    <div class="login-container <?php echo isset($active) ? 'active' : ''; ?>">
        <div class="user signin-box">
            <div class="form-box">
                <form action="<?= base_url('account/forgetpassword') ?>" method="POST">
                    <h2>Quên mật khẩu</h2>
                    <input type="email" name="email" placeholder="Vui lòng nhập Email" required>
                    <button type="submit" name="submit-button">Tiếp tục</button>
                </form>
                <div class="alert">
                    <?php echo $this->session->tempdata('alert'); ?>
                </div>
            </div>

            <div class="img-box">
                <img src="<?php echo base_url(); ?>assets/images/forgot-password.png" alt="" />
            </div>
        </div>

    </div>
</section>