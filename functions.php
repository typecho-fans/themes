<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * 显示上一篇
 *
 * @access public
 * @param string $default 如果没有上一篇,显示的默认文字
 * @return void
 */
function thePrev($widget, $default = NULL)
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
    $link = '<a href="' . $content['permalink'] . '" title="' . $content['title'] . '">&laquo 上一篇</a>';
    echo $link;
  } else {
    echo $default;
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
	    ->where('table.contents.created < ?', $widget->created)
	    ->where('table.contents.status = ?', 'publish')
	    ->where('table.contents.type = ?', $widget->type)
	    ->where('table.contents.password IS NULL')
	    ->order('table.contents.created', Typecho_Db::SORT_DESC)
	    ->limit(1);
  $content = $db->fetchRow($sql);

  if ($content) {
    $content = $widget->filter($content);
    $link = '<a href="' . $content['permalink'] . '" title="' . $content['title'] . '">下一篇 &raquo;</a>';
    echo $link;
  } else {
    echo $default;
  }
}

function themeConfig($form) {  
  $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
                                                                  array('ShowCategory' => _t('显示分类'),
                                                                        'ShowTagClouds' => _t('显示标签云'),
                                                                        'ShowLinks' => _t('显示友链'),
                                                                        'ShowOther' => _t('显示其它杂项')),
                                                                  array('ShowCategory', 'ShowTagClouds', 'ShowLinks', 'ShowOther'), _t('侧边栏显示'));
  $form->addInput($sidebarBlock->multiMode());
}
