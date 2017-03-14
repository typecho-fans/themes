<?php $this->need('header.php'); ?>

<body class="post-template">

	<header id="header" data-url="<?php if(isset($this->fields->cover)){$this->fields->cover();}else{$this->options->themeUrl('img/header.jpg');} ?>" class="home-header blog-background banner-mask lazy no-cover" style="display: table; background-image: url(<?php if(isset($this->fields->cover)){$this->fields->cover();}else{$this->options->themeUrl('img/header.jpg');} ?>)">		
    	<div class="nav-header">
            <div class="nav-header-container">
                 <a href="<?php $this->options->siteUrl(); ?>" class="back-home">首页</a>
            </div>
    	</div>
        <div class="header-wrap" >
            <div class="post-info-container">
                <h2 class="post-page-title ">
                	<?php $this->title() ?>
            	</h2>
	            <time class="post-page-time"><?php $this->date('d M Y'); ?></time>
	            <span class="post-page-author"><?php $this->author(); ?></span>
           	</div>
        </div>
        <div class="arrow_down">
               <a href="javascript:;"></a>
        </div>
	</header>

	<main class="content" id="main" role="main">
	    <article>
	     	<section class="post-content">
	     		<div class="single-post-inner">
	        		<?php $this->content(); ?>
			        <div class="money-like" id="like-money">
			            <div class="reward-button">赏
			            	<span class="money-code">
				           		<span class="alipay-code">
					                <a href="javascript:;">
					                	<img src="<?php $this->options->themeUrl('img/alipay.png'); ?>"><b>支付宝打赏</b>
					                </a>
				           		</span>
					            <span class="wechat-code">
					            	<a href="javascript:;">
					                	<img src="<?php $this->options->themeUrl('img/wechat.png'); ?>"><b>微信打赏</b>
					                </a>
					            </span>
					        </span>
		            	</div>
		            	<p class="money-notice">若你觉得我的文章对你有帮助 欢迎点击上方按钮对我打赏</p>
		        	</div>
			        <div class="qr-code">
			            <img src="https://pan.baidu.com/share/qrcode?w=145&h=145&url=<?php $this->permalink() ?>" alt="">
			            <p>扫描二维码 分享此文章</p>
			        </div>
	     		</div>
	    	</section>				       
	    </article>
		<?php $this->need('comments.php'); ?>
	</main>

	<script type="text/javascript" src="<?php $this->options->themeUrl('js/prism.js'); ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php $this->options->themeUrl('fancybox/jquery.fancybox.css'); ?>"/>
	<script type="text/javascript" src="<?php $this->options->themeUrl('fancybox/jquery.fancybox.pack.js'); ?>"></script>


	<!-- 打赏按钮 -->
	<script type="text/javascript">
        $(".money-like .reward-button").hover(function() {
            $(".money-code").fadeIn(),
            $(this).addClass("active")
        },
        function() {
            $(".money-code").fadeOut(),
            $(this).removeClass("active")
        },
        800)
	</script>

	<!-- fancybox -->
	<script>
	    $("main img").parent("a").addClass("fancybox");
	    $("main img").parent("a").attr("rel","gallery-group");
	    $(document).ready(function() {
	        $('.fancybox').fancybox();
	    });
	</script>

	<?php $this->need('footer.php'); ?>
