<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('skin/' . $this->options->css . '.css'); ?>" />
<?php $this->header(); ?>
</head>
<body>
<div id="wrapper">
    <div id="page">
        <header role="banner" class="clearfix">
            <div id="logo"<?php if($this->is('index')): ?> class="home"<?php endif; ?>>
                <h1 id="site-title"><a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title() ?>"><?php $this->options->title() ?></a></h1>
                <!--<p id="site-description"><?php $this->options->description() ?></p>-->
            </div><!--=E #logo -->
            <nav role="navigation">
                <ul class="menu">
                    <li<?php if($this->is('index')): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
                    <li<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
<?php endwhile; ?>
                </ul>
            </nav><!--=E navigation -->
            <ul id="social-menu" class="clearfix">
                <li class="rss"><a href="<?php $this->options->feedUrl(); ?>">RSS</a></li>
            </ul><!--=E #social-menu -->
        </header><!--=E header -->
