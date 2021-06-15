<h2>Tại sao chọn chúng tôi</h2>
<form action="<?= base_url('admin/WhyChooseUs/Edit') ?>" method="post" enctype="multipart/form-data">

    <div class="row">
        <?php
        $stt = 0;
        foreach ($dulieu as $value) :
        ?>

        <div class="why col l-6">
            <h3><?= $value['Title'] ?></h3>
            <div class="why-wrap">
                <div class="why-col">
                    <div class="why-wrap-img">
                        <h4 class="why-title">
                            Hình ảnh
                        </h4>
                        <div class="why-img">
                            <img src="<?= base_url($value['Image']) ?>" alt="<?= $value['Title'] ?>"
                                id="image-<?= $stt ?>">
                        </div>
                    </div>
                    <div class="why-file">
                        <!-- <input type="file" name="image[]"> -->
                        <input class="input-img" type="input" id="image-input-<?= $stt ?>" name="image[]" value="<?= $value['Image'] ?>"
                            readonly>
                        <button class="btn-image button-img">Chọn hình ảnh</button>
                    </div>
                </div>
                <div class="why-col">
                    <h4 class="why-title">
                        Tiêu đề
                    </h4>
                    <div class="why-text">
                        <input class="" type="text" name="title[]" value="<?= $value['Title'] ?>">
                    </div>
                </div>
            </div>

            <div class="why-wrap-content">

                <h4 class="why-title">
                    Nội dung
                </h4>
                <textarea class="why-content" name="content[]" id="" cols="30"
                    rows="10"><?= $value['Content'] ?></textarea>
            </div>
        </div>



        <?php
            $stt++;
        endforeach;
        ?>

    </div>
    <button class="button-submit" type="submit">Cập nhật</button>
</form>
<script>
$('.btn-image').click(function(e) {
    e.preventDefault();
    selectFileWithCKFinder($(this).prev().attr('id'));
})

function selectFileWithCKFinder(elementId) {
    CKFinder.modal({
        chooseFiles: true,
        width: 800,
        height: 600,
        onInit: function(finder) {
            finder.on('files:choose', function(evt) {
                var file = evt.data.files.first();
                var output = document.getElementById(elementId);
                output.value = file.getUrl();

                // Show image khi chọn file xong.
                var img = document.getElementById(elementId.replace("input-", ""));
                img.src = file.getUrl();
            });
        }
    });
}
</script>