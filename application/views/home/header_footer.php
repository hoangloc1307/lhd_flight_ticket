<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta property="og:title" content="LHD Flight Ticket" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="<?= base_url() ?>" />
	<meta property="og:image:url" content="<?= base_url('assets/images/logomobile.png') ?>" />
	<meta property="og:description"
		content="Vé máy bay giá rẻ. Mua vé máy bay giá rẻ hãy đến với LHD Flight Ticket." />

	<title>Flight Ticket - <?= $title ?></title>
	<link rel="icon" href="<?= base_url('assets/images/icon.png') ?>" type="image/icon type">
	<link rel="stylesheet" href="<?= base_url('assets/styles/main.css') ?>" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
		integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
		crossorigin="anonymous" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?= base_url('assets/scripts/func.js') ?>"></script>
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
					<img src="<?= base_url('assets/images/logo_icon.png') ?>" alt="Logo icon" />
				</a>
			</div>
			<div class="links">
				<ul>
					<li><a class="menu-link" href="<?= base_url() ?>">Trang chủ</a></li>
					<li><a class="menu-link" href="<?= base_url('news/gioi-thieu') ?>">Giới thiệu</a></li>
					<li><a class="menu-link" href="<?= base_url('news') ?>">Bài viết</a></li>
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
					<img src="<?= base_url('assets/images/logo_icon.png') ?>" alt="Logo icon" />
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
					<img src="<?= base_url('assets/images/logomobile.png') ?>" alt="Logo" />
				</a>
				<i class="fas fa-times"></i>
			</div>
			<div class="title">
				<p>Menu</p>
			</div>
			<ul>
				<li><a class="menu-link" href="<?= base_url() ?>">Trang chủ</a></li>
				<li><a class="menu-link" href="<?= base_url('news/gioi-thieu') ?>">Giới thiệu</a></li>
				<li><a class="menu-link" href="<?= base_url('news') ?>">Tin tức</a></li>
				<li><a class="menu-link" href="<?= base_url('news/cau-hoi-thuong-gap') ?>">Câu hỏi thường gặp</a>
				</li>
				<li><a class="menu-link" href="<?= base_url('news/lien-he') ?>">Liên hệ</a></li>
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
									title="Chăm sóc khách hàng">Chăm
									sóc khách hàng</a>
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
		<img src="<?= base_url('assets/images/loading.gif') ?>" alt="">
	</div>

	<!-- Hotline Zalo Mail -->

	<div class="support-online type-02" id="phone">
		<a href="tel:0123456789" target="_blank">
			<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone-alt" role="img"
				xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
				class="svg-inline--fa fa-phone-alt fa-w-16">
				<path fill="currentColor"
					d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"
					class=""></path>
			</svg>
			<div class="animated infinite zoomIn alo-circle"></div>
			<div class="animated infinite pulse alo-circle-fill"></div>
		</a>
	</div>

	<div class="support-online type-01" id="zalo">
		<a href="https://zalo.me/0123456789" target="_blank">
			<svg id="svg_zalo_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
				version="1.1" viewBox="0 0 614.501 613.667" xml:space="preserve">
				<path
					d="M464.721,301.399c-13.984-0.014-23.707,11.478-23.944,28.312c-0.251,17.771,9.168,29.208,24.037,29.202   c14.287-0.007,23.799-11.095,24.01-27.995C489.028,313.536,479.127,301.399,464.721,301.399z">
				</path>
				<path
					d="M291.83,301.392c-14.473-0.316-24.578,11.603-24.604,29.024c-0.02,16.959,9.294,28.259,23.496,28.502   c15.072,0.251,24.592-10.87,24.539-28.707C315.214,313.318,305.769,301.696,291.83,301.392z">
				</path>
				<path
					d="M310.518,3.158C143.102,3.158,7.375,138.884,7.375,306.3s135.727,303.142,303.143,303.142   c167.415,0,303.143-135.727,303.143-303.142S477.933,3.158,310.518,3.158z M217.858,391.083   c-33.364,0.818-66.828,1.353-100.133-0.343c-21.326-1.095-27.652-18.647-14.248-36.583c21.55-28.826,43.886-57.065,65.792-85.621   c2.546-3.305,6.214-5.996,7.15-12.705c-16.609,0-32.784,0.04-48.958-0.013c-19.195-0.066-28.278-5.805-28.14-17.652   c0.132-11.768,9.175-17.329,28.397-17.348c25.159-0.026,50.324-0.06,75.476,0.026c9.637,0.033,19.604,0.105,25.304,9.789   c6.22,10.561,0.284,19.512-5.646,27.454c-21.26,28.497-43.015,56.624-64.559,84.902c-2.599,3.41-5.119,6.88-9.453,12.725   c23.424,0,44.123-0.053,64.816,0.026c8.674,0.026,16.662,1.873,19.941,11.267C237.892,379.329,231.368,390.752,217.858,391.083z    M350.854,330.211c0,13.417-0.093,26.841,0.039,40.265c0.073,7.599-2.599,13.647-9.512,17.084   c-7.296,3.642-14.71,3.028-20.304-2.968c-3.997-4.281-6.214-3.213-10.488-0.422c-17.955,11.728-39.908,9.96-56.597-3.866   c-29.928-24.789-30.026-74.803-0.211-99.776c16.194-13.562,39.592-15.462,56.709-4.143c3.951,2.619,6.201,4.815,10.396-0.053   c5.39-6.267,13.055-6.761,20.271-3.357c7.454,3.509,9.935,10.165,9.776,18.265C350.67,304.222,350.86,317.217,350.854,330.211z    M395.617,369.579c-0.118,12.837-6.398,19.783-17.196,19.908c-10.779,0.132-17.593-6.966-17.646-19.512   c-0.179-43.352-0.185-86.696,0.007-130.041c0.059-12.256,7.302-19.921,17.896-19.222c11.425,0.752,16.992,7.448,16.992,18.833   c0,22.104,0,44.216,0,66.327C395.677,327.105,395.828,348.345,395.617,369.579z M463.981,391.868   c-34.399-0.336-59.037-26.444-58.786-62.289c0.251-35.66,25.304-60.713,60.383-60.396c34.631,0.304,59.374,26.306,58.998,61.986   C524.207,366.492,498.534,392.205,463.981,391.868z">
				</path>
			</svg>
			<div class="animated infinite zoomIn alo-circle"></div>
			<div class="animated infinite pulse alo-circle-fill"></div>
		</a>
	</div>



	<!-- Scripts -->
	<script src="<?= base_url('assets/scripts/script.js') ?>"></script>
	<script src="<?= base_url('assets/scripts/home.js') ?>"></script>
	<script src="<?= base_url('assets/scripts/finding.js') ?>"></script>

</body>

</html>