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
    
    $css = new Typecho_Widget_Helper_Form_Element_Radio('css', 
    array(
        'green' => _t('绿色系'),
        'gray' => _t('灰色系'),
        'crimson' => _t('红色系'),
        'blue' => _t('蓝色系'),
        'orange' => _t('橙色系'),
        'yellow' => _t('黄色系')
        ),
    'green',
    _t('配色选择'));
    
    $form->addInput($css->multiMode());
}
