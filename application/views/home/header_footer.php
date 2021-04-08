<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Flight Ticket - <?= $title ?></title>
	<link rel="icon" href="<?= base_url() ?>assets/images/icon.png" type="image/icon type">
	<link rel="stylesheet" href="<?= base_url() ?>assets/styles/main.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
		integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
		crossorigin="anonymous" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<!-- Header -->
	<header>
		<nav class="menu-pc grid wide">
			<div class="logo">
				<a href="<?= base_url() ?>">
					<h1>Flight Ticket</h1>
					<img src="<?= base_url() ?>assets/images/logo_icon.png" alt="Logo icon" />
				</a>
			</div>
			<div class="links">
				<ul>
					<li><a class="menu-link" href="<?= base_url() ?>">Trang chủ</a></li>
					<li><a class="menu-link" href="<?= base_url() ?>news">Tin tức</a></li>
					<li class="user">
						<span>
							<i class="fas fa-user"></i>
							<p>Hello</p>
						</span>
						<ul class="menu-user">
							<li class="menu-list">
								<a href="#"> Thông tin người dùng</a>
							</li>
							<li class="menu-list">
								<a href="#"> Đăng xuất </a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<script>
		// Active menu item
		$.each($('.menu-pc .links > ul > li > a'), function() {
			if ($(this).attr('href') == "<?= current_url() ?>") {
				$(this).addClass('active');
			}
		});
		</script>
		<nav class="menu-mobile"></nav>
	</header>
	<!-- End Header -->

	<!-- Main -->
	<main>
		<?php $this->load->view($view); ?>
	</main>
	<!--End Main -->

	<!-- Footer -->
	<footer>
		<!-- News Letter -->
		<div class="news-letter">
			<div class="grid wide">
				<div class="row">
					<div class="col l-6 title">
						<h2><i class="fas fa-plane-departure"></i> Đăng ký nhận tin khuyến mãi</h2>
					</div>
					<div class="col l-6 form">
						<form action="" method="">
							<input type="text" placeholder="Nhập địa chỉ email...">
							<button type="submit"><i class="fas fa-paper-plane"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- End News Letter -->

		<!-- Main Footer -->
		<div class="main-footer">
			<div class="grid wide">
				<div class="row about-us">

					<div class="col l-3">
						<h4 class="footer-title">
							Thông tin thêm
						</h4>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="#" title="Điều khoản sử dụng">Điều khoản sử dụng</a>
							</li>
							<li class="footer-item">
								<a href="#" title="Chính sách bảo mật">Chính sách bảo mật</a>
							</li>
							<li class="footer-item">
								<a href="#" title="Hướng dẫn đạt vé">Hướng dẫn đạt vé</a>
							</li>
						</ul>
					</div>

					<div class="col l-3">
						<h4 class="footer-title">
							Về chúng tôi
						</h4>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="#" title="Giới thiệu">Giới thiệu</a>
							</li>
							<li class="footer-item">
								<a href="#" title="Chính sách bảo mật">Khách hàng nói về chúng tôi</a>
							</li>
						</ul>
					</div>

					<div class="col l-3">
						<h4 class="footer-title">
							Hỗ trợ
						</h4>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="#" title="Phản hồi">Phản hồi</a>
							</li>
							<li class="footer-item">
								<a href="#" title="Câu hỏi thường gặp">Câu hỏi thường gặp</a>
							</li>
							<li class="footer-item">
								<a href="#" title="Tư vấn hỗ trợ đặt vé">Tư vấn hỗ trợ đặt vé</a>
							</li>
						</ul>
					</div>

					<div class="col l-3">
						<h4 class="footer-title">
							Trụ sở
						</h4>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="#"
									title="Đường Nguyễn Khuyến, KP5, Phường Trảng Dài, TP. Biên Hòa, Tỉnh Đồng Nai">Đường
									Nguyễn Khuyến, KP5, phường Trảng Dài, TP. Biên Hòa, Tỉnh Đồng
									Nai</a>
							</li>
							<li class="footer-item">
								<a href="#"
									title="Đường Trần Thị Trọng, KP10, Phường 15, Quận Tân Bình, TPHCM">Khu
									phố
									10, Phường 15, Quận Tân Bình, TPHCM</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="row contact">
					<div class="col l-3">
						<div class="footer-contact">
							<div class="hotline">
								<i class="fas fa-phone"></i>
								<p>Hotline</p>
							</div>
							<a href="tel:">0123 456 789</a>
						</div>
					</div>

					<div class="col l-3">
						<div class="footer-contact">
							<div class="hotline">
								<i class="fas fa-phone"></i>
								<p>Điện thoại</p>
							</div>
							<a href="tel:">0789 654 321</a>
						</div>
					</div>

					<div class="col l-6 search">
						<form action="">
							<input type="text" class="footer-search" placeholder="Tôi có thể giúp gì cho bạn?">
						</form>
						<button type="submit" class="footer-submit">
							<i class="fas fa-search"></i>
						</button>
					</div>


				</div>
			</div>
		</div>
		<!-- End Main Footer -->

		<div class="copyright">
			<p><i class="far fa-copyright"></i> 2021 - Bản quyền của LHD.<br><span>Dự án website bán vé máy
					bay
					để ra trường 2017-2021.</span></p>
		</div>
	</footer>
	<!-- End Footer -->

	<!-- Button back to top -->
	<button class="to-top"><i class="fas fa-caret-up"></i></button>
	<!-- Loader -->
	<div class="loader-container">
		<div class="loader">
			<span style="--i: 1;"></span>
			<span style="--i: 2;"></span>
			<span style="--i: 3;"></span>
			<span style="--i: 4;"></span>
			<span style="--i: 5;"></span>
			<span style="--i: 6;"></span>
			<span style="--i: 7;"></span>
			<span style="--i: 8;"></span>
			<span style="--i: 9;"></span>
			<span style="--i: 10;"></span>
			<span style="--i: 11;"></span>
			<span style="--i: 12;"></span>
			<span style="--i: 13;"></span>
			<span style="--i: 14;"></span>
			<span style="--i: 15;"></span>
			<span style="--i: 16;"></span>
			<span style="--i: 17;"></span>
			<span style="--i: 18;"></span>
			<span style="--i: 19;"></span>
			<span style="--i: 20;"></span>
			<div class="plane"></div>
		</div>
	</div>
	<!-- Scripts -->
	<script src="<?= base_url() ?>assets/scripts/script.js"></script>
	<script src="<?= base_url() ?>assets/scripts/home.js"></script>
</body>

</html>