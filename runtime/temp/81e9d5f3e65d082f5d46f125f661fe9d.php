<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"/var/www/html/daily/application/admin/view/yearlist/file.html";i:1516249030;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>YearList File</title>

    <link href="__PUBLIC__/assets/My/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="__PUBLIC__/assets/My/roll/css/onepage-scroll.css" />
    <script src="__PUBLIC__/assets/My/bootstrap-3.3.7/js/jquery-3.2.1.js"></script>

    <style type="text/css">
        body{
            padding: 0px;
            margin: 0px;
            /*background-image: url("http://p0tymq1rr.bkt.clouddn.com/daily/180103/D880dH8GCI.png");*/
            /*background-repeat:no-repeat;*/
            /*background-position:center;*/
        }
        a{
            text-decoration:none;
            color: black;
        }
        a:focus, a:hover {
            color: white;
            text-decoration: none;
        }

        /******************************* 滚屏 ***************************************/
        .page1 {
            background: url("http://p0tymq1rr.bkt.clouddn.com/daily/180103/3gmgAHJc90.png");/**/
            /*background: url("http://p0tymq1rr.bkt.clouddn.com/daily/180103/I0e81660Dh.png");*/
            /*background: url("http://p0tymq1rr.bkt.clouddn.com/daily/180103/IhFHFJfIJ0.png");*/
        }
        .page2 {
            background: url("http://p0tymq1rr.bkt.clouddn.com/daily/180103/m44bd6Eg3F.png");
        }
        .page3 {
            background: url("http://p0tymq1rr.bkt.clouddn.com/daily/180103/hmC7A32mGb.jpg");
        }
        .page4 {
            background: url("http://p0tymq1rr.bkt.clouddn.com/daily/180103/67f7EdhkiB.jpg");
        }

        /******************************* div遮罩 ***************************************/
        .tile {
            height: 300px;
            width: 200px;
            /*margin: 20px;*/
            background-color: #99aeff;
            display: inline-block;
            background-size: cover;
            position: relative;
            cursor: pointer;
            transition: all 0.4s ease-out;
            box-shadow: 0px 35px 77px -17px rgba(0, 0, 0, 0.44);
            overflow: hidden;
            color: black;
            font-family: "幼圆";
        }
        .tile img { position: absolute; top: 0; left: 0; z-index: 0; transition: all 0.4s ease-out; }
        .tile .text { z-index: 99;position: absolute; padding: 30px; height: calc(100% - 60px); }
        .tile h2 {
            font-size: 18px;
            font-weight: 900;
            margin-top: 10px;
            /* font-style: italic; */
            transform: translateX(200px);
        }
        .animate-text { opacity: 0; transition: all 0.6s ease-in-out; }
        .tile:hover { box-shadow: 0px 35px 77px -17px rgba(0, 0, 0, 0.64); transform: scale(1.05); }
        .tile:hover img { opacity: 0.2; }
        .tile:hover .animate-text { transform: translateX(0); opacity: 1; }
        .dots span { width: 5px; height: 5px; background-color: currentColor; border-radius: 50%; display: block; opacity: 0; transition: transform 0.4s ease-out, opacity 0.5s ease; transform: translateY(30px); }
        .tile:hover span { opacity: 1; transform: translateY(0px); }
        .dots span:nth-child(1) { transition-delay: 0.05s; }
        .dots span:nth-child(2) { transition-delay: 0.1s; }
        .dots span:nth-child(3) { transition-delay: 0.15s; }

        /******************************* 主页面 ***************************************/
        /* 榜单第一 */
        .top{
            width: 700px;
            height: 400px;
            float: right;
            margin-right: 10%;
            margin-top: 3%;
            /*background: red;*/
            display: inline;
        }
        .top_top{
            height: 100px;
            width: 100%;
            background: rgba(52, 171, 78, 0.36);
        }
        .top_con{
            width: 100%;
            height: 325px;
            background: rgba(144, 191, 148, 0.5);
        }
        .top_title{
            font-size: 30px;
            color: white;
            padding-top: 30px;
            padding-left: 40px;
        }
        .top_img{
            width: 212px;
            height: 312px;
            /*background: white;*/
            float: left;
            padding-left: 12px;
            padding-top: 12px;
        }
        .top_desc{
            padding: 5px;
            position: relative;
            width: 450px;
            height: 325px;
            float: right;
            /* background: white; */
            font-size: 25px;
            padding-right: 20px;
        }
        /* 第一 名字 */
        .top_filename{
            font-size: 55px;
            color: white;
            text-align: center;
            margin-top: 25px;
            font-family: "华文行楷";
        }
        /* 第一 简介 */
        .top_filename_desc{
            /*color: #A99B99;*/
            margin-top: 10px;
            position: absolute;
            bottom: 20px;
        }

        /* 榜单其他 */
        .other{
            display: inline;
            width: 1670px;
            height: 300px;
            /*background: white;*/
            float: left;
            margin-top: 50px;
            padding-left: 250px;
        }
        .music_other{
            width: 60%;
            margin: auto;
            margin-top: 20px;
        }
        .event_other{
            width: 65%;
            margin: auto;
            margin-top: 20px;
        }
        /* 榜单其他子项 */
        .con{
            height: 300px;
            width: 200px;
            float: left;
            overflow: hidden;
            position: relative;
            background-color: #4cd964;
            margin-right: 30px;
            margin-top: 20px;
        }
        .music_con{
            border-radius: 25px;
            padding-top: 30px;
            text-align: center;
            height: 90px;
            width: 480px;
            float: left;
            overflow: hidden;
            position: relative;
            background-color: rgba(249, 162, 103, 0.56);
            margin-right: 30px;
            margin-top: 20px;
            font-size: 36px;
            font-weight: 800;
            color: white;
            font-family: "华文行楷";
        }
        .event_con{
            border-radius: 25px;
            padding: 30px 10px 0px 10px;
            text-align: center;
            /*height: 100px;*/
            width: 100%;
            float: left;
            overflow: hidden;
            position: relative;
            background-color: rgba(109, 112, 173, 0.55);
            margin-right: 30px;
            margin-top: 20px;
            font-size: 36px;
            font-weight: 800;
            color: white;
            font-family: "华文行楷";
        }
        /* 角标 */
        .subscript{
            z-index: 999;
            color: #fff;
            height: 30px;
            width: 100px;
            position: absolute;
            right: -30px;
            text-align: center;
            line-height: 30px;
            font-family: "黑体";
            background-color: #0c60ee;
            -moz-transform:rotate(45deg);
            -webkit-transform:rotate(45deg);
            -o-transform:rotate(45deg);
            -ms-transform:rotate(45deg);
            transform:rotate(45deg);
        }
        /* 角标文字 */
        .subscript_number{
            transform: rotate(-45deg);
        }
        .img{
            width: 100%;
            height: 200px;
            /*background: red;*/
        }
        /* 其他 名字 */
        .name{
            font-family: "华文行楷";
            z-index: 999;
            width: 100%;
            height: 40px;
            background: rgba(220, 220, 220, 0.51);
            position: absolute;
            bottom: 0px;
            text-align: center;
            font-size: x-large;
            padding-top: 10px;
        }

        .music_con{

        }
    </style>

    <script>
        $(function(){
            $('.main').onepage_scroll({
                sectionContainer: '.page'
            });
        });
    </script>

