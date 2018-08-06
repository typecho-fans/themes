<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $siteUrl = Helper::options()->siteUrl;
	//昵称
    $nickname = new Typecho_Widget_Helper_Form_Element_Text('nickname', NULL, '', _t('侧边栏显示的昵称'), _t('显示在头像右侧'));
    $form->addInput($nickname);
	//头像
    $avatarUrl = new Typecho_Widget_Helper_Form_Element_Text('avatarUrl', NULL, '', _t('首页头像地址'), _t('将显示在首页侧边栏,如/usr/themes/Bigfa/img/head.jpg 或 https://xxx.com/xxx.jpg'));
    $form->addInput($avatarUrl);
	//个人描述
    $descript = new Typecho_Widget_Helper_Form_Element_Text('descript', NULL, 'computer loser', _t(' 个人描述'), _t('将显示在侧边栏的昵称下方'));
    $form->addInput($descript);
	//网站logo
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, '', _t('网站Logo地址'), _t('将显示在网站左上角'));
    $form->addInput($logoUrl);
	//文章默认缩略图
	$thumUrl = new Typecho_Widget_Helper_Form_Element_Text('thumUrl', NULL, '', _t('文章默认缩略图地址'), _t('侧边栏文章默认缩略图地址'));
    $form->addInput($thumUrl);
    //设置图片CDN替换规则
    $to_replace = new Typecho_Widget_Helper_Form_Element_Text('to_replace', NULL, '', _t('图片CDN替换前地址'), _t('如http://xxx.com'));
    $form->addInput($to_replace);
    $replace_to = new Typecho_Widget_Helper_Form_Element_Text('replace_to', NULL, '', _t('图片替换后地址'),_t('如https://cdn.xxx.com或//cdn.xxx.com'));
    $form->addInput($replace_to);
    //静态资源CDN设置
    $next_cdn = new Typecho_Widget_Helper_Form_Element_Text('next_cdn', NULL, $siteUrl, _t('CDN 镜像地址'), _t('静态文件 CDN 镜像加速地址，加速js和css<br>格式参考：'.$siteUrl.'<br>不用请留空或者保持默认'));
    $form->addInput($next_cdn);
	//备案号
	$beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, $siteUrl, _t('备案号'), _t('填写备案号'));
    $form->addInput($beian);
}

function themeInit($archive) {
    if ($archive->is('index')) {
        $archive->parameter->pageSize = 8; // 自定义条数
    }
    if ($archive->is('categoty')) {
        $archive->parameter->pageSize = 1000; // 自定义条数
    }
}

function parseContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    $obj->content = preg_replace("/<a href=\"([^\"]*)\">/i", "<a href=\"\\1\" target=\"_blank\">", $obj->content);
    echo trim($obj->content);
}

//自定义评论
function threadedComments($comments, $singleCommentOptions) {
    $commentClass = '';
    $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';
    ?>
    <li class="comment">
			<div id="<?php $comments->theId() ?>" class="comment-block">
					<div class="comment-info u-clearfix">
						<div class="comment-avatar">
                            <?php
                            //头像CDN
                            $host = 'https://secure.gravatar.com'; //自定义头像CDN服务器
                            $url = '/avatar/'; //自定义头像目录,一般保持默认即可
                            $size = '32'; //自定义头像大小
                            $rating = Helper::options()->commentsAvatarRating;
                            $hash = md5(strtolower($comments->mail));
                            $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
                            ?>
                            <img class="avatar" src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" width="<?php echo $size ?>" height="<?php echo $size ?>" />
							
						</div>
						<div class="comment-meta">
							<div class="comment-author"><?php $singleCommentOptions->beforeAuthor();$comments->author();$singleCommentOptions->afterAuthor();?>
									<span class="comment-reply-link u-cursorPointer" ><?php $comments->reply($singleCommentOptions->replyWord);?></span>
							</div>
							<div class="comment-time" itemprop="datePublished">
                                <time class="lately-b" datetime="<?php $comments->date('Y-m-d H:i:s');?>" itemprop="datePublished"><?php $comments->date('Y-m-d H:i:s');?></time>
							</div>
						</div>
					</div>
					<div class="comment-content">
						<?php $comments->content();?>
					</div>
			</div>
            <?php if ($comments->children) { ?>
                <ol class="children">
                    <?php $comments->threadedComments($singleCommentOptions);?>
                </ol>
            <?php } ?>
    </li>
    <?php
}

function thumb($cid) {
	$options = Typecho_Widget::widget('Widget_Options');
	if (empty($imgurl)) {
		if(!empty($options->thumUrl) && $options->thumUrl)
			$imgurl = $options->thumUrl;
		else
			$imgurl = 'https://img.dearjohn.cn/usr/themes/Bigfa/img/default.jpg';
	}
	 $db = Typecho_Db::get();
	 $rs = $db->fetchRow($db->select('table.contents.text')
		->from('table.contents')
		->where('table.contents.type = ?', 'attachment')
		->where('table.contents.parent= ?', $cid)
		->order('table.contents.cid', Typecho_Db::SORT_ASC)
		->limit(1));
	if(isset($rs['text'])){
		$img = unserialize($rs['text']);
		echo $options->next_cdn  . $img['path'];
	}else{
		echo $imgurl;
	}
}

function getPostCount()
{
    $archives = Typecho_Widget::widget('Widget_Archive');
    // 获取文章数目
    $count = 0;
    while ($archives->next()):
        $count++;
    endwhile;
    return $count;
}


