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
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/scripts/func.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
					<li><a class="menu-link" href="<?= base_url('news/gioi-thieu') ?>">Giới thiệu</a></li>
					<li><a class="menu-link" href="<?= base_url() ?>news">Bài viết</a></li>
					<li><a class="menu-link" href="<?= base_url('news/cau-hoi-thuong-gap') ?>">Câu hỏi thường
							gặp</a></li>
					<li><a class="menu-link" href="<?= base_url('news/lien-he') ?>">Liên hệ</a></li>
					<li class="user">
						<span>
							<i class="fas fa-user"></i>
							<?php echo is_null($this->session->userdata('email')) ? "" : "<p>" . $this->session->userdata('email') . "</p>"; ?>
						</span>
						<ul class="menu-user">
							<?php foreach ($this->session->userdata('user_links') as $key => $value) : ?>
							<li class="menu-list">
								<a href="<?= $value ?>"><?= $key ?></a>
							</li>
							<?php endforeach; ?>
						</ul>
					</li>
				</ul>


			</div>
		</nav>
		<nav class="menu-mobile grid wide">
			<div class="logo">
				<a href="<?= base_url() ?>">
					<h1>Flight Ticket</h1>
					<img src="<?= base_url() ?>assets/images/logo_icon.png" alt="Logo icon" />
				</a>
			</div>
			<div class="icon">
				<i class="fas fa-bars icon-menu"></i>
			</div>
			</div>

		</nav>

		<div class="overlay"></div>
		<div class="list-mobile">
			<div class="close">
				<a class="box-logo" href="<?= base_url() ?>">
					<img src="<?= base_url() ?>assets/images/logomobile.png" alt="Logo" />
				</a>
				<i class="fas fa-times"></i>
			</div>
			<div class="title">
				<p>Menu</p>
			</div>
			<ul>
				<li><a class="menu-link" href="<?= base_url() ?>">Trang chủ</a></li>
				<li><a class="menu-link" href="<?= base_url('news/gioi-thieu') ?>">Giới thiệu</a></li>
				<li><a class="menu-link" href="<?= base_url() ?>news">Tin tức</a></li>
				<li><a class="menu-link" href="<?= base_url() ?>news/cau-hoi-thuong-gap">Câu hỏi thường gặp</a></li>
				<li><a class="menu-link" href="<?= base_url() ?>news/lien-he">Liên hệ</a></li>
				<li class="user">
					<span>
						<i class="fas fa-user"></i>
						<?php echo is_null($this->session->userdata('email')) ? "" : "<p>" . $this->session->userdata('email') . "</p>"; ?>
						<i class="fas fa-angle-down"></i>
					</span>
					<ul class="menu-user">
						<?php foreach ($this->session->userdata('user_links') as $key => $value) : ?>
						<li class="menu-list">
							<a href="<?= $value ?>"><?= $key ?></a>
						</li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div>


		<script>
		// Active menu item
		$.each($('.menu-pc .links > ul > li > a'), function() {
			if ($(this).attr('href') == "<?= current_url() ?>") {
				$(this).addClass('active');
			}
		});
		</script>
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
					<div class="col l-6 m-12 s-12 title">
						<h2><i class="fas fa-plane-departure"></i> Đăng ký nhận tin khuyến mãi</h2>
					</div>
					<div class="col l-6 m-12 s-12 form">
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

					<div class="col l-3 m-6 s-12">
						<h4 class="footer-title">
							Thông tin
						</h4>
						<ul class="footer-list">

							<li class="footer-item">
								<a href="<?= base_url('news/cham-soc-khach-hang') ?>"
									title="Chăm sóc khách hàng">Chăm sóc khách hàng</a>
							</li>
							<li class="footer-item">
								<a href="<?= base_url('news/lien-he') ?>" title="Liên hệ">Liên hệ</a>
							</li>
							<li class="footer-item">
								<a href="<?= base_url('news/') ?>" title="Tin tức">Tin
									tức</a>
							</li>
						</ul>
					</div>

					<div class="col l-3 m-6 s-12">
						<h4 class="footer-title">
							Về chúng tôi
						</h4>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="<?= base_url('news/gioi-thieu') ?>" title="Giới thiệu">Giới thiệu</a>
							</li>
							<li class="footer-item">
								<a href="<?= base_url('news/dieu-khoan-su-dung') ?>"
									title="Điều khoản sử dụng">Điều
									khoản sử dụng</a>
							</li>
							<li class="footer-item">
								<a href="<?= base_url('news/chinh-sach-bao-mat') ?>"
									title="Chính sách bảo mật">Chính
									sách bảo mật</a>
							</li>


						</ul>
					</div>

					<div class="col l-3 m-6 s-12">
						<h4 class="footer-title">
							Hỗ trợ
						</h4>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="<?= base_url('news/huong-dan-thanh-toan') ?>"
									title="Hướng dẫn thanh toán">Hướng dẫn thanh toán</a>
							</li>
							<li class="footer-item">
								<a href="<?= base_url('news/huong-dan-dat-ve') ?>"
									title="Hướng dẫn đạt vé">Hướng dẫn
									đạt vé</a>
							</li>
							<li class="footer-item">
								<a href="<?= base_url('news/cau-hoi-thuong-gap') ?>"
									title="Câu hỏi thường gặp">Câu hỏi
									thường gặp</a>
							</li>
						</ul>
					</div>

					<div class="col l-3 m-6 s-12">
						<h4 class="footer-title">
							Địa chỉ
						</h4>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="https://goo.gl/maps/5o7rSsjfB5c4NAUMA"
									title="<?= $websitesetting['Address'] ?>"><?= $websitesetting['Address'] ?></a>
							</li>
						</ul>
					</div>

					<div class="col l-3 m-6 s-12">
						<h4 class="footer-title">
							Hotline
						</h4>
						<a href="tel:<?= $websitesetting['Phone'] ?>">
							<i class="fas fa-phone-alt"></i>
							<?= $websitesetting['Phone'] ?>
						</a>
					</div>

					<div class="col l-3 m-6 s-12">
						<h4 class="footer-title">
							Email
						</h4>
						<a href="mailto:<?= $websitesetting['Email'] ?>">
							<i class="fas fa-envelope"></i>
							<?= $websitesetting['Email'] ?>
						</a>
					</div>

					<div class="col l-3 m-6 s-12">
						<h4 class="footer-title">
							Kết nối
						</h4>
						<ul class="footer-list">
							<li class="footer-item">
								<a href="<?= $websitesetting['Facebook'] ?>" target="_blank"><i
										class="fab fa-facebook"></i>Facebook</a>
							</li>
							<li class="footer-item">
								<a href="#"><i class="fab fa-instagram"></i>Instagram</a>
							</li>
						</ul>

					</div>
					<div class="col l-3 m-6 s-12 map">
						<h4 class="footer-title">Bản đồ</h4>
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.763903721251!2d106.63860891462122!3d10.829371461175821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175297a0af5da8d%3A0x71f94a40034665dd!2zMjIzIMSQLiBIdXnMgG5oIFbEg24gTmdow6rMoywgUGjGsOG7nW5nIDEyLCBHw7IgVuG6pXAsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1620637581767!5m2!1svi!2s"
							width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy">
						</iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- End Main Footer -->

		<div class="copyright">
			<p><i class="far fa-copyright"></i> 2021 - Bản quyền thuộc LHD.<br><span>Dự án website bán vé máy
					bay - Đồ án ra trường</span></p>
		</div>
	</footer>
	<!-- End Footer -->

	<!-- Button back to top -->
	<button class="to-top"><i class="fas fa-caret-up"></i></button>
	<!-- Loader -->
	<div class="loader-container">
		<img src="<?= base_url() ?>assets/images/loading.gif" alt="">
	</div>
	<!-- Scripts -->
	<script src="<?= base_url() ?>assets/scripts/script.js"></script>
	<script src="<?= base_url() ?>assets/scripts/home.js"></script>
	<script src="<?= base_url() ?>assets/scripts/finding.js"></script>

</body>

</html>