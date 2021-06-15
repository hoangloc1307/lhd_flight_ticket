<section id="news">
    <div class="grid wide">
        <div class="news-header">
            <div class="news-title">
                <h2>Tất cả bài viết</h2>
            </div>
            <div class="news-icon">
                <i class="far fa-newspaper"></i>
            </div>
        </div>
        <div class="row">
            <div class="col l-3 m-4 s-12 category">
                <div class="search-form">
                    <input type="text" placeholder="Nhập tên bài viết">
                    <button><i class="fas fa-search"></i></button>
                </div>
                <h3 class="category-title"> Danh mục bài viết</h3>
                <ul class="category-list">
                    <?php foreach ($news_category as $item) : ?>
                    <li class="category-item">
                        <a href="<?= base_url('news/' . $item['Link']) ?>"><?= $item['Name'] ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col l-9 m-8 s-12">
                <div class="row">
                    <?php foreach ($news as $item) : ?>
                    <div class="col l-4 m-6 s-12 news-item">
                        <div class="news-wrap">
                            <a href="<?= base_url('news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault'])) ?>"
                                title="<?= $item['Name'] ?>" class="img-wrap">
                                <img src="<?= base_url($item['Image']) ?>">
                            </a>
                            <div class="heading-description">
                                <a href="<?= base_url('news/' . ($item['LinkCustom'] != '' ? $item['LinkCustom'] : $item['LinkDefault'])) ?>"
                                    class="news-heading" title="<?= $item['Name'] ?>">
                                    <?= $item['Name'] ?>
                                </a>
                                <p class="news-description"><?= $item['Description'] ?></p>
                                <div class="date-view">
                                    <p class="news-date"><i class="far fa-calendar-alt"></i><?= $item['Date'] ?></p>
                                    <div class="news-view">
                                        <i class="far fa-eye"></i>
                                        <?= $item['View'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="view-more">
                    <button>Xem thêm</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var myObj = {
    offset: 9,
    total: 0
};
//Bấm nút xem thêm
$(document).on('click', '.view-more button', function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?= base_url('admin/Manage_News/GetMoreNews') ?>",
        data: {
            offset: myObj['offset']
        },
        dataType: "json",
        success: function(data) {
            myObj['offset'] += 9;
            myObj['total'] = data['total'];

            var text = "";
            for (var i in data['news']) {
                text += '<div class="col l-4 m-6 s-12 news-item">';
                text += '<div class="news-wrap">';
                text += '<a href="<?= base_url() ?>news/' + (data['news'][i][
                            'LinkCustom'
                        ] != '' ?
                        data['news'][i]['LinkCustom'] : data['news'][i]['LinkDefault']) +
                    '" title="' + data['news'][i]['Name'] + '" class="img-wrap">';
                text += '<img src="<?= base_url() ?>' + data['news'][i]['Image'] + '">';
                text += '</a>';
                text += '<div class="heading-description">';
                text += '<a href="<?= base_url() ?>news/' + (data['news'][i][
                            'LinkCustom'
                        ] != '' ?
                        data['news'][i]['LinkCustom'] : data['news'][i]['LinkDefault']) +
                    '" class="news-heading" title="' + data['news'][i]['Name'] + '">';
                text += data['news'][i]['Name'];
                text += '</a>';
                text += '<p class="news-description">' + data['news'][i]['Description'] +
                    '</p>';
                text += '<div class="date-view">';
                text += '<p class="news-date">';
                text += '<i class="far fa-calendar-alt"></i> ' + data['news'][i]['Date'] +
                    '</p>';
                text += '<div class="news-view"><i class="far fa-eye"></i> ' + data['news']
                    [i][
                        'View'
                    ] + '</div>';
                text += '</div></div></div></div>';
            }
            $('.category + div .row').append(text);
        }
    });
    if (myObj['offset'] > myObj['total']) {
        $('.view-more').remove();
    }
});

//Bấm nút tìm kiếm
$(document).on('click', '.search-form button', function(e) {
    e.preventDefault();
    if ($(".search-form input").val().length > 0) {
        $.ajax({
            type: "post",
            url: "<?= base_url('admin/Manage_News/Search') ?>",
            data: {
                keyword: $(".search-form input").val()
            },
            dataType: "json",
            success: function(data) {
                var text = "";
                if (data != "Không tìm thấy kết quả!") {
                    for (var i in data) {
                        text += '<div class="col l-4 m-4 s-6 news-item">';
                        text += '<div class="news-wrap">';
                        text += '<a href="<?= base_url() ?>news/' + (data[i][
                                'LinkCustom'
                            ] != '' ? data[i]['LinkCustom'] : data[i][
                                'LinkDefault'
                            ]) +
                            '" title="' + data[i]['Name'] + '" class="img-wrap">';
                        text += '<img src="<?= base_url() ?>' + data[i]['Image'] + '">';
                        text += '</a>';
                        text += '<div class="heading-description">';
                        text += '<a href="<?= base_url() ?>news/' + (data[i][
                                'LinkCustom'
                            ] != '' ? data[i]['LinkCustom'] : data[i][
                                'LinkDefault'
                            ]) +
                            '" class="news-heading" title="' + data[i]['Name'] + '">';
                        text += data[i]['Name'];
                        text += '</a>';
                        text += '<p class="news-description">' + data[i]['Description'] +
                            '</p>';
                        text += '<div class="date-view">';
                        text += '<p class="news-date">';
                        text += '<i class="far fa-calendar-alt"></i> ' + data[i][
                                'Date'
                            ] +
                            '</p>';
                        text += '<div class="news-view"><i class="far fa-eye"></i> ' +
                            data[i][
                                'View'
                            ] + '</div>';
                        text += '</div></div></div></div>';
                    }
                } else {
                    text += '<div class="empty">' + data + '</div>';
                    $('.view-more').remove();
                }
                $('.category + div .row').html(text);
            }
        });
    } else {
        toastr["error"]("Nhập từ khoá để tìm kiếm");
    }
});
// Nút ENTER
$(document).on('keypress', function(e) {
    if (e.which == 13) {
        $(".search-form button").trigger("click");
    }
});
</script>