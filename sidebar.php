<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
if($this->options->sidebarLocation!="-1"){
?>
<div class="sidebar s1 dark">

    <a class="sidebar-toggle" title="展开侧栏"><i class="fa icon-sidebar-toggle"></i></a>

    <div class="sidebar-content">
        <?php if ( $this->is('post') ): ?>
            <ul class="post-nav group">
                <li class="next"><?php $this->theNext('%s','',array(
                        'title' => '<i class="fa fa-chevron-right"></i><strong>下一篇</strong> <span>下一篇</span>',
                        'tagClass' => 'nextPage',
                    )); ?></li>
                <li class="previous"><?php $this->thePrev('%s','',array(
                        'title' => '<i class="fa fa-chevron-left"></i><strong>上一篇</strong> <span>上一篇</span>',
                        'tagClass' => 'previousPage',
                    )); ?></li>
            </ul>
        <?php endif; ?>

        <!-- 搜索 -->
        <div class="widget widget_search" id="search-2">
            <form action="./" class="searchform themeform" method="post" _lpchecked="1">
                <div>
                    <input type="text" value="输入搜索词后回车搜索" onfocus="if(this.value=='输入搜索词后回车搜索')this.value='';" onblur="if(this.value=='')this.value='输入搜索词后回车搜索';" name="s" class="search">
                </div>
            </form>
        </div>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
        <div class="widget widget_alx_tabs" id="alxtabs-2">
            <h3 class="group"><span><?php _e('最新文章'); ?></span></h3>
            <ul class="alx-tab group thumbs-enabled" id="tab-recent" style="display: block;">
                <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=5')->to($posts); ?>
            <?php while($posts->next()): ?>
            <li>
                <div class="tab-item-thumbnail">
                <a title="<?php $posts->title(); ?>" href="<?php $posts->permalink(); ?>">
                    <?php if($posts->fields->thumbUrl): ?>
                    <img width="200" height="200" alt="<?php $posts->title(); ?>" class="attachment-thumb-small size-thumb-small wp-post-image" src="<?php $posts->fields->thumbUrl(); ?>">
                    <?php endif; ?>
                </a>
        </div>

        <div class="tab-item-inner group">
            <p class="tab-item-category"><?php $posts->category(','); ?></p><p class="tab-item-title"><a title="{title}" rel="bookmark" href="<?php $posts->permalink(); ?>"><?php $posts->title(); ?></a></p>
            <p class="tab-item-date"><?php $posts->date(); ?></p>
        </div></li>
            <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <div class="widget widget_alx_tabs" id="alxtabs-3">
<h3 class="group"><span><?php _e('最近评论'); ?></span></h3>
	<div class="alx-tabs-container">

			<ul class="alx-tab group avatars-enabled" id="tab-comments">
        <?php $this->widget('Widget_Comments_Recent', 'pageSize=5')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li>
                <div class="tab-item-avatar"><a href="<?php $comments->permalink(); ?>"><?php $comments->gravatar('96',''); ?></a></div>
                <div class="tab-item-inner group">
                    <div class="tab-item-name"><?php $comments->author(false); ?> :</div>
                    <div class="tab-item-comment"><a href="<?php $comments->permalink(); ?>"><?php $comments->excerpt(20, '...'); ?></a></div>

                </div>

            </li>
        <?php endwhile; ?>
            </ul><!--/.alx-tab-->
    </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget">
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
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

    </div><!--/.sidebar-content-->

</div><!--/.sidebar-->
<?php } ?>