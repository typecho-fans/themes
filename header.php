<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>"/>
    <?php $this->header(); ?>
</head>
<body>
  <!--[if lt IE 8]>
      <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
  <![endif]-->
  <header id="header">
    <div class="nav-wrap">
      <nav id="navbar">
        <a class="main" href="<?php $this->options->siteUrl() ?>" title="<?php $this->options->title() ?>"><?php $this->options->title() ?></a>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while($pages->next()): ?>
          <a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
        <?php endwhile; ?>
        <form action="./" method="post" role="search">
          <input id="s" type="text" class="search-input" name="s" placeholder="Keyword..." autocomplete="off"/>
        </form>
      </nav>
  	</div>
    <hgroup id="logo">
      <h1><a class="main" href="<?php $this->options->siteUrl() ?>" title="<?php $this->options->title() ?>"><?php $this->options->title() ?></a></h1>
      <h2><?php $this->options->description() ?></h2>
      <div class="background"></div>
    </hgroup>
  </header>

	<div id="wrapper">
		<div id="container">
