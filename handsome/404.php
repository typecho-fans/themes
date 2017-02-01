<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

    <!-- 使用url函数转换相关路径 -->
    <!-- 第三方CDN加载CSS -->
<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- 本地develope版本 -->
    <!-- 
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/animate.css') ?>" type="text/css" />
  <link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('css/iconfont.css') ?>">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/font.css') ?>" type="text/css" />
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/app.css') ?>" type="text/css" />-->
  
    <!-- 本地compass版本 -->
  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/appall.min.css') ?>" type="text/css" />


    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body>
<div class="app app-header-fixed ">
  

<div class="container w-xxl w-auto-xs" ng-init="app.settings.container = false;">
  <div class="text-center m-b-lg">
    <h1 class="text-shadow text-white">404</h1>
  </div>
  <div class="list-group bg-info auto m-b-sm m-b-lg">
    <a href="<?php $this->options->siteUrl(); ?>" class="list-group-item">
      <i class="iconfont icon-chevron text-muted"></i>
      <i class="iconfont icon-mailforward  icon-fw m-r-xs"></i> 回到首页
    </a>
    <a href="<?php $this->options->siteUrl(); ?>admin/login.php" ui-sref="access.signin" class="list-group-item">
      <i class="iconfont icon-chevron text-muted"></i>
      <i class="iconfont icon-fw icon-signin m-r-xs"></i> 登录
    </a>
    <a href="<?php $this->options->siteUrl(); ?>register.php" ui-sref="access.signup" class="list-group-item">
      <i class="iconfont icon-chevron text-muted"></i>
      <i class="iconfont icon-fw icon-unlockalt m-r-xs"></i> 注册
    </a>
  </div>
  <div class="text-center" ng-include="'tpl/blocks/page_footer.html'">
    <p>
  <small class="text-muted"><?php $this->options->Indexwords(); ?><br>&copy; <?php echo date("Y");?></small>
</p>
  </div>
</div>


</div>

</body>