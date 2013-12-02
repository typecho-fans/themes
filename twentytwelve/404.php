<?php $this->need('header.php'); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title">有点尴尬诶。</h1>
				</header>

				<div class="entry-content">
					<p>我们可能无法找到您需要的内容。或许搜索功能可以帮到您。</p>
                    <form role="search" id="searchform" method="post" action="<?php $this->options->siteUrl(); ?>">
                        <div>
                            <label class="screen-reader-text" for="s">搜索：</label>
                            <input type="text" name="s" id="s" class="text" size="20" /> 
                            <input type="submit" class="submit" id="searchsubmit" value="<?php _e('搜索'); ?>" />
                        </div>
                    </form>
				</div>
			</article>

		</div><!-- #content -->
	</div><!-- #primary -->



<?php $this->need('footer.php'); ?>
