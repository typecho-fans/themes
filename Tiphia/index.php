<?php
/**
 * Tiphia 默认主题的 Typecho 移植版。
 *
 * @package Tiphia for Typecho
 * @author CairBin
 * @version 1.1.0
 * @link https://posts.cairbin.top
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
<?php $this->need('header.php'); ?>

<section class="post-list">
    <?php if ($this->is('index')): ?>
        <div class="hero">
            <?php $avatar = tiphia_theme_avatar_url(); ?>
            <?php if ($avatar !== ''): ?>
                <img class="site-avatar large" src="<?php echo htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8'); ?>" alt="<?php $this->options->title(); ?>" loading="lazy">
            <?php endif; ?>
            <h1><?php $this->options->title(); ?></h1>
            <p><?php $this->options->description(); ?></p>
        </div>
        <?php tiphia_theme_announcement(); ?>
        <form class="search-form" method="post" action="<?php $this->options->siteUrl(); ?>">
            <input type="search" name="s" placeholder="搜索文章" value="<?php echo htmlspecialchars($this->request->get('s', ''), ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit">搜索</button>
        </form>
        <?php if (tiphia_theme_bool('show_popular_posts') || tiphia_theme_bool('show_recent_comments')): ?>
            <aside class="home-widgets">
                <?php tiphia_theme_popular_posts(); ?>
                <?php tiphia_theme_recent_comments(); ?>
            </aside>
        <?php endif; ?>
    <?php else: ?>
        <div class="hero compact-hero">
            <a class="back-link" href="<?php $this->options->siteUrl(); ?>">返回首页</a>
            <h1><?php $this->archiveTitle(array(
                'category' => _t('%s'),
                'search' => _t('搜索：%s'),
                'tag' => _t('标签：%s'),
                'author' => _t('%s')
            ), '', ''); ?></h1>
            <p>按分类、标签或搜索结果浏览文章</p>
        </div>
    <?php endif; ?>

    <?php if ($this->have()): ?>
        <?php if ($this->is('index')): ?>
            <?php $pinnedRows = tiphia_theme_pinned_posts(); ?>
            <?php foreach ($pinnedRows as $post): ?>
                <article class="post-card pinned-post">
                    <div class="post-card-meta-line">
                        <time datetime="<?php echo date('c', (int) $post['created']); ?>"><?php echo date('Y-m-d', (int) $post['created']); ?></time>
                        <span class="pinned-badge">置顶</span>
                    </div>
                    <h2><a href="<?php echo tiphia_theme_attr(tiphia_theme_post_url($post)); ?>"><?php echo tiphia_theme_attr($post['title']); ?></a></h2>
                    <?php tiphia_theme_row_stats($post); ?>
                    <p><?php echo tiphia_theme_attr(tiphia_theme_row_excerpt($post)); ?></p>
                </article>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php while ($this->next()): ?>
            <?php if ($this->is('index') && tiphia_theme_is_pinned($this)) continue; ?>
            <article class="post-card">
                <div class="post-card-meta-line">
                    <time datetime="<?php $this->date('c'); ?>"><?php $this->date('Y-m-d'); ?></time>
                    <?php if (tiphia_theme_is_pinned($this)): ?><span class="pinned-badge">置顶</span><?php endif; ?>
                </div>
                <h2><a href="<?php $this->permalink(); ?>"><?php $this->title(); ?></a></h2>
                <?php tiphia_theme_post_stats($this); ?>
                <p><?php echo htmlspecialchars(tiphia_theme_excerpt($this), ENT_QUOTES, 'UTF-8'); ?></p>
            </article>
        <?php endwhile; ?>
        <nav class="pagination">
            <?php $this->pageNav('&laquo;', '&raquo;', 2, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination-pages', 'currentClass' => 'active')); ?>
        </nav>
    <?php else: ?>
        <p class="state">还没有公开文章</p>
    <?php endif; ?>
</section>

<?php $this->need('footer.php'); ?>
