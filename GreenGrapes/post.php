<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit(0);
$this->need('header.php');
?>
<?php
$hidden_sidebar =  !empty($this->options->ShowBlock) && in_array('HiddenSidebarInDetail', $this->options->ShowBlock, true);
?>
<div id="m-container" class="container">
    <div class="row">
        <div class="col-md-<?php echo $hidden_sidebar? '12' : '8' ?>">
            <div id="article-list">
                <article class="post-article clearfix">
                    <div class="article-header">
                        <h2 class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                        <p class="post-big-info">
                            <span class="badge badge-skin"><i class="fa fa-fw fa-user"></i> <a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
                            <span class="badge badge-skin"><i class="fa fa-fw fa-tags"></i> <?php $this->category(','); ?></span>
                            <span class="badge badge-skin"><i class="fa fa-fw fa-calendar"></i> <?php $this->date('Y-m-d'); ?></span>
                            <?php if (class_exists('TeStat_Plugin') && isset($this->options->plugins['activated']['TeStat'])): ?>
                            <span class="badge badge-skin"><i class="fa fa-fw fa-eye"></i> <?php $this->viewsNum(); ?> 次浏览</span>
                            <span class="badge badge-skin"><i class="fa fa-fw fa-thumbs-o-up"></i> <span class="like-num-show"><?php $this->likesNum(); ?></span> 次点赞</span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <div class="article-content clearfix">
                        <?php echo ArticleCatalog::instance()->renderHtml($this->content); ?>
                    </div>
                    <?php if($this->allow('ping')): ?>
                        <div class="article-copyright">
                            <div class="article-license">
                                <img height="24" src="<?php $this->options->themeUrl('img/creative-commons-cc.png'); ?>" class="mb5" alt="知识共享署名声明"><br>
                                <div class="license-item text-muted">
                                    本文由 <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a> 创作，采用 <a class="alert-link" target="_blank" href="https://creativecommons.org/licenses/by/3.0/cn">知识共享署名 3.0</a>，可自由转载、引用，但需署名作者且注明文章出处。
                                </div>

                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if(class_exists('Reward_Plugin') && isset($this->options->plugins['activated']['Reward'])): ?>
                        <?php
                        $extra_str = '';
                        if (class_exists('TeStat_Plugin') && isset($this->options->plugins['activated']['TeStat'])) {
                            $extra_str = '<button class="btn btn-info btn-like text-white" type="button" data-cid="' . $this->cid . '"><i class="fa fa-fw fa-thumbs-o-up"></i> 仅点赞 <span class="like-num-show">' . $this->likesNum . '</span></button>';
                        }
                        ?>
                        <?php Reward_Plugin::show_reward($extra_str); ?>
                        <?php Reward_Plugin::show_modal(); ?>
                    <?php endif; ?>
                    <?php
                        if (class_exists('TeStat_Plugin') && isset($this->options->plugins['activated']['TeStat'])) {
                             _e('<button class="btn btn-info btn-like text-white" type="button" data-cid="' . $this->cid . '"><i class="fa fa-fw fa-thumbs-o-up"></i> 点赞 <span class="like-num-show">' . $this->likesNum . '</span></button>');
                        }
                    ?>
                </article>

            </div>
        <?php if (empty($this->options->ShowBlock) || !in_array('HiddenPostBottomBar', $this->options->ShowBlock, true)): ?>
            <div class="block">
                <ul class="post-near">
                    <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
                    <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
                </ul>
            </div>
        <?php endif; ?>
            <?php $this->need('comments.php'); ?>

        </div>

    <?php if (!$hidden_sidebar): ?>
        <div id="sidebar" class="col-md-4">
            <?php $this->need('sidebar-post-catalog.php'); ?>
        </div>
    <?php endif; ?>
    </div>
</div>
<?php $this->need('footer.php');
