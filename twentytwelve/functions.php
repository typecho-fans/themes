<?php

function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
    $form->addInput($logoUrl);
    
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());
}

?>

<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' commentbyauthor';
        } else {
            $commentClass .= ' commentbyuser';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' :  'comment-parent';
?>
 
<li id="li-comment-<?php $comments->theId(); ?>" class="comment comments-area<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">

	<article id="<?php $comments->theId(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php $comments->gravatar('40', ''); ?>
                <cite class="fn">
                	<?php $comments->author(); ?> 
                </cite>
                <a href="<?php $comments->permalink(); ?>">
                	<time datetime="<?php $comments->date('c'); ?>">
                    	<?php $comments->date('Y年m月d日G:i'); ?>
                    </time>
                </a>			
            </header>
			<section class="comment-content comment">
				<?php $comments->content(); ?>
            </section>
			<div class="reply">
				<?php 
					$comments->reply('回复'); 
					_e('<span>↓</span>');
				?>
                
            </div>
		</article>
<?php if ($comments->children) { ?>
    <div class="children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php } ?>