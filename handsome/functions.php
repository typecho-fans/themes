<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeInit($archive)
{
    Helper::options()->commentsMaxNestingLevels = 999;
}

function themeConfig($form) {
    echo "
    
<style>
@media screen and (min-device-width: 1024px) {
    ::-webkit-scrollbar-track {
        background-color: rgba(255,255,255,0);
    }
    ::-webkit-scrollbar {
        width: 6px;
        background-color: rgba(255,255,255,0);
    }
    ::-webkit-scrollbar-thumb {
        border-radius: 3px;
        background-color: rgba(193,193,193,1);
    }
}
.row {
    margin: 0px;
}
#use-intro {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px;
    padding: 8px;
    padding-left: 20px;
    margin-bottom: 40px;
}
.message{
    background-color:#20af42 !important;
    color:#fff;
}
.success{
    background-color:#20af42;
    color:#fff;
}

#typecho-nav-list{display:none;}
.typecho-head-nav {
    padding: 0 10px; 
    background: #20af42;
}
.typecho-head-nav .operate a{
    border: none;
    padding-top: 0px;
    padding-bottom: 0px;
    color: rgba(255,255,255,.6);
}
.typecho-head-nav .operate a:hover {
    background-color: rgba(0, 0, 0, 0.05);
    color: #fff;
}   
ul.typecho-option-tabs.fix-tabs.clearfix {
    background: #1a9c39;
}
.col-mb-12 {
    padding: 0px!important;
}
.typecho-page-title {
    margin:0;
    height: 70px;
    background: #20af42;
    background-size: cover;
    padding: 30px;
}
.typecho-page-title h2{
    margin: 0px;
    font-size: 2.28571em;
    color: #fff;
}
.typecho-option-tabs{
    padding: 0px;
    background: #fff;
}
.typecho-option-tabs a:hover{
    background-color: rgba(0, 0, 0, 0.05);
    color: rgba(255,255,255,.8);
}
.typecho-option-tabs a{
    border: none;
    height: auto;
    color: rgba(255,255,255,.6);
    padding: 15px;
}
li.current {
    background-color: #FFF;
    height: 4px;
    padding: 0 !important;
    bottom: 0px;
}
.typecho-option-tabs li.current a, .typecho-option-tabs li.active a{
    background:none;
}
.container{
    margin:0;
    padding:0;
}
.body.container {
    min-width: 100% !important;
    padding: 0px;
}
.typecho-option-tabs{
    margin:0;
}
.typecho-option-submit button {
    float: right;
    background: #00BCD4;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    color: #FFF;
}
.typecho-option-tabs li{
    margin-left:20px;
}
.typecho-option{
    border-radius: 3px;
    background: #fff;
    padding: 12px 16px;
}
.col-mb-12{
    padding-left: 0px!important;
}
.typecho-option-submit{
    background:none!important;
}
.typecho-option {
    float: left;
}
.typecho-option span {
    margin-right: 0;
}
.typecho-option label.typecho-label {
    font-weight: 500;
    margin-bottom: 20px;
    margin-top: 10px;
    font-size: 16px;
    padding-bottom: 5px;
    border-bottom: 1px solid rgba(0,0,0,0.2);
}
.typecho-page-main .typecho-option input.text {
    width: 100%;
}
input[type=text], textarea {
    border: none;
    border-bottom: 1px solid rgba(0,0,0,.60);
    outline: none;
    border-radius: 0;
}
.typecho-option-submit {
    position: fixed;
    right: 32px;
    bottom: 32px;
}
.typecho-foot {
    padding: 16px 40px;
    color: rgb(158, 158, 158);
    background-color: rgb(66, 66, 66);
    margin-top: 80px;
}
@media screen and (max-width: 480px){  
.typecho-option {
    width: 94% !important;
    margin-bottom: 20px !important;
}
}
#typecho-option-item-indexsetup-0 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 29%;
}
#typecho-option-item-themetype-1 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 59%;
}
#typecho-option-item-BGtype-2 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 94%;
}

