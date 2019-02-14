<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"/var/www/html/daily/application/admin/view/show/shownote.html";i:1540734868;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                left: 1px;
                top: 100px;
                max-width: 330px;
                height:700px;
                overflow-y:auto;
            }
            .katex .base, .katex .strut {
                font-size: 0.8em;
            }

            .editormd-preview {
                top:0px;
            }

            @media screen and (max-width: 800px){
                .editormd-preview-active {
                    width: 100%;
                    padding: 10px;
                }
                .markdown-toc-list{
                    visibility: hidden;
                }

                .markdown-body img {
                    width: auto;
                }

                .katex .base, .katex .strut {
                    font-size: 0.6em;
                }

                .editormd-preview-container, .editormd-html-preview {
                    font-size: 1.1em;
                }

                .markdown-body h2 {
                    font-size: 1.4em;
                }
                .markdown-body h3 {
                    font-size: 1.3em;
                }
                .markdown-body h4 {
                    font-size: 1.2em;
                }
                .markdown-body h5 {
                    font-size: 1.1em;
                }
                .markdown-body h6 {
                    font-size: 1em;
                }
            }


        </style>
        <script>
            var _hmt = _hmt || [];
            (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?1769181352e9adc950166aada465644e";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>

    </head>
    <body>
    <div class="container">
        <!--<div class="row">-->
            <!--<div class="col">-->
                <div id="layout">
                    <div id="test-editormd">
                        <textarea style="display:none;" name="content"><?php echo $note['content']; ?></textarea>
                    </div>
                <!--</div>-->
            <!--</div>-->
            <textarea style="display:none;" name="id"><?php echo $note['id']; ?></textarea>
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
                    syncScrolling : "single",
                    tex  : true,
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
