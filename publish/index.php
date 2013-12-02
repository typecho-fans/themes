<?php
/**
 * 一款从WordPress移植过来的响应式主题 
 *
 * @package Publish 
 * @author Austin
 * @version 1.1
 * @link http://imnerd.org
 */
 
 $this->need('header.php');
 ?>
 	<div id="primary" class="content-area">
 		<div id="content" class="site-content" role="main">
	 		<?php while($this->next()): ?>
	 		<article id="post-<?php $this->cid(); ?>" class="post">
	 			<header class="entry-header">
	 				<h1 class="entry-title">
	 					<a href="<?php $this->permalink(); ?>" title="链接到 <?php $this->title(); ?>" rel="bookmark"><?php $this->title(); ?></a>
	 				</h1>
	 			</header>
				<!--show the search result
	 			<div class="entry-summary"></div>
	 			-->
	 			<div class="entry-content">
	 				<?php $this->content('阅读剩余部分<span class="meta-nav">&rarr;</span>'); ?>
	 				<!--There is a navi show if this post has in the original template-->
	 			</div>
	 			<footer class="entry-meta">
	 				<span class="cat-links">
	 					发布于 <?php $this->category(','); ?>
	 				</span>
	 				<!--shoud add judge-->
	 				<span class="sep">|</span>
	 				<span class="tag-links">
	 					标签 <?php $this->tags(', ', true, '无'); ?>
	 				</span>
	 				<!--shoud add judge-->
	 				<span class="sep">|</span>
	 				<span class="comments-link">
	 					<a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('发表评论', '1 条评论', '%d 条评论'); ?></a>
	 				</span>
	 				<!--should add edit for user-->
	 			</footer>
	 		</article>
	 		<?php endwhile; ?>
	 		<!--navi should improved-->			
	 		<?php if (!$this->is('single')): ?>
	 		<nav role="navigation" id="nav-below" class="site-navigation paging-navigation">
				<h1 class="assistive-text">Post navigation</h1>
					<div class="nav-previous"><?php $this->pageLink('<span class="meta-nav">←</span>旧文章', 'next') ?></div>
					<div class="nav-next"><?php $this->pageLink('新文章 <span class="meta-nav">→</span>', 'prev') ?></div>
		
		
	
			</nav>
			<?php endif; ?>

	 	</div>
    </div>
 <?php $this->need('sidebar.php'); ?>
 <?php $this->need('footer.php'); ?>