#typecho-option-item-bgcolor-3, #typecho-option-item-GradientType-4,#typecho-option-item-IndexName-5, #typecho-option-item-BlogName-6,#typecho-option-item-BlogPic-7,#typecho-option-item-BlogJob-8,#typecho-option-item-socialtwitter-10, #typecho-option-item-socialfacebook-11, #typecho-option-item-socialgooglepluse-12,#typecho-option-item-socialgithub-13 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 44%;
    margin-bottom: 40px;
}

#typecho-option-item-Indexwords-9 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 94%;
    margin-bottom: 40px;
}

#typecho-option-item-socialemail-14,#typecho-option-item-socialqq-15,#typecho-option-item-socialweibo-16,#typecho-option-item-socialmusic-17 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 27.333%;
    margin-bottom: 40px;
}

#typecho-option-item-about-18 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 60%;
}
#typecho-option-item-analysis-19 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 94%;
}

#typecho-option-item-favicon-20, #typecho-option-item-titleintro-21 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 0 1%;
    padding: 8px 2%;
    width: 44%;
}

#typecho-option-item-preload-22{
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 59%;
    margin-bottom: 40px;
}
#typecho-option-item-delaytime-23{
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 29%;
    margin-bottom: 40px;
}
#typecho-option-item-RandomPicAmnt-24,#typecho-option-item-RandomPicAmnt2-25,#typecho-option-item-CDNURL-27, #typecho-option-item-timepic-28 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 44%;
}
#typecho-option-item-RandomPicChoice-26 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 94%;
}
#typecho-option-item-progresscolor-29,#typecho-option-item-ChangeAction-32{
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 94%;
}

#typecho-option-item-BottomleftInfo-30, #typecho-option-item-BottomInfo-31 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 44%;
}

