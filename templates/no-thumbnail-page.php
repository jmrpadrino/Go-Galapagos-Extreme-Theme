<?php  
    $prefix = 'gg_';
?>
<section class="sections section basic-page no-thumbnail-page" style="margin-top: 80px;">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php 
                    $meta = get_post_meta(get_the_id(), $prefix . 'page_alter_title', true);
                    if(!empty($meta)){
                        echo '<h1 class="basic-page-title no-thumbnail-page">'. $meta . '</h1>';
                    }else{
                        echo the_title('<h1 class="basic-page-title no-thumbnail-page">','</h1>'); 
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>