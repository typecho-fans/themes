<div id="secondary">
	<?php
		$description = $this->options->description;
		if ( ! empty ( $description ) && $this->options->headerTitle ) :
	?>
	<h2 class="site-description">
		<?php $this->options->descriptions(); ?>
	</h2>
	<?php endif; ?>

	<!--Check Sidebar ON/OFF-->
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
	    <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
	    <aside class="widget widget_recent_entries">
			<h1 class="widget-title"><?php _e('最新文章'); ?></h1>
	        <ul class="widget-list">
	            <?php $this->widget('Widget_Contents_Post_Recent')
	            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
	        </ul>
	    </aside>
	    <?php endif; ?>

	    <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
	    <aside class="widget widget_recent_comments">
			<h1 class="widget-title"><?php _e('最近回复'); ?></h1>
	        <ul class="widget-list recentcomments">
	        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
	        <?php while($comments->next()): ?>
	            <li class="recentcomments"><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>：<?php $comments->excerpt(35, '...'); ?></li>
	        <?php endwhile; ?>
	        </ul>
	    </aside>
	    <?php endif; ?>

	    <?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
	    <aside class="widget widget_categories">
			<h1 class="widget-title"><?php _e('分类'); ?></h1>
	        <ul class="widget-list">
	            <?php $this->widget('Widget_Metas_Category_List')
	            ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
	        </ul>
		</aside>
	    <?php endif; ?>

	    <?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>
	    <aside class="widget widget-meta">
			<h1 class="widget-title"><?php _e('归档'); ?></h1>
	        <ul class="widget-list">
	            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
	            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
	        </ul>
		</aside>
	    <?php endif; ?>

	    <?php if (empty($this->options->sidebarBlock) || in_array('ShowOther', $this->options->sidebarBlock)): ?>
		<aside class="widget">
			<h1 class="widget-title"><?php _e('其它'); ?></h1>
	        <ul class="widget-list">
	            <?php if($this->user->hasLogin()): ?>
					<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
	                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
	            <?php else: ?>
	                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
	            <?php endif; ?>
	            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
	            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
	            <li><a href="http://www.typecho.org">Typecho</a></li>
	        </ul>
		</aside>
	    <?php endif; ?>
	</div><!-- #primary-sidebar -->
</div><!-- #secondary -->