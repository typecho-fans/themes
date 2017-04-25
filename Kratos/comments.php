<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
function threadedComments($comments, $options) {
    $commentClass = 'commentlist';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';

    if ($comments->url) {
        $author = '<a href="' . $comments->url . '" target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
    } else {
        $author = $comments->author;
    }
?>

<li id="<?php $comments->theId(); ?>" class="comment depth-<?php echo $comments->levels+1; ?><?php
if ($comments->levels > 0) {
    echo '';
    $comments->levelsAlt(' thread-odd', ' thread-even');
} else {
    echo ' parent';
}
$comments->alt(' odd', ' even');
?>">
	<?php
        $host = 'https://secure.gravatar.com';
        $url = '/avatar/';
        $size = '50';
        $rating = Helper::options()->commentsAvatarRating;
        $hash = md5(strtolower($comments->mail));
        $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
    ?>
	<div id="<?php $comments->theId(); ?>" class="comment-body">
		<div class="comment-author vcard">
			<img alt="" src="<?php echo $avatar ?>" srcset="<?php echo $avatar ?> 2x" class="avatar avatar-50 photo" height="50" width="50"><cite class="fn"><?php echo $comments->author; ?></cite><span class="says">说道：</span>
		</div>		
		<div class="comment-meta commentmetadata"><a><?php $comments->date('Y-m-d'); ?></a></div>
		<p><?php $comments->content(); ?></p>
		<div class="reply"><a class="comment-reply-link" href="<?php echo substr($comments->permalink, 0, - strlen($comments->theId) - 1) . '?replyTo=' . $comments->coid .'#' . $comments->parameter->respondId . '" rel="nofollow" onclick="return TypechoComment.reply(\'' .$comments->theId . '\', ' . $comments->coid . ');'?>">回复</a> </div> 
	</div><?php if ($comments->children) { ?>
		<ol class="children">
			<?php $comments->threadedComments($options); ?>
		</ol><!-- .children --><?php } ?>
</li><!-- #comment -->
<?php } ?>


<?php $this->comments()->to($comments); ?>
<div id="comments" class="comments-area">
<?php if ($comments->have()) : ?>
	<ol class="comment-list">
		<?php $comments->listComments(array('before' =>  '','after'  =>  '')); ?>
	</ol>	
	<div id="comments-nav">
		<?php $comments->pageNav('←','→','2','...'); ?>
	</div>
<?php endif; ?>
<script type="text/javascript" language="javascript">
/* <![CDATA[ */
    function grin(tag) {
        var myField;
        tag = ' ' + tag + ' ';
        if (document.getElementById('comment') && document.getElementById('comment').type == 'textarea') {
            myField = document.getElementById('comment');
        } else {
            return false;
        }
        if (document.selection) {
            myField.focus();
            sel = document.selection.createRange();
            sel.text = tag;
            myField.focus();
        }
        else if (myField.selectionStart || myField.selectionStart == '0') {
            var startPos = myField.selectionStart;
            var endPos = myField.selectionEnd;
            var cursorPos = endPos;
            myField.value = myField.value.substring(0, startPos)
                          + tag
                          + myField.value.substring(endPos, myField.value.length);
            cursorPos += tag.length;
            myField.focus();
            myField.selectionStart = cursorPos;
            myField.selectionEnd = cursorPos;
        }
        else {
            myField.value += tag;
            myField.focus();
        }
    }
/* ]]> */
</script>
<div id="<?php $this->respondId(); ?>" class="comment-respond">
<?php if($this->allow('comment')): ?>
	<h4 id="reply-title" class="comment-reply-title">发表评论 <small><?php $comments->cancelReply('取消回复'); ?></small></h4>
	<form action="<?php $this->commentUrl() ?>" method="post" id="commentform" class="comment-form">
		<?php if($this->user->hasLogin()): ?><p class="comment-notes"><span id="email-notes"><?php $this->user->screenName(); ?></span> 欢迎回来。</p>
		<?php else: ?>
		<p class="comment-notes"><span id="email-notes">电子邮件地址不会被公开。</span> 必填项已用<span class="required">*</span>标注</p><?php endif; ?>
		<div class="comment form-group has-feedback"><div class="input-group"><textarea class="form-control" id="comment" placeholder=" " name="text" rows="5" aria-required="true" required="" onkeydown="if(event.ctrlKey){if(event.keyCode==13){document.getElementById('submit').click();return false}};"></textarea></div></div><?php if(!$this->user->hasLogin()): ?>
		<div class="comment-form-author form-group has-feedback"><div class="input-group"><div class="input-group-addon"><i class="fa fa-user"></i></div><input class="form-control" placeholder="昵称" id="author" name="author" type="text" value="" size="30" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; background-repeat: no-repeat;"><span class="form-control-feedback required">*</span></div></div>
		<div class="comment-form-email form-group has-feedback"><div class="input-group"><div class="input-group-addon"><i class="fa fa-envelope-o"></i></div><input class="form-control" placeholder="邮箱" id="mail" name="mail" type="text" value="" size="30"><span class="form-control-feedback required">*</span></div></div>
		<div class="comment-form-url form-group has-feedback"><div class="input-group"><div class="input-group-addon"><i class="fa fa-link"></i></div><input class="form-control" placeholder="网站" id="url" name="url" type="text" value="" size="30"></div></div><?php endif; ?>
		<p class="form-submit"><input name="submit" type="submit" id="submit" class="btn btn-primary" value="发表评论"><?php $security = $this->widget('Widget_Security'); ?>
		<input type="hidden" name="_" value="<?php echo $security->getToken($this->request->getReferer())?>"></p>
	</form>
<?php else: ?>	
<p class="no-comments">文章评论已关闭！</p>
<?php endif; ?>
</div>
</div>
