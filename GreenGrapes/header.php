<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit(0); ?><!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link href="<?php $this->options->themeUrl('favicon.ico'); ?>" rel="shortcut icon"  type="image/x-icon">
    <!-- css -->
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/main.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/skin-'. get_theme_color() .'.css'); ?>">
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php if(class_exists('Snow_Plugin') && isset($this->options->plugins['activated']['Snow'])): ?>
    <style>
    #logo:after{
        content:url(<?php $this->options->themeUrl('img/hat.png'); ?>);
        display:block;
        position:absolute;
        top:25px;
        left:180px;/* 根据实际情况修改定位*/
    }
    </style>
    <?php endif; ?>
    <?php $this->header(); ?>
</head>
<body>
<?php if (empty($this->options->ShowBlock) || !in_array('HiddenHeaderGlobal', $this->options->ShowBlock)): ?>
<?php if(!($this->is('post') || $this->is('page')) || empty($this->options->ShowBlock) || !in_array('HiddenHeaderInDetail', $this->options->ShowBlock)): ?>
<header id="l-header" class="l-header" style="background-image:url(<?php $this->options->bgImg(); ?>);-moz-background-size:100% 100%; background-size:100% 100%;">
    <div class="hdbg skin-bg"></div>
    <div class="m-about">
        <div id="logo">
            <a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->headerIcon(); ?>" alt=""></a>
        </div>
        <h1 class="tit"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></h1>
        <div class="about"><?php $this->options->description(); ?></div>
    </div>
    <div id="header-canvas" style="width: 100%;height: 100%"></div>
</header>
<?php endif; ?>
<?php endif; ?>
<div id="m-nav" class="m-nav">
    <div class="container m-nav-all">
        <div class="m-logo-url">
            <img src="<?php $this->options->headerIcon(); ?>" alt="头像">
            <h3><?php $this->options->sideName(); ?></h3>
        </div>
        <?php $pages = $this->widget('\Widget\Contents\Page\Rows')->on(true); ?>
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav">
                <li <?php if($this->is('index')): ?> class="active"<?php endif; ?>>
                    <a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                </li>
                <?php while($pages->next()): ?>
                    <li <?php if($this->is('page', $pages->slug)): ?> class="active"<?php endif; ?>>
                        <a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    </li>
                <?php endwhile; ?>
            </ul>
            <!-- 使用 .d-none .d-xl-block，在小于 lg 尺寸(1100px)的屏幕上隐藏 -->
            <form class="d-flex d-none d-xl-flex" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                <label for="s" class="me-2">
                    <input class="form-control" name="s" placeholder="搜索关键词..." type="text" />
                </label>
                <button class="btn btn-secondary"><i class="fa fa-search"></i> 查找</button>
            </form>
        </div>
    </div>
</div>
<form id="search-form" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
    <div class="search-form">
        <span id="search-form-close">×</span>
        <label for="search-input-s"></label><input placeholder="Search for" name="s" id="search-input-s" type="text">
    </div>
</form>
<div id="m-header" class="m-header">
    <div id="showLeftPush" class="left m-header-button"></div>
    <h1><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></h1>
    <div id="search-trigger" style="font-size: 18px;" class="right m-header-search"></div>
</div>
