<?php get_header(); ?><div class="sections section">
    <div class="container-fluid nopadding">
        <div class="hero-404">    
            <img src="<?php echo get_template_directory_uri(); ?>/images/gogalapagos-404-background.jpg" class="img-responsive">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="content-404">
                    <h1><?php _e('Well, it seems that the page you are looking for does not exist', 'gogalapagos'); ?></h1>
                    <p><?php _e('Don\'t worry, you can still find youir way easily', 'gogalapagos'); ?></p>
                    <p><a class="return-home-link" href="<?php echo home_url(); ?>"><?php _e('Return to Homepage', 'gogalapagos'); ?></a> or <a href="<?php echo home_url('contact'); ?>">Contact Us</a></p>
                </div>
            </div>
        </div>    
    </div>
</div><?php get_footer(); ?>