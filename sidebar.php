<aside id="sidebar">
    <aside>
        <form method="get" id="searchform" class="form-inline clearfix" action="./">
            <input class="form-control" name="s" id="s" placeholder="搜索关键词..." type="text">
            <button class="btn btn-green btn-small"><i class="fa fa-search"></i> 查找</button>
        </form>
    </aside>
    <aside>
        <div class="panel widget-sets hidden-xs">
            <ul class="nav nav-pills">
                <li class="active"><a href="#sidebar-new" data-toggle="tab">最新文章</a></li>
                <li class=""><a href="#sidebar-comment" data-toggle="tab">最新评论</a></li>
                <li class=""><a href="#sidebar-rand" data-toggle="tab">随机文章</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane nav bs-sidenav fade active in" id="sidebar-new">
                    <ul class="list-group">
                        <?php $this->widget('Widget_Contents_Post_Recent')
                            ->parse('<li class="list-group-item clearfix"><a href="{permalink}">{title}</a></li>'); ?>
                    </ul>
                </div>
                <div class="tab-pane fade" id="sidebar-comment">
                    <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
                    <?php while($comments->next()): ?>
                        <li class="list-group-item clearfix"><?php $comments->author(false); ?>：<a href="<?php $comments->permalink(); ?>" target="_blank"><?php $comments->excerpt(35, '...'); ?></a></li>
                    <?php endwhile; ?>
                        </ul>
                </div>
                <div class="tab-pane nav bs-sidenav fade" id="sidebar-rand">
                    <?php theme_random_posts();?>
                </div>
            </div>
        </div>
    </aside>
    <?php if(class_exists('Links_Plugin') && isset($this->options->plugins['activated']['Links'])): ?>
    <aside>
        <div class="panel panel-green hidden-xs">
            <div class="panel-heading"><i class="fa fa-link fa-fw"></i> 友情链接</div>
            <ul class="list-group">
                <?php Links_Plugin::output('<li class="list-group-item"><a href="{url}" target="_blank">{name}</a></li>', 10, NULL, true); ?>
            </ul>
        </div>
    </aside>
    <?php endif; ?>
    <?php if(false): ?>
    <aside>
        <div class="panel panel-green hidden-xs">
            <div class="panel-heading"><i class="fa fa-book fa-fw"></i> 文章分类</div>
            <div class="list-group category">
                <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
            </div>
        </div>
    </aside>
    <?php endif; ?>
    <div id="fixed"></div>
    <aside class="fixsidebar">
        <div class="panel panel-green hidden-xs">
            <div class="panel-heading"><i class="fa fa-tags fa-fw"></i> 标签云</div>
            <div id="meta-cloud">
            <canvas height="300" id="mycanvas" style="width: 100%">
                <p>标签云</p>
                <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
                <?php $this->widget('Widget_Metas_Tag_Cloud')->parse('<a href="{permalink}" class="tag">{name}</a>'); ?>
            </canvas>
            </div>
        </div>
    </aside>

</aside>