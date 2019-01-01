<?php $this->need('header.php'); ?>
<div id="m-container" class="container">
    <div class="row ml-0 mr-0">
    <div class="col-md-8 pl-0 pr-0">
        <div id="article-list">
            <article class="post-article clearfix">
                <div>
                    <h2 class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                    <p class="post-big-info">
                        <span class="badge badge-skin"><i class="fa fa-fw fa-user"></i> <a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
                        <span class="badge badge-skin"><i class="fa fa-fw fa-tags"></i> <?php $this->category(','); ?></span>
                        <span class="badge badge-skin"><i class="fa fa-fw fa-calendar"></i> <?php $this->date('Y-m-d'); ?></span>
                        <span class="badge badge-skin"><i class="fa fa-fw fa-eye"></i> <?php $this->viewsNum(); ?> 次浏览</span>
                    </p>
                </div>
                <div class="article-content clearfix">
                    <?php $this->content(); ?>
                </div>
            </article>
        </div>
        <?php $this->need('comments.php'); ?>
    </div>
    <div class="col-md-4">
        <?php $this->need('sidebar.php'); ?>
    </div>
    </div>
</div>
<?php $this->need('footer.php');
