<?php
/**
 * 宽版页面
 *
 * @package custom
 */
 if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
	<div class="container">
		<div class="row">
            <section id="main" class='col-md-12'>
				<article>
					<div class="kratos-hentry kratos-post-inner clearfix">
						<header class="kratos-entry-header">
							<h1 class="kratos-entry-title text-center"><?php $this->title(); ?></h1>
							<div class="kratos-post-meta text-center">
								<span>
								<i class="fa fa-calendar"></i> <?php $this->date('Y-m-d'); ?>
				                <i class="fa fa-commenting-o"></i> <?php $this->commentsNum('0', '1', '%d'); ?> Comments
				                <i class="fa fa-eye"></i> <?php get_post_view($this); ?> Views
								</span>
							</div>
						</header>
						<div class="kratos-post-content">
                        <?php parseContent($this); ?>
                        <?php //if ($ad['footer']==1): ?>
	                    <img src="<?php //echo kratos_option('ad_img');?>">
	                    <?php //endif ?>
						</div>
						<footer class="kratos-entry-footer clearfix">
							<div class="footer-tag clearfix">
								<div class="pull-left">
								<i class="fa fa-tags"></i>
								<?php $this->tags(' ', true, '<a>没有标签</a>'); ?>
								</div>
							</div>
						</footer>
					</div>
					<?php $this->need('comments.php'); ?>
				</article>
			</section>
		</div>
	</div>
</div>
<?php $this->need('footer.php'); ?>