<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="zh-CN" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="zh-CN" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="zh-CN" prefix="og: http://ogp.me/ns#" style="display:block;">
<!--<![endif]-->
<head>
<meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
<!-- 使用url函数转换相关路径 -->
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('style.css'); ?>" />
<!--[if lt IE 9]>
<script src="<?php $this->options->themeUrl('js/html5.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php $this->options->themeUrl('ie.css'); ?>" />
<![endif]-->
<!-- 通过自有函数输出HTML头部信息 -->
<?php $this->header(); ?>
</head>
<body class="home blog custom-font-enabled single-author">
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
		<hgroup>
			<h1 class="site-title">
            	<a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->titlte(); ?>" rel="home">
					<?php if ($this->options->logoUrl): ?>
                    <img height="60" src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                    <?php endif; ?>
                    <?php $this->options->title() ?>
                </a>
            </h1>
			<h2 class="site-description"><?php $this->options->description() ?></h2>
		</hgroup>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle">菜单</h3>
			<a class="assistive-text" href="#content" title="跳至内容">跳至内容</a>
			<div class="nav-menu">
            	<ul>
                    <li<?php if($this->is('index')): ?> class="current_page_item"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <li<?php if($this->is('page', $pages->slug)): ?> class="current_page_item"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                    <?php endwhile; ?>
                </ul>
            </div>
		</nav><!-- #site-navigation -->

			</header><!-- #masthead -->


	<div id="main" class="wrapper">


