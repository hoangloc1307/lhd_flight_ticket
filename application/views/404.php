<div class="page404">
    <div class="content">
        <img src="<?= base_url('assets/images/404.png') ?>" alt="404">
        <p>
            Đường dẫn không tồn tại.<br><a href="<?= base_url() ?>">Quay lại trang chủ</a>
        </p>
    </div>
</div>
<style>
body {
    margin: 0;
    font-family: sans-serif;
}

.page404 {
    background-image: url('./assets/images/404_background.png');
    background-position: center;
    background-size: cover;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

.page404 img {
    width: 100%;
    max-width: 400px;
}

.page404 p {
    font-size: 1.5em;
    color: #fff;
    text-align: center;
    line-height: 2em;
}

.page404 p a {
    text-decoration: none;
    background: #fff;
    color: #194afa;
    font-size: 0.8em;
    padding: 8px 16px;
    border-radius: 20px;
}
</style>