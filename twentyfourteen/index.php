<?php
/**
 * 移植自WordPress默认主题Twenty Fourteen
 * 本人只负责移植，一切版权都归原作者所有
 * 
 * @package Twenty Fourteen
 * @author 公子
 * @version 1.1
 * @link http://zh.eming.li/#typecho
 */
 
 $this->need('header.php');
 ?>

 <div id="main-content" class="main-content">

	<div id="featured-content" class="featured-content">
		<div class="featured-content-inner">
		</div><!-- .featured-content-inner -->
	</div><!-- #featured-content .featured-content -->

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php while($this->next()): ?>
				<article id="post-<?php $this->cid(); ?>" class="post-<?php $this->cid(); ?> post type-<?php $this->type(); ?> status-<?php $this->status(); ?> format-standard hentry category-<?php $this->categories[0]['slug']; ?>">
					<!-- post thumbnail -->

					<header class="entry-header">
						<div class="entry-meta">
							<span class="cat-links"><?php $this->category(', '); ?></span>
						</div>
						<h1 class="entry-title">
							<a href="<?php $this->permalink(); ?>" rel="bookmark">
								<?php $this->title(); ?>
							</a>
						</h1>

						<div class="entry-meta">
							<span class="entry-date">
								<a href="<?php $this->permalink(); ?>" rel="bookmark">
									<time class="entry-date" datetime="<?php $this->date('c'); ?>">
										<?php $this->date('Y年m月d日'); ?>
									</time>
								</a>
							</span> 
							<span class="byline">
								<span class="author vcard">
									<a class="url fn n" href="<?php $this->author->permalink(); ?>" rel="author">
										<?php $this->author(); ?>
									</a>
								</span>
							</span>
							<?php if( empty($this->password) && $this->allow('comment') ): ?>
							<span class="comments-link">
								<a href="<?php $this->permalink(); ?>#comments" title="<?php $this->title(); ?>">
									<?php $this->commentsNum('%d 条评论'); ?>
								</a>
							</span>
							<?php endif; ?>
							<?php if($this->user->hasLogin()): ?>
								<span class="edit-link">
									<a href="<?php $this->options->adminUrl('write-post.php?cid=' . $this->cid); ?>">编辑</a>
								</span>
							<?php endif; ?>
						</div><!-- .entry-meta -->
					</header><!-- .entry-header -->
					<!--<?php if($this->is('search')): ?>
					<div class="entry-summy">
						<?php $this->excerpt(); ?>
					</div>
					<?php else: ?>
					<div class="entry-content">
						<?php $this->content('阅读全文<span class="meta-nav">&rarr;</span>'); ?>
					</div>-->
					<div class="entry-content">
						<?php $this->content('阅读全文<span class="meta-nav">&rarr;</span>'); ?>
					</div>
					<!-- .entry-content -->
					<?php endif; ?>
					<footer class="entry-meta">
						<span class="tag-links">
							<?php $this->tags('', true, ''); ?>
						</span>
					</footer>
				</article><!-- #post-## -->
			<?php endwhile; ?>
			<?php 
				$totalPage = ceil(getTotal() / $this->options->pageSize);
				if($totalPage>1): 
			?>
			<nav class="navigation paging-navigation" role="navigation">
				<h1 class="screen-reader-text">Posts navigation</h1>
				<div class="pagination loop-pagination">
					<?php pageNavi('&larr; 上一页', '下一页 &rarr;', 1, '...', 'current', $totalPage, $this->_currentPage, $this->options->siteUrl); ?>
					<?php //$this->pageNav('&larr; PREVIOUS', 'NEXT &rarr;', 3, '...', array()); ?>
				</div><!-- .pagination -->
			</nav><!-- #navigation -->
			<?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
	<div id="content-sidebar" class="content-sidebar widget-area" role="complementary">
		<!--footer sidebar-->
	</div><!-- #content-sidebar -->

</div>

<?php
$this->need('sidebar.php');
$this->need('footer.php');
