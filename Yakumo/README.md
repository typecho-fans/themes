主题最初源自[晒妻狂魔罗磊](https://luolei.org)先生的博客主题Yasuko，博主本人在使用Ghost之后一直使用这款主题，自己增删一些功能改名叫做[八云酱主题](https://www.bayun.org/bayun-theme)。

现在又在八云酱主题的基础上，将主题移植到Typecho平台，取名为Yakumo（“八云”日语）。两个版本功能暂时相差无几。因为博主个人PHP水平比Node.js稍好一点，同时Typecho也比Ghost开发方便得多，所以之后Typecho版本主题功能肯定会比Ghost版本多一些。甚至博主自己可能会将博客从Ghost平台转移到Typecho平台。

废话这么多，现在来详细介绍一下Yakumo主题的一些细节。

## 评论系统

博主自己一直使用多说（Ghost博客也没有评论系统），同时博主一直比较懒，所以主题评论系统直接采用多说，如果想要使用Typecho自带系统需要自己调样式。

多说评论框头像一直没法使用HTTPS传输，所以HTTPS网站经常会碰到因为图片加载方式为HTTP而出现网站不可信的情况。Yakumo主题自带/js/embed.js文件已经实现HTTPS反向代理，默认已经解决这个问题。所以使用时，只要去多说注册一下，然后修改主题comments.php文件里面多说子域名即可。

![Yakumo 八云酱出品](https://github.com/ryanwschina/Yakumo/blob/master/README/one.jpg)

## fancybox

主题已经集成fancybox功能，点击图片可以放大查看，并且可以用通过鼠标和键盘方向键浏览文章所有图片。

![Yakumo 八云酱出品](https://github.com/ryanwschina/Yakumo/blob/master/README/two.jpg)

在后台MarkDown编辑的时候注意不能简单地用图片形式插入，需要在图片外再加一层链接，比如像下面这样。

```markdown
[![Yakumo 八云酱出品](http://)](http://)
```

同时为保证网站更好地收录，图片中括号alt信息请尽量填写。

## 文章头图

网站默认头图是山峰图片，为美观起见在写文章的时候注意修改文章头图（如果不修改默认使用山峰图片）。

写文章时在输入框最下面添加自定义字段cover，字段内容为图片链接。

![Yakumo 八云酱出品](https://github.com/ryanwschina/Yakumo/blob/master/README/three.jpg)

## 标签云

底部标签云默认会生成最多50个标签，如果需要修改标签数量，请修改index.php文件和archive.php文件内如下位置。

![Yakumo 八云酱出品](https://github.com/ryanwschina/Yakumo/blob/master/README/four.jpg)

## 网站地图

博主自己开发的网站地图插件也推荐给大家使用，具体细节访问[Typecho博客sitemap.xml](https://www.bayun.org/typecho-sitemap/)查看。

## 文章浏览数

主题获取文章阅览数需要插件支持，请将plugins目录下面的插件拷贝到Typecho博客插件目录/usr/plugins里面并在后台进行开启。

## 主题获取

[GitHub地址](https://github.com/ryanwschina/Yakumo)

使用主题请保留主题页脚本站八云酱链接（只保留一个链接即可），谢谢。

因为目前刚刚写完，可能会有一些错误，所以邀请大家加入[八云酱QQ群386439328](https://shang.qq.com/wpa/qunwpa?idkey=0e6fd03688f9a871e30acce7c2e11ba2c486dbe6f768cac73e61b43495dd2d92)反馈信息。

![Yakumo 八云酱出品](https://github.com/ryanwschina/Yakumo/blob/master/README/five.jpg)

![Yakumo 八云酱出品](https://github.com/ryanwschina/Yakumo/blob/master/README/six.jpg)

![Yakumo 八云酱出品](https://github.com/ryanwschina/Yakumo/blob/master/README/seven.jpg)

## Copyright & License

Copyright (c) 2013-2017 Ghost Foundation

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following
conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.

