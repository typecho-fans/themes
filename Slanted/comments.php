<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<section id="comments" class="themeform">
    <?php $this->comments()->to($comments); ?>
    <ul class="comment-tabs group">
        <li class="active"><a href="#comments"><i class="fa fa-comments-o"></i><?php $this->commentsNum(_t('暂无评论'), _t('仅有一条评论'), '已有<span>%d</span>条评论'); ?></a></li>
    </ul>

    <div id="commentlist-container" class="comment-tab">
    <?php $comments->listComments(); ?>

    </div>
    <div class="page-navigator">
    <?php $comments->pageNav('&laquo;', '&raquo;', 5, '...', array(
        'wrapTag' => 'div',
        'wrapClass' => '',
        'itemTag' => '',
        'textTag' => 'a',
        'currentClass' => 'current',
        'prevClass' => 'previouspostslink',
        'nextClass' => 'nextpostslink'
    )); ?></div>


    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    
    	<h3 id="reply-title"><?php _e('添加新评论'); ?></h3>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="comment-form" role="form">

            <p>
                <label for="textarea" class="required"><?php _e('内容'); ?></label>
                <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
            </p>
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
    		<p class="comment-form-author">
                <label for="author" class="required"><?php _e('称呼'); ?> <span class="required">*</span></label>
    			<input type="text" name="author" id="author" class="text" value="<?php $this->remember('author'); ?>" required />
    		</p>
    		<p class="comment-form-email">
                <label for="mail"<?php if ($this->options->commentsRequireMail): ?> class="required"<?php endif; ?>><?php _e('Email'); ?></label>
    			<input type="email" name="mail" id="mail" class="text" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    		<p class="comment-form-url">
                <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
    			<input type="url" name="url" id="url" class="text" size="30" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
            <?php endif; ?>
    		<p class="form-submit">
                <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
            </p>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</section><!--/#comments-->