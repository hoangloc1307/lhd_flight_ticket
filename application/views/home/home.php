<!-- Section Hero -->
<section id="hero">
	<div class="grid wide">
		<div class="row">
			<div class="col l-5 m-12 s-12 booking-form">
				<h2><i class="fas fa-plane"></i> Xin chào! Bạn muốn đi đâu?</h2>
				<form action="<?= base_url() ?>finding" method="post">
					<div class="type">
						<label>
							<input id="one-way" type="radio" name="ftype" value="oneway" checked /> Một chiều
							<span class="radiobtn"></span>
						</label>
						<label>
							<input id="round-trip" type="radio" name="ftype" value="roundtrip" /> Khứ hồi
							<span class="radiobtn"></span>
						</label>
					</div>
					<div class="way">
						<label>
							Điểm đi<br />
							<input class="choose" type="text" name="forigin" placeholder="Chọn" required />

							<div class="way-popup">
								<div class="header">

									<h4>
										<i class="far fa-paper-plane"></i>
										Chọn điểm đi
									</h4>
									<button type="button" class="close"><i class="fas fa-times"></i></button>

								</div>
								<div class="tab-city">
									<ul class="tab-container">
									</ul>
									<div class="list-city-wrap">
									</div>

								</div>

							</div>
						</label>
						<i class="fas fa-random"></i>
						<label>
							Điểm đến<br />
							<input class="choose" type="text" name="fdestination" placeholder="Chọn" required />

							<div class="way-popup way-popup-mobile">
								<div class="header">
									<h4>
										<i class="far fa-paper-plane"></i>
										Chọn điểm đến
									</h4>
									<button type="button" class="close"><i class="fas fa-times"></i></button>
								</div>
								<div class="tab-city">
									<ul class="tab-container">
									</ul>
									<div class="list-city-wrap">
									</div>

								</div>

							</div>
						</label>
					</div>
					<div class="date">
						<label>
							Ngày đi<br /><input id="date-department" type="date" name="fdepartment"
								value="<?= date("Y-m-d") ?>" placeholder="Select date" />
						</label>
						<i class="fas fa-arrows-alt-h"></i>
						<label>
							Ngày về<br /><input id="date-return" type="date" name="freturn"
								value="<?= date("Y-m-d") ?>" placeholder=" Select date" />
						</label>
					</div>

					<div class="passenger">
						<div class="adults">
							<div class="passenger-name">
								<p>Người lớn</p>
								<p>12 tuổi trở lên</p>
							</div>
							<div class="passenger-number">
								<button type="button" class="minus-button unactive">
									<i class="fas fa-minus"></i>
								</button>
								<input type="hidden" name="fadult" value="1">
								<span class="amount">1</span>
								<button type="button" class="plus-button active">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>
						<div class="children">
							<div class="passenger-name">
								<p>Trẻ em</p>
								<p>2 - 12 tuổi</p>
							</div>
							<div class="passenger-number">
								<button type="button" class="minus-button unactive">
									<i class="fas fa-minus"></i>
								</button>
								<input type="hidden" name="fchildren">
								<span class="amount">0</span>
								<button type="button" class="plus-button active">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>

						<div class="infants">
							<div class="passenger-name">
								<p>Trẻ sơ sinh</p>
								<p>0 - 2 tuổi</p>
							</div>
							<div class="passenger-number">
								<button type="button" class="minus-button unactive">
									<i class="fas fa-minus"></i>
								</button>
								<input type="hidden" name="finfants">
								<span class="amount">0</span>
								<button type="button" class="plus-button active">
									<i class="fas fa-plus"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="class">
						<p>Hạng</p>
						<div class="class-wrap">
							<label>
								<input type="radio" name="fclass" value="ALL" checked /> Tất cả
								<span class="radiobtn"></span>
							</label>
							<label>
								<input type="radio" name="fclass" value="ECONOMY" /> Phổ thông
								<span class="radiobtn"></span>
							</label>
							<label>
								<input type="radio" name="fclass" value="PREMIUM_ECONOMY" /> Phổ thông cao cấp
								<span class="radiobtn"></span>
							</label>
							<label>
								<input type="radio" name="fclass" value="BUSINESS" /> Thương gia
								<span class="radiobtn"></span>
							</label>
							<label>
								<input type="radio" name="fclass" value="FIRST" /> Nhất
								<span class="radiobtn"></span>
							</label>
						</div>
					</div>
					<div class="max-price">
						<label>
							Ngân sách tối đa<br /><input name="fmaxprice" type="number"
								placeholder="Ví dụ: 500.000 VND" />
						</label>
					</div>
					<button type="submit" name="search-flight"><i class="fas fa-search"></i> Tìm Chuyến Bay
					</button>
				</form>

				<script>
				/* Lấy dữ liệu sân bay */
				$.ajax({
					url: "https://www.vietjetair.com/AirportList.aspx?lang=vi-VN",
					type: "GET",
					dataType: "json",
					success: function(json) {
						json = json.AirportList;
						for (let i = 0; i < json.length; i++) {
							$(".tab-container").append(
								"<li>" + json[i]["CountryName"] + "</span></li>"
							);

							let txt = '<div class="list-city">';
							txt += '<ul class="list-point">';

							for (let j = 0; j < json[i]["List"].length; j++) {
								txt +=
									'<li value="' +
									json[i]["List"][j]["Code"] +
									'">' +
									json[i]["List"][j]["Name"] +
									" (" +
									json[i]["List"][j]["Code"] +
									")</li>";
							}
							txt += "</ul>";
							txt += "</div>";
							$(".list-city-wrap").append(txt);
						}
						/* Load sẽ add class active vào tab & list đầu tiên */
						$(".tab-container > li:first-child").addClass("tab-active");
						$(".list-city-wrap > .list-city:first-child").addClass("list-active");
					},

				});
				/*===== End ===== */
				</script>

			</div>
			<div class="col l-7 hero-content">
				<div class="content">
					<h2>Flight Ticket - Vé máy bay uy tín</h2>
					<p>Niềm vui khi cất cánh</p>
				</div>
				<div class="imgBx">
					<img src="<?= base_url() ?>assets/images/plane.png" alt="Hero Image" />
				</div>
				<div class="cloud">
					<img src="<?= base_url() ?>assets/images/cloud-1.png" alt="cloud" />
					<img src="<?= base_url() ?>assets/images/cloud-2.png" alt="cloud" />
					<img src="<?= base_url() ?>assets/images/cloud-3.png" alt="cloud" />
					<img src="<?= base_url() ?>assets/images/cloud-4.png" alt="cloud" />
					<img src="<?= base_url() ?>assets/images/cloud-5.png" alt="cloud" />
					<img src="<?= base_url() ?>assets/images/cloud-6.png" alt="cloud" />
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Section Hero -->

