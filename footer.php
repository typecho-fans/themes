<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

        </div><!--/.container-->
    </div><!--/#page-->

    <footer id="footer" <?php if ( $this->options->dark == 'on' ): ?>class="dark"<?php endif; ?>>

        <?php if ( $this->options->footerAds == 'on' ): ?>
            <section class="container" id="footer-ads">
                <?php dynamicSidebar( 'footer-ads' ); ?>
            </section><!--/.container-->
        <?php endif; ?>

        <?php // footer widgets
        $total = 4;
        if ( $this->options->footerWidgets != '' ) {

            $total = $this->options->footerWidgets;
            if( $total == 1) $class = 'one-full';
            if( $total == 2) $class = 'one-half';
            if( $total == 3) $class = 'one-third';
            if( $total == 4) $class = 'one-fourth';
        }

        if ( ( isActiveSidebar( 'footer-1' ) ||
                isActiveSidebar( 'footer-2' ) ||
                isActiveSidebar( 'footer-3' ) ||
                isActiveSidebar( 'footer-4' ) ) && $total > 0 )
        { ?>
            <section class="container" id="footer-widgets">
                <div class="pad group">
                    <?php $i = 0; while ( $i < $total ) { $i++; ?>
                        <?php if ( isActiveSidebar( 'footer-' . $i ) ) { ?>

                            <div class="footer-widget-<?php echo $i; ?> grid <?php echo $class; ?> <?php if ( $i == $total ) { echo 'last'; } ?>">
                                <?php dynamicSidebar( 'footer-' . $i ); ?>
                            </div>

                        <?php } ?>
                    <?php } ?>
                </div><!--/.pad-->
            </section><!--/.container-->
        <?php } ?>

        <?php if ( $this->options->footerNav == 'on' ): ?>
            <nav class="nav-container group" id="nav-footer">
                <div class="nav-toggle"><i class="fa fa-bars"></i></div>
                <div class="nav-text"><!-- put your mobile menu text here --></div>
                <div class="nav-wrap">底部菜单</div>
            </nav><!--/#nav-footer-->
        <?php endif; ?>

        <section id="footer-bottom">
            <div class="container">
                <a id="back-to-top" href="#"><i class="fa fa-angle-up"></i></a>
                <div class="pad group">

                    <div class="grid one-half">

                        <?php if ( $this->options->footerogo ): ?>
                            <img id="footer-logo" src="<?php echo $this->options->footer-logo; ?>" alt="<?php $this->options->title; ?>">
                        <?php endif; ?>

                        <div id="copyright">

                                <p><?php echo $this->options->title; ?> &copy; <?php if ( $this->options->startYear && $this->options->startYear < date( 'Y' ) ): ?><?php echo $this->options->startYear ?>-<?php endif; ?><?php echo date( 'Y' ); ?>. All Rights Reserved.</p>

                        </div><!--/#copyright-->

                        <div id="credit">
                            <p><?php _e('由 <a href="http://www.typecho.org">Typecho</a> 构建'); ?>. 使用 <a href="https://dt27.org/Slanted-for-Typecho/" rel="nofollow">Slanted</a> 主题.</p>
                        </div><!--/#credit-->

                    </div>

                    <div class="grid one-half last">
                        <?php showSocialLinks(); ?>
                    </div>
                </div><!--/.pad-->
            </div>
        </section><!--/.container-->

    </footer><!--/#footer-->

    </div><!--/#wrapper-inner-->
</div><!--/#wrapper-->
<?php $this->footer(); ?>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/script.min.js'); ?>"></script>
<div class="statCode"><?php $this->options->statCode(); ?></div>
</body>
</html>
