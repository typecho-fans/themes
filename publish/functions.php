<?php	
if(!function_exists('publish_post_on')):
	function publish_post_on($post) {
		$Permalink = $post->permalink;
		$Title = $post->title;
		$Date = $post->created;
		$Author = $post->author->screenName;
		$AuthorLink = $post->author->permalink;
		$Tips = '查看'.$Author.'的所有文章';
		printf('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>. ', $Permalink, $Title, date('c', $Date), date('Y 年 m 月 d 日', $Date), $AuthorLink, $Tips, $Author);
		echo 'This entry was ';
		if($post->category) {
			echo 'post in ';
			$post->category();
		}
		if($post->category && $post->tags) {
			echo ' and';
		}
		if($post->tags) {
			echo ' tagged ';
			$post->tags();
		}
		printf('. Bookmark the <a href="%1$s" title="Permalink to %2$s" rel="bookmark">permalink</a>', $Permalink, $Title);
	}
endif;

?>



<?php
//自定义评论列表
function threadedComments($comments,$singleCommentOptions) {
    $author = '<a href="'.$comments->url.'" rel="external nofollow" class="url" target="_blank">'.$comments->author.'</a>';
?>
    <li class="comment" id="<?php $comments->theId(); ?>">
    	<article id="comment-<?php $comments->theId(); ?>" class="comment">
    		<footer>
    			<div class="comment-author vcard">
    				<?php $comments->gravatar('40', $singleCommentOptions->defaultAvatar);?><cite class="fn"><?php echo $author; ?></cite><span class="says">说:</span>
    			</div>
    			<!--.comment-author .vacard-->
    			<div class="comment-meta commentmetadata">
    				<a href="<?php $comments->url(); ?>"><time pubdate datetime="<?php $comments->date('c'); ?>"><?php $comments->date('Y 年 m 月 d 日 at H:m'); ?></time></a>
    			</div>
    		</footer>

    		<div class="comment-content">
    			<?php $comments->content(); ?>
    		</div>

    		<div class="reply">
    			<?php $comments->reply('回复'); ?>
    		</div>

    	</article>

    	<?php if ($comments->children) { ?>
    	<ul class="children">
    		<?php $comments->threadedComments($singleCommentOptions); ?>
    	</ul>
    	<?php } ?>
    </li>
<?php } ?>