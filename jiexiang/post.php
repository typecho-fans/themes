<?php $this->need('header.php'); ?>

        <div id="main">
            <div id="page-title-bg">
                <div class="page-title-inner">
                    <h1 class="page-title"><span class="cross"></span><?php $this->title() ?></h1>
                </div>
            </div><!--=E #page-title-bg -->
            
            <div id="container" class="clearfix">
                <div id="content">
                    <article class="post">
                        <!--<h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>-->
                        <?php $this->content(); ?>

                    </article><!--=E .post -->
                    
<?php $this->need('comments.php'); ?>
                </div><!--=E #content -->
                
<?php $this->need('sidebar.php'); ?>

            </div><!--=E #container -->
        </div><!--=E #main -->
<?php $this->need('footer.php'); ?>
