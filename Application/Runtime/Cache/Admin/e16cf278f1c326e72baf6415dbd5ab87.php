<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PHP中文网——后台管理</title>
    <link rel="stylesheet" type="text/css" href="/blog/Public/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/blog/Public/css/main.css"/>

    <script type="text/javascript" src="/blog/Public/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/blog/Public/ueditor/ueditor.config.js"></script>
     <script type="text/javascript" src="/blog/Public/ueditor/ueditor.all.js"></script>
      <script type="text/javascript" src="/blog/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
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
            <div class="crumb-list"><i class="icon-font"></i><a href="/jscss/admin/design/">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="/jscss/admin/design/">文章管理</a><span class="crumb-step">&gt;</span><span>新增文章</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>栏目：</th>
                                <td>
                                <select name="cateId" id="catid" class="required">
                                    <option value="0">请选择栏目</option>
                                    <option value="1">科技</option>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>缩略图：</th>
                                <td><input name="photo1" id="" type="file"><!--<input type="submit" onclick="submitForm('/jscss/admin/design/upload')" value="上传图片"/>--></td>
                            </tr>
                            <tr>
                                <th>简介：</th>
                                <td><textarea name="description" class="common-textarea" id="content" cols="30" style="width: 400px;height: 80px" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <th>内容：</th>
                                <td>
                                    <textarea id="myEdit" name="content"></textarea>
                                 </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>

<script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.render('myEdit');
    </script>
</body>
</html>