<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <ul>
            <li>
                <a href="<?= base_url() ?>admin/whychooseus">Tại sao chọn chúng tôi</a>
            </li>
            <li>
                <a href="<?= base_url() ?>admin/news">Bài viết</a>
                <ul>
                    <li>
                        <a href="<?= base_url() ?>admin/news/insert">Thêm mới</a>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <?php $this->load->view($view); ?>
</body>

</html>