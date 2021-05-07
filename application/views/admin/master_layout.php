<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Flight Ticket Admin - <?= $title ?></title>
	<link rel="icon" href="<?= base_url() ?>assets/images/icon.png" type="image/icon type">
	<link rel="stylesheet" href="<?= base_url() ?>assets/styles/main.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
		integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
		crossorigin="anonymous" />
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/ckeditor/ckeditor.js"></script>
	<script src="<?= base_url() ?>assets/ckfinder/ckfinder.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body id="admin-page">
	<nav>
		<div class="logo">
			<a href="<?= base_url() ?>admin">
				<h1>Flight Ticket</h1>
			</a>
		</div>
		<div class="link-list">
			<ul class="links top">
				<li>
					<a href="<?= base_url() ?>admin"><i class="fas fa-home"></i>Dashboard</a>
				</li>
				<li>
					<span><i class="fas fa-newspaper"></i>Bài viết<i class="fas fa-chevron-down arrow"></i></span>
					<ul class="sub-links">
						<li>
							<a href="<?= base_url() ?>admin/news"><i class="fas fa-caret-right"></i>Tất cả bài
								viết</a>
						</li>
						<li>
							<a href="<?= base_url() ?>admin/news/add"><i class="fas fa-caret-right"></i>Thêm
								mới</a>
						</li>
						<li>
							<a href="<?= base_url() ?>admin/news/category"><i class="fas fa-caret-right"></i>Danh
								mục
								bài viết</a>
						</li>

					</ul>
				</li>
				<li>
					<span><i class="fas fa-th"></i>Nội dung website<i class="fas fa-chevron-down arrow"></i></span>
					<ul class="sub-links">
						<li>
							<a href="<?= base_url() ?>admin/whychooseus"><i class="fas fa-caret-right"></i>Vì sao
								chọn chúng tôi</a>
						</li>
						<li>
							<a href="<?= base_url() ?>admin/partner"><i class="fas fa-caret-right"></i>Đối
								tác</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?= base_url() ?>admin/order"><i class="fas fa-scroll"></i>Hoá Đơn</a>
				</li>
			</ul>
			<ul class="links bottom">
				<li>
					<span><i class="fas fa-user"></i>Tài khoản<i class="fas fa-chevron-down arrow"></i></span>
					<ul class="sub-links">
						<li>
							<a href="#"><i class="fas fa-caret-right"></i>Thông tin tài khoản</a>
						</li>
						<li>
							<a href="#"><i class="fas fa-caret-right"></i>Đăng xuất</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?= base_url() ?>admin/websitesetting"><i class="fas fa-info-circle"></i>Thông tin
						website</a>
				</li>
				<li>
					<a href="<?= base_url() ?>" target="_blank"><i class="fas fa-globe-asia"></i>Xem trang web</a>
				</li>
			</ul>
		</div>
		<div class="copyright">
			<p><i class="far fa-copyright"></i> 2021 - Bản quyền của LHD.</p>
		</div>
	</nav>

	<main>
		<?php $this->load->view($view); ?>
	</main>

	<!-- Button back to top -->
	<button class="to-top"><i class="fas fa-caret-up"></i></button>
	<!-- Loader -->
	<div class="loader-container">
		<img src="<?= base_url() ?>assets/images/loading.gif" alt="">
	</div>

	<script src="<?= base_url() ?>assets/scripts/script.js"></script>
	<script>
	$(document).ready(function() {
		$('.links > li > span').click(function() {
			$('.links > li').not($(this).parent()).removeClass("active");
			$('span .arrow').not($(this).find('.arrow')).removeClass("active");

			$(this).parent().toggleClass("active");
			$(this).find('.arrow').toggleClass("active");

			if ($('.links > li').attr('class') != 'active') {
				$('.sub-links').css("height", 0);
			}
			if ($(this).parents('li').attr('class') == 'active') {
				let height = 0;
				$.each($(this).next('.sub-links').find('li'), function() {
					height += $(this).outerHeight();
				});
				height = height + 'px';
				$(this).next('.sub-links').css("height", height);
			}
		});
	});
	</script>
</body>

</html>