<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
    </main>
    <footer>
        <?php tiphia_theme_footer_icons(); ?>
        <div class="term-cloud">
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=' . tiphia_theme_int('tag_cloud_limit', 24, 0, 100))->to($tags); ?>
            <?php while ($tags->next()): ?>
                <a href="<?php $tags->permalink(); ?>"><?php $tags->name(); ?> <small><?php $tags->count(); ?></small></a>
            <?php endwhile; ?>
        </div>
        <?php if (trim((string) tiphia_theme_option('icp', '')) !== '' || trim((string) tiphia_theme_option('police_record', '')) !== ''): ?>
            <div class="filing-info">
                <?php if (trim((string) tiphia_theme_option('icp', '')) !== ''): ?>
                    <?php if (trim((string) tiphia_theme_option('icp_url', '')) !== ''): ?>
                        <a href="<?php echo tiphia_theme_attr(tiphia_theme_option('icp_url', '')); ?>" rel="nofollow noopener noreferrer" target="_blank"><?php echo tiphia_theme_attr(tiphia_theme_option('icp', '')); ?></a>
                    <?php else: ?>
                        <span><?php echo tiphia_theme_attr(tiphia_theme_option('icp', '')); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if (trim((string) tiphia_theme_option('police_record', '')) !== ''): ?>
                    <?php if (trim((string) tiphia_theme_option('police_record_url', '')) !== ''): ?>
                        <a href="<?php echo tiphia_theme_attr(tiphia_theme_option('police_record_url', '')); ?>" rel="nofollow noopener noreferrer" target="_blank"><?php echo tiphia_theme_attr(tiphia_theme_option('police_record', '')); ?></a>
                    <?php else: ?>
                        <span><?php echo tiphia_theme_attr(tiphia_theme_option('police_record', '')); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <p class="theme-powered-by">
            Theme <a href="https://github.com/cairbin/tiphia-for-typecho" rel="nofollow noopener noreferrer" target="_blank">Tiphia</a>
            by <a href="https://posts.cairbin.top" rel="nofollow noopener noreferrer" target="_blank">CairBin</a>
        </p>
    </footer>
    <?php tiphia_theme_cookie_notice(); ?>
</div>
<?php $this->footer(); ?>
</body>
</html>
