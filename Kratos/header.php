<?php if(!defined( '__TYPECHO_ROOT_DIR__'))exit;?>
<!DOCTYPE HTML>
<html class="no-js">
	<head>
		<title><?php $this->archiveTitle(array('category'=>_t(' %s '),'search'=>_t(' %s '),'tag'=>_t(' %s '),'author'=>_t(' %s ')),'',' - ');?> <?php $this->options->title();?></title>
		<meta charset="<?php $this->options->charset(); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Cache-Control" content="no-transform" />  
        <meta http-equiv="Cache-Control" content="no-siteapp" />  
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<meta name="keywords" content="<?php $this->keywords() ?>" />
		<link rel="shortcut icon" href="//eallion.com/favicon.ico">
		<link rel='stylesheet' id='animate-style-css'  href='//lib.baomitu.com/animate.css/3.5.1/animate.min.css' type='text/css' media='all' />
		<link rel='stylesheet' id='awesome-style-css'  href='//lib.baomitu.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css' media='all' />
		<link rel='stylesheet' id='bootstrap-style-css'  href='//lib.baomitu.com/twitter-bootstrap/3.3.7/css/bootstrap.min.css' type='text/css' media='all' />
		<link rel='stylesheet' id='superfish-style-css'  href='//lib.baomitu.com/superfish/1.7.4/superfish.min.css' type='text/css' media='all' />
		<link rel='stylesheet' id='kratos-style-css'  href='<?php $this->options->themeUrl('style.css?ver=2.5.2'); ?>' type='text/css' media='all' />
		<link rel='stylesheet' id='kratos-diy-style-css'  href='<?php $this->options->themeUrl('css/kratos.diy.css?ver=2.5.2'); ?>' type='text/css' media='all' />
		<?php $this->header('keywords=&generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&atom='); ?>
		<?php if($this->options->site_bw == 'able'): ?>
			<style type="text/css">html{filter: grayscale(100%);-webkit-filter: grayscale(100%);-moz-filter: grayscale(100%);-ms-filter: grayscale(100%);-o-filter: grayscale(100%);filter: progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);filter: gray;-webkit-filter: grayscale(1); }
			</style>
		<?php endif; ?>
	</head>
	<?php flush(); ?>
	<body data-spy="scroll" data-target=".scrollspy">
		<div id="kratos-wrapper">
			<div id="kratos-page">
				<div id="kratos-header">
					<header id="kratos-header-section">
						<div class="container">
							<div class="nav-header">
								<a href="#" class="js-kratos-nav-toggle kratos-nav-toggle"><i></i></a>
								<?php if ( !empty( $this->options->logoUrl ) ) {?>
									<a href="<?php $this->options ->siteUrl(); ?>">
									<h1 id="kratos-logo-img"><img src="<?php $this->options->logoUrl(); ?>"></h1>
									</a>
								<?php }else{?>
									<h1 id="kratos-logo"><a href="<?php $this->options ->siteUrl(); ?>"><?php $this->options->title();?></a></h1>
								<?php }?>
								<nav id="kratos-menu-wrap" class="menu-container">
									<ul id="kratos-primary-menu" class="sf-menu">
										<li class="current-menu-item"><a href="<?php $this->options ->siteUrl(); ?>">Home</a></li>
										<li class="current-menu-item"><a href="<?php $this->options ->siteUrl(); ?>">分类</a>
											<ul class="sub-menu">
												<?php $this->widget('Widget_Metas_Category_List')->to($cats); ?>
												<?php while ($cats->next()): ?>
												<li><a href="<?php $cats->permalink()?>"><?php $cats->name()?></a></li>
												<?php endwhile; ?>
											</ul>
										</li>
										<li class="current-menu-item">
												<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
												<?php while($pages->next()): ?>
												<li><a href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
												<?php endwhile; ?>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</header>
				</div>
<div class="kratos-start kratos-hero-2">
	<div class="kratos-overlay"></div>
	<div class="kratos-cover kratos-cover_2 text-center" style="background-image: url(<?php ($this->options->bannerimg) ? $this->options->bannerimg() : $this->options->themeUrl('images/background.jpg'); ?>);">
		<div class="desc desc2 animate-box"><h2><?php $this->options->logoTxt(); ?></h2><span><?php hellobingbing("geyan"); ?><!--随机格言--></span></div>
	</div>
</div>
<div id="kratos-blog-post" style="background:#f5f5f5"><!--header-->
