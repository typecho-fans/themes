<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if ($this->is('index')) : ?>
   <footer class="layoutSingleColumn layoutSingleColumn--wide footer" role="contentinfo"> 
    <div class="site-info"> 
     <p>blog since 2015.&nbsp;&nbsp;&nbsp;&nbsp; Theme <a href="https://github.com/jozhn/Bigfa" target="_blank">Bigfa</a>
		by <a href="https://dearjohn.cn/" target="_blank"><span class="cute">John</span></a>.
		&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="http://www.miitbeian.gov.cn"  target="_blank"><?php echo $this->options->beian;?></a>
		&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://console.upyun.com/register/?invite=rJoBowTv-" target="_blank" style="vertical-align:top"><img src="data:image/png;base64,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" width="50px" height="25px" style="vertical-align:top"></a></p>
    </div>
   </footer> 
<?php else: ?>
<footer class="footer--empty"></footer>
<?php endif; ?>
  </div> <!-- 对应site-main surface-container -->
<div class="loadingBar"></div>
<?php $this->footer(); ?>

<!-- 生成文章目录树 -->
<?php if (($this->options->tableOfContents == 'able') && ($this->is('post'))): ?>
	<div id="directory-content" class="directory-content">
		<div id="directory"></div>
	</div>
<?php endif; ?>

    <script src="https://cdn.bootcss.com/instantclick/3.0.0/instantclick.min.js" data-no-instant></script>
	<script type="text/javascript" src="https://cdn.bootcss.com/highlight.js/9.12.0/highlight.min.js" data-no-instant></script>
	<script src="https://img.dearjohn.cn/usr/themes/Bigfa/static/js/view-image.min.js" data-no-instant></script>
    <script data-no-instant>
		InstantClick.on('change', function(isInitialLoad) {
			$("pre code").each(function(i, block) {hljs.highlightBlock(block);});
			jQuery(document).ready(function () {
				$.lately({
					'target' : '.lately-a,.lately-b,.lately-c'
				});
				jQuery.viewImage({
				'target' : '.view-image img', //需要使用ViewImage的图片
				'exclude': '.exclude img',    //要排除的图片
				'delay'  : 300                //延迟时间
				});
			});
		});
		InstantClick.init('mousedown');
    </script>
</body>
</html>
