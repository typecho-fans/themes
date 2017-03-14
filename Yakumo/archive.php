<?php $this->need('header.php'); ?>

<body class="tag-template">

    <header id="header" data-url="<?php $this->options->themeUrl('img/header.jpg'); ?>" class="home-header blog-background banner-mask lazy no-cover" style="display: table; background-image: url(<?php $this->options->themeUrl('img/header.jpg'); ?>)">
            <div class="nav-header-container">
                <a href="<?php $this->options->siteUrl(); ?>" class="svg-logo" target="_blank">
                    <span class="svg-logo"> 
                        <img src="<?php $this->options->themeUrl('img/logo.png'); ?>" style="width: 50px;height: 50px;">       
                    </span>
                </a>
            </div>
            <div class="header-wrap">
            <div class="home-info-container">
                <a href="<?php $this->options->siteUrl(); ?>"><h2>Every thing about</h2></a>
                <h4><?php $this->archiveTitle(array(
                            'category'  =>  _t('分类「%s」'),
                            'search'    =>  _t('搜索「%s」'),
                            'tag'       =>  _t('标签「%s」'),
                            'author'    =>  _t('作者「%s」')
                        ), '', ''); ?></h4>
            </div>
            <div class="arrow_down" data-offset="-45">
                   <a href="javascript:;"></a>
            </div>
        </div>
    </header>

    <main class="content" id="main" role="main">
        <?php if ($this->have()): ?>
        <?php while($this->next()): ?>
            <article class="post-in-list">
                <section class="post-excerpt">
                    <a href="<?php $this->permalink() ?>">
                        <p>
                        <img class="lazy" data-url="<?php if(isset($this->fields->cover)){$this->fields->cover();}else{$this->options->themeUrl('img/header.jpg');} ?>" src="<?php if(isset($this->fields->cover)){$this->fields->cover();}else{$this->options->themeUrl('img/header.jpg');} ?>" style="display: block;">
                        </p>
                    </a>
                    <div class="info-mask">
                        <div class="mask-wrapper">
                            <h2 class="post-title">
                                <a href="<?php $this->permalink() ?>">
                                    <?php $this->title() ?>
                                </a>
                                <span style="font-size: 1.6rem">
                                    <?php $this->viewsNum(); ?>
                                </span>
                            </h2>
                            <div class="post-meta">
                                <span class="post-time"><?php $this->date('d M Y'); ?></span>
                                <span class="post-tags">
                                    <?php $this->tags(' ', true, ''); ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="post-excerpt-mirror">
                    <div class="post-excerpt-mirror-mask">
                    <a href="<?php $this->permalink() ?>"><p></p></a>
                        <div class="excert-detail-container">
                            <div class="post-meta">
                                <span class="post-time"><time><?php $this->date('d M Y'); ?></time></span>
                                <h2 class="post-title">
                                    <a href="<?php $this->permalink() ?>">
                                        <?php $this->title() ?>
                                    </a>                                   
                                </h2>
                                <p class="post-short-intro"><?php $this->description(); ?></p>
                                <span class="post-tags">
                                    <?php $this->tags(' ', true, ''); ?>
                                </span>
                                <a href="<?php $this->permalink() ?>" class="btn-post-excerpt">阅读原文</a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

        <?php endwhile; ?>

        <?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>

        <nav class="pagination" role="navigation">			
			<?php $this->pageNav('上一页','下一页',10,'...');?>  					       		
		</nav>
        
        <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=50')->to($tags); ?>
        <div class="widget widget-tag-cloud">
            <div class="all-tags-block">                
                <?php while($tags->next()): ?>
                    <a href="<?php $tags->permalink(); ?>" class="all-tags"><?php $tags->name(); ?></a>
                <?php endwhile; ?>
            </div>
        </div> 
    </main>

    <?php $this->need('footer.php'); ?>
