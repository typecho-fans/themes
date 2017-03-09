<!DOCTYPE HTML>
<head>
    <meta charset="<?php $this->options->charset(); ?>" />
  	<meta name="viewport" content="width=device-width,user-scalable=no">
    <?php if ($this->is('index')): ?><title>Yasuko 八云酱出品主题</title>
  	<?php else: ?>
  	<title>迷失中</title>
  	<?php endif; ?>
    <?php $this->header("generator=&template=&"); ?>
    <style>
        body {
          background: #000000 center;
          color: #ffffff;
          font-family: "Helvetica Neue",Arial,Helvetica,sans-serif;
          margin: 0px;
          text-align: center;
        }
        h1 {
          font-size: 48px;
          font-weight: normal;
          padding: 0px 20px 5px;
          display: inline-block;
          margin: 0px 0px 15px 0px;
        }
        h2 {
          font-size: 14px;
          font-weight: normal;
          margin: 0px 0px 30px 0px;
          text-transform: uppercase;
        }
        p {
          color: #444444;
        }
        a,
        a:active,
        a:visited,
        a:focus {
          text-decoration: none;
          color: #3f6039;
        }
        .en-markup-crop-options {
            top: 18px !important;
            left: 50% !important;
            margin-left: -100px !important;
            width: 200px !important;
            border: 2px rgba(255,255,255,.38) solid !important;
            border-radius: 4px !important;
        }
        .en-markup-crop-options div div:first-of-type {
            margin-left: 0px !important;
        }
    </style>

</head>
<body>
    <img src="<?php $this->options->themeUrl('img/404.png'); ?>">    
    <br><br>    
    <h1>迷失中</h1>
    <p>Stay before every beautiful thoughts</p>    
    <p>在每一个美好的思想前停留</p>   
    <p><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?>首页</a></p>
</body>
</html>