<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <title><?php if($this->_currentPage>1): ?>第 <?php echo $this->_currentPage ?> 页 - <?php endif; ?><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php if($this->is('post')): ?><?php echo $this->categories[0]['name']; ?> - <?php endif; ?><?php $this->options->title(); ?></title>
    <link rel="stylesheet" href="<?php echo is_HTTPS()?'https://staticfile.qnssl.com/normalize/3.0.3/normalize.min.css':'http://cdn.staticfile.org/normalize/3.0.3/normalize.min.css'; ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('responsive.min.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('fonts/font-awesome.min.css?ver=0.0.1'); ?>">
<?php if($this->options->dark==1): ?>    <link rel="stylesheet" href="<?php $this->options->themeUrl('dark.min.css'); ?>"><?php endif; ?>
    <script type="text/javascript" src="<?php echo is_HTTPS()?'https://staticfile.qnssl.com/jquery/1.11.3/jquery.min.js':'http://cdn.staticfile.org/jquery/1.11.3/jquery.min.js'; ?>" integrity="sha384-6ePHh72Rl3hKio4HiJ841psfsRJveeS+aLoaEf3BWfS+gTF0XdAqku2ka8VddikM" crossorigin="anonymous"></script>

    <!--[if lt IE 9]>
    <script src="<?php echo is_HTTPS()?'https://staticfile.qnssl.com/html5shiv/r29/html5.min.js':'http://cdn.staticfile.org/html5shiv/r29/html5.min.js'; ?>" integrity="sha384-CLKmepoEqm+8g1zYcrHJuGaM+IiwqEjhYZpW1kQf0++07t63QBTUcWijzFM0hvOJ" crossorigin="anonymous"></script>
    <script src="<?php echo is_HTTPS()?'https://staticfile.qnssl.com/respond.js/1.4.2/respond.min.js':'http://cdn.staticfile.org/respond.js/1.4.2/respond.min.js'; ?>" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body class="<?php if ($this->is('index')): ?> home blog<?php endif; ?><?php if ($this->is('post')): ?> single single-post<?php if($this->options->sidebarLocation!="-1") echo ($this->options->sidebarLocation=='1'?' col-2cl':' col-2cr'); ?><?php endif; ?><?php if ($this->is('single')): ?> page<?php endif; ?><?php if($this->is('category')): ?> archive<?php endif; ?>">
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->
<div id="wrapper">
    <div id="wrapper-inner">
    <header id="header" class="group">

        <div class="slant-left"></div>
        <div class="slant-right"></div>

        <div class="container group">
            <div class="group pad">

                <?php echo siteTitle($this) ; ?>

                <p class="site-description"><?php $this->options->description() ?></p>

                <?php if(!$this->is('post')) : ?>
                <!-- 搜索 -->
                <div class="container">
                    <div class="container-inner">
                        <div class="toggle-search"><i class="fa fa-search"></i></div>
                        <div class="search-expand" style="display: none;">
                            <div class="search-expand-inner">
                                <form action="./" class="searchform themeform" method="post" _lpchecked="1">
                                    <div>
                                        <input type="text" value="输入搜索词后回车搜索" onfocus="if(this.value=='输入搜索词后回车搜索')this.value='';" onblur="if(this.value=='')this.value='输入搜索词后回车搜索';" name="s" class="search">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!--/.container-inner-->
                </div>
                <?php endif;?>
                <div class="clear"></div>

                <?php if (!empty($this->options->navBar)): ?>
                    <nav class="nav-container group" id="nav-header">
                        <div class="nav-toggle"><i class="fa fa-bars"></i></div>
                        <div class="nav-text"><!-- put your mobile menu text here --></div>
                        <div class="nav-wrap container">
                            <?php echo showNavBar($this); ?>
                        </div>
                    </nav><!--/#nav-header-->

                <?php endif; ?>

                <?php if ( $this->options->authorAvatar ): ?>
                    <div class="slant-avatar"><a href="<?php $this->options->siteUrl(); ?>" title="<?php $this->options->title(); ?>"><img src="<?php $this->options->authorAvatar() ?>" alt="<?php $this->options->title(); ?>" /></a></div>
                <?php endif; ?>

            </div><!--/.pad-->
        </div><!--/.container-->
    </header><!--/#header-->

    <div id="subheader">
        <div class="container">
            <?php if($this->options->activeTopSocialLinks == '1'): ?>
            <?php showSocialLinks() ; ?>
            <?php endif; ?>
        </div>
    </div><!--/#subheader-->

    <?php $this->need('inc/page-title.php'); ?>

    <div id="page">
        <div class="container group">