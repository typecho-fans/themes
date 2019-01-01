<?php $this->comments()->to($comments); ?>


<?php if(!$this->allow('comment')): ?>
    <div class="comments-block">
        <p class="ui ribbon badge <?php $this->options->singleColor() ?>"><?php _e('楼主残忍的关闭了评论'); ?></p>
    </div>
<?php else: ?>
<div id="comments">
    <div class="comments-block">
        <p class="ui <?php $this->options->singleColor() ?> ribbon badge comments"><?php $this->commentsNum(_t('还不快抢沙发'), _t('只有地板了'), _t('<span class="comment-highlight">%d</span> 条评论')); ?></p>
        <?php $comments->listComments(); ?>

        <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    </div>
    <div class="comments-block new-comment" id="<?php $this->respondId(); ?>">
        <div>
            <?php $comments->cancelReply(); ?>
        </div>
        <p class="ui ribbon badge <?php $this->options->singleColor() ?>"><?php _e('添加新评论'); ?></p>
        <form method="post" action="<?php $this->commentUrl() ?>" class="ui fluid form">
            <?php if($this->user->hasLogin()): ?>
                <div class="comments-field"><?php _e('登录身份：'); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></div>
            <?php else: ?>
                <div class="two fields">
                    <div class="comments-field">
                        <input type="text" name="author" placeholder="<?php _e('称呼'); ?><?php _e(' (必填)') ?>" value="<?php $this->remember('author'); ?>" />
                    </div>
                    <div class="comments-field">
                        <input type="email" name="mail" placeholder="<?php _e('电子邮件'); ?><?php if ($this->options->commentsRequireMail): ?><?php _e(' (必填)') ?><?php endif; ?>" value="<?php $this->remember('mail'); ?>" />
                    </div>
                </div>
                <div class="comments-field">
                    <input type="url" name="url" placeholder="<?php _e('个人主页'); ?><?php if ($this->options->commentsRequireURL): ?><?php _e(' (必填)') ?><?php endif; ?>" value="<?php $this->remember('url'); ?>" />
                </div>
            <?php endif; ?>

            <div class="comments-field">
                <textarea rows="8" cols="50" id="comment-content" placeholder="<?php _e('回复内容'); ?><?php _e(' (必填)')?>" name="text"><?php $this->remember('text'); ?></textarea>
            </div>
            <button type="submit" id="comment-submit" class="btn btn-skin"><?php _e('提交评论'); ?></button>
        </form>
    </div>
</div>
<?php endif; ?>

