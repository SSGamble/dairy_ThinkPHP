<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"G:\PHP\daily/application/admin\view\dailylist\showdaily.html";i:1529641956;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <title>Markdown</title>
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/examplescss/style.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/css/editormd.css" />
        <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/my.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/showdaily.css" />
    </head>
    <body>
        <div id="layout">
            <!--<header>-->
                <!--<h1><?php echo $daily['date']; ?></h1>-->
            <!--</header>-->
            <div id="test-editormd">
                <textarea style="display:none;" name="content"><?php echo $daily['content']; ?></textarea>
            </div>
        </div>
        <script src="__PUBLIC__/assets/markdown/examples/js/jquery.min.js"></script>
        <script src="__PUBLIC__/assets/markdown/editormd.min.js"></script>
        <script type="text/javascript">
            var testEditor;
            $(function() {
                testEditor = editormd("test-editormd", {
                    width   : "100%",
                    height  : "100%",
                    editorTheme: "pastel-on-dark",
                    theme: "gray",
                    previewTheme: "dark",
                    syncScrolling : "single",
                    path    : "__PUBLIC__/assets/markdown/lib/",
                    imageUpload : true,
                    imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                    imageUploadURL : "/uploadfile",
                    onload : function() {
                        this.fullscreen();
                        this.previewing();
                    }
                });
            });
        </script>
    </body>
</html>