<!DOCTYPE HTML>
<html>
<head>
	<meta charset="<?php $this->options->charset(); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel='stylesheet' id='publish-style-css'  href='<?php $this->options->themeUrl('style.css'); ?>' type='text/css' media='all' />
	<script type='text/javascript' src='http://lib.sinaapp.com/js/jquery/1.9.0/jquery.min.js'></script>
	<!--[if lt IE 9]>
	<script src="<?php $this->options->themeUrl('js/html5.js'); ?>" type="text/javascript"></script>
	<![endif]-->
	<!-- 通过自有函数输出HTML头部信息 -->
	<?php $this->header(); ?>
</head>

<body class="
<?php
	if($this->is('index')) echo 'home blog';
	elseif($this->is('page')) echo 'page';
	elseif($this->is('single')) echo 'single single-post single-format-standard';
	else echo '';
?>
">
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<a class="site-logo" href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>">
				<?php $this->author->gravatar('100'); ?>
			</a>
			<hgroup>
				<h1 class="site-title"><a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>" rel="HOME"><?php $this->options->title(); ?></a></h1>
				<h2 class="site-description"><?php $this->options->description(); ?></h2>
			</hgroup>

			<nav role="navigation" class="site-navigation main-navigation">
				<h1 class="assistive-text"><?php _e('菜单', 'publish'); ?></h1>
				<div class="assistive-text skip-link"><a href="#content" title="<?php _e('跳转到正文', 'publish'); ?>"><?php _e('跳转到正文', 'publish'); ?></a></div>
				<ul>
	    			<li<?php if($this->is('index')): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
	    			<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
	    			<?php while($pages->next()): ?>
	    			<li<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
	    			<?php endwhile; ?>
	    		</ul>
	    	</nav>
	    </header>

		<div id="main" class="site-main">