<?php    
/**  
 * links
 * @package custom   
 */    
$this->need('header.php');?>   

<div id="content">
  <article>
    <h3 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h3>
    <div class="post-content">
      <?php Links_Plugin::output(); ?>
    </div>
  </article>
</div>