#typecho-option-item-ChromeThemeColor-33{
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 94%;
}
#typecho-option-item-musiclist-34 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 94%;
}
#typecho-option-item-isautoplay-35, #typecho-option-item-ismobilehide-36 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 44%;
    margin-bottom: 40px;
}
#typecho-option-item-langis-37 {
    box-shadow: 0 2px 2px 0 rgba(0,0,0,.14), 0 3px 1px -2px rgba(0,0,0,.2), 0 1px 5px 0 rgba(0,0,0,.12);
    background-color: #fff;
    margin: 8px 1%;
    padding: 8px 2%;
    width: 94%;
}
</style>

    ";
    echo '<p style="font-size:14px;" id="use-intro">
    <span style="display: block;
    margin-bottom: 10px;
    margin-top: 10px;
    font-size: 16px;">感谢您使用 handsome主题&emsp; </span>
    <span style="margin-bottom:10px;display:block"> 如果您喜欢handsome主题，<a href="https://github.com/ihewro/typecho-theme-handsome/stargazers" style="color: rgb(255, 255, 255); background: rgb(63, 63, 63);">给该项目star一下吧</a>，是我不断更新的动力哦！</span>
    <span style="margin-bottom:10px;display:block">点击这里 <a href="https://github.com/ihewro/typecho-theme-handsome" target="_blank" style="color:#3384da;font-weight:bold;text-decoration:underline">typecho-theme-handsome</a> 以获得
    <span style="color:#df3827;font-weight:bold;">最新版本支持</span>
    </span>
    <span style="margin-bottom:10px;display:block">
    <a href="//www.ihewro.com/archives/489/" >帮助&支持</a> &nbsp;
    <a href="https://github.com/ihewro/typecho-theme-handsome/issues" target="_blank">建议&反馈</a>
    </span>
    <span style="margin-bottom:10px;display:block"> 后台设置主题风格来自 material 主题</span>
    </p>';

    //设置开关
    $indexsetup = new Typecho_Widget_Helper_Form_Element_Checkbox('indexsetup', 
    array(
    'header-fix' => _t('固定头部'),
    'aside-fix' => _t('固定导航'),
    'aside-folded' => _t('折叠导航'),
    'aside-dock' => _t('置顶导航'),
    'container-box' => _t('盒子模型'),
    'show-avatar' => _t('折叠左侧边栏头像'),
    'atargetblank' => _t('文章和评论区链接以新标签页形式打开'),
    'NoRandomPic-post' => _t('文章页面不显示头图'),
    'NoRandomPic-index' => _t('首页不显示头图'),
    'NoSummary-index' => _t('首页文章不显示摘要'),
    'lazyloadimg' => _t('图片延迟加载'),
    'festival' => _t('节日祝贺效果（暂只有新年）'),
    'musicplayer' => _t('启用音乐播放器')
    ),
    array('header-fix', 'aside-fix','container-box','atargetblank','lazyloadimg','festival','musicplayer'), _t('全站设置开关'));
    
    $form->addInput($indexsetup->multiMode());

    //主题色调选择
    $themetype = new Typecho_Widget_Helper_Form_Element_Radio('themetype',
        array(
            '0' => _t('black-white-black &emsp;&emsp;'),
            '1' => _t('dark-white-dark &emsp;&emsp;</br>'),
            '2' => _t('white-white-black &emsp;&emsp;'),
            '3' => _t('primary-white-dark &emsp;&emsp;</br>'),
            '4' => _t('info-white-black &emsp;&emsp;'),
            '5' => _t('success-white-dark &emsp;&emsp;</br>'),
            '6' => _t('danger-white-dark &emsp;&emsp;</br>'),
            '7' => _t('black-black-white &emsp;&emsp;</br>'),
            '8' => _t('dark-dark-light &emsp;&emsp;'),                        
            '9' => _t('info-info-light &emsp;&emsp;</br>'),
            '10' => _t('primary-primary-dark &emsp;&emsp;'),
            '11' => _t('info-info-black &emsp;&emsp;</br>'),
            '12' => _t('success-success-dark &emsp;&emsp;'),
            '13' => _t('danger-danger-dark &emsp;&emsp;</br>')
        ),

        //Default choose
        '1',_t('主题色调选择'),_t("</br>选择背景方案.如默认的<b>dark-white-dark</b> 分别代表：左侧边栏和上导航栏的交集部分、上导航栏、左侧边栏的颜色。")
    );
    $form->addInput($themetype);
    //盒子模型中背景样式选择
   $BGtype = new Typecho_Widget_Helper_Form_Element_Radio('BGtype',
        array(
            '0' => _t('纯色背景 &emsp;'),
            '1' => _t('图片背景 &emsp;'),
            '2' => _t('渐变背景 &emsp;')
        ),

        //Default choose
        '0',_t('盒子模型中背景样式选择'),_t("<b>如果你没有选中“盒子模型”，请忽略该项。</b>选择背景方案, 对应填写下方的 '<b>背景颜色 / 图片</b>' 或选择 '<b>渐变样式</b>', 这里默认使用纯色背景.")
    );
    $form->addInput($BGtype);
    //盒子模型种背景颜色/图片填写
    $bgcolor = new Typecho_Widget_Helper_Form_Element_Text('bgcolor', NULL, NULL, _t('背景颜色 / 图片'), _t('<b>如果你没有选中“盒子模型”，请忽略该项。</b><br />背景设置如果选择纯色背景, 这里就填写颜色代码; <br />背景设置如果选择图片背景, 这里就填写图片地址;<br />
    不填写则默认显示 #F5F5F5 或主题文件夹下的 /img/bg.jpg'));
    $form->addInput($bgcolor);

    //盒子模型中渐变样式选择
    $GradientType = new Typecho_Widget_Helper_Form_Element_Radio('GradientType',
        array(
            '0' => _t('Aerinite &emsp;'),
            '1' => _t('Ethereal &emsp;'),
            '2' => _t('Patrichor <br />'),
            '3' => _t('Komorebi &emsp;'),
            '4' => _t('Crepuscular &emsp;'),
            '5' => _t('Autumn <br />'),
            '6' => _t('Shore &emsp;'),
            '7' => _t('Horizon &emsp;'),
            '8' => _t('Green Beach <br />'),
            '9' => _t('Virgin <br />'),
        ),

        '0', _t('渐变样式'), _t("<b>如果你没有选中“盒子模型”，请忽略该项。</b><br />如果选择渐变背景, 在这里选择想要的渐变样式.")
    );
    $form->addInput($GradientType);


    //首页名称
    $IndexName = new Typecho_Widget_Helper_Form_Element_Text('IndexName', NULL, '友人C', _t('首页的名称'), _t('输入你的首页显示的名称'));
    $form->addInput($IndexName);
    //博主名称：aside.php中会调用
    $BlogName = new Typecho_Widget_Helper_Form_Element_Text('BlogName', NULL, 'ihewro', _t('博主的名称'), _t('输入你的名称建议为英文，中文也可'));
    $form->addInput($BlogName);

    //博主头像：在本主题中首页index.php 和 aboutme.php中将会调用此头像
    $BlogPic = new Typecho_Widget_Helper_Form_Element_Text('BlogPic', NULL, 'https://o9o5ixzu2.qnssl.com/mingren.jpeg', _t('头像图片地址'), _t('logo头像地址，尺寸在200X200左右即可'));
    $form->addInput($BlogPic);

    //博主职业
    $BlogJob = new Typecho_Widget_Helper_Form_Element_Text('BlogJob', NULL, 'A student', _t('博主的介绍'), _t('输入你的简介，在侧边栏的名称下面和时光机页面显示'));
    $form->addInput($BlogJob);
    //首页文字：将会在首页博客名称下面和404.php页面调用此字段
    $Indexwords = new Typecho_Widget_Helper_Form_Element_Text('Indexwords', NULL, '迷失的人迷失了，相逢的人会再相逢', _t('首页一行文字介绍'), _t('输入你喜欢的一行文字吧，在首页博客名称下面显示'));
    $form->addInput($Indexwords);

    //twitter
    $socialtwitter = new Typecho_Widget_Helper_Form_Element_Text('socialtwitter', NULL,'#', _t('输入twitter链接'), _t('在这里输入twitter链接,带http://，在时光机页面显示,为空则不显示按钮'));
    $form->addInput($socialtwitter);
    //facebook
    $socialfacebook = new Typecho_Widget_Helper_Form_Element_Text('socialfacebook', NULL,'#', _t('输入facebook链接'), _t('在这里输入facebook链接,带http://，在时光机页面显示,为空则不显示按钮'));
    $form->addInput($socialfacebook);
    //google+
    $socialgooglepluse = new Typecho_Widget_Helper_Form_Element_Text('socialgooglepluse', NULL,'#', _t('输入google+链接'), _t('在这里输入google+链接,带http://，在时光机页面显示,为空则不显示按钮'));
    $form->addInput($socialgooglepluse);

    //github
    $socialgithub = new Typecho_Widget_Helper_Form_Element_Text('socialgithub', NULL,'https://github.com/ihewro', _t('输入github链接'), _t('在这里输入github链接,带http://，在时光机页面显示,为空则不显示按钮'));
    $form->addInput($socialgithub);

    //email
    $socialemail = new Typecho_Widget_Helper_Form_Element_Text('socialemail', NULL,'ihewro@163.com', _t('输入email地址'), _t('在这里输入email地址，在时光机页面显示'));
    $form->addInput($socialemail);
    //QQ
    $socialqq = new Typecho_Widget_Helper_Form_Element_Text('socialqq', NULL,'535425690', _t('输入QQ号码'), _t('在这里输入QQ号码，在时光机页面显示'));
    $form->addInput($socialqq);
    //weibo
    $socialweibo = new Typecho_Widget_Helper_Form_Element_Text('socialweibo', NULL,'@超级男孩', _t('输入微博ID'), _t('在这里输入微博名称，在时光机页面显示'));
    $form->addInput($socialweibo);
    //网易云音乐
    $socialmusic = new Typecho_Widget_Helper_Form_Element_Text('socialmusic', NULL,'@许多年后我依然是我', _t('输入网易云音乐ID'), _t('在这里输入网易云音乐ID，在时光机页面显示'));
    $form->addInput($socialmusic);
    //时光机中关于我的内容
    $about = new Typecho_Widget_Helper_Form_Element_Textarea('about', NULL, '来自南部的一个小城市，个性不张扬，讨厌随波逐流。', _t('输入关于我的内容'), _t('输入关于我的内容，将会在时光机的关于我栏目中显示'));
    $form->addInput($about);

    //网站统计代码
    $analysis = new Typecho_Widget_Helper_Form_Element_Textarea('analysis', NULL, NULL, _t('网站统计代码'), _t('填入第三方统计代码.<b>注意：</b>这里面填写的是js代码，<b>而无需"\<\script\>\"标签！！！！！</b></br><span style="color: #f00">提示：</span><span><b>推荐使用google analysis、百度统计</b>，由于ajax，CNZZ代码用户请使用样例代码的第一种，而且“统计代码”字样会随着页面加载消失，望了解。</span>(不推荐cnzz，因为cnzz代码使用document.wirte创建“站长统计”字样不安全，而且cnzz界面不好看~)'));
    $form->addInput($analysis);
    //favicon图标
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, NULL, _t('favicon 地址'), _t('填入博客 favicon 的地址, 不填则显示主机根目录下的favicon.ico文件'));
    $form->addInput($favicon);
    //首页标题后缀
    $titleintro = new Typecho_Widget_Helper_Form_Element_Text('titleintro', NULL, '相逢的人会再相逢', _t('首页标题后缀'), _t('你的博客标题栏博客名称后面的副标题'));
    $form->addInput($titleintro);
    //instantclick预加载模式
   $preload = new Typecho_Widget_Helper_Form_Element_Radio('preload',
        array(
            '0' => _t('mouseover &emsp;'),
            '1' => _t('mousedown &emsp;'),
            '2' => _t('on-mouseover-with-a-delay &emsp;')
        ),

        //Default choose
        '1',_t('instantclick预加载模式选择'),_t("<b>mouseover</b>:鼠标悬停在链接上，就开始预加载。<b>mousedown</b>:鼠标点击链接的同时才开始预加载。 <b>on-mouseover-with-a-delay</b>:鼠标悬停在链接上并有一定延迟时间才开始预加载，选中此项，必须设置下面的延迟时间项。")
    );
    $form->addInput($preload);
    //instantclick延迟时间设置
    $delaytime = new Typecho_Widget_Helper_Form_Element_Text('delaytime', NULL, '70', _t('instantclick延迟时间设置'), _t('只有当你instantclick选择<b>on-mouseover-with-a-delay</b>,才需要配置此项。默认70，官方推荐在50——100之间的整数。'));
    $form->addInput($delaytime);

    // 文章缩略图数目设置
    $RandomPicAmnt = new Typecho_Widget_Helper_Form_Element_Text('RandomPicAmnt', NULL, _t('2'), _t('文章头图随机缩略图数量'), _t('对应于主题目录下的img/sj 文件夹中的图片的数量。说明：文章头图显示方式：<b>thumb（自定义字段）--> 文章第一张图片 --> 随机图片输出</b>。图片必须以从1开始的数字命名，而且必须是.jpg文件'));
    $form->addInput($RandomPicAmnt);

    // 右侧边栏缩略图数目设置
    $RandomPicAmnt2 = new Typecho_Widget_Helper_Form_Element_Text('RandomPicAmnt2', NULL, _t('15'), _t('右侧边栏随机缩略图数量'), _t('对应于主题目录下的img/sj2文件夹中的图片的数量。这里指的缩略图是<b>右侧边栏热门文章、随机文章的缩略图</b>'));
    $form->addInput($RandomPicAmnt2);
    //文章缩略图设置
   $RandomPicChoice = new Typecho_Widget_Helper_Form_Element_Radio('RandomPicChoice',
        array(
            '0' => _t('只显示随机图片'),
            '1' => _t('显示顺序：thumb自定义字段——文章第一张图片'),
            '2' => _t('显示顺序：thumb自定义字段——文章第一张图片——随机图片(推荐)')
        ),
        //Default choose
        '2',_t('博客头图设置'),_t('该头图设置对首页和文章页面同时生效。推荐选择第三个。<br><span style="color: #f00">注意</span>：此项设置仅在全局设置开启头图后才生效')
    );
    $form->addInput($RandomPicChoice);

    //gravatar镜像源
    $CDNURL = new Typecho_Widget_Helper_Form_Element_Text('CDNURL', NULL, 'https://secure.gravatar.com', _t('gravatar镜像源地址'), _t("
    gravatar由于国内被墙，推荐使用https://secure.gravatar.com 或者https://cdn.v2ex.com/gravatar 镜像源。你可以使用你自己的镜像源(末尾不要加斜杠！！！)"));
    $form->addInput($CDNURL);
    //时光机页面的头图
    $timepic = new Typecho_Widget_Helper_Form_Element_Text('timepic', NULL, 'https://o9o5ixzu2.qnssl.com/background3.jpg', _t('时光机页面的头图'), _t("填写图片地址，在时光机页面cross.html独立页面的头图，图片大小切勿过大，控制在100K左右为佳。"));
    $form->addInput($timepic);

    //加载进度条颜色
    $progresscolor = new Typecho_Widget_Helper_Form_Element_Text('progresscolor', NULL, NULL, _t('加载进度条颜色'), _t('在这里填写正确的颜色代码作为顶部加载进度条的颜色，默认为蓝色#29。'));
    $form->addInput($progresscolor);

    //网站底部左侧信息
    $BottomleftInfo = new Typecho_Widget_Helper_Form_Element_Textarea('BottomleftInfo', NULL, NULL, _t('博客左侧底部信息'), _t('这里面填写的是html代码，位置是博客底部的左边。可以填写备案号等一些信息。注意：所有屏幕尺寸下都会显示该内容'));
    $form->addInput($BottomleftInfo);

    //网站底部右侧信息
    $BottomInfo = new Typecho_Widget_Helper_Form_Element_Textarea('BottomInfo', NULL, NULL, _t('博客底部右侧信息'), _t('这里面填写的是html代码，位置是博客底部的右边。可以填写备案号等一些信息。注意：屏幕尺寸小于767px，不会显示该内容'));
    $form->addInput($BottomInfo);
    //回调函数
    $ChangeAction = new Typecho_Widget_Helper_Form_Element_Textarea('ChangeAction', NULL, NULL, _t('instantclick回调函数'), _t('本主题使用instantclick.js 技术，instantclick提供丰富的回调函数接口，方便在通过instantclick跳转页面时候再次调用函数，避免了由于instantclick导致的函数失效。最常用的是change函数，当页面跳转的同时就会触发该函数，在这里填入相应的事件以便回调（与pjax的send函数相似）。</br><span style="color: #f00">注意</span>：如果你没有修改主题源码，是不需要填写此项的。如果你不明白该项，建议不要填写。'));
    $form->addInput($ChangeAction);
    //chrome 安卓选项卡颜色
    $ChromeThemeColor = new Typecho_Widget_Helper_Form_Element_Text('ChromeThemeColor', NULL, _t('#3a3f51'), _t('Android Chrome 地址栏颜色'), _t('安卓系统下的chrome浏览器顶部的地址栏颜色，请填写正确的颜色代码。'));
    $form->addInput($ChromeThemeColor);
    
    //播放器音乐
    $musiclist = new Typecho_Widget_Helper_Form_Element_Textarea('musiclist', NULL,'{title:"晚安；）",artist:"性人盒",mp3:"//o9o5ixzu2.qnssl.com/wanan.mp3"},
{title:"远山",artist:"末小皮",mp3:"//o9o5ixzu2.qnssl.com/%E8%BF%9C%E5%B1%B1.mp3"},', _t('音乐播放器的音乐列表'), _t('格式: {title:"xxx", artist:"xxx", mp3:"http:xxxx"} ，每个歌曲之间用英文,隔开。请保证歌曲列表里至少有一首歌！（在全站设置项启用播放器后才有效）'));
    $form->addInput($musiclist);

    //音乐播放器是否自动播放
   $isautoplay = new Typecho_Widget_Helper_Form_Element_Radio('isautoplay',
        array(
            '0' => _t(' 不自动播放'),
            '1' => _t('自动播放')
        ),
        //Default choose
        '0',_t('音乐播放器播放设置'),_t("自动播放指打开页面会自动播放音乐（在全站设置项启用播放器后才有效）")
    );
    $form->addInput($isautoplay);
    //音乐播放器手机端是否隐藏
   $ismobilehide = new Typecho_Widget_Helper_Form_Element_Radio('ismobilehide',
        array(
            '0' => _t(' 隐藏'),
            '1' => _t('不隐藏')
        ),
        //Default choose
        '1',_t('音乐播放器手机端是否隐藏'),_t("默认不隐藏（在全站设置项启用播放器后才有效）")
    );
    $form->addInput($ismobilehide);
    //语言设置
    $langis = new Typecho_Widget_Helper_Form_Element_Radio('langis',
        array(
            '0' => _t('English <br />'),
            '1' => _t('简体中文 <br />'),
            '2' => _t('繁体中文 <br />')
        ),

        '1', _t('界面语言设置'), _t("默认使用简体中文语言")
    );
    $form->addInput($langis);

}
// 首页文章缩略图

function showThumbnail($widget)
{ 
    // 当文章无图片时的默认缩略图
    $rand = rand(1,$widget->widget('Widget_Options')->RandomPicAmnt); // 随机 1-3 张缩略图

    $random = $widget->widget('Widget_Options')->themeUrl . '/img/sj/' . $rand . '.jpg'; // 随机缩略图路径
    //正则匹配 主题目录下的/images/sj/的图片（以数字按顺序命名）

$cai = '';
if (!empty($attachments)){
    $attach = $widget->attachments(1)->attachment;
}
else{
    $attach='';
}
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i'; 
  $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';

//调用第一个图片附件
if ($attach && $attach->isImage) {
    $ctu = $attach->url.$cai;
} 

//下面是调用文章第一个图片
else if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
    $ctu = $thumbUrl[1][0].$cai;
}

//如果是内联式markdown格式的图片
else if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
    $ctu = $thumbUrl[1][0].$cai;
}
//如果是脚注式markdown格式的图片
else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
    $ctu = $thumbUrl[1][0].$cai;
}
//以上都不符合，即随机输出图片
else {
    if($widget->widget('Widget_Options')->RandomPicChoice =='1')
        $ctu='';
    else
        $ctu = $random;
}
//return输出
if ($widget->widget('Widget_Options')->RandomPicChoice =='0' ){
    return $random;
}
else{
    return $ctu;
}

}

