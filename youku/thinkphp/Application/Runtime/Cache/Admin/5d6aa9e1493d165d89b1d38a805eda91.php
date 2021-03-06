<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
    <title> 首页代码结构</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="../assets/css/dpl-min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/bui-min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/page-min.css" rel="stylesheet" type="text/css" />   <!-- 下面的样式，仅是为了显示代码，而不应该在项目中使用-->
    <link href="../assets/css/prettify.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        code {
            padding: 0px 4px;
            color: #d14;
            background-color: #f7f7f9;
            border: 1px solid #e1e1e8;
        }
    </style>
</head>
<body>


<div class="container">
    <div class="row">
        <div class="span4">
            <h2>整体结构</h2>
            <ol>
                <li>页面声明</li>
                <li>首页title</li>
                <li>登录信息</li>
                <li>顶部导航</li>
                <li>二级菜单</li>
                <li>tab</li>
                <li>首页JS配置项</li>
            </ol>
        </div>
        <div class="span20">
         <pre class="prettyprint linenums">
&lt;!DOCTYPE HTML&gt;
&lt;html&gt;
 &lt;head&gt;
  &lt;title&gt; HTC 管理系统&lt;/title&gt;
   &lt;meta http-equiv="Content-Type" content="text/html; charset=utf-8" /&gt;
   &lt;link href="assets/css/dpl-min.css" rel="stylesheet" type="text/css" /&gt;
   &lt;link href="assets/css/bui-min.css" rel="stylesheet" type="text/css" /&gt;
   &lt;link href="assets/css/main.css" rel="stylesheet" type="text/css" /&gt;
 &lt;/head&gt;
 &lt;body&gt;
   &lt;div class="header"&gt;
    &lt;div class="dl-title"&gt;&lt;span class=""&gt;前端框架&lt;/span&gt;&lt;/div&gt;
    &lt;div class="dl-log"&gt;欢迎您，&lt;span class="dl-log-user"&gt;XXX&lt;/span&gt;
        &lt;a href="###" title="退出系统" class="dl-log-quit"&gt;[退出]&lt;/a&gt;
    &lt;/div&gt;
   &lt;/div&gt;
   &lt;div class="content"&gt;
    &lt;div class="dl-main-nav"&gt;
      &lt;ul id="J_Nav"  class="nav-list ks-clear"&gt;
        &lt;li class="nav-item dl-selected"&gt;&lt;div class="nav-item-inner nav-storage"&gt;首页&lt;/div&gt;&lt;/li&gt;
        &lt;li class="nav-item"&gt;&lt;div class="nav-item-inner nav-inventory"&gt;搜索页&lt;/div&gt;&lt;/li&gt;
      &lt;/ul&gt;
    &lt;/div&gt;
    &lt;ul id="J_NavContent" class="dl-tab-conten"&gt;

    &lt;/ul&gt;
      
   &lt;/div&gt;
  &lt;script type="text/javascript" src="assets/js/jquery-1.8.1.min.js"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" src="assets/js/bui-min.js"&gt;&lt;/script&gt;
  &lt;script type="text/javascript" src="assets/js/config-min.js"&gt;&lt;/script&gt;
  &lt;script&gt;
     BUI.use('common/main',function(){
      var config = [{
          id:'menu',
          menu:[{
              text:'首页内容',
              items:[
                {id:'main-menu',text:'顶部导航',href:'main/menu.php'},
                {id:'second-menu',text:'二级菜单',href:'main/second-menu.php'}
              ]
            }]
          },{
            id:'search',
            menu:[{
                text:'搜索页面',
                items:[
                  {id:'introduce',text:'搜索页面简介',href:'search/introduce.html'}
                ]
              }]
          }];
      new PageUtil.MainPage({
        modulesConfig : config
      });
    });

  &lt;/script&gt;
 &lt;/body&gt;
&lt;/html&gt;

         </pre>
        </div>
    </div>
    <div class="row">
        <div class="span24">
            <h2>几点说明</h2>
            <ol>
                <li>文档声明为 <code>&lt;!doctype html&gt;</code>,文件格式是utf-8</li>
                <li>css文件在 title中引入，js在页面底部引入</li>
                <li>页面引入的 prettify.js和prettify.css仅是为了展示代码使用</li>
            </ol>
        </div>
    </div>
</div>
<script type="text/javascript" src="../assets/js/jquery-1.8.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bui-min.js"></script>
<script type="text/javascript" src="../assets/js/config-min.js"></script>
<script type="text/javascript">
    BUI.use('common/page');
</script>
<!-- 仅仅为了显示代码使用，不要在项目中引入使用-->
<script type="text/javascript" src="../assets/js/prettify.js"></script>
<script type="text/javascript">
    $(function () {
        prettyPrint();
    });
</script>
<div style="text-align:center;">
    <p>来源：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
<body>
</html>