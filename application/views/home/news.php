<?php /*foreach ($news as $new) : ?>
<section>

	<img src="<?= $new['Image'] ?>">
	<h3><?= $new['Name'] ?></h3>
	<p><?= $new['Description'] ?></p>
	<a href="<?= base_url() . 'news/' . ($new['LinkCustom'] != '' ? $new['LinkCustom'] : $new['LinkDefault']) ?>">Chi
		tiết</a>
	<p>Ngày đăng: <?= $new['Date'] ?></p>

</section>

<?php endforeach; */ ?>

<section id="news">
	<div class="grid wide">
		<div class="row">
			<div class="col l-12 m-12 s-12 news-header">
				<div class="news-title">
					<h2>Tin tức</h2>
				</div>
				<div class="news-icon">
					<i class="far fa-newspaper"></i>
				</div>
			</div>
			<div class="col l-4 m-4 s-6 news-item">
				<div class="news-wrap">
					<a href="#" title="DaLat" class="img-wrap">
						<img src="<?= base_url() ?>assets/images/favorite/hoian.jpg">
					</a>
					<div class="heading-description">
						<a href="#" class="news-heading">
							Vì sao bạn phải đến du lịch Đài Loan một lần trong đời?
						</a>
						<p class="news-description">
							Đài Loan là điểm đến gần như hoàn hảo, với thành phố nhộn nhịp, thiên nhiên hùng vĩ,
							văn hóa lâu đời và ẩm thực đời.
						</p>
						<div class="date-view">

							<p class="news-date">
								<i class="far fa-calendar-alt"></i>
								13/01/1999
							</p>
							<div class="news-view">
								<i class="far fa-eye"></i>
								123
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col l-4 m-4 s-6 news-item">
				<div class="news-wrap">
					<a href="#" title="DaLat" class="img-wrap">
						<img src="<?= base_url() ?>assets/images/favorite/dalat.jpg">
					</a>
					<div class="heading-description">
						<a href="#" class="news-heading">
							Vì sao bạn phải đến du lịch Đài Loan một lần trong đời?
						</a>
						<p class="news-description">
							Đài Loan là điểm đến gần như hoàn hảo, với thành phố nhộn nhịp, thiên nhiên hùng vĩ,
							văn hóa lâu đời và ẩm thực đời.
						</p>
						<div class="date-view">

							<p class="news-date">
								<i class="far fa-calendar-alt"></i>
								13/01/1999
							</p>
							<div class="news-view">
								<i class="far fa-eye"></i>
								123
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col l-4 m-4 s-6 news-item">
				<div class="news-wrap">
					<a href="#" title="DaLat" class="img-wrap">
						<img src="<?= base_url() ?>assets/images/favorite/dalat.jpg">
					</a>
					<div class="heading-description">
						<a href="#" class="news-heading">
							Vì sao bạn phải đến du lịch Đài Loan một lần trong đời?
						</a>
						<p class="news-description">
							Đài Loan là điểm đến gần như hoàn hảo, với thành phố nhộn nhịp, thiên nhiên hùng vĩ,
							văn hóa lâu đời và ẩm thực đời.
						</p>
						<div class="date-view">

							<p class="news-date">
								<i class="far fa-calendar-alt"></i>
								13/01/1999
							</p>
							<div class="news-view">
								<i class="far fa-eye"></i>
								123
							</div>
						</div>
					</div>

				</div>
			</div>
			<div class="col l-4 m-4 s-6 news-item">
				<div class="news-wrap">
					<a href="#" title="DaLat" class="img-wrap">
						<img src="<?= base_url() ?>assets/images/favorite/dalat.jpg">
					</a>
					<div class="heading-description">
						<a href="#" class="news-heading">
							Vì sao bạn phải đến du lịch Đài Loan một lần trong đời?
						</a>
						<p class="news-description">
							Đài Loan là điểm đến gần như hoàn hảo, với thành phố nhộn nhịp, thiên nhiên hùng vĩ,
							văn hóa lâu đời và ẩm thực đời.
						</p>
						<div class="date-view">

							<p class="news-date">
								<i class="far fa-calendar-alt"></i>
								13/01/1999
							</p>
							<div class="news-view">
								<i class="far fa-eye"></i>
								123
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>