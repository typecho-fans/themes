<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $this->archiveTitle(' &raquo; ', '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php if (!empty($this->options->cdnUrl)): ?><?php echo $this->options->cdnUrl . '/usr/themes/pure/style.css'; ?><?php else: ?><?php $this->options->themeUrl('style.css'); ?><?php endif; ?>">
    <?php $this->header('keywords=&generator=&template=&pingback=&xmlrpc=&wlw=&rss2=&rss1=&commentReply=&atom='); ?>
</head>
<body>
<div class="container">
    <div id="page">
        <header role="banner" id="header">
            <h1 class="site-title"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a></h1>
            <p class="description"><?php $this->options->description() ?></p>
        </header><!--=E #header -->