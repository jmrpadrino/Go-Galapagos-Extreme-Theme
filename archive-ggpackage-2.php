<?php get_header(); $prefix = 'gg_';?>
<section class="sections section">    
    <div id="land-tours-fold" class="blog-fold land-tours" style="background-image: url(<?= get_template_directory_uri() ?>/images/blogBkg.jpg);">
        <div class="hero-mask"></div>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="blog-archive-title"><?= _e('Go Packages', 'gogalapagos'); ?></h1>
                    <p class="page-hero-text"><?= _e('Get the best from both worlds! These are our recommended tours that we have prepared for vacationers that want to have a more complete travel experience.','gogalapagos'); ?></p>
                    <p class="page-hero-text"><?= _e('Our all-inclusive Go Packages are a favorite amongst our clients due that they mix an unforgettable luxury cruise in the Galapagos Islands with amazing inland landscapes and cultural experiences in continental Ecuador and Peru.','gogalapagos'); ?></p>
                    <span class="separator"></span>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="scroll-down-indicator">
                    <div class="scroll-indicator"></div>
                </div>  
            </div>
        </div>
    </div>
</section>
<section class="sections section">
    <div class="container">
        <div class="row">
            <div id="show-tours" class="col-xs-12">
                <?php
                if(have_posts())
                {
                    while(have_posts())
                    { 
                        the_post();
                        $dispoCode = get_post_meta(get_the_ID(), $prefix . 'dispo_code', true);
                        $precio = get_post_meta(get_the_ID(), $prefix . 'tour_price', true);
                        $precios = explode('.',$precio);
                ?>
                <div class="row tours-list">
                    <div id="'+valores.dispo_code+'" class="col-xs-12 tour-item"> 
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="tour-img-placeholder">
                                    <?php if (has_post_thumbnail()){ $img = get_the_post_thumbnail_url(); ?>
                                    <img src="<?= $img ?>" alt="'+valores.post_title+'" title="'+valores.post_title+'" class="img-responsive tour-thumbnail">
                                    <?php }else{ ?>
                                    <img src="http://placehold.it/350x280?text=Tour" alt="'+valores.post_title+'" title="'+valores.post_title+'" class="img-responsive tour-thumbnail">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <h2 class="tour-name body-font"><?= the_title('<a href="'.get_post_permalink().'">','</a>')?> </h2>
                                <p class="tour-description"><?= esc_html(get_the_excerpt(get_the_ID())); ?></p>
                                <p class="tour-code"><?= $dispoCode ?></p>
                                <span class="separator"></span>
                                <div class="tour-item-tools">
                                    <div class="row">
                                        <div class="col-sm-3"><?= _e('Adults', 'gogalapagos') ?></div>
                                        <div class="col-sm-3">
                                            <input class="tour-people-counter tour-adults" data-tour="'+valores.dispo_code+'" onChange="recuperar_tarifa(this.dataset.tour)" onMouseup="recuperar_tarifa(this.dataset.tour)" type="number" min="1" max="9" value="1">
                                        </div>
                                        <div class="col-sm-3"><?= _e('Children', 'gogalapagos') ?></div>
                                        <div class="col-sm-3">
                                            <input class="tour-people-counter tour-children" data-tour="'+valores.dispo_code+'" onChange="recuperar_tarifa(this.dataset.tour)" onMouseup="recuperar_tarifa(this.dataset.tour)" type="number" min="0" max="9">
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="tour-rates-link"><?= _e('Rates', 'gogalapagos') ?> 2018 <?= _e('per person', 'gogalapagos') ?></a>
                            </div>
                            <div class="col-sm-3 col-xs-6 text-right price-link">
                                <div class="featured-price">
                                    <?php if($precio){ ?>
                                    <input type="hidden" name="tour-price" value="<?= $precio ?>">
                                    <span class="tour-price">$ <?= $precios[0] ?>.<sup><?= $precios[1] ?></sup></span>
                                    <span class="total-estimated"><?= _e('Total Estimated', 'gogalapagos') ?></span>
                                    <?php } ?>
                                </div>
                                <div class="quote-link">'
                                    <a href="#"><?= _e('Request a Quote', 'gogalapagos') ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>

