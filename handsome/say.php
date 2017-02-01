<?php 
$GLOBALS['z']  = $this->options->CDNURL;
$GLOBALS['timechoice'] = $this->options->langis;
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
        } else {
            $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
        }
    } 
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级
?>
 
<!--自定义评论代码结构-->
    <div id="<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->_levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt('comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass; 
?>">
        <?php
        //头像CDN by Rich http://forum.typecho.org/viewtopic.php?f=5&t=6165&p=29961&hilit=gravatar#p29961
            $host = $GLOBALS['z'];//自定义头像CDN服务器
            $url = '/avatar/';//自定义头像目录,一般保持默认即可
            $size = '80';//自定义头像大小
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
            $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
        ?>

          <a class="pull-left thumb-sm avatar m-l-n-md">
            <img src="<?php echo $avatar ?>">
          </a>

          <div class="m-l-lg m-b-lg">
            <div class="m-b-xs">
              <a href="" class="h4"><?php $comments->author(); ?></a>
              <span class="text-muted m-l-sm pull-right">
                <?php if($GLOBALS['timechoice'] == '0'): ?><?php $comments->date("F jS, Y \a\t h:i a"); ?><?php elseif($GLOBALS['timechoice'] == '1'): ?><?php $comments->date('Y 年 m 月 d 日 h 时 i 分 A'); ?><?php elseif($GLOBALS['timechoice'] == '2'): ?><?php $comments->date('Y 年 m 月 d 日 h 时 i 分 A'); ?><?php endif; ?>
              </span>
            </div>
            <div class="m-b">
              <div class="m-b words_contents"><?php $comments->content(); ?></div>
            </div>
          </div>

      <!-- 单条评论者信息及内容 -->
    </div><!--匹配`自定义评论的代码结构`下面的div标签-->
<?php } ?>

<div id="comments" class="smalltalk">
    <!--如果允许评论，会出现评论框和个人信息的填写-->
    <?php if($this->allow('comment')): ?>
      <!--判断是否登录，只有登陆者才有权利发表说说-->
    <?php if($this->user->hasLogin()): ?>
    <div id="<?php $this->respondId(); ?>" class="respond comment-respond">

    <div class="panel panel-default m-t-md pos-rlt m-b-lg">
    <form id="comment_form" action="<?php $this->commentUrl() ?>" method="post" class="comment-form" role="form">
        <textarea id="comment" class="textarea form-control no-border" name="text" rows="3" maxlength="65525" aria-required="true" required><?php $this->remember('text'); ?></textarea>

      <!--提交按钮-->
      <div class="panel-footer bg-light lter">
        <button type="submit" name="submit" id="submit" class="submit btn btn-info pull-right btn-sm">
          <span class="text">发表新鲜事</span>
          <span class="text-active">提交中...
            <i class="icon-spin iconfont icon-spinner hide" id="spin"></i>
          </span>
        </button>
            <ul class="nav nav-pills nav-sm">
            <li><a id="image-insert" ><i class="iconfont icon-image text-muted"></i></a></li>
            </ul>
        </div>
    </form>
    </div>
    </div>
    <?php else: ?>
    <!--如果没有登录则什么操作按钮都不会显示-->
    <?php endif; ?>
    <?php else: ?>
    <h4>此处评论已关闭</h4>
    <?php endif; ?>
   <?php $this->comments()->to($comments); ?>
   <?php if ($comments->have()): ?>
<div class="streamline b-l b-info m-l-lg m-b padder-v">

    <h4 style="display: none" class="comments-title m-t-lg m-b"><?php $this->commentsNum(_t(' 暂无评论'), _t(' 1 条评论'), _t(' %d 条评论')); ?></h4>
    <?php $comments->listComments(); ?>
</div>
    <nav class="text-center m-b-lg" role="navigation">
        <?php $comments->pageNav('&lt;', '&gt;'); ?>
    </nav>
          <script type="text/javascript">
$(".page-navigator").addClass("pagination pagination-md");
$("#comments .page-navigator").addClass("pagination-sm");
$(".page-navigator .current").addClass("active");
$("#comments .comment-list").addClass("list-unstyled m-b-none");
          </script>
    <?php else: ?>
<div class="streamline b-l b-info m-l-lg m-b padder-v">
    <ol class="comment-list list-unstyled m-b-none"> 
    <div class="comment-body comment-parent comment-odd comment-by-author">
        
          <a class="pull-left thumb-sm avatar m-l-n-md">
            <img src="<?php $this->options->BlogPic(); ?>">
          </a>

          <div class="m-l-lg m-b-lg">
            <div class="m-b-xs">
              <a href="" class="h4"></a><a href="<?php $this->options->siteUrl(); ?>"><?php $this->user->screenName(); ?></a>
              <span class="text-muted m-l-sm pull-right"><?php if($this->options->langis() == '0'): ?><?php echo date("F jS, Y \a\t h:i a",time()+($this->options->timezone - idate("Z"))); ?><?php elseif($this->options->langis == '1'): ?><?php echo date('Y 年 m 月 d 日 h 时 i 分 A',time()+($this->options->timezone - idate("Z"))); ?><?php elseif($this->options->langis == '2'): ?><?php echo date('Y 年 m 月 d 日 h 时 i 分 A',time()+($this->options->timezone - idate("Z"))); ?><?php endif; ?></span>
            </div>
            <div class="m-b">
              <div class="m-b"><p>欢迎你来到「时光机」栏目。在这里你可以记录你的日常和心情。而且，首页的“闲言碎语”栏目会显示最新的三条动态哦！这是默认的第一条说说，当你发布第一条说说的时候，该条动态会自动消失。</p></div>
            </div>
          </div>
    </div>
    </ol>
    </div>
    <?php endif; ?>

</div> 