<?php $this->need('header.php'); ?>
<h3 class="archive-title">
	<?php $this->archiveTitle(array(
		'category'  =>  _t('分类 <mark>%s</mark> 下的文章'),
		'search'    =>  _t('包含关键字 <mark>%s</mark> 的文章'),
		'tag'       =>  _t('标签 <mark>%s</mark> 下的文章'),
		'author'    =>  _t('<mark>%s</mark> 发布的文章')
	), '', ''); ?>
</h3>
<?php if ($this->have()):
	$this->need('lists.php'); ?>
	<?php else: ?>
		<article class="post">
			<header class="post-head">
				<h2 class="post-title">
					<a><?php _e('没有找到内容'); ?></a>
				</h2>
			</header>
		</article>
	<?php endif; ?>
<?php $this->need('footer.php'); ?>
