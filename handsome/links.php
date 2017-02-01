<?php 
/**
* 友情链接
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<style type="text/css">
	@media (min-width: 991px){

.collapse {
    display: block!important;
}
.links-intro{
	    line-height: 33px;
	}
}
.list-group.no-radius .list-group-item {
    border-left: none!important;
}
</style>

	<!-- aside -->
	<?php $this->need('aside.php'); ?>
	<!-- / aside -->

  <!-- content -->
  <div id="content" class="app-content" role="main">
  	<div class="app-content-body ">
	    

	<div class="hbox hbox-auto-xs hbox-auto-sm" ng-controller="MailCtrl">
	  <div class="col w-md bg-light dk b-r bg-auto">
	    <div class="wrapper b-b bg">
	      <button class="btn btn-sm btn-default pull-right visible-sm visible-xs" data-toggle="collapse" data-target="#nav-tabs"><i class="iconfont icon-bars"></i></button>
		  <h1 class="m-n font-thin h3 text-black l-h">友情链接</h1>
	    </div>
	    <!--友链目录-->
	    <div id="nav-tabs" class="collapse wrapper" id="email-menu">
	      <ul class="nav nav-pills nav-stacked nav-sm">
	        <li class="active"><a href="#my-info" role="tab" data-toggle="tab">本博信息</a></li>
	        <li><a href="#links-inside" role="tab" data-toggle="tab">内页链接</a></li>
	        <li><a href="#links-allweb" role="tab" data-toggle="tab">全站链接</a></li>
	        <li><a href="#links-goodweb" role="tab" data-toggle="tab">推荐链接</a></li>
	      </ul>
	    </div>
	  </div>
	  <div class="col">
	    
	    <div class="tab-content">
	      <!-- header -->
			<!--<div class="links-intro wrapper bg-light lter b-b">
					<span>小伙伴们！</span>
				      </div>-->
	      <!-- / header -->

	      <!-- list -->
	      <div id="my-info" role="tabpane1" class="tab-pane active">
			<div class="wrapper b-b">
			    <h2 class="font-thin m-n ng-binding">本博信息</h2>
			  </div>			
			<div class="wrapper ng-binding">
			 <?php $this->content(); ?>
			        <!--评论-->
       		 <?php $this->need('comments.php') ?>
			  </div>
	      </div>
	      <!--内页链接-->
	      <ul id="links-inside" role="tabpane2" class="tab-pane list-group list-group-lg no-radius m-b-none m-t-n-xxs">
	      <?php 
	      $x=0;
	      $mypattern = '<li class="list-group-item clearfix">
	          <a class="avatar thumb pull-left m-r" href="{url}">
	            <img  src="{image}">
	          </a>
	          <div class="clear">
	            <div><a data-no-instant target="blank" class="text-md " href="{url}">{name}</a></div>
	            <div class="text-ellipsis m-t-xs ">{title}</div>
	          </div>      
	        </li>'."\n"; 
	      Links_Plugin::output($mypattern, 0, "one");
	      ?>
	      </ul>
	      <!--全站链接-->
	      <ul id="links-allweb" role="tabpane3" class="tab-pane list-group list-group-lg no-radius m-b-none m-t-n-xxs">
			<?php Links_Plugin::output($mypattern, 0, "ten");?>
	      </ul>
	      <!--建议网站-->
	      <ul id="links-goodweb" role="tabpane4" class="tab-pane list-group list-group-lg no-radius m-b-none m-t-n-xxs">
	        <?php Links_Plugin::output($mypattern, 0, "good");?>
	      </ul>

	      <!-- / list -->
	    </div>

	  </div>
	</div>


	</div>
  </div>
  <!-- /content -->

    <!-- footer -->
	<?php $this->need('footer.php'); ?>
  	<!-- / footer -->

	