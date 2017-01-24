<?php $this->need('header.php'); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<article id="post-<?php $this->cid(); ?>" class="post-<?php $this->cid(); ?> post type-<?php $this->type(); ?> status-<?php $this->status(); ?> format-standard hentry category-<?php $this->categories[0]['slug']; ?>">
			<!-- post thumbnail -->

			<header class="entry-header">
				<div class="entry-meta">
					<span class="cat-links"><?php $this->category(', '); ?></span>
				</div>
				<h1 class="entry-title">
					<?php $this->title(); ?>
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
			<div class="entry-content">
				<?php $this->content(); ?>
			</div><!-- .entry-content -->
			<footer class="entry-meta">
				<span class="tag-links">
					<?php $this->tags('', true, ''); ?>
				</span>
			</footer>
		</article><!-- #post-## -->
		<?php $this->need('comments.php'); ?><!--comments--><!--comments-->

	</div><!-- #content -->
</div><!-- #primary -->

<?php
$this->need('sidebar.php');
$this->need('footer.php');
