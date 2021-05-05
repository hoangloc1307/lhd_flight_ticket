<section id="order">
	<div class="grid">
		<h3 class="order-title">Danh sách hoá đơn</h3>
		<div class="table">
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
				<div class="row body">
					<div class="col l-1">
						<span>123456</span>
					</div>
					<div class="col l-1">
						<span>2</span>
					</div>
					<div class="col l-1">
						<span>2.700.000</span>
					</div>
					<div class="col l-4">
						<span>VJ123 21APR HAH SGN 930 1145</span>
					</div>
					<div class="col l-2">
						<p>Nguyễn Trung Hiếu</p>
						<p>0123456789</p>
					</div>
					<div class="col l-2">
						<span>08:00 17APR21</span>
					</div>
					<div class="status col l-1">
						<span payment="false">Chưa TT</span>
					</div>
				</div>
				<div class="row body">
					<div class="col l-1">
						<span>123456</span>
					</div>
					<div class="col l-1">
						<span>2</span>
					</div>
					<div class="col l-1">
						<span>2.700.000</span>
					</div>
					<div class="col l-4">
						<span>VJ123 21APR HAH SGN 930 1145</span>
					</div>
					<div class="col l-2">
						<p>Nguyễn Trung Hiếu</p>
						<p>0123456789</p>
					</div>
					<div class="col l-2">
						<span>08:00 17APR21</span>
					</div>
					<div class="status col l-1">
						<span>Đã TT</span>
					</div>
				</div>
			</div>
		</div>

	</div>


</section>

<script>
$(document).ready(function() {

	$(document).on("click", ".status span[payment='false']", function() {
		var pay = confirm("Xác nhận đã thanh toán");
		if (pay == true) {
			$(this).removeAttr("payment");
			$(this).text("Đã TT");
		}
	});

});
</script>