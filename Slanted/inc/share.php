<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="sharrre-container group">
<div class="bdsharebuttonbox">
    <a title="分享到QQ空间" href="#" class="bds_qzone box" id="bds_qzone" data-cmd="qzone"></a>
    <a title="分享到新浪微博" href="#" class="bds_tsina box" id="bds_tsina" data-cmd="tsina"></a>
    <a title="分享到人人网" href="#" class="bds_renren box" id="bds_renren" data-cmd="renren"></a>
    <a title="分享到微信" href="#" class="bds_weixin box" id="bds_weixin" data-cmd="weixin"></a>
    <a href="#" class="bds_more box" id="bds_more" data-cmd="more"></a>
</div>
</div><!--/.sharrre-container-->
<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":""<?php if($this->is('post')&&$this->fields->thumb): ?>,bdPic="<?php $this->fields->thumb() ?>"<?php endif; ?>,"bdMini":"2",bdSign:"off","bdMiniList":["bdysc","douban","tieba","sqq","duitang","hx","youdao","evernotecn","fbook","twi","mail","copy"],"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='<?php if($_SERVER['HTTPS'] != "on"):?>http://bdimg.share.baidu.com/static/api/js/share.js<?php else: ?><?php $this->options->themeUrl('/js/baidu.share.js') ?><?php endif; ?>?cdnversion='+~(-new Date()/36e5)];</script>
<style>.bdshare_dialog_bottom{display: none;}</style>