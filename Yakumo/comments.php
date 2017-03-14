<section class="comment-area yasuko-only">
    <div id="comments"> 
    <?php if($this->allow('comment')): ?>
        <div class="ds-thread" data-thread-key="<?php echo $this->cid;?>" data-title="<?php echo $this->title;?>" data-author-key="<?php echo $this->authorId;?>" data-url=""></div>
    <script type="text/javascript">
    var duoshuoQuery = {short_name:"bayun"};
        (function() {
            var ds = document.createElement('script');
            ds.type = 'text/javascript';ds.async = true;
            ds.src = '<?php $this->options->themeUrl('js/embed.js'); ?>';
            ds.charset = 'UTF-8';
            (document.getElementsByTagName('head')[0] 
             || document.getElementsByTagName('body')[0]).appendChild(ds);
        })();
        </script>
    <?php else: ?>
    <h4><?php _e('评论已关闭'); ?></h4> 
    <?php endif; ?> 
    </div>
</section>