<?php get_header(); ?>
<?php if ( !wp_is_mobile() ) {  ?>
<section class="sections section hero-video">
    <div class="video-placeholer">
        <video id="hero-video" data-keepplaying class="hero-video" poster="<?php echo get_template_directory_uri(); ?>/images/home-hero-video-poster.jpg" loop autoplay>
            <source src="<?php echo get_template_directory_uri(); ?>/videos/Underwater.webm" type='video/webm' />
            <source src="<?php echo get_template_directory_uri(); ?>/videos/Underwater.mp4" type='video/mp4' />
            <source src="<?php echo get_template_directory_uri(); ?>/videos/Underwater.ogv" type="video/ogv" />
        </video>
    </div>
    <div class="hero-content">
        <h1 class="home-hero-title animated fadeInDown wait3"><?php _e('Enjoy','gogalapagos'); ?></h1>
        <p class="home-hero-slogan"><?php _e('Join us in an <strong>unforgettable adventure</strong>','gogalapagos'); ?></p>
        <form class="form-filter" role="form" action="http://quote.gogalapagos.com" method="get">
            <div class="filter-transparent-box animated fadeInUp wait5">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="col-sm-5">
                            <label id="img_category_label"class="field"for="img_category"data-value="">
                                <span><?php _e('Choose your trip','gogalapagos'); ?></span>
                                <div id="img_category"class="psuedo_select"name="img_category">
                                    <span class="selected"></span>
                                    <ul id="img_category_options"class="options">
                                        <li class="option"data-value="cruise">Cruise</li>
                                        <li class="option"data-value="tour">Tour</li>
                                        <li class="option"data-value="gopackage">Go Package</li>
                                    </ul>
                                </div>
                            </label>
                        </div>
                        <div class="col-sm-5">
                            <label id="img_category_label"class="field"for="img_category"data-value="">
                                <span><?php _e('Choose your departure','gogalapagos'); ?></span>
                                <div id="img_category"class="psuedo_select"name="img_category">
                                    <span class="selected"></span>
                                    <ul id="img_category_options"class="options">
                                        <li class="option"data-value="jan2018">Jan 2018</li>
                                        <li class="option"data-value="jan2018">Feb 2018</li>
                                        <li class="option"data-value="jan2018">Mar 2018</li>
                                        <li class="option"data-value="jan2018">Apr 2018</li>
                                        <li class="option"data-value="jan2018">May 2018</li>
                                        <li class="option"data-value="jan2018">Jun 2018</li>
                                    </ul>
                                </div>
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-default hero-filter-btn" value="<?php _e('Find','gogalapagos'); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php /*
        <!--div class="filter-transparent-box animated fadeInUp wait5">
            <form class="form-filter" role="form" action="http://quote.gogalapagos.com" method="get">
                <ul class="list-inline">
                    <li>
                        <!--label for="trip"><?php _e('Choose your trip','gogalapagos'); ?></label>
<select id="trip" name="trip">
<option value=""></option>
<option value="1">Trip 1</option>
<option value="2">Trip 2</option>
<option value="3">Trip 3</option>
<option value="3">Trip 4</option>
</select-->
                        
                    </li>
                    <li>
                        <!--label for="departures"><?php _e('Departures','gogalapagos'); ?></label>
                        <select id="departures" name="departures">
                            <option value=""></option>
                            <option value="1">Depar 1</option>
                            <option value="2">Depar 2</option>
                            <option value="3">Depar 3</option>
                            <option value="3">Depar 4</option>
                            <option value="3">Depar 5</option>
                            <option value="3">Depar 6</option>
                        </select-->
                        
                    </li>
                    <li>
                        <input type="submit" class="btn btn-default hero-filter-btn" value="<?php _e('Find','gogalapagos'); ?>">
                    </li>
                </ul>
            </form>
        </div-->
        */?>
        <div class="scroll-down-indicator">
            <div class="scroll-indicator"></div>
        </div>
    </div>
</section>
<?php }else{ ?>
<section class="sections section text-center fold-mobile">
    <div class="hero-mobile-mask"></div>
    <div class="hero-mobile-content">
        <h1 class="home-hero-title animated fadeInDown wait3"><?php _e('Enjoy','gogalapagos'); ?></h1>
        <p class="home-hero-slogan"><?php _e('the Enchanted Islands','gogalapagos'); ?></p>
        <a href="#" class="btn btn-warning hero-mobile-request-btn"><?php _e('Request a quote','gogalapagos'); ?></a>
    </div>
</section>
<?php } //END if is mobile ?>
<section id="get-in-love" class="sections section get-in-love">
    <div id="slide1" class="fullpage-slide active text-center home-get-in-love-slide slide-experience">
        <div class="get-in-love-mask"></div>
        <div class="slider-container">
            <h2 class="home-get-in-love-title">The Go Galapagos Experience</h2>
            <span class="home-get-in-love-separator"></span>
            <p class="home-get-in-love-paragraph">With the first gaze from your cabin’s picture windows, as dawn breaks over the Pacific Ocean, the day begins in earnest. While the stress of a chaotic world fades to a distant memory a new, all-consuming, reality takes shape as our Galapagos adventure develops.</p>
        </div>
    </div>
    <div id="slide3" class="fullpage-slide text-center home-get-in-love-slide slide-life">
        <div class="get-in-love-mask"></div>
        <div class="slider-container">
            <h2 class="home-get-in-love-title">The Go Galapagos Life</h2>
            <span class="home-get-in-love-separator"></span>
            <p class="home-get-in-love-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus commodi, non perspiciatis inventore. Quas voluptate odio fuga id sapiente ab quod dolorum, perferendis autem corporis ipsam beatae quaerat culpa at.</p>    
        </div>
    </div>
    <div id="slide2" class="fullpage-slide text-center home-get-in-love-slide slide-emotions">
        <div class="get-in-love-mask"></div>
        <div class="slider-container">
            <h2 class="home-get-in-love-title">The Go Galapagos Emotions</h2>
            <span class="home-get-in-love-separator"></span>
            <p class="home-get-in-love-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores quae incidunt itaque error veritatis eligendi similique ipsum natus laboriosam voluptas, iste quia perspiciatis ducimus accusantium tempora voluptatem sequi minus quas.</p>
        </div>
    </div>
    <div id="slide2" class="fullpage-slide text-center home-get-in-love-slide slide-enjoy-our-cruises">
        <div class="get-in-love-mask"></div>
        <div class="slider-container">
            <h2 class="home-get-in-love-title">Enjoy our cruises</h2>
            <span class="home-get-in-love-separator"></span>
            <p class="home-get-in-love-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores quae incidunt itaque error veritatis eligendi similique ipsum natus laboriosam voluptas, iste quia perspiciatis ducimus accusantium tempora voluptatem sequi minus quas.</p>
        </div>
    </div>
    <div id="slide4" class="fullpage-slide text-center home-get-in-love-slide slide-getinvolved">
        <div class="get-in-love-mask"></div>
        <div class="slider-container">
            <h2 class="home-get-in-love-title">Get Involved</h2>
            <span class="home-get-in-love-separator"></span>
            <p class="home-get-in-love-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad dolorem nam minus explicabo cum aspernatur optio error tempora architecto ratione, molestias, sed, dolores quisquam voluptatem expedita! Possimus, neque. Voluptates, voluptatem.</p>
            <a href="#" class="btn btn-warning" title="Conservation of The Galapagos Islands">Conservation of The Galapagos Islands</a>
        </div>
    </div>
    <div class="get-in-love-controls">
        <ul>
            <li class="active">
                <span class="get-in-love-control-circle" data-goto-slide="0"></span>
            </li>
            <li>
                <span class="get-in-love-control-circle" data-goto-slide="1"></span>
            </li>
            <li>
                <span class="get-in-love-control-circle" data-goto-slide="2"></span>
            </li>
            <li>
                <span class="get-in-love-control-circle" data-goto-slide="3"></span>
            </li>
            <li>
                <span class="get-in-love-control-circle" data-goto-slide="4"></span>
            </li>
        </ul>
    </div>