//文章页面侧边栏缩略图
function showThumbnail2($widget)
{ 
    // 当文章无图片时的默认缩略图
    $rand = rand(1,$widget->widget('Widget_Options')->RandomPicAmnt2); // 随机 1-15 张缩略图

    $random = $widget->widget('Widget_Options')->themeUrl . '/img/sj2/' . $rand . '.jpg'; // 随机缩略图路径
    //正则匹配 主题目录下的/images/sj/的图片（以数字按顺序命名）

return $random;
}

/**
* 显示上一篇
*
* @access public
* @param string $default 如果没有上一篇,显示的默认文字
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
$link = '<li class="previous"> <a href="' . $content['permalink'] . '" title="' . $content['title'] . '" data-toggle="tooltip"> 上一篇 </a></li>
';
echo $link;
} else {
$link = '';
echo $link;
}
}
 
/**
* 显示下一篇
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
$link = '<li class="next"> <a href="' . $content['permalink'] . '" title="' . $content['title'] . '" data-toggle="tooltip"> 下一篇 </a></li>';
echo $link;
} else {
$link = '';
echo $link;
}
}

//随机显示文章
function theme_random_posts($random){
$defaults = array(
'number' => 5, //输出文章条数
'xformat' => '<li><a href="{permalink}">{title}</a></li>'
);
$db = Typecho_Db::get();
 
$sql = $db->select()->from('table.contents')
->where('status = ?','publish')
->where('type = ?', 'post')
->limit($defaults['number'])
->order('RAND()');
 
$result = $db->fetchAll($sql);
foreach($result as $val){
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
echo '<li class="list-group-item">
                <a href="' . $val['permalink'] . '" class="pull-left thumb-sm m-r">
                <img style="height: 40px!important;width: 40px!important;" src="'.showThumbnail2($random).'" class="img-circle wp-post-image">
                </a>
                <div class="clear">
                    <h4 class="h5 l-h"> <a href="' . $val['permalink'] . '" title="' . $val['title'] . '"> ' . $val['title'] . ' </a></h4>
                    <small class="text-muted">
                    <span class="meta-views"> <i class="iconfont icon-comments" aria-hidden="true"></i> <span class="sr-only">评论数：</span> <span class="meta-value">'.$val['commentsNum'].'</span> 
                    </span>  
                    <span class="meta-date m-l-sm"> <i class="iconfont icon-eye" aria-hidden="true"></i> <span class="sr-only">浏览次数:</span> <span class="meta-value">'.$val['views'].'</span> 
                    </span> 
                    </small>
                    </div>
            </li>';
}
}

//获取评论的锚点链接
function get_comment_at($coid)
{
    $db   = Typecho_Db::get();
    $prow = $db->fetchRow($db->select('parent')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $parent = $prow['parent'];
    if ($parent != "0") {
        $arow = $db->fetchRow($db->select('author')->from('table.comments')
                                     ->where('coid = ? AND status = ?', $parent, 'approved'));
        $author = $arow['author'];
        $href   = '<a href="#comment-' . $parent . '">@' . $author . '</a>';
        echo $href;
    } else {
        echo '';
    }

}
//输出评论内容(不带p标签)
function get_filtered_comment($coid){
    $db   = Typecho_Db::get();
    $rs=$db->fetchRow($db->select('text')->from('table.comments')
                                 ->where('coid = ? AND status = ?', $coid, 'approved'));
    $content=$rs['text'];
    echo $content;
}

//获得读者墙   
function getFriendWall()   
{   
    $db = Typecho_Db::get();   
    $sql = $db->select('COUNT(author) AS cnt', 'author', 'url', 'mail')   
              ->from('table.comments')   
              ->where('status = ?', 'approved')   
              ->where('type = ?', 'comment')   
              ->where('authorId = ?', '0')   
              ->where('mail != ?', 'admin@lab.munen.cc')   //排除自己上墙   
              ->group('author')   
              ->order('cnt', Typecho_Db::SORT_DESC)   
              ->limit('15');    //读取几位用户的信息   
    $result = $db->fetchAll($sql);   
    $mostactive = "";
    if (count($result) > 0) {   
        $maxNum = $result[0]['cnt'];   
        foreach ($result as $value) {   
            $mostactive .= '<li><a target="_blank" rel="nofollow" href="' . $value['url'] . '"><span class="pic" style="background: url(http://1.gravatar.com/avatar/'.md5(strtolower($value['mail'])).'?s=36&d=&r=G) no-repeat;background-size: 36px;"></span><em>' . $value['author'] . '</em><strong>+' . $value['cnt'] . '</strong><br />' . $value['url'] . '</a></li>';       
        }   
        echo $mostactive;   
    }   
}   