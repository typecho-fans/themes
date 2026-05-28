<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<article class="article">
    <a class="back-link" href="<?php $this->options->siteUrl(); ?>">返回首页</a>
    <h1><?php $this->title(); ?></h1>
    <time datetime="<?php $this->date('c'); ?>"><?php $this->date('Y-m-d H:i'); ?></time>
    <?php tiphia_theme_post_stats($this); ?>
    <div class="content">
        <?php $this->content(); ?>
    </div>
    <?php $this->need('comments.php'); ?>
</article>

<?php $this->need('footer.php'); ?>
