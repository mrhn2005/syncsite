<!--<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=bfcd9xgl3ioypmuxa15758gsezncweu7gt9ta3wwnoeas3c0"></script>-->
<script src="/tinymce/tinymce.min.js"></script>
<script src="/tinymce/jquery.tinymce.min.js"></script>
  
  <script>
  var editor_config = {
     
    path_absolute : "/",
    selector: "textarea.my-editor",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic| alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | fontsizeselect link image  media anchor|ltr rtl",
    directionality :"rtl",
    // language: 'fa_IR',
    relative_urls: false,
    
    table_responsive_width: true,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
  // tinymce.init({ selector:'textarea.my-editor' });
</script>