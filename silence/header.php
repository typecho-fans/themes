<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('skin/' . $this->options->css . '.css'); ?>" />
<?php if (!empty($this->options->background) || !empty($this->options->pattern)): ?>
<style type="text/css">
body { background: <?php echo $this->options->background . ' url(' . $this->options->themeUrl . '/images/patterns/' . $this->options->pattern . '.png)'; ?>; }
</style>
<?php endif; ?>
<?php $this->header('generator=&template='); ?>
</head>
<body>
<div class="container">
    <header role="banner">
        <div id="logo"><a href="<?php $this->options->siteUrl() ?>"><?php $this->options->title(); ?></a></div>
        <nav role="navigation">
            <ul class="menu">
                <li<?php if($this->is('index')): ?> class="current"<?php endif; ?>><a href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
                <li<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?>><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
<?php endwhile; ?>
            </ul>
        </nav>
        <div class="clear"></div>
    </header><!--=E Header -->
