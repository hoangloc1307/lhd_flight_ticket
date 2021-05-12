<h2>Danh sách hoá đơn</h2>
<section class="table order">
	<div class="grid">
		<div class="search-form">
			<input type="text" placeholder="Tìm kiếm">
			<button><i class="fas fa-search"></i></button>
		</div>
		<div class="row heading">
			<div class="col l-1">
				<span>Mã đơn</span>
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
			<div class="row body">
				<div class="col l-1 code">
					<a
						href="<?= base_url("admin/order/detail/") . $item['Order_ID'] ?>"><?= $item['Order_Code'] ?></a>
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
			</div>
			<?php endforeach; ?>
		</div>
		<div class="view-more">
			<button>Xem thêm</button>
		</div>
	</div>
</section>
<script>
$(document).ready(function() {
	var myObj = {
		offset: 5,
	};
	//Xác nhận thanh toán
	$(document).on("click", ".status span[payment='false']", function() {
		var pay = confirm("Xác nhận đã thanh toán");
		if (pay == true) {
			$('.loader-container').removeClass('hide');
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>admin/order/updatestatus",
				data: {
					order_id: $(this).attr('value')
				},
				dataType: "json",
				success: function(response) {
					if (response == "Xác nhận thành công") {
						toastr["success"](response);
						$('.loader-container').addClass('hide');
					} else {
						toastr["error"](response);
					}
				}
			});
			$(this).removeAttr("payment");
			$(this).text("Đã TT");
		}
	});

	//Xem thêm
	$(document).on("click", '.view-more button', function(e) {
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "<?= base_url('admin/order/viewmore') ?>",
			data: {
				offset: myObj['offset']
			},
			dataType: "json",
			success: function(data) {
				myObj['offset'] += 5;
				txt = "";
				for (var i in data) {
					var flight_detail = JSON.parse(data[i]['Flight_Detail']);
					var payment_info = JSON.parse(data[i]['Payment_Info']);

					txt += "<div class='row body'>";
					txt += "<div class='col l-1 code'>";
					txt += "<a href='<?= base_url('admin/order/detail/') ?>" +
						data[i][
							'Order_ID'
						] + "'>" + data[i]['Order_Code'] + "</a>";
					txt += "</div>";
					txt += "<div class='col l-1 amount'>";
					txt += "<span>" + (parseInt(payment_info['adults']) +
						parseInt(
							payment_info
							.hasOwnProperty('children') == true ?
							payment_info[
								'children'] : 0) + parseInt(payment_info
							.hasOwnProperty(
								'infants') == true ? payment_info[
								'infants'] : 0)) + (data[i][
							'Type'
						] ==
						'oneway' ? ' MC' : ' KH') + "</span>";
					txt += "<p>" + payment_info['adults'] + ' NL' + "</p>";
					if (payment_info.hasOwnProperty('children')) {
						txt += "<p>" + payment_info['children'] + ' TE' +
							"</p>";
					}
					if (payment_info.hasOwnProperty('infants')) {
						txt += "<p>" + payment_info['infants'] + ' EB' +
							"</p>";
					}
					txt += "</div>";
					txt += "<div class='col l-1'>";
					txt += "<span>" + payment_info['total_price'] + "</span>";
					txt += "</div>";
					txt += "<div class='col l-4'>";
					for (var j in flight_detail['flight_detail']) {
						txt += "<p>" + flight_detail['flight_detail'][j][
								'carrierCode'
							] +
							flight_detail['flight_detail'][j]['number'] +
							' ' +
							flight_detail['flight_detail'][j]['date'] + ' ' +
							flight_detail[
								'flight_detail'][j]['from'] + ' ' +
							flight_detail[
								'flight_detail'][j]['to'] + ' ' +
							flight_detail[
								'flight_detail'][j]['departure_time'] + ' ' +
							flight_detail[
								'flight_detail'][j]['arrival_time'] +
							"</p>";
					}
					txt += "</div>";
					txt += "<div class='col l-2'>";
					txt += "<p>" + payment_info['contact_name'] + "</p>";
					txt += "<p>" + payment_info['contact_phone'] + "</p>";
					txt += "</div>";
					txt += "<div class='col l-2'>";
					txt += "<span>" + data[i]['Booking_DateTime'] + "</span>";
					txt += "</div>";
					txt += "<div class='status col l-1'>";
					txt += "<span payment='" + (data[i]['Status'] == 0 ?
							'false' : 'true') +
						"' value='" + data[i]['Order_ID'] + "'>" + (data[i][
								'Status'
							] == 0 ?
							'Chưa TT' : 'Đã TT') + "</span>";
					txt += "</div></div>";
				}
				$('.items').append(txt);
			}
		});
	});

	//Search
	$('.search-form button').click(function(e) {
		e.preventDefault();
		if ($('.search-form input').val() != '') {
			$.ajax({
				type: "POST",
				url: "<?= base_url('admin/order/search') ?>",
				data: {
					keyword: $('.search-form input').val()
				},
				dataType: "json",
				success: function(data) {
					var txt = "";
					if (data != "Không tìm thấy kết quả!") {
						for (var i in data) {
							var flight_detail = JSON.parse(data[i][
								'Flight_Detail'
							]);
							var payment_info = JSON.parse(data[i][
								'Payment_Info'
							]);

							txt += "<div class='row body'>";
							txt += "<div class='col l-1 code'>";
							txt +=
								"<a href='<?= base_url('admin/order/detail/') ?>" +
								data[
									i][
									'Order_ID'
								] + "'>" + data[i]['Order_Code'] + "</a>";
							txt += "</div>";
							txt += "<div class='col l-1 amount'>";
							txt +=
								"<span>" + payment_info['adults'] + (data[i][
										'Type'
									] ==
									'oneway' ?
									' MC' : ' KH') + "</span>";
							txt += "<p>" + payment_info['adults'] + ' NL' +
								"</p>";
							txt += "</div>";
							txt += "<div class='col l-1'>";
							txt += "<span>" + payment_info['total_price'] +
								"</span>";
							txt += "</div>";
							txt += "<div class='col l-4'>";
							for (var j in flight_detail['flight_detail']) {
								txt += "<p>" + flight_detail['flight_detail']
									[j][
										'carrierCode'
									] +
									flight_detail['flight_detail'][j][
										'number'
									] + ' ' +
									flight_detail['flight_detail'][j][
										'date'
									] + ' ' +
									flight_detail[
										'flight_detail'][j]['from'] + ' ' +
									flight_detail[
										'flight_detail'][j]['to'] + ' ' +
									flight_detail[
										'flight_detail'][j][
										'departure_time'
									] + ' ' +
									flight_detail[
										'flight_detail'][j][
										'arrival_time'
									] +
									"</p>";
							}
							txt += "</div>";
							txt += "<div class='col l-2'>";
							txt += "<p>" + payment_info['contact_name'] +
								"</p>";
							txt += "<p>" + payment_info['contact_phone'] +
								"</p>";
							txt += "</div>";
							txt += "<div class='col l-2'>";
							txt += "<span>" + data[i]['Booking_DateTime'] +
								"</span>";
							txt += "</div>";
							txt += "<div class='status col l-1'>";
							txt += "<span payment='" + (data[i]['Status'] ==
									0 ? 'false' :
									'true') +
								"' value='" + data[i]['Order_ID'] + "'>" + (
									data[i][
										'Status'
									] == 0 ?
									'Chưa TT' : 'Đã TT') + "</span>";
							txt += "</div></div>";
						}
					} else {
						txt += '<div class="empty">' + data + '</div>';
					}
					$('.view-more').remove();
					$('.items').html(txt);
				}
			});
		} else {
			toastr["error"]("Vui lòng nhập từ khoá");
			$('.search-form input').focus();
		}
	});
});
</script>