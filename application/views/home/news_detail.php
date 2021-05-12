<section id="news-detail">
	<div class="grid wide">
		<div class="row">
			<div class="col l-9 m-9 s-12 news-detail">
				<h1 class="title">
					<?= $news['Name'] ?>
				</h1>
				<div class="img-box">
					<img src="<?= base_url() . $news['Image'] ?>">
				</div>
				<div class="detail">
					<?= $news['Content'] ?>
				</div>
				<p class="date">
					<?= $news['Date'] ?>
				</p>
			</div>
			<div class="col l-3 m-3 s-12 news-related">
				<div class="news-related-wrap">
					<h3 class="related-title">
						Bài viết liên quan
					</h3>
					<ul class="related-list">
						<?php foreach ($related_news as $item) : ?>
						<li class="related-item">
							<a href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>"
								class="related-thumb">
								<img src="<?= base_url() . $item['Image'] ?>">
							</a>
							<h4 class="related-heading">
								<a href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>"
									title=""><?= $item['Name'] ?></a>
							</h4>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

</section>