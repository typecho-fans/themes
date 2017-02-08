<?php
/**
 * Slanted主题
 *
 * @author     DT27
 * @copyright  Copyright (c) 2016 DT27 (https://dt27.org)
 * @license    GNU General Public License v3.0
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/**
 * 分类
 */
if ( ! function_exists( 'getCats' ) ) {
    function getCats()
    {
        $categories = Typecho_Widget::widget('Widget_Metas_Category_List', NULL, NULL, true);
        $categoryStructs = array();
        while ($categories->next()) {
            $categoryStructs[] = array(
                'id' => $categories->mid,
                'parentId' => $categories->parent,
                'name' => $categories->name,
                'url' => $categories->permalink,
            );
        }
        return $categoryStructs;
    }
}

/**
 * 页面
 */
if ( ! function_exists( 'getPags' ) ) {
    function getPags()
    {
        $pages = Typecho_Widget::widget('Widget_Contents_Page_Admin', NULL, NULL, true);;
        $pageStructs = array();
        while ($pages->next()) {
            $pageStructs[] = array(
                'id' => $pages->cid,
                'name' => ($pages->fields->shotTitle ? $pages->fields->shotTitle : $pages->title),
                'url' => $pages->permalink,
            );
        }
        return $pageStructs;
    }
}
function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 网站头部标题将以图片显示'));
    $form->addInput($logoUrl);


    /**
     * 底部动态栏
     */
    $dark = new Typecho_Widget_Helper_Form_Element_Select('dark',
        array(
            '0' => _t('蓝白'),
            '1' => _t('红黑')
        ), '0', _t('主题配色'), NULL);

    $form->addInput($dark->multiMode());


    $activeTopSocialLinks = new Typecho_Widget_Helper_Form_Element_Radio('activeTopSocialLinks',
        array(
            '1' => '是',
            '0' => '否',
        ),'1', _t('是否在页面头部显示个人社交链接'), NULL);
    $form->addInput($activeTopSocialLinks);

    $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, NULL, _t('新浪微博'), _t('请输入你的新浪微博个性域名，例如：<strong style="color: red;">http://weibo.com/dt27</strong>，如果没有<a href="http://account.weibo.com/set/index?topnav=1&wvr=6" target="_blank">点此申请</a>'));
    $form->addInput($weibo);
    $qq = new Typecho_Widget_Helper_Form_Element_Text('qq', NULL, NULL, _t('QQ'), _t('请输入你的QQ通讯组件网址，例如：&lta target="_blank" href="<strong style="color: red;">http://sighttp.qq.com/authd?IDKEY=50db05c40debf88f20a03b0bcba4009080799fe5402a2b2c</strong>"&gt，如果没有<a href="http://shang.qq.com/v3/widget.html" target="_blank">点此查看</a>'));
    $form->addInput($qq);
    $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, NULL, _t('GitHub'), _t('请输入 GitHub 用户名'));
    $form->addInput($github);
    $googlePlus = new Typecho_Widget_Helper_Form_Element_Text('googlePlus', NULL, NULL, _t('Google Plus'), _t('请登录 <a href="https://plus.google.com/" target="_blank">Google Plus</a>，打开您的个人资料页，将地址栏中的<strong style="color: red;">数字</strong>填入此项，例如：https://plus.google.com/<strong style="color: red;">110361832835576626140</strong>/posts'));
    $form->addInput($googlePlus);
    $facebook = new Typecho_Widget_Helper_Form_Element_Text('facebook', NULL, NULL, _t('Facebook'), _t('请输入你的 Facebook 用户名，例如：https://www.facebook.com/<strong style="color: red;">DT27Base</strong>，<a href="https://www.facebook.com/settings?tab=account&view" target="_blank">点此查看</a>'));
    $form->addInput($facebook);
    $twitter = new Typecho_Widget_Helper_Form_Element_Text('twitter', NULL, NULL, _t('Twitter'), _t('请输入你的 Twitter 用户名，例如：https://twitter.com/<strong style="color: red;">DT_27</strong>，<a href="https://twitter.com/settings/account" target="_blank">点此查看</a>'));
    $form->addInput($twitter);
    $steam = new Typecho_Widget_Helper_Form_Element_Text('steam', NULL, NULL, _t('Steam'), _t('请输入你的 Steam 用户名'));
    $form->addInput($steam);




    $authorAvatar = new Typecho_Widget_Helper_Form_Element_Text('authorAvatar', NULL, NULL, _t('作者头像'), _t('在这里填入一个图片URL地址, 将以圆形状态显示到网站顶部'));
    $form->addInput($authorAvatar);

    $heading = new Typecho_Widget_Helper_Form_Element_Text('heading', NULL, '我的博客', _t('首页头部主文字'));
    $form->addInput($heading);

    $subheading = new Typecho_Widget_Helper_Form_Element_Text('subheading', NULL, '最新文章', _t('首页头部副文字'));
    $form->addInput($subheading);

    $isExcerpt = new Typecho_Widget_Helper_Form_Element_Radio('isExcerpt',
        array(
            '0' => '默认',
            '1' => '文本截取',
        ),'1', _t('文章列表文章摘要内容'), _t('Typecho 默认方式根据<!--more-->标签截取内容，文本截取则仅截取设定长度的纯文本内容'));
    $form->addInput($isExcerpt);

    $excerptLength = new Typecho_Widget_Helper_Form_Element_Text('excerptLength', NULL, 200, _t('文章摘要截取长度'), _t('仅在摘要内容选择文本截取时起作用'));
    $form->addInput($excerptLength);


    $activeViews = new Typecho_Widget_Helper_Form_Element_Radio('activeViews',
        array(
            '1' => '启用',
            '0' => '禁用',
        ),'0', _t('是否启用文章浏览量显示'), _t('未安装浏览量插件的，直接启用本选项即可<br>已经装有浏览量插件的，请确认该插件使用"views"字段，然后直接关闭该插件并启用本选项即可<br>其他情况请自行判断处理'));
    $form->addInput($activeViews);

    $isShare = new Typecho_Widget_Helper_Form_Element_Radio('isShare',
        array(
            '1' => '是',
            '0' => '否',
        ),'1', _t('是否启用文章及独立页面百度分享模块'), NULL);
    $form->addInput($isShare);

    $sidebarLocation = new Typecho_Widget_Helper_Form_Element_Radio('sidebarLocation',
        array(
            '0' => '左',
            '1' => '右',
            '-1' => '禁用',
        ),'1', _t('侧边栏位置'));
    $form->addInput($sidebarLocation);




    $startYear = new Typecho_Widget_Helper_Form_Element_Text('startYear', NULL, NULL, _t('站点建立年份'), _t('在这里填入一个四位数字年份, 将补充到站点底部版权信息'));
    $form->addInput($startYear);


    $statCode = new Typecho_Widget_Helper_Form_Element_Textarea('statCode', NULL, NULL, _t('统计代码'), _t('在这里填入统计相关代码, 将自动隐藏加载到前台所有页面底部'));
    $form->addInput($statCode);

    /**
     * 导航栏
     */
    $categoryStructs = getCats();
    foreach($categoryStructs as $cat){
        $cats['cat-'.$cat['id']]=_t($cat['name']);
    }
    $pageStructs = getPags();
    foreach($pageStructs as $page){
        $pags['page-'.$page['id']]=_t($page['name']);
    }
    /* 设置导航默认显示所有单页面 */
    $pages = getPags();
    foreach($pages as $p){
        $pgs[]='page-'.$p['id'];
    }
    $home = array('home' => _t('首页'));
    $pgs[]='home';
    $navBar = new Typecho_Widget_Helper_Form_Element_Checkbox('navBar',
        array_merge(array_merge($home,$cats),$pags),$pgs
        , _t('导航栏显示'), _t('选择要显示在导航栏中的项目'));

    $form->addInput($navBar->multiMode());

    /* 增加自定义导航菜单 */
    $customNav = new Typecho_Widget_Helper_Form_Element_Textarea('customNav', NULL, NULL, _t('添加自定义导航菜单'), _t('向顶部导航栏添加自定义项目，可添加多条<br>单条格式:<br>&lt;li class="menu-item menu-item-type-taxonomy menu-item-object-category"&gt;&lt;a href="连接地址"&gt;菜单名&lt;/a&gt;&lt;/li&gt;'));
    $form->addInput($customNav);


    /**
     * 侧边栏
     */
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowRecentPosts' => _t('显示最新文章'),
    'ShowRecentComments' => _t('显示最近回复'),
    'ShowCategory' => _t('显示分类'),
    'ShowArchive' => _t('显示归档'),
    'ShowOther' => _t('显示其它杂项')),
    array('ShowRecentPosts', 'ShowRecentComments', 'ShowCategory', 'ShowArchive', 'ShowOther'), _t('侧边栏显示'));
    
    $form->addInput($sidebarBlock->multiMode());


    /**
     * 底部动态栏
     */
    $footerWidgets = new Typecho_Widget_Helper_Form_Element_Select('footerWidgets',
    array('1' => _t('1'),'2' => _t('2'),'3' => _t('3'),'4' => _t('4')), '3', _t('底部动态栏显示个数')
    );

    $form->addInput($footerWidgets->multiMode());

}

