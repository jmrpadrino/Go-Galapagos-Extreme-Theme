<?php

add_action("wp_ajax_check_availability", "check_availability");
add_action("wp_ajax_nopriv_check_availability", "check_availability");

function check_availability(){
	global $conn;
	//header('Content-Type: text/html; charset=utf-8');

	$startDate = substr(trim($_POST['start_date']), 0, 10);
	$startDate = explode("/", $startDate);
	$anio = $startDate[2];
	$startDate = $startDate[2]."-".$startDate[0]."-".$startDate[1];

	$endDate = substr(trim($_POST['end_date']), 0, 10);
	$endDate = explode("/", $endDate);
	$endDate = $endDate[2]."-".$endDate[0]."-".$endDate[1];
	$query = "SELECT * FROM kleinto_dispoOnline WHERE (DATE(fecha) BETWEEN '{$startDate}' AND '{$endDate}') ORDER BY fecha ASC";
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$result = $conn->query($query);

	if ($result->num_rows > 0) {
	    // output data of each row

	    $i = 0;
	    while($row = $result->fetch_assoc()) {
	    	/*
			echo "<pre>";
			print_r($row);
			echo "</pre>";
			*/
	    	if($row['codpro'] == 'BAR003'){
	    		$legend[$row['fecha']][$row['tipocabina']] = $row;
	    		$legend[$row['fecha']]['fecha'] = $row['fecha'];
	    		$legend[$row['fecha']]['tipo'] = $row['tipo'];
	    		$legend[$row['fecha']]['familia'] = $row['familia'];
	    		$legend[$row['fecha']]['scuba'] = $row['scuba'];
	    	}
	    	if($row['codpro'] == 'BAR000'){
	    		$coral[$row['fecha']][$row['tipocabina']] = $row;
	    		$coral[$row['fecha']]['fecha'] = $row['fecha'];
	    		$coral[$row['fecha']]['tipo'] = $row['tipo'];
	    		$coral[$row['fecha']]['familia'] = $row['familia'];
	    		$coral[$row['fecha']]['scuba'] = $row['scuba'];
	    	}

	    }

	    //Legends
	    $cabins_legends = $conn->query('SELECT * FROM kleinto_barco_cabinas_orden WHERE cod_barco="BAR003" AND anio="'.intval($anio).'" ORDER BY orden ASC');
	    ?>
	    <div class="side_legend">
	    	<table class="calendar">
	    		<thead>
	    			<tr class="heading">
	    				<th colspan="<?php echo ($cabins_legends->num_rows + 3);?>" class="text-center">CABINS <sup>M/V</sup>GALAPAGOS LEGEND</th>
	    			</tr>
					<tr class="description">
						<td class="text-center">DATE CRUISE</td>
						<?php
						unset($type_codes);
						while($type = $cabins_legends->fetch_assoc()){
	    				/*
	    				echo "<pre>";
	    				print_r($type);
	    				echo "</pre>";
	    				*/
							$type_codes[] = $type['cod_cabina'];
							echo '<td class="text-center">'.$type["descripcion"].'</td>';
						}
						?>
						<td class="text-center hidden-xs hidden-md">Family</td>
						<td class="text-center hidden-xs hidden-md">Diving</td>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php
	    			$yes = "<i class='fa fa-check'></i>";
	    			$no = "<i class='fa fa-times'></i>";
	    			$yes_family = "<img src='".get_bloginfo('url')."/assets/images/family-icon-activo.png' />";
	    			$yes_scuba = "<img src='".get_bloginfo('url')."/assets/images/bandera-scuba.png' />";

	    			$row = 'std';
	    			foreach($legend as $item){
	    				/*
	    				echo "<pre>";
	    				print_r($item);
	    				echo "</pre>";
	    				*/
	    				?>
						<tr class="data <?php echo $row; ?>">
							<td class=""><?php echo substr($item['fecha'],0, 10)." (".$item['tipo'].")";?></td>
							<?php

							foreach($type_codes as $type_l) {
								?>
								<td class="text-center its_cabin" <?php echo ($item[$type_l]['estado'] == 1 && $item[$type_l]['estadoweb'] == 'Open'?'data-barco="'.$item[$type_l]['codpro'].'" data-itinerario="'.$item[$type_l]['tipo'].'" data-tipo="'.$item[$type_l]['tipo'].'" data-cabina="'.$type_l.'" data-fecha="'.strtotime($item[$type_l]['fecha']).'"':''); ?>><?php echo ($item[$type_l]['estado'] == 1 && $item[$type_l]['estadoweb'] == 'Open'?$yes:$no); ?></td>
								<?php
							}

							?>
							<td class="text-center hidden-xs hidden-md"><?php echo ($item['familia'] == 1?$yes_family:''); ?></td>
							<td class="text-center hidden-xs hidden-md"><?php echo ($item['scuba'] == 1?$yes_scuba:''); ?></td>
		    			</tr>
	    				<?php
	    				$row = ($row == 'std'?'alt':'std');
	    			}
	    			?>
	    		</tbody>

	    	</table>
	    </div>
	    <?php
	    //Corals
	    $cabins_corals = $conn->query('SELECT * FROM kleinto_barco_cabinas_orden WHERE cod_barco="BAR000" AND anio="'.intval($anio).'" ORDER BY orden ASC');
	    ?>
	    <div class="side_coral">
	    	<table class="calendar">
	    		<thead>
	    			<tr class="heading">
	    				<th colspan="<?php echo ($cabins_corals->num_rows + 3);?>" class="text-center">CABINS <sup>M/V</sup>CORAL I & CORAL II</th>
	    			</tr>
					<tr class="description">
						<td class="text-center">DATE CRUISE</td>
						<?php
						unset($type_codes);
						while($type = $cabins_corals->fetch_assoc()){
							$type_codes[] = $type['cod_cabina'];
							echo '<td class="text-center">'.$type["descripcion"].'</td>';
						}
						?>
						<td class="text-center hidden-xs hidden-md">Family</td>
						<td class="text-center hidden-xs hidden-md">Diving</td>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php
	    			$yes = "<i class='fa fa-check'></i>";
	    			$no = "<i class='fa fa-times'></i>";
	    			$yes_family = "<img src='".get_bloginfo('url')."/assets/images/family-icon-activo.png' />";
	    			$yes_scuba = "<img src='".get_bloginfo('url')."/assets/images/bandera-scuba.png' />";

	    			$row = 'std';
	    			foreach($coral as $item){
	    				/*
	    				echo "<pre>";
	    				print_r($item);
	    				echo "</pre>";
	    				*/
	    				?>
						<tr class="data <?php echo $row; ?>">
							<td class=""><?php echo substr($item['fecha'],0, 10)." (".$item['tipo'].")";?></td>
							<?php

							foreach($type_codes as $type_l) {
								?>
								<td class="text-center its_cabin" <?php echo ($item[$type_l]['estado'] == 1 && $item[$type_l]['estadoweb'] == 'Open'?'data-barco="'.$item[$type_l]['codpro'].'" data-itinerario="'.$item[$type_l]['tipo'].'" data-tipo="'.$item[$type_l]['tipo'].'" data-cabina="'.$type_l.'" data-fecha="'.strtotime($item[$type_l]['fecha']).'"':''); ?>><?php echo ($item[$type_l]['estado'] == 1 && $item[$type_l]['estadoweb'] == 'Open'?$yes:$no); ?></td>
								<?php
							}

							?>
							<td class="text-center hidden-xs hidden-md"><?php echo ($item['familia'] == 1?$yes_family:''); ?></td>
							<td class="text-center hidden-xs hidden-md"><?php echo ($item['scuba'] == 1?$yes_scuba:''); ?></td>
		    			</tr>
	    				<?php
	    				$row = ($row == 'std'?'alt':'std');
	    			}
	    			?>
	    		</tbody>

	    	</table>
	    </div>
	    <?php
	} else {
	    echo "0 results";
	}
	$conn->close();


	exit;
}

