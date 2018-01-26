<?php 
get_header(); 
the_post();
$prefix = 'gg_';
?>
<section class="sections section thumbnail-page">
    <div class="container-fluid nopadding text-center" style="height: 60vh; background-image: url(<?php echo the_post_thumbnail_url(); ?>); background-position: center; background-size: cover; background-repeat: no-repeat; padding-top: 30vh; position: relative;">
        <div class="hero-mask"></div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <?= the_title('<h1 style="margin: auto; color: white; text-shadow: 1px 1px 3px black;">','</h1>') ?>
                <p class="page-hero-text"><?= _e('The Go Galapagos Difference') ?></p>
                <span class="home-get-in-love-separator"></span>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="height: 40vh;">
        <div class="row">
            <div class="col-xs-12 col-lg-10 col-lg-offset-1 inner-page-content" style="margin-top: 30px;">
                <h2 class="cruises-page-title body-font"><?= _e('Experience the best of The Pacific Coast','gogalapagos'); ?></h2>
                <div class="cruise-page-content">    
                    <?php 
                        $threethousands = get_post_meta(get_the_ID(), $prefix . 'galapagos_cruises_after_content', true);
                        echo $threethousands;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$args = array(
    'post_type' => 'ggships',
    'posts_per_page' => 2,
    'orderby' => 'post_title',
    'order' => 'DESC'
);
$barcos = get_posts($args);
?>
<section class="section sections">
    <div class="container-fluid">
        <div class="row">
            <?php foreach($barcos as $barco){ ?>
            <?php
    $slogan = get_post_meta($barco->ID, $prefix . 'ship_slogan', true);
    $thumbnail = get_the_post_thumbnail_url($barco->ID , 'full' );
    $link = get_post_permalink($barco->ID); 
            ?>
            <div class="col-sm-6 nopadding">
                <div class="ggcruises-thumbnail-placeholder" style="position: relative; height: 50vh; color: white; overflow: hidden;">
                    <img src="<?= $thumbnail ?>" class="img-responsive" alt="<?= $barco->post_title ?>" style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto;">
                    <div class="hero-mask"></div>
                    <h2><?= $barco->post_title ?></h2>
                    <span class="slogan"><?= $slogan ?></span>
                    <span class="separator"></span>
                </div>
                <p class="cruise-excerpt"><?= get_the_excerpt($barco->ID) ?></p>
                <a class="cruise-link" href="<?= $link ?>"><?= _e('View More','gogalapagos')?></a>
            </div>
            <?php } ?>
        </div>
    </div>    
