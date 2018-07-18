<?php

function themeConfig ($form) {
	$jQuerySource = new Typecho_Widget_Helper_Form_Element_Radio(
	'jQuerySource',
	array('sina'   => _t('新浪公共库'),
		'baidu'  => _t('百度公共库'),
		'google' => _t('谷歌公共库'),
		'360'    => _t('360公共库'),
		'ms'     => _t('微软Ajax CDN'),
		'stf'    => _t('七牛公共库'),
		'upyun'  => _t('又拍云公共库'),
		'local'  => _t('本地源')
	),
	'local',
	_t('jQuery源'),
	_t('百度公共库, 360公共库, 七牛公共库不支持 https 协议.')
);
$form->addInput($jQuerySource);

$IndexContent = new Typecho_Widget_Helper_Form_Element_Radio(
	'IndexContent',
	array(
		'full' => '全文',
		'more' => '遇到 <\!--more--> 标签断开',
		'auto' => '自动裁剪'
	),
	'auto',
	_t('首页内容展现方式')
);
$form->addInput($IndexContent);


$FooterCode = new Typecho_Widget_Helper_Form_Element_Textarea('FooterCode', NULL, NULL, _t('统计代码') , _t('为了方便统计访客记录什么的'));
$form->addInput($FooterCode);
}

/* Thumbnail */
function posart_thumb_isImage ($type){
	$arr_ext = array('jpg','gif','png','bmp','jpeg');

	for ($i = 0; $i < count($arr_ext); $i++){
		if ($type == $arr_ext[$i]){
			return true;
			break;
		}
	}

	return false;
}

function posart_thumb_show ($obj) {
	$cid = $obj->cid;
	$cate = $obj->category;
	$content = $obj->content;

	$db = Typecho_Db::get();
	$attach = $db->fetchAll ($db->select()->from('table.contents')->where('type = ? AND parent = ? ', 'attachment', $cid));
	if (empty ($attach)){
		preg_match_all( "/\<img.*?src\=(\'|\")(.*?)(\'|\")[^>]*>/i", $content, $matches );
		$imgCount = count ($matches[0]);
		if ($imgCount >= 1){
			return $matches[2][0];
		} else {
			$img = null;
		}
	} else {
		foreach ($attach as $attach){
			$attach_text = unserialize($attach['text']);
			if (posart_thumb_isImage($attach_text['type'])) {
				return $attach_text['path'];
				break;
			}
		}
	}

	return false;
}
