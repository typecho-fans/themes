<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<article class="article theme-page not-found-page">
    <a class="back-link" href="<?php $this->options->siteUrl(); ?>">返回首页</a>
    <div class="not-found-panel">
        <strong>404</strong>
        <h1>页面没有找到</h1>
        <p>这个地址可能已经失效，或者你访问的内容被移动了。</p>
        <form class="search-form not-found-search" method="post" action="<?php $this->options->siteUrl(); ?>">
            <input type="search" name="s" placeholder="搜索文章">
            <button type="submit">搜索</button>
        </form>
    </div>
</article>

<?php $this->need('footer.php'); ?>
