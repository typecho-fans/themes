<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

    <div class="layoutMultiColumn layoutMultiColumn--secondary"> 
     <div class="u-paddingTop50"> 
	 
      <div class="widget"> 
       <div class="heading-title">
        关于博主
       </div> 
       <div class="widget-card"> 
        <div class="widget-card-imageWrapper"> 
         <a href=" " data-action="imageZoomIn"><img src="<?php echo $this->options->avatarUrl; ?>" class="avatar" width="32" height="32" /></a> 
        </div> 
        <div class="widget-card-content">
        <?php $this->options->nickname(); ?>
        </div> 
        <div class="widget-card-description"> 
         <p><?php $this->options->descript(); ?></p> 
         <p class="cute"><a href="<?php $this->options->siteUrl('/about'); ?>">了解更多</a></p>
        </div> 
       </div> 
      </div>

      <div class="widget"> 
       <div class="heading-title">
        Posts
       </div> 
       <ul class="list--withIcon list"> 

		<?php $this->widget('Widget_Contents_Post_Recent','pageSize=6')->to($recent)?>
		<?php while($recent->next()): ?>
		<li class="list-item">
         <div class="list-itemImage">
          <img class="image--outlined" src="<?php echo thumb($recent->cid);?>"/>
         </div>
         <div class="list-itemInfo">
          <h4 class="list-itemTitle"><a href="<?php $recent->permalink();?>"><?php $recent->title();?></a></h4>
          <p class="list-itemDescription"><a href="<?php $recent->permalink();?>" rel="category tag"><?php $recent->category();?></a><span class="middotDivider"></span><?php $recent->author();?></p>
         </div>
		 </li>
		<?php endwhile; ?>

       </ul>
      </div> 
     </div> 
    </div>
