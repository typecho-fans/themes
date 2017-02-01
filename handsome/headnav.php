  <?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
  <header id="header" class="app-header navbar" role="menu">
      <!-- navbar header（交集处） -->
    <?php if ( $this->options->themetype =='0' ) : ?>
      <div class="navbar-header bg-black">
    <?php elseif ( $this->options->themetype =='1' ) : ?>
      <div class="navbar-header bg-dark">
    <?php elseif ( $this->options->themetype =='2' ) : ?>
      <div class="navbar-header bg-white-only">
    <?php elseif ( $this->options->themetype =='3' ) : ?>
      <div class="navbar-header bg-primary">
    <?php elseif ( $this->options->themetype =='4' ) : ?>
      <div class="navbar-header bg-info">
    <?php elseif ( $this->options->themetype =='5' ) : ?>
      <div class="navbar-header bg-success">
    <?php elseif ( $this->options->themetype =='6' ) : ?>
      <div class="navbar-header bg-danger">
    <?php elseif ( $this->options->themetype =='7' ) : ?>
      <div class="navbar-header bg-black">
    <?php elseif ( $this->options->themetype =='8' ) : ?>
      <div class="navbar-header bg-dark">
    <?php elseif ( $this->options->themetype =='9' ) : ?>
      <div class="navbar-header bg-info dker">
    <?php elseif ( $this->options->themetype =='10' ) : ?>
      <div class="navbar-header bg-primary">
    <?php elseif ( $this->options->themetype =='11' ) : ?>
      <div class="navbar-header bg-info dker">
    <?php elseif ( $this->options->themetype =='12' ) : ?>
      <div class="navbar-header bg-success">
    <?php elseif ( $this->options->themetype =='13' ) : ?>
      <div class="navbar-header bg-danger dker bg-gd">
      <?php endif; ?>

        <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
          <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
          <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="<?php $this->options->siteUrl(); ?>" class="navbar-brand text-lt">
          <i class="iconfont icon-shouyeshouye"></i>
          <span class="hidden-folded m-l-xs"><?php $this->options->BlogName(); ?></span>
        </a>
        <!-- / brand -->
      </div>
      <!-- / navbar header -->

      <!-- navbar collapse（顶部导航栏） -->
    <?php if ( $this->options->themetype =='0' ) : ?>
    <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <?php elseif ( $this->options->themetype =='1' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <?php elseif ( $this->options->themetype =='2' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <?php elseif ( $this->options->themetype =='3' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <?php elseif ( $this->options->themetype =='4' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <?php elseif ( $this->options->themetype =='5' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <?php elseif ( $this->options->themetype =='6' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
    <?php elseif ( $this->options->themetype =='7' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-black">
    <?php elseif ( $this->options->themetype =='8' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-dark">
    <?php elseif ( $this->options->themetype =='9' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-info dker">
    <?php elseif ( $this->options->themetype =='10' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-primary">
    <?php elseif ( $this->options->themetype =='11' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-info dk">
    <?php elseif ( $this->options->themetype =='12' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-success">
    <?php elseif ( $this->options->themetype =='13' ) : ?>
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-danger dker bg-gd">
      <?php endif; ?>
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
          <a data-no-instant href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
            <i style="height: 14px!important" class="iconfont icon-dedent text icon-fw"></i>
            <i style="height: 14px!important" class="iconfont icon-indent icon-fw text-active"></i>
          </a>
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="show" target="#aside-user">
            <i style="height: 14px!important" class="iconfont icon-user icon-fw"></i>
          </a>
        </div>
        <!-- / buttons -->


        <!-- search form -->
        <form method="post" class="navbar-form navbar-form-sm navbar-left shift" role="search">
          <div class="form-group">
            <div class="input-group">
              <input id="keyword" type="search" name="s" class="form-control input-sm bg-light no-border rounded padder" placeholder="<?php if($this->options->langis == '0'): ?>Search projects...<?php elseif($this->options->langis == '1'): ?>来这里搜索吧……<?php elseif($this->options->langis == '2'): ?>來這裡搜索吧……<?php endif; ?>" onkeypress="getKey()"/>
              <span class="input-group-btn">
                <a id="soux" href="<?php $this->options->siteUrl(); ?>search/" data-instant type="submit" class="btn btn-sm bg-light rounded"><i class="iconfont icon-search"></i>
                </a>
              </span>
            </div>
          </div>
        </form>
        <!-- / search form -->

        <!-- 闲言碎语 -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
              <i style="height: 14px!important"  class="iconfont icon-bell icon-fw"></i>
              <span class="visible-xs-inline">
              <?php if($this->options->langis == '0'): ?>
                New thing
              <?php elseif($this->options->langis == '1'): ?>
                闲言碎语
              <?php elseif($this->options->langis == '2'): ?>
                閒言碎語
              <?php endif; ?>
              </span>
              <span class="badge badge-sm up bg-danger pull-right-xs"></span>
            </a>
            <!-- dropdown -->
            <div class="dropdown-menu w-xl animated fadeInUp">
              <div class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>
              <?php if($this->options->langis == '0'): ?>
                New thing
              <?php elseif($this->options->langis == '1'): ?>
                闲言碎语
              <?php elseif($this->options->langis == '2'): ?>
                閒言碎語
              <?php endif; ?>
                  </strong>
                </div>
                <div class="list-group">
                  <?php
                   //$comments->listComments(); 
                  $slug = "cross";    //页面缩略名
                  $limit = 3;    //调用数量
                  $length = 140;    //截取长度
                  $ispage = true;    //true 输出slug页面评论，false输出其它所有评论
                  $isGuestbook = $ispage ? " = " : " <> ";
                   
                  $db = $this->db;    //Typecho_Db::get();
                  $options = $this->options;    //Typecho_Widget::widget('Widget_Options');
                   
                  $page = $db->fetchRow($db->select()->from('table.contents')
                      ->where('table.contents.status = ?', 'publish')
                      ->where('table.contents.created < ?', $options->gmtTime)
                      ->where('table.contents.slug = ?', $slug));
                   
                  if ($page) {
                      $type = $page['type'];
                      $routeExists = (NULL != Typecho_Router::get($type));
                      $page['pathinfo'] = $routeExists ? Typecho_Router::url($type, $page) : '#';
                      $page['permalink'] = Typecho_Common::url($page['pathinfo'], $options->index);
                   
                      $comments = $db->fetchAll($db->select()->from('table.comments')
                          ->where('table.comments.status = ?', 'approved')
                          ->where('table.comments.created < ?', $options->gmtTime)
                          ->where('table.comments.type = ?', 'comment')
                          ->where('table.comments.cid ' . $isGuestbook . ' ?', $page['cid'])
                          ->order('table.comments.created', Typecho_Db::SORT_DESC)
                          ->limit($limit));
                   
                      foreach ($comments AS $comment) {
                       echo '<a href="#" class="list-group-item"><span class="clear block m-b-none words_contents">'.$comment['text'].'<br><small class="text-muted">'.date('Y-n-j H:i:s',$comment['created']+($this->options->timezone - idate("Z"))).'</small></span></a>';
                      }
                  } else {
                      echo '<a href="#" class="list-group-item"><span class="clear block m-b-none">这是一条默认的说说，如果你看到这条动态，请去后台新建独立页面，地址填写cross,自定义模板选择时光机。具体说明请参见主题的使用攻略。<br><small class="text-muted">'.date("F jS, Y \a\t h:i a",time()+($this->options->timezone - idate("Z"))).'</small></span></a>';
                  }?>
                </div>
              </div>
            </div>
            <!-- / dropdown -->
          </li>
          <li class="dropdown">
            <a onclick="return false" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
            <?php if($this->user->hasLogin()): ?>
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="<?php $this->options->BlogPic() ?>" alt="...">
                <i class="on md b-white bottom"></i>
              </span>
              <span class="hidden-sm hidden-md"><?php $this->user->screenName(); ?></span> 
            <?php else: ?>
            <span class="text">登录</span> 
          <?php endif; ?>
              <b class="caret"></b><!--下三角符号-->
            </a>
            <!-- dropdown(已经登录) -->
            <?php if($this->user->hasLogin()): ?>
            <ul class="dropdown-menu animated fadeInRight w">
              <li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
                <div>
                <?php 
                    $time= date("H",time()+($this->options->timezone - idate("Z")));
                    $percent= $time/24;
                    $percent= sprintf("%01.2f", $percent*100).'%';
                ?> 
                <?php if($time>=6 && $time<=11): ?>
                  <p><?php if($this->options->langis == '0'): ?>Good morning, <?php elseif($this->options->langis == '1'): ?>早上好，<?php elseif($this->options->langis == '2'): ?>早上好，<?php endif; ?><?php $this->user->screenName(); ?>.</p>
                <?php elseif($time>=12 && $time<=17): ?>
                  <p><?php if($this->options->langis == '0'): ?>Good afternoon, <?php elseif($this->options->langis == '1'): ?>中午好，<?php elseif($this->options->langis == '2'): ?>中午好，<?php endif; ?><?php $this->user->screenName(); ?>.</p>
                <?php else : ?>
                <p><?php if($this->options->langis == '0'): ?>Good evening, <?php elseif($this->options->langis == '1'): ?>晚上好，<?php elseif($this->options->langis == '2'): ?>晚上好，<?php endif; ?><?php $this->user->screenName(); ?>.</p>
              <?php endif; ?>
                </div>
                <div class="progress progress-xs m-b-none dker">
                  <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="<?php echo $percent; ?>" style="width: <?php echo $percent; ?>"></div>
                </div>
              </li>
              <!--文章RSS订阅-->
              <li>
                <a data-no-instant target="_blank" href="<?php $this->options->feedUrl(); ?>">
                  <i style="position: relative;width: 30px;margin: -11px -10px;margin-right: 0px;overflow: hidden;line-height: 30px;text-align: center;" class="iconfont icon-rss"></i><span>文章RSS</span>
                </a>
              </li>
              <!--评论RSS订阅-->
              <li>
                <a data-no-instant target="_blank" href="<?php $this->options->commentsFeedUrl(); ?>"><i style="position: relative;width: 30px;margin: -11px -10px;margin-right: 0px;overflow: hidden;line-height: 30px;text-align: center;" class="iconfont icon-rss1"></i><span>评论RSS</span></a>
              </li>
              <!--后台管理(登录时候才会显示)-->
              <?php if($this->user->hasLogin()): ?>
              <li>
                <a data-no-instant target="_blank" href="<?php $this->options->adminUrl(); ?>"><i style="position: relative;width: 30px;margin: -11px -10px;margin-right: 0px;overflow: hidden;line-height: 30px;text-align: center;" class="iconfont icon-cogs"></i><span>后台管理</span></a>
              </li>
              <?php else: ?>
              <?php endif; ?>
              
              <li class="divider"></li>
              <li>
                <a data-no-instant href="<?php $this->options->logoutUrl(); ?>">退出</a>
              </li>
            </ul>
            <!-- / dropdown(已经登录) -->
          <?php else: ?>
          <div class="dropdown-menu w-lg wrapper bg-white" aria-labelledby="navbar-login-dropdown">
            <form action="<?php $this->options->loginaction(); ?>" method="post">
              <div class="form-group">
                <label for="navbar-login-user">用户名</label>
                <input type="text" name="name" id="navbar-login-user" class="form-control" placeholder="用户名或电子邮箱"></div>
              <div class="form-group">
                <label for="navbar-login-password">密码</label>
                <input type="password" name="password" id="navbar-login-password" class="form-control" placeholder="密码"></div>
              <button type="submit" id="login-submit" class="btn btn-block btn-primary">
              <span class="text">登录</span>
              <span class="text-active">登录中...</span>
              <i class="icon-spin iconfont icon-spinner hide" id="spin-login"></i>
              </button>
              <?php $http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://'; ?>
              <!--本地测试没问题，我的博客使用就有问题！-->
              <input type="hidden" name="referer" value="<?php echo $http_type.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>" data-current-url="value"></form>
          </div>
          <?php endif; ?>
          </li>
        </ul>
        <!-- / 闲言碎语 -->
      </div>
      <!-- / navbar collapse -->
  </header>