function gg_availability_func($atts){

	$a = shortcode_atts( array(
        'href' => ''
    ), $atts );
	ob_start();

	?>
	<style type="text/css">

		/*
		.side_legend{
			padding-right: 10px !important;
		}
		.side_coral{
			padding-left: 10px !important;
		}
		*/
		@media(min-width: 1025px){
			.side_legend{
				width: 49.5%;
				float: left;
			}
			.side_coral{
				width: 49.5%;
				float: right;
			}
		}

		@media(max-width: 1024px){
			.side_legend{
				width: 69.5%;
				float: left;
			}
			.side_coral{
				width: 30%;
				float: right;
			}
		}

		@media(max-width: 768px){
			.side_legend,
			.side_coral{
				padding: 0;
				width: 100%;
			}
		}


		.availability-form{
			padding-top: 20px;
			padding-bottom: 20px;
			background-color: #0b3958;
			border-radius: 3px;
		}

		.availability-form label{
			color: #fff;
		}

		.availability-form .btn{
			background-color: #0C9BAA;
			box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
			color: #fff;
		}

		.availability-form .btn:hover{
			background-color: #1D4567;
		}

		.calendar{
			margin: 16px 0 25px;
			min-width: 100%;
		}


		.calendar .heading{
			color: #fff;
			background-color: #00adb5;
			border-bottom: 1px solid #fff;
		}

		.calendar .heading th{
			padding: 20px 0;
			font-size: 1.4em;
		}

		.calendar .heading th > sup{
			font-size: 12px;
		}

		.calendar .description{
			color: #fff;
			padding: 6px 0;
			background-color: #0b3a58;
			border-bottom: 1px solid #fff;
		}

		.calendar .description td{
			vertical-align: top;
			padding: 8px 3px;
			font-weight: normal;
			font-size: .8em;
		}

		.calendar .data{
			color: #333;
			padding: 6px 0;
			border-bottom: 1px solid #fff;
			font-weight: bold;
			transition: all .3s;
			-moz-transition: all .3s;
			-webkit-transition: all .3s;
		}

		.calendar .data:hover{
			background-color: #e3e3e3 !important;
			transition: all .3s;
			-moz-transition: all .3s;
			-webkit-transition: all .3s;
		}

		.calendar .data td:last-child{
			border-right: none;
		}
		.calendar .data td{
			border-right: 1px solid #fff;
			vertical-align: middle;
			padding: 8px;
		}

		.calendar .data.std{
			background-color: #f2f2f2;
		}

		.calendar .data.alt{
			background-color: #ECECEC;
		}

		.calendar .fa.fa-check{
			color: #5cb85c;
			font-size: 1.2em;
			transition: all .3s;
			-moz-transition: all .3s;
			-webkit-transition: all .3s;
			text-shadow: 1px 1px 10px rgba(11, 58, 88, 0);
			ransform: scale(1, 1);
			-webkit-transform: scale(1, 1);
			-moz-transform: scale(1, 1);
			-o-transform: scale(1, 1);
			-ms-transform: scale(1, 1);
			cursor: pointer;
		}

		.calendar .fa.fa-check:hover{
			color: #5cb85c;
			transition: all .3s;
			-moz-transition: all .3s;
			-webkit-transition: all .3s;
			text-shadow: 1px 3px 15px rgba(11, 58, 88, 0.5);
			ransform: scale(2, 2);
			-webkit-transform: scale(2, 2);
			-moz-transform: scale(2, 2);
			-o-transform: scale(2, 2);
			-ms-transform: scale(2, 2);
		}

		.calendar .fa.fa-times{
			color: #d9534f;
			font-size: 1.2em;
		}
	</style>
	<div class="col-md-12" id="availability-page">
		<div class="col-md-12 availability-form">
			<div class="col-md-4 col-md-offset-1">
				<div class="form-group">
					<label>Cruise Starting Date:</label>
					<input type="text" class="form-control" id="availability_start_date" name="start_date" >
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Cruise Ending Date:</label>
					<input type="text" class="form-control" id="availability_end_date" name="end_date" >
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<label>&nbsp;</label>
					<button type="button" class="form-control btn" onclick="check_availability()">Search</button>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
		<div id="availability-results">
		</div>
	</div>
	<?php

	$html = ob_get_contents();
	ob_end_clean();
    return $html;

}

