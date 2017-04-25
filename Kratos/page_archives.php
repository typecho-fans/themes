<?php
/**
 * 页面存档
 *
 * @package custom
 */
 if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
	<div class="container">
		<div class="row">
			<?php if ($this->options->sidebarlr == 'left_side'): ?>
			<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
                <div id="sidebar">
                    <?php $this->need('sidebar.php'); ?>
                </div>
            </aside>
			<?php endif; ?>
            <section id="main" class='<?php echo ($this->options->sidebarlr ==  'single') ? 'col-md-12' : 'col-md-8'; ?>'>
				<article>
					<div class="kratos-hentry kratos-post-inner clearfix">
						<header class="kratos-entry-header">
							<h1 class="kratos-entry-title text-center"><?php $this->title(); ?></h1>
						</header>
						<div class="kratos-post-content">
                        <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
$year=0; $mon=0; $i=0; $j=0;
$output = '';
while($archives->next()):
$year_tmp = date('Y',$archives->created);
$mon_tmp = date('m',$archives->created);
$y=$year; $m=$mon;
if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></div>';
if ($year != $year_tmp && $year > 0) $output .= '';
if ($year != $year_tmp) {
$year = $year_tmp;
}
if ($mon != $mon_tmp) {
$mon = $mon_tmp;
$output .= '<div class="item"><h2>'. $year . '年' . $mon .' 月</h2><ul class="archives-list">'; //输出月份
}
$output .= '<li><time>'.date('d日: ',$archives->created).'</time><a href="'.$archives->permalink .'">'. $archives->title .'</a> <span class="text-muted">'. $archives->commentsNum.'评论</span></li>'; //输出文章日期和标题
endwhile;
$output .= '</ul></div>';
echo $output;
?>
                        <?php //if ($ad['footer']==1): ?>
	                    <img src="<?php //echo kratos_option('ad_img');?>">
	                    <?php //endif ?>
						</div>

					</div>
					
				</article>
			</section>
			<?php if ($this->options->sidebarlr == 'right_side'): ?>
				<aside id="kratos-widget-area" class="col-md-4 hidden-xs hidden-sm scrollspy">
	                <div id="sidebar">
	                    <?php $this->need('sidebar.php'); ?>
	                </div>
	            </aside>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php $this->need('footer.php'); ?>