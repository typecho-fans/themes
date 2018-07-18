<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
  <head>

    <?php
    /*
       MathJax allows you to include mathematics in your web pages, either using LaTeX,
       MathML, or AsciiMath notation, and the mathematics will be processed using javascript
       to produce HTML, SVG or MathML equations for viewing in any modern browser.

       ref: http://doswa.com/2011/07/20/mathjax-in-markdown.html
     */
    ?>

    <script type="text/javascript"
            src="http://cdn.staticfile.org/mathjax/2.4.0/MathJax.js?config=TeX-AMS_HTML-full&amp;locale=zh-hans">
    </script>

    <script type="text/x-mathjax-config">
      MathJax.Hub.Config({
        showProcessingMessages: false,
        displayAlign: "center",
        style: {color:"#444", "font-style":"italic"},
        config: ["MMLorHTML.js"],
        jax: ["input/TeX","input/MathML","input/AsciiMath","output/HTML-CSS","output/NativeMML"],
        extensions: ["tex2jax.js","mml2jax.js","asciimath2jax.js","MathMenu.js","MathZoom.js"],

        tex2jax: {
          skipTags: ['script', 'noscript', 'style', 'textarea', 'pre'],  // removed 'code' entry
          inlineMath: [
            ['$', '$'],
            ['\\(', '\\)']
          ],
          displayMath: [
            ['$$', '$$'],
            ["\\[", "\\]"]
          ],
          menuSettings: {
            context: 'Browser'
          },
          processEscapes: true,
          balanceBraces: true
        },
        TeX: {
          TagSide: "right",
          extensions: ["AMSmath.js","AMSsymbols.js","noErrors.js","noUndefined.js"],
          equationNumbers: {
            autoNumber: ["AMS"],
            useLabelIds: false
          },            // false for TeX on all one line
          Macros: {
            hfill: "{}",
            RR: '{\\bf R}',
            bold: ['{\\bf #1}',1]
          }
        },
        "HTML-CSS": {
          linebreaks: {
            automatic: true
          },
          availableFonts: ["TeX"],
          scale: 110
        },
        SVG: {
          linebreaks: {
            automatic: true
          }
        }
      });

      MathJax.Hub.Queue(function() {
        // Fix <code> tags after MathJax finishes running. This is a
        // hack to overcome a shortcoming of Markdown. Discussion at
        // https://github.com/mojombo/jekyll/issues/199
        var all = MathJax.Hub.getAllJax(), i;
        for(i = 0; i < all.length; i += 1) {
          all[i].SourceElement().parentNode.className += ' has-jax';
        }
      });

      MathJax.Hub.Configured();
    </script>

    <base target="_self">
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv = "X-UA-Compatible" content = "IE=Edge,chrome=1" >
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>
      <?php if($this->is('index')): ?>
	<?php $this->options->title(); ?> - <?php $this->options->description(); ?>
      <?php else:?><?php $this->archiveTitle(array(
                   'category'  =>  _t('分类 %s 下的文章'),
                   'search'    =>  _t('包含关键字 %s 的文章'),
                   'tag'       =>  _t('标签 %s 下的文章'),
                   'author'    =>  _t('%s 发布的文章')
                   ), '', ' - '); ?><?php $this->options->title(); ?>
      <?php endif; ?>
    </title>
    
    <!-- 使用url函数转换相关路径 -->
    <link href="<?php $this->options->themeUrl('style.min.css'); ?>" media="screen, projection" rel="stylesheet" type="text/css">
    
    <!-- highlight code -->
    <link href="http://cdn.staticfile.org/highlight.js/8.3/styles/default.min.css" rel="stylesheet">
    <script src="http://cdn.staticfile.org/highlight.js/8.3/highlight.min.js"></script> 
    <script>hljs.initHighlightingOnLoad();</script> 

    <!--[if lt IE 9]>    
         <script src="http://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
         <script src="http://cdn.staticfile.org/respond.js/1.4.2/respond.js"></script>
         <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
  </head>

  <body>
    <!--[if lt IE 8]>
         <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
         <![endif]-->
    
    <div class="container">
      <header id="header">
        <div id="nav_wrap">
          <ul id="nav">
            <li><a<?php if($this->is('index')): ?> class="current"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('Home'); ?></a></li>
            <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
            <?php while($pages->next()): ?>
              <li><a<?php if($this->is('page', $pages->slug)): ?> class="current"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
            <?php endwhile; ?>
          </ul>
        </div>
      </header>
