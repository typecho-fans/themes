<div class="wrap">
    <?php $this->comments()->to($comments); ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>

    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form">
        <?php if($this->user->hasLogin()): ?>
          <a href="javascript:;" id="commentAvatar">
            <img src="<?php
            if ($this->remember('mail', true)) {
              $rating = Helper::options()->commentsAvatarRating;
              $hash   = md5($this->remember('mail', true));
              echo 'https://secure.gravatar.com/avatar/' , $hash , '?s=50' , '&r=' , $rating , '&d=';
            } else {
              $this->options->themeUrl('img/avatar.png');
            }
            ?>" class="avatar" />
          </a>
        <?php else: ?>
          <a href="javascript:;" id="commentAvatar">
            <img src="<?php
              if ($this->remember('mail', true)) {
                $rating = Helper::options()->commentsAvatarRating;
                $hash   = md5($this->remember('mail', true));
                echo 'https://secure.gravatar.com/avatar/' , $hash , '?s=50' , '&r=' , $rating , '&d=';
              } else {
                $this->options->themeUrl('img/avatar.png');
              }
            ?>" class="avatar" />
          </a>
      		<p id="commentPanel" <?php if (!$this->remember('mail', true)) { echo 'style="display: block;"'; } ?>>
        		<input type="text" name="author" id="author" class="text" placeholder="Nick" value="<?php $this->remember('author'); ?>" required />
        		<input type="email" name="mail" id="mail" class="text" placeholder="Email" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
            <input type="url" name="url" id="url" class="text" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
      		  <a class="submit" id="commentPanelClose">提交</a>
          </p>
        <?php endif; ?>
    		<p id="commentArea">
          <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" required ><?php $this->remember('text'); ?></textarea>
          <button type="submit" class="submit"><?php _e('提交评论'); ?></button>
        </p>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
	 <?php if ($comments->have()): ?>
    <div id="comments-list">
      <?php $comments->listComments(); ?></div>
    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    <?php endif; ?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
  <li id="li-<?php $comments->theId(); ?>" class="comment-body<?php
    if ($comments->levels > 0) {
      echo ' comment-child';
      $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
    } else {
      echo ' comment-parent';
    }
    $comments->alt(' comment-odd', ' comment-even');
    echo $commentClass;
  ?>">
    <div id="<?php $comments->theId(); ?>" class="clear">
      <header class="levels<?php $comments->levels();?>">
        <?php
          $rating = Helper::options()->commentsAvatarRating;
          $hash   = md5 ( strtolower ( $comments->mail ) );
          $avatar = 'https://secure.gravatar.com/avatar/' . $hash . '?s=50' . '&r=' . $rating . '&d=';
        ?>
        <img class="avatar" src="<?php echo $avatar ?>">
        <cite class="fn"><em class="authorname"><?php $comments->author(); ?></em>
  			</cite>
      </header>
      <section class="comment-content">
        <?php $comments->content(); ?>
      </section>
      <footer>
        <time><?php $comments->date('Y-m-d H:i'); ?></time>
        <span class="comment-reply"><?php $comments->reply(); ?></span>
      </footer>
    </div>
    <?php if ($comments->children) { ?>
      <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
      </div>
    <?php } ?>
  </li>
<?php } ?>
</div>
