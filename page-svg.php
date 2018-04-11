<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prueba Barco</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        body{
            overflow: hidden;
        }
        .img-background{
            position: absolute;
            top: -50%; 
            left: -25%;
        }
        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0);
            }
            25% {
                transform: translateY(-5px) rotate(2deg);
            }
            50%{
                transform: translateY(-5px) rotate(0);
            }
            75%{
                transform: translateY(-5px) rotate(-2deg);
            }
            100% {
                transform: translateY(0px) rotate(0);
            }
        }
        @keyframes moves{
            0%{
                transform: scale(1);
            }
            50%{
                transform: scale(1.02);
            }
            100%{
                transform: scale(1);
            }
        }
        svg{
            width: 100%;
            height: auto;
            animation: float;
            animation-duration: 18s;
            animation-iteration-count: infinite;
        }
        .ocean-moves{
            animation: moves;
            animation-duration: 9s;
            animation-iteration-count: infinite;
        }
        .contenedor-small{
            z-index: 999;
            width: 60%;
            margin: auto;
            margin-top: 10%;
        }
        .cabin-path path, .cabin-path polygon, .cabin-path rect{
            cursor: pointer;
            fill: rgba(78, 255, 0, 0);
            transition: all linear .1s;
            stroke: #646464;
            stroke-width:3px;
        }
        .cabin-path.busy path, .cabin-path.busy polygon, .cabin-path.busy rect,.cabin-path.busy:hover path, .cabin-path.busy:hover polygon, .cabin-path.busy:hover rect{
            stroke: red;
            fill: rgba(39, 39, 39, 0.4);
            stroke-width:3px;
            cursor: url(<?= get_template_directory_uri(); ?>/images/lock-icon.png), auto;
        }
        .cabin-path:hover path, .cabin-path:hover polygon, .cabin-path:hover rect{
            fill: rgba(78, 255, 0, .5);
        }
        .cabin-path.active path, .cabin-path.active polygon, .cabin-path.active rect{
            fill: rgba(78, 255, 0, 1);
        }
        .cabin-path.last-selected path, .cabin-path.last-selected polygon {
            fill: url(#diagonalHatch);
        }
    </style>
</head>
<body>
<div class="img-background">
    <img class="ocean-moves" src="<?= get_template_directory_uri() ?>/images/page-svg-back.jpg">
</div>
<div class="contenedor-small">
<?xml version="1.0" encoding="utf-8"?>
<!-- Generator: Adobe Illustrator 16.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 1500 700" style="enable-background:new 0 0 1500 700;" xml:space="preserve">
<g id="Capa_1" class="cabin-path">
	<image style="overflow:visible;" width="4469" height="1440" xlink:href="<?= get_template_directory_uri() ?>/images/9E6FE0E4.png"  transform="matrix(0.3493 0 0 0.3493 -30.9836 98.5128)"></image>
</g>
<g id="c-59" class="cabin-path">
	<polygon class="st0" points="734.7,163.3 632.3,163.3 632.2,242.7 604.7,243.3 604.7,341.3 734.7,341.3 	"/>
</g>
<g id="c-57" class="cabin-path">
	<rect x="734.7" y="163.3" class="st0" width="102" height="178"/>
</g>
<g id="c-55" class="cabin-path">
	<path class="st0" d="M961.3,281.8v-42.5c7.8-3.9,14.7-13.4,21.3-24.8l17.5,0.5v-51.7H836.7v178H1000V330v-47.5L961.3,281.8z"/>
</g>
<g id="c-53" class="cabin-path">
	<path class="st0" d="M1000,330h104V163.3h-104V215l-17.5-0.5c-6.6,11.3-13.5,20.8-21.3,24.8v42.5l38.8,0.8V330z"/>
</g>
<g id="c-51" class="cabin-path">
	<polygon class="st0" points="1104,326.3 1219,326.3 1219,287.7 1212.9,287.5 1212.9,163.3 1104,163.3 	"/>
</g>
<g id="c-50" class="cabin-path">
	<polygon class="st1" points="1206.7,547 1122,547 1122,392.3 1115.3,392.7 1115.3,357 1211.3,357 1211.3,494 1206.7,497.3 	"/>
</g>
<g id="c-52" class="cabin-path">
	<rect x="1003.6" y="394" class="st0" width="118.4" height="153"/>
</g>
<g id="c-54" class="cabin-path">
	<rect x="872.5" y="365" class="st0" width="131.1" height="182"/>
</g>
<g id="c-56" class="cabin-path">
	<rect x="749.5" y="365" class="st0" width="123" height="182"/>
</g>
<g id="c-58" class="cabin-path">
	<polygon class="st0" points="750,547 637,547 637,504.3 627,504.3 627,365 750,365 	"/>
</g>
</svg>
    
</div>

<script>
    $('.cabin-path').click( function(){
        var pax = 11;
        var cabins_selected = [];
        var cabinas = '';
        if(!$(this).hasClass('busy')){
            id = $(this).attr('id');
            id = id.split('-');
            //$('svg').find('.cabin-path').removeClass('active');
            if( $(this).hasClass('active') ){              
                $(this).removeClass('active');
            }else{
                $(this).addClass('active');   
            }
        }
        cabinas = $('.cabin-path.active');
        $.each( cabinas, function(i,v){
            var idcabina = cabinas[i].id.split('-');  
            cabins_selected[i] = idcabina[1];
        });
        console.log(cabins_selected);
    })
</script>
</body>
</html>