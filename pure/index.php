<?php
/**
 * 纯净之美
 * 
 * @package Pure
 * @author ShingChi
 * @version 1.0.0
 * @link http://lcz.me
 */
 
 $this->need('header.php');
 ?>

        <div role="main" id="main">
            <div class="content">
<?php while($this->next()): ?>
                <article role="article" class="post">
                    <h1 class="entry-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                    <div class="entry-content">
                        <?php $this->content('阅读剩余部分...'); ?>

                    </div>
                    <div class="entry-data">
                        <a href="<?php $this->permalink() ?>" class="more">//　查看全文</a>
                        <div class="time">
                            <span class="year"><?php $this->date('Y'); ?></span>
                            <span class="month"><?php $this->date('n'); ?>月</span>
                            <span class="day"><?php $this->date('d'); ?></span>
                        </div>
                    </div>
                </article>
<?php endwhile; ?>
            </div><!--=E .content -->
            <nav class="pagination">
                <?php $this->pageNav('&lt;', '&gt;'); ?>

            </nav><!--=E .pagination -->
        </div><!--=E #main -->
<?php $this->need('footer.php'); ?>