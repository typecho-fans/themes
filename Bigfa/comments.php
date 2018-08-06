<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <h3 class="responses-title"><?php $this->commentsNum(_t('Comments : %d ')); ?></h3>
    
    <?php $comments->listComments(); ?>

	<div class="lists-navigator clearfix">
    <?php $comments->pageNav('←','→','2','...'); ?>
	</div>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
    
        <h3 id="response" class="comments-title"><?php _e('发表留言'); ?></h3>

        <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="responsesForm" role="form">
            <p class="comment-note">人生在世，错别字在所难免，无需纠正。</p>
            <?php if($this->user->hasLogin()): ?>
            <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
            <p  class="comment-form-author comment-form-input">
                <label for="author"><?php _e('称呼'); ?></label>
                <input type="text" name="author" id="author" class="inputGroup" value="<?php $this->remember('author'); ?>" required />
            </p>
            <p  class="comment-form-email comment-form-input">
                <label for="mail"<?php if ($this->options->commentsRequireMail): ?><?php endif; ?>><?php _e('Email'); ?></label>
                <input type="text" name="mail" id="mail" class="inputGroup" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
            </p>
            <p  class="comment-form-url comment-form-input">
                <label for="url"<?php if ($this->options->commentsRequireURL): ?><?php endif; ?>><?php _e('网站'); ?></label>
                <input type="text" name="url" id="url" class="inputGroup" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
            </p>
            <?php endif; ?>
            <p class="comment-form-comment comment-form-input">
                <label for="textarea"><?php _e('内容'); ?></label>
                <textarea rows="8" cols="50" name="text" id="comment" class="inputGroup inputTextarea" required ><?php $this->remember('text'); ?></textarea>
            </p>
            <p class="form-submit">
                <button type="submit" id="submit" class="submit"><?php _e('提交评论'); ?></button><?php $comments->cancelReply(); ?>
            </p>
        </form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>


