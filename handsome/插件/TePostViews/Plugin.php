<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * 针对handsome主题优化的 热门文章 插件
 * 
 * @package TePostViews
 * @author Suming Blog
 * @version 1.0.0
 * @link https://suming.org
 */
class TePostViews_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        $db = Typecho_Db::get();
        $prefix = $db->getPrefix();
        // contents 表中若无 views 字段则添加
        if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents'))))
            $db->query('ALTER TABLE `'. $prefix .'contents` ADD `views` INT(10) DEFAULT 0;');
        //增加浏览数
        Typecho_Plugin::factory('Widget_Archive')->beforeRender = array('TePostViews_Plugin', 'viewCounter');
        //把新增的字段添加到查询中
        Typecho_Plugin::factory('Widget_Archive')->select = array('TePostViews_Plugin', 'selectHandle');
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
	{
        $delFields = Typecho_Widget::widget('Widget_Options')->plugin('TePostViews')->delFields;
        if($delFields){
            $db = Typecho_Db::get();
            $prefix = $db->getPrefix();
            $db->query('ALTER TABLE `'. $prefix .'contents` DROP `views`;');
        }
	}
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
	{
		$delFields = new Typecho_Widget_Helper_Form_Element_Radio('delFields', 
            array(0=>_t('保留数据'),1=>_t('删除数据'),), '0', _t('卸载设置'),_t('卸载插件后数据是否保留'));
        $form->addInput($delFields);

        $hotNums = new Typecho_Widget_Helper_Form_Element_Text('hotNums', NULL, '8', _t('热门文章数'),_t(''));
        $hotNums->input->setAttribute('class', 'mini');
        $form->addInput($hotNums);

        $sortBy = new Typecho_Widget_Helper_Form_Element_Radio('sortBy', array(0=>_t('浏览数'),1=>_t('评论数'),), '0', _t('排序依据'),_t(''));
        $form->addInput($sortBy);

        $minViews = new Typecho_Widget_Helper_Form_Element_Text('minViews', NULL, '0', _t('最低浏览/评论数'),_t('浏览/评论数低于该值时,不显示在热门文章中, 即使热门文章的数量小于热门文章数'));
        $minViews->input->setAttribute('class', 'mini');
        $form->addInput($minViews);

        $linkClass = new Typecho_Widget_Helper_Form_Element_Text('linkClass', NULL, '', _t('Link Class'),_t('输出的 a 标签的 Class'));
        $linkClass->input->setAttribute('class', 'mini');
        $form->addInput($linkClass);
	}
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 增加浏览量
     * @params Widget_Archive   $archive
     * @return void
     */
    public static function viewCounter($archive){
        if($archive->is('single')){
            $cid = $archive->cid;
            $views = Typecho_Cookie::get('__post_views');
            if(empty($views)){
                $views = array();
            }else{
                $views = explode(',', $views);
            }
            if(!in_array($cid,$views)){
                $db = Typecho_Db::get();
                $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
                $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views']+1))->where('cid = ?', $cid));
                array_push($views, $cid);
                $views = implode(',', $views);
                Typecho_Cookie::set('__post_views', $views); //记录查看cookie
            }
        }
    }
    //cleanAttribute('fields')清除查询字段，select * 
    public static function selectHandle($archive){
        $user = Typecho_Widget::widget('Widget_User');
		if ('post' == $archive->parameter->type || 'page' == $archive->parameter->type) {
            if ($user->hasLogin()) {
                $select = $archive->select()->where('table.contents.status = ? OR table.contents.status = ? OR
                        (table.contents.status = ? AND table.contents.authorId = ?)',
                        'publish', 'hidden', 'private', $user->uid);
            } else {
                $select = $archive->select()->where('table.contents.status = ? OR table.contents.status = ?',
                        'publish', 'hidden');
            }
        } else {
            if ($user->hasLogin()) {
                $select = $archive->select()->where('table.contents.status = ? OR
                        (table.contents.status = ? AND table.contents.authorId = ?)', 'publish', 'private', $user->uid);
            } else {
                $select = $archive->select()->where('table.contents.status = ?', 'publish');
            }
        }
        $select->where('table.contents.created < ?', Typecho_Date::gmtTime());
        $select->cleanAttribute('fields');
        return $select;
	}


    public static function outputHotPosts($hot) {
        $archive = Typecho_Widget::widget('Widget_Archive');
        $pluginOpts = Typecho_Widget::widget('Widget_Options')->plugin('TePostViews');
        $sortBy = $pluginOpts->sortBy;
        $hotNums = $pluginOpts->hotNums;
        $minViews = $pluginOpts->minViews;
        $linkClass = $pluginOpts->linkClass;
        $hotNums = intval($hotNums) <= 0 ? 8 : $hotNums;
        $minViews = intval($minViews) <= 0 ? 0 : $minViews;
        $linkClass = strlen($linkClass) > 0 ? 'class="'.$linkClass.'" ' : '';
        $db = Typecho_Db::get();
        $select = $db->select()->from('table.contents')
            ->where('table.contents.type = ?', 'post')
            ->where('table.contents.status = ?', 'publish')
            ->limit($hotNums);
        if ($sortBy) {// 根据评论数排序
            $select->order("table.contents.commentsNum", Typecho_Db::SORT_DESC);
            if ($minViews > 0) {
                $select->where('table.contents.commentsNum >= ?', $minViews);
            }
        } else { // 根据浏览数排序
            $select->order("table.contents.views", Typecho_Db::SORT_DESC);
            if ($minViews > 0) {
                $select->where('table.contents.views >= ?', $minViews);
            }
        }

        $rows = $db->fetchAll($select);
        foreach ($rows as $row) {
            $row = $archive->filter($row);
            echo '<li class="list-group-item">
                <a href="' . $row['permalink'] . '" class="pull-left thumb-sm m-r">
                <img style="height: 40px!important;width: 40px!important;" src="'.showThumbnail2($hot).'" class="img-circle wp-post-image">
                </a>
                <div class="clear">
                    <h4 class="h5 l-h"> <a href="' . $row['permalink'] . '" title="' . $row['title'] . '"> ' . $row['title'] . ' </a></h4>
                    <small class="text-muted"> 
                    <span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span class="sr-only">评论数：</span> <span class="meta-value"> '.$row['commentsNum'].' </span> 
                    </span>  
                    <span class="meta-date m-l-sm"> <i class="iconfont icon-eye" aria-hidden="true"></i> <span class="sr-only">浏览次数:</span> <span class="meta-value">'.$row['views'].'</span> 
                    </span> 
                    </small>
                    </div>
            </li>';
        }
    }
}
