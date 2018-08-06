<?php
/**
 * Bigfa by <a href="https://dearjohn.cn">John</a>
 *
 * @package Bigfa
 * @author John
 * @version 1.0
 * @link https://dearjohn.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="layoutMultiColumn-container"> 
  
    <div class="layoutMultiColumn layoutMultiColumn--primary"> 
     <div class="blockGroup homeGroup u-paddingTop50"> 
        <div class="heading-title">
         最新文章
        </div> 

        <div class="col-mb-12 col-8" id="main" role="main">
          <?php while ($this->next()): ?>
             <article class="block--list block--withoutImage u-clearfix" itemscope="itemscope" itemtype="http://schema.org/Article">
              <h2 class="block-title" itemprop="headline"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>

                    <div class="block-snippet" itemprop="about">
                  <?php $this->excerpt(80,'...'); ?>
                    </div>
              
              <div class="block-postMeta">
                <a href="<?php $this->permalink() ?>"  rel="category tag"><?php $this->category(','); ?></a>
                <span class="middotDivider"></span>
               <a data-no-instant><time class="lately-a" datetime="<?php $this->date('Y-m-d H:i:s'); ?>" itemprop="datePublished"><?php $this->date('Y-m-d H:i:s');?></time></a>
              </div>
            </article>
          <?php endwhile; ?>
        </div> 
     </div> 

     <div class="lists-navigator clearfix">
		<?php $this->pageNav('←','→','2','...'); ?>
	 </div>

    </div>

<?php $this->need('sidebar.php'); ?>

</div> <!-- 对应layoutMultiColumn-container -->

<?php $this->need('footer.php'); ?>
