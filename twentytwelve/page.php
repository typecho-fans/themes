<?php $this->need('header.php'); ?>
<div id="primary" class="site-content">
	<div id="content" role="main">			
	<article class="page type-page status-publish hentry">
    	<header class="entry-header">
        	<h1 class="entry-title">
            	<?php $this->title() ?>
            </h1>
        </header>                    
        <div class="entry-content">
        	<?php $this->content() ?>
        </div>
        <footer class="entry-meta">
        </footer>
    </article>

	<?php $this->need('comments.php'); ?>
	</div>
</div>

	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>


