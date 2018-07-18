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
</article>

<section id="comment-list">
  <?php $this->need('comments.php'); ?>
</section>
<?php $this->need('footer.php'); ?>
