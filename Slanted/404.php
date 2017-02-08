<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
    <section class="content">
        <div class="pad group">
            <div class="notebox">
                <div class="entry">
                    <p><?php _e('你想查看的页面已被转移或删除了, 要不要搜索看看: ', 'slanted'); ?></p>
                </div>
                <div class="search-again">
                    <form method="post" action="" class="searchform themeform">
                        <div><input type="text" name="s" class="text" size="32" value="输入搜索词后回车搜索"
                                    onfocus="if(this.value=='输入搜索词后回车搜索')this.value='';"
                                    onblur="if(this.value=='')this.value='输入搜索词后回车搜索';"/></div>
                    </form>
                </div>
            </div>
        </div>
        <!--/.pad-->
    </section><!--/.content-->
<?php $this->need('footer.php'); ?>