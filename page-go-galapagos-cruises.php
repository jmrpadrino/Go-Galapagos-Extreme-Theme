<?php 
    get_header(); 
    echo 'en galapagos cruises';
    the_post();
?>
<section class="sections section thumbnail-page">
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
    <div class="container-fluid" style="height: 40vh;">
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-lg-offset-2 inner-page-content" style="margin-top: 60px;">
                <?php 
                    $meta = get_post_meta(get_the_id(), $prefix . 'page_first_section_content', true);
                    if(!empty($meta)){
                        echo '<p class="page-fold-text">'. $meta . '</p>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<?php 
    get_footer(); 
?>