/**
 * 显示导航
 * @param $form
 */
if ( ! function_exists( 'showNavBar' ) ) {
    function showNavBar($form)
    {
        $categoryStructs = getCats();
        $pageStructs = getPags();
        $outHtml = '<ul class="nav group" id="menu-topbar-menu">';

        //首页
        if (in_array('home', Helper::options()->navBar)) {
            $outHtml .= '<li id="menu-item-0" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-0' . ($form->is('index') ? ' current-menu-item current_page_item' : '') . '"><a href="/">首页</a></li>';
        }

        $navBarItems = Helper::options()->navBar;
        $iC = false;
        foreach($categoryStructs as $k => $v){
            if(in_array('cat-'.($v['id']),$navBarItems)){
                $iC = true;
            }
        }
        //分类
        if($iC) {
            $outHtml .= '<li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1' . (($form->is('category')) ? ' current-menu-item' : '').'" id="menu-item-1"><a href="#">分类</a>
<ul class="sub-menu">
	';
            foreach ($categoryStructs as $cat) {
                if (in_array('cat-' . $cat['id'], Helper::options()->navBar)) {
                    $outHtml .= '<li class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-'.$cat['id'].'" id="menu-item-' . $cat['id'] . '"><a href="' . $cat['url'] . '">' . $cat['name'] . '</a></li>';
                }
            }

            $outHtml .= '</ul></li>';
        }

        //独立页面
        foreach ($pageStructs as $pag) {
            if (in_array('page-' . $pag['id'], Helper::options()->navBar)) {
                $outHtml .= '<li id="menu-item-' . $pag['id'] . '" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-' . $pag['id'] . (($form->theId==('page-'.$pag['id'])) ? ' current-menu-item' : '') .'"><a href="' . $pag['url'] . '">' . $pag['name'] . '</a></li>';
            }
        }
        return $outHtml . Helper::options()->customNav . '</ul>';
    }
}

