    <aside role="complementary" id="aside">
        <div class="aside-inner">
            <figure class="author-avatar">
                <a class="avatar-link" href="<?php $this->options->siteUrl(); ?>"><img class="avatar-photo" src="<?php if (!empty($this->options->cdnUrl)): ?><?php echo $this->options->cdnUrl . '/usr/themes/pure/images/avatar.jpg'; ?><?php else: ?><?php $this->options->themeUrl('images/avatar.jpg'); ?><?php endif; ?>" alt="作者个性头像" width="170" height="170" /></a>
            </figure>
            <nav role="navigation" id="nav">
                <ul class="nav-menu">
                    <li class="menu-item">
                        <a class="menu-item-link search-link" href="">搜索</a>
                        <form method="post" action="<?php $this->options->siteUrl(); ?>">
                            <input class="search-txt" type="search" name="s" placeholder="输入要搜索的内容">
                        </form>
                    </li>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<?php if ($pages->slug != 'themes'): ?>
                    <li class="menu-item<?php if($this->is('page', $pages->slug)): ?> current<?php endif; ?>"><a class="menu-item-link" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
<?php endif; ?>
<?php endwhile; ?>
                    <li class="menu-item"><a class="menu-item-link" href="<?php $this->options->feedUrl(); ?>">RSS</a></li>
                    <li class="menu-item backtop"><a class="menu-item-link top-link" href="#">顶部</a></li>
                </ul>
            </nav>
        </div>
    </aside><!--=E #aside -->