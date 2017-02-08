<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="page-title group">
    <div class="container">

        <?php if ( $this->is('index') ) : ?>
            <h2><?php echo blogTitle(); ?></h2>

        <?php elseif ( $this->is('post') ): ?>
            <h2><?php $this->category(' <span>/</span> '); ?></h2>
        <?php elseif ( $this->is('single') ): ?>
            <h2><?php echo singleTitle($this); ?><?php if($this->authorId == $this->user->uid): ?> <a href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid;?>" target="_blank" style="color: #00b2d7; font-size: 14px; font-weight: 400;">编辑</a><?php endif; ?></h2>
        <?php elseif ( $this->is('search') ): ?>
            <h1>
                <?php if ( $this->have() ): ?><i class="fa fa-search"></i><?php endif; ?>
                <?php if ( !$this->have() ): ?><i class="fa fa-exclamation-circle"></i><?php endif; ?>
                <?php echo $this->getTotal(); ?> 条搜索结果
            </h1>
        <?php elseif ( $this->is('author') ): ?>
                <h2><i class="fa fa-user"></i>作者: <?php $this->archiveTitle(array(
                            'author'    =>  _t('%s')
                        ), '', ''); ?></h2>
        <?php elseif ( $this->is('category') ): ?>
            <h1><i class="fa fa-folder-open"></i>分类: <span><?php $this->archiveTitle(array(
                        'category'  =>  _t('%s')
                    ), '', ''); ?></span></h1>
            <?php elseif ( $this->_archiveSlug == '404' ): ?>
            <h1><i class="fa fa-exclamation-circle"></i>Error 404. <span><?php _e('页面没找到'); ?></span></h1>
        <?php elseif ( $this->is('date') ): ?>
            <h2><?php $this->archiveTitle(); ?></h2>
            <?php elseif( $this->is('tag')): ?>
            <h2><i class="fa fa-tag"></i>标签: <?php $this->archiveTitle(array(
                    'tag'       =>  _t('%s')
                ), '', ''); ?></h2>
            <?php else: ?>
            <h2><?php $this->title(); ?></h2>

        <?php endif; ?>
    </div>
</div><!--/.page-title-->