<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<?php if ($this->slug === 'categories'): ?>
<article class="article theme-page directory">
    <a class="back-link" href="<?php $this->options->siteUrl(); ?>">返回首页</a>
    <div class="hero compact-hero">
        <h1>分类</h1>
        <p>按主题浏览文章集合</p>
    </div>
    <div class="term-grid">
        <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
        <?php while ($categories->next()): ?>
            <a class="term-tile" href="<?php $categories->permalink(); ?>">
                <span><?php $categories->name(); ?></span>
                <small><?php echo tiphia_theme_attr($categories->description ?: $categories->slug); ?></small>
                <strong><?php $categories->count(); ?> 篇文章</strong>
            </a>
        <?php endwhile; ?>
    </div>
    <?php $this->need('comments.php'); ?>
</article>
<?php elseif ($this->slug === 'tags'): ?>
<article class="article theme-page directory">
    <a class="back-link" href="<?php $this->options->siteUrl(); ?>">返回首页</a>
    <div class="hero compact-hero">
        <h1>标签</h1>
        <p>按关键词发现相关内容</p>
    </div>
    <div class="term-grid">
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=' . tiphia_theme_int('tag_cloud_limit', 24, 0, 200))->to($tags); ?>
        <?php while ($tags->next()): ?>
            <a class="term-tile" href="<?php $tags->permalink(); ?>">
                <span><?php $tags->name(); ?></span>
                <small><?php echo tiphia_theme_attr($tags->slug); ?></small>
                <strong><?php $tags->count(); ?> 篇文章</strong>
            </a>
        <?php endwhile; ?>
    </div>
    <?php $this->need('comments.php'); ?>
</article>
<?php elseif ($this->slug === 'timeline'): ?>
<article class="article theme-page timeline">
    <a class="back-link" href="<?php $this->options->siteUrl(); ?>">返回首页</a>
    <div class="hero compact-hero">
        <h1>时间线</h1>
        <p>按发布时间回看所有公开文章</p>
    </div>
    <div class="timeline-list">
        <?php
        $db = Typecho_Db::get();
        $posts = $db->fetchAll($db->select('cid', 'title', 'slug', 'created', 'type')->from('table.contents')->where('type = ?', 'post')->where('status = ?', 'publish')->order('created', Typecho_Db::SORT_DESC));
        $currentYear = null;
        foreach ($posts as $post):
            $year = date('Y', (int) $post['created']);
            if ($year !== $currentYear):
                if ($currentYear !== null) echo '</div></section>';
                $currentYear = $year;
        ?>
        <section class="timeline-group"><h2><?php echo $year; ?></h2><div>
            <?php endif; ?>
            <a class="timeline-item" href="<?php echo tiphia_theme_attr(tiphia_theme_post_url($post)); ?>">
                <time><?php echo date('Y-m-d', (int) $post['created']); ?></time>
                <span><?php echo tiphia_theme_attr($post['title']); ?></span>
            </a>
        <?php endforeach; ?>
        <?php if ($currentYear !== null) echo '</div></section>'; ?>
    </div>
    <?php $this->need('comments.php'); ?>
</article>
<?php elseif ($this->slug === 'links'): ?>
<article class="article theme-page directory friend-links">
    <a class="back-link" href="<?php $this->options->siteUrl(); ?>">返回首页</a>
    <div class="hero compact-hero">
        <h1><?php $this->title(); ?></h1>
        <p>朋友们的站点与作品</p>
    </div>
    <div class="content">
        <?php $this->content(); ?>
    </div>
    <?php $friendGroups = tiphia_theme_friend_links(); ?>
    <?php if ($friendGroups): ?>
        <?php foreach ($friendGroups as $category => $links): ?>
            <section class="friend-link-group">
                <h3><?php echo tiphia_theme_attr($category); ?></h3>
                <div class="friend-link-list">
                    <?php foreach ($links as $link): ?>
                        <a class="friend-link" href="<?php echo tiphia_theme_attr($link['url']); ?>" rel="noopener noreferrer" target="_blank">
                            <?php if ($link['avatar'] !== ''): ?>
                                <img src="<?php echo tiphia_theme_attr($link['avatar']); ?>" alt="" loading="lazy">
                            <?php else: ?>
                                <span class="friend-link-avatar-fallback"></span>
                            <?php endif; ?>
                            <span>
                                <strong><?php echo tiphia_theme_attr($link['name']); ?></strong>
                                <?php if ($link['description'] !== ''): ?>
                                    <small><?php echo tiphia_theme_attr($link['description']); ?></small>
                                <?php else: ?>
                                    <small><?php echo tiphia_theme_attr(parse_url($link['url'], PHP_URL_HOST) ?: $link['url']); ?></small>
                                <?php endif; ?>
                            </span>
                        </a>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="state">还没有配置友情链接</p>
    <?php endif; ?>
    <?php $this->need('comments.php'); ?>
</article>
<?php else: ?>
<article class="article theme-page plain">
    <a class="back-link" href="<?php $this->options->siteUrl(); ?>">返回首页</a>
    <h1><?php $this->title(); ?></h1>
    <div class="content">
        <?php $this->content(); ?>
    </div>
    <?php $this->need('comments.php'); ?>
</article>
<?php endif; ?>

<?php $this->need('footer.php'); ?>
