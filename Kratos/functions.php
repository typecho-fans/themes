<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

/* 后台设置 */
function themeConfig($form) {
	//header部分
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('在这里填入一个图片URL地址, 以在网站标题前加上一个LOGO'));
	$form->addInput($logoUrl->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
	$logoTxt = new Typecho_Widget_Helper_Form_Element_Text('logoTxt', NULL, NULL, _t('居中标题'), _t('Banner正中展示的简单标题'));
	$form->addInput($logoTxt);

	$bannerimg = new Typecho_Widget_Helper_Form_Element_Text('bannerimg', NULL, NULL, _t('顶部Banner图片'), _t('顶部Banner图片链接'));
    $form->addInput($bannerimg);

	$site_bw = new Typecho_Widget_Helper_Form_Element_Radio('site_bw',
        array('able'=>_t('开启'),'disable'=>_t('关闭')),
        'disable',
        _t("站点黑白模式"),
        _t("开启后站点呈现为黑白模式")
        );
    $form->addInput($site_bw);

	
	//侧边栏
	$sidebarlr = new Typecho_Widget_Helper_Form_Element_Radio('sidebarlr',
        array('left_side' => _t('左边栏'),
            'right_side' => _t('右边栏'),
			'single' => _t('无边栏'),
        ),
        'right_side', _t('非首页侧边栏设置'), _t('默认右边栏'));
    $form->addInput($sidebarlr);
	
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('ShowAuthor' => _t('作者简介'),
    'ShowSearch' => _t('搜索框'),
    'ShowRecent' => _t('最新文章'),
	'ShowCategory' => _t('分类目录'),
	'ShowTags' => _t('标签云')),
    array('ShowAuthor', 'ShowSearch', 'ShowRecent', 'ShowCategory', 'ShowTags'), _t('侧边栏显示'));    
    $form->addInput($sidebarBlock->multiMode());
	
	$authordesc = new Typecho_Widget_Helper_Form_Element_Text('authordesc', null, NULL, _t('作者简介'), _t('侧边栏的作者简介以&lt;br&gt;换行 图片请自行替换images文件夹中about.jpg和author.jpg 或者自行修改sidebar.php'));
	$form->addInput($authordesc);



	//社交
    $socialweixin = new Typecho_Widget_Helper_Form_Element_Text('socialweixin', NULL, NULL, _t('输入微信二维码链接'), _t('在这里输入微信二维码链接,图片格式,支持 http:// 或 https:// 或 //'));
    $form->addInput($socialweixin->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
	$socialweibo = new Typecho_Widget_Helper_Form_Element_Text('socialweibo', NULL, NULL, _t('输入微博链接'), _t('在这里输入微博链接,支持 http:// 或 https:// 或 //'));
    $form->addInput($socialweibo->addRule('xssCheck', _t('请不要在链接中使用特殊字符')));
    $socialtwitter = new Typecho_Widget_Helper_Form_Element_Text('socialtwitter', NULL, NULL, _t('输入Twitter链接'), _t('在这里输入twitter链接,支持 http:// 或 https:// 或 //'));
    $form->addInput($socialtwitter->addRule('xssCheck', _t('请不要在链接中使用特殊字符')));
	$socialfacebook = new Typecho_Widget_Helper_Form_Element_Text('socialfacebook', NULL, NULL, _t('输入Facebook链接'), _t('在这里输入Facebook链接,支持 http:// 或 https:// 或 //'));
    $form->addInput($socialfacebook->addRule('xssCheck', _t('请不要在链接中使用特殊字符')));
	$socialrss = new Typecho_Widget_Helper_Form_Element_Text('socialrss', NULL, NULL, _t('输入RSS链接'), _t('在这里输入rss链接,留空不输出，站点原版请输入off,支持 http:// 或 https:// 或 //'));
    $form->addInput($socialrss->addRule('xssCheck', _t('请不要在链接中使用特殊字符')));
		
	//图片CDN
    $srcAddress = new Typecho_Widget_Helper_Form_Element_Text('src_add', NULL, NULL, _t('图片CDN替换前地址'), _t('即你的附件存放链接，一般为http://www.yourblog.com/usr/uploads/'));
    $form->addInput($srcAddress->addRule('xssCheck', _t('请不要在链接中使用特殊字符')));
    $cdnAddress = new Typecho_Widget_Helper_Form_Element_Text('cdn_add', NULL, NULL, _t('图片CDN替换后地址'), _t('即你的七牛云存储域名，一般为http://yourblog.qiniudn.com/，可能也支持其他有镜像功能的CDN服务'));
    $form->addInput($cdnAddress->addRule('xssCheck', _t('请不要在链接中使用特殊字符')));
    $default_thumb = new Typecho_Widget_Helper_Form_Element_Text('default_thumb', NULL, '', _t('默认缩略图'),_t('文章没有图片时的默认缩略图，留空则无，一般为http://www.yourblog.com/image.png'));
    $form->addInput($default_thumb->addRule('xssCheck', _t('请不要在链接中使用特殊字符')));
	
	
    $ad_postend = new Typecho_Widget_Helper_Form_Element_Text('ad_postend', NULL, NULL, _t('文章尾部广告图片链接'), _t('图片链接,支持 http:// 或 https:// 或 //'));
    $form->addInput($ad_postend->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
	$ad_sidebar = new Typecho_Widget_Helper_Form_Element_Text('ad_sidebar', NULL, NULL, _t('侧边栏广告'), _t('自定义广告代码'));
    $form->addInput($ad_sidebar);

	

}



/**
 * 解析内容以实现附件加速
 * @access public
 * @param string $content 文章正文
 * @param Widget_Abstract_Contents $obj
 */
function parseContent($obj) {
    $options = Typecho_Widget::widget('Widget_Options');
    if (!empty($options->src_add) && !empty($options->cdn_add)) {
        $obj->content = str_ireplace($options->src_add, $options->cdn_add, $obj->content);
    }
    echo trim($obj->content);
}


/*文章阅读次数统计*/
function get_post_view($archive) {
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
            
        }
    }
    echo $row['views'];
}


