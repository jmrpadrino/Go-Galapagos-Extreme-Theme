<?php 
    get_header();
    $taxonomy = 'go_tours';
    $termino = get_term_by( 'slug', $term, $taxonomy);
?>
<section class="section sections section hero-and-title">
    <div class="container-fluid nopadding island-top-fold">
        <?php 
            if (has_term_thumbnail($termino->term_id)){ 
                the_term_thumbnail( $termino->term_id, $size = 'full', array('class' => 'archive-island-background-img') );
            }else{
        ?>
        <img src="<?php echo get_template_directory_uri(); ?>/images/get-in-love-default-background.jpg" class="archive-island-background-img">
        <?php } ?>
        <div class="hero-mask"></div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="archive-title"><?= 'Tour '. $termino->name ?></h1>
                <span class="separator white"></span>
                <p><a href="<?= home_url('request-a-quote') ?>" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
            </div>
        </div>        
    </div>
    <div class="container island-archive-container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 archive-description">
                <?= term_description( $termino->term_id, $taxonomy) ?>
            </div>
        </div>
    </div>  
    <?php get_template_part('templates/archive-loop'); ?>
</section>
<?php get_footer(); ?>