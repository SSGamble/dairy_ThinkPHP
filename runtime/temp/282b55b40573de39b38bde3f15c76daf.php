<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"G:\PHP\daily/application/admin\view\dailylist\newdailylist.html";i:1516155019;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
    <head>
        <meta charset="utf-8" />
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
        <title>Markdown</title>
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/examplescss/style.css" />
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/css/editormd.css" />
        <link rel="shortcut icon" href="https://pandao.github.io/editor.md/favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="__PUBLIC__/assets/markdown/my.css" />

        <script type="text/javascript">
            function showSite()
            {
                $.ajax({
                    type:"POST",
                    url: "<?php echo url('note/saveNote'); ?>",
                    data:{
                        context: $("#context").text()
                    },
                    dataType:'text',
                    success:function (data) {
                        document.getElementById("txtHint").innerHTML = data;
                    },
                    error:function () {
                        document.getElementById("txtHint").innerHTML="出错啦";
                    }
                });
            }

            //按键监听
            function keyUp(e) {
                var currKey=0,e=e||event;
                currKey=e.keyCode||e.which||e.charCode;
                if(currKey == 81 && (e.ctrlKey||e.metaKey)){
                    showSite();
                    return false;
                }
            }
            document.onkeyup = keyUp;
        </script>
    </head>
    <body>
        <div id="layout">
            <header>
                <h1>Caption</h1>
            </header>
            <form id="daily" method="post" action="<?php echo url('dailylist/addDaily'); ?>">
                <div id="test-editormd">
                    <textarea style="display:none;" name="content" id="context"></textarea>
                </div>
                <div class="sub">
                    <input type="submit" value="提交">
                </div>
            </form>
        </div>

        <!-- 自动保存信息 -->
        <div id="txtHint"></div>

        <script src="__PUBLIC__/assets/markdown/examples/js/jquery.min.js"></script>
        <script src="__PUBLIC__/assets/markdown/editormd.min.js"></script>
        <script type="text/javascript">
            var testEditor;
            $(function() {
                testEditor = editormd("test-editormd", {
                    width   : "90%",
                    height  : "__MD_HEIGHT__",
                    syncScrolling : "single",
                    path    : "__PUBLIC__/assets/markdown/lib/",
                    imageUpload : true,
                    imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
                    imageUploadURL : "/uploadfile",
                    saveHTMLToTextarea : true
                });
            });
        </script>
    </body>
</html>