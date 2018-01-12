<?php
get_header();
$prefix = 'gg_';
?>
<div class="sections section single-itinerary itinerary-hero">
    <div class="single-thumbnail-container">
        <?php echo the_post_thumbnail(); ?>
    </div>
    <div class="hero-mask"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <?php
                    $term = get_post_meta( get_the_ID(), $prefix . 'itinerary_ship_id', true );
                ?>
                <span class="body-font text-center itinerary-ship-owner"><?php echo get_the_title( $term ); ?></span>
                <?php the_title('<h1 class="itinerary-title text-center">', '</h1>'); ?>
                <span class="separator"></span>
                <p><?php echo get_the_excerpt(); ?></p>
                <p>Spend 3 or more days on the Galapagos Islands and sail on our <a href="<?php home_url('galapagos-cruises'); ?>">elegant cruises</a>.</p>
                <p><a class="plan-your-trip-single-btn">Plan Your Trip Now</a> or <a href="#">Request a Quote</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <a href="#map"><?php _e('View Itinerary Map'); ?></a>
            </div>
            <div class="col-sm-4">
                <div class="scroll-indicator"></div>
            </div>
            <div class="col-sm-4 text-right">
                <a href="#">Conservation of the Galapagos Islands</a>
            </div>            
        </div>
    </div>
</div>
<?php get_footer(); ?>
