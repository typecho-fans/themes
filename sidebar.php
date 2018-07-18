<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<aside>
  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title"><?php _e('Categories'); ?></h3>
      <ul class="widget-list">
        <?php $this->widget('Widget_Metas_Category_List')
                   ->parse('<li><a href="{permalink}">{name}</a> ({count})</li>'); ?>
      </ul>
    </section>
  <?php endif; ?>
  
  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowTagClouds', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title"><?php _e('Tag Clouds'); ?></h3>
      <p class="tags">
        <?php $this->widget('Widget_Metas_Tag_Cloud', array('sort' => 'count', 'ignoreZeroCount' => true, 'desc' => true, 'limit' => 20))->to($tags); ?>
        <?php while($tags->next()): ?>
          <a href="<?php $tags->permalink(); ?>" title='<?php $tags->count(); ?> 个相关'><?php $tags->name(); ?></a>
        <?php endwhile; ?>
    </section>
  <?php endif; ?>
  
  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowLinks', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title"><?php _e('Blogroll'); ?></h3>
      <ul class="widget-list">
        <?php Links_Plugin::output("SHOW_TEXT", 10); ?>
      </ul>
    </section>
  <?php endif; ?>

  <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
    <section class="widget">
      <h3 class="widget-title"><?php _e('Miscellaneous'); ?></h3>
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
    </section>
  <?php endif; ?>
</aside>
