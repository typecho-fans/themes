<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Vtrois
 * @version 2.3
 */ 
 if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
	<div class="container">
		<div class="row">
			<?php if ($this->options->sidebarlr == 'left_side'): ?>
			<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
                <div id="sidebar">
                    <?php $this->need('sidebar.php'); ?>
                </div>
            </aside>
			<?php endif; ?>
            <section id="main" class='<?php echo ($this->options->sidebarlr ==  'single') ? 'col-md-12' : 'col-md-8'; ?>'>
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
                        <?php if ($this->options->ad_postend): ?><img src="<?php $this->options->ad_postend(); ?>"><?php endif; ?>
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
					<div class="kratos-hentry kratos-copyright text-center clearfix">
						<img alt="知识共享许可协议" src="<?php $this->options->themeUrl('images/licenses.png'); ?>">
						<h5>本作品采用 <a rel="license nofollow" target="_blank" href="http://creativecommons.org/licenses/by-sa/4.0/">知识共享署名-相同方式共享 4.0 国际许可协议</a> 进行许可</h5>
					</div>
					<nav class="navigation post-navigation clearfix" role="navigation">
						<div class="nav-previous clearfix">
							<?php $this->thePrev(' %s ','已经是第一篇了',array('title' => '上一篇')); ?>
						</div>
						<div class="nav-next">
							<?php $this->theNext(' %s ','已经是最后了',array('title' => '下一篇')); ?>
						</div>
					</nav>
					<?php $this->need('comments.php'); ?>
				</article>
			</section>
			<?php if ($this->options->sidebarlr == 'right_side'): ?>
				<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
	                <div id="sidebar">
	                    <?php $this->need('sidebar.php'); ?>
	                </div>
	            </aside>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php $this->need('footer.php'); ?>