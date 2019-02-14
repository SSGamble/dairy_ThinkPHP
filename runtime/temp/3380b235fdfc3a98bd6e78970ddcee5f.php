<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"/var/www/html/daily/application/admin/view/index/index.html";i:1516250106;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello World.</title>

    <link href="__PUBLIC__/assets/My/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="__PUBLIC__/assets/My/bootstrap-3.3.7/js/jquery-3.2.1.js"></script>

    <style type="text/css">
        /* 标题栏 */
        #tool_bar{
            background: #212B30;
            height: 30px;
            width: 100%;
        }

        /* 主界面 */
        #main{
            width: 60%;
            margin: auto;
        }

        /* 导航栏 */
        .link_block{
            width: 99%;
            height: 140px;
            background: rgba(238, 238, 238, 0.04);
            margin: 8px 0 25px 5px;
            border-radius: 20px;
        }

        /* 导航栏 左*/
        .link_block_left{
            width: 15%;
            height: 100%;
            float: left;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }
        .link_block_left_h{
            text-align: center;
            color: black;
            font-size: 35px;
            padding-top: 30px;
            font-family: "华文行楷" !important;
            font-weight: 900;
        }

        /* 导航栏 右 */
        .link_block_right{
            width: 85%;
            height: 100%;
            float: left;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        /* 导航栏 右 行*/
        .link_block_right_row{
            padding: 10px;
            height: 60px;
        }

        /* 导航栏 Link */
        .link_block_right_cate{
            font-weight: bold;
            background: #665186;
            display: block;
            float: left;
            padding: 10px 20px;
            color: white;
            margin: 5px 0 0 0px;
            font-size: 20px;
        }

        /*  导航栏 Link点击变色 */
        .link_block_right_cate:focus, .link_block_right_cate:hover{
            background: #DB653A;
            color: white;
        }
    </style>

</head>
<body style="background: #212B30">

<!-- ToolBar -->
<a href="<?php echo url('note/notelst'); ?>" >
    <div id="tool_bar" style="text-align: center" style="background: red">
    </div>
</a>

<!-- 主界面 -->
<div id="main">

    <!-- 常用网址 -->
    <div class="link_block">
        <div class="link_block_left" style="background: #3E8EA9">
            <h2 class="link_block_left_h">常用网址</h2>
        </div>

        <div class="link_block_right" style="background:rgba(62, 142, 169, 0.08);">
            <div class="link_block_right_row">
                <a class="link_cate_a" href="http://www.mafengwo.cn/" target="_blank">
                    <div class="link_block_right_cate">
                        蚂蜂窝
                    </div>
                </a>
                <a class="link_cate_a" href="https://www.taobao.com/" target="_blank">
                    <div class="link_block_right_cate">
                        淘宝
                    </div>
                </a>
                <a class="link_cate_a" href="https://www.amazon.cn/mn/dcw/myx.html/ref=kinw_myk_redirect#/home/content/pdocs/dateDsc/" target="_blank">
                    <div class="link_block_right_cate">
                        Kindle
                    </div>
                </a>
            </div>

            <div class="link_block_right_row">
                <a class="link_cate_a" href="https://www.jianshu.com/" target="_blank">
                    <div class="link_block_right_cate">
                        简书
                    </div>
                </a>
                <a class="link_cate_a" href="https://www.zhihu.com/" target="_blank">
                    <div class="link_block_right_cate">
                        知乎
                    </div>
                </a>
                <a class="link_cate_a" href="https://www.douban.com/" target="_blank">
                    <div class="link_block_right_cate">
                        豆瓣
                    </div>
                </a>
                <a class="link_cate_a" href="http://bbs.chongbuluo.com/" target="_blank">
                    <div class="link_block_right_cate">
                        虫部落
                    </div>
                </a>
            </div>

        </div>
    </div>

    <!-- 影视资源 -->
    <div class="link_block">
        <div class="link_block_left" style="background: #f7c572">
            <h2 class="link_block_left_h">影视资源</h2>
        </div>

        <div class="link_block_right" style="background:rgba(247, 197, 114, 0.08);">
            <div class="link_block_right_row">
                <a class="link_cate_a" href="https://www.bilibili.com/" target="_blank">
                    <div class="link_block_right_cate">
                        B站
                    </div>
                </a>
                <a class="link_cate_a" href="http://www.iqiyi.com/" target="_blank">
                    <div class="link_block_right_cate">
                        爱奇艺
                    </div>
                </a>
                <a class="link_cate_a" href="https://www.mgtv.com/" target="_blank">
                    <div class="link_block_right_cate">
                        芒果TV
                    </div>
                </a>
                <a class="link_cate_a" href="https://v.qq.com/x/2017/?ptag=www.baidu.com" target="_blank">
                    <div class="link_block_right_cate">
                        腾讯视频
                    </div>
                </a>
                <a class="link_cate_a" href="http://www.youku.com/" target="_blank">
                    <div class="link_block_right_cate">
                        优酷
                    </div>
                </a>
            </div>
            <div class="link_block_right_row">
                <a class="link_cate_a" href="http://www.dy2018.com/" target="_blank">
                    <div class="link_block_right_cate">
                        电影天堂
                    </div>
                </a>
                <a class="link_cate_a" href="http://ifkdy.com/" target="_blank">
                    <div class="link_block_right_cate">
                        疯狂搜索
                    </div>
                </a>
                <a class="link_cate_a" href="http://magnet.chongbuluo.com/" target="_blank">
                    <div class="link_block_right_cate">
                        网盘搜索
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- 代码如诗 -->
    <div class="link_block">
        <div class="link_block_left" style="background: #8594d2">
            <h2 class="link_block_left_h">代码如诗</h2>
        </div>

        <div class="link_block_right" style="background:rgba(133, 148, 210, 0.08);">
            <div class="link_block_right_row">
                <a class="link_cate_a" href="https://github.com/SSGamble" target="_blank">
                    <div class="link_block_right_cate">
                        GitHub
                    </div>
                </a>
            </div>
            <div class="link_block_right_row">
                <a class="link_cate_a" href="https://www.kancloud.cn/manual/thinkphp5/135176" target="_blank">
                    <div class="link_block_right_cate">
                        ThinkPHP
                    </div>
                </a>
                <a class="link_cate_a" href="https://v3.bootcss.com/css/" target="_blank">
                    <div class="link_block_right_cate">
                        Bootstrap
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- 技术博客 -->
    <div class="link_block">
        <div class="link_block_left" style="background: #3DB4C1">
            <h2 class="link_block_left_h">技术博客</h2>
        </div>
        <div class="link_block_right" style="background:rgba(61, 180, 193, 0.08);">
            <div class="link_block_right_row">
                <a class="link_cate_a" href="https://toutiao.io/posts/hot/7" target="_blank">
                    <div class="link_block_right_cate">
                        开发者头条
                    </div>
                </a>
                <a class="link_cate_a" href="https://www.csdn.net/" target="_blank">
                    <div class="link_block_right_cate">
                        CSDN
                    </div>
                </a>
                <a class="link_cate_a" href="https://www.cnblogs.com/" target="_blank">
                    <div class="link_block_right_cate">
                        博客园
                    </div>
                </a>
            </div>

            <div class="link_block_right_row">
                <a class="link_cate_a" href="http://www.ruanyifeng.com/blog/archives.html" target="_blank">
                    <div class="link_block_right_cate">
                        阮一峰
                    </div>
                </a>

                <a class="link_cate_a" href="https://www.liaoxuefeng.com/" target="_blank">
                    <div class="link_block_right_cate">
                        廖雪峰
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- 开发工具 -->
    <div class="link_block">
        <div class="link_block_left" style="background: #7aca96">
            <h2 class="link_block_left_h" style="padding-top: 0px;">工具软件</h2>
            <h2 class="link_block_left_h" style="padding-top: 0px;">素材资源</h2>
        </div>

        <div class="link_block_right" style="background:rgba(122, 202, 150, 0.08);">
            <div class="link_block_right_row">
                <a class="link_cate_a" href="http://www.ssdtop.com/" target="_blank">
                    <div class="link_block_right_cate">
                        8号站
                    </div>
                </a>
                <a class="link_cate_a" href="https://www.iplaysoft.com/" target="_blank">
                    <div class="link_block_right_cate">
                        异次元
                    </div>
                </a>
                <a class="link_cate_a" href="https://www.52pojie.cn/" target="_blank">
                    <div class="link_block_right_cate">
                        吾爱破解
                    </div>
                </a>
                <a class="link_cate_a" href="https://tool.lu/" target="_blank">
                    <div class="link_block_right_cate">
                        工具箱
                    </div>
                </a>
                <a class="link_cate_a" href="https://tool.lu/encdec/" target="_blank">
                    <div class="link_block_right_cate">
                        文字加密
                    </div>
                </a>
            </div>
            <div class="link_block_right_row">
                <a class="link_cate_a" href="http://www.58pic.com/" target="_blank">
                    <div class="link_block_right_cate">
                        千图网
                    </div>
                </a>
                <a class="link_cate_a" href="http://www.aigei.com/sound/" target="_blank">
                    <div class="link_block_right_cate">
                        音效
                    </div>
                </a>
            </div>
        </div>
    </div>

</div>

<script src="__PUBLIC__/assets/My/bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/My/my/jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/assets/My/my/scriptbreaker-multiple-accordion-1.js"></script>

<script language="JavaScript">
</script>
</body>
</html>