/*Typecho 24小时发布文章数量*/
function get_recent_posts_number($days = 1,$display = true)
{
$db = Typecho_Db::get();
$today = time() + 3600 * 8;
$daysago = $today - ($days * 24 * 60 * 60);
$total_posts = $db->fetchObject($db->select(array('COUNT(cid)' => 'num'))
->from('table.contents')
->orWhere('created < ? AND created > ?', $today,$daysago)
->where('type = ? AND status = ? AND password IS NULL', 'post', 'publish'))->num;
if($display) {
echo $total_posts;
} else {
return $total_posts;
}
}

//热门文章（评论最多）
function rmcp($days = 30,$num = 5){
$defaults = array(
'before' => '',
'after' => '',
'xformat' => '<a class="list-group-item visible-lg" title="{title}" href="{permalink}" rel="bookmark"><i class="fa  fa-book"></i> {title}</a> 
	<a class="list-group-item visible-md" title="{title}" href="{permalink}" rel="bookmark"><i class="fa  fa-book"></i> {title}</a>'
);
$time = time() - (24 * 60 * 60 * $days);
$db = Typecho_Db::get();
$sql = $db->select()->from('table.contents')
->where('created >= ?', $time)
->where('type = ?', 'post')
->limit($num)
->order('commentsNum',Typecho_Db::SORT_DESC);
$result = $db->fetchAll($sql);
echo $defaults['before'];
foreach($result as $val){
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
echo str_replace(array('{permalink}', '{title}', '{commentsNum}'), array($val['permalink'], $val['title'], $val['commentsNum']), $defaults['xformat']);
}
echo $defaults['after'];
}

