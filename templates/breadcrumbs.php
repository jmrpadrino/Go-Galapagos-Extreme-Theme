<div class="breadcrumbs">
<?php
function breadcrumbs() {
    global $post;
    
    $prefix = 'gg_';
    
	$url = get_bloginfo('url');
	$a = explode("/",$url);
	$b = explode("/",$_SERVER["REQUEST_URI"]);
	//intersección de arrays para poder quitar la URL
	$c = array_intersect($a, $b);
	$url_array = array_diff($b, $c);
	//quitamos el nombre del post del array
	array_pop($url_array);
	//para quitar las "/page/2"
	if(preg_match('@(/page/)([0-9])@',$_SERVER["REQUEST_URI"])) {
		array_pop($url_array); //quitamos sacar el "/2"
		array_pop($url_array); //quitamos sacar el "/page"
	}
	//para quitar los comentarios "/coment-page-"
	/*if(preg_match('/comment-page-/',$_SERVER["REQUEST_URI"]) || preg_match('/?/',$_SERVER["REQUEST_URI"])) {
		//sacamos el post ya que ya sacamos el comentario
		array_pop($url_array);
	}*/
	echo _x('You\'re in','gogalapagos') .': <a href="'.$url.'/" rel="home">'._x('Home','gogalapagos').'</a>';
	$dir = $url.'/';
	if(is_single() || is_category()) {
        $postType = get_post_type_object(get_post_type());
        if ($postType) {
            $post_type_name = $postType->labels->name;
        }
        
        if (is_singular('gganimal')){ 
            $taxonomia = 'animalgroup';
        }
        if (is_singular('ggtour')){
            $taxonomia = 'go_tours';
        } 
        if (is_singular('ggsatour')){
            $taxonomia = 'go_sa_tours';
        }
        $terminos = wp_get_post_terms($post->ID, $taxonomia);
        
        $dir = get_post_type_archive_link($post->post_type);
        
        if (is_singular('gglocation')){
            $isla = get_post(get_post_meta($post->ID, $prefix . 'visitors_site_island', true));
            $dir = get_post_permalink($isla->ID);
            $post_type_name = $isla->post_title;
        }
        
		//algoritmo para single.php
		$category = 'category';
		foreach($url_array as $folder) {
			if($folder != 'category'){
				$category .= '/'.$folder;
				//hay confusion con las categorias hijos
				//$dir = $url.'/'.$category.'/';
				//con URL para que jale del URL al que pertenece
				echo ' &raquo; <a href="'.$dir.'" rel="category tag">'. $post_type_name . '</a>';
                
			}
		}
        if($terminos){
            echo ' &raquo; <a href="'. get_term_link( $terminos[0]->term_id, $taxonomy) .'" rel="category tag">'. $terminos[0]->name . '</a>';
        }
	} else {
		//para page.php y otros (archivos)
		foreach($url_array as $folder) {
			if($folder != 'tag' && $folder != 'author'){
				if(!is_numeric($folder)){
					$dir = $dir.$folder.'/';//los folders se van acoplando
					echo ' &raquo; <a href="'.$dir.'">'.ucwords(str_replace("-", " ", $folder)) . '</a>';
				}
			}
		}
	}
	echo ' &raquo; <span class="breadcrumb-active-view"><strong>' . $post->post_title . '</strong></span>';
//    echo '<pre>';
//    var_dump($isla);
//    echo '</pre>';
}
    
breadcrumbs();
?>
</div>