<?php 
    get_header(); 
    $prefix = 'gg_'; 
    if(!isset($_GET['ship'])){
        $args = array(
            'post_type' => 'ggships',
            'orderby' => 'post_title',
            'order' => 'DESC'
        ); 
        $barcos = get_posts($args); 
    }else{
        $args = array(
            'post_type' => 'ggships',
            'name' => $_GET['ship'],
            'posts_per_page' => 1,
            'post_status' => 'publish'
        );
        $barcos = get_posts($args);
        $nombreDelbarco = $barcos[0]->post_title;
    }

?>
<section class="sections section hero-and-title">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-6 col-lg-offset-3">
                <?php if(isset($_GET['ship'])){ ?>
                <span class="text-center top-ship-name"><?php echo $nombreDelbarco; ?></span>
                <?php } ?>
                <h1 class="text-center archive_title"><?php echo post_type_archive_title(); ?></h1>
                <span class="separator"></span>
                <?php if(!isset($_GET['ship'])){ ?>
                <p class="text-center archive-intro-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore repellendus natus mollitia saepe eaque autem, velit dolorum, commodi amet, nihil soluta facere rerum odit corporis, ipsum sequi adipisci vel molestias.</p>
                <?php 
                    }else{
                        echo '<p class="archive-intro-text text-left">'.get_post_meta( $barcos[0]->ID, $prefix . 'ship_description', true ).'</p>';
                        echo '<p><a class="text-left explore-the-link" href="'.get_post_permalink( $barcos[0]->ID ).'">'.__('Explore the ','gogalapagos'). $nombreDelbarco . '</a></p>';
                        echo '<p><a href="#">'.__('Check departure dates', 'gogalapagos').' 2018 - 2019</a></p>';
                        //var_dump($barcos); 
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <?php 
            if(!isset($_GET['ship'])){
        ?>
        <div class="row">
            <?php 
                foreach( $barcos as $barco ){
            ?>
            <div class="col-sm-6 text-center">
                <?php echo '<a href="'.get_post_type_archive_link('ggitineraries'). '?ship=' .$barco->post_name.'">'.get_the_post_thumbnail($barco->ID, 'medium', array('class', 'img-responsive')).'</a>'; ?>
                <h2><?php echo '<a href="'.get_post_type_archive_link('ggitineraries'). '?ship=' .$barco->post_name.'">'.esc_html($barco->post_title).'</a>'; ?></h2>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>    
</section>
<?php if(isset($_GET['ship'])){ ?>
<?php
    // recuperar los itinerarios del barco
    $args = array(
        'post_type' => 'ggitineraries',
        'posts_per_page' => -1,
        /*'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => $prefix . 'itinerary_ship_id',
                'value' => $barco->ID,
                'compare' => '='
            )
        )*/
    );
    $itinerarios = get_posts($args);
?>
<div class="sections section page-more-content">
    <?php 
        echo $barco->ID.'<br/>';
        var_dump($itinerarios); 
    ?>
</div>
<?php } ?>
<?php get_footer(); ?>
