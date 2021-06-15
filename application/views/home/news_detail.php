<section id="news-detail">
	<div class="grid wide">
		<div class="row">
			<div class="col l-8 m-8 s-12 news-detail">
				<h1 class="title">
					<?= $news['Name'] ?>
				</h1>
				<div class="img-box">
					<img src="<?= base_url($news['Image']) ?>">
				</div>
				<div class="detail">
					<?= $news['Content'] ?>
				</div>
				<p class="date">
					<i class="far fa-calendar-alt"></i><?= $news['Date'] ?>
				</p>
			</div>
			<div class="col l-4 m-4 s-12 news-related">
				<div class="news-related-wrap">
					<h3 class="related-title">
						Bài viết liên quan
					</h3>
					<ul class="related-list">
						<?php foreach ($related_news as $item) : ?>
						<li class="related-item">
							<a href="<?= base_url('news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault'])) ?>"
								class="related-thumb">
								<img src="<?= base_url($item['Image']) ?>">
							</a>
							<a href="<?= base_url('news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault'])) ?>"
								title="<?= $item['Name'] ?>" class="related-content">
								<h4 class="related-heading"><?= $item['Name'] ?></h4>
								<p><?= $item['Description'] ?></p>
								<p class="related-date">
									<i class="far fa-calendar-alt"></i><?= $item['Date'] ?>
								</p>
							</a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

</section>

<script>
$(document).ready(function() {
	$(document).scroll(function() {
		if ($(window).width() >= 768 && $(this).scrollTop() >= $("#news-detail .row").offset()
			.top - $(
				"header").height() &&
			$(this).scrollTop() <= $("#news-detail .row").offset().top + $("#news-detail .row")
			.outerHeight() - $(".news-related:last-child").height() - $("header").height()) {


			var positiontop = $("#news-detail .row").offset().top;
			var top = $(this).scrollTop() - positiontop + $("header").height();


			$(".news-related:last-child").css({
				"position": "absolute",
				"top": `${top}px`,
				"right": "0",
				"width": "100%"
			});


		}
	});
});
</script>