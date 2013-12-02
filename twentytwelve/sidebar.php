<div id="secondary" class="widget-area" role="complementary">
    <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
	<aside class="widget widget_search">
        <form role="search" id="searchform" method="post" action="<?php $this->options->siteUrl(); ?>">
            <div>
                <label class="screen-reader-text" for="s">搜索：</label>
                <input type="text" name="s" id="s" class="text" size="20" /> 
                <input type="submit" class="submit" id="searchsubmit" value="<?php _e('搜索'); ?>" />
            </div>
    	</form>
    </aside>
    <?php endif; ?>
		
    <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <aside class="widget widget_recent_entries">		
    	<h3 class="widget-title"><?php _e('近期文章'); ?></h3>		
        	<ul>
            	<?php $this->widget('Widget_Contents_Post_Recent')->parse('<li><a href="{permalink}" title="{title}">{title}</a></li>'); ?>
			</ul>
	</aside>
    <?php endif; ?>
    
    <?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <aside id="recent-comments-2" class="widget widget_recent_comments">
    	<h3 class="widget-title"><?php _e('近期评论'); ?></h3>
        <ul id="recentcomments">
			<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
            <?php while($comments->next()): ?>
                <li class="recentcomments"><a href="<?php $comments->permalink(); ?>" rel="external nofollow" class="url"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(50, '...'); ?></li>
            <?php endwhile; ?>
        </ul>
    </aside>
    <?php endif; ?>
    
    <?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <aside class="widget widget_archive">
    	<h3 class="widget-title"><?php _e('文章归档'); ?></h3>		
        <ul>
        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年n月')->parse('<li><a href="{permalink}" title="{date}">{date}</a> ({count})</li>'); ?>
		</ul>
	</aside>
    <?php endif; ?>
    
    <?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <aside class="widget widget_categories">
    	<h3 class="widget-title"><?php _e('分类目录'); ?></h3>		
        <ul>
        <?php $this->widget('Widget_Metas_Category_List')->parse('<li class="cat-item"><a href="{permalink}" title=" 查看 {name} 下的所有文章">{name}</a> ({count})</li>'); ?>
		</ul>
	</aside>
    <?php endif; ?>

    <?php if (empty($this->options->sidebarBlock) || in_array('ShowOther', $this->options->sidebarBlock)): ?>
    <aside class="widget widget_meta">
    	<h3 class="widget-title"><?php _e('功能'); ?></h3>			
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
    <?php endif; ?>
</div><!-- #secondary -->















