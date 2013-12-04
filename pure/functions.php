<?php
/** 后台模板设置 */
function themeConfig($form) {
    $cdnUrl = new Typecho_Widget_Helper_Form_Element_Text('cdnUrl', NULL, NULL, _t('站点的CDN地址'), _t('填入站点的CDN地址, 请不要带开头的 http: 及最后的斜杠'));
    $form->addInput($cdnUrl);
}

/** 文章显示数目限制 */
function themeInit($archive) {
    if ($archive->is('index') || $archive->is('archive')) {
        $archive->parameter->pageSize = 2;
    }
}

/**
 * 显示下一篇
 * 
 * @access public
 * @param string $default 如果没有下一篇,显示的默认文字
 * @return void
 */
function theNext($widget, $default = NULL)
{
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
              ->where('table.contents.created > ?', $widget->created)
              ->where('table.contents.status = ?', 'publish')
              ->where('table.contents.type = ?', $widget->type)
              ->where('table.contents.password IS NULL')
              ->order('table.contents.created', Typecho_Db::SORT_ASC)
              ->limit(1);
    $content = $db->fetchRow($sql);
 
    if ($content) {
        $content = $widget->filter($content);
        $link = '<a class="next-link" href="' . $content['permalink'] . '" title="' . $content['title'] . '">下一篇　&gt;</a>';
        echo $link;
    } else {
        echo $default;
    }
}
 
/**
 * 显示上一篇
 * 
 * @access public
 * @param string $default 如果没有下一篇,显示的默认文字
 * @return void
 */
function thePrev($widget, $default = NULL)
{
    $db = Typecho_Db::get();
    $sql = $db->select()->from('table.contents')
              ->where('table.contents.created < ?', $widget->created)
              ->where('table.contents.status = ?', 'publish')
              ->where('table.contents.type = ?', $widget->type)
              ->where('table.contents.password IS NULL')
              ->order('table.contents.created', Typecho_Db::SORT_DESC)
              ->limit(1);
    $content = $db->fetchRow($sql);
 
    if ($content) {
        $content = $widget->filter($content);
        $link = '<a class="prev-link" href="' . $content['permalink'] . '" title="' . $content['title'] . '">&lt;　上一篇</a>';
        echo $link;
    } else {
        echo $default;
    }
}