add_shortcode('gg_availability', 'gg_availability_func');

function gg_itinerario_link_movil($atts){
	$a = shortcode_atts( array(
        'href' => ''
    ), $atts );

	$html = '<a class="itinerario-link" href="'.$a['href'].'">Learn More</a>';
	$html .= '<div class="itinerario-share"><i class="fa fa-share-alt" data-href="'.$a['href'].'" aria-hidden="true"></i></div>';

    return $html;
}

add_shortcode( 'itinerario', 'gg_itinerario_link_movil' );

function gg_cabins($atts){
	$a = shortcode_atts( array(
        'id' => ''
    ), $atts );

	$html = '<span class="cabin-accordion-button" data-cabin="'.$a[id].'"><i class="fa fa-chevron-down" aria-hidden="true"></i></span>';

    return $html;
}

add_shortcode( 'cabins', 'gg_cabins' );

/* Deck Plan
 * [deck_plan]
 */
function gg_deck_plan( $atts ){
	$a = shortcode_atts( array(
	        'ship' => '',
	        'label' => 'Choose a Deck',
	        'download_label' => 'Download Deck Plan',
	        'download_url' => ''
	    ), $atts );


	$args = array(
		'posts_per_page' => 20,
		'orderby' => 'date',
		'post_type' => 'decks',
		'tax_query' => array(
			array(
				'taxonomy' => 'ships',
				'field' => 'slug',
				'terms' => $a['ship']
			)
		),
		'post_status' => 'publish');

	$posts = get_posts($args);

	$html  = '<div class="col-md-12 deck-plan"><div class="row">';

	$html .= '<div class="col-md-4 pull-left">';
	$html .= '<div class="deck-options-box">';
	$html .= '<div class="deck-label"><h3>'. __('Choose a Deck', 'deck-plan') .'</h3></div>';
	$html .= '<div id="deck_feature">';
	foreach($posts as $img){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $img->ID ), 'full' );
	 	//$image[0] = is_ssl() ? preg_replace( "^http:", "https:", $image[0] ) : $image[0] ;
	    //echo $output;
		$html .= '<img src="'.$image[0].'" id="deck-featured_'.$a['ship'].'" />';
		break;
	}
	$html .= '</div>';
	$html .= '<div class="deck-options"><div class="deck-options-container">';
	$opt = 0;
	foreach($posts as $post){
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		//$image[0] = is_ssl() ? preg_replace( "^http:", "https:", $image[0] ) : $image[0] ;
		$html .= '<div class="deck-option '.($opt == 0?'active':'').'" data-img="'.$image[0].'" data-ship="'.$a['ship'].'" data-option="#deck-'.$post->ID.'">'.get_the_title($post->ID).'</div>';
		$opt++;
	}
	$html .= "</div></div>";
	$html .= "</div>";
	$html .= "<div id='place_box_canfind_".$a['ship']."' class='place_box_canfind'></div>";
	$html .= "</div>";

	$html .= '<div class="col-md-7 pull-right deck-contents" id="contents_'.$a['ship'].'">';
	$opt_c = 0;
	foreach($posts as $post_c){
		$html .= '<div class="deck-content deck-content_'.$a['ship'].' '.($opt_c == 0?'active':'').'" id="deck-'.$post_c->ID.'">'.do_shortcode($post_c->post_content).'</div>';
		$opt_c++;
	}
	$html .= "</div>";

	$html .= '</div></div>';
	if($a['download_url'] != ''){
		$html .= '<div class="col-md-12 deck-plan-download"><div class="row">';
		$html .= '<a class="pull-right" href="'.$a["download_url"].'" target="_blank" title="'.$a["download_label"].'">'.$a["download_label"].'</a>';
		$html .= '</div></div>';
	}

	return $html;
}
add_shortcode( 'deck_plan', 'gg_deck_plan' );

