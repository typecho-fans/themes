<?php

use Utils\Helper;

require_once 'lib/RecentSplitPage.php';
require_once 'lib/ArticleCatalog.php';

/**
 * 随机文章
 * @throws \Typecho\Db\Exception
 * @throws \Typecho\Widget\Exception
 */
function theme_random_posts(){
    $defaults = array(
        'number' => 10,
        'before' => '<ul class="list-group">',
        'after' => '</ul>',
        'xformat' => '<li class="list-group-item clearfix"><a href="{permalink}" title="{title}">{title}</a></li>'
    );
    $db = \Typecho\Db::get();
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
        $val = \Typecho\Widget::widget('\Widget\Base\Contents')->filter($val);
        echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
    }
    echo $defaults['after'];
}

function get_theme_color_array() {
    $arr = array(
        'red' => _t('赤'),
        'orange' => _t('橙'),
        'yellow' => _t('黄'),
        'green' => _t('绿'),
        'cyan' => _t('青'),
        'blue' => _t('蓝'),
        'purple' => _t('紫'),
        'gray' => _t('灰')
    );
    return $arr;
}

/*
 * 返回主题颜色配置
 * return string
 */
function get_theme_color() {
    $key = 'green_grapes_color';
    $options = Helper::options();
    if ($options->allow_user_change_color && isset($_COOKIE[$key])
        && array_key_exists($_COOKIE[$key], get_theme_color_array())) {
        return $_COOKIE[$key];
    }
    $color = $options->themeColor;
    return $color;
}




function themeConfig($form) {
    $options = Helper::options();
    $bgImg = new \Typecho\Widget\Helper\Form\Element\Text('bgImg', null, $options->themeUrl('img/bg.jpg', 'GreenGrapes'), _t('首页背景图片地址'), _t('在这里填入一个图片URL地址, 作为首页背景图片, 默认使用img下的header.png'));
    $form->addInput($bgImg);

    $headIcon = new \Typecho\Widget\Helper\Form\Element\Text('headerIcon', null, $options->themeUrl('img/head.jpg', 'GreenGrapes'), _t('首页头像地址'), _t('在这里填入一个图片URL地址, 作为首页头像, 默认使用images下的head.png'));
    $form->addInput($headIcon);

    $siteIcon = new \Typecho\Widget\Helper\Form\Element\Text('sideName', null, null, _t('侧栏用户名'), _t('在这里填入一个左侧显示的用户名, 默认不显示'));
    $form->addInput($siteIcon);

    $archivePageSize = new \Typecho\Widget\Helper\Form\Element\Text('ArchivePageSize', null, 20, _t('归档页列表数量'), _t('此数目用于指定显示显示归档模板列表数目'));
    $archivePageSize->input->setAttribute('class', 'w-20');
    $form->addInput($archivePageSize);

    $themeColor = new \Typecho\Widget\Helper\Form\Element\Select('themeColor', get_theme_color_array(), 'green', _t('主题颜色'), _t('包括标签的颜色和每篇文章中的颜色'));
    $form->addInput($themeColor);

    $allow_user_change_color = new \Typecho\Widget\Helper\Form\Element\Radio('allow_user_change_color',
        array(0=>_t('拒绝'),1=>_t('允许'),), '1', _t('是否允许用户切换主题色'),_t('浏览者可在右侧切换主题色（仅在该访者上生效）'));
    $form->addInput($allow_user_change_color);

    $showBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox('ShowBlock', array(
        'HiddenHeaderGlobal' => _t('隐藏顶部头像'),
        'HiddenPostBottomBar' => _t('隐藏文章页上一篇和下一篇'),
        'HiddenSidebarRandomArticle' => _t('隐藏侧边栏随机文章'),
        'HiddenSidebarInDetail' => _t('隐藏文章页侧边栏'),
        'HiddenHeaderInDetail' => _t('隐藏文章页顶部头像'),
        'HiddenCategory' => _t('隐藏侧边栏分类'),
        'HiddenArchive' => _t('隐藏侧边栏归档'),
        'HiddenParticle' => _t('隐藏粒子背景动画'),
        'ShowSidebarBlogInfo' => _t('显示侧边栏博客信息'),
        ),
        array('HiddenCategory', 'HiddenArchive'),
        _t('显示设置')
    );
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
