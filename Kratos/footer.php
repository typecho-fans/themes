<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>
    <!--footer-->
		<footer>
			<div id="footer">
				<div class="cd-tool visible-lg text-center">
					<?php if ($this->options->socialweixin): ?><a id="weixin-img" class="cd-weixin"><span class="fa fa-weixin"></span><div id="weixin-pic"><img src="<?php $this->options->socialweixin(); ?>"></div></a><?php endif; ?>
					<a class="cd-top cd-is-visible cd-fade-out"><span class="fa fa-chevron-up"></span></a>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 footer-list text-center">
							<p class="kratos-social-icons">
								<?php if ($this->options->socialweibo): ?><a target="_blank" rel="external nofollow" href="<?php $this->options->socialweibo(); ?>"><i class="fa fa-weibo"></i></a><?php endif; ?>
								<?php if ($this->options->socialtwitter): ?><a target="_blank" rel="external nofollow" href="<?php $this->options->socialtwitter(); ?>"><i class="fa fa-twitter"></i></a><?php endif; ?>
								<?php if ($this->options->socialfacebook): ?><a target="_blank" rel="external nofollow" href="<?php $this->options->socialfacebook(); ?>"><i class="fa fa-facebook"></i></a><?php endif; ?>
								<?php if ($this->options->socialrss): ?><a target="_blank" href="<?php if ($this->options->socialrss == 'off'): ?><?php $this->options ->siteUrl(); ?>feed/"><?php else: ?><?php $this->options->socialrss(); ?><?php endif; ?><i class="fa fa-rss"></i></a><?php endif; ?>
							</p>
							<p>Copyright <?php echo date("Y"); ?> <a href="<?php $this->options ->siteUrl(); ?>"><?php $this->options->title();?></a>.
							<br>Powered by <a href="http://www.typecho.org/" target="_blank">Typecho</a>
							Theme by <a href="https://github.com/vtrois/kratos" target="_blank" rel="nofollow">Kratos</a> </p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
<script type='text/javascript' src='//lib.baomitu.com/jquery/2.1.4/jquery.min.js'></script>
<script type='text/javascript' src='//lib.baomitu.com/jquery-easing/1.3/jquery.easing.min.js'></script>
<script type='text/javascript' src='//lib.baomitu.com/jquery.qrcode/1.0/jquery.qrcode.min.js'></script>
<script type='text/javascript' src='//lib.baomitu.com/modernizr/2.6.2/modernizr.min.js'></script>
<script type='text/javascript' src='//lib.baomitu.com/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script type='text/javascript' src='//lib.baomitu.com/waypoints/4.0.0/jquery.waypoints.min.js'></script>
<script type='text/javascript' src='//lib.baomitu.com/stellar.js/0.6.2/jquery.stellar.min.js'></script>
<script type='text/javascript' src='//lib.baomitu.com/jquery.hoverintent/1.8.1/jquery.hoverIntent.min.js'></script>
<script type='text/javascript' src='//lib.baomitu.com/superfish/1.7.4/superfish.min.js'></script>
<script type='text/javascript' src='<?php $this->options->themeUrl('js/kratos.js?ver=2.5.2'); ?>'></script>
<script type='text/javascript' src='<?php $this->options->themeUrl('js/kratos.diy.js?ver=2.5.2'); ?>'></script>
<?php if (!$this->options->sidebarlr == 'single'): ?><script type="text/javascript">
if ($("#main").height() > $("#sidebar").height()) {
	var footerHeight = 0;
	if ($('#page-footer').length > 0) {
		footerHeight = $('#page-footer').outerHeight(true);
	}
	$('#sidebar').affix({
		offset: {
			top: $('#sidebar').offset().top - 30,
			bottom: $('#footer').outerHeight(true) + footerHeight + 6
		}
	});
}
</script><?php endif; ?>
</body>
</html>
