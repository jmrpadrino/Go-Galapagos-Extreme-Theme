<?php 
    get_header(); 
    the_post();
    if( has_post_thumbnail() ){
        get_template_part('/templates/thumbnail-page');
    }else{
        get_template_part('/templates/no-thumbnail-page');
    }
    get_footer(); 
?>