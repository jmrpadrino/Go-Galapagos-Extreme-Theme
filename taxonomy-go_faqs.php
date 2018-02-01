<?php get_header();
$termino = get_term_by( 'slug', $term, 'go_faqs');
?>
<section class="sections section hero-and-title">
    <div class="container-fluid nopadding island-top-fold">
        <img src="<?php echo get_template_directory_uri(); ?>/images/get-in-love-default-background.jpg" class="archive-island-background-img">
        <div class="hero-mask"></div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="archive-title"><?= $termino->name ?></h1>
                <span class="separator"></span>
                <p><a href="#" class="plan-your-trip-single-btn"><?php _e('Plan Your Trip Now','gogalapagos'); ?></a> or <a href="#">Request a Quote</a></p>
            </div>
        </div>        
    </div>
    <div class="container island-archive-container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 archive-description">
                <p>bla bla bla Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a totam deserunt quas enim nesciunt saepe alias soluta, accusantium maxime id excepturi, repellendus exercitationem officiis unde. Delectus accusantium sapiente earum? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita nulla non totam illum culpa vel animi ullam, voluptate perspiciatis, sit pariatur ea consequatur ducimus autem quae odit atque nesciunt commodi.</p>
            </div>
        </div>
    </div>  
</section>
<section class="section sections">
    <?php get_template_part('templates/faqs-loop'); ?>
</section>
<?php get_footer(); ?>

