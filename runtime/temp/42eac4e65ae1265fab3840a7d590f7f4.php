<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"G:\PHP\dailylocal/application/admin\view\note\shownote.html";i:1540734171;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <title>Markdown</title>
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/examplescss/style.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/css/editormd.css" />
        <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/shownote.css" />

        <style> 
            .markdown-body h2 {
              color:#000000;
            }

            .markdown-body h3 {
              color:#595959;
            }

            .markdown-body h4 {
              color:#244061;
            }

            .markdown-body h5 {
              color:#31849B;
            }

            .markdown-body h6 {
              color:#404040;
            }

            .markdown-toc-list{
                position: fixed;
                top: 1%;
                max-width: 19%;
                height: 98%;
                overflow-y: auto;
                font-size: 0.8em;
            }

            .katex .base, .katex .strut {
                font-size: 0.8em;
            }

            .editormd-preview-container, .editormd-html-preview {
                font-size: 1.3em;
            }

        </style>
    </head>
    <body>
        <div id="layout">
            <div id="test-editormd">
                <textarea style="display:none;" name="content"><?php echo $note['content']; ?></textarea>
            </div>
        </div>
        <textarea style="display:none;" name="id"><?php echo $note['id']; ?></textarea>

        <script src="__PUBLIC__/assets/markdown/examples/js/jquery.min.js"></script>
        <script src="__PUBLIC__/assets/markdown/editormd.min.js"></script>
        <script type="text/javascript">
            var testEditor;
            $(function() {
                testEditor = editormd("test-editormd", {
                    width   : "100%",
                    height  : "100%",
                    tex  : true,
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
