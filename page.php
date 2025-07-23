<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit(0);
$this->need('header.php');
?>
<div id="m-container" class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="article-list">
                <article class="post-article clearfix">
                    <div class="article-header">
                        <h2 class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                        <p class="post-big-info">
                            <span class="badge badge-skin"><i class="fa fa-fw fa-user"></i> <a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
                            <span class="badge badge-skin"><i class="fa fa-fw fa-calendar"></i> <?php $this->date('Y-m-d'); ?></span>
                            <?php if (class_exists('TeStat_Plugin') && isset($this->options->plugins['activated']['TeStat'])): ?>
                            <span class="badge badge-skin"><i class="fa fa-fw fa-eye"></i> <?php $this->viewsNum(); ?> 次浏览</span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="article-content clearfix">
                        <?php $this->content(); ?>
                    </div>
                </article>
            </div>
            <?php $this->need('comments.php'); ?>
        </div>
        <div id="sidebar" class="col-md-4">
            <?php $this->need('sidebar.php'); ?>
        </div>
    </div>
</div>
<?php $this->need('footer.php');
