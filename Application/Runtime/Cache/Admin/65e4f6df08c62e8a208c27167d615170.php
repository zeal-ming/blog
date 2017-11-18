<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP中文网——后台管理</title>
    <link rel="stylesheet" type="text/css" href="/blog/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/blog/Public/css/main.css"/>

    <script type="text/javascript" src="/blog/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/blog/Public/js/ueditor/ueditor.config.js"></script>
     <script type="text/javascript" src="/blog/Public/js/ueditor/ueditor.all.min.js"></script>
      <script type="text/javascript" src="/blog/Public/js/ueditor/lang/zn-cn/zn-cn.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="index.html">首页</a></li>
                <li><a href="#" target="_blank">网站首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="#">管理员</a></li>
                <li><a href="#">修改密码</a></li>
                <li><a href="#">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
        <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>常用操作</a>
                    <ul class="sub-menu">
                        <li><a href="/blog/index.php/Admin/article/lst"><i class="icon-font">&#xe005;</i>文章管理</a></li>
                        <li><a href="/blog/index.php/Admin/cate/lst"><i class="icon-font">&#xe006;</i>分类管理</a></li>
                        <li><a href="/blog/index.php/Admin/admin/lst"><i class="icon-font">&#xe004;</i>管理员管理</a></li>
                        <li><a href="/blog/index.php/Admin/link/lst"><i class="icon-font">&#xe052;</i>友情链接</a></li>
                    </ul>
                </li>
        
            </ul>
        </div>

    </div>
    <!--/sidebar-->
    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">链接管理</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="/jscss/admin/design/index" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择链接:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form action='/blog/index.php/Admin/Link/sort' method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="/blog/index.php/Admin/Link/add"><i class="icon-font"></i>新增链接</a>
                        
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>
                        <input class="btn btn-primary btn2" type="submit" value="更新排序" /></a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>ID</th>
                            <th>标题</th>
                            <th>url</th>
                            <th>简介</th>
                            <th>操作</th>
                        </tr>
                        <?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input class="common-input sort-input" name="<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["listorder"]); ?>" type="text">
                            </td>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["title"]); ?></td>
                            <td><?php echo ($vo["url"]); ?></td>
                            <td><?php echo ($vo["description"]); ?></td>
                            <td>
                                <a class="link-update" href="/blog/index.php/Admin/Link/edit/id/<?php echo ($vo["id"]); ?>">修改</a>
                                <a class="link-del" href="/blog/index.php/Admin/Link/del/id/<?php echo ($vo["id"]); ?>" onsubmit="return confirm('确认删除？')">删除</a>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="list-page"> <?php echo ($page); ?></div>
                </div>
            </form>
        </div>
    </div>
    <!--/main-->
</div>
</body>
</html>