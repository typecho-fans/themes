<?php
function themeConfig($form) {
    $headerImage = new Typecho_Widget_Helper_Form_Element_Text('headerImage', NULL, NULL, _t('顶部头像'), _t('在这里，输入您需要在顶部显示的图片的URL地址。
图像宽度应大于<b>1260像素</b>。 建议宽度<b>1260像素</b>。 建议高度<b>240像素</b>。'));
    $form->addInput($headerImage);

    $headerTitle = new Typecho_Widget_Helper_Form_Element_Checkbox('headerTitle', array('title' => _t('将顶部文字和图像一并显示。')), array('title'), _t('顶部文本'));
    $form->addInput($headerTitle);

    $headerTitleColor = new Typecho_Widget_Helper_Form_Element_Text('headerTitleColor', NULL, NULL, _t('顶部文本颜色'));
    $headerTitleColor->input->setAttribute('class', 'mini');
    $form->addInput($headerTitleColor);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}

function getTotal() {
    $db = Typecho_Db::get();
    return count($db->fetchAll($db->select()->from('table.contents')->where('type= ? AND status= ?', 'post', 'publish')));
}

function pageNavi($prevWord = 'PREV', $nextWord = 'NEXT', $splitPage = 3, $splitWord = '...', $currentClass = 'current', $totalPage, $currentPage, $siteUrl) {
    if($totalPage < 1)
        return;

    $from = max(1, $currentPage - $splitPage);
    $to = min($totalPage, $currentPage + $splitPage);

    //输出上一页
    if($currentPage>1) {
        $prevPage = $currentPage - 1;
        echo "<a class=\"prev page-numbers\" href=\"$siteUrl/page/$prevPage\">$prevWord</a>";   
    }

    //输出第一页
    if($from>1) {
        echo "<a class=\"page-numbers\" href=\"$siteUrl/page/1\">1</a>";
        if($from>2) 
            echo "<span class=\"page-numbers dots\">$splitWord</span>";
    }

    //输出中间页
    for($i=$from; $i<=$to; $i++) {
        if($i != $currentPage) {
            echo "<a class=\"page-numbers\" href=\"$siteUrl/page/$i\">$i</a>";
        } else {
            echo "<span class=\"page-numbers current\">$i</span>";
        }
    }

    //输出最后页
    if($to<$totalPage) {
        if($to<$totalPage-1)
            echo "<span class=\"page-numbers dots\">$splitWord</span>";

        echo "<a class=\"page-numbers\" href=\"$siteUrl/page/$totalPage\">$totalPage</a>";
    }

    //输出下一页
    if($currentPage<$totalPage) {
        $nextPage = $currentPage + 1;
        echo "<a class=\"page-numbers next\" href=\"$siteUrl/page/$nextPage\">$nextWord</a>";
    }
}
?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' bypostauthor';
        } else {
            $commentClass .= ' byuser';
        }
    }
    $commentClass .= ' depth-'.$comments->levels;
    $commentLevelClass = $comments->levels > 0 ? 'children' :  'parent';
?>
 
<li id="li-comment-<?php $comments->theId(); ?>" class="comment comments-area<?php 
echo $commentLevelClass;
$comments->alt(' odd', ' even');
echo $commentClass;
?>">
    <!--$comments->theId(); Dont't modify it!-->
	<article id="<?php $comments->theId(); ?>" class="comment-body">
        <footer class="comment-meta">
            <div class="comment-author vcard">
                <?php $comments->gravatar('34', ''); ?>
                <b class="fn"><?php $comments->author(); ?></b><span class="says">说道：</span>                    
            </div><!-- .comment-author -->
            <div class="comment-metadata">
                <a href="<?php $comments->permalink(); ?>">
                    <time datetime="<?php $comments->date('c'); ?>"><?php $comments->date('Y年m月d日G:i'); ?></time>
                </a>
            </div><!-- .comment-metadata -->
        </footer>
        <div class="comment-content">
            <?php $comments->content(); ?>
        </div>
        <div class="reply">
            <?php $comments->reply('<span class="comment-reply-link">回复</span>'); ?>
        </div>
	</article>
<?php if ($comments->children) { ?>
    <div class="children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>

