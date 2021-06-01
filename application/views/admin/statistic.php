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
                    <input type="date" name="date-start" value="<?= date("Y-m-d", strtotime('-7 day')) ?>">
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
<section class="charts" style="display: flex; flex-wrap: wrap;">
    <div id="tablechart" style="width: 100%; margin-bottom: 0px;"></div>
    <div id="linechart" style="width: 100%;"></div>
    <div id="piechart" style="width: 45%;"></div>
    <div id="barchart" style="width: 55%;"></div>

</section>
<script>
//Bấm nút lọc
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
        success: function(dulieu) {
            google.charts.load('current', {
                'packages': ['table']
            });
            google.charts.setOnLoadCallback(drawTable);

            function drawTable() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Mã hoá đơn');
                data.addColumn('string', 'Loại vé');
                data.addColumn('string', 'Điểm đi');
                data.addColumn('string', 'Điểm đến');
                data.addColumn('string', 'Ngày đặt');
                data.addColumn('number', 'Giá');
                data.addColumn('number', 'Thực thu');
                data.addColumn('number', 'Lợi nhuận');
                data.addColumn('string', 'Trạng thái');

                data.addRows(dulieu);

                var table = new google.visualization.Table(document.getElementById('tablechart'));

                var cssClass = {

                }

                table.draw(data, {
                    showRowNumber: true,
                    width: '100%',
                    height: '100%',
                    pageSize: 10,
                });
            }
            console.log(dulieu);
        }
    });

    //Vẽ biểu đồ
    $.ajax({
        type: "POST",
        url: "<?= base_url('admin/statistic/orderinday') ?>",
        data: {
            date_start: $('input[name="date-start"]').val(),
            date_end: $('input[name="date-end"]').val(),
            status: $('.status-payment select').val(),
        },
        dataType: "json",
        success: function(dulieu) {

            //Bar chart
            google.charts.load('current', {
                packages: ['corechart', 'bar']
            });
            google.charts.setOnLoadCallback(drawBasic);

            function drawBasic() {

                var data = google.visualization.arrayToDataTable([
                    ['Tên', 'Số tiền', {
                        type: 'string',
                        role: 'annotation'
                    }, {
                        role: 'style'
                    }],
                    ['Doanh thu', parseInt(dulieu['bar_data'][0]['Revenue']),
                        NumberWithCommas(dulieu['bar_data'][0]['Revenue']),
                        'color: #3498db',
                    ],
                    ['Tiền gốc', parseInt(dulieu['bar_data'][0]['BasePrice']),
                        NumberWithCommas(dulieu['bar_data'][0]['BasePrice']),
                        'color: #e74c3c',
                    ],
                    ['Lợi nhuận', parseInt(dulieu['bar_data'][0]['Profit']),
                        NumberWithCommas(dulieu['bar_data'][0]['Profit']),
                        'color: #f1c40f',
                    ],
                ]);

                var options = {
                    title: 'Biểu đồ thống kế doanh thu và lợi nhuận (Hoá đơn đã thanh toán)',
                    legend: 'none',
                    backgroundColor: '#f3f4f8',
                };



                var chart = new google.visualization.BarChart(document.getElementById(
                    'barchart'));

                chart.draw(data, options);
            }

            //Line chart
            google.charts.load('current', {
                packages: ['corechart', 'line']
            });
            google.charts.setOnLoadCallback(drawLineColors);

            function drawLineColors() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Ngày');
                data.addColumn('number', 'Hoá đơn');

                data.addRows(dulieu['line_data']);

                var options = {
                    title: 'Số lượng hoá đơn theo ngày',
                    colors: ['#3498db'],
                    backgroundColor: '#f3f4f8',
                    legend: 'none',
                };

                var chart = new google.visualization.LineChart(document.getElementById(
                    'linechart'));
                chart.draw(data, options);
            }

            //Pie chart
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['Trạng thái', '%'],
                    ['Chưa thanh toán', parseInt(dulieu['pie_data'][0]['Total'])],
                    ['Đã thanh toán', parseInt(dulieu['pie_data'][1]['Total'])]
                ]);

                var options = {
                    title: 'Tình trạng thanh toán hoá đơn',
                    is3D: true,
                    backgroundColor: '#f3f4f8',
                    titleTextStyle: {
                        fontSize: 12,
                    },
                    colors: ['#e74c3c', '#2ecc71']
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        }
    });
});
</script>