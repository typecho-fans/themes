<?php

/**
 * 随机文章
 * @throws Typecho_Db_Exception
 * @throws Typecho_Widget_Exception
 */
function theme_random_posts(){
    $defaults = array(
        'number' => 10,
        'before' => '<ul class="list-group">',
        'after' => '</ul>',
        'xformat' => '<li class="list-group-item clearfix"><a href="{permalink}" title="{title}">{title}</a></li>'
    );
    $db = Typecho_Db::get();
    $rand = "RAND()";
    if (stripos($db->getAdapterName(), 'sqlite') !== false) {
        $rand = "RANDOM()";
    }

    $sql = $db->select()->from('table.contents')
        ->where('status = ?','publish')
        ->where('type = ?', 'post')
        ->where('created <= ' . Helper::options()->gmtTime, 'post') //添加这一句避免未达到时间的文章提前曝光
        ->limit($defaults['number'])
        ->order($rand);
    $result = $db->fetchAll($sql);
    echo $defaults['before'];
    foreach($result as $val){
        $val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
        echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
    }
    echo $defaults['after'];
}
function themeConfig($form) {
    $options = Typecho_Widget::widget('Widget_Options');
    $bgImg = new Typecho_Widget_Helper_Form_Element_Text('bgImg', null, $options->themeUrl('img/bg.jpg', 'GreenGrapes'), _t('首页背景图片地址'), _t('在这里填入一个图片URL地址, 作为首页背景图片, 默认使用img下的header.png'));
    $form->addInput($bgImg);

    $headIcon = new Typecho_Widget_Helper_Form_Element_Text('headerIcon', null, $options->themeUrl('img/head.jpg', 'GreenGrapes'), _t('首页头像地址'), _t('在这里填入一个图片URL地址, 作为首页头像, 默认使用images下的head.png'));
    $form->addInput($headIcon);

    $siteIcon = new Typecho_Widget_Helper_Form_Element_Text('sideName', null, null, _t('侧栏用户名'), _t('在这里填入一个左侧显示的用户名, 默认不显示'));
    $form->addInput($siteIcon);

    $showBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('ShowBlock', array(
        'ShowPostBottomBar' => _t('文章页显示上一篇和下一篇')),
        array('ShowPostBottomBar'), _t('显示设置'));
    $form->addInput($showBlock->multiMode());
}

/**
 * 重写评论显示函数
 */
function threadedComments($comments, $options){
    $singleCommentOptions = $options;
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
<li itemscope itemtype="http://schema.org/UserComments" id="<?php $comments->theId(); ?>" class="comment-li<?php
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">

    <div class="comment-author" itemprop="creator" itemscope itemtype="http://schema.org/Person">
        <span itemprop="image"><?php $comments->gravatar($singleCommentOptions->avatarSize, $singleCommentOptions->defaultAvatar); ?></span>

    </div>
    <div class="comment-body">
        <cite class="fn" itemprop="name"><?php $singleCommentOptions->beforeAuthor();
            $comments->author();
            $singleCommentOptions->afterAuthor(); ?></cite>
        <div class="comment-content" itemprop="commentText">
            <?php $comments->content(); ?>
        </div>
        <div class="comment-footer">
            <time itemprop="commentTime" datetime="<?php $comments->date('c'); ?>"><?php $singleCommentOptions->beforeDate();
                $comments->date($singleCommentOptions->dateFormat);
                    $singleCommentOptions->afterDate(); ?></time>
            <?php $comments->reply($singleCommentOptions->replyWord); ?>
        </div>
    </div>
    <?php if ($comments->children) { ?>
        <div class="comment-children" itemprop="discusses">
            <?php $comments->threadedComments(); ?>
        </div>
    <?php } ?>
    
    
</li>
<?php

}