/* Grid Taxonomy
 * [grid_taxonomy]
 */
function gg_grid_taxonomy( $atts ){
	$a = shortcode_atts( array(
	        'taxonomy' => 'post_tag',
	        'number' => '6',
	        'orderby' => 'name',
	        'order' => 'ASC',
	        'columns' => '3',
	        'active' => ''
	    ), $atts );
	$html  = '<div class="col-md-12 grid_taxonomy"><div class="row">';
	$terms = get_terms( $a['taxonomy'], array(
	    'hide_empty' => false,
	    'number' => $a['number'],
	    'orderby' => $a['orderby'],
	    'order' => $a['order']
	));
	$col = 12 / $a['columns'];
	$i = 0;
	foreach($terms as $term){
		if($term->count == 0){
			$link = "javascript:void(0);";
		}else{
			$link = get_term_link( $term );
		}
		$__img = str_replace('http:', 'https:', strip_tags($term->description, '<img>'));
		preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $__img, $__img_result);

		$html_array[$term->slug] .= "<div class='col-md-{$col} grid_taxonomy_item' style='background-image: url(".$__img_result['src'].");'>";
		$html_array[$term->slug] .= "<a href='{$link}' class='tax_slug' data-slug='{$term->slug}' data-active='".($a['active'] == $term->slug?'yes':'no')."'><span class='mask'></span><span class='title'>".$term->name."</span>";
		$html_array[$term->slug] .= "</a>";
		$html_array[$term->slug] .= "</div>";
		$i++;
	}

	$html .= $html_array['birds'];
	$html .= $html_array['mammals'];
	$html .= $html_array['reptils'];
	$html .= $html_array['fish'];
	$html .= $html_array['amphibians'];
	$html .= $html_array['landbirds'];

	$html .= '</div></div>';
	return $html;
}
add_shortcode( 'grid_taxonomy', 'gg_grid_taxonomy' );

