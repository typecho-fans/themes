		</div>
	</div>

	<footer id="footer">
		<p>&copy; <?php echo date('Y'); ?> <?php $this->options->title(); ?> / PosArt By <a href="http://kunr.me">Kunr</a></p>
		<p><?php _e('由 <a href="http://www.typecho.org">Typecho</a> 强力驱动'); ?>. <?php $this->options->FooterCode(); ?></p>
	</footer>

	<script src="<?php
	switch ($this->options->jQuerySource) {
		case 'sina':
		$jQuerySource = '//lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js';
		break;

		case 'google':
		$jQuerySourec = '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js';
		break;

		case 'baidu':
		$jQuerySource = 'http://libs.baidu.com/jquery/2.0.3/jquery.min.js';
		break;

		case 'ms':
		$jQuerySource = '//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.1.min.js';
		break;

		case '360':
		$jQuerySourec = 'http://ajax.useso.com/ajax/libs/jquery/2.1.3/jquery.min.js';
		break;

		case 'stf':
		$jQuerySourec = 'http://cdn.staticfile.org/jquery/2.1.1-rc2/jquery.min.js';
		break;

		case 'upyun':
		$jQuerySource = '//upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.3.min.js';
		break;

		default:
		$jQuerySource = $this->options->themeUrl('js/jquery-2.1.3.min.js', true);
	}
	echo $jQuerySource; ?>" type="text/javascript"></script>
	<script src="<?php $this->options->themeUrl('js/main.js'); ?>" type="text/javascript"></script>
	<?php $this->footer(); ?>
</body>
</html>