//随机文章
function theme_random_posts(){
$defaults = array(
'number' => 6,
'before' => '',
'after' => '',
'xformat' => '<a class="list-group-item visible-lg" title="{title}" href="{permalink}" rel="bookmark"><i class="fa  fa-book"></i> {title}</a> 
	<a class="list-group-item visible-md" title="{title}" href="{permalink}" rel="bookmark"><i class="fa  fa-book"></i> {title}</a>'
);
$db = Typecho_Db::get();
 
$sql = $db->select()->from('table.contents')
->where('status = ?','publish')
->where('type = ?', 'post')
->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
->limit($defaults['number'])
->order('RAND()');
 
$result = $db->fetchAll($sql);
echo $defaults['before'];
foreach($result as $val){
$val = Typecho_Widget::widget('Widget_Abstract_Contents')->filter($val);
echo str_replace(array('{permalink}', '{title}'),array($val['permalink'], $val['title']), $defaults['xformat']);
}
echo $defaults['after'];
}

//缩略图调用
function showThumb($obj,$size=null,$link=false){
    preg_match_all( "/<[img|IMG].*?src=[\'|\"](.*?)[\'|\"].*?[\/]?>/", $obj->content, $matches );
    $thumb = '';
    $options = Typecho_Widget::widget('Widget_Options');
    $attach = $obj->attachments(1)->attachment;
    if (isset($attach->isImage) && $attach->isImage == 1){
        $thumb = $attach->url;
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
    }elseif(isset($matches[1][0])){
        $thumb = $matches[1][0];
        if(!empty($options->src_add) && !empty($options->cdn_add)){
            $thumb = str_ireplace($options->src_add,$options->cdn_add,$thumb);
        }
    }
    if(empty($thumb) && empty($options->default_thumb)){
		$thumb= $options->themeUrl .'/images/thumb/' . rand(1, 20) . '.jpg';
		//去掉下面4行双斜杠 启用BING美图随机缩略图
		//$str = file_get_contents('http://cn.bing.com/HPImageArchive.aspx?format=js&idx='.rand(1, 30).'&n=1');
        //$array = json_decode($str);
		//$imgurl = $array->{"images"}[0]->{"urlbase"};
        //$thumb = '//i'.rand(0, 2).'.wp.com/cn.bing.com'.$imgurl.'_1920x1080.jpg?resize=220,150';
		
        return $thumb;
    }else{
        $thumb = empty($thumb) ? $options->default_thumb : $thumb;
    }
    if($link){
        return $thumb;
    }
}