/* Grid Post Type
 * [grid_custom_type]
 */
function gg_grid_custom_type( $atts ){

	$a = shortcode_atts( array(
	        'type' => 'post',
	        'button' => 'Read More',
	        'taxonomy' => '',
	        'term' => '',
	        'number' => '12',
	        'orderby' => 'post_date',
	        'order' => 'DESC',
	        'columns' => '3',
	        'style' => 'basic'
	    ), $atts );

	if($a['number'] == 'all') $a['number'] = -1;

	$args = array(
		'posts_per_page'   => $a['number'],
		'offset'           => 0,
		'category'         => '',
		'orderby'          => $a['orderby'],
		'order'            => $a['order'],
		'include'          => '',
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => $a['type'],
		'tax_query' => array(
			array(
				'taxonomy' => $a['taxonomy'],
				'field' => 'slug',
				'terms' => $a['term']
			)
		),
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true );

	$posts = get_posts($args);

	$col = 12 / $a['columns'];
	$html  = '<div class="col-md-12 gg_grid_custom_type" id="'.$a['term'].'_container" data-page="1"><div class="row '.$a['term'].'_page '.$a['term'].'_page1">';
	$i = 0;
	$page = 1;

	foreach($posts as $post){

		if($a['style'] == 'basic'){

			$link = get_permalink($post->ID);
			$html .= "<div class='col-lg-{$col} col-md-4 col-sm-6 col-xs-12'>";
			$html .= "<div class='tarjeta_contenedor_taxonomy gg_grid_custom_type_item'>";
	  		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	  		//$image[0] = is_ssl() ? preg_replace( "^http:", "https:", $image[0] ) : $image[0] ;
			$html .= "<div class='gg_post_image'><a href='{$link}'><img src='".$image[0]."' border='0' alt='".get_the_title($post->ID)."' /></a></div>";
			if($a['taxonomy']){
				$terms = get_the_terms( $post->ID, $a['taxonomy'] );
				foreach ( $terms as $term ) {
	        		$_term = $term->name;
	        		break;
	    		}

				$html .= "<div class='gg_post_taxonomy'>".$_term."</div>";
			}
			$html .= "<div class='gg_post_title'><h2><a href='{$link}'>".get_the_title($post->ID)."</a></h2></div>";
			$html .= "<div class='gg_post_excerpt'>".substr(strip_tags($post->post_excerpt), 0, 200)."...</div>";
			$html .= "<div class='gg_post_footer'>";
			$html .= "<a href='".$link."' title='".get_the_title($post->ID)."' class='gg_share pull-left'><i class='vc_icon_element-icon fa fa-share' data-href='".$link."'></i></a>";
			$html .= "<a href='".$link."' title='".get_the_title($post->ID)."' class='gg_readmore pull-right'>".$a['button']."</a>";
			$html .= "</div>";
			$html .= "</div>";
			$html .= "</div>";

		}

		if($a['style'] == 'mini'){

			$link = get_permalink($post->ID);
			$html .= "<div class='col-lg-{$col} col-md-4 col-sm-4 col-xs-6 mini'>";
			$html .= "<div class='gg_grid_custom_type_item'>";
	  		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	  		//$image[0] = is_ssl() ? preg_replace( "^http:", "https:", $image[0] ) : $image[0] ;
				$html .= "<div class='gg_post_image'><img src='".$image[0]."' border='0' alt='".get_the_title($post->ID)."' />";
					$html .= "<div class='gg_mask'></div><div class='gg_post_title'><h2>".get_the_title($post->ID)."</h2></div>";
				$html .= "</div>";
				$html .= "<div class='gg_post_excerpt'>".substr(strip_tags($post->post_excerpt), 0, 200)."...<br/>";
				$html .= "<a href='".$link."' title='".get_the_title($post->ID)."' class='gg_readmore pull-right'>".$a['button']."</a>";
				$html .= "</div>";
			$html .= "</div>";
			$html .= "</div>";

		}

		if($i == 5){
			$page++;
			$html .= '</div><div class="row '.$a['term'].'_page '.$a['term'].'_page'.$page.'" style="display: none;">';
			$i = 0;
		}else{
			$i++;
		}

	}


	$html .= '</div></div>';
	if($page > 1){
		$html .= '<div class="grid_navigation navigation" id="navigation_'.$a['term'].'"><p>';
			$html .= '<a class="prev" style="display: none;" href="javascript:prevGridPage(\''.$a['term'].'\', \''.$page.'\');">'.__('Prev Page').'</a>&nbsp;&nbsp;-&nbsp;&nbsp;';
			$html .= '<a class="next" href="javascript:nextGridPage(\''.$a['term'].'\', \''.$page.'\');">'.__('Next Page').'</a>';

		$html .= '</p></div>';
	}
/*
	$html .= '$(".fa-share").jsSocials({
			shareIn: "popup",
			url: getURLtoShare(this),
			showLabel: false,
    		showCount: false,
		    shares: ["email", "twitter", "facebook", "googleplus", "pinterest", "whatsapp"]
		});';
		*/

	return $html;

}
add_shortcode( 'grid_custom_type', 'gg_grid_custom_type' );

