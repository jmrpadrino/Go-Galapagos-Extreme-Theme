<?php get_header(); ?>
<section class="sections section hero-and-title">
    <div class="container-fluid nopadding island-top-fold">
        <img src="<?php echo get_template_directory_uri(); ?>/images/get-in-love-default-background.jpg" class="archive-island-background-img">
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
            <div class="col-xs-12">
                <p class="archive-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium a totam deserunt quas enim nesciunt saepe alias soluta, accusantium maxime id excepturi, repellendus exercitationem officiis unde. Delectus accusantium sapiente earum? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita nulla non totam illum culpa vel animi ullam, voluptate perspiciatis, sit pariatur ea consequatur ducimus autem quae odit atque nesciunt commodi.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 islands-list">
                <?php if( have_posts() ){ ?>
                <ul>
                <?php while( have_posts() ){ the_post() ?>
                    <li>
                        <a class="island-link" href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </li>                
                <?php } // End IF ?>
                </ul>
                <?php } // End IF ?>
            </div>
        </div>
    </div>  
</section>
<?php get_footer(); ?>