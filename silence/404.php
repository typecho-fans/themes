<?php $this->need('header.php'); ?>

    <div id="main">
        <div id="content-container" class="<?php if ($this->options->sidebarDisplay != 'full'): ?><?php if ($this->options->sidebarDisplay == 'left'): ?> layout-left<?php else: ?> layout-right<?php endif; ?><?php else: ?>layout-full<?php endif; ?>">
            <div id="content" role="main">
                <article class="post">
                    <header>
                        <h1 class="post-title">404 - <?php _e('页面没找到'); ?></h1>
                    </header>
                    <p>
                    <form method="post">
                        <input type="text" name="s" class="text" size="20" />
                        <input type="submit" id="submit" value="<?php _e('搜索'); ?>" />
                    </form>
                    </p>
                </article>
            </div><!--=E #content -->
            
<?php if ($this->options->sidebarDisplay != 'full'): ?>
<?php $this->need('sidebar.php'); ?>
<?php endif; ?>
            <div class="clear"></div>
        </div><!--=E #content-container -->
    </div><!--=E #main -->
<?php $this->need('footer.php'); ?>