/* Newsletter
 * [newsletter_form]
 */

function gg_newsletter_form( $atts ){
	ob_start();
	?>
	<link rel='stylesheet' type='text/css' href='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/css/signup-form.css'>
	<?php
	$html  = "<div class='gg_newsletters'>";
	$html .= '<form data-id="embedded_signup:form" class="Form" name="embedded_signup" method="POST" action="https://visitor2.constantcontact.com/api/signup">';
	$html .= '<input data-id="ca:input" type="hidden" name="ca" value="51139ca7-d10b-49e7-86f2-f8c7d3173ffc">';
	$html .= '<input data-id="list:input" type="hidden" name="list" value="1772004166">';
	$html .= '<input data-id="source:input" type="hidden" name="source" value="EFD">';
	$html .= '<input data-id="required:input" type="hidden" name="required" value="list,email">';
	$html .= '<input data-id="url:input" type="hidden" name="url" value="">';
	$html .= "<input type='email' data-id='Email Address:input' name='email' class='email' placeholder='Your e-mail' />";
	$html .= "<button type='submit' data-enabled='enabled' class='button'><i class='fa fa-angle-right'></i></button>";
	$html .= "</form>";
	$html .= "</div>";
	$html .= "<div id='result_mail_validation'></div>";

	echo $html;
	?>
	<script type='text/javascript'>
	   var localizedErrMap = {};
	   localizedErrMap['required'] = 		'This field is required.';
	   localizedErrMap['ca'] = 			'An unexpected error occurred while attempting to send email.';
	   localizedErrMap['email'] = 			'Please enter your email address in name@email.com format.';
	   localizedErrMap['birthday'] = 		'Please enter birthday in MM/DD format.';
	   localizedErrMap['anniversary'] = 	'Please enter anniversary in MM/DD/YYYY format.';
	   localizedErrMap['custom_date'] = 	'Please enter this date in MM/DD/YYYY format.';
	   localizedErrMap['list'] = 			'Please select at least one email list.';
	   localizedErrMap['generic'] = 		'This field is invalid.';
	   localizedErrMap['shared'] = 		'Sorry, we could not complete your sign-up. Please contact us to resolve this.';
	   localizedErrMap['state_mismatch'] = 'Mismatched State/Province and Country.';
		localizedErrMap['state_province'] = 'Select a state/province';
	   localizedErrMap['selectcountry'] = 	'Select a country';
	   var postURL = 'https://visitor2.constantcontact.com/api/signup';
	</script>
	<script type='text/javascript' src='https://static.ctctcdn.com/h/contacts-embedded-signup-assets/1.0.2/js/signup-form.js'></script>
	<?php
	$view = ob_get_contents();
	ob_clean();

	return $view;
}
add_shortcode( 'newsletter_form', 'gg_newsletter_form' );

