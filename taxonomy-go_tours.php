<?php get_header(); ?>
<section class="sections section">
    <?php 
        if (have_posts()){ $cont = 0;
            while ( have_posts() )
            { 
                the_post(); 
                if ($cont == 0){
                    echo '<div class="fullpage-slide active">';
                    echo the_title('<a href="'.get_post_permalink().'"><h2 class="text-center">','</h2></a>'); 
                    echo '<div>';
                }else{
                    echo '<div class="fullpage-slide">';
                    echo the_title('<h2 class="text-center">','</h2>'); 
                    echo '</div>';
                }
                $cont++;
            }
        }else{
            echo '<p class="text-center no-items-text">';
            _e('There is not animals in this gruop yet.','gogalapagos');
            echo'</p>';
        }
    ?>
</section>
<?php get_footer(); ?>