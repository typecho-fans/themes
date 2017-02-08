<?php
/**
 *
 * 移植自 AlxMedia 的 Wordpress 主题 <a href="http://alxmedia.se/themes/slanted/">Slanted</a>
 *
 * 需同时安装扩展插件<a href="https://dt27.org/SlantedExtend-for-Typecho/" target="_blank">SlantedExtend</a>
 *
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package Slanted
 * @author DT27
 * @version 1.0.3
 * @link https://dt27.org
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<section class="content">
    <div class="pad group">
        <?php while ($this->next()): ?>
            <article id="post-<?php $this->cid() ?>" class="group post">
                <div class="post-inner post-hover">

                    <div class="post-date">
                        <div class="post-date-day">
                            <div class="format-box"><?php $this->date('D'); ?></div>
                            <?php $this->day() ?>
                        </div>
                        <div class="post-date-month"><a href="<?php $this->options->siteUrl(); ?><?php $this->year() ?>/<?php $this->month(); ?>/" title="<?php echo $this->year.'年'.$this->month.'月'; ?>"><?php $this->month() ?></a></div>
                        <div class="post-date-year"><a href="<?php $this->options->siteUrl(); ?><?php $this->year() ?>/" title="<?php echo $this->year.'年'; ?>"><?php $this->year() ?></a></div>
                    </div>
                    <div class="post-comments">
                        <?php if ($this->options->activeViews): ?>
                            <a href="<?php $this->permalink() ?>" title="浏览量"><span><i
                                        class="fa fa-eye"></i><?php echo SlantedExtend_Plugin::theViews(NULL, NULL, 0); ?></span></a>
                        <?php endif; ?>
                        <a href="<?php $this->permalink() ?>#comments" title="评论数"><span><i
                                    class="fa fa-comments-o"></i><?php echo $this->commentsNum(); ?></span></a>
                    </div>
                    <?php if ($this->options->isExcerpt == '1' && $this->fields->thumbUrl): ?>
                        <div class="post-thumbnail small">
                            <a href="<?php $this->permalink(); ?>" title="<?php $this->title(); ?>">
                                <img width="320" height="320" sizes="(max-width: 320px) 100vw, 320px"
                                     alt="<?php $this->title(); ?>"
                                     class="attachment-thumb-list size-thumb-list wp-post-image"
                                     src="<?php $this->fields->thumbUrl(); ?>">
                            </a>
                        </div><!--/.post-thumbnail-->
                    <?php endif; ?>

                    <h2 class="post-title">
                        <a href="<?php $this->permalink(); ?>" rel="bookmark"
                           title="<?php $this->title(); ?>"><?php $this->title(); ?></a>
                        <?php if($this->authorId == $this->user->uid): ?> <a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank" style="color: #00b2d7; font-size: 14px; font-weight: 400;">编辑</a><?php endif; ?>
                    </h2><!--/.post-title-->

                    <div class="entry excerpt">
                        <?php if($this->options->isExcerpt == '1'): ?>
                        <?php $this->excerpt($this->options->excerptLength); ?>
                        <?php else: ?>
                        <?php $this->content(); ?>
                        <?php endif; ?>
                    </div><!--/.entry-->
                    <a title="<?php $this->title(); ?>" href="<?php $this->permalink(); ?>" class="more-link">- 阅读全文 -</a>
                </div>
                <!--/.post-inner-->
            </article><!--/.post-->
        <?php endwhile; ?>

        <?php if (ceil($this->getTotal() / $this->parameter->pageSize) > 1): ?>
            <nav class="pagination group">
                <div class="page-navigator">
                    <?php  if(ceil($this->getTotal() / $this->parameter->pageSize)!=$this->request->page): ?>
                    <span class="pages">更多内容请翻页</span>
                    <?php
                    endif;
                    $this->pageNav('&laquo;', '&raquo;', 5, '...', array(
                        'wrapTag' => 'div',
                        'wrapClass' => '',
                        'itemTag' => '',
                        'textTag' => 'a',
                        'currentClass' => 'current',
                        'prevClass' => 'previouspostslink',
                        'nextClass' => 'nextpostslink'
                    )); ?>
                </div>
            </nav>
        <?php endif; ?>
    </div><!--/.pad-->
</section><!--/.content-->
<?php $this->need('footer.php'); ?>
