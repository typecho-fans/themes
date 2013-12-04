        <footer role="contentinfo" id="footer">
            <p class="copyright">&copy; <a href="<?php $this->options->siteurl(); ?>"><?php $this->options->title(); ?></a><span class="sep">|</span>Theme by <a href="http://lcz.me" target="_blank">Shingchi</a><span class="sep">|</span>由 <a href="http://www.typecho.org" target="_blank">Typecho</a> 强力驱动</p>
        </footer><!--=E #footer -->
    </div><!--=E #page -->
<?php $this->need('sidebar.php'); ?>

</div><!--=E .container -->
<script src="<?php if (!empty($this->options->cdnUrl)): ?><?php echo $this->options->cdnUrl . '/usr/themes/pure/js/do.min.js'; ?><?php else: ?><?php $this->options->themeUrl('js/do.min.js'); ?><?php endif; ?>"></script>
<script>
Do.ready(function(){var c,d,a=$(".author-avatar, .site-title a"),b=$(".author-avatar");a.mouseover(function(){b.addClass("nick-hover")}),a.mouseout(function(){b.removeClass("nick-hover")}),c=$(".search-link"),d=c.parent(),c.click(function(a){return a.preventDefault(),d.addClass("search-show"),!1}),$(document).click(function(){d.removeClass("search-show")}),$(".search-txt").click(function(a){return a.stopPropagation(),!1}),$(window).scroll(function(){$(window).scrollTop()>=400?$(".backtop").fadeIn(200):$(".backtop").fadeOut(200)}),$(".top-link").click(function(a){return a.preventDefault(),$("body, html").animate({scrollTop:0},800),!1})});
</script>
<?php $this->footer(); ?>
</body>
</html>