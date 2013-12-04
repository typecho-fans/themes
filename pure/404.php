<?php $this->need('header.php'); ?>

        <div role="main" id="main">
            <div class="content">
                <article role="article" class="post">
                    <h1 class="entry-title">404 - <?php _e('页面没找到'); ?></h1>
                    <div class="entry-content">
                        <p>
                            <form method="post">
                                <input type="text" name="s" class="text" size="20" />
                                <input type="submit" class="submit" value="<?php _e('搜索'); ?>" />
                            </form>
                        </p>
                    </div>
                </article>
            </div><!--=E .content -->
        </div><!--=E #main -->

<?php $this->need('footer.php'); ?>