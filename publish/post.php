<?php $this->need('header.php'); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<article id="post-<?php $this->cid(); ?>" class="post type-post">
			<header class="entry-header">
				<h1 class="entry-title">
					<?php $this->title(); ?>
				</h1>
			</headers>

			<div class="entry-content">
				<?php $this->content(); ?>
			</div>

			<footer class="entry-meta">
				<?php publish_post_on($this); ?>
			</footer>
		</article>
		<?php include('comments.php'); ?>
	</div>
</div>
 <?php $this->need('sidebar.php'); ?>
 <?php $this->need('footer.php'); ?>