<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"/var/www/html/daily/application/admin/view/show/lst.html";i:1539422805;}*/ ?>
<!DOCTYPE html>
<!-- saved from url=(0051)https://v4.bootcss.com/docs/4.0/examples/offcanvas/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://v4.bootcss.com/favicon.ico">

    <title>Offcanvas template for Bootstrap</title>

    <link rel="stylesheet" type="text/css" href="__PUBLIC__/assets/My/offcanvas.css">
    <!-- 新 Bootstrap4 核心 CSS 文件 -->
    <link rel="stylesheet" href="__PUBLIC__/assets/My/bootstrap.min.css">
    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="__PUBLIC__/assets/My/jquery.min.js"></script>
    <script src="__PUBLIC__/assets/My/bootstrap.min.js"></script>
</head>

<body class="bg-light">

<!-- 折叠导航栏 -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">CaptainQR</a>
    <!-- 折叠按钮 -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- 折叠导航栏 -->
    <div class="collapse navbar-collapse offcanvas-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <?php if(is_array($groups0) || $groups0 instanceof \think\Collection || $groups0 instanceof \think\Paginator): $i = 0; $__LIST__ = $groups0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo url('show/lst',array('groups'=>$vl['groups'])); ?>"><?php echo $vl['groups']; ?>（<?php echo $vl['g_count']; ?>）</a>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!--         <form class="form-inline">
                  <input class="form-control" type="text" placeholder="Search">
                  <button class="btn btn-success" type="submit">Search</button>
                </form> -->
    </div>
</nav>

<!-- 二级导航栏 -->
<div class="nav-scroller bg-white box-shadow">
    <nav class="nav nav-underline">
        <?php if(is_array($groups2) || $groups2 instanceof \think\Collection || $groups2 instanceof \think\Paginator): $i = 0; $__LIST__ = $groups2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
        <a class="nav-link active" href="<?php echo url('show/lst',array('groups'=>$vl['groups'])); ?>"><?php echo $vl['groups']; ?>
            <span class="badge badge-pill bg-light align-text-bottom">（<?php echo $vl['g_count']; ?>）</span>
        </a>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </nav>
</div>

<!-- 主界面 -->
<div class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
        <img class="mr-3" src="./Offcanvas template for Bootstrap_files/bootstrap-outline.svg" alt="" width="48" height="48">
        <div class="lh-100">
            <h6 class="mb-0 text-white lh-100"><?php echo $groupname; ?></h6></br>
            <small>思考机顶盒疯狂夺金付货款世纪东方</small>
        </div>
    </div>

    <div class="my-3 p-3 bg-white rounded box-shadow">
        <h6 class="border-bottom border-gray pb-2 mb-0">最新日志</h6>

        <?php if(is_array($list_new) || $list_new instanceof \think\Collection || $list_new instanceof \think\Paginator): $i = 0; $__LIST__ = $list_new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>
        <a href="<?php echo url('show/showNote',array('id'=>$vl['id'])); ?>">
            <div class="media text-muted pt-3">
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark"><?php echo $vl['title']; ?></strong></br>
                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
                    </br></br>
                    <span class="articl_info"><?php echo $vl['date']; ?> 阅读数：46</span>
                </p>
            </div>
        </a>
        <?php endforeach; endif; else: echo "" ;endif; ?>

        <div style="float: right;margin-top:10px; ">
            <?php echo $list_new->render(); ?>
        </div>
    </div>
</div>

</body>
</html>