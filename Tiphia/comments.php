<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<section class="comments" id="comments">
    <h2>评论</h2>
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
        <?php $comments->listComments(array('before' => '<ol class="comment-list">', 'after' => '</ol>')); ?>
        <?php $comments->pageNav(); ?>
    <?php else: ?>
        <p>暂无评论</p>
    <?php endif; ?>

    <?php if ($this->allow('comment')): ?>
        <div id="<?php $this->respondId(); ?>" class="respond">
            <div class="cancel-comment-reply"><?php $comments->cancelReply(); ?></div>
            <form class="comment-form" method="post" action="<?php $this->commentUrl(); ?>" id="comment-form" role="form">
                <h3 id="response">提交评论</h3>
                <?php if ($this->user->hasLogin()): ?>
                    <p class="comment-login-identity">以 <strong><?php $this->user->screenName(); ?></strong> 身份评论</p>
                <?php else: ?>
                    <div class="form-row">
                        <input type="text" name="author" id="author" placeholder="昵称" value="<?php $this->remember('author'); ?>" required>
                        <input type="email" name="mail" id="mail" placeholder="邮箱" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>>
                    </div>
                    <input type="url" name="url" id="url" placeholder="网址，可选" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireUrl): ?> required<?php endif; ?>>
                <?php endif; ?>
                <textarea name="text" id="textarea" rows="5" placeholder="写下你的评论" required><?php $this->remember('text'); ?></textarea>
                <button type="submit" class="submit">提交评论</button>
            </form>
        </div>
    <?php else: ?>
        <p>评论已关闭</p>
    <?php endif; ?>
</section>
