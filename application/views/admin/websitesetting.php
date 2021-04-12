<h2>Thông tin website</h2>
<section>
    <form>
        <label for="">
            Địa chỉ
            <input type="text" name="address">
        </label>
        <label for="">
            Email
            <input type="mail" name="email">
        </label>
        <label for="">
            Số điện thoại
            <input type="text" name="phone">
        </label>
        <button id="websetting-submit">Lưu</button>
    </form>
</section>
<script>
//Fetch
function fetch() {
    $.ajax({
        url: "<?= base_url() ?>admin/websitesetting/fetch",
        dataType: "json",
        success: function(data) {
            $('input[name="address"]').val(data.Address);
            $('input[name="email"]').val(data.Email);
            $('input[name="phone"]').val(data.Phone);
        }
    });
}
fetch();
//Update
$('#websetting-submit').click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "<?= base_url() ?>admin/websitesetting/update",
        data: {
            address: $('input[name="address"]').val(),
            email: $('input[name="email"]').val(),
            phone: $('input[name="phone"]').val()
        },
        dataType: "json",
        success: function(data) {
            if (data.response == 'success') {
                fetch();
                toastr["success"](data.message);

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            } else {
                toastr["error"](data.message);

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "2000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            }
        }
    });
});
</script>