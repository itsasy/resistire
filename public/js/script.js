 $(document).ready(function () {
    $("#toggle_menu").on('click', () => {
        $('.menu_area').addClass('active');
    });
    $("#toggle_menu_close").on('click', () => {
        $('.menu_area').removeClass('active');
    });

    $(function () {
        $('#img').change(function (e) {
            addImage_01(e);
        });

        function addImage_01(e) {
            var file = e.target.files[0],
                imageType = /image.*/;

            if (!file.type.match(imageType))
                return;

            var reader = new FileReader();
            reader.onload = fileOnload;
            reader.readAsDataURL(file);
        }

        function fileOnload(e) {
            var result = e.target.result;
            $('#img_output_01').attr("src", result);
        }
    });
});