<?php $this->need('header.php'); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<header class="page-header">
			<h1 class="page-title">什么也没有找到哟！</h1>
		</header>
		<div class="page-content">
			<p>查找的东西不存在，一定是你记错了，试着搜索一下吧！</p>
			<form role="search" method="get" class="search-form" action="./">
				<label>
					<span class="screen-reader-text">搜索：</span>
					<input type="search" class="search-field" placeholder="搜索&hellip;" value="" name="s" title="搜索：" />
				</label>
				<input type="submit" class="search-submit" value="搜索" />
			</form>	
		</div><!-- .page-content -->

	</div><!-- #content -->
</div><!-- #primary -->

<?php
$this->need('sidebar.php');
$this->need('footer.php');
