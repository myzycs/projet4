<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        
        <!--  Bootstrap css link -->
  		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="public/css/style.css" rel="stylesheet" /> 
         <!-- option tinyMCE --> 
        <script src="https://cdn.tiny.cloud/1/oapp4sreyblg7sjsk4afbaxlukt1kjs6m8ud7tfpbwwqd0zj/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        
        <script>
            //Paramétrage de TinyMce
            tinymce.init(
            {
            selector: '#mytextarea',
            theme:"silver",
            mode:"textareas",
            elements:"contenu",
            entity_encoding:"raw",
            encoding:"UTF-8",
            forced_root_block : false,
            force_br_newlines : true,
            force_p_newlines : false,
            //Permet le required de textArea
            setup: function (editor) { editor.on('change', function (e) { console.log(e); console.log(editor); editor.save(); }); }
            });
        </script>
    </head>
    <body>
        
    	<div id="interfaceLink">
            <a href="index.php?action=interface"><input type="button" value="Interface administrateur"></a>
        </div>

        <?= $content ?>
        <!--Direction de la fonction Javascript de validation de suppression -->
        <script src="public/js/deleteConfirm.js"></script>
    </body>
</html>