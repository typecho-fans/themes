<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<section class="content">

    <div class="post-time"><?php $this->date('Y-m-d H:i'); ?><?php if($this->authorId == $this->user->uid): ?> <a href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid;?>" target="_blank">编辑</a><?php endif; ?></div>
    <div class="pad group">

        <article>
            <h1 class="post-title"><?php $this->title(); ?></h1>
            <div class="entry">
                <?php $this->content(); ?>
                <div class="clear"></div>
            </div><!--/.entry-->
        </article><!--/.post-->

        <div class="clear"></div>

        <p class="post-tags"><span><?php _e('标签: '); ?></span><?php $this->tags(', ', true, 'none'); ?></p>

        <?php if($this->options->isShare == '1'): ?>
        <?php $this->need('inc/share.php'); ?>
        <?php endif; ?>

        <div class="clear"></div>
<?php if($this->fields->isOriginal): ?>
        <div class="author-bio">
            <div class="bio-avatar"><?php $this->author->gravatar('128'); ?></div>
            <p class="bio-name"><a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></p>
            <p class="bio-desc">原创文章，欢迎转载。转载请注明：转载自<a href="<?php $this->permalink(); ?>" target="_blank"> <?php $this->options->title() ?></a>，谢谢！<br>原文链接：<?php $this->permalink(); ?></p>
            <div class="clear"></div>
        </div>
<?php endif; ?>

        <div class="clear"></div>

        <?php $this->related(3)->to($relatedPosts); ?>
        <?php if($relatedPosts->have()): ?>
        <h4 class="heading">
            <i class="fa fa-hand-o-right"></i>你可能还喜欢...
        </h4>
        <ul class="widget related-posts group thumbs-enabled" style="display: block;">
            <?php while ($relatedPosts->next()): ?>
                    <li>
                        <?php if($relatedPosts->fields->thumbUrl): ?>
                            <div class="tab-item-thumbnail">
                                <a title="<?php $relatedPosts->title(); ?>" href="<?php $relatedPosts->permalink(); ?>">
                                    <img width="200" height="200" sizes="(max-width: 200px) 100vw, 200px" alt="<?php $relatedPosts->title(); ?>" class="attachment-thumb-small size-thumb-small wp-post-image" src="<?php $relatedPosts->fields->thumbUrl(); ?>">																																		</a>
                            </div>
                        <?php endif; ?>

                        <div class="related-inner group post">
                            <h4 class="post-title"><a title="<?php $relatedPosts->title(); ?>" rel="bookmark" href="<?php $relatedPosts->permalink(); ?>"><?php $relatedPosts->title(); ?></a></h4>
                            <p class="tab-item-date"><?php $relatedPosts->date('j M, Y'); ?></p>					</div>

                    </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>

        <?php $this->need('comments.php'); ?>

    </div><!--/.pad-->
</section><!--/.content-->

<?php if($this->is('post')) : ?>
    <?php $this->need('sidebar.php'); ?>
<?php endif;?>
<?php $this->need('footer.php'); ?>
