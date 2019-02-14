<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:54:"G:\PHP\daily/application/admin\view\note\editnote.html";i:1540522020;}*/ ?>
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
            function showSite()
            {
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
                if(currKey == 81 && (e.altKey||e.metaKey)){
                    showSite();
                    return false;
                }
            }
            document.onkeyup = keyUp;
        </script>

        <style type="text/css">
            .editormd .CodeMirror pre {
                font-size: 19px;
            }
        </style>
    </head>
    <body>
        <div id="layout">
            <form id="daily" method="post" action="<?php echo url('note/updateNote',array('id'=>$note['id'])); ?>">
                <h1><?php echo $note['title']; if($note['id'] == 0): ?>(自动保存,尽快存档吧~)<?php endif; ?></h1>
                <input type="text" style="margin-left: 5%;width: 90%;" name="summary" value="<?php echo $note['summary']; ?>"/>
            </header>

                <div id="test-editormd">
                    <textarea style="display:none;" name="content" id="context"><?php echo $note['content']; ?></textarea>
                </div>
                <?php if($note['id'] != 1 && $note['id'] != 2): ?>
                <div class="sub">
                      <select id="lunch" class="selectpicker" name="groups" data-live-search="true">
                          <option value="<?php echo $note['groups']; ?>" selected = "selected"><?php echo $note['groups']; ?></option>
                          <?php if(is_array($groups) || $groups instanceof \think\Collection || $groups instanceof \think\Paginator): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;if($vl['groups'] != $note['groups']): ?>
                                <option value="<?php echo $vl['groups']; ?>" id="ogroup"><?php echo $vl['groups']; ?></option>
                              <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </select>

                    <!-- 是否常用 -->
                    <select id="lunch2" name="showsel" data-live-search="true">
                        <option value="<?php echo $note['is_show']; ?>" selected = "selected">
                            <?php if($note['is_show'] == 1): ?>显示
                            <?php else: ?>不显示
                            <?php endif; ?>
                        </option>
                        <option value="1">显示</option>
                        <option value="0">不显示</option>
                    </select>

                    <!-- 是否发布 -->
                    <select id="lunch3" class="selectpicker3" name="showse2" data-live-search="true">
                        <option value="<?php echo $note['publish']; ?>" selected = "selected">
                            <?php if($note['publish'] == 1): ?>发布
                            <?php else: ?>不发布
                            <?php endif; ?>
                         </option>
                        <option value="1">发布</option>
                        <option value="0">不发布</option>
                    </select>

                    <input type="submit"  value="确认提交" class="btn btn-default"/>
                </div>
                <?php endif; ?>
            </form>
        </div>
        <textarea style="display:none;" name="id"><?php echo $note['id']; ?></textarea>
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
                    tex  : true,
                });
            });
        </script>
    </body>
</html>
