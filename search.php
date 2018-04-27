<?php get_header(); ?>
    <div class="sections section">
    <div class="container-fluid top-side-form-container">
        <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <div class="inside-form">
                    <h1 class="search-results-title"><?php _e('Results for: ','gogalapagos'); ?><?php echo $_GET['s']; ?></h1>
                    <form id="search-form" class="search-form" role="form" action="<?php echo home_url('/'); ?>">
                        <label for="s"><?php _e('Type here and press enter','gogalapagos'); ?></label>
                        <?php if (isset($_GET['blog'])){ ?>
                        <input type="hidden" name="blog">
                        <?php } ?>
                        <input id="s" type="text" name="s" width="100%" value="<?php echo $_GET['s']; ?>">
                    </form>
                    <ul class="list-inline filter-tags">
                        <li><a href="#"><?php _e('All Results','gogalapagos');?></a></li>
                        <li><a href="<?php echo get_post_type_archive_link( 'post' ) ?>"><?php _e('Articles','gogalapagos');?></a></li>
                        <li><a href="<?php echo get_post_type_archive_link( 'ggisland' ) ?>"><?php _e('Islands','gogalapagos');?></a></li>
                        <li><a href="<?php echo get_post_type_archive_link( 'ggactivity' ) ?>"><?php _e('Activities','gogalapagos');?></a></li>
                        <li><a href="<?php echo get_post_type_archive_link( 'ggships' ) ?>"><?php _e('Cruises','gogalapagos');?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php
    if (have_posts()){
?>
    <div class="container results-container">    
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <?php 
            while (have_posts()){
                the_post();
                if (has_post_thumbnail()){
                    //echo 'tiene foto';
        ?>
            <div class="col-xs-12 <?php echo get_post_type(get_the_ID()); ?>">
                <div class="row">
                    <article class="search-result-item" style="margin: 18px 0;">
                        <div class="col-sm-4">
                            <a href="<?php echo get_post_permalink(); ?>">    
                            <?php echo the_post_thumbnail( 'large', array('class' => 'img-responsive', 'alt' => get_the_title() ) ); ?>
                            </a>
                        </div>
                        <div class="col-sm-8">
                            <?php
                                the_title('<a href="'.get_post_permalink().'"><h2 class="search-list-title">', '</h2></a>');
                                if ( has_excerpt() ){
                                    the_excerpt();
                                }
                            ?>
                            <a href="<?php echo get_post_permalink(); ?>"><?php _e('Read More','gogalapagos'); ?></a>
                        </div>
                    </article>
                </div>
            </div>
        <?php 
                }else{ 
                    // No tiene foto
        ?>
            <div class="col-xs-12 <?php echo get_post_type(get_the_ID()); ?>">
                <article class="search-result-item" style="margin: 18px 0;">
                <?php
                    the_title('<a href="'.get_post_permalink().'"><h2 class="search-list-title">', '</h2></a>');
                    if ( has_excerpt() ){
                        the_excerpt();
                    }
                ?>
                <a href="<?php echo get_post_permalink(); ?>"><?php _e('Read More','gogalapagos'); ?></a>
                </article>
            </div>
        <?php 
                }
            }
        ?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <div class="pagination-container">
                <?php
                    global $wp_query;
                    $total = $wp_query->max_num_pages;
                    if ( !$current_page = get_query_var('paged') )
                        $current_page = 1;
                    echo paginate_links(
                        array(
                            'prev_next' => false,
                            'current' => $current_page,
                            'total' => $total,
                            'type' => 'list'
                        )
                    );
                ?>
                </div>
            </div>
        </div>
    </div>
    
<?php 
    }else{
        echo '<p class="text-center no-items-text">Mensaje de error de no haber paginas con ese contenido.</p>';
        echo '<p class="text-center">Sugerir contenido.</p>';
    }
?>
    </div>
<?php get_footer(); ?>