if (!function_exists('showSocialLinks')) {
    function showSocialLinks()
    {
        echo '<ul class="social-links">';
        if (Helper::options()->weibo) {
            echo '<li><a rel="nofollow" title="新浪微博" class="social-tooltip" href="' . Helper::options()->weibo . '" target="_blank"><i class="fa fa-weibo"></i></a></li>';
        }
        if (Helper::options()->qq) {
            echo '<li><a rel="nofollow" title="QQ" class="social-tooltip" href="' . Helper::options()->qq . '" target="_blank"><i class="fa fa-qq"></i></a></li>';
        }
        if (Helper::options()->github) {
            echo '<li><a rel="nofollow" title="GitHub" class="social-tooltip" href="https://github.com/' . Helper::options()->github . '" target="_blank"><i class="fa fa-github"></i></a></li>';
        }
        if (Helper::options()->googlePlus) {
            echo '<li><a rel="nofollow" title="Google Plus" class="social-tooltip" href="https://plus.google.com/' . Helper::options()->googlePlus . '" target="_blank"><i class="fa fa-google"></i></a></li>';
        }
        if (Helper::options()->facebook) {
            echo '<li><a rel="nofollow" title="Facebook" class="social-tooltip" href="https://www.facebook.com/' . Helper::options()->facebook . '" target="_blank"><i class="fa fa-facebook"></i></a></li>';
        }
        if (Helper::options()->twitter) {
            echo '<li><a rel="nofollow" title="Twitter" class="social-tooltip" href="https://twitter.com/' . Helper::options()->twitter . '" target="_blank"><i class="fa fa-twitter"></i></a></li>';
        }
        if (Helper::options()->steam) {
            echo '<li><a rel="nofollow" title="Steam" class="social-tooltip" href="http://steamcommunity.com/id/' . Helper::options()->steam . '" target="_blank"><i class="fa fa-steam"></i></a></li>';
        }
        echo '<li><a href="' . Helper::options()->feedUrl . '" title="RSS Feed" class="social-tooltip" rel="nofollow"><i class="fa fa-rss"></i></a></li>';
        echo '</ul>';
    }
}

