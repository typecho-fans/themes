<?php $this->need('header.php'); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
    <?php if ($this->have()): ?>
	<?php while($this->next()): ?>
            	<article class="post type-post status-publish format-standard hentry category-uncategorized">
                	<header class="entry-header">
                    	<h1 class="entry-title">
                        	<a href="<?php $this->permalink() ?>" title="链向 <?php $this->title() ?> 的固定链接" rel="bookmark">
                            	<?php $this->title() ?>
                            </a>
                        </h1>
                        <div class="comments-link">
                        	<a href="<?php $this->permalink() ?>#comments" title="<?php $this->title() ?> 上的评论">
                            	<?php $this->commentsNum('暂无回复', '沙发被抢', '%d 条回复'); ?>
                            </a>
                        </div>
                    </header>
                    <div class="entry-content">
                    	<?php $this->content('继续阅读→') ?>
                    </div>
                    <footer class="entry-meta">
                    	本条目发布于 <a href="<?php $this->permalink() ?>" title="<?php $this->date('G:i') ?>" rel="bookmark"><time class="entry-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('Y 年 m 月 j 日'); ?></time></a>。属于<a href="#" title="查看 中的全部文章" rel="category"><?php $this->category(',') ?></a> 分类。<span class="by-author">作者是<span class="author vcard"><a class="url fn n" href="#" title="查看所有由 <?php $this->author(); ?> 发布的文章" rel="author"><?php $this->authro(); ?></a></span>。</span>
                     </footer>
                 </article>
	<?php endwhile; ?>
    <?php else: ?>
        <div class="post">
            <h2 class="entry_title"><?php _e('没有找到内容'); ?></h2>
        </div>
    <?php endif; ?>

<nav id="nav-below" class="navigation" role="navigation">
	<h3 class="assistive-text">文章导航</h3>
    <?php $this->pageLink('<span class="meta-nav">←</span> 较新文章','prev'); ?>
    <?php $this->pageLink('早期文章<span class="meta-nav">→</span>','next'); ?>
</nav>
    </div>
</div>
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
