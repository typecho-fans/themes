  <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    <?php if ( $this->options->themetype =='0' ) : ?>
  <aside id="aside" class="app-aside hidden-xs bg-black">
    <?php elseif ( $this->options->themetype =='1' ) : ?>
  <aside id="aside" class="app-aside hidden-xs bg-dark">
    <?php elseif ( $this->options->themetype =='2' ) : ?>
  <aside id="aside" class="app-aside hidden-xs bg-black">
    <?php elseif ( $this->options->themetype =='3' ) : ?>
  <aside id="aside" class="app-aside hidden-xs bg-dark">
    <?php elseif ( $this->options->themetype =='4' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-black">
    <?php elseif ( $this->options->themetype =='5' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-dark">
    <?php elseif ( $this->options->themetype =='6' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-dark">
    <?php elseif ( $this->options->themetype =='7' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-white b-r">
    <?php elseif ( $this->options->themetype =='8' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-light">
    <?php elseif ( $this->options->themetype =='9' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-light dker b-r">
    <?php elseif ( $this->options->themetype =='10' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-dark">
    <?php elseif ( $this->options->themetype =='11' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-black">
    <?php elseif ( $this->options->themetype =='12' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-dark">
    <?php elseif ( $this->options->themetype =='13' ) : ?>
      <aside id="aside" class="app-aside hidden-xs bg-dark">
      <?php endif; ?>
      <div class="aside-wrap">
        <div class="navi-wrap">
          <!-- user -->
        <?php if (!empty($this->options->indexsetup) && in_array('show-avatar', $this->options->indexsetup)): ?>
          <div class="clearfix hidden-xs text-center hide" id="aside-user">
        <?php else: ?>
          <div class="clearfix hidden-xs text-center hide show" id="aside-user">
        <?php endif; ?>
            <div class="dropdown wrapper">
              <a href="<?php Helper::options()->siteUrl()?>cross.html">
                <span class="thumb-lg w-auto-folded avatar m-t-sm">
                  <img src="<?php $this->options->BlogPic() ?>" class="img-full">
                </span>
              </a>
              <a href="#" data-toggle="dropdown" class="dropdown-toggle hidden-folded">
                <span class="clear">
                  <span class="block m-t-sm">
                    <strong class="font-bold text-lt"><?php $this->options->BlogName(); ?></strong> 
                    <b class="caret"></b>
                  </span>
                  <span class="text-muted text-xs block"><?php $this->options->BlogJob() ?></span>
                </span>
              </a>
              <!-- dropdown -->
              <ul class="dropdown-menu animated fadeInRight w hidden-folded">
                <li class="wrapper b-b m-b-sm bg-info m-t-n-xs">
                  <span class="arrow top hidden-folded arrow-info"></span>
                  <div>
                <?php 
                    $time= date("H",time()+($this->options->timezone - idate("Z")));
                    $percent= $time/24;
                    $percent= sprintf("%01.2f", $percent*100).'%';
                ?> 
                <?php if($time>=6 && $time<=11): ?>
                  <p><?php if($this->options->langis == '0'): ?>Good morning, <?php elseif($this->options->langis == '1'): ?>早上好，<?php elseif($this->options->langis == '2'): ?>早上好，<?php endif; ?><?php $this->options->BlogName(); ?>.</p>
                <?php elseif($time>=12 && $time<=17): ?>
                  <p><?php if($this->options->langis == '0'): ?>Good afternoon, <?php elseif($this->options->langis == '1'): ?>中午好，<?php elseif($this->options->langis == '2'): ?>中午好，<?php endif; ?><?php $this->options->BlogName(); ?>.</p>
                <?php else : ?>
                <p><?php if($this->options->langis == '0'): ?>Good evening, <?php elseif($this->options->langis == '1'): ?>晚上好，<?php elseif($this->options->langis == '2'): ?>晚上好，<?php endif; ?><?php $this->options->BlogName(); ?>.</p>
                <?php endif; ?>
                  </div>
                  <div class="progress progress-xs m-b-none dker">
                    <div class="progress-bar bg-white" data-toggle="tooltip" data-original-title="<?php echo $percent; ?>" style="width: <?php echo $percent; ?>"></div>
                  </div>
                </li>
              <!--文章RSS订阅-->
              <li>
                <a href="<?php $this->options->feedUrl(); ?>">
                  <i style="position: relative;width: 30px;margin: -11px -10px;margin-right: 0px;overflow: hidden;line-height: 30px;text-align: center;" class="iconfont icon-rss"></i><span>文章RSS</span>
                </a>
              </li>
              <!--评论RSS订阅-->
              <li>
                <a href="<?php $this->options->commentsFeedUrl(); ?>"><i style="position: relative;width: 30px;margin: -11px -10px;margin-right: 0px;overflow: hidden;line-height: 30px;text-align: center;" class="iconfont icon-rss1"></i><span>评论RSS</span></a>
              </li>

              <li class="divider"></li>
              <?php if($this->user->hasLogin()): ?>
              <!--后台管理-->
              <li>
                <a data-no-instant target="_blank" href="<?php $this->options->adminUrl(); ?>"><i style="position: relative;width: 30px;margin: -11px -10px;margin-right: 0px;overflow: hidden;line-height: 30px;text-align: center;" class="iconfont icon-cogs"></i><span>后台管理</span></a>
              </li>
              <?php else: ?>
              <li>
                <a data-no-instant href="<?php $this->options->loginUrl(); ?>">登录</a>
              </li>
              <?php endif; ?>
              </ul>
              <!-- / dropdown -->
            </div>
            <div class="line dk hidden-folded"></div>
          </div>
          <!-- / user -->

          <!-- nav -->
          <nav ui-nav class="navi clearfix">
            <ul class="nav">
             <!--index-->
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span><?php if($this->options->langis == '0'): ?>Navigation
<?php elseif($this->options->langis == '1'): ?>导航<?php elseif($this->options->langis == '2'): ?>導航<?php endif; ?></span>
              </li>
              <!--主页-->
              <li>
                <a href="<?php $this->options->siteUrl(); ?>" class="auto">      
                  <i class="iconfont icon-home icon text-md"></i>
                  <span><?php if($this->options->langis == '0'): ?>Home
<?php elseif($this->options->langis == '1'): ?>首页<?php elseif($this->options->langis == '2'): ?>首頁<?php endif; ?></span>
                </a>
              </li>
              <!-- /主页 -->
              <!--lucky try-->

              <!-- /lucky try-->
              <li class="line dk"></li>
			<!--Components-->
              <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                <span><?php if($this->options->langis == '0'): ?>Components
<?php elseif($this->options->langis == '1'): ?>组成<?php elseif($this->options->langis == '2'): ?>組成<?php endif; ?></span>
              </li>
              <!--分类category-->
              <li>
                <a data-no-instant class="auto">      
                  <span class="pull-right text-muted">
                    <i class="iconfont icon-fw icon-angleright text"></i>
                    <i class="iconfont icon-fw icon-angledown text-active"></i>
                  </span>
                  <i class="iconfont icon-c-classification"></i>
                  <span><?php if($this->options->langis == '0'): ?>Categories
<?php elseif($this->options->langis == '1'): ?>分类<?php elseif($this->options->langis == '2'): ?>分類<?php endif; ?></span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a data-no-instant>
                      <span><?php if($this->options->langis == '0'): ?>Categories
<?php elseif($this->options->langis == '1'): ?>分类<?php elseif($this->options->langis == '2'): ?>分類<?php endif; ?></span>
                    </a>
                  </li><!--不会显示出来-->
                  <!--循环输出分类-->
                <?php $this->widget('Widget_Metas_Category_List')
               ->parse('<li><a href="{permalink}"><span>{name}</span></a></li>'); ?>   
                </ul>
              </li>
              <!--独立页面pages-->
              <li>
                <a data-no-instant class="auto">
                  <span class="pull-right text-muted">
                    <i class="iconfont icon-fw icon-angleright text"></i>
                    <i class="iconfont icon-fw icon-angledown text-active"></i>
                  </span>
                  <i class="iconfont icon-176pages"></i>
                  <span><?php if($this->options->langis == '0'): ?>Pages
<?php elseif($this->options->langis == '1'): ?>页面<?php elseif($this->options->langis == '2'): ?>頁面<?php endif; ?></span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a data-no-instant>
                      <span><?php if($this->options->langis == '0'): ?>Pages
<?php elseif($this->options->langis == '1'): ?>页面<?php elseif($this->options->langis == '2'): ?>頁面<?php endif; ?></span>
                    </a>
                  </li><!--这个字段不会被显示出来-->
                  <!--循环输出独立页面-->
                  <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                   <?php while($pages->next()): ?>
                    <li><a href="<?php $pages->permalink(); ?>"><span><?php $pages->title(); ?></span></a></li>
                   <?php endwhile; ?>
                </ul>
              </li>
              <!--友情链接-->
              <li>
                <a data-no-instant class="auto">
                  <span class="pull-right text-muted">
                    <i class="iconfont icon-fw icon-angleright text"></i>
                    <i class="iconfont icon-fw icon-angledown text-active"></i>
                  </span>
                  <i class="iconfont icon-pengyouquan"></i>
                  <span><?php if($this->options->langis == '0'): ?>Links
<?php elseif($this->options->langis == '1'): ?>友链<?php elseif($this->options->langis == '2'): ?>友鏈<?php endif; ?></span>
                </a>
                <ul class="nav nav-sub dk">
                  <li class="nav-sub-header">
                    <a data-no-instant>
                      <span>友链</span>
                    </a>
                  </li>
                  <!--使用links插件，输出全站友链-->
                 <?php $mypattern1 = "<li><a href=\"{url}\" target=\"_blank\" title=\"{title}\"><span>{name}</span></a></li>";
                  Links_Plugin::output($mypattern1, 0, "ten");?>
                </ul>
              </li>
            
            </ul>
          </nav>
          <!-- nav -->


        </div>
      </div>
  </aside>
