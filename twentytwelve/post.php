<?php $this->need('header.php'); ?>
<div id="primary" class="site-content">
	<div id="content" role="main">			
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
        	<?php $this->content() ?>
        </div>
        <footer class="entry-meta">
        	本条目发布于 <a href="<?php $this->permalink() ?>" title="<?php $this->date('G:i') ?>" rel="bookmark"><time class="entry-date" datetime="<?php $this->date('c'); ?>"><?php $this->date('Y 年 m 月 j 日'); ?></time></a>。属于<a href="#" title="查看 中的全部文章" rel="category"><?php $this->category(',') ?></a> 分类。<span class="by-author">作者是<span class="author vcard"><a class="url fn n" href="#" title="查看所有由 <?php $this->author(); ?> 发布的文章" rel="author"><?php $this->author(); ?></a></span>。</span>
         </footer>
    </article>
	<nav class="nav-single">
		<h3 class="assistive-text">文章导航</h3>
		<span class="prev"><?php $this->theNext(); ?></span>
		<span class="next"><?php $this->thePrev(); ?></span>
	</nav>

	<?php $this->need('comments.php'); ?>
	</div>
</div>

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>