/* Social Icons
 * [social_networks]
 */
function gg_social_networks( $atts ){
	$html  = "<div class='social_networks_icons'>";
	$html .= "<a href='https://www.facebook.com/GoGalapagosEcuador/'><img src='/assets/images/facebook.png' alt='Facebook' /></a>";
	$html .= "<a href='https://twitter.com/go_galapagos'><img src='/assets/images/twitter.png' alt='Twitter' /></a>";
	$html .= "<a href='https://www.youtube.com/user/Kleintours'><img src='/assets/images/youtube.png' alt='YouTube' /></a>";
	$html .= "<a href='https://www.instagram.com/go_galapagos/'><img src='/assets/images/instagram.png' alt='Instagram' /></a>";
	$html .= "<a href='https://plus.google.com/+KleintoursGalapagosEcuador'><img src='/assets/images/google.png' alt='Google+' /></a>";
	$html .= "</div>";
	return $html;
}
add_shortcode( 'social_networks', 'gg_social_networks' );

function gg_button( $atts ){
	$a = shortcode_atts( array(
	        'url' => '#',
	        'value' => 'Boton',
	        'class' => '',
	        'icon' => ''
	    ), $atts );
	$html  = "<div class='gg_button {$a['class']}'>";
	$html .= "<a href='{$a['url']}'>{$a['value']}";
	if($a['icon'] != ''){
		$html .= "<i class='fa {$a['icon']}'></i>";
	}
	$html .= "</a></div>";
	return $html;
}
add_shortcode( 'button', 'gg_button' );

