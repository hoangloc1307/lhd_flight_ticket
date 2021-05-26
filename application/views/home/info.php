<section class="infouser">
	<div class="grid wide">
		<div class="row">
			<div class="col l-12 m-12 s-12">
				<div class="info-user">
					<h3 class="title"><i class="fas fa-info-circle"></i>Thông tin tài khoản</h3>
					<div class="row info-edit">
						<div class="col l-6 m-12 s-12">
							<form class="info">
								<div class="form-group">
									<label for=""><i class="fas fa-user-edit"></i>Họ & Tên</label>
									<input class="input-edit" type="text" name="name"
										value="<?= $user_info['Name'] ?>">
								</div>
								<div class="form-group">
									<label for=""><i class="fas fa-map-marker-alt"></i>Địa chỉ</label>
									<input class="input-edit" type="text" name="address"
										value="<?= $user_info['Address'] ?>">
								</div>
								<div class="form-group">
									<label for=""><i class="fas fa-phone"></i>Số điện thoại</label>
									<input class="input-edit" type="number" name="phone"
										value="<?= $user_info['Phone'] ?>">
								</div>
								<div class="form-group">
									<label for=""><i class="far fa-envelope"></i>Email</label>
									<input class="input-edit" type="mail" name="email" disabled
										value="<?= $user_info['Email'] ?>">
								</div>
							</form>
						</div>
						<div class="col l-6 m-12 s-12">
							<form action="" class="password">
								<div class="form-group">
									<label for="">Mật khẩu cũ</label>
									<input class="input-edit" type="password" disabled name="old-password"
										placeholder="Nhập mật khẩu cũ">
								</div>
								<div class="form-group">
									<label for="">Mật khẩu mới</label>
									<input class="input-edit" type="password" name="password" disabled
										placeholder="Nhập mật khẩu mới">
								</div>
								<div class="form-group">
									<label for="">Xác nhận mật khẩu</label>
									<input class="input-edit" type="password" disabled name="cfm-password"
										placeholder="Xác nhận mật khẩu">
								</div>
								<button class="button-password">Đổi mật khẩu</button>
								<button class="button-submit change-password" style="display: none;">Xác
									nhận</button>
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
			<div class="col l-12 m-12 s-12">
				<div class="order">
					<h3 class="title"><i class="fas fa-shopping-cart"></i>Danh sách đơn hàng</h3>
				</div>
				<div class="view-order">
					<ul class="order-head">
						<li class="order-code"><i class="fas fa-hashtag"></i>Mã ĐH</li>
						<li class="order-date"><i class="far fa-clock"></i>Ngày đặt</li>
						<li class="order-fromto"><i class="fas fa-map-marker-alt"></i>Từ - đến</li>
						<li class="order-codeflight"><i class="fas fa-hashtag"></i>Mã CB</li>
						<li class="order-total"><i class="fas fa-ticket-alt"></i>Tổng cộng</li>
						<li class="order-status"><i class="fas fa-record-vinyl"></i>Trạng thái</li>
					</ul>
					<?php
					foreach ($orders as $item) :
						$flight_detail = json_decode($item['Flight_Detail'], true);
						$payment_info = json_decode($item['Payment_Info'], true);
					?>
					<div class="order-item">
						<ul class="order-body">
							<li class="order-code">
								<a href="#"><?= $item['Order_Code'] ?>
									<i class="fas fa-chevron-down"></i>
								</a>
							</li>
							<li class="order-date"><?= $item['Booking_DateTime'] ?></li>
							<li class="order-fromto"><?= $item['Origin'] . ' - ' . $item['Destination'] ?></li>
							<li class="order-codeflight">
								<?php foreach ($flight_detail['flight_detail'] as $flight) { ?>
								<p><?= $flight['carrierCode'] . $flight['number'] ?></p>
								<?php } ?>
							</li>
							<li class="order-total">
								<?= number_format($item['Price'], 0, ".", ".") ?>
								<p>VND</p>
							</li>
							<li class="order-status"
								payment='<?php echo $item['Status'] == 1 ? 'true' : 'false' ?>'>
								<?php echo $item['Status'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán'; ?></li>
						</ul>

						<div class="order-detail">

							<div class="heading">
								<div class="heading-detail">
									<h4>Chi tiết đơn hàng:</h4>
									<h4><?= $item['Order_Code'] ?></h4>
									<h4><?php echo $item['Status'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán'; ?>
									</h4>
								</div>
								<div class="heading-close">
									<i class="fas fa-times"></i>
								</div>

							</div>

							<div class="order-passenger">
								<div class="passenger-title">
									<i class="fas fa-info-circle"></i>
									<p>Thông tin khách hàng</p>
								</div>
								<div class="passenger-detail">

									<div class="passenger">
										<p>Tên đại diện: </p>
										<p><?= $payment_info['contact_name'] ?></p>
									</div>
									<div class="type-ticket">
										<p>Loại vé: </p>
										<p><?php echo $item['Type'] == 'oneway' ? 'Một chiều' : 'Khứ hồi'; ?>
										</p>
									</div>
									<div class="flight-code">
										<p>Mã chuyến bay: </p>
										<?php foreach ($flight_detail['flight_detail'] as $flight) { ?>
										<p><?= $flight['carrierCode'] . $flight['number'] ?></p>
										<?php } ?>
									</div>
									<div class="type-ticket">
										<p>Ngày đặt: </p>
										<p><?= $item['Booking_DateTime'] ?></p>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col l-6 m-12 s-12">
									<div class="order-contact">
										<div class="contact-title">
											<i class="fas fa-id-card-alt"></i>
											<p>Thông tin liên hệ</p>
										</div>
										<div class="contact-detail">
											<div class="name">
												<p>Họ & Tên: </p>
												<p><?= $payment_info['contact_name'] ?></p>
											</div>
											<div class="phone">
												<p>Điện thoại: </p>
												<p><?= $payment_info['contact_phone'] ?></p>
											</div>
											<div class="email">
												<p>Email: </p>
												<p><?= $payment_info['contact_mail'] ?></p>
											</div>
											<div class="address">
												<p>Địa chỉ: </p>
												<p><?= $payment_info['contact_address'] ?></p>
											</div>
											<div class="note">
												<p>Ghi chú: </p>
												<p><?= $payment_info['contact_note'] ?> </p>
											</div>
										</div>
									</div>
								</div>
								<div class="col l-6 m-12 s-12">

									<div class="order-payment">
										<div class="payment-title">
											<i class="fas fa-money-check-alt"></i>
											<p>Thông tin thanh toán</p>
										</div>
										<div class="payment-detail">
											<div class="method">
												<p>Phương thức: </p>
												<p><?= $item['Payment_Method'] ?></p>
											</div>
											<div class="status">
												<p>Trạng thái: </p>
												<p><?php echo $item['Status'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán'; ?>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row ticket-row">
								<div class="col l-12 m-12 s-12">
									<h4 class="title">Chi tiết vé đi</h4>
								</div>
								<div class="col l-6 m-12 s-12">
									<div class="order-departure">
										<div class="departure-title">
											<i class="fas fa-plane-departure"></i>
											<p>Điểm khởi hành</p>
										</div>
										<div class="departure-detail">
											<div class="airport">
												<p>Sân bay: </p>
												<p><?= airport_by_iata($item["Origin"]) ?></p>
											</div>
											<div class="code-airport">
												<p>Mã sân bay: </p>
												<p><?= $item["Origin"] ?></p>
											</div>
											<div class="city">
												<p>Thành phố: </p>
												<p><?= city_by_iata($item["Origin"]) ?></p>
											</div>
											<div class="date-departure">
												<p>Ngày khởi hành: </p>
												<p><?= $flight_detail["departure_date"]?></p>
											</div>
											<div class="time-departure">
												<p>Thời gian khởi hành: </p>
												<p><?= $flight_detail["departure_time"]?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col l-6 m-12 s-12">
									<div class="order-destination">
										<div class="destination-title">
											<i class="fas fa-plane-arrival"></i>
											<p>Điểm đến</p>
										</div>
										<div class="destination-detail">
											<div class="airport">
												<p>Sân bay: </p>
												<p><?= airport_by_iata($item["Destination"]) ?></p>
											</div>
											<div class="code-airport">
												<p>Mã sân bay: </p>
												<p><?= $item['Destination'] ?></p>
											</div>
											<div class="city">
												<p>Thành phố: </p>
												<p><?= city_by_iata($item["Destination"]) ?></p>
											</div>
											<div class="date-destination">
												<p>Ngày đến nơi: </p>
												<p><?= $flight_detail["departure_landing_date"]?></p>
											</div>
											<div class="time-destination">
												<p>Thời gian đến nơi: </p>
												<p><?= $flight_detail["departure_landing_time"]?></p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<?php if ($item["Type"] == "roundtrip"):?>
							<div class="row ticket-row">
								<div class="col l-12 m-12 s-12">
									<h4 class="title">Chi tiết vé về</h4>
								</div>
								<div class="col l-6 m-12 s-12">
									<div class="order-departure">
										<div class="departure-title">
											<i class="fas fa-plane-departure"></i>
											<p>Điểm khởi hành</p>
										</div>
										<div class="departure-detail">
											<div class="airport">
												<p>Sân bay: </p>
												<p><?= airport_by_iata($item["Destination"])?></p>
											</div>
											<div class="code-airport">
												<p>Mã sân bay: </p>
												<p><?= $item['Destination'] ?></p>
											</div>
											<div class="city">
												<p>Thành phố: </p>
												<p><?= city_by_iata($item["Destination"])?></p>
											</div>
											<div class="date-departure">
												<p>Ngày khởi hành: </p>
												<p><?= $flight_detail["return_date"]?></p>
											</div>
											<div class="time-departure">
												<p>Thời gian khởi hành: </p>
												<p><?= $flight_detail["return_time"]?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="col l-6 m-12 s-12">
									<div class="order-destination">
										<div class="destination-title">
											<i class="fas fa-plane-arrival"></i>
											<p>Điểm đến</p>
										</div>
										<div class="destination-detail">
											<div class="airport">
												<p>Sân bay: </p>
												<p><?= airport_by_iata($item["Origin"])?></p>
											</div>
											<div class="code-airport">
												<p>Mã sân bay: </p>
												<p><?=$item["Origin"]?></p>
											</div>
											<div class="city">
												<p>Thành phố: </p>
												<p><?= city_by_iata($item["Origin"])?></p>
											</div>
											<div class="date-destination">
												<p>Ngày đến nơi: </p>
												<p><?= $flight_detail["return_landing_date"] ?></p>
											</div>
											<div class="time-destination">
												<p>Thời gian đến nơi: </p>
												<p><?= $flight_detail["return_landing_time"] ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<?php endif;?>

							<div class="order-total">
								<div class="total-title">
									<i class="fas fa-receipt"></i>
									<p>Tổng chi phí</p>
								</div>
								<div class="total-detail">
									<div class="price-ticket">
										<p>Giá vé: </p>
										<span><?php
													$baseprice = $payment_info['adults_baseprice'] + (array_key_exists("children", $payment_info) ? $payment_info['children_baseprice'] : 0) + (array_key_exists("infants", $payment_info) ? $payment_info['infants_baseprice'] : 0);
													echo number_format($baseprice, 0, ".", ".");
													?></span>
										<span>VND</span>
									</div>
									<div class="taxes-fess">
										<p>Thuế: </p>
										<span><?= number_format(($item['Price'] - $baseprice), 0, ".", "."); ?>
										</span>
										<span>VND</span>
									</div>
									<div class="bag-price">
										<p>Hành lý: </p>
										<span><?= number_format(($item['Price'] - $baseprice), 0, ".", "."); ?>
										</span>
										<span>VND</span>
									</div>
									<div class="total-price">
										<p>Tổng: </p>
										<span><?= number_format($item['Price'], 0, ".", ".") ?></span>
										<span>VND</span>
									</div>
								</div>
							</div>

							<div class="compact">
								<i class="fas fa-angle-up"></i>
								<span>Thu gọn </span>
							</div>
						</div>

					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
$(document).ready(function() {
	//Bấm nút đổi mật khẩu
	$(document).on("click", ".button-password", function(e) {
		e.preventDefault();
		$(".password .form-group .input-edit").prop("disabled", false);
		$('.change-password').attr('style', 'display: block;');
		$(this).attr('style', 'display: none;');
	});

	//Bấm nút xác nhận
	$(document).on('click', '.change-password', function(e) {
		e.preventDefault();
		if ($('.input-edit[name="password"]').val() == $('.input-edit[name="cfm-password"]')
			.val()) {
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>account/changepassword",
				data: {
					old_password: $('.input-edit[name="old-password"]').val(),
					new_password: $('.input-edit[name="password"]').val()
				},
				dataType: "json",
				success: function(response) {
					if (response == "Đổi mật khẩu thành công") {
						$('.change-password').attr('style', 'display: none;');
						$('.button-password').attr('style', 'display: block;');
						$('form.password input').each(function() {
							$(this).val('');
							$(this).prop("disabled", true)
						});
						toastr["success"](response);
					} else {
						toastr["error"](response);
					}
				}
			});
		} else {
			toastr["error"]("Xác nhận mật khẩu không khớp");
		}
	});


	// Xử lý thanh toán & chưa thanh toán
	$(".order-body .order-status").each(function() {
		if ($(this).attr('payment') == "true") {
			$(this).css("color", "#27AE60");
		} else {
			$(this).css("color", "#e74c3c");
		}
	});

	// Bấm vào mã đơn hàng
	$(document).on("click", ".order-code > a", function(e) {
		e.preventDefault();
		$(this).find("i").toggleClass("active");
		$(this).parents(".order-body").next(".order-detail").slideToggle();
	});

	// Bấm vào thu gọn
	$(document).on("click", ".compact", function() {
		$(this).parents(".order-detail").prev().find(".order-code a i").removeClass("active");
		$(this).parents(".order-detail").slideToggle();
		$(document).scrollTop($(this).parents(".order-detail").prev().offset().top);
	});

	$(document).on("click", ".heading-close > i", function() {
		$(this).parents(".order-detail").prev().find(".order-code a i").removeClass("active");
		$(this).parents(".order-detail").slideToggle();
	});

});
</script>