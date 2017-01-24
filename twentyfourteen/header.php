<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="zh-CN">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="zh-CN">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="zh-CN">
<!--<![endif]-->
<head>
	<meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>
		<?php 
			$this->archiveTitle(array(
            	"category"  =>  _t("分类 %s 下的文章"),
            	"search"    =>  _t("包含关键字 %s 的文章"),
            	"tag"       =>  _t("标签 %s 下的文章"),
            	"author"    =>  _t("%s 发布的文章")
        	), "", " - "); ?><?php $this->options->title(); 
        ?>
    </title>
	<!--[if lt IE 9]>
	<script src="<?php $this->options->adminUrl('js/html5.js'); ?>"></script>
	<![endif]-->
	<link rel="stylesheet" id="twentyfourteen-lato-css"  href="//fonts.googleapis.com/css?family=Lato%3A300%2C400%2C700%2C900%2C300italic%2C400italic%2C700italic" type="text/css" media="all" />
	<link rel="stylesheet" id="genericons-css"  href="<?php $this->options->themeUrl('genericons/genericons.css'); ?>" type="text/css" media="all" />
	<link rel="stylesheet" id="twentyfourteen-style-css"  href="<?php $this->options->themeUrl('style.css'); ?>" type="text/css" media="all" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" id="twentyfourteen-ie-css"  href="<?php $this->options->themeUrl('css/ie.css'); ?>" type="text/css" media="all" />
	<![endif]-->
	<script type="text/javascript" src="<?php $this->options->adminUrl('js/jquery.js'); ?>"></script>
	<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery-migrate.min.js'); ?>"></script>
	<?php if(!$this->options->headerTitle): ?>
	<style type="text/css" id="twentyfourteen-header-css">
		.site-title, .site-description {
			clip: rect(1px 1px 1px 1px); /* IE7 */
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
	</style>
	<?php endif; ?>
	<?php if($this->options->headerTitle && $this->options->headerTitleColor): ?>
	<style type="text/css" id="twentyfourteen-header-css">
		.site-title a {color: <?php $this->options->headerTitleColor() ?>;}
	</style>
	<?php endif; ?>
    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>

<body class="masthead-fixed list-view full-width grid group-blog<?php if($this->options->headerImage): ?> header-image<?php endif; ?>">
<div id="page" class="hfeed site">
	<?php  if($this->options->headerImage): ?>
	<div id="site-header">
		<a href="<?php $this->options->siteUrl(); ?>" rel="home">
			<img src="<?php $this->options->headerImage(); ?>" width="100%" height="240px" alt="">
		</a>
	</div>
	<?php endif; ?>
	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title">
				<a href="<?php $this->options->siteUrl(); ?>" rel="home">
					<?php $this->options->title() ?>
				</a>
			</h1>

			<div class="search-toggle">
				<a href="#search-container" class="screen-reader-text">搜索</a>
			</div>

			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<h1 class="menu-toggle">主菜单</h1>
				<a class="screen-reader-text skip-link" href="#content">跳转到日志</a>
				<div class="nav-menu">
					<ul>
						<!--
						<li class="page-item<?php if($this->is('index')): ?> current<?php endif; ?>">
							<a href="<?php $this->options->siteUrl(); ?>" title="<?php _e('Home'); ?>">
								<?php _e('Home'); ?>
							</a>
						</li>
						-->
						<?php 
							$this->widget('Widget_Contents_Page_List')->to($pages); 
							while($pages->next()):
						?>
							<li class="page-item<?php if($this->is('page', $pages->slug)): ?> current<?php endif; ?>">
								<a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>">
									<?php $pages->title(); ?>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</nav>
		</div>

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<form role="search" method="get" class="search-form" action="./">
					<label>
						<span class="screen-reader-text">搜索：</span>
						<input type="search" class="search-field" placeholder="搜索&hellip;" value="" name="s" title="搜索：" />
					</label>
					<input type="submit" class="search-submit" value="搜索" />
				</form>			
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">