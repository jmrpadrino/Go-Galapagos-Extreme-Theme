<?php $prefix = 'gg_' ?>
<section class="section sections">
    <div class="customer-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h2 class="customer-section-title"><?php _e ('Our customers say','gogalapagos'); ?></h2>
                </div>
            </div>
            <?php
            $args = array(
                'post_type' => 'ggtestimonial',
                'posts_per_page' => 5,
            );
            $comments = get_posts($args);
            //var_dump($comments);
            $commentsCount = 0;
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div id="carousel-customer" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            foreach($comments as $comment){
                                $rate = get_post_meta($comment->ID, $prefix . 'testimonial_rate', true);
                                if ($commentsCount == 0){
                            ?>
                            <div class="item active">
                                <div class="row">
                                    <div class="col-xs-12 text-center stars-placeholder">
                                        <?php draw_stars($rate) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center comment-placeholder">
                                        <p class="customer-section-comment"><?= esc_html(get_the_excerpt($comment->ID)); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <span class="serif-font"><?= esc_html(get_the_title($comment->ID)); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }else{
                            ?>
                            <div class="item">
                                <div class="row">
                                    <div class="col-xs-12 text-center stars-placeholder">
                                        <?php draw_stars($rate) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-center comment-placeholder">
                                        <p class="customer-section-comment"><?= esc_html(get_the_excerpt($comment->ID)); ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <span class="serif-font"><?= esc_html(get_the_title($comment->ID)); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php       
                                }
                                $commentsCount++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a class="customer-carousel-control left" href="#carousel-customer" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                    <a class="customer-carousel-control right" href="#carousel-customer" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="counters" style="background-image: url(<?= get_template_directory_uri() ?>/images/estadisticas-fondo.jpg); ">
        <div class="counter-mask"></div>
        <div class="container statistics">
            <div class="row">
                <div class="col-sm-4 text-center">
                    <span class="fa fa-4x fa-ship"></span>
                    <h4 id="depart" class="statistic-value text-center">7632</h4>
                    <span class="counter-name">Ship's Departures</span>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="progress yellow">
                        <span class="progress-left">
                            <span class="progress-bar"></span>
                        </span>
                        <span class="progress-right">
                            <span class="progress-bar"></span>
                        </span>
                        <div class="progress-value"><span id="customers" >98</span>%</div>
                    </div>
                    <br />
                    <span class="counter-name">Satisfied Customers</span>
                </div>
                <div class="col-sm-4 text-center">
                    <span class="fa fa-4x fa-calendar"></span>
                    <h4 id="years-old" class="statistic-value text-center">36</h4>
                    <span class="counter-name">Years of Experience</span>
                </div>
            </div>
        </div>
    </div>
</section>