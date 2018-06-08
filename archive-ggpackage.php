<?php get_header();?>
<section class="sections section hero-and-title">
    <div class="container-fluid nopadding island-top-fold">
        <?php get_template_part('templates/archive-hero-background') ?>
        <div class="hero-mask"></div>
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="archive-title"><?php echo post_type_archive_title(); ?></h1>
                <span class="separator"></span>
                <p><a href="<?= home_url('request-a-quote') ?>/" class="plan-your-trip-single-btn"><?php _e('Request a Quote','gogalapagos'); ?></a></p>
            </div>
        </div>        
    </div>
    <div class="container island-archive-container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 archive-description">
                <p><?= get_option('gg_archive_excerpt_' . $post_type ) ?></p>
            </div>
        </div>
    </div>
    <?php get_template_part('templates/archive-loop'); ?>  
</section>
<?php get_footer(); ?>
