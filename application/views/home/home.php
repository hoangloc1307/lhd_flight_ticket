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
								value="<?= date("Y-m-d") ?>" min="<?= date("Y-m-d") ?>"
								placeholder="Select date" />
						</label>
						<i class="fas fa-arrows-alt-h"></i>
						<label>
							Ngày về<br /><input id="date-return" type="date" name="freturn"
								value="<?= date("Y-m-d", strtotime(' +7 day')) ?>" min="<?= date("Y-m-d") ?>"
								placeholder=" Select date" />
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
								<input type="radio" name="fclass" value="ECONOMY" checked /> Phổ thông
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
					url: "https://vietjetcms-api.vietjetair.com/api/v1/airport?languageId=a6ca5a9f-6a9c-4f35-bf1c-c42ea3d62f14&requestId=XPFRKE4H6H1J-1620611815236",
					type: "GET",
					dataType: "json",
					success: function(json) {
						for (let i = 0; i < json['airportGroups'].length; i++) {
							$(".tab-container").append(
								"<li>" + json['airportGroups'][i]["name"] + "</li>"
							);

							let txt = '<div class="list-city">';
							txt += '<ul class="list-point">';

							for (let j = 0; j < json['airportGroups'][i]['airports'].length; j++) {
								txt += '<li>';
								txt += json['airportGroups'][i]['airports'][j]['province']['provinceName'];
								txt += ' (';
								txt += json['airportGroups'][i]['airports'][j]['code'];
								txt += ')';
								txt += '</li>';
							}
							txt += "</ul>";
							txt += "</div>";
							$(".list-city-wrap").append(txt);
						}
						/* Load sẽ add class active vào tab & list đầu tiên */
						$(".tab-container li:first-child").addClass("tab-active");
						$(".tab-city .list-city-wrap .list-city:first-of-type").addClass("list-active");
					},

				});

				$('button[name="search-flight"]').click(function() {
					if ($('input[name="forigin"]').val() != '' && $('input[name="fdestination"]').val() != '') {
						$('.loader-container').removeClass('hide');
					}
				})
				</script>

			</div>
			<div class="col l-7 hero-content">
				<div class="content">
					<h2>Flight Ticket - Vé máy bay uy tín</h2>
					<p>
						Niềm vui khi cất cánh
					</p>
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
			<?php foreach ($hot_places as $item) : ?>
			<div class="col l-4 m-6 s-12  block">
				<a
					href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>">
					<div class="image-box">
						<h3><?= $item['Name'] ?></h3>
						<img src="<?= base_url($item['Image']) ?>" alt="<?= $item['Name'] ?>" />
					</div>
					<div class="info">
						<p><?= $item['Description'] ?></p>
						<div>
							<a
								href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>">Xem
								chi tiết
								<i class="fas fa-arrow-right"></i>
							</a>
						</div>
					</div>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- End Section Favorite -->

<!-- Section Why -->
<section id="why">
	<div class="grid wide">
		<div class="row">
			<div class="col l-12 m-12 s-12">
				<h2 class="heading">Vì sao chọn chúng tôi</h2>
			</div>
		</div>
		<div class="row row-item">
			<?php foreach ($whychooseus as $item) : ?>
			<div class="col l-3 m-6 s-12">
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
			<?php foreach ($partners as $item) : ?>
			<div class="col l-2 m-3 s-4">
				<div class="item">
					<img src="<?= base_url($item['Image']) ?>" alt="<?= $item['Name'] ?>" class="item-image">
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
<!-- End Section Partner -->