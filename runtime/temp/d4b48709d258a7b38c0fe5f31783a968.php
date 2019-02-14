<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"/var/www/html/daily/application/admin/view/dailylist/editdaily.html";i:1516248644;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <title>Markdown</title>
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/examplescss/style.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/css/editormd.css" />
        <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />

        <!-- 下拉搜索 -->
        <link rel="stylesheet" href="__PUBLIC__/assets/My/dist/css/bootstrap-3.3.4.css">
        <link rel="stylesheet" href="__PUBLIC__/assets/My/dist/css/bootstrap-select.css">
        <script src="__PUBLIC__/assets/My/dist/js/jquery.min.js"></script>
        <script src="__PUBLIC__/assets/My/dist/js/bootstrap-3.3.4.js"></script>
        <script src="__PUBLIC__/assets/My/dist/js/bootstrap-select.js"></script>

        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/my.css" />

        <style type="text/css">
            .form-sub-daily{
                padding-left: 92%;
                padding-bottom: 2px;
            }
        </style>

    </head>
    <body>
        <div id="layout">
            <header>
                <h1>往事随风~~~</h1>
            </header>
            <form  method="post" action="<?php echo url('Dailylist/updateDaily',array('id'=>$daily['id'])); ?>">
                <div class="form-sub-daily">
                    <input type="submit" value="确 定" class="btn btn-default"/>
                </div>
                <div id="test-editormd">
                    <textarea style="display:none;" name="content" id="context"><?php echo $dailycon; ?></textarea>
                </div>
            </form>
        </div>

        <script src="__PUBLIC__/assets/markdown/examples/js/jquery.min.js"></script>
        <script src="__PUBLIC__/assets/markdown/editormd.min.js"></script>
        <script type="text/javascript">
            var testEditor;
            $(function() {
                testEditor = editormd("test-editormd", {
                    width   : "90%",
                    height  : "__EDIT_DAILT_MD_HEIGHT__",
                    syncScrolling : "single",
                    path    : "__PUBLIC__/assets/markdown/lib/",
                    imageUpload : true,
                    imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                    imageUploadURL : "/uploadfile",
                });
            });
        </script>
    </body>
</html>