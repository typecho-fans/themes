<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
if (!empty($this->options->indexsetup) && in_array('lazyloadimg', $this->options->indexsetup)){
//图片延缓加载相关处理，替换src为data-original，并添加占位符
  $echo = ob_get_contents(); //获取缓冲区内容
  ob_clean(); //清除缓冲区内容，不输出到页面
  $placeholder = $this->options->themeUrl.'/img/white.gif'; //占位符图片
  $preg = "/<img (.*)src(.*) \/>/i"; //匹配图片正则
  //$preg2 = "/\<img (.*?)src\=\"(.*?)\" (.*?)>/i"; //匹配图片正则
  $replaced = '<img \\1src="'.$placeholder.'" data-original\\2 />';
  //$replaced2 = '<img \\1src="'.$placeholder.'" data-original="\\2" \\3 />';
  print preg_replace($preg, $replaced, $echo); //重新写入的缓冲区
  ob_end_flush(); //将缓冲区输入到页面，并关闭缓存区
}
?>
  <footer id="footer" class="app-footer" role="footer">
    <div class="wrapper b-t bg-light">
      <span class="pull-right hidden-xs">
      <?php $this->options->BottomInfo(); ?>
      Power by <a data-no-instant target="blank" href="http://www.typecho.org">Typecho</a> | Theme <a data-no-instant target="blank" href="https://github.com/ihewro/typecho-theme-handsome/">handsome</a> <a onclick="gotoTop()" class="m-l-sm text-muted"><i class="iconfont icon-longarrowup"></i></a>
      </span>
      &copy; <?php echo date("Y");?> Copyright.<?php $this->options->BottomleftInfo(); ?>
    </div>
  </footer>
  </div><!--end of .app app-header-fixed-->

<!--CDN加载-->
<script src="//cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js" data-no-instant></script>
<script data-no-instant src="//cdn.bootcss.com/instantclick/3.0.1/instantclick.min.js"></script>
<script src="//cdn.bootcss.com/highlight.js/9.5.0/highlight.min.js"></script>
<?php if (!empty($this->options->indexsetup) && in_array('lazyloadimg', $this->options->indexsetup)): ?>
<script src="<?php $this->options->themeUrl("js/jquery.lazyload.min.js") ?>"></script>
<script type="text/javascript">
    //图片延迟加载
$("img").lazyload({
    effect:'fadeIn'
});
</script>
<?php endif; ?>

<script>hljs.initHighlightingOnLoad();</script>

<script data-no-instant type="text/javascript">
InstantClick.on('change', function(isInitialLoad) {
  if (isInitialLoad === false) {
     if (typeof MathJax !== 'undefined'){
      MathJax.Hub.Queue(["Typeset",MathJax.Hub]);} // support MathJax
    if (typeof _hmt !== 'undefined')  // support 百度统计
      _hmt.push(['_trackPageview', location.pathname + location.search]);
    if (typeof ga !== 'undefined')  // support google analytics
        ga('send', 'pageview', location.pathname + location.search);
    if (typeof DUOSHUO !== 'undefined') //多说
        DUOSHUO.EmbedThread('.ds-thread');
  }
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });
<?php $this->options->ChangeAction() ?>
});
</script>

<script data-no-instant>
<?php if ( $this->options->preload =='0' ) : ?>
InstantClick.init('mouseover');
<?php elseif ( $this->options->preload =='1' ) : ?>
InstantClick.init('mousedown');
<?php elseif ( $this->options->preload =='2' ) : ?>
InstantClick.init('<?php $this->options->delaytime(); ?>');
<?php endif; ?>
</script>

<!--develope本地版本-->
<!--<script data-no-instant src="<?php //$this->options->themeUrl('js/develope/ui-nav.js') ?>"></script>
<script data-no-instant src="<?php //$this->options->themeUrl('js/develope/ui-toggle.js') ?>"></script>
<script data-no-instant src="<?php //$this->options->themeUrl('js/develope/ui-client.js') ?>"></script>
<script src="<?php //$this->options->themeUrl('js/develope/script.js') ?>"></script>-->

<!--音乐播放器开始。by qqdie 修改自youduBGM插件-->
<?php if (!empty($this->options->indexsetup) && in_array('musicplayer', $this->options->indexsetup)): ?>
<bgm>     
<a class="ymusic" onclick="playbtu();" target="_blank">
<i id="ydmc"></i>
</a>
<a class="ymusic" onclick="next();" id="ydnext" target="_blank">
<i class="iconfont icon-next"></i>
</a>
</bgm>
<script data-no-instant>
var yaudio = new Audio();
yaudio.controls = true;
var musicArr=[<?php $this->options->musiclist(); ?>];//后台填写播放列表
/*首次随机播放*/
var a=parseInt(Math.random()*musicArr.length);
var sj=musicArr[a];
yaudio.src=sj.mp3;
yaudio.ti=sj.title;
yaudio.art=sj.artist;
<?php if ( $this->options->isautoplay =='0' ) : ?>
<?php else: ?>
yaudio.play();
<?php endif; ?>
 </script>
 <script data-no-instant src="<?php $this->options->themeUrl('js/player.min.js'); ?>"></script>
 <script src="<?php $this->options->themeUrl('js/prbug.min.js'); ?>"></script>
 <?php endif; ?>
<!--音乐播放器结束-->

<!-- 压缩后版本 -->
<script data-no-instant src="<?php $this->options->themeUrl('js/main.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/script.min.js'); ?>"></script>

<!--页面布局开关-->
<script type="text/javascript">
<?php if (!empty($this->options->indexsetup) && in_array('festival', $this->options->indexsetup)): ?>
window.onload = clickclose;
<?php endif; ?>
<?php if (!empty($this->options->indexsetup) && in_array('header-fix', $this->options->indexsetup)): ?>
$(document).ready(function(){
    $('#alllayout').addClass("app-header-fixed");
    $('#comments a[href^=#][href!=#]').click(function() {
      var target = document.getElementById(this.hash.slice(1));
      if (!target) return;
      var targetOffset = $(target).offset().top - 50;
      $('html,body').animate({
          scrollTop: targetOffset
      },
      300);
      return false;
    });//主要修复评论定位不准确BUG
    setTimeout(function() {
      if (window.location.hash.indexOf('#')>=0){
        $('html,body').animate({scrollTop: ($(window.location.hash).offset().top - 50)+"px"}, 300);
      };//主要修复评论定位不准确BUG
    }, 700);
});
<?php endif; ?>
</script>

<?php if( !empty($this->options->indexsetup) && in_array('atargetblank',$this->options->indexsetup) ): ?>
<script type="text/javascript">
    //Add target="_blank" to a tags
    $(document).bind('DOMNodeInserted', function(event) {
        $('.comment-author a,#postpage a[href^="http"]').each(
            function() {
                if (!$(this).attr('target')) {
                    $(this).attr('target', '_blank')
                }
            }
        );
    });
</script>
<?php endif; ?>


<?php $this->footer(); ?>

</body><!--#body end-->
</html><!--html end-->
