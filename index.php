<?php
/**
 * 绿葡萄的主题, 一款有科技感颗粒，自定义头像的， 好看的标签云的响应式模板。
 *
 * @package GreenGrapes
 * @author hongweipeng
 * @version 2.0.0
 * @link https://github.com/hongweipeng/GreenGrapes
 */
$this->need('header.php');
?>

<div id="m-container" class="container">
    <div class="row ml-0 mr-0">
    <div class="col-md-8 pl-0 pr-0">
        <div id="article-list">
            <?php while($this->next()): ?>
            <article class="post-article clearfix">
                <section class="">
                    <div class="category-cloud"><?php $this->category(''); ?></div>
                    <h3 class="title">
                        <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
                    </h3>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 article-content">
                            <?php $this->content(); ?>
                        </div>
                    </div>
                    <hr>
                    <div class="pull-left">
                        <a class="btn btn-skin" href="<?php $this->permalink() ?>">阅读全文</a>
                    </div>
                    <div class="pull-right post-info">
                        <span><i class="fa fa-fw fa-calendar"></i> <?php $this->date('Y-m-d'); ?></span>
                        <span><i class="fa fa-fw fa-user"></i> <a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
                        <span><i class="fa fa-fw fa-comment"></i> <a href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('%d 条评论'); ?></a></span>
                        <?php if (class_exists('TeStat_Plugin') && isset($this->options->plugins['activated']['TeStat'])): ?>
                        <span><i class="fa fa-fw fa-eye"></i> <?php $this->viewsNum(); ?> 次浏览</span>
                        <?php endif; ?>
                    </div>
                </section>
            </article>
            <?php endwhile; ?>
        </div>
        <!-- 分页按钮 -->
        <div class="page-nav">
            <nav>
                <?php $this->pageNav('&laquo;', '&raquo;', 3, '...', array(
                    'itemTag'       =>  'li',
                    'textTag'       =>  'span',
                    'currentClass'  =>  'page-item disabled',
                    'prevClass'     =>  'prev',
                    'nextClass'     =>  'next',
                    'wrapTag'       =>  'ul',
                    'wrapClass'     =>  'pagination'
                )); ?>
            </nav>
        </div>
    </div>
    <div class="col-md-4">
        <?php $this->need('sidebar.php'); ?>
    </div>
    </div>
</div>
<?php $this->need('footer.php');
