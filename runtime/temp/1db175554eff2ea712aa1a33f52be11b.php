<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"G:\PHP\daily/application/admin\view\dailylist\dailylist.html";i:1533285232;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
	
      <title>Daily</title>

      <link href="__PUBLIC__/assets/My/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
      <link href="__PUBLIC__/assets/My/my/css/my.css" rel="stylesheet">
      <link rel="icon" href="__PUBLIC__/assets/ico/qr_blue.ico" type="image/x-icon">

      <script src="__PUBLIC__/assets/My/bootstrap-3.3.7/js/jquery-3.2.1.js"></script>
      <script src="__PUBLIC__/assets/My/my/js/my.js"></script>

      <!-- 搜索高亮 -->
      <style> .highlight{background-color: #ffad1a;} </style>

      <script type="text/javascript">

          function dailylista() {
              $.ajax({
                  url: "<?php echo url('Dailylist/dailylista'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data: {},
                  type: "POST",
                  dataType: "JSON",
                  success: function (data) {
                      if(data !=null){
                          var str = "";
                          for (var i = 0; i < data.length; i++) { //循环后台传过来的Json数组
                              var datas = data[i];
                              var shownote = "./shownote/id/" + datas.id;
                              if("<?php echo $hide['code']; ?>" == 1){
                                  title = "******";
                              }else {
                                  title = datas.title;
                              }
                              str += "<tr >" +
                                      "<td>" + "<a>" + datas.id + "</td>" +
                                      "<td>" + "<a target='_blank' href='" + shownote + "'>" + title + "</a>" + "</td>" +
                                      "<td>" + datas.date + "</td>" +
                                      "<td>" +
                                      "<a>浏览</a>" +
                                      "</td>" +
                                      "</tr>";
                          }
                      }
                      $("#main1").html(str);
                  },
                  error: function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }

          /* 目录 */
          function aShowDaily(key) {
              $.ajax({
                  url: "<?php echo url('dailylist/aShowDaily'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data: {
                      key: key
                  },
                  type: "POST",
                  dataType: "JSON",
                  success: function (data) {
                      if(data !=null){
                          var str = "";
                          for (var i = 0; i < data.length; i++) { //循环后台传过来的Json数组
                              var datas = data[i];
                              var showDaily = "./showDaily/id/" + datas.id;
                              var editDaily = "./editDaily/id/" + datas.id;
                              if("<?php echo $hide['code']; ?>" == 1){
                                  title = "******";
                              }else {
                                  title = datas.title;
                              }
                              str += "<tr >" +
                                          "<td>" + "<a onclick=fun("+datas.id+");>" + datas.id + "</a>" + "</td>" +
                                          "<td>" + "<a target='_blank' href='" + showDaily + "'>" + title + "</a>" + "</td>" +
                                          "<td>" + datas.location + "</td>" +
                                          "<td>" + datas.date + "</td>" +
                                          "<td>" +
                                            "<a href='" + editDaily + "'>编辑</a>" +
                                          "</td>" +
                                      "</tr>";
                          }
                      }
                      $("#main1").html(str);
                  },
                  error: function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }

          /* 右侧 预览 */
          function fun(id) {
              $.ajax({
                  url: "<?php echo url('dailylist/dailyview'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data: {
                      noteid: id
                  },
                  type: "POST",
                  dataType: "JSON",
                  success: function (data) {
                      $("#main2").html(data.content);
                      $("#main2").highlight($("#skey").val());
                  },
                  error: function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }

          /* 查询 */
          function search() {
              $.ajax({
                  url: "<?php echo url('dailylist/aSearch'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data: {
                      skey: $("#skey").val()
                  },
                  type: "POST",
                  dataType: "JSON",
                  success: function (data) {
                      if (data != null) {
                          var str = "";
                          for (var i = 0; i < data.length; i++) { //循环后台传过来的Json数组
                              var datas = data[i];
                              var shownote = "./showDaily/id/" + datas.id;
                              str += "<tr >" +
                                      "<td>" + "<a onclick=fun(" + datas.id + ");>" + datas.title + "</a>" + "</td>" +
                                      "<td>" + datas.location + "</td>" +
                                      "<td>" + datas.date + "</td>" +
                                      "<td>" +
                                      "<a target='_blank' href='" + shownote + "'>浏览</a>" +
                                      "</td>" +
                                      "</tr>";
                          }
                      }
                      $("#main1").html(str);
                      $("#main1").highlight($("#skey").val());

                  },
                  error: function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }
      </script>

  </head>
  <body>

    <div id="tool_bar">
        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default">
                <a href="<?php echo url('dailylist/newDaily'); ?>">
                <span class="glyphicon glyphicon-plus"></span> 新增
                </a>
            </button>
        </div>

        <!--搜索-->
        <div class="search">
            <input type="text" placeholder="key：日志内容/标题" class="form-control search-input" id="skey" name="skey">
            <button class="btn btn-default search-btn" type="submit" onclick="search()">
                <span class="glyphicon glyphicon-search"></span> 搜索
            </button>
        </div>

    </div>

    <!-- 主界面 -->
    <div id="main">
        <!-- 一级菜单 -->
        <div id="left_bar_1">
            <ul class="topnav" style="width: 100%;margin: 0px;">
                <li><a href="<?php echo url('dailylist/dailylist'); ?>">日志</a></li>
                <li><a href="<?php echo url('note/notelst'); ?>">笔记</a></li>
            </ul>
        </div>

        <!-- 二级菜单 -->
        <div id="left_bar_2">
            <ul class="topnav" style="width: 100%;margin: 0px;">
                <li><a onclick="aShowDaily('2014');">2014</a></li>
                <li><a onclick="aShowDaily('2015');">2015</a></li>
                <li><a onclick="aShowDaily('2016');">2016</a></li>
                <li><a onclick="aShowDaily('2017');">2017</a></li>
            </ul>
        </div>

        <!-- 列表 主界面 -->
        <div id="main_content" style="overflow-y: scroll;">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>标题 - <?php echo $count; ?></th>
                    <th>地点</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody id="main1">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?> <!-- 循环输出 -->
                <tr class="gradeX">
                    <td><a onclick=fun('<?php echo $vl['id']; ?>');><?php echo $vl['id']; ?></a></td>
                    <?php if($hide['code'] != 1): ?>
                    <td><a target="_blank" href="<?php echo url('dailylist/showDaily',array('id'=>$vl['id'])); ?>"><?php echo $vl['title']; ?></a></td>
                    <?php else: ?>
                    <td>******</td>
                    <?php endif; ?>
                    <td><?php echo $vl['location']; ?></td>
                    <td><?php echo $vl['date']; ?></td>
                    <td>
                        <div>
                            <a href="<?php echo url('dailylist/editDaily',array('id'=>$vl['id'])); ?>">
                                编辑
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>    <!-- 循环输出 -->
                </tbody>
            </table>
        </div>

        <!-- 预览窗口 -->
        <div id="main_content2" style="overflow-y: scroll;">
            <p id="main2"></p>
        </div>
    </div>


    <script src="__PUBLIC__/assets/My/bootstrap-3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/assets/My/my/jquery-1.5.2.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/assets/My/my/scriptbreaker-multiple-accordion-1.js"></script>

    <!-- highlight -->
    <script type="text/javascript" src="__PUBLIC__/assets/My/my/js/highlight/jquery.highlight.js"></script>

    <script language="JavaScript">
        $(document).ready(function() {
            $(".topnav").accordion({
                accordion:false,
                speed: 500,
                closedSign: '[+]',
                openedSign: '[-]'
            });
        });
        $("#skey").keydown(function(e) {
            if (e.keyCode == 13) {
                search();
            }
        });
    </script>
  </body>
</html>