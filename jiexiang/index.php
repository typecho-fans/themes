<?php
/**
 * 结香
 * 
 * @package JieXiang 
 * @author ShingChi
 * @version 1.0.1
 * @link http://lcz.me
 */
 
 $this->need('header.php');
 ?>

        <div id="main">
            <div id="page-title-bg">
                <div class="page-title-inner">
                    <h1 class="page-title"><span class="cross"></span>Blog</h1>
                </div>
            </div><!--=E #page-title-bg -->
            
            <div id="container" class="clearfix">
                <div id="content">
                    <div id="post-group" class="clearfix">
<?php while($this->next()): ?>
                        <article class="post">
                            <h1 class="post-title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h1>
                            <div class="post-content">
                                <?php $this->content('Read More'); ?>

                            </div>
                        </article>
<?php endwhile; ?>
                    </div><!--=E #post-group -->
                    
                    <nav class="pagination clearfix">
                        <?php $this->pageNav('&laquo; Previous', 'Next &raquo;'); ?>

                    </nav>
                </div><!--=E #content -->
                
<?php $this->need('sidebar.php'); ?>

            </div><!--=E #container -->
        </div><!--=E #main -->
<?php $this->need('footer.php'); ?>
