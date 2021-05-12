<section class="info-card">
    <div class="grid">
        <div class="row">
            <div class="col l-3">
                <div class="block">
                    <div class="row">
                        <div class="content col l-8">
                            <p><?= $number_of_news ?></p>
                            <p>Bài viết</p>
                        </div>
                        <div class="block_icon col l-4">
                            <i class="fas fa-newspaper"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-3">
                <div class="block">
                    <div class="row">
                        <div class="content col l-8">
                            <p><?= $number_of_customer ?></p>
                            <p>Khách hàng</p>
                        </div>
                        <div class="block_icon col l-4">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-3">
                <div class="block">
                    <div class="row">
                        <div class="content col l-8">
                            <p><?= $number_of_order ?></p>
                            <p>Hoá đơn đặt vé</p>
                        </div>
                        <div class="block_icon col l-4">
                            <i class="fas fa-scroll"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col l-3">
                <div class="block">
                    <div class="row">
                        <div class="content col l-8">
                            <p><?= $number_of_partner ?></p>
                            <p>Đối tác</p>
                        </div>
                        <div class="block_icon col l-4">
                            <i class="fas fa-handshake"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="info-table">
    <div class="grid">
        <div class="row">
            <div class="col l-7">
                <div class="table news">
                    <div class="row link">
                        <div class="col l-9">
                            <h3>Bài viết mới nhất</h3>
                        </div>
                        <div class="col l-3 button">
                            <a href="<?= base_url() ?>admin/news">
                                Xem tất cả <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row heading">
                        <div class="col l-6 name">Tên bài viết</div>
                        <div class="col l-4 date">Ngày đăng</div>
                        <div class="col l-2 view">Lượt xem</div>
                    </div>
                    <?php foreach ($news as $item) : ?>
                    <a href="<?= base_url() . 'news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault']) ?>"
                        class="row item" target="_blank">
                        <div class="col l-6 name"><?= $item['Name'] ?></div>
                        <div class="col l-4 date"><?= $item['Date'] ?></div>
                        <div class="col l-2 view"><?= $item['View'] ?></div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col l-5">
                <div class="table order">
                    <div class="row link">
                        <div class="col l-7">
                            <h3>Đơn hàng gần đây</h3>
                        </div>
                        <div class="col l-5 button">
                            <a href="<?= base_url() ?>admin/order">
                                Xem tất cả <i class="fas fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row heading">
                        <div class="col l-3 code">
                            Mã ĐH
                        </div>
                        <div class="col l-5 date">
                            Ngày đặt
                        </div>
                        <div class="col l-4 price">
                            Giá
                        </div>
                    </div>
                    <?php foreach ($orders as $item) :
						$payment_info = json_decode($item['Payment_Info'], true);
					?>
                    <a href="<?= base_url('admin/order/detail/') . $item['Order_ID'] ?>" class="row item">
                        <div class="col l-3 code">
                            <?= $item['Order_Code'] ?>
                        </div>
                        <div class="col l-5 date">
                            <?= $item['Booking_DateTime'] ?>
                        </div>
                        <div class="col l-4 price">
                            <span><?= number_format($payment_info['total_price'], 0, ".", ".") ?></span>
                            <span>VND</span>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
</section>

<script type="text/javascript">
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawVisualization);

function drawVisualization() {
    // Some raw data (not necessarily accurate)
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Vé', 'Doanh thu'],
        ['2021/05', 165, 1000],
        ['2021/06', 135, 900],
        ['2021/07', 157, 400],
        ['2021/08', 139, 200],
        ['2021/09', 136, 100]
    ]);

    var options = {
        title: 'Thống kế vé bán được trong năm 2021',
        vAxis: {
            title: 'Vé'
        },
        hAxis: {
            title: 'Tháng'
        },
        seriesType: 'bars',
        series: {
            5: {
                type: 'line'
            }
        }
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
</script>