<div id="secondary" class="widget-area" role="complementary">
	<aside id="search-2" class="widget widget_search">	
		<form method="post" id="searchform" action="" role="search">
			<label for="s" class="assistive-text">Search</label>
			<input type="text" class="field" name="s" value="" id="s" placeholder="Search …">
			<input type="submit" class="submit" name="submit" id="searchsubmit" value="Search">
		</form>
	</aside>
	<aside id="recent-posts-2" class="widget widget_recent_entries">		
		<h1 class="widget-title">近期文章</h1>		
		<ul>
                <?php $this->widget('Widget_Contents_Post_Recent')
                ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
	</aside>
	<aside id="recent-comments-2" class="widget widget_recent_comments">
		<h1 class="widget-title">近期评论</h1>
		<ul id="recentcomments">
			<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
			<?php while($comments->next()): ?>
				<li class="rencentcomments"><a href="<?php $comments->permalink(); ?>" rel="external nofollow" class="url"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(50, '...'); ?></li>
	        <?php endwhile; ?>
	    </ul>
	</aside>
	<aside id="archives-2" class="widget widget_archive">
		<h1 class="widget-title">文章归档</h1>
        <ul>
        	<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</aside>
	<aside id="categories-2" class="widget widget_categories">
		<h1 class="widget-title">分类目录</h1>		            <ul>
            <?php $this->widget('Widget_Metas_Category_List')
                ->parse('<li class="cat-item"><a href="{permalink}">{name}</a> ({count})</li>'); ?>
        </ul>
	</aside>
	<aside id="meta-2" class="widget widget_meta">
		<h1 class="widget-title">功能</h1>			
		<ul>
			<?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
				<li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
			<?php else: ?>
				<li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
			<?php endif; ?>
			<li><a href="http://validator.w3.org/check/referer">Valid XHTML</a></li>
			<li><a href="http://www.typecho.org">Typecho</a></li>
		</ul>
	</aside>
</div>