<!-- Section Favorite -->
<section id="favorite">
	<div class="grid wide">
		<div class="row">
			<div class="col l-12 m-12 s-12">
				<h2 class="heading">Địa điểm nổi bật</h2>
			</div>
			<div class="col l-4 m-6 s-12  block">
				<a href="#">
					<div class="image-box">
						<h3>Hạ Long</h3>
						<img src="<?= base_url() ?>assets/images/favorite/halong.jpg" alt="" />
					</div>
					<div class="info">
						<p>
							Lorem ipsum dolor sit amet consectetur, adipisicing elit.
							Facilis quae nihil id voluptatum.
						</p>
						<div>
							<a href="#">Xem chi tiết
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</a>
			</div>
			<div class="col l-4 m-6 s-12 block">
				<a href="#">
					<div class="image-box">
						<h3>Nha Trang</h3>
						<img src="<?= base_url() ?>assets/images/favorite/nhatrang.jpg" alt="" />
					</div>
					<div class="info">
						<p>
							Lorem ipsum dolor sit amet consectetur, adipisicing elit.
							Facilis quae nihil id voluptatum.
						</p>
						<div>
							<a href="#">Xem chi tiết
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</a>
			</div>
			<div class="col l-4 m-6 s-12 block">
				<a href="#">
					<div class="image-box">
						<h3>Đà Lạt</h3>
						<img src="<?= base_url() ?>assets/images/favorite/dalat.jpg" alt="" />
					</div>
					<div class="info">
						<p>
							Lorem ipsum dolor sit amet consectetur, adipisicing elit.
							Facilis quae nihil id voluptatum.
						</p>
						<div>
							<a href="#">Xem chi tiết
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</a>
			</div>
			<div class="col l-4 m-6 s-12 block">
				<a href="#">
					<div class="image-box">
						<h3>Đà Nẵng</h3>
						<img src="<?= base_url() ?>assets/images/favorite/danang.jpg" alt="" />
					</div>
					<div class="info">
						<p>
							Lorem ipsum dolor sit amet consectetur, adipisicing elit.
							Facilis quae nihil id voluptatum.
						</p>
						<div>
							<a href="#">Xem chi tiết
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</a>
			</div>
			<div class="col l-4 m-6 s-12 block">
				<a href="#">
					<div class="image-box">
						<h3>Hội An</h3>
						<img src="<?= base_url() ?>assets/images/favorite/hoian.jpg" alt="" />
					</div>
					<div class="info">
						<p>
							Lorem ipsum dolor sit amet consectetur, adipisicing elit.
							Facilis quae nihil id voluptatum.
						</p>
						<div>
							<a href="#">Xem chi tiết
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</a>
			</div>
			<div class="col l-4 m-6 s-12 block">
				<a href="#">
					<div class="image-box">
						<h3>Sapa</h3>
						<img src="<?= base_url() ?>assets/images/favorite/sapa.jpg" alt="" />
					</div>
					<div class="info">
						<p>
							Lorem ipsum dolor sit amet consectetur, adipisicing elit.
							Facilis quae nihil id voluptatum.
						</p>
						<div>
							<a href="#">Xem chi tiết
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<!-- End Section Favorite -->

