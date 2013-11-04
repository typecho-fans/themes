            <aside id="sidebar" role="complementary">

<?php if (empty($this->options->sidebarBlock) || in_array('ShowCategory', $this->options->sidebarBlock)): ?>
                <section class="categories">
                    <h3>Categories</h3>
                    <div class="double-line"></div>
                    <ul>
<?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
<?php while ($categories->next()): ?>
                        <li<?php if ($this->is('category', $categories->slug)): ?> class="current"<?php endif; ?>><a href="<?php $categories->permalink(); ?>"><?php $categories->name(); ?></a><span class="cat-number"><?php $categories->count(); ?></span></li>
<?php endwhile; ?>
                    </ul>
                </section>
<?php endif; ?>

<?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
                <section class="latest-posts">
                    <h3>Latest Posts</h3>
                    <div class="double-line"></div>
                    <ul>
<?php $this->widget('Widget_Contents_Post_Recent')->to($latestPost); ?>
<?php while ($latestPost->next()): ?>
                        <li><a href="<?php $latestPost->permalink(); ?>"><?php $latestPost->title('16', ''); ?></a><span class="post-time"><?php $latestPost->date('m.d'); ?></span></li>
<?php endwhile; ?>
                    </ul>
                </section>
<?php endif; ?>

<?php if (empty($this->options->sidebarBlock) || in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
                <section class="recent-comments">
                    <h3>Recent Comments</h3>
                    <div class="double-line"></div>
                    <ul>
<?php $this->widget('Widget_Comments_Recent', 'pageSize=8&ignoreAuthor=true')->to($comments); ?>
<?php while ($comments->next()): ?>
                        <li><a href="<?php $comments->permalink(); ?>" title="<?php $comments->author(false); ?>: <?php $comments->excerpt(50, '...'); ?>"><img src="http://0.gravatar.com/avatar/<?php echo MD5(trim($comments->mail)); ?>?s=52" alt="Comments author avatar" class="comments-img" /></a></li>
<?php endwhile; ?>
                    </ul>
                </section>
<?php endif; ?>
                
<?php if (empty($this->options->sidebarBlock) || in_array('ShowArchive', $this->options->sidebarBlock)): ?>
                <section class="archives">
                    <h3>Archives</h3>
                    <div class="double-line"></div>
                    <ul>
<?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')->to($archives); ?>
<?php while ($archives->next()): ?>
                        <li><a href="<?php $archives->permalink(); ?>"><?php $archives->date(); ?></a><span class="arc-number"><?php $archives->count(); ?></span></li>
<?php endwhile; ?>
                    </ul>
                </section>
<?php endif; ?>
                
<?php if (empty($this->options->sidebarBlock) || in_array('ShowSearch', $this->options->sidebarBlock)): ?>
                <section class="search">
                    <h3>Search</h3>
                    <div class="double-line"></div>
                    <div class="search-wrapper">
                        <form method="post" class="searchform" action="/">
                            <input type="text" name="s" class="search-input" placeholder="Search...">
                            <input type="submit" value="" class="search-button">
                        </form>
                    </div>
                </section>
<?php endif; ?>
            </aside><!--=E Aside -->