/* 随机格言 */
	function hellobingbing($type)
	{
		$i = 0;
		$saying="";
		switch ($type)
		{
			case "notice":
			$saying='天行geek，君子以自强bullshit，地势queen，君子以hold载物。';
			break;
			case "ad":
			$i=rand(0,1);
			{
			if ($i==0)
			{$saying="莺花犹怕春光老，岂可教人枉度春";}
			else
			{$saying="马行无力皆因瘦，人不风流只为贫";}
			break;
			}
			default:
				$ads = array(
'昔时贤文，诲汝谆谆',
'集韵增广，多见多闻',
'观今宜鉴古，无古不成今',
'知己知彼，将心比心',
'酒逢知己饮，诗向会人吟',
'相识满天下，知心能几人',
'相逢好似初相识，到老终无怨恨心',
'近水知鱼性，近山识鸟音',
'易涨易退山溪水，易反易复小人心',
'运去金成铁，时来铁似金',
'读书须用意，一字值千金',
'逢人且说三分话，未可全抛一片心',
'有意栽花花不发，无心插柳柳成荫',
'画龙画虎难画骨，知人知面不知心',
'钱财如粪土，仁义值千金',
'流水下滩非有意，白云出岫本无心',
'当时若不登高望，谁信东流海洋深',
'路遥知马力，日久见人心',
'两人一般心，无钱堪买金',
'一人一般心，有钱难买针',
'相见易得好，久住难为人',
'马行无力皆因瘦，人不风流只为贫',
'饶人不是痴汉，痴汉不会饶人',
'是亲不似亲，非亲却似亲',
'美不美，故乡水；亲不亲，故乡人',
'莺花犹怕春光老，岂可教人枉度春',
'相逢不饮空归去，洞口桃花也笑人',
'红粉佳人休使老，风流浪子莫教贫',
'在家不会迎宾客，出门方知少主人',
'黄芩无假，阿魏无真',
'客来主不顾，自是无良宾',
'良宾方不顾，应恐是痴人',
'贫居闹市无人问，富在深山有远亲',
'谁人背后无人说，哪个人前不说人',
'有钱道真语，无钱语不真',
'不信但看筵中酒，杯杯先劝有钱人',
'闹市挣钱，静处安身',
'来如风雨，去似微尘',
'长江后浪推前浪，世上新人赶旧人',
'近水楼台先得月，向阳花木早逢春',
'古人不见今时月，今月曾经照古人',
'先到为君，后到为臣',
'莫道君行早，更有早行人',
'莫信直中直，须防仁不仁',
'山中有直树，世上无直人',
'只恨枝无叶，莫怨太阳偏',
'大家都是命，半点不由人',
'一年之计在于春，一日之计在于晨',
'一家之计在于和，一生之计在于勤',
'责人之心责己，恕己之心恕人',
'守口如瓶，防意如城',
'宁可人负我，切莫我负人',
'再三须慎意，第一莫欺心',
'虎身犹可近，人毒不堪亲',
'来说是非者，便是是非人',
'远水难救近火，远亲不如近邻',
'有酒有肉多兄弟，急难何曾见一人',
'人情似纸张张薄，世事如棋局局新',
'山中自有千年树，世上难逢百岁人',
'力微休负重，言轻莫劝人',
'无钱莫入众，遭难莫寻亲',
'平生不做皱眉事，世上应无切齿人',
'士者国之宝，儒为席上珍',
'若要断酒法，醒眼看醉人',
'求人须求大丈夫，济人须济急时无',
'久住令人贱，频来亲也疏',
'酒中不语真君子，财上分明大丈夫',
'出家如初，成佛有余',
'积金千两，不如明解经书',
'养子不教如养驴，养女不教如养猪',
'有田不耕仓廪虚，有书不读子孙愚',
'仓廪虚兮岁月乏，子孙愚兮礼仪疏',
'听君一席话，胜读十年书',
'人不通今古，马牛如襟裾',
'茫茫四海人无数，哪个男儿是丈夫',
'白酒酿成迎宾客，黄金散尽为收书',
'救人一命，胜造七级浮屠',
'城门失火，殃及池鱼',
'庭前生瑞草，好事不如无',
'欲求生富贵，须下死工夫',
'百年成之不足，一旦坏之有余',
'人心似铁，官法如炉',
'善化不足，恶化有余',
'水至清则无鱼，人太急则无智',
'智者减半，愚者全无',
'在家由父，出嫁从夫',
'痴人畏妇，贤女敬夫',
'是非终日有，不听自然无',
'竹篱茅舍风光好，道院僧房终不如',
'宁可正而不足，不可邪而有余',
'宁可信其有，不可信其无',
'命里有时终须有，命里无时莫强求',
'道院迎仙客，书堂隐相儒',
'庭栽栖凤竹，池养化龙鱼',
'结交须胜己，似我不如无',
'但看三五日，相见不如初',
'人情似水分高下，世事如云任卷舒',
'会说说都是，不会说无理',
'磨刀恨不利，刀利伤人指',
'求财恨不多，财多害自己',
'知足常足，终身不辱',
'知止常止，终身不耻',
'有福伤财，无福伤己',
'差之毫厘，失之千里',
'若登高必自卑，若涉远必自迩',
'三思而行，再思可矣',
'动口不如亲为，求人不如求己',
'小时是兄弟，长大各乡里',
'嫉财莫嫉食，怨生莫怨死',
'人见白头嗔，我见白头喜',
'多少少年郎，不到白头死',
'墙有缝，壁有耳',
'好事不出门，坏事传千里',
'若要人不知，除非己莫为',
'为人不做亏心事，半夜敲门心不惊',
'贼是小人，智过君子',
'君子固穷，小人穷斯溢矣',
'富贵多忧，贫穷自在',
'不以我为德，反以我为仇',
'宁可直中取，不可曲中求',
'人无远虑，必有近忧',
'知我者谓我心忧，不知我者谓我何求',
'晴天不肯去，直待雨淋头',
'成事莫说，覆水难收',
'是非只为多开口，烦恼皆因强出头',
'忍得一时之气，免得百日之忧',
'近来学得乌龟法，得缩头时且缩头',
'惧法朝朝乐，欺公日日忧',
'人生一世，草长一春',
'黑发不知勤学早，转眼便是白头翁',
'月过十五光明少，人到中年万事休',
'儿孙自有儿孙福，莫为儿孙做马牛',
'人生不满百，常怀千岁忧',
'今朝有酒今朝醉，明日愁来明日忧',
'路逢险处须回避，事到临头不自由',
'人贫不语，水平不流',
'一家养女百家求，一马不行百马忧',
'有花方酌酒，无月不登楼',
'三杯通大道，一醉解千愁',
'深山毕竟藏老虎，大海终须纳细流',
'惜花须检点，无月不梳头',
'大抵选她肌骨好，不搽红粉也风流',
'受恩深处宜先退，得意浓时便可休',
'莫待是非来入耳，从前恩爱反为仇',
'留得五湖明月在，不愁无处下金钩',
'休别有鱼处，莫恋浅滩头',
'去时终须去，再三留不住',
'忍一句，息一怒，饶一着，退一步',
'生不认魂，死不认尸',
'父母恩深终有别，夫妻义重也分离',
'人生似鸟同林宿，大难来时各自飞',
'人善被人欺，马善被人骑',
'人无横财不富，马无夜草不肥',
'人恶人怕天不怕，人善人欺天不欺',
'善恶到头终有报，只盼早到与来迟',
'黄河尚有澄清日，岂能人无得运时',
'得宠思辱，居安思危',
'念念有如临敌日，心心常似过桥时',
'英雄行险道，富贵似花枝',
'年青莫道春光好，只怕秋来有冷时',
'送君千里，终有一别',
'但将冷眼观螃蟹，看它横行到几时',
'见事莫说，问事不知',
'闲事莫管，无事早归',
'假缎染就真红色，也被旁人说是非',
'善事可做，恶事莫为',
'许人一物，千金不移',
'龙生龙子，虎生虎儿',
'龙游浅水遭虾戏，虎落平原被犬欺',
'一举首登龙虎榜，十年身到凤凰池',
'十年寒窗无人问，一举成名天下知',
'酒债寻常处处有，人生七十古来稀',
'养儿防老，积谷防饥',
'鸡豚狗彘之畜，无失其时，数口之家，可以无饥矣',
'常将有日思无日，莫把无时当有时',
'树欲静而风不止，子欲养而亲不待',
'时来风送滕王阁，运去雷轰荐福碑',
'入门休问荣枯事，且看容颜便得知',
'官清司吏瘦，神灵庙主肥',
'息却雷霆之怒，罢却虎豹之威',
'饶人算知本，输人算知机',
'好言难得，恶语易施',
'一言既出，驷马难追',
'择其善者而从之，其不善者而改之',
'少时不努力，老大徒伤悲',
'人有善愿，天必佑之',
'莫饮卯时酒，昏昏醉到酉',
'莫骂酉时妻，一夜受孤凄',
'种麻得麻，种豆得豆',
'天眼恢恢，疏而不漏',
'做官莫向前，作客莫在后',
'宁添一斗，莫添一口',
'螳螂捕蝉，岂知黄雀在后',
'不求金玉重重贵，但愿儿孙个个贤',
'一日夫妻，百世姻缘',
'百世修来同船渡，千世修来共枕眠',
'杀人一万，自损三千',
'枯木逢春犹再发，人无两度再少年',
'未晚先投宿，鸡鸣早看天',
'将相场中堪走马，公候肚内好撑船',
'富人思来年，穷人想眼前',
'世上若要人情好，赊去物品莫取钱',
'生死有命，富贵在天',
'击石原有火，不击乃无烟',
'人学始知道，不学亦徒然',
'莫笑他人老，终须还到老',
'但能守本分，终身无烦恼',
'善有善报，恶有恶报，不是不报，时候未到',
'人而无信，不须礼之',
'一人道好，千人传之',
'若要凡事好，须先问三老',
'君子爱财，取之有道',
'贞妇爱色，纳之以礼',
'年年防饥，夜夜防盗',
'学者是好，不学不好',
'学者如禾如稻，不学如草如蒿',
'遇饮酒时须防醉，得高歌处且高歌',
'因风吹火，用力不多',
'不因渔夫引，怎能见波涛',
'无求到处人情好，不饮任他酒价高',
'知事少时烦恼少，识人多处是非多',
'进山不怕虎伤人，只怕人情两面刀',
'强中更有强中手，恶人须用恶人磨',
'会使不在家富豪，风流不用衣着佳',
'光阴似箭，日月如梭',
'天时不如地利，地利不如人和',
'黄金未为贵，安乐值钱多',
'世上万般皆下品，思量惟有读书高',
'世间好语书谈尽，天下名山僧占多',
'为善最乐，作恶难逃',
'好人相逢，恶人回避',
'羊有跪乳之恩，鸦有反哺之情',
'你急他未急，人闲心不闲',
'隐恶扬善，执其两端',
'妻贤夫祸少，子孝父心宽',
'已覆之水，收之实难',
'人生知足时常足，人老偷闲且是闲',
'处处绿杨堪系马，家家有路通长安',
'见者易，学者难',
'厌静还思喧，嫌喧又忆山',
'自从心定后，无处不安然',
'莫将容易得，便作等闲看',
'用心计较般般错，退后思量事事宽',
'道路各别，养家一般',
'由俭入奢易，从奢入俭难',
'知音说与知音听，不是知音莫与谈',
'点石化为金，人心犹未足',
'信了赌，卖了屋',
'他人观花，不涉你目',
'他人碌碌，不涉你足',
'谁人不爱子孙贤，谁人不爱千钟粟',
'莫把真心空计较，五行不是这题目',
'书到用时方恨少，事非经过不知难',
'行事存德，莫问前程',
'河狭水紧，人急智生',
'明知山有虎，莫向虎山行',
'路不行不到，事不为不成',
'无钱方断酒，临老才读经',
'点塔七层，不如暗处一灯',
'万事劝人休瞒昧，举头三尺有神明',
'但存方寸地，留与子孙耕',
'灭却心头火，剔起佛前灯',
'惺惺多不足，蒙蒙作公卿',
'众星朗朗，不如孤月独明',
'兄弟相害，不如自生',
'合理可作，小利不争',
'牡丹花好空入目，枣花虽小结实多',
'欺老莫欺小，欺人心不明',
'勤奋耕锄收地利，他时饱暖谢苍天',
'得忍且忍，得耐且耐，不忍不耐，小事成灾',
'相论逞英豪，家计渐渐退',
'贤妇令夫贵，恶妇令夫败',
'一人有庆，兆民厨赖',
'人老心未老，人穷计莫穷',
'人无千日好，花无百日红',
'黄蜂一口针，橘子两边分',
'世间通恨事，最毒淫妇心',
'杀人可恶，情理不容',
'乍富不知新受用，乍贫难改旧家风',
'座上客常满，杯中酒不空',
'屋漏又遭连夜雨，行船偏遇打头风',
'笋因落箨方成竹，鱼为奔波始化龙',
'记得少年骑竹马，转眼又是白头翁',
'礼义生于富足，盗贼出于贫穷',
'天上众星皆拱北，世间无水不朝东',
'士为知己者死，女为悦己者容',
'君子安贫，达人知命',
'良药苦口利于病，忠言逆耳利于行',
'顺天者昌，逆天者亡',
'有缘千里来相会，无缘对面不相逢',
'有福者昌，无福者亡',
'人为财死，鸟为食亡',
'夫妻相和好，琴瑟与笙簧',
'红粉易妆娇态女，无钱难作好儿郎',
'有子之人贫不久，无儿无女富不长',
'善必寿老，恶必早亡',
'爽口食多偏作病，快心事过恐遭殃',
'富贵定言要依分，贫穷不必枉思量',
'画水无风空作浪，绣花虽好不生香',
'贪他一斗米，失却半年粮',
'争他一脚豚，反失一只羊',
'龙归晚洞云犹湿，麝过春山草木香',
'人生只会量人短，何不回头把自量',
'见善如不及，见恶如探汤',
'人穷志短，马瘦毛长',
'自家心里急，他人未知忙',
'贫无达士将金赠，病有高人说药方',
'秋来满山多秀色，春来无处不花香',
'凡人不可貌相，海水不可斗量',
'清清之水，为土所防',
'济济之士，为酒所伤',
'蒿草之下，或有兰香',
'茅茨之屋，或有公王',
'无限朱门生饿殍，几多白屋出公卿',
'酒里乾坤大，壶中日月长',
'拂石坐来春衫冷，踏花归去马蹄香',
'万事前身定，浮生空自忙',
'叫月子规喉舌冷，宿花蝴蝶梦魂香',
'一言不中，千言不用',
'一人传虚，百人传实',
'万金良药，不如无疾',
'世事如明镜，前程似暗漆',
'君子怀刑，小人怀惠',
'良田万顷，日食一升',
'大厦千间，夜眠八尺',
'千经万典，孝义为先',
'天上人间，方便第一',
'一字入公门，九牛拔不出',
'衙门八字开，有理无钱莫进来',
'欲求天下事，须用世间财',
'富从升合起，贫因不算来',
'近河不得枉使水，近山不得枉烧柴',
'家中无才子，官从何处来',
'慈不掌兵，义不掌财',
'一夫当关，万夫莫开',
'万事不由人计较，一生都是命安排',
'白云本是无心物，却被清风引出来',
'慢行急行，逆取顺取',
'命中只有如许财，丝毫不可有闪失',
'人间私语，天闻若雷',
'暗室亏心，神目如电',
'一毫之恶，劝人莫作',
'一毫之善，与人方便',
'亏人是祸，饶人是福，乘除加减，报应甚速',
'圣贤言语，神钦鬼伏',
'人各有心，心各有见',
'口说不如身逢，耳闻不如目见',
'见人富贵生欢喜，莫把心头似火烧',
'养兵千日，用在一时',
'国清才子贵，家富小儿娇',
'利刀割肉伤可愈，恶语伤人恨不消',
'公道世间为白发，贵人头上不曾饶',
'有才堪出众，无衣懒出门',
'为官须作相，及第必争先',
'茵从地发，树向枝分',
'宅里燃火，烟气成云',
'以直报怨，知恩报恩',
'红颜今日虽欺我，白发他时不放君',
'借问酒家何处有，牧童遥指杏花村',
'父子和而家不退，兄弟和而家不分',
'一片云间不相识，三千里外却逢君',
'官有正条，民有私约',
'争得猫儿，失却牛脚',
'愚者千虑，必有一得，智者千虑，必有一失',
'始吾于人也，听其言而信其行',
'今吾于人也，听其言而观其行',
'哪个梳头无乱发，情人眼里出西施',
'珠沉渊而川媚，玉韫石而山辉',
'夕阳无限好，只恐不多时',
'久旱逢甘霖，他乡遇故知',
'洞房花烛夜，金榜题名时',
'惜花春起早，爱月夜眠迟',
'掬水月在手，弄花香满衣',
'桃红李白蔷薇紫，问着东君总不知',
'国乱思良将，家贫思良妻',
'池塘积水防秋旱，田地深耕足养家',
'教子教孙须教义，栽桑栽柘少栽花',
'休念故乡生处好，受恩深处便为家',
'根深不怕树摇动，树正不愁月影斜',
'奉劝君子，各宜守己',
'只此呈示，万无一失',
			);
		$rand = array_rand($ads);
		$saying=$ads[$rand];
		}
		echo $saying;
	}

?>
