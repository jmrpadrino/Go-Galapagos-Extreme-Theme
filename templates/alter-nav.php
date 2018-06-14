        <div class="navTrigger <?= (is_page('fold-2') ? 'active' : '') ?>" <?= (is_page('fold-2') ? 'style="z-index: 9999999;"' : '') ?>>
            <i></i><i></i><i></i> <span class="menu-word" title="Go Galapagos alternate menu"><?php _e('Menu','gogalapagos'); ?></span>
        </div>
        <div id="alter-nav" class="alter-nav <?= (is_page('fold-2') ? 'active' : '') ?>" <?= (is_page('fold-2') ? 'style="background: none"' : '') ?>>
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if ( !wp_is_mobile() ){
                        echo '<div class="col-sm-3 menu-placeholder">';
                        $alter_menu_args = array(
                            'theme_location'  => 'desktop-side-alter-menu',
                            'menu' => 'desktop-side-alter-menu',
                            'container_class' => 'desktop-side-alter-menu',
                            'container_id' => 'desktop-side-alter-menu'
                        );
                        wp_nav_menu( $alter_menu_args ); 
                    ?>
                    <div class="social-and-credits">
                        <div class="row">
                            <div class="col-md-5">
                                <?php if ( is_active_sidebar( 'translation' ) ) : ?>
                                    <div id="languages_widget" class="languages_widget widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'translation' ); ?>
                                    </div><!-- #primary-sidebar -->
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= home_url('request-a-quote') ?>/" class="plan-your-trip-single-btn wiki-bar-btn"><?= _e('Request a Quote', 'gogalapagos') ?></a>
                            </div>
                        </div>
                        <ul class="list-inline social-icons-list">
                            <?php
                                $facebook = get_option( 'gg_rrss_facebook' );
                                $twitter = get_option( 'gg_rrss_twitter' );
                                $youtube = get_option( 'gg_rrss_youtube' );
                                $instagram = get_option( 'gg_rrss_instagram' );
                                $googleplus = get_option( 'gg_rrss_google_plus' );
                            ?>
                            <?= ($facebook) ? '<li><a href="' . $facebook . '" target="_blank"><span class="fa fa-facebook"></span></a></li>' : ''; ?>
                            <?= ($twitter) ? '<li><a href="' . $twitter . '" target="_blank"><span class="fa fa-twitter"></span></a></li>' : ''; ?>
                            <?= ($youtube) ? '<li><a href="' . $youtube . '" target="_blank"><span class="fa fa-youtube-play"></span></a></li>' : ''; ?>
                            <?= ($instagram) ? '<li><a href="' . $instagram . '" target="_blank"><span class="fa fa-instagram"></span></a></li>' : ''; ?>
                            <?= ($googleplus) ? '<li><a href="' . $googleplus . '" target="_blank"><span class="fa fa-google-plus"></span></a></li>' : ''; ?>
                        </ul>
                        <div class="credits">
                            <p>GO Galapagos / Kleintours</p>
                            <p>All rights reserved. 2018</p>
                        </div>
                    </div>
                    <?php
                        echo '</div>';
                        if (!is_archive()){
                            if (!is_page('fold-2')){
                                get_template_part('/templates/alter-nav-default-side-container');
                            }
                        }
                    }else{
                        echo '<div class="col-xs-12 menu-placeholder">';
                        $alter_menu_args = array(
                            'theme_location'  => 'mobile-main-menu',
                            'menu' => 'desktop-side-alter-menu',
                            'container_class' => 'mobile-menu',
                            'container_id' => 'mobile-menu'
                        );
                        wp_nav_menu( $alter_menu_args );
                    ?>
                    <div class="social-and-credits">
                        <ul class="list-inline text-center social-icons-list">
                            <?php
                                $facebook = get_option( 'gg_rrss_facebook' );
                                $twitter = get_option( 'gg_rrss_twitter' );
                                $youtube = get_option( 'gg_rrss_youtube' );
                                $instagram = get_option( 'gg_rrss_instagram' );
                                $googleplus = get_option( 'gg_rrss_google_plus' );
                            ?>
                            <?= ($facebook) ? '<li><a href="' . $facebook . '" target="_blank"><span class="fa fa-facebook"></span></a></li>' : ''; ?>
                            <?= ($twitter) ? '<li><a href="' . $twitter . '" target="_blank"><span class="fa fa-twitter"></span></a></li>' : ''; ?>
                            <?= ($youtube) ? '<li><a href="' . $youtube . '" target="_blank"><span class="fa fa-youtube-play"></span></a></li>' : ''; ?>
                            <?= ($instagram) ? '<li><a href="' . $instagram . '" target="_blank"><span class="fa fa-instagram"></span></a></li>' : ''; ?>
                            <?= ($googleplus) ? '<li><a href="' . $googleplus . '" target="_blank"><span class="fa fa-google-plus"></span></a></li>' : ''; ?>
                        </ul>
                        <div class="credits">
                            <p>GO Galapagos / Kleintours</p>
                            <p>All rights reserved. 2018</p>
                        </div>
                    </div>
                    <?php
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>