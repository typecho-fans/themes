<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
    if ($comments->url) {
        $author = '<a href="' . $comments->url . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
?>
<li id="li-<?php $comments->theId(); ?>" class="comment<?php 
if ($comments->_levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass; 
?>">
    <div id="<?php $comments->theId(); ?>" class="comment-body">
        <div class="comment-author">
            <?php if ($comments->levels > 0): ?><?php $comments->gravatar('30', 'http://1.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536%3Fs%3D40?s=30&r=G'); ?><?php else: ?><?php $comments->gravatar('50', 'http://1.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536%3Fs%3D40?s=50&r=G'); ?><?php endif; ?>
            <cite class="fn"><?php echo $author; ?></cite>
            <?php commentApprove($comments, $comments->mail); ?>
        </div>
        <?php $comments->content(); ?>

        <div class="comment-footer">
            <span class="comment-date" title="<?php $comments->date('Y年m月d日 H:i:s'); ?>"><a href="<?php $comments->permalink(); ?>"><?php $comments->dateword(); ?></a></span>
            <span class="reply"><?php $comments->reply(); ?></span>
        </div>
    </div>
<?php if ($comments->children) { ?>
    <div class="children">
                                <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>
                <section id="comments">
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
                    <h3><?php $this->commentsNum(_t('0 comments'), _t('1 comments'), _t('%d comments')); ?></h3>
                    <div class="double-line"></div>
                    <?php $comments->listComments(); ?>

                    <nav class="comment-navigation">
                        <?php $comments->pageNav(); ?>

                    </nav>
<?php endif; ?>
<?php if($this->allow('comment')): ?>
                    <div id="<?php $this->respondId(); ?>" class="respond">
                        <div class="cancel-comment-reply"><?php $comments->cancelReply(); ?></div>
                        <h3 id="response">Leave a comment</h3>
                        <div class="double-line"></div>
                        <form method="post" action="<?php $this->commentUrl() ?>" id="comment_form">
<?php if($this->user->hasLogin()): ?>
                            <p>Welcome Back ! <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
<?php else: ?>
                            <p>
                                <label for="author"><small><?php _e('昵称 *'); ?></small></label>
                                <input type="text" name="author" id="author" required="true" size="22" value="<?php $this->remember('author'); ?>" placeholder="必填" />
                            </p>
                            <p>
                                <label for="mail"><small><?php _e('邮箱 *'); ?></small></label>
                                <input type="email" name="mail" id="mail" required="true" size="22" value="<?php $this->remember('mail'); ?>" placeholder="必填" />
                            </p>
                            <p>
                                <label for="url"><?php _e('网站'); ?><?php if ($this->options->commentsRequireURL): ?><span class="required">*</span><?php endif; ?></label>
                                <input type="url" name="url" id="url" size="22" value="<?php $this->remember('url'); ?>" placeholder="选填，请带 http://" />
                            </p>
<?php endif; ?>
                            <p><textarea name="text" required="true" cols="58" rows="10" onkeydown="if(event.ctrlKey&&event.keyCode==13) {document.getElementById('submit').click();return false};"><?php $this->remember('text'); ?></textarea></p>
                            <p>
                                <input type="submit" value="<?php _e('提交(Ctrl+Enter)'); ?>" id="submit" />
                            </p>
                        </form>
                    </div>
<?php endif; ?>
                </section>