</head>
<body>
<div class="main">
    <div class="page page1">
        <div id="main">
            <!-- 第一 -->
            <div class="top">
                <div class="top_top">
                    <div class="top_title">
                        2017 影视榜单
                    </div>
                </div>
                <?php if(is_array($top) || $top instanceof \think\Collection || $top instanceof \think\Paginator): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
                <div class="top_con">
                    <div class="top_img">
                        <img src="<?php echo $vl['img']; ?>" width="200px" height="300px">
                    </div>
                    <div class="top_desc">
                        <div class="top_filename">
                            <?php if($vl['nid'] == 0): ?>
                            <a href="#">
                                <?php else: ?>
                                <a href="__NOTE__/<?php echo $vl['nid']; ?>" target="_blank">
                                    <?php endif; ?>
                                    <?php echo $vl['name']; ?>
                                </a>
                        </div>
                        <div class="top_filename_desc">
                            <?php echo $vl['desc']; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>    <!-- 循环输出 -->
            </div>

            <!-- 其他 -->
            <div class="other">
                <?php if(is_array($other) || $other instanceof \think\Collection || $other instanceof \think\Paginator): $i = 0; $__LIST__ = $other;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;if($vl['nid'] == 0): ?>
                <a href="#">
                    <?php else: ?>
                    <a href="__NOTE__/<?php echo $vl['nid']; ?>"  target="_blank">
                        <?php endif; ?>
                        <div class="con">
                            <div class="subscript">
                                <div class="subscript_number"><?php echo $vl['rank']; ?></div>
                            </div>
                            <div class="img">
                                <div class="wrap">
                                    <div class="tile">
                                        <div class="text">
                                            <img src="<?php echo $vl['img']; ?>" width="200px" height="300px">
                                            <h2 class="animate-text"><?php echo $vl['desc']; ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="name">
                                <?php echo $vl['name']; ?>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>    <!-- 循环输出 -->
            </div>
        </div>
    </div>

    <div class="page page2">
        <div id="main2">
            <!-- 第一 -->
            <div class="top">
                <div class="top_top">
                    <div class="top_title">
                        2017 阅读榜单
                    </div>
                </div>
                <?php if(is_array($booktop) || $booktop instanceof \think\Collection || $booktop instanceof \think\Paginator): $i = 0; $__LIST__ = $booktop;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
                <div class="top_con">
                    <div class="top_img">
                        <img src="<?php echo $vl['img']; ?>" width="200px" height="300px">
                    </div>
                    <div class="top_desc">
                        <div class="top_filename">
                            <?php if($vl['nid'] == 0): ?>
                            <a href="#">
                                <?php else: ?>
                                <a href="__NOTE__/<?php echo $vl['nid']; ?>" target="_blank">
                                    <?php endif; ?>
                                    <?php echo $vl['name']; ?>
                                </a>
                        </div>
                        <div class="top_filename_desc">
                            <?php echo $vl['desc']; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>    <!-- 循环输出 -->
            </div>

            <!-- 其他 -->
            <div class="other">
                <?php if(is_array($bookother) || $bookother instanceof \think\Collection || $bookother instanceof \think\Paginator): $i = 0; $__LIST__ = $bookother;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;if($vl['nid'] == 0): ?>
                <a href="#">
                    <?php else: ?>
                    <a href="__NOTE__/<?php echo $vl['nid']; ?>"  target="_blank">
                        <?php endif; ?>
                        <div class="con">
                            <div class="subscript">
                                <div class="subscript_number"><?php echo $vl['rank']; ?></div>
                            </div>
                            <div class="img">
                                <div class="wrap">
                                    <div class="tile">
                                        <div class="text">
                                            <img src="<?php echo $vl['img']; ?>" width="200px" height="300px">
                                            <h2 class="animate-text"><?php echo $vl['desc']; ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="name">
                                <?php echo $vl['name']; ?>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>    <!-- 循环输出 -->
            </div>
        </div>
    </div>

    <div class="page page3">
        <div class="music_other">
            <!--<div class="music_con">-->
                <!--<?php if(is_array($music) || $music instanceof \think\Collection || $music instanceof \think\Paginator): $i = 0; $__LIST__ = $music;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>-->
                <!--<p><?php echo $vl['name']; ?> - <?php echo $vl['desc']; ?></p>-->
                <!--<?php endforeach; endif; else: echo "" ;endif; ?>    &lt;!&ndash; 循环输出 &ndash;&gt;-->
            <!--</div>-->
                <?php if(is_array($music) || $music instanceof \think\Collection || $music instanceof \think\Paginator): $i = 0; $__LIST__ = $music;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
                    <div class="music_con">
                        <p><?php echo $vl['name']; ?> - <?php echo $vl['desc']; ?></p>
                    </div>
                <?php endforeach; endif; else: echo "" ;endif; ?>    <!-- 循环输出 -->
            <!--</div>-->
        </div>
    </div>

    <div class="page page4">
        <div class="event_other">
            <?php if(is_array($event) || $event instanceof \think\Collection || $event instanceof \think\Paginator): $i = 0; $__LIST__ = $event;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
            <div class="event_con">
                <p><?php echo $vl['name']; ?></p>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>


<script src="__PUBLIC__/assets/My/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/My/my/jquery-1.5.2.min.js"></script>
<script src="__PUBLIC__/assets/My/roll/js/jquery.onepage-scroll.min.js"></script>
</body>
</html>