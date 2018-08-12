<?php $this->need('header.php'); ?>

        <div id="main">
            <div id="page-title-bg">
                <div class="page-title-inner">
                    <h1 class="page-title"><span class="cross"></span>404 - <?php _e('页面没找到'); ?></h1>
                </div>
            </div><!--=E #page-title-bg -->
            
            <div id="container" class="clearfix">
                <div id="content">
                    <article class="post">
                        <p>
                            <form method="post">
                                <div><input type="text" name="s" class="text" size="20" /> <input type="submit" class="submit" value="<?php _e('搜索'); ?>" /></div>
                            </form>
                        </p>
                    </article><!--=E .post -->
                </div><!--=E #content -->
                
<?php $this->need('sidebar.php'); ?>

            </div><!--=E #container -->
        </div><!--=E #main -->
<?php $this->need('footer.php'); ?>
