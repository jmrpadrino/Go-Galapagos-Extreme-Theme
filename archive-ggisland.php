<?php get_header(); ?>
<section class="sections section hero-and-title">
    <div class="container-fluid nopadding island-top-fold">
        <img src="<?php echo get_template_directory_uri(); ?>/images/archive-island-background.jpg" class="archive-island-background-img">
        <div class="hero-mask"></div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="archive-title"><?php echo post_type_archive_title('Galapagos ', true); ?></h1>
                <span class="separator"></span>
                <p><a href="#" class="plan-your-trip-single-btn"><?php _e('Plan Your Trip Now','gogalapagos'); ?></a> or <a href="#">Request a Quote</a></p>
            </div>
        </div>        
    </div>
    <div class="container island-archive-container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 archive-description">
                <p><?= _e('Every island in the Galapagos is different one from the other and all this is due to how they were formed. If the 4,600 million years of Earth´s history will be simulated in 24 hours, the Galapagos Islands had been formed in the last two minutes of that day. The 19 islands and 219 islets were created by successive volcanic eruptions over a hot spot located on the seafloor of the Nazca Plate. The first of them emerged in the middle of the Pacific Ocean about 5 million years ago. The islands are settled on the Nazca Plate and move about 5 centimeters a year eastward.', 'gogalapagos'); ?></p>
                <p><?= _e('That is why the oldest islands of the archipelago are far about 200 kilometers east from the youngest islands that are still above the hot spot. In this sense, all the islands have different ages and geological conditions. The very volcanically active young islands are still in process of formation and the oldest islands, farthest from the  hot spot, are in different processes of erosion. The different geological ages, altitudes and ocean currents that affect them make the  ecosystems, flora, fauna, landscapes, colors and geology of each island to be different from one another.', 'gogalapagos'); ?></p>
                <p><?= _e('The untouched of its terrestrial and aquatic ecosystems makes it a natural sanctuary. Each island has a different magic. In few places on the planet there is chance to see such impressive and stunning landscapes and contrasting colors so marked and attractive. Their many wonders include impressive geological formations, ancient and recent lava flows, various types of cones and tunnels formed by flows inside the Earth.', 'gogalapagos'); ?></p>
            </div>
        </div>
    </div>
    <?php get_template_part('templates/archive-loop'); ?>  
</section>
<?php get_footer(); ?>
