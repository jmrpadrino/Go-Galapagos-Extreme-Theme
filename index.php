<?php get_header(); ?>
<section class="sections section">    
<div class="blog-fold" style="background-image: url(<?= get_template_directory_uri() ?>/images/blogBkg.jpg);">
    <div class="hero-mask"></div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1 class="blog-archive-title">Go Galapagos <?= _e('Blog', 'gogalapagos'); ?></h1>
                <p class="page-hero-text"><?= _e('Get the latest news','gogalapagos'); ?></p>
                <span class="separator"></span>
            </div>
        </div>
    </div>
</div>
<div class="blog-utilities">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center">
                <form id="searh-the-blog" class="search-the-blog" role="form" action="<?= home_url(); ?>">
                    <div class="input-group col-sm-4 col-sm-offset-4">
                        <input type="hidden" name="blog">
                        <input type="text" name="s" class="blog-search-input search-query form-control" placeholder="<?= _e('Search the blog','gogalapagos');?>" />
                        <span class="input-group-btn">
                            <button class="btn blog-search-btn" type="submit">
                                <span class=" glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="row tags">
            <div class="col-xs-12 text-center">
                <h2><?= _e('Categories', 'gogalapagos'); ?></h2>
                <span class="separator"></span>
                <ul class="list-inline tag-list blog-tag-list">
                <?php 
                    //echo get_the_categories( '', '<span class="tag-separator">|</span>', '</div>' ); 
                    
                    foreach( get_categories() as $category){
                        echo '<li><a href="'. get_term_link( $category, 'category' ) .'">' . $category->cat_name . '</a></li>';
                    }
                ?> 
                </ul>
            </div>
        </div>
    </div>
</div>
</section>
<section class="sections section">    
    <div class="container-fluid">
        <div class="row nopadding">
            <?php

            if (have_posts()){ 
                while (have_posts()){
                    the_post();
                    if(has_post_thumbnail()){
                        $imagen = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    }else{
                        $imagen = get_template_directory_uri() . '/images/no-thumbnail-post.jpg';
                    }
            ?>
            <div class="post-placeholder col-sm-6 col-md-4 nopadding" style="background-image: url(<?= $imagen ?>); ">
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
</section>
<?php get_footer('blog'); ?>