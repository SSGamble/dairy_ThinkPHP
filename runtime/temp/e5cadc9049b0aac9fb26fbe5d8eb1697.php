<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"G:\PHP\daily/application/admin\view\note\newedit.html";i:1540734000;}*/ ?>
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
    <script type="text/javascript">
        // 自动保存
        function showSite(){
            $.ajax({
                type:"POST",
                url: "<?php echo url('note/saveNote'); ?>",
                data:{
                    ogroup: $("#ogroup").val(),
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
        <h1>知行合一</h1>
    </header>
    <form id="daily" method="post" action="<?php echo url('note/addNote'); ?>">
        <div class="sub">
            <select id="lunch" class="selectpicker" name="groups" data-live-search="true" title="选择分类">
                <?php if(is_array($groups) || $groups instanceof \think\Collection || $groups instanceof \think\Paginator): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?> <!-- 循环输出 -->
                <option value="<?php echo $vl['groups']; ?>" id="ogroup"><?php echo $vl['groups']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <input type="submit" value="确认提交" class="btn btn-default">
        </div>

        <div id="test-editormd">
            <textarea style="display:none;" name="content" id="context"></textarea>
        </div>
    </form>
</div>

<!-- 自动保存信息 -->
<div id="txtHint" style="color: red;position: fixed;top: 0px;"></div>

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
            saveHTMLToTextarea : true,
            tex  : true,
        });
    });
</script>
</body>
</html>