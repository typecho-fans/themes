<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit(0); ?>
<aside>
    <div class="card card-skin hidden-xs">
        <div class="card-header"><i class="fa fa-fw fa-th-list"></i> 文章目录</div>
        <div class="card-body sidebar-catalog px-0">
            <?php echo ArticleCatalog::instance()->renderCatalogHtml(); ?>
        </div>
    </div>
</aside>
