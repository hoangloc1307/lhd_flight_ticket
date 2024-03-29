<h2 class="title-order-detail">Chi tiết hoá đơn <span><?= $order["Order_Code"] ?></span> </h2>

<?php
$flight_detail = json_decode($order["Flight_Detail"], true);
$payment_info = json_decode($order["Payment_Info"], true);
?>

<section class="order-detail">
	<div class="grid">
		<div class="row">
			<div class="col l-7 info-flight">
				<div class="title">
					<div class="from-to">
						<span><?= $order["Origin"] ?></span>
						<i class="fas fa-long-arrow-alt-right"></i>
						<span><?= $order["Destination"] ?></span>
					</div>
				</div>
				<div class="class">
					<i class="fas fa-plane"></i>
					<span><?= $order['Class'] ?> CLASS</span>
					<span><?= $order["Type"] == "oneway" ? "Một chiều" : "Khứ hồi" ?></span>
					<span><?= $order["Status"] == "1" ? "Đã thanh toán" : "Chưa thanh toán" ?></span>
				</div>
				<!-- Một chiều -->
				<div class="ticket-wrap">
					<h4>Vé đi</h4>
					<div class="flight-wrap">
						<div class="base-from-to">
							<h6><?= $order["Origin"] ?></h6>
							<p class="airport"><?php echo airport_by_iata($order["Origin"]) ?></p>
							<p class="city"><?php echo city_by_iata($order["Origin"]) ?></p>
						</div>
						<i class="fas fa-plane"></i>
						<div class="base-from-to">
							<h6><?= $order["Destination"] ?></h6>
							<p class="airport"><?php echo airport_by_iata($order["Destination"]) ?></p>
							<p class="city"><?php echo city_by_iata($order["Destination"]) ?></p>
						</div>
					</div>
					<div class="depart-destination-arrive">
						<div>
							<p>Khởi hành</p>
							<span><?= $flight_detail["departure_date"] ?></span>
							<span><?= $flight_detail["departure_time"] ?></span>
						</div>
						<i class="fas fa-plane"></i>
						<div>
							<p>Đến nơi</p>
							<span><?= $flight_detail["departure_landing_date"] ?></span>
							<span><?= $flight_detail["departure_landing_time"] ?></span>
						</div>
					</div>
				</div>

				<?php if ($order['Type'] == 'roundtrip') : ?>
				<!-- Khứ hồi -->
				<div class="ticket-wrap">
					<h4>Vé về</h4>
					<div class="flight-wrap">
						<div class="base-from-to">
							<h6><?= $order["Destination"] ?></h6>
							<p class="airport"><?php echo airport_by_iata($order["Destination"]) ?></p>
							<p class="city"><?php echo city_by_iata($order["Destination"]) ?></p>
						</div>
						<i class="fas fa-plane"></i>
						<div class="base-from-to">
							<h6><?= $order["Origin"] ?></h6>
							<p class="airport"><?php echo airport_by_iata($order["Origin"]) ?></p>
							<p class="city"><?php echo city_by_iata($order["Origin"]) ?></p>
						</div>
					</div>
					<div class="depart-destination-arrive">
						<div>
							<p>Khởi hành</p>
							<span><?= $flight_detail["return_date"] ?></span>
							<span><?= $flight_detail["return_time"] ?></span>
						</div>
						<i class="fas fa-plane"></i>
						<div>
							<p>Đến nơi</p>
							<span><?= $flight_detail["return_landing_date"] ?></span>
							<span><?= $flight_detail["return_landing_time"] ?></span>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="col l-5 info-user">
				<div class="title">
					<a href="<?= base_url("admin/order") ?>">
						<i class="fas fa-long-arrow-alt-left"></i>
						Trở lại
					</a>
				</div>

				<div class="code">
					<div class="order-code">
						<span>Mã hoá đơn: </span>
						<span><?= $order["Order_Code"] ?></span>
					</div>
					<div class="order-datetime">
						<span>Ngày đặt:</span>
						<span><?= $order["Booking_DateTime"] ?></span>
					</div>
				</div>
				<div class="traveller-info">
					<h6>Thông tin khách hàng đặt vé</h6>
					<div class="row heading">
						<div class="col l-6">
							Tên
						</div>
						<div class="col l-3">
							Ngày sinh
						</div>
						<div class="col l-3">
							Độ tuổi
						</div>
					</div>
					<div class="items">
						<?php for ($i = 0; $i < count($payment_info["adults_names"]); $i++) : ?>
						<div class="row body">
							<div class="col l-6">
								<?= $payment_info["adults_names"][$i] ?>
							</div>
							<div class="col l-3"></div>
							<div class="col l-3">
								Người lớn
							</div>
						</div>
						<?php endfor; ?>

						<?php
						if (array_key_exists("children", $payment_info)) :
							for ($i = 0; $i < count($payment_info["children_names"]); $i++) : ?>
						<div class="row body">
							<div class="col l-6">
								<?= $payment_info["children_names"][$i] ?>
							</div>
							<div class="col l-3">
								<?= date_format(date_create($payment_info["children_dob"][$i]), "d-m-Y")?>
							</div>
							<div class="col l-3">
								Trẻ em
							</div>
						</div>
						<?php endfor; ?>
						<?php endif; ?>

						<?php
						if (array_key_exists("infants", $payment_info)) :
							for ($i = 0; $i < count($payment_info["infants_names"]); $i++) : ?>
						<div class="row body">
							<div class="col l-6">
								<?= $payment_info["infants_names"][$i] ?>
							</div>
							<div class="col l-3">
								<?= date_format(date_create($payment_info["infants_dob"][$i]), "d-m-Y")?>
							</div>
							<div class="col l-3">
								Em bé
							</div>
						</div>
						<?php endfor; ?>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>
		<div class="row flight-detail">
			<div class="col l-12 flight-detail-wrap">
				<h6>Chặng bay</h6>
				<div class="row heading">
					<div class="col l-2">
						Mã chuyến bay
					</div>
					<div class="col l-2">
						Cất cánh
					</div>
					<div class="col l-2">
						Điểm đi
					</div>
					<div class="col l-2">
						Điểm đến
					</div>
					<div class="col l-2">
						Thời gian khởi hành
					</div>
					<div class="col l-2">
						Thời gian Đến nơi
					</div>
				</div>
				<div class="items">

					<?php foreach ($flight_detail["flight_detail"] as $fight) : ?>
					<div class="row body">
						<div class="col l-2">
							<?= $fight["carrierCode"] . $fight["number"] ?>
						</div>
						<div class="col l-2">
							<?= $fight["departure_date"] ?>
						</div>
						<div class="col l-2">
							<?= $fight["from"] ?>
						</div>
						<div class="col l-2">
							<?= $fight["to"] ?>
						</div>
						<div class="col l-2">
							<?= $fight["departure_time"] ?>
						</div>
						<div class="col l-2">
							<?= $fight["arrival_time"] ?>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col l-6 info-contact">
			<h6>Thông tin liên hệ</h6>
			<div class="row">
				<div class="col l-6">
					<p>Tên:</p>
					<p><?= $payment_info["contact_name"] ?></p>
				</div>
				<div class="col l-6">
					<p>Email:</p>
					<p><?= $payment_info["contact_mail"] ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col l-6">
					<p>Số điện thoại:</p>
					<p><?= $payment_info["contact_phone"] ?></p>
				</div>
				<div class="col l-6">
					<p>Địa chỉ:</p>
					<p><?= $payment_info["contact_address"] ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col l-6">
					<p>Phương thức thanh toán:</p>
					<p><?= $order["Payment_Method"] ?></p>
				</div>
				<div class="col l-6">
					<p>Ghi chú:</p>
					<p><?= $payment_info["contact_note"] ?></p>
				</div>
			</div>
		</div>
		<div class="col l-6 total-order">
			<h6>Chi tiết thanh toán</h6>
			<div class="row heading">
				<div class="col l-5">
					Tên
				</div>
				<div class="col l-3">
					Giá vé
				</div>
				<div class="col l-4">
					Hành lý
				</div>
			</div>
			<div class="items">
				<?php for ($i = 0; $i < count($payment_info["adults_names"]); $i++) : ?>
				<div class="row body">
					<div class="col l-5">
						<?= $payment_info["adults_names"][$i] ?>
					</div>
					<div class="col l-3">
						<?= number_format($payment_info['adults_baseprice'] + $payment_info['adults_fee'], 0, ".", ".") ?>
					</div>
					<div class="col l-4">
						<?php foreach($payment_info['adults_luggage'][$i] as $key => $value): ?>
						<?= $key.': '. number_format($value, 0, ".", ".") ?>
						<?php endforeach;?>
					</div>
				</div>
				<?php endfor ?>

				<?php
				if (array_key_exists("children", $payment_info)) :
					for ($i = 0; $i < count($payment_info["children_names"]); $i++) :
				?>
				<div class="row body">
					<div class="col l-5">
						<?= $payment_info["children_names"][$i] ?>
					</div>
					<div class="col l-3">
						<?= number_format($payment_info['children_baseprice']+ $payment_info['children_fee'], 0, ".", ".") ?>
					</div>
					<div class="col l-4">
						<?php foreach($payment_info['children_luggage'][$i] as $key => $value): ?>
						<?= $key.': '. number_format($value, 0, ".", ".") ?>
						<?php endforeach;?>
					</div>
				</div>
				<?php endfor ?>
				<?php endif ?>

				<?php
				if (array_key_exists("infants", $payment_info)) :
					for ($i = 0; $i < count($payment_info["infants_names"]); $i++) :
				?>
				<div class="row body">
					<div class="col l-5">
						<?= $payment_info["infants_names"][$i] ?>
					</div>
					<div class="col l-3">
						<?= number_format($payment_info['infants_baseprice']+ $payment_info['infants_fee'], 0, ".", ".") ?>
					</div>
					<div class="col l-4"></div>
				</div>
				<?php endfor ?>
				<?php endif ?>
			</div>


			<div class="row footer">
				<div class="bill col l-6">
					Tổng hoá đơn:
				</div>
				<div class="col l-6 total-price">
					<span><?= number_format($order['Price'], 0, ".", ".") ?></span>
					<span>VND</span>
				</div>
			</div>

		</div>
	</div>

	</div>
</section>