<!-- Section Why -->
<section id="why">
	<div class="grid wide">
		<div class="row">
			<div class="col l-12">
				<h2 class="heading">Vì sao chọn chúng tôi</h2>
			</div>
		</div>
		<div class="row row-item">
			<?php foreach ($whychooseus as $item) : ?>
			<div class="col l-3 m-6 s-6">
				<div class="item">
					<div class="box-image">
						<img class="image" src="<?= base_url() . $item["Image"] ?>" alt="<?= $item["Title"] ?>" />
					</div>
					<div class="box-content">
						<h3 class="title"><?= $item["Title"] ?></h3>
						<p title="<?= $item["Content"] ?>"><?= $item["Content"] ?></p>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- End Section Why -->

<!-- Section Partner -->
<section id="partner">
	<div class="grid wide">
		<h2 class="heading">Đối tác</h2>
		<div class="row">
			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/bambooairline.png" alt="Bamboo Airline"
						class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/pacific.png" alt="pacific" class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/vietjetair.png" alt="Vietjetair"
						class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/vietnamairlines.png" alt="Vietnamairlines"
						class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/flexflight.png" alt="flexflight"
						class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/dntu.png" alt="DNTU" class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/weba.vn.png" alt="Weba.vn" class="item-image">
				</a>
			</div>
			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/cambodiaangkorair.png" alt="cambodiaangkorair"
						class="item-image">
				</a>
			</div>
			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/chinaairlines.png" alt="chinaairlines"
						class="item-image">
				</a>
			</div>
			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/jetlinx.png" alt="jetlinx" class="item-image">
				</a>
			</div>
			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/koreanair.png" alt="koreanair"
						class="item-image">
				</a>
			</div>
			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/vietravelairlines.png" alt="vietravelairlines"
						class="item-image">
				</a>
			</div>

		</div>
	</div>

</section>
<!-- End Section Partner -->