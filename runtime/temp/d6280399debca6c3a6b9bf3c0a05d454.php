<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:53:"G:\PHP\daily/application/admin\view\note\notelst.html";i:1544529833;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
      <title>Note</title>

      <link href="__PUBLIC__/assets/My/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
      <link rel="icon" href="__PUBLIC__/assets/ico/qr_blue.ico" type="image/x-icon">

      <script src="__PUBLIC__/assets/My/bootstrap-3.3.7/js/jquery-3.2.1.js"></script>
      <script src="__PUBLIC__/assets/My/my/js/my.js"></script>
      <link href="__PUBLIC__/assets/My/my/css/my.css" rel="stylesheet">

      <!-- 搜索高亮 -->
      <style>
          .highlight{
              background-color: #ffad1a;
          }
          .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
              vertical-align: inherit;
          }
          .btn-group-lg>.btn, .btn-lg {
              padding: 6px 12px;
              font-size: 14px;
          }

      </style>

    <script type="text/javascript">
          $("#main1").highlight($("#key").val());
          $("#main2").highlight($("#key").val());
          alert("55");

          /* Presonal 界面 */
          function pass() {
              $.ajax({
                  url:"<?php echo url('Login/passEssay'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data:{
                      password: $("#password").val()
                  },
                  type:"POST",
                  dataType:"JSON",
                  success: function(data){
                      var str="";
                      for(var i = 0; i < data.length; i++) { //循环后台传过来的Json数组
                          var datas = data[i];
                          var shownote = "/daily/admin/note/shownote/id/" + datas.id;
                          var editnote = "/daily/admin/note/editNote/id/" + datas.id;
                          var delnote = "/daily/admin/note/delnote/id/" + datas.id;
                          if("<?php echo $hide['code']; ?>" == 1){
                              title = "******";
                          }else {
                              title = datas.title;
                          }
                          str += "<tr >" +
                                  "<td>" + "<a onclick=fun("+datas.id+");>" + datas.id + "</td>" +
                                  "<td>" +"<a target='_blank' href='" + shownote + "'>" + title + "</a>"+"</td>" +
                                  "<td>" + datas.groups + "</td>" +
                                  "<td>" +
                                  "<a target='_blank' href='" + editnote + "'>编辑</a>" + "&nbsp;&nbsp;" +
                                  "<a target='_blank' href='" + delnote + "'>删除</a>" +
                                  "</td>" +
                                  "</tr>";
                          $("#main1").html(str);
                      }
                      $("#main2").html("");
                  },
                  error:function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }

          /* 确认密码后跳转 Daily 界面 */
          function daily() {
              $.ajax({
                  url:"<?php echo url('Login/passDaily'); ?>",
                  data:{
                      password: $("#password").val()
                  },
                  type:"POST",
                  dataType:'text',
                  success: function(data){
                      if(data == 1){
                          window.open("<?php echo url('dailylist/dailylist'); ?>","_self");
                      }
                  },
                  error:function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }

          /* 确认密码后跳转 年度总结 界面 */
          function passyear() {
              $.ajax({
                  url:"<?php echo url('Login/passDaily'); ?>",
                  data:{
                      password: $("#password").val()
                  },
                  type:"POST",
                  dataType:'text',
                  success: function(data){
                      if(data == 1){
                          window.open("<?php echo url('yearlist/yearlist'); ?>","_self");
                      }
                  },
                  error:function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }

          /* 隐藏标题 */
          function isHide() {
              $.ajax({
                  url:"<?php echo url('note/hide'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data:{},
                  type:"POST",
                  dataType:"text",
                  success: function(data){
                      alert(data);
                      window.location.reload();
                  },
                  error:function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }

          /* 获取笔记总数 */
          function getCount() {
              $.ajax({
                  url:"<?php echo url('note/getCount'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data:{},
                  type:"POST",
                  dataType:"text",
                  success: function(data){
                      $("#note_count").html(
                              "<button type='button' class='btn btn-default'>"+
                                  "<a onclick='getCount()' id='note_count'>"+
                                      "<span class='glyphicon glyphicon-refresh'></span> "+data+
                                  "</a>"+
                              "</button>"
                      );
                  },
                  error:function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }

          /* 一级菜单点击事件 */
          function aShowNote1(id){
              if(id == 0){
                  var str = "<div class='passdiv'><input type='password' id='password' placeholder='确认密码' class='form-control pass-input'>"+
                          "<button class='btn btn-danger pass-btn' type='submit' onclick='daily()'>解锁</button></div>";
                  $("#main2").html(str);
                  //获取焦点
                  $("#password").focus();
                  //回车 事件
                  $("#password").keydown(function(e) {
                      if (e.keyCode == 13) {
                          daily();
                      }
                  });
              }
              if(id == 99){
                  var str = "<div class='passdiv'><input type='password' id='password' placeholder='确认密码' class='form-control pass-input'>"+
                          "<button class='btn btn-danger pass-btn' type='submit' onclick='passyear()'>解锁</button></div>";
                  $("#main2").html(str);
                  //获取焦点
                  $("#password").focus();
                  //回车 事件
                  $("#password").keydown(function(e) {
                      if (e.keyCode == 13) {
                          passyear();
                      }
                  });
              }
              if(id == 22){
                  var str = "<div class='passdiv'><input type='password' id='password' placeholder='确认密码' class='form-control pass-input'>"+
                          "<button class='btn btn-danger pass-btn' type='submit' onclick='pass()'>解锁</button></div>";
                  $("#main2").html(str);
                  //获取焦点
                  $("#password").focus();
                  //回车事件
                  $("#password").keydown(function(e) {
                      if (e.keyCode == 13) {
                          pass();
                      }
                  });
              }else {
                  $.ajax({
                      url:"<?php echo url('note/aShowNote1'); ?>",//这里指向的就不再是页面了，而是一个方法。
                      data:{
                          groupsID: id
                      },
                      type:"POST",
                      dataType:"JSON",
                      success: function(data){
                          var str="";
                          for(var i = 0; i < data.length; i++) { //循环后台传过来的Json数组
                              var datas = data[i];
                              var shownote = "./note/shownote/id/" + datas.id;
                              var editnote = "./note/editNote/id/" + datas.id;
                              var delnote = "./note/delnote/id/" + datas.id;
                              str += "<tr >" +
                                      "<td>" + "<a onclick=fun("+datas.id+");>" + datas.id + "</td>" +
                                      "<td>" +"<a target='_blank' href='" + shownote + "'>" + datas.title + "</a>"+"</td>" +
                                      "<td>" + datas.date + "</td>" +
                                      "<td>" + datas.gmt_modified + "</td>" +
                                      "<td>" + datas.groups + "</td>" +
                                      "<td>" +
                                          "<a target='_blank' href='" + editnote + "'>编辑</a>" + "&nbsp;&nbsp;" +
                                          "<a target='_blank' href='" + delnote + "'>删除</a>" +
                                      "</td>" +
                                      "</tr>";
                              $("#main1").html(str);
                          }
                      },
                      error:function () {
                          $("#tool_bar").html("BUG~~~~");
                      }
                  })
              }

          }

          /* 二级菜单点击事件  */
          function aShowNote2(name) {
              $.ajax({
                  url: "<?php echo url('note/aShowNote2'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data: {
                      groupname: name
                  },
                  type: "POST",
                  dataType: "JSON",
                  success: function (data) {
                      if(data !=null){
                          var str = "";
                          for (var i = 0; i < data.length; i++) { //循环后台传过来的Json数组
                              var datas = data[i];
                              var shownote = "./note/shownote/id/" + datas.id;
                              var editnote = "./note/editNote/id/" + datas.id;
                              var delnote = "./note/delnote/id/" + datas.id;
                              str += "<tr >" +
                                          "<td>" + "<a onclick=fun("+datas.id+");>" + datas.id + "</td>" +
                                          "<td>" + "<a target='_blank' href='" + shownote + "'>" + datas.title + "</a>" + "</td>" +
                                          "<td>" + datas.date + "</td>" +
                                          "<td>" + datas.gmt_modified + "</td>" +
                                          "<td>" + datas.groups + "</td>" +
                                          "<td>" +
                                            "<a target='_blank' href='" + editnote + "'>编辑</a>" + "&nbsp;&nbsp;" +
                                            "<a href='" + delnote + "'>删除</a>" +
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
                  url: "<?php echo url('note/noteview'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data: {
                      noteid: id
                  },
                  type: "POST",
                  dataType: "JSON",
                  success: function (data) {
                      $("#main2").html(data.content);
                      $("#main2").highlight($("#key").val());
                  },
                  error: function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }

          /*  搜索 */
          function search() {
              $.ajax({
                  url: "<?php echo url('note/aSearch'); ?>",//这里指向的就不再是页面了，而是一个方法。
                  data: {
                      key: $("#key").val()
                  },
                  type: "POST",
                  dataType: "JSON",
                  success: function (data) {
                      if(data !=null){
                          var str = "";
                          for (var i = 0; i < data.length; i++) { //循环后台传过来的Json数组
                              var datas = data[i];
                              var shownote = "./note/shownote/id/" + datas.id;
                              var editnote = "./note/editNote/id/" + datas.id;
                              var delnote = "./note/delnote/id/" + datas.id;
                              str += "<tr >" +
                                      "<td>" + "<a onclick=fun("+datas.id+");>" + datas.id + "</td>" +
                                      "<td>" + "<a target='_blank' href='" + shownote + "'>" + datas.title + "</a>" + "</td>" +
                                      "<td>" + datas.date + "</td>" +
                                      "<td>" + datas.gmt_modified + "</td>" +
                                      "<td>" + datas.groups + "</td>" +
                                      "<td>" +
                                      "<a target='_blank' href='" + editnote + "'>编辑</a>" + "&nbsp;&nbsp;" +
                                      "<a href='" + delnote + "'>删除</a>" +
                                      "</td>" +
                                      "</tr>";
                          }
                      }
                      $("#main1").html(str);
                      $("#main1").highlight($("#key").val());
                  },
                  error: function () {
                      $("#tool_bar").html("BUG~~~~");
                  }
              })
          }
      </script>

  </head>
  <body>
    <!-- ToolBar -->
    <div id="tool_bar">
        <!-- 按钮菜单 -->
        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default">
                <a href="<?php echo url('note/newEdit'); ?>">
                <span class="glyphicon glyphicon-plus"></span> 新增
                </a>
            </button>
            <span id="note_count">
                <button type="button" class="btn btn-default">
                    <a onclick="getCount()">
                        <span class="glyphicon glyphicon-refresh"></span> <?php echo $count; ?>
                    </a>
                </button>
            </span>


        </div>

        <!--搜索-->
        <div class="search">
            <form  id="search_foem" method="post" action="<?php echo url('note/notelst'); ?>">
              <input type="text" placeholder="key：标题/内容" class="form-control search-input" id="key" name="key">
              <button class="btn btn-default search-btn" type="submit" onclick="search()">
                  <span class="glyphicon glyphicon-search"></span> 搜索
              </button>
            </form>
        </div>
    </div>

    <!-- 主界面 -->
    <div id="main">
        <!-- 一级菜单 -->
        <div id="left_bar_1">
            <ul class="topnav" style="width: 100%;margin: 0px;">
                <li><a onclick="aShowNote1(0)">日志</a></li>
                <!--<a href="<?php echo url('dailylist/dailylist'); ?>">-->
                <li><a href="#">笔记</a>
                    <ul style="overflow: hidden; display: block;"> <!--标签默认打开-->
                        <?php if(is_array($groups0) || $groups0 instanceof \think\Collection || $groups0 instanceof \think\Paginator): $i = 0; $__LIST__ = $groups0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
                        <!-- <li><a onclick="aShowNote1('<?php echo $vl['id']; ?>');"><?php echo $vl['groups']; ?>（<?php echo $vl['g_count']; ?>）</a></li> -->
                        <li>
                          <a href="<?php echo url('note/notelst',array('groups'=>$vl['id'])); ?>"><?php echo $vl['groups']; ?>（<?php echo $vl['g_count']; ?>）</a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
                <li><a href="#">年度总结</a>
                    <ul>
                        <?php if(is_array($year) || $year instanceof \think\Collection || $year instanceof \think\Paginator): $i = 0; $__LIST__ = $year;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
                        <!-- href="<?php echo url('yearlist/yearlist'); ?>" target="_blank" -->
                        <li><a onclick="aShowNote1(99)"><?php echo $vl['year']; ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- 二级菜单 -->
        <div id="left_bar_2">
            <ul class="topnav" style="width: 100%;margin: 0px;">
                <li><a href="#">CS</a>
                    <ul style="overflow: hidden; display: block;"> <!--标签默认打开-->
                        <?php if(is_array($groups2) || $groups2 instanceof \think\Collection || $groups2 instanceof \think\Paginator): $i = 0; $__LIST__ = $groups2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
                        <li>
                          <!-- <a onclick="aShowNote2('<?php echo $vl['groups']; ?>');"><?php echo $vl['groups']; ?>（<?php echo $vl['g_count']; ?>）</a> -->
                          <a href="<?php echo url('note/notelst',array('groups_name'=>$vl['groups'])); ?>"><?php echo $vl['groups']; ?>（<?php echo $vl['g_count']; ?>）</a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- 主界面 -->
        <div id="main_content" style="overflow-y: scroll;">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>标题</th>
                    <th>创建日期</th>
                    <th>更新日期</th>
                    <th>类别</th>
                    <th>操作</th>
                </tr>
                </thead>

                <!-- 顶部固定笔记 -->
                <tbody id="main1_tool">
                    <?php if(is_array($stickList) || $stickList instanceof \think\Collection || $stickList instanceof \think\Paginator): $i = 0; $__LIST__ = $stickList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?> <!-- 循环输出 -->
                    <tr class="auto_save">
                        <td style="color: rgba(0, 88, 255, 0.51);"><?php echo $vl['id']; ?></td>
                        <td><a target='_blank' href="<?php echo url('note/showNote',array('id'=>$vl['id'])); ?>"><?php echo $vl['title']; ?></a></td>
                        <td><?php echo $vl['date']; ?></td>
                        <td><?php echo $vl['gmt_modified']; ?></td>
                        <td><?php echo $vl['groups']; ?></td>
                        <td>
                            <div class="tpl-table-black-operation">
                                <a target="_blank" href="<?php echo url('note/editNote',array('id'=>$vl['id'])); ?>">
                                    <i class="am-icon-pencil"></i> 编辑
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>    <!-- 循环输出 -->
                </tbody>

                <!-- 动态生成 默认所有 -->
                <tbody id="main1">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?> <!-- 循环输出 -->
                <tr class="gradeX">
                    <?php if($vl['id'] >= 5): ?><!-- 不显示置顶的 4 条记录 -->
                    <td><a onclick=fun("<?php echo $vl['id']; ?>");><?php echo $vl['id']; ?></a></td>
                    <td><a target="_blank" href="<?php echo url('note/showNote',array('id'=>$vl['id'])); ?>"><?php echo $vl['title']; ?></a></td>
                    <td><?php echo $vl['date']; ?></td>
                    <td><?php echo $vl['gmt_modified']; ?></td>
                    <td><?php echo $vl['groups']; ?></td>
                    <td>
                        <div class="tpl-table-black-operation">
                            <button type="button" class="btn">
                                <a target='_blank' href="<?php echo url('note/editNote',array('id'=>$vl['id'])); ?>">
                                    <i class="am-icon-pencil"></i> 编辑
                                </a>
                            </button>

                            <button type="button" class="btn  btn-primary btn_del">
                                <a href="<?php echo url('note/delnote',array('id'=>$vl['id'])); ?>" style="color: white">
                                    <i class="am-icon-pencil"></i> 删除
                                </a>
                            </button>
                        </div>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>    <!-- 循环输出 -->

                <tr  style="background-color: #638ecd">
                    <td></td>
                </tr>

                <!-- 最新添加的 5 条 -->
                <?php if(is_array($list_new) || $list_new instanceof \think\Collection || $list_new instanceof \think\Paginator): $i = 0; $__LIST__ = $list_new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?> <!-- 循环输出 -->
                <tr class="gradeX">
                    <?php if($vl['id'] >= 5): ?><!-- 不显示置顶的 4 条记录 -->
                    <td><a onclick=fun("<?php echo $vl['id']; ?>");><?php echo $vl['id']; ?></a></td>
                    <td><a target="_blank" href="<?php echo url('note/showNote',array('id'=>$vl['id'])); ?>"><?php echo $vl['title']; ?></a></td>
                    <td><?php echo $vl['date']; ?></td>
                    <td><?php echo $vl['gmt_modified']; ?></td>
                    <td><?php echo $vl['groups']; ?></td>
                    <td>
                        <div class="tpl-table-black-operation">
                            <button type="button" class="btn">
                                <a target='_blank' href="<?php echo url('note/editNote',array('id'=>$vl['id'])); ?>">
                                    <i class="am-icon-pencil"></i> 编辑
                                </a>
                            </button>

                            <button type="button" class="btn  btn-primary btn_del">
                                <a href="<?php echo url('note/delnote',array('id'=>$vl['id'])); ?>" style="color: white">
                                    <i class="am-icon-pencil"></i> 删除
                                </a>
                            </button>
                        </div>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>    <!-- 循环输出 -->
                </tbody>
            </table>
        </div>

        <!-- 预览界面 -->
        <div id="main_content2" style="overflow-y: scroll;">
            <p id="main2">
                <!--<div class="passdiv">-->
                    <!--<input type='text' id='password' placeholder='key：标题' class='form-control pass-input'>-->
                    <!--<button class='btn btn-default pass-btn' type='submit' onclick='pass()'>解锁</button>-->
                <!--</div>-->
            </p>
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
        //搜索 回车
        $("#key,#password").keydown(function(e) {
            if (e.keyCode == 13) {
                search();
            }
        });


    </script>
  </body>
</html>