/*  Site name/logo
/* ------------------------------------ */
if ( ! function_exists( 'siteTitle' ) ) {

    function siteTitle($from) {

        // Text or image?
        if ( Helper::options()->logoUrl ) {
            $logo = '<img src="'.Helper::options()->logoUrl.'" alt="'.Helper::options()->title.'">';
        } else {
            $logo = Helper::options()->title;
        }

        $link = '<a href="'.Helper::options()->siteUrl.'" rel="home" title="'.Helper::options()->title.'">'.$logo.'</a>';

        if ( $from->is('post') ) {
            $sitename = '<p class="site-title">'.$link.'</p>'."\n";
        } else {
            $sitename = '<h1 class="site-title">'.$link.'</h1>'."\n";
        }

        return $sitename;
    }

}

/*  首页 title
/* ------------------------------------ */
if ( ! function_exists( 'blogTitle' ) ) {

    function blogTitle() {
        $heading = Helper::options()->heading;
        $subheading = Helper::options()->subheading;
        if($heading) {
            $title = $heading;
        } else {
            $title = Helper::options()->name;
        }
        if($subheading) {
            $title = $title.' <span>'.$subheading.'</span>';
        }

        return $title;
    }

}

/*  独立页面 title
/* ------------------------------------ */
if ( ! function_exists( 'singleTitle' ) ) {

    function singleTitle($post) {
        $heading = $post->fields->heading;
        $subheading = $post->fields->subheading;

        if($heading!='')
            $title = $heading;
        else
            $title = $post->title;
        if($subheading!='') {
            $title = $title.' <span>'.$subheading.'</span>';
        }

        return $title;
    }

}


/*  动态栏
/* ------------------------------------ */
if ( ! function_exists( 'dynamicSidebar' ) ) {
    function dynamicSidebar($sidebarName)
    {
        if($sidebarName=='footer-1'){
            echo '<div class="widget widget_recent_comments" id="recent-comments-2"><h3 class="group"><span>最近评论</span></h3><ul id="recentcomments">';
            $comments = Typecho_Widget::widget('Widget_Comments_Recent', 'pageSize=5');
            while ($comments->next()) {
                echo '<li class="recentcomments"><span class="comment-author-link">'.$comments->author.'</span> <a href="'.$comments->parentContent['permalink'].'#comments">';
                $comments->excerpt(50);
                echo '</a></li>';
            }
            echo '</ul></div>';
        }else if($sidebarName=='footer-2'){
            echo '<div class="widget widget_recent_entries" id="recent-posts-2"><h3 class="group"><span>最新文章</span></h3><ul>';
            Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize=5')
                ->parse('<li><a href="{permalink}">{title}</a></li>');
            echo '</ul></div>';
        }else if($sidebarName=='footer-3'){
            echo '<div class="widget widget_hot_entries" id="hot-posts-2"><h3 class="group"><span>最热文章</span></h3><ul>';
            SlantedExtend_Plugin::theMostViewed(5, 0);
            echo '</ul></div>';
        }

    }
}


/*  判断动态栏是否显示
/* ------------------------------------ */
if ( ! function_exists( 'isActiveSidebar' ) ) {
    function isActiveSidebar($sidebarName)
    {
        if($sidebarName=='footer-1'){
            return true;
        }
        if($sidebarName=='footer-2'){
            return true;
        }
        if($sidebarName=='footer-3'){
            return true;
        }
    }
}
/*  判断是否 HTTPS
/* ------------------------------------ */
if ( ! function_exists( 'is_HTTPS' ) ) {
    function is_HTTPS()
    {
        if (!isset($_SERVER['HTTPS'])) return FALSE;
        if ($_SERVER['HTTPS'] === 1) {  //Apache
            return TRUE;
        } elseif ($_SERVER['HTTPS'] === 'on') { //IIS
            return TRUE;
        } elseif ($_SERVER['SERVER_PORT'] == 443) { //其他
            return TRUE;
        }
        return FALSE;
    }
}