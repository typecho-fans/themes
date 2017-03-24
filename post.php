<?php $this->need('header.php'); ?>
<div id="m-container" class="container">
    <div class="col-md-8">
        <div id="article-list">
            <article class="post-article clearfix">
                <div>
                    <h2 class="title"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
                    <p class="post-big-info">
                        <span class="label label-green"><i class="fa fa-user"></i> <a href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></span>
                        <span class="label label-green"><i class="fa fa-tags"></i> <?php $this->category(','); ?></span>
                        <span class="label label-green"><i class="fa fa-calendar"></i> <?php $this->date('Y-m-d'); ?></span>

                    </p>
                </div>
                <div class="article-content clearfix">
                    <?php $this->content(); ?>
                </div>
                <?php if($this->allow('ping')): ?>
                    <div class="article-copyright">
                        <div class="article-license">
                            <img height="24" src="<?php $this->options->themeUrl('img/creativecommons-cc.png'); ?>" class="mb5"><br>
                            <div class="license-item text-muted">
                                本文由 <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a> 创作，采用 <a class="alert-link" target="_blank" href="http://creativecommons.org/licenses/by/3.0/cn">知识共享署名 3.0</a>，可自由转载、引用，但需署名作者且注明文章出处。
                            </div>

                        </div>
                    </div>
                <?php endif; ?>
                <?php if(class_exists('Reward_Plugin') && isset($this->options->plugins['activated']['Reward'])): ?>
                    <?php Reward_Plugin::show_reward(); ?>
                    <?php Reward_Plugin::show_modal(); ?>
                <?php endif; ?>
            </article>

        </div>
    <?php if (!empty($this->options->ShowBlock) && in_array('ShowPostBottomBar', $this->options->ShowBlock)): ?>
        <div class="block">
            <ul class="post-near">
                <li>上一篇: <?php $this->thePrev('%s','没有了'); ?></li>
                <li>下一篇: <?php $this->theNext('%s','没有了'); ?></li>
            </ul>
        </div>
    <?php endif; ?>
        <?php $this->need('comments.php'); ?>

    </div>
    <div class="col-md-4">
        <?php $this->need('sidebar.php'); ?>
    </div>

</div>
<?php $this->need('footer.php');
