<?php get_header(); ?>
<section class="sections section hero-and-title">
    <div class="container-fluid nopadding island-top-fold">
        <?php get_template_part('templates/archive-hero-background') ?>
        <div class="hero-mask"></div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="archive-title"><?php echo post_type_archive_title('Galapagos ', true); ?></h1>
                <span class="separator"></span>
                <p><a href="<?= home_url('request-a-quote') . '/?for=Special%20Interest' ?>" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
            </div>
        </div>        
    </div>
    <div class="container island-archive-container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 archive-description">
                <p><?= _e('We offer ample flexibility to adapt to any special needs or interests of the new traveler. From special activities to dietary needs we have hosted several types of travelers and made their vacation a true tailor-made experience. These are some examples of our programs.', 'gogalapagos'); ?></p>
            </div>
        </div>
    </div>  
    <?php get_template_part('templates/archive-loop'); ?>
</section>
<?php get_footer(); ?>

