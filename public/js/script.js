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

 $(function () {
    'use strict';
    window.addEventListener('load', function () {

       window.location.hash = "no-back-button";
       window.location.hash = "Again-No-back-button" //chrome
       window.onhashchange = function () {
          window.location.hash = "no-back-button";
       }

       var forms = document.getElementsByClassName('needs-validation');
       var validation = Array.prototype.filter.call(forms, function (form) {
          form.addEventListener('submit', function (event) {
             if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
             }
             form.classList.add('was-validated');
          }, false);
       });
    }, false);
 })();