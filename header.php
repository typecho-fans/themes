<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!doctype html>
<html lang="zh-CN" data-theme="default"<?php if (tiphia_theme_bool('liquid_glass')): ?> class="theme-liquid-glass"<?php endif; ?>>
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php $this->archiveTitle(array(
        'category' => _t('分类 %s 下的文章'),
        'search' => _t('包含关键字 %s 的文章'),
        'tag' => _t('标签 %s 下的文章'),
        'author' => _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">
    <?php tiphia_theme_head_config(); ?>
    <?php $this->header(); ?>
</head>
<body>
<div class="<?php echo tiphia_theme_attr(tiphia_theme_body_class()); ?>">
    <header class="site-header">
        <a class="site-title" href="<?php $this->options->siteUrl(); ?>">
            <?php $avatar = tiphia_theme_avatar_url(); ?>
            <?php if ($avatar !== ''): ?>
                <img class="site-avatar small" src="<?php echo htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php $this->options->title(); ?>" loading="lazy">
            <?php endif; ?>
            <?php $this->options->title(); ?>
        </a>
        <nav>
            <a<?php if ($this->is('index')): ?> class="active"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>">首页</a>
            <a<?php if ($this->is('page', 'categories') || $this->is('category')): ?> class="active"<?php endif; ?> href="<?php echo tiphia_theme_attr(tiphia_theme_page_url('categories')); ?>">分类</a>
            <a<?php if ($this->is('page', 'tags') || $this->is('tag')): ?> class="active"<?php endif; ?> href="<?php echo tiphia_theme_attr(tiphia_theme_page_url('tags')); ?>">标签</a>
            <a<?php if ($this->is('page', 'timeline')): ?> class="active"<?php endif; ?> href="<?php echo tiphia_theme_attr(tiphia_theme_page_url('timeline')); ?>">时间线</a>
            <?php foreach (tiphia_theme_nav_pages() as $page): ?>
                <a<?php if ($this->is('page', $page['slug'])): ?> class="active"<?php endif; ?> href="<?php echo tiphia_theme_attr($page['url']); ?>"><?php echo tiphia_theme_attr($page['label']); ?></a>
            <?php endforeach; ?>
        </nav>
    </header>
    <main>
