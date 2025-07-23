<?php

/**
 * 文章归档页
 *
 * @package custom
 */

$this->need('header.php');
?>
    <div id="m-container" class="container">
        <div class="row">
            <?php
            $page = (int) $this->request->get('page', 1);
            $pageSize = empty($this->options->ArchivePageSize) ? 20 : (int) $this->options->ArchivePageSize;
            $recent = RecentSplitPage::alloc(['pageSize' => $pageSize, 'currentPage' => $page]);
            $total = $recent->getTotal();
            ?>
            <div class="col-md-8 archive-timeline">
                <div class="alert alert-info">共有 <?php _e($total); ?> 篇文章</div>
                <div class="bg-white pt-1 pb-1">
                    <div class="archive-content">
                        <?php $groupYear = ''; ?>
                        <?php while ($recent->next()): ?>
                            <?php if ($groupYear !== date('Y', $recent->created)) :?>
                                <?php $groupYear = date('Y', $recent->created); ?>
                                <div class="timeline-big-dot">
                                    <span class="timeline-year mt-4 mb-4 ms-3"><?php _e($groupYear); ?></span>
                                </div>
                            <?php endif; ?>
                            <div class="line">
                                <div class="d-flex line-item">
                                    <div class="small me-2">
                                        <time datetime="<?php $recent->date("Y-m-d H:i:s"); ?>" content="<?php $recent->date('Y-m-d'); ?>" data-bs-toggle="tooltip" title="<?php $recent->date("Y-m-d H:i:s"); ?>">
                                            <?php $recent->date('m-d'); ?>
                                        </time>
                                    </div>
                                    <div class="d-inline flex-grow-1">
                                        <a href="<?php $recent->permalink() ?>" data-bs-trigger="hover" data-bs-content="<?php $recent->excerpt() ?>" data-bs-toggle="popover" itemprop="url" target="_blank" rel="noopener noreferrer">
                                            <?php $recent->title() ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <div class="page-nav timeline-big-dot">
                            <nav class="ms-3">
                                <?php
                                //分页
                                $query = $this->request->makeUriByRequest('page={page}');
                                $pageNav = new Typecho\Widget\Helper\PageNavigator\Box($total, $page, $pageSize, $query);
                                echo '<ul class="pagination">';
                                $pageNav->render('&laquo;', '&raquo;', 3, '...', array(
                                    'itemTag'       =>  'li',
                                    'textTag'       =>  'span',
                                    'currentClass'  =>  'page-item disabled',
                                    'prevClass'     =>  'prev',
                                    'nextClass'     =>  'next',
                                ));
                                echo '</ul>';
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sidebar" class="col-md-4">
                <?php $this->need('sidebar.php'); ?>
            </div>
        </div>

    </div>
<?php $this->need('footer.php');
