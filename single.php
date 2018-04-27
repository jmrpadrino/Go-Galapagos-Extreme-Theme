<?php 
get_header(); 
the_post();
?>
<section class="thumbnail-page single-fold">
    <div class="container-fluid nopadding text-center" style="height: 60vh; background-image: url(<?php echo the_post_thumbnail_url(); ?>); background-position: center; background-size: cover; background-repeat: no-repeat; padding-top: 30vh;">  
        <?php 
            $meta = get_post_meta(get_the_id(), $prefix . 'page_alter_title', true);
            if(!empty($meta)){
                echo '<h1 style="margin: auto; color: white; text-shadow: 1px 1px 3px black;">'. $meta . '</h1>';
            }else{
                echo the_title('<h1 style="margin: auto; color: white; text-shadow: 1px 1px 3px black;">','</h1>'); 
            }
        ?>
        <span class="home-get-in-love-separator"></span>
        <?php 
            $meta = get_post_meta(get_the_id(), $prefix . 'page_hero_text', true);
            if(!empty($meta)){
                echo '<p class="page-hero-text">'. $meta . '</p>';
            }
        ?>
    </div>
    <div class="container-fluid post_excerpt">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2 inner-page-content" style="margin-top: 36px;">
                <?= esc_html( get_the_excerpt() ) ?>
            </div>
        </div>
    </div>
</section>
<section class="post-editor-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <?= the_content() ?>
            </div>
        </div>
    </div>
</section>
<section class="other-posts">
   <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h3><?= _e('Our latest posts') ?></h3>
                <span class="separator"></span>
            </div>
        </div>
        <div class="row nopadding">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__not_in' => array( get_the_ID() )
            );
            $more_posts = new WP_Query($args);
            if ($more_posts->have_posts()){ 
                while ($more_posts->have_posts()){
                    $more_posts->the_post();
                    $imagen = get_the_post_thumbnail_url($more_posts->post->ID, 'full');
                    if(!$imagen){
                        $imagen = get_template_directory_uri() . '/images/no-thumbnail-post.jpg';
                    }
                    
            ?> 
            <div class="post-placeholder col-sm-4 nopadding" style="background-image: url(<?= $imagen ?>); ">
                <div class="archive-item-mask"></div>
                <a href="<?= the_permalink() ?>"><?= the_title('<h2 class="archive-item-title body-font">','</h2>') ?></a>
                <!--span class="post-date"><?php the_date('d/m/Y','',''); ?></span-->
                <div class="hidden-content">
                    <p><?= esc_html( get_the_excerpt(get_the_ID()) );?></p>
                </div>
            </div>
            <?php 
                }
            }else{
            ?>
            <div class="col-xs-12 text-center">
                <p><?= _e('There\'s no posts yet','gogalapagos'); ?></p>
            </div>
            <?php        
            }
            ?>
        </div>
    </div>
    
</section>
<?php get_footer('blog'); ?>
