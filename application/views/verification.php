<section class="background-login">
	<div class="login-container <?php echo isset($active) ? 'active' : ''; ?>">

		<div class="user signin-box">
			<div class="form-box">
				<form>
					<h2>Mã xác thực</h2>
					<input type="text" name="text" placeholder="Vui lòng nhập mã xác thực">
					<a href="#">Gửi lại mã xác thực</a>
					<button name="">OK</button>
				</form>
			</div>

			<div class="img-box">
				<img src="<?php echo base_url(); ?>assets/images/verification.png" alt="" />
			</div>
		</div>

	</div>
</section>