		</div><!-- #main .wrapper -->
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
        	<a href="http://www.typecho.org" title="优雅的个人发布平台">自豪地采用 Typecho)))</a> | 
            <a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章'); ?> RSS</a> | 
            <a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论'); ?> RSS</a> | 
            主题来自WordPress默认主题TwentyTwelve，<a href="http://zh.eming.li" title="怡红院落">怡红公子</a>负责移植，一切版权归原主题所有。
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/wp-recentcomments.js?ver=2.2.7'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/navigation.js?ver=1.0'); ?>"></script>
<?php $this->footer(); ?>
</body>
</html>
