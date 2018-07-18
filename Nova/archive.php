<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<div id="content">
  <?php if ($this->have()): ?>
    <?php while($this->next()): ?>
      <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h2 class="post-title" itemprop="name headline"><a itemtype="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
        <ul class="post-meta">
          <li class="icon-user" itemprop="author" itemscope itemtype="http://schema.org/Person"></li>&nbsp;<a itemprop="name" href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author('screenName'); ?></a>
          <li class="icon-calendar"></li>&nbsp;<time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date("M jS, Y"); ?></time>
          <li class="icon-archive"></li>&nbsp;<?php $this->category(','); ?>
        </ul>
        <div class="post-content" itemprop="articleBody">
          <?php $this->content('- 阅读剩余部分 -'); ?>
        </div>
      </article>
    <?php endwhile; ?>
  <?php else: ?>
    <article class="post">
      <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
    </article>
  <?php endif; ?>

  <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div>

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
