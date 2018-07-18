<?php $this->need('header.php'); ?>
<article class="post">
  <header class="post-head">
    <h2 class="post-title">
      <a><?php $this->title(); ?></a>
    </h2>
    <time datetime="<?php $this->date(); ?>" class="post-time"><?php $this->date('F j, Y');?></time>
  </header>
  <section class="post-content typo">
    <?php $this->content(); ?>
  </section>
  <footer class="post-footer clear">
    <span class="post-tags clear">
      <?php $this->category(''); ?>
      <?php $this->tags(''); ?>
    </span>
  </footer>
</article>

<section class="post-next-prev clear">
  <span class="prev"><?php $this->thePrev('%s','已经是第一篇了'); ?></span>
  <span class="next"><?php $this->theNext('%s','已经是最后一篇了'); ?></span>
</section>

<section id="comment-list">
  <?php $this->need('comments.php'); ?>
</section>
<?php $this->need('footer.php'); ?>