</section>
<section id="offers-and-news" class="sections section offers-and-news">
    <div class="section-ribbon">
        <span><?php _e('Offers &amp; News','gogalapagos'); ?></span>
    </div>
    <div class="container-fluid nopadding">
        <div class="row">
            <div class="col-md-6 carousel">
                <div id="index-carousel-products" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <?php if ( !wp_is_mobile() ) {  ?>
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/producto-carousel-home.jpg" alt="The pack Title">
                            <?php }else{ ?>
                            <img class="mobile-image" src="<?php echo get_template_directory_uri(); ?>/images/producto-carousel-home.jpg" alt="The pack Title">
                            <?php } ?>
                            <div class="gg-post-type">
                                <span class="product-type"></span>
                                <span class="alter-title serif-font font-shading">New expedition cruises to Genovesa Island 1</span>
                                <div class="more-content">
                                    <a href="#" title="New expedition cruises to Genovesa Island"><h2>New expedition cruises to Genovesa Island</h2></a>
                                    <span class="offers-and-news-hover-separator"></span>
                                    <?php if ( !wp_is_mobile() ) {  ?>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio eos, ducimus ut corporis repellat facilis impedit. Repudiandae maiores mollitia accusamus alias esse tempora. Numquam voluptatum, magnam facilis amet! Praesentium, quod!</p>
                                    <?php } ?>
                                    <a class="home-offers-btn" href="#">Request a Quote</a>
                                </div>
                            </div>
                        </div>
                        <div class="item"> 
                            <?php if ( !wp_is_mobile() ) {  ?>
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/producto-carousel-home.jpg" alt="The pack Title">
                            <?php }else{ ?>
                            <img class="mobile-image" src="<?php echo get_template_directory_uri(); ?>/images/producto-carousel-home.jpg" alt="The pack Title">
                            <?php } ?>
                            <div class="gg-post-type">
                                <span class="product-type"></span>
                                <span class="alter-title serif-font font-shading">New expedition cruises to Genovesa Island 2</span>
                                <div class="more-content">
                                    <a href="#" title="New expedition cruises to Genovesa Island"><h2>New expedition cruises to Genovesa Island</h2></a>
                                    <span class="offers-and-news-hover-separator"></span>
                                    <?php if ( !wp_is_mobile() ) {  ?>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio eos, ducimus ut corporis repellat facilis impedit. Repudiandae maiores mollitia accusamus alias esse tempora. Numquam voluptatum, magnam facilis amet! Praesentium, quod!</p>
                                    <?php } ?>
                                    <a class="home-offers-btn" href="#">Request a Quote</a>
                                </div>
                            </div>                      
                        </div>
                        <div class="item">
                            <?php if ( !wp_is_mobile() ) {  ?>
                            <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/producto-carousel-home.jpg" alt="The pack Title">
                            <?php }else{ ?>
                            <img class="mobile-image" src="<?php echo get_template_directory_uri(); ?>/images/producto-carousel-home.jpg" alt="The pack Title">
                            <?php } ?>
                            <div class="gg-post-type">
                                <span class="product-type"></span>
                                <span class="alter-title serif-font font-shading">New expedition cruises to Genovesa Island 3</span>
                                <div class="more-content">
                                    <a href="#" title="New expedition cruises to Genovesa Island"><h2>New expedition cruises to Genovesa Island</h2></a>
                                    <span class="offers-and-news-hover-separator"></span>
                                    <?php if ( !wp_is_mobile() ) {  ?>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio eos, ducimus ut corporis repellat facilis impedit. Repudiandae maiores mollitia accusamus alias esse tempora. Numquam voluptatum, magnam facilis amet! Praesentium, quod!</p>
                                    <?php } ?>
                                    <a class="home-offers-btn" href="#">Request a Quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="product-carousel-control left" href="#index-carousel-products" data-slide="prev"><span class="fa fa-chevron-left"></span></a>
                    <a class="product-carousel-control right" href="#index-carousel-products" data-slide="next"><span class="fa fa-chevron-right"></span></a>
                </div>
            </div>
            <?php 
            // Recuperar los ultimos 4 posts del blog
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4
            );
            $blogPosts = get_posts($args);
            //var_dump($blogPosts);
            ?>
            <div class="col-md-6 nopadding home-blog-section">
                <div class="row">
                    <div class="col-md-6 nopadding home-blog-article">
                        <img class="img-responsive" src="<?= get_the_post_thumbnail_url( $blogPosts[0]->ID, 'medium' ) ?>" alt="<?= $blogPosts[0]->post_title ?>">
                        <span class="alter-title serif-font"><?= $blogPosts[0]->post_title ?></span>
                        <div class="more-content upper-post">
                            <span class="say-blog">BLOG</span>
                            <a href="#" title="Meet the new Updates in the Coral II"><h2><?= $blogPosts[0]->post_title ?></h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p><?= esc_html(get_the_excerpt($blogPosts[0]->ID))?></p>
                            <a class="home-offers-btn" href="<?= get_post_permalink( $blogPosts[0]->ID)?>">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 nopadding home-blog-article">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/blog-post-home.jpg" alt="The post Title">
                        <span class="alter-title serif-font">Learn about mating season of the marine iguana</span>
                        <div class="more-content upper-post">
                            <span class="say-blog">BLOG</span>
                            <a href="#" title="Learn about mating season of the marine iguana"><h2>Learn about mating season of the marine iguana</h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio eos, ducimus ut corporis repellat facilis impedit. Repudiandae maiores mollitia accusamus alias esse tempora. Numquam voluptatum, magnam facilis amet! Praesentium, quod!</p>
                            <a class="home-offers-btn" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 nopadding home-blog-article">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/blog-post-home.jpg" alt="The post Title">
                        <span class="alter-title serif-font">December is the spawning season for sea turtles in the Galapagos</span>
                        <div class="more-content lower-post">
                            <span class="say-blog">BLOG</span>
                            <a href="3" title="December is the spawning season for sea turtles in the Galapagos"><h2>December is the spawning season for sea turtles in the Galapagos</h2></a>
                            <span class="offers-and-news-hover-separator"></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio eos, ducimus ut corporis repellat facilis impedit. Repudiandae maiores mollitia accusamus alias esse tempora. Numquam voluptatum, magnam facilis amet! Praesentium, quod!</p>
                            <a class="home-offers-btn" href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-6 nopadding home-blog-article">
                        <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/blog-post-home-2.jpg" alt="The post Title">
                        <?php if (!wp_is_mobile()){ ?>
                        <span class="alter-title serif-font">HONEYMOON CRUISES, REDIFINING ROMANCE</span>
                        <?php } ?>
                        <div class="more-content lower-post">
                            <span class="say-blog">BLOG</span>
                            <a href="#" title="HONEYMOON CRUISES, REDIFINING ROMANCE"><h2>HONEYMOON CRUISES, REDIFINING ROMANCE</h2></a>
                            <?php if (!wp_is_mobile()){ ?>
                            <span class="offers-and-news-hover-separator"></span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio eos, ducimus ut corporis repellat facilis impedit. Repudiandae maiores mollitia accusamus alias esse tempora. Numquam voluptatum, magnam facilis amet! Praesentium, quod!</p>
                            <a class="home-offers-btn" href="#">Read More</a>
                            <?php 
}else{
    echo '<a class="home-offers-btn" href="#">Read More</a>';
}
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</section>
<section class="sections section ships">
    <div class="section-ribbon">
        <span><?php _e('Our Vessels','gogalapagos'); ?></span>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 nopadding ship-placeholder">
                <?php if ( !wp_is_mobile() ){ ?>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gogalapagos-legend-section-item-background.jpg" alt="The pack Title">
                <?php }else{ ?>
                <img class="mobile-image" src="<?php echo get_template_directory_uri(); ?>/images/gogalapagos-legend-section-item-background.jpg" alt="The pack Title">
                <?php } ?>
                <div class="more-content lower-post">
                    <a href="<?= home_url('/ship/galapagos-legend/'); ?>" title="Galapagos Legend"><h2>Galapagos Legend</h2></a>
                    <span class="ship-slogan">Boutique Cruise Ship</span>
                    <?php if( !wp_is_mobile() ) { ?>
                    <span class="offers-and-news-hover-separator"></span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio eos, ducimus ut corporis repellat facilis impedit. Repudiandae maiores mollitia accusamus alias esse tempora. Numquam voluptatum, magnam facilis amet! Praesentium, quod!</p>
                    <a class="home-ship-btn" href="<?= home_url('/ship/galapagos-legend/'); ?>">Learn More</a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6 nopadding ship-placeholder">
                <?php if ( !wp_is_mobile() ){ ?>
                <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/images/gogalapagos-corals-yachts-section-item-background.jpg" alt="The pack Title">
                <?php }else{ ?>
                <img class="mobile-image" src="<?php echo get_template_directory_uri(); ?>/images/gogalapagos-corals-yachts-section-item-background.jpg" alt="The pack Title">
                <?php } ?>
                <div class="more-content lower-post">
                    <a href="<?= home_url('/ship/coral-yachts/'); ?>" title="Coral I &amp; Coral II"><h2>Coral I &amp; Coral II</h2></a>
                    <span class="ship-slogan">Expedition Twin Yachts</span>
                    <?php if( !wp_is_mobile() ) { ?>
                    <span class="offers-and-news-hover-separator"></span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio eos, ducimus ut corporis repellat facilis impedit. Repudiandae maiores mollitia accusamus alias esse tempora. Numquam voluptatum, magnam facilis amet! Praesentium, quod!</p>
                    <a class="home-ship-btn" href="<?= home_url('/ship/coral-yachts/'); ?>">Learn More</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>