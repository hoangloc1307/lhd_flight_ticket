<h2>Danh sách hoá đơn</h2>
<section class="table order">
	<div class="grid">
		<div class="search-form">
			<input type="text" placeholder="Tìm kiếm">
			<button><i class="fas fa-search"></i></button>
		</div>
		<div class="row heading">
			<div class="col l-1">
				<span>Mã code</span>
			</div>
			<div class="col l-1">
				<span>Số lượng</span>
			</div>
			<div class="col l-1">
				<span>Giá</span>
			</div>
			<div class="col l-4">
				<span>Hành trình</span>
			</div>
			<div class="col l-2">
				<span>Thông tin liên hệ</span>
			</div>
			<div class="col l-2">
				<span>Ngày đặt</span>
			</div>
			<div class="col l-1">
				<span>Tình trạng</span>
			</div>
		</div>
		<div class="items">
			<?php
			foreach ($orders as $item) :
			$flight_detail = json_decode($item['Flight_Detail'], true);
			$payment_info = json_decode($item['Payment_Info'], true);
			?>
			<a href="<?= base_url() . "admin/order/" . $item["Order_ID"]?>" class="row body">
				<div class="col l-1">
					<span><?= $item['Order_Code'] ?></span>
				</div>
				<div class="col l-1 amount">
					<span><?php echo $payment_info['adults'] + (array_key_exists("children", $payment_info) ? $payment_info['children'] : 0) + (array_key_exists("infants", $payment_info) ? $payment_info['infants'] : 0) . ($item['Type'] == 'oneway' ? ' MC' : ' KH'); ?></span>
					<p><?php echo $payment_info['adults'] . ' NL'; ?></p>
					<p><?php echo (array_key_exists("children", $payment_info) ? $payment_info['children'] . ' TE' : ''); ?>
					</p>
					<p><?php echo (array_key_exists("infants", $payment_info) ? $payment_info['infants'] . ' EB' : ''); ?>
					</p>
				</div>
				<div class="col l-1">
					<span><?= number_format($payment_info['total_price'], 0, ".", ".") ?></span>
				</div>
				<div class="col l-4">
					<?php foreach ($flight_detail['flight_detail'] as $flight) { ?>
					<p><?= $flight['carrierCode'] . $flight['number'] . ' ' . $flight['date'] . ' ' . $flight['from'] . ' ' . $flight['to'] . ' ' . $flight['departure_time'] . ' ' . $flight['arrival_time'] ?>
					</p>
					<?php } ?>
				</div>
				<div class="col l-2">
					<p><?= $payment_info['contact_name'] ?></p>
					<p><?= $payment_info['contact_phone'] ?></p>
				</div>
				<div class="col l-2">
					<span><?= $item['Booking_DateTime'] ?></span>
				</div>
				<div class="status col l-1">
					<span payment="<?php echo $item['Status'] == 0 ? 'false' : 'true'; ?>"
						value='<?= $item['Order_ID'] ?>'><?php echo $item['Status'] == 0 ? 'Chưa TT' : 'Đã TT'; ?></span>
				</div>
			</a>
			<?php endforeach; ?>
		</div>

	</div>
</section>
<script>
$(document).ready(function() {

	$(document).on("click", ".status span[payment='false']", function() {
		var pay = confirm("Xác nhận đã thanh toán");
		if (pay == true) {
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>admin/order/updatestatus",
				data: {
					order_id: $(".status span[payment='false']").attr('value')
				},
				dataType: "json",
				success: function(response) {
					if (response == "Xác nhận thành công") {
						toastr["success"](response);
					} else {
						toastr["error"](response);
					}
				}
			});
			$(this).removeAttr("payment");
			$(this).text("Đã TT");
		}
	});

});
</script>