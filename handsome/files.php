<?php 
/**
* 文章归档
*
* @package custom
*/
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

	<!-- aside -->
	<?php $this->need('aside.php'); ?>
	<!-- / aside -->


<div id="content" class="app-content">
  <div class="butterbar hide">
    <span class="bar"></span>
  </div>
  <a class="off-screen-toggle hide"></a>
  <main class="app-content-body">
    <header class="bg-light lter b-b wrapper-md">
      <h1 class="entry-title m-n font-thin h3 text-black l-h">文章归档</h1></header>

    <div class="wrapper">
    	<ul class="timeline">
            <?php 
                $stat = Typecho_Widget::widget('Widget_Stat');
                Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize='.$stat->publishedPostsNum)->to($archives);
                $color = array("light","info","dark","success","black","warning","primary","danger");
                $year=0; $mon=0; $i=0; $j=0;
                $output = '';
                $x=0;
                while($archives->next()){
                    $year_tmp = date('Y',$archives->created);
                    $mon_tmp = date('m',$archives->created);
                    $y=$year; $m=$mon;
                    if ($year > $year_tmp || $mon > $mon_tmp) {
                        $output .= '';
                    }
                    if ($year != $year_tmp || $mon != $mon_tmp) {
                        $year = $year_tmp;
                        $mon = $mon_tmp;
                        $x++;
                        if($x>8) $x=1;
                        $colorsec = $color[$x];
                        $output .= '<li class="tl-header"><h2 class="btn btn-sm btn-';
                        $output .= $colorsec;
                        $output .=' btn-rounded m-t-none">'.date('Y年m月',$archives->created).'</h2></li>';//输出月份
                    }
                    $output .= '<li class="tl-item"><div class="tl-wrap b-';
                    $output .= $colorsec;
                    $output .='"><span class="tl-date">'.date('d日',$archives->created).'</span><h3 class="tl-content panel padder h5 l-h bg-';
                    $output .=$colorsec;
                    $output .='"><span class="arrow arrow-';
                    $output .=$colorsec;
                    $output .=' left pull-up" aria-hidden="true"></span><a href="'.$archives->permalink .'" class="text-lt">'. $archives->title .'</a></h3></div></li>'; //输出文章
                }
                $output .= '';
                echo $output;
            ?>
        <li class="tl-header">
          <div class="btn btn-sm btn-default btn-rounded">开始</div></li>
        </ul>
    </div>

  </main>
</div>


    <!-- footer -->
	<?php $this->need('footer.php'); ?>
  	<!-- / footer -->