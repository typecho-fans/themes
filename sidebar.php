<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit(0); ?>
<?php if (!empty($this->options->ShowBlock) && in_array('ShowSidebarBlogInfo', $this->options->ShowBlock)): ?>
<aside>
    <div class="card widget-sets hidden-xs">
        <div class="card-body" style="background-image:url(<?php $this->options->bgImg(); ?>);-moz-background-size:100% 100%; background-size:100% 100%;">
            <div class="hdbg skin-bg"></div>
            <div class="sidebar-user">
                <div class="user-avatar">
                    <a href="<?php $this->options->siteUrl(); ?>"><img src="<?php $this->options->headerIcon(); ?>" alt=""></a>
                </div>
                <div class="user-info">
                    <h1><a class="text-white" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a></h1>
                    <div class="mb-2"><?php $this->options->description(); ?></div>
                    <?php $stat = Typecho\Widget::widget('Widget\Stat')->on(true); ?>
                    <div class="count d-flex justify-content-around">
                        <div class="item flex-fill d-flex flex-column">
                            <span class="h4"><?php $stat->publishedPostsNum() ?></span>
                            <span>文章</span>
                        </div>
                        <div class="item flex-fill d-flex flex-column">
                            <span class="h4"><?php $stat->categoriesNum() ?></span>
                            <span>分类</span>
                        </div>
                        <div class="item flex-fill d-flex flex-column">
                            <span class="h4"><?php $stat->publishedCommentsNum() ?></span>
                            <span>评论</span>
                        </div>
                        <div class="item flex-fill d-flex flex-column">
                            <span class="h4"><?php echo $stat->publishedPagesNum + $stat->publishedPostsNum; ?></span>
                            <span>页面</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
<?php endif ?>
<aside>
    <div class="card widget-sets hidden-xs">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="#sidebar-recent-article" data-bs-toggle="tab">最新文章</a></li>
            <li class="nav-item"><a class="nav-link" href="#sidebar-comment" data-bs-toggle="tab">最新评论</a></li>
            <?php if (empty($this->options->ShowBlock) || !in_array('HiddenSidebarRandomArticle', $this->options->ShowBlock)): ?>
            <li class="nav-item"><a class="nav-link" href="#sidebar-random-article" data-bs-toggle="tab">随机文章</a></li>
            <?php endif; ?>
        </ul>
        <div class="tab-content">
            <div class="tab-pane nav bs-sidenav active in" id="sidebar-recent-article">
                <?php $recent_posts = $this->widget('\Widget\Contents\Post\Recent')->on(true); ?>
                <ul class="list-group">
                    <?php while ($recent_posts->next()): ?>
                        <li class="list-group-item clearfix">
                            <a href="<?php $recent_posts->permalink(); ?>"><?php echo $recent_posts->title; ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="tab-pane fade" id="sidebar-comment">
                <?php $comments = $this->widget('\Widget\Comments\Recent')->on(true); ?>
                <ul class="list-group">
                <?php while($comments->next()): ?>
                    <li class="list-group-item clearfix"><?php $comments->author(false); ?>：<a href="<?php $comments->permalink(); ?>" target="_blank"><?php $comments->excerpt(35, '...'); ?></a></li>
                <?php endwhile; ?>
                </ul>
            </div>
            <?php if (empty($this->options->ShowBlock) || !in_array('HiddenSidebarRandomArticle', $this->options->ShowBlock)): ?>
            <div class="tab-pane nav bs-sidenav fade" id="sidebar-random-article">
                <?php theme_random_posts();?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</aside>
<?php if(class_exists('Links_Plugin') && isset($this->options->plugins['activated']['Links'])): ?>
<aside>
    <div class="card card-skin hidden-xs">
        <div class="card-header"><i class="fa fa-link fa-fw"></i> 友情链接</div>
        <ul class="list-group">
            <?php Links_Plugin::output('<li class="list-group-item"><a href="{url}" target="_blank" rel="noopener noreferrer">{name}</a></li>', 10, NULL, true); ?>
        </ul>
    </div>
</aside>
<?php endif; ?>
<?php if(empty($this->options->ShowBlock) || !in_array('HiddenCategory', $this->options->ShowBlock)): ?>
<aside>
    <div class="card card-skin hidden-xs">
        <div class="card-header"><i class="fa fa-book fa-fw"></i> 文章分类</div>
        <div class="list-group category">
            <ul class="widget-list">
                <?php $this->widget('\Widget\Metas\Category\Rows')->parse('<li><a href="{permalink}">{name} <span class="badge bg-secondary float-end">{count}</span></a></li>'); ?>
            </ul>
        </div>
    </div>
</aside>
<?php endif; ?>
<?php if (empty($this->options->ShowBlock) || !in_array('HiddenArchive', $this->options->ShowBlock)): ?>
<aside>
    <div class="card card-skin hidden-xs">
        <div class="card-header"><i class="fa fa-book fa-fw"></i> <?php _e('归档'); ?></div>
        <div class="list-group category">
            <ul class="widget-list">
                <?php $this->widget('\Widget\Contents\Post\Date', 'type=month&format=Y 年 m 月')->parse('<li><a href="{permalink}">{date}<span class="badge bg-secondary float-end">{count}</span></a></li>'); ?>
            </ul>
        </div>
    </div>
</aside>
<?php endif; ?>