</section>
<section class="section sections">
    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h2><?= _e('Services aboard our fleet','gogalapagos') ?></h2>
                            <span class="separator"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="body-font text-center"><?= _e('Onboard service and facilities', 'gogalapagos') ?></h3>
                            <?php 
                                $onboards = get_post_meta(get_the_ID(), $prefix . 'ship_facilities_onboard', false);
                            ?>
                            <ul class="two-columns1">
                                <?php 
                                    $onboards = array_shift($onboards);
                                    foreach ($onboards as $onboard){ 
                                ?>
                                <li><?= $onboard ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <h3 class="body-font text-center"><?= _e('Cabin service and facilities', 'gogalapagos') ?></h3>
                            <?php 
                                $oncabins = get_post_meta(get_the_ID(), $prefix . 'ship_facilities_cabin', false);
                            ?>
                            <ul class="two-columns1">
                                <?php 
                                    $oncabins = array_shift($oncabins);
                                    foreach ($oncabins as $oncabin){ 
                                ?>
                                <li><?= $oncabin ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            * <?= _e('Services available in the Galapagos Legend only', 'gogalapagos'); ?>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2><?= _e('Eco-Luxury Boutique Cruise Experience', 'gogalapagos') ?></h2>
                    <span class="separator"></span>
                </div>
            </div>
            <div class="row">
                <p>Providing an ecologically sound cruise definitely does not mean that we have to compromise on luxury! Go Galapagos - Kleintours is acutely aware of the fragility and importance of the Galapagos National Park in which we have been operating and doing things right since 1983. Some of our eco-friendly practices include that all toiletries provided in our cabins are biodegradable and made from natural components as well as all the cleaning products used during housekeeping. As a complimentary gift, guests will find a thermos in each cabin to be refilled at one of our vessel’s potable water stations, thus reducing the use of plastic bottles.</p>
                <p>Our vessels are equipped with sophisticated water treatment plants to desalinate, filter and purify water for consumable use. The decor of our vessels is acquired from sustainable-certified teak plantations and all our food supply is carefully planned to reduce kitchen waste. We aim to live the present and protect the future. While being pampered on one of our 5-star, boutique cruises, with true local flavor and personalized service, we want you still feel good about yourself in the comforting knowledge that our sustainable practices will preserve the integrity of the islands for generations to come.</p>
            </div>
        </div>
    </div>
</section>
<section class="section sections crew" style="overflow: hidden; height: 100vh;">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <h2 class="text-center"><?= _e('Crew & Guides','gogalapagos'); ?></h2>
                <span class="separator"></span>
                <h3 class="body-font"><?= _e('ON BOARD STAFF', 'gogalapagos')?></h3>
                <p><?= _e('Every crew member is trained to provide a first-class service with exceptional professionalism. Genuinely friendly individuals, fully dedicated to providing the best hospitality services, with attention to detail and personalized assistance, our crew’s passion and commitment creates a one of a kind experience for our guests.'); ?></p>
                <h3 class="body-font"><?= _e('NATURALIST GUIDES', 'gogalapagos')?></h3>
                <p><?= _e('We fully understand how important your Galapagos experience is to you and as such, our team of naturalist guides has been carefully selected and trained to make it complete. Having been certified by the Galapagos National Park Service, our expert guides are ready to conduct informative walks covering every aspect of biology, geology, oceanography and human history relevant to the islands. Our group size ranges from an average of 12 to a maximum of 16 clients per guide. English or Spanish speaking groups are standard with many other languages available on previous request. Go Galapagos – Kleintours runs a series of specialist conferences, delivered by renown experts, aimed at the naturalist guides to further expand their knowledge in different fields such as geology, biology, photography, ornithology, and other related studies.'); ?></p>
                <a class="cruise-link activities" href="<?= get_post_type_archive_link( 'ggactivity' ); ?>"><?= _e('Know all activities','gogalapagos') ?></a>
            </div>
        </div>
    </div>
</section>
<section class="section sections activities" style="overflow: hidden; height: 100vh;">
    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h2><?= _e('Have fun on the Galapagos Islands','gogalapagos'); ?></h2>
                    <p><?= _e('These two yachts are the intimate experience guest are looking for, with their respective capacity of 19 and 12, their cabins offer a sense of an intimate and private yacht experience. In small spaces, the service is more personalized and meeting fellow travelers are easy to share the experience of the trip. All social areas are designed with style and comfort, as well as the cabins that include excellent amenities. The external open deck areas have perfect spaces designed to socialize, relax and enjoy the best of the Pacific sun.'.'gogalapagos'); ?></p>
                    <a class="cruise-link activities" href="<?= get_post_type_archive_link( 'ggactivity' ); ?>"><?= _e('Know all activities','gogalapagos') ?></a>
                </div>
            </div>
        </div>
    </div>
    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2><?= _e('A Typical Cruise Day', 'gogalapagos') ?></h2>
                    <span class="separator"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <p>A soothing morning wakeup call signals a freshly prepared al fresco breakfast on deck. Armed with snorkel gear, sunblock and camera we then board our pangas and head towards shore for our morning adventure. Every excursion is di􀈃erent, but might include a visit where we squeeze past boobies nesting on the narrow trail, sit and watch endemic waved albatross absorbed in their intricate courtship ritual, or stare into the eyes of a curious sea lion underwater as it peers into our face mask.</p>
                    <p>Returning aboard for a sumptuous, bu􀈃et-style, lunch we are able to enjoy time to relax in the pool, jacuzzi or on deck looking for wildlife                     and watching the scenery change as we cruise to our afternoon destination.</p>
                    <p>With every new visitor site being di􀈃erent from the last, we can once again expect another uniquely Galapagos experience for the afternoon hike. This could quite possibly be followed by another fabulous snorkel with turtles, large schools of yellow-tailed surgeonfish or even penguins! Some might choose to follow the dramatic shoreline in a kayak or e􀈃ortlessly glide over the sea bed from the comfort of our motorized glass-bottom boat.
                    <p>Return to the vessel to enjoy a delicious BBQ on deck as the sun sets on the horizon or, a sophisticated a la carte dinner. After dinner is a time to enjoy one of our many onboard activities, relax or be outside stargazing.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <img src="http://placehold.it/2000x600?text=Soles" class="img-responsive" style="margin: 36px auto;">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section sections">
   <div class="container-fluid">
       <div class="row">
           <div class="col-xs-12 col-lg-10 col-lg-offset-1">
                <div style="margin: 80px 0;">
                    <?php echo the_content(); ?>
                </div>
           </div>
       </div>
   </div>
    
</section>
<?php 
    get_footer(); 
?>