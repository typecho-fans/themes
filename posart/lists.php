<?php $ctype = $this->options->IndexContent; while($this->next()): if ($ctype != 'full') $thumb = posart_thumb_show($this); ?>
	<article class="post<?php if ($thumb) { echo ' thumbnail-on'; }?>">
		<header class="post-head">
			<h2 class="post-title">
				<a href="<?php $this->permalink(); ?>" title="<?php $this->title(); ?>"><?php $this->title(); ?></a>
			</h2>
			<time datetime="<?php $this->date(); ?>" class="post-time"><?php $this->date('F j, Y');?></time>
		</header>
		<?php if ($thumb) {?>
		<section class="post-thumbnail">
			<a href="<?php $this->permalink() ?>">
				<img src="<?php echo $thumb; ?>" alt="<?php $this->title(); ?>" />
			</a>
		</section>
		<?php } ?>
			<?php switch ($ctype) {
				case 'full':
					echo '<section class="post-content">';
					$this->content();
					break;
				case 'more':
					echo '<section class="post-content">';
					$this->content('...');
					break;
				default:
					echo '<section class="post-entry">';
					$this->excerpt(300, '...');
			} ?>
		</section>
		<footer class="post-footer clear">
			<span class="post-tags clear">
				<?php $this->category(''); ?>
				<?php $this->tags(''); ?>
			</span>
			<?php if ($ctype == 'auto') {
				echo '<a class="post-readmore" href="';
				$this->permalink();
				echo'">阅读更多...</a>';
			} ?>
		</footer>
	</article>
<?php endwhile; ?>
<section id="pageNav">
	<?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</section>
