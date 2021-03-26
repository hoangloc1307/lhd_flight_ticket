<!-- Section Hero -->
<section id="hero">
	<div class="grid wide">
		<div class="row">
			<div class="col l-5 booking-form">
				<h2><i class="fas fa-plane"></i> Xin chào! Bạn muốn đi đâu?</h2>
				<form action="">
					<div class="type">
						<label>
							<input type="radio" name="ftype" value="" /> Round Trip
							<span class="radiobtn"></span>
						</label>
						<label>
							<input type="radio" name="ftype" value="" /> One Way
							<span class="radiobtn"></span>
						</label>
						<label>
							<input type="radio" name="ftype" value="" />
							Multiple Destinations
							<span class="radiobtn"></span>
						</label>
					</div>
					<div class="way">
						<label>
							Điểm đi<br />
							<input class="choose" type="text" name="fway" value="" placeholder="Chọn" />

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
										<li class="tab-active">
											<span>Việt Nam</span>
										</li>
										<li>
											<span>Thái lan</span>
										</li>
									</ul>
									<div class="list-city-wrap">
										<div id="tab-1" class="list-city list-active">
											<ul class="list-point">
												<li>Hồ Chí Minh (SGN)</li>
												<li>Hà Nội (HAN)</li>
												<li>Đà Lạt (DLI)</li>
											</ul>
										</div>

										<div id="tab-2" class="list-city">
											<ul class="list-point">
												<li>Băng Cốc (BKK)</li>
												<li>Jakarta (JKT)</li>
												<li>Kuala Lumpur (KUL)</li>
											</ul>
										</div>
									</div>

								</div>

							</div>
						</label>
						<i class="fas fa-random"></i>
						<label>
							Điểm đến<br />
							<input class="choose" type="text" name="fway" value="" placeholder="Chọn" />

							<div class="way-popup">
								<div class="header">
									<h4>
										<i class="far fa-paper-plane"></i>
										Chọn điểm đến
									</h4>
									<button type="button" class="close"><i class="fas fa-times"></i></button>
								</div>
								<div class="tab-city">
									<ul class="tab-container">
										<li class="tab-active">
											<span>Việt Nam</span>
										</li>
										<li>
											<span>Thái lan</span>
										</li>
									</ul>
									<div class="list-city-wrap">
										<div id="tab-1" class="list-city list-active">
											<ul class="list-point">
												<li>Hồ Chí Minh (SGN)</li>
												<li>Hà Nội (HAN)</li>
												<li>Đà Lạt (DLI)</li>
											</ul>
										</div>

										<div id="tab-2" class="list-city">
											<ul class="list-point">
												<li>Băng Cốc (BKK)</li>
												<li>Jakarta (JKT)</li>
												<li>Kuala Lumpur (KUL)</li>
											</ul>
										</div>
									</div>

								</div>

							</div>
						</label>
					</div>
					<div class="date">
						<label>
							Ngày đi<br /><input type="date" name="fdate" value="" placeholder="Select date" />
						</label>
						<i class="fas fa-arrows-alt-h"></i>
						<label>
							Ngày về<br /><input type="date" name="fdate" value="" placeholder="Select date" />
						</label>
					</div>
					<div class="class">
						<p class="heading">Class</p>
						<label>
							<input type="radio" name="fclass" value="" />
							Economy
							<span class="radiobtn"></span>
						</label>
						<label>
							<input type="radio" name="fclass" value="" />
							Business Class
							<span class="radiobtn"></span>
						</label>
						<label>
							<input type="radio" name="fclass" value="" />
							First Class
							<span class="radiobtn"></span>
						</label>
					</div>
					<div class="currency">
						<label>
							Currency<br />
							<select name="fcurrency">
								<option value="VND">VND</option>
								<option value="USD">USD</option>
							</select>
						</label>
					</div>
					<input type="submit" value="Search flight" />
				</form>
			</div>
			<div class="col l-7 hero-content">
				<div class="content">
					<h2>It's lovely to feel welcome</h2>
					<p>The whole world on the platter</p>
					<a href="#">Find out more</a>
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
			<div class="col l-12">
				<h2 class="heading">Địa điểm nổi bật</h2>
			</div>
			<div class="col l-4 block">
				<div class="image-box">
					<h3>Hạ Long</h3>
					<img src="<?= base_url() ?>assets/images/favorite/halong.jpg" alt="" />
				</div>
				<div class="info">
					<h3>Hạ Long</h3>
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
			</div>
			<div class="col l-4 block">
				<div class="image-box">
					<h3>Nha Trang</h3>
					<img src="<?= base_url() ?>assets/images/favorite/nhatrang.jpg" alt="" />
				</div>
				<div class="info">
					<h3>Nha Trang</h3>
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
			</div>
			<div class="col l-4 block">
				<div class="image-box">
					<h3>Đà Lạt</h3>
					<img src="<?= base_url() ?>assets/images/favorite/dalat.jpg" alt="" />
				</div>
				<div class="info">
					<h3>Đà Lạt</h3>
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
			</div>
			<div class="col l-4 block">
				<div class="image-box">
					<h3>Đà Nẵng</h3>
					<img src="<?= base_url() ?>assets/images/favorite/danang.jpg" alt="" />
				</div>
				<div class="info">
					<h3>Đà Nẵng</h3>
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
			</div>
			<div class="col l-4 block">
				<div class="image-box">
					<h3>Hội An</h3>
					<img src="<?= base_url() ?>assets/images/favorite/hoian.jpg" alt="" />
				</div>
				<div class="info">
					<h3>Hội An</h3>
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
			</div>
			<div class="col l-4 block">
				<div class="image-box">
					<h3>Sapa</h3>
					<img src="<?= base_url() ?>assets/images/favorite/sapa.jpg" alt="" />
				</div>
				<div class="info">
					<h3>Sapa</h3>
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

			<div class="col l-3 m-6 s-6">
				<div class="item">
					<div class="box-image">
						<img class="image" src="<?= base_url() ?>assets/images/assisstant.png"
							alt="Hỗ Trợ 24/7" />
					</div>
					<div class="box-content">
						<h3 class="title">Hỗ Trợ 24/7</h4>
							<p>
								LHD Flight Ticket luôn săn sàng tư vấn và giải đáp
								thắc mắc của Khách hàng 24/7.
							</p>
					</div>
				</div>
			</div>

			<div class="col l-3 m-6 s-6">
				<div class="item">
					<div class="box-image">
						<img class="image" src="<?= base_url() ?>assets/images/discount.png"
							alt="Giá vé tốt nhất" />
					</div>
					<div class="box-content">
						<h3 class="title">Giá vé tốt nhất</h4>
							<p>
								Đảm bảo giá vé máy bay tốt nhất cho nhu cầu đặt mua vé máy bay theo các chặng
								khác
								nhau của Khách hàng.
							</p>
					</div>
				</div>
			</div>

			<div class="col l-3 m-6 s-6">
				<div class="item">
					<div class="box-image">
						<img class="image" src="<?= base_url() ?>assets/images/DichVuDaDang.png"
							alt="Dịch vụ đa dạng" />
					</div>
					<div class="box-content">
						<h3 class="title">Dịch vụ đa dạng</h4>
							<p>
								Ngoài dịch vụ vé máy bay chung tôi còn có dịch vụ thuê xe và khách sạn phục vụ
								Khách hàng
							</p>
					</div>
				</div>
			</div>

			<div class="col l-3 m-6 s-6">
				<div class="item">
					<div class="box-image">
						<img class="image" src="<?= base_url() ?>assets/images/GiaoVeTanNoi.png"
							alt="Giao vé tận nơi" />
					</div>
					<div class="box-content">
						<h3 class="title">Giao vé tận nơi</h4>
							<p>
								Giao vé tận nơi nhanh chóng, uy tín, nhận vé mới thanh toán
							</p>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- End Section Why -->

<!-- Section Partner -->
<section id="partner">
	<div class="grid wide">
		<div class="row">
			<div class="col l-12">
				<h2 class="heading">Đối tác</h2>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/bambooairline.png" alt="Bamboo Airline"
						class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/pacific.png" alt="Bamboo Airline"
						class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/vietjetair.png" alt="Bamboo Airline"
						class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/vietnamairlines.png" alt="Bamboo Airline"
						class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/dntu.png" alt="Bamboo Airline"
						class="item-image">
				</a>
			</div>

			<div class="col l-2">
				<a href="" class="item">
					<img src="<?= base_url() ?>assets/images/Partner/weba.vn.png" alt="Bamboo Airline"
						class="item-image">
				</a>
			</div>

		</div>
	</div>

</section>
<!-- End Section Partner -->