<?php $this->need('header.php'); ?>

    <div id="main">
        <div id="content-container" class="<?php if ($this->options->sidebarDisplay != 'full'): ?><?php if ($this->options->sidebarDisplay == 'left'): ?> layout-left<?php else: ?> layout-right<?php endif; ?><?php else: ?>layout-full<?php endif; ?>">
            <div id="content" role="main">
                <article class="post">
                    <header>
                        <h1 class="post-title"><?php $this->title() ?></h1>
                        <p class="post-info"><?php $this->category(' / '); ?> Posted by <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a><span class="comments"> / <a href="<?php $this->permalink(); ?>#comments"><?php $this->commentsNum('0', '1', '%d'); ?></a> comments</span></p>
                        <div class="post-date"><span><?php dateConvert($this->date->month); ?></span><span><?php $this->date('d'); ?></span></div>
                    </header>
                    <section class="post-content">
                        <?php $this->content(); ?>

                    </section>
                    <footer></footer>
                </article>
                
<?php $this->need('comments.php'); ?>
            </div><!--=E #content -->
            
<?php if ($this->options->sidebarDisplay != 'full'): ?>
<?php $this->need('sidebar.php'); ?>
<?php endif; ?>
            <div class="clear"></div>
        </div><!--=E #content-container -->
    </div><!--=E #main -->
<?php $this->need('footer.php'); ?>
