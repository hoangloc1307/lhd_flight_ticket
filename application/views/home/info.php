<section class="infouser">
	<div class="grid wide">
		<div class="row">
			<div class="col l-12">
				<div class="info-user">
					<h3 class="title"><i class="fas fa-info-circle"></i>Thông tin tài khoản</h3>
					<div class="row info-edit">
						<div class="col l-6 m-12 s-12">
							<form action="" class="info">
								<div class="form-group">
									<label for=""><i class="fas fa-user-edit"></i>Họ & Tên</label>
									<input class="input-edit" type="text" name="" id="" value=""
										placeholder="Truyền cái tên người dùng vào">
								</div>
								<div class="form-group">
									<label for=""><i class="fas fa-map-marker-alt"></i>Địa chỉ</label>
									<input class="input-edit" type="text" name="" id="" value=""
										placeholder="Truyền cái địa chỉ">
								</div>
								<div class="form-group">
									<label for=""><i class="fas fa-phone"></i>Số điện thoại</label>
									<input class="input-edit" type="number" name="" id="" value=""
										placeholder="Truyền cái số điện thoại">
								</div>
								<div class="form-group">
									<label for=""><i class="far fa-envelope"></i>Email</label>
									<input class="input-edit" type="date" name="" id="" value=""
										placeholder="Truyền cái Email">
								</div>

							</form>
						</div>
						<div class="col l-6 m-12 s-12">
							<form action="" class="password">
								<div class="form-group">
									<label for="">Mật khẩu cũ</label>
									<input class="input-edit" type="password" disabled name="" id="" value=""
										placeholder="Nhập mật khẩu cũ">
								</div>
								<div class="form-group">
									<label for="">Mật khẩu mới</label>
									<input class="input-edit" type="password" disabled name="" id="" value=""
										placeholder="Nhập mật khẩu mới">
								</div>
								<div class="form-group">
									<label for="">Xác nhận mật khẩu</label>
									<input class="input-edit" type="password" disabled name="" id="" value=""
										placeholder="Xác nhận mật khẩu mới">
								</div>
								<button class="button-password">Đổi mật khẩu</button>
							</form>

						</div>
						<button type="submit" class="button-submit">Lưu</button>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<section class="my-order">
	<div class="grid wide">
		<div class="row">
			<div class="col l-12">
				<div class="order">
					<h3 class="title"><i class="fas fa-shopping-cart"></i>Danh sách đơn hàng</h3>
				</div>
				<div class="view-order">
					<ul class="order-head">
						<li class="order-code">Mã đơn hàng</li>
						<li class="order-date">Ngày đặt</li>
						<li class="order-fromto">Điểm đến - điểm đi</li>
						<li class="order-codeflight">Mã chuyến bay</li>
						<li class="order-total">Tổng cộng</li>
						<li class="order-status">Trạng thái</li>
					</ul>
					<ul class="order-body">
						<li class="order-code">DC123456789</li>
						<li class="order-date">30/04/2021</li>
						<li class="order-fromto">SGN - HAN</li>
						<li class="order-codeflight">K63214</li>
						<li class="order-total">199,000
							<p>VND</p>
						</li>
						<li class="order-status">Đã thanh toán</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<script>
$(document).ready(function() {
	$(document).on("click", ".button-password", function(e) {
		e.preventDefault();
		$(".password .form-group .input-edit").prop("disabled", false);
	});

});
</script>