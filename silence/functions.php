<?php
/**
 * Silence functions
 * @author ShingChi
 * @update 2012-06-01
 */
function themeConfig($form) {

    /** 侧栏开关 */
    $sidebarDisplay = new Typecho_Widget_Helper_Form_Element_Radio('sidebarDisplay', 
    array(
        'full' => _t('无侧栏'), 
        'right' => _t('右侧栏'), 
        'left' => _t('左侧栏')
        ), 
    'full', 
    _t('侧栏开启'));
    
    $form->addInput($sidebarDisplay);
    
    /** 侧栏项目 */
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array(
        'ShowRecentPosts' => _t('显示最新文章'),
        'ShowRecentComments' => _t('显示最近回复'),
        'ShowCategory' => _t('显示分类'),
        'ShowArchive' => _t('显示归档'),
        'ShowSearch' => _t('显示搜索')
        ), 
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowSearch'), 
    _t('侧边栏项目'));
    
    $form->addInput($sidebarBlock);
    
    /** 底部开关 */
    $footerDisplay = new Typecho_Widget_Helper_Form_Element_Radio('footerDisplay', 
    array(
        'display' => _t('显示'),  
        'close' => _t('关闭')
        ), 
    'display', 
    _t('底部开启'));
    
    $form->addInput($footerDisplay);
    
    /** 底部项目 */
    $footerBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('footerBlock', 
    array(
        'FooterPosts' => _t('显示最新文章'),
        'FooterComments' => _t('显示最近回复'),
        'FooterCategory' => _t('显示分类'),
        'FooterTags' => _t('显示标签'),
        'FooterSearch' => _t('显示搜索'),
        'FooterMisc' => _t('显示其它杂项')
        ), 
    array('FooterComments', 'FooterCategory', 'FooterTags', 'FooterMisc'), 
    _t('底部项目'),
    _t('<span style="margin-left: 2px; color: red; font-family: Microsoft YaHei;">任选四个，否则会错位！</span>'));
    
    $form->addInput($footerBlock);
    
    /** 色系配置 by doudou */
    $css = new Typecho_Widget_Helper_Form_Element_Radio('css', 
    array(
        'chocolate' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: #D74A38; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'orangered' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(235, 104, 65); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'crimson' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: #DB001B; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'paleviolet' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: #CF1B75; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'indianred' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(189, 21, 80); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'rosybrown' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(176, 85, 116); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'mediumsea' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(140, 178, 82); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'seagreen' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(0, 168, 81); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'slategray' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(112, 176, 160); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span><br />'),
        'cornflower' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(41, 179, 208); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'steelblue' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(22, 147, 165); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'royalblue' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(42, 143, 189); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'blueviolet' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(37, 126, 168); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'lightsea' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(145, 153, 153); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'darkgray' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(79, 78, 87); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'teal' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(85, 98, 112); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'mediumtur' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(106, 145, 153); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'darktur' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: rgb(140, 119, 143); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>')
        ),
    'chocolate',
    _t('主题配色'));
    
    $form->addInput($css);
    
    //背景色配置
    $background = new Typecho_Widget_Helper_Form_Element_Radio('background', 
    array(
        'whiteSmoke' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: whiteSmoke; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        '#F0ECE3' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: #F0ECE3; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        '#E5E5E5' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: #E5E5E5; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        '#CCC' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: #CCC; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        '#999' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: #999; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        '#828282' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: #828282; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        '#5B5B5B' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: #5B5B5B; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'black' => _t('<span style="display: inline-block; width: 24px; height: 15px; background-color: black; -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>')
        ),
    '#F0ECE3',
    _t('背景颜色'));
    
    $form->addInput($background);
    
    //背景花纹配置
    $options = Typecho_Widget::widget('Widget_Options');
    $pattern = new Typecho_Widget_Helper_Form_Element_Radio('pattern', 
    array(
        'pattern' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern1' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern1.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern2' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern2.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern3' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern3.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern4' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern4.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern5' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern5.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern6' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern6.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern7' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern7.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span><br />'),
        'pattern8' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern8.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern9' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern9.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern10' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern10.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern11' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern11.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern12' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern12.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern13' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern13.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern14' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern14.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern15' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern15.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span><br />'),
        'pattern16' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern16.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern17' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern17.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern18' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern18.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern19' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern19.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern20' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern20.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern21' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern21.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern22' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern22.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>'),
        'pattern23' => _t('<span style="display: inline-block; width: 24px; height: 15px; background: white url(' . $options->themeUrl . '/images/pattern_samples/pattern23.png' . '); -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; -moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset; box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.3) inset;"></span>')
        ),
    'pattern',
    _t('背景花纹'));
    
    $form->addInput($pattern);
}

/**
 * 转换中文月份 by ShingChi
 */ 
function dateConvert($month) {
    $month = ltrim($month, 0);
    $monthChar = array(1 => '一', '二', '三', '四', '五', '六', '七', '八', '九', '十', '十一', '十二');
    echo $monthChar[$month];
}

/**
 * 评论者认证
 *
 * @author ShingChi
 * @access public
 * @param str $email 评论者邮址
 * @return viod 
 */
function commentApprove($widget, $email = NULL)
{
    if (empty($email)) return;
    
    //认证用户，再次添加认证用户邮箱
    $handsome = array(
        'xx@126.com', 
        'xx@qq.com', 
        'xx@gmail.com'
    );
    
    if ($widget->authorId == $widget->ownerId) {
        echo '<b class="vip author" title="很帅的博主"></b>';
    } else if (in_array($email, $handsome)) {
        echo '<b class="vip user" title="博主已认证"></b>';
    }
}
