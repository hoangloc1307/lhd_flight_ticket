<section class="background-login">
	<div class="login-container <?php echo isset($active) ? 'active' : ''; ?>">

		<div class="user signin-box">
			<div class="form-box">
				<form>
					<h2>Quên mật khẩu</h2>
					<input type="email" name="email" placeholder="Vui lòng nhập Email">
					<button name="next-step-1">Tiếp tục</button>
				</form>
			</div>

			<div class="img-box">
				<img src="<?php echo base_url(); ?>assets/images/forgot-password.png" alt="" />
			</div>
		</div>

	</div>
</section>



<script>
$(document).on('click', 'button[name="next-step-1"]', function(e) {
	e.preventDefault();
	if ($('input[name="email"]').val() != '') {
		$('.loader-container').removeClass('hide');
		$.ajax({
			type: "POST",
			url: "<?= base_url() ?>account/forgotpassword",
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