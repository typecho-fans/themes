                <aside id="sidebar" role="complementary">
                    <div id="post-2" class="widget">
                        <h3 class="widget-title">Recent Posts</h3>
                        <ul>
                            <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=4')
                            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
                        </ul>
                    </div><!--=E #post-2 -->
                    
                    <div id="archive-2" class="widget">
                        <h3 class="widget-title">Archives</h3>
                        <ul>
                            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
                            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
                        </ul>
                    </div><!--=E #archive-2 -->
                </aside><!--=E #sidebar -->