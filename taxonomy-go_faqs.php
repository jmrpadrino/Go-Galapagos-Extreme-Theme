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
                <p><a href="<?= home_url('request-a-quote') ?>" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
            </div>
        </div>        
    </div>
</section>
<section class="section sections">
    <?php get_template_part('templates/faqs-loop'); ?>
</section>
<?php get_footer(); ?>

