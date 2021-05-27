<h2>Thống kê</h2>
<section class="statistic">
    <div class="gird">
        <div class="row statistic-content">
            <div class="col l-4">
                <div class="revenue">
                    <i class="revenue-icon fas fa-money-check-alt"></i>
                    <p>
                        <span><?= number_format($revenue, 0, ',', '.') ?></span>
                        <span>Doanh thu</span>
                    </p>
                </div>
            </div>
            <div class="col l-4">
                <div class="bill">
                    <i class="bill-icon fas fa-money-bill-wave"></i>
                    <p>
                        <span><?= number_format($number_of_order, 0, ',', '.') ?></span>
                        <span>Tổng hoá đơn</span>
                    </p>
                </div>
            </div>
            <div class="col l-4">
                <div class="profit">
                    <i class="profit-icon fas fa-hand-holding-usd"></i>
                    <p>
                        <span><?= number_format($profit, 0, ',', '.') ?></span>
                        <span>Lợi nhuận</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="row fill-content">
            <div class="col l-4">
                <div class="status-payment">
                    <h4>Tình trạng thanh toán</h4>
                    <select>
                        <option value="-1">Tất cả</option>
                        <option value="0">Chưa thanh toán</option>
                        <option value="1">Đã thanh toán</option>
                    </select>
                </div>
            </div>
            <div class="col l-4">
                <div class="start-date">
                    <h4>Từ ngày</h4>
                    <input type="date" name="date-start" value="<?= date("Y-m-01") ?>">
                </div>
            </div>
            <div class="col l-4">
                <div class="send-date">
                    <h4>Đến ngày</h4>
                    <input type="date" name="date-end" value="<?= date("Y-m-d") ?>">
                </div>
            </div>

            <div class=" button-fill">
                <button>
                    <i class="fas fa-filter"></i>
                    <span>Lọc</span>
                </button>
            </div>
        </div>
    </div>
</section>
<section>
    <div id="piechart" style="width: 300px; height: 300px;"></div>
    <div id="chart_div"></div>
</section>
<script>
$('.button-fill').click(function() {
    $.ajax({
        type: "POST",
        url: "<?= base_url('admin/statistic/filter') ?>",
        data: {
            status: $('select').val(),
            date_start: $('input[name="date-start"]').val(),
            date_end: $('input[name="date-end"]').val(),
        },
        dataType: "json",
        success: function(data) {
            console.log(data);

        }
    });

    //Vẽ biểu đồ
    $.ajax({
        type: "POST",
        url: "<?= base_url('admin/statistic/orderinday') ?>",
        data: {
            date_start: $('input[name="date-start"]').val(),
            date_end: $('input[name="date-end"]').val(),
        },
        dataType: "json",
        success: function(dulieu) {
            google.charts.load('current', {
                packages: ['corechart', 'line']
            });
            google.charts.setOnLoadCallback(drawLineColors);

            function drawLineColors() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Ngày');
                data.addColumn('number', 'Hoá đơn');

                var arrs = [];
                for (let i in dulieu) {
                    var arr = [];
                    arr.push(dulieu[i].Date);
                    arr.push(parseInt(dulieu[i].Total));
                    arrs.push(arr);
                }

                data.addRows(arrs);

                var options = {
                    hAxis: {
                        title: 'Time'
                    },
                    vAxis: {
                        title: 'Popularity'
                    },
                    colors: ['#a52714', '#097138']
                };

                var chart = new google.visualization.LineChart(document.getElementById(
                    'chart_div'));
                chart.draw(data, options);
            }
        }
    });
});

/*====================================================================================================
============================================= BIỂU ĐỒ ===============================================
====================================================================================================*/

//Tỉ lệ thanh toán hoá đơn
google.charts.load('current', {
    'packages': ['corechart']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Trạng thái', '%'],
        ['Chưa thanh toán', <?= $payment_status_rate[0]['Total'] ?>],
        ['Đã thanh toán', <?= $payment_status_rate[1]['Total'] ?>]
    ]);

    var options = {
        title: 'Tình trạng thanh toán hoá đơn',
        is3D: true,
        legend: 'none',
        backgroundColor: '#f3f4f8',
        titleTextStyle: {
            fontSize: 12,
        }
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}
</script>