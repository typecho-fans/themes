<div id="comments" class="comments-area">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    <h2 class="comments-title">
	   《<span><?php $this->archiveTitle('', '', ''); ?></span>》上<?php $this->commentsNum(_t('暂无评论'), _t('有一条评论'), _t('有 %d 条评论')); ?>
    </h2>
            
    <?php $comments->pageNav('上一页', '下一页', 5, '<a></a>'); ?>
        <style type="text/css">	.page-navigator { padding:20px 0; }</style>
        <script type="text/javascript">
			if($('page-navigator').length > 0) {
				var li = $('li', $('page-navigator'));
				$.each(li, function(i, item) {
					var c = $('a', item).html();
					if(c !='上一页' && c != '下一页')	item.css('display', 'none');	
				});
			}
		</script>
            
        <?php $comments->listComments(); ?>
            
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
        






    <div class="comment-respond" id="<?php $this->respondId(); ?>">
        <h3 id="reply-title" class="comment-reply-title">
            发表评论 
            <small>
                <?php $comments->cancelReply('<span id="cancel-comment-reply-link">取消回复</span>'); ?>
            </small>
        </h3>
        <form method="post" action="<?php $this->commentUrl() ?>" id="commentform" class="comment-form">
        <?php if($this->user->hasLogin()): ?>
            <p>以<a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>的身份登录。<a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('登出？'); ?></a></p>
        <?php else: ?>
            <p class="comment-notes">电子邮件地址不会被公开。 必填项已用 <span class="required">*</span> 标注</p>							
            <p class="comment-form-author">
                <label for="author">姓名 <span class="required">*</span></label> 
                <input id="author" name="author" type="text" value="<?php $this->remember('author'); ?>" size="30" aria-required="true">
            </p>
            <p class="comment-form-email">
                <label for="email">电子邮件<?php if ($this->options->commentsRequireMail): ?><span class="required">*</span><?php endif; ?></label> 
                <input id="email" name="mail" type="text" value="<?php $this->remember('mail'); ?>" size="30" aria-required="true">
            </p>
            <p class="comment-form-url">
                <label for="url">站点<?php if ($this->options->commentsRequireURL): ?><span class="required">*</span><?php endif; ?></label>
                <input id="url" name="url" type="text" value="<?php $this->remember('url'); ?>" size="30">
            </p>
        <?php endif; ?>
            <p class="comment-form-comment">
                <label for="comment">评论</label>
                <textarea id="comment" name="text" cols="45" rows="8" aria-required="true"><?php $this->remember('text'); ?></textarea>
            </p>						
            <p class="form-submit">
                <!--<p style="float:right;"><?php //Captcha_Plugin::output(); ?></p>-->
                <input name="submit" type="submit" id="submit" value="发表评论">
            </p>
        </form>
    </div>
<?php else: ?>
	<p><?php _e('评论已关闭'); ?></p>
<?php endif; ?>

</div>

            