function gg_go_package_box( $atts ){
	global $conn;
	wp_enqueue_style('gg_go_package_box', get_stylesheet_directory_uri()."/css/gopack.css", false, rand(0, 1000));
	$a = shortcode_atts( array(
	        'url' => '#',
	        'txt1' => 'Go 1',
	        'txt2' => 'Galapagos Cruise',
	        'txt3' => 'From US$2,422',
	        'txt4' => '6 Nights',
	        'color' => 'amarillo',
	        'back' => '' //700x390
	    ), $atts );
	ob_start();

	if($a['txt1'] != 'Go 5'){
		if($a['txt1'] == 'Go 1') $code = "KPLA001";
		if($a['txt1'] == 'Go 2') $code = "KPLA002";
		if($a['txt1'] == 'Go 3') $code = "KPLA009";
		if($a['txt1'] == 'Go 4') $code = "KPLA019";
		if($a['txt1'] == 'Go 6') $code = "KTPE200";
		$sql = "SELECT cod_ser,Precio_Web
		FROM kleinto_tarifaservicio
		WHERE cod_ser IN ('".$code."')
		AND anio = '2017'
		AND cod_tippersona = 'ADT'
		AND cod_tiphab='DBL'
		AND Temporada = 'L'
		AND tipo_cabina = 'STP'
		AND Tipopqt IN ('C','B')";
	}else{
		$sql = "SELECT cod_ser,Precio_Web
		FROM kleinto_tarifaservicio
		WHERE cod_ser IN ('KTQ200')
		AND anio = 2017
		AND cod_tippersona = 'ADT'
		AND cod_tiphab='DBL'
		AND Temporada = 'L'
		AND tipo_cabina = ''
		AND Tipopqt IN ('C','B','L')";
	}
	$result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
        $precio = number_format($row[Precio_Web]);
    }
	?>
	<div class="gopack <?php echo $a['color']; ?>" style="background-image:url(<?php echo $a['back']; ?>);">
		<a href="<?php echo $a['url'];?>" title="<?php echo $a['txt2']; ?>">
			<span class="pack"><?php echo $a['txt1']; ?></span>
			<span class="title"><?php echo $a['txt2']; ?></span>
			<span class="info">From US$<?php echo $precio; ?><br/><?php echo $a['txt4']; ?></span>
		</a>
	</div>
	<?php
	$html = ob_get_contents();
	ob_end_clean();
	return $html;
}
//[gopack_box url="" txt1="Go 1" txt2="Galapagos Cruise" txt3="From US$2,422" txt4="6 Nights" back=""]
add_shortcode( 'gopack_box', 'gg_go_package_box' );



function gg_itinirarie_title( $atts ){
	$a = shortcode_atts( array(
	        'pre_title' => '4 days/3 nights',
	        'title' => 'CENTRAL',
	        'letter' => 'A',
	        'post_title' => 'Monday - Thursday',
	        'color' => 'pink'
	    ), $atts );
	ob_start();
	?>
		<div class="itinerario_titulo <?php echo $a['color']; ?>">
			<div class="pre_title"><?php echo $a['pre_title']; ?></div>
			<div class="title">
				<div class="letter"><?php echo $a['letter']; ?></div>
				<div class="full_title"><?php echo $a['title']; ?></div>
			</div>
			<div class="post_title"><?php echo $a['post_title']; ?></div>
		</div>
	<?php
	$html = ob_get_contents();
	ob_get_clean();

	return $html;
}
add_shortcode( 'gg_itineraries_title', 'gg_itinirarie_title' );

?>
