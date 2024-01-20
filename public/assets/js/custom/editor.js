tinymce.init({
    selector: "textarea:not(.detail_ad, .report_bug, .google_analytics, .robot_txt, .meta_description, .package_description, .not_editor)",
    forced_root_block : false,
    paste_data_images: false,
    entity_encoding: "raw",

    height : "450",

    /* plugins: [

      "advlist lists  charmap  preview hr anchor pagebreak",

      "code advcode searchreplace wordcount visualblocks visualchars  fullscreen",

      "insertdatetime  nonbreaking save table contextmenu directionality",

      "emoticons template paste textcolor colorpicker textpattern"

    ], */
    plugins: [ "image code table link media codesample"],

    toolbar1: "advcode insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",

    toolbar2: " print preview media | forecolor backcolor emoticons",

    image_advtab: true,
    menubar : false ,
    file_picker_callback: function(callback, value, meta) {

      if (meta.filetype == 'image') {

        $('#upload').trigger('click');

        $('#upload').on('change', function() {

          var file = this.files[0];

          var reader = new FileReader();

          reader.onload = function(e) {

            callback(e.target.result, {

              alt: ''

            });

          };

          reader.readAsDataURL(file);

        });

      }

    },

  });
