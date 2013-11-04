
</div><!--=E .container -->
    
<footer id="footer" role="contentinfo">
<?php if ($this->options->footerDisplay == 'display'): ?>
    <div id="ancillary">
<?php if (!empty($this->options->footerBlock) && in_array('FooterPosts', $this->options->footerBlock)): ?>
        <div class="four-columns">
            <section class="blog-posts">
                <h3>Latest Posts</h3>
                <hr>
                <ul>
<?php $this->widget('Widget_Contents_Post_Recent@footerPost', 'pageSize=6')->to($blogPosts); ?>
<?php while ($blogPosts->next()): ?>
                    <li><a href="<?php $blogPosts->permalink(); ?>"><?php $blogPosts->title('15', ''); ?></a></li>
<?php endwhile; ?>
                </ul>
            </section>
        </div>
<?php endif; ?>

<?php if (empty($this->options->footerBlock) || in_array('FooterComments', $this->options->footerBlock)): ?>
        <div class="four-columns">
            <section class="blog-comments">
                <h3>Recent Comments</h3>
                <hr>
                <ul>
<?php $this->widget('Widget_Comments_Recent@footerComments', 'pageSize=4&ignoreAuthor=true')->to($blogComments); ?>
<?php while ($blogComments->next()): ?>
                    <li>
                        <a href="<?php $blogComments->permalink(); ?>"><img src="http://0.gravatar.com/avatar/<?php echo MD5(trim($blogComments->mail)); ?>?s=32"  alt="Comments author avatar" /></a>
                        <div class="ds-meta"><a href="<?php $blogComments->permalink(); ?>"><?php $blogComments->author(false); ?></a><span class="ds-time"><?php $blogComments->dateword(); ?></span></div>
                        <a href="<?php $blogComments->permalink(); ?>"><?php $blogComments->excerpt(10, '...'); ?></a>
                    </li>
<?php endwhile; ?>
                </ul>
            </section>
        </div>
<?php endif; ?>

<?php if (empty($this->options->footerBlock) || in_array('FooterTags', $this->options->footerBlock)): ?>
        <div class="four-columns">
            <section class="blog-tags">
                <h3>Tags</h3>
                <hr>
                <div class="tagcloud">
<?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=30')->to($tags); ?>
<?php if ($tags->have()): ?>
<?php while ($tags->next()): ?>
                    <a href="<?php $tags->permalink(); ?>" class="size-<?php $tags->split(5, 10, 20, 30); ?>" title="<?php $tags->count(); ?> 个话题"><?php $tags->name(); ?></a>
<?php endwhile; ?>
<?php else: ?>
                    <span><?php _e('没有任何标签'); ?></span>
<?php endif; ?>
                </div>
            </section>
        </div>
<?php endif; ?>

<?php if (empty($this->options->footerBlock) || in_array('FooterCategory', $this->options->footerBlock)): ?>
        <div class="four-columns">
            <section class="blog-categories">
                <h3>Categories</h3>
                <hr>
                <ul>
<?php $this->widget('Widget_Metas_Category_List@footerCategories')->to($blogCats); ?>
<?php while ($blogCats->next()): ?>
                    <li><a href="<?php $blogCats->permalink(); ?>"><?php $blogCats->name(); ?></a><span class="cat-number"><?php $blogCats->count(); ?></span></li>
<?php endwhile; ?>
                </ul>
            </section>
        </div>
<?php endif; ?>

<?php if (empty($this->options->footerBlock) || in_array('FooterMisc', $this->options->footerBlock)): ?>
        <div class="four-columns">
            <section class="blog-misc">
                <h3>Misc</h3>
                <hr>
                <ul>
                    <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章'); ?> RSS</a></li>
                    <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论'); ?> RSS</a></li>
<?php if($this->user->hasLogin()): ?>
                    <li><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                    <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
<?php else: ?>
                    <li><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
<?php endif; ?>
                </ul>
            </section>
        </div>
<?php endif; ?>

<?php if (!empty($this->options->footerBlock) && in_array('FooterSearch', $this->options->footerBlock)): ?>
        <div class="four-columns">
            <section class="blog-search">
                <h3>Search</h3>
                <hr>
                <div class="search-wrapper">
                    <form method="post" class="searchform" action="/">
                        <input type="text" name="s" class="search-input" placeholder="Search...">
                        <input type="submit" value="" class="search-button">
                    </form>
                </div>
            </section>
        </div>
<?php endif; ?>
    </div><!--=E #ancillary -->
<?php endif; ?>
    <div id="copyright"><p>Copyright &copy; <?php $this->options->title(); ?> – Powered by <a href="http://typecho.org" target="_blank">Typecho)))</a> - Theme by <a href="http://lcz.me" target="_blank">ShingChi</a></p></div><!--=E #copyright -->
</footer><!--=E Footer -->
<div id="shangxia"><div id="shang"></div><div id="comt"></div><div id="xia"></div></div>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/slide.js'); ?>"></script>
<?php $this->footer(); ?>
</body>
</html>
