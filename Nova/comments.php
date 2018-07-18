<div id="comments">
  <?php $this->comments()->to($comments); ?>
  <?php if ($comments->have()): ?>
    <h4><?php $this->commentsNum(_t('暂无评论 »'), _t('仅有 1 条评论 »'), _t('已有 %d 条评论 »')); ?></h4>
    <?php $comments->listComments(); ?>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
  <?php endif; ?>
  <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
      <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
      </div>
      <h4 id="response"><?php _e('添加新评论 »'); ?></h4>
      <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
        <?php if($this->user->hasLogin()): ?>
    	  <p><?php _e('登录身份：'); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
        <?php else: ?>
    	  <p>
    	    <input type="text" name="author" id="author" class="text" placeholder="<?php _e('Name'); ?>" value="<?php $this->remember('author'); ?>" />
            <label for="author"><?php _e('称呼'); ?><span class="required">*</span></label>
    	  </p>
    	  <p>
    	    <input type="email" name="mail" id="mail" class="text" placeholder="<?php _e('Email'); ?>" value="<?php $this->remember('mail'); ?>" />
	    <label for="mail"><?php _e('邮箱'); ?><?php if ($this->options->commentsRequireMail): ?><span class="required">*</span><?php endif; ?></label>
    	  </p>
    	  <p>
    	    <input type="url" name="url" id="url" class="text" placeholder="<?php _e('BlogSite'); ?>" value="<?php $this->remember('url'); ?>" />
	    <label for="url"><?php _e('站点'); ?><?php if ($this->options->commentsRequireURL): ?><span class="required">*</span><?php endif; ?></label>
    	  </p>
        <?php endif; ?>
    	<p>
          <textarea rows="8" cols="50" name="text" class="textarea" placeholder="Markdown Enabled" required><?php $this->remember('text'); ?></textarea>
    	</p>
    	<p>
          <button id="submit-button" type="submit" class="button submit"><?php _e('提交评论'); ?></button>
          <?php if(!$this->user->hasLogin()) { GeeTest_Plugin::output(); } ?>
        </p>
	<div class="clear"></div>
      </form>
    </div>
  <?php endif; ?>
</div>
