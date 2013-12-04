<?php $this->need('header.php'); ?>

        <div role="main" id="main">
            <div class="content">
                <article role="article" class="post">
                    <h1 class="entry-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                    <div class="entry-content">
                        <?php $this->content(); ?>

                    </div>
                    <div class="entry-data">
                        <div class="time">
                            <span class="year"><?php $this->date('Y'); ?></span>
                            <span class="month"><?php $this->date('n'); ?>月</span>
                            <span class="day"><?php $this->date('d'); ?></span>
                        </div>
                    </div>
                </article>
            </div><!--=E .content -->
        </div><!--=E #main -->

<?php $this->need('footer.php'); ?>