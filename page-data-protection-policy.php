<?php

if($_REQUEST['dev'] == '2183'){
    get_header('dev');
}else{
    get_header();
}

 
if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); 

		$hide_breadcrumbs = get_post_meta(get_the_ID(), 'hide_breadcrumbs', true);
		//if(!$hide_breadcrumbs){
		?>
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
					yoast_breadcrumb('
					<p id="breadcrumbs">','</p>
					');
					}
					?>	
				</div>
			</div>
		</div>
		<?php
		//}
		?>

        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <?php the_content(); ?>
                    <?php if(is_user_logged_in()){ ?>
                    <a href="<?php echo get_edit_post_link(); ?>">Edit</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php

    } // end while
} // end if


if($_REQUEST['dev'] == '2183'){
    get_footer('dev');
}else{
    get_footer();
}