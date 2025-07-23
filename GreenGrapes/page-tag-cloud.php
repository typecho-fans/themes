<?php

/**
 * 标签云
 *
 * @package custom
 */

$this->need('header.php');
?>
    <div id="m-container" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="bg-white text-center">
                    <canvas height="700" width="700" id="tag-cloud-tags">
                        <p>标签云</p>
                        <?php $this->widget('\Widget\Metas\Category\Rows')->listCategories('wrapClass=widget-list'); ?>
                        <?php $this->widget('\Widget\Metas\Tag\Cloud')->parse('<a href="{permalink}" class="tag">{name}</a>'); ?>
                    </canvas>
                </div>
            </div>
        </div>
    </div>
<?php $this->need('footer.php');
