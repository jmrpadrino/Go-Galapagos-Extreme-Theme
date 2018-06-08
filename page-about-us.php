<?php 
get_header(); 
the_post();
/*if( has_post_thumbnail() ){
        get_template_part('/templates/thumbnail-page');
    }else{
        get_template_part('/templates/no-thumbnail-page');
    }*/
$prefix = 'gg_';
?>
<!--section id="top" class="sections section thumbnail-page">
    <div class="container-fluid nopadding text-center" style="height: 60vh; background-image: url(<?php echo the_post_thumbnail_url(); ?>); background-position: center; background-size: cover; background-repeat: no-repeat; padding-top: 30vh;">
        <?php 
        $meta = get_post_meta(get_the_id(), $prefix . 'page_alter_title', true);
        if(!empty($meta)){
            echo '<h1 style="margin: auto; color: white; text-shadow: 1px 1px 3px black;">'. $meta . '</h1>';
        }else{
            echo the_title('<h1 style="margin: auto; color: white; text-shadow: 1px 1px 3px black;">','</h1>'); 
        }
        ?>
        <?php 
        $meta = get_post_meta(get_the_id(), $prefix . 'page_hero_text', true);
        if(!empty($meta)){
            echo '<p class="page-hero-text">'. $meta . '</p>';
        }
        ?>
        <span class="home-get-in-love-separator"></span>
    </div>
    <div class="container-fluid" style="height: 70vh;">
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-lg-offset-2 inner-page-content" style="margin-top: 60px;">
                <?php 
                $meta = get_post_meta(get_the_id(), $prefix . 'page_first_section_content', true);
                if(!empty($meta)){
                    echo '<p class="page-fold-text">'. $meta . '</p>';
                }
                ?>
            </div>
        </div>
    </div>
</section-->
<section class="sections section thumbnail-page">
    <div class="container-fluid nopadding text-center" style="height: 60vh; background-image: url(<?php echo the_post_thumbnail_url(); ?>); background-position: center; background-size: cover; background-repeat: no-repeat; padding-top: 30vh;">
        <?php 
            $meta = get_post_meta(get_the_id(), $prefix . 'page_alter_title', true);
            if(!empty($meta)){
                echo '<h1 style="margin: auto; color: white; text-shadow: 1px 1px 3px black;">'. $meta . '</h1>';
            }else{
                echo the_title('<h1 style="margin: auto; color: white; text-shadow: 1px 1px 3px black;">','</h1>'); 
            }
        ?>
        <span class="home-get-in-love-separator"></span>
        <?php 
            $meta = get_post_meta(get_the_id(), $prefix . 'page_hero_text', true);
            if(!empty($meta)){
                echo '<p class="page-hero-text">'. $meta . '</p>';
            }
        ?>
    </div>
    <div class="container-fluid" style="height: 40vh;">
        <div class="row">
            <div class="col-xs-12 col-lg-8 col-lg-offset-2 inner-page-content" style="margin-top: 36px;">
                <?php 
                    $meta = get_post_meta(get_the_id(), $prefix . 'page_first_section_content', true);
                    if(!empty($meta)){
                        echo '<p class="page-fold-text">'. $meta . '</p>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<!--section class="section sections">
    <canvas id="elcanvas1" class="our-history-background-dots"></canvas>
    <div class="history-timeline">
        <div id="history-timeline" class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <h2>Our History</h2>
                    <span class="separator"></span>
                    <div class="row year">
                        <div class="col-sm-6 col-md-6 col-md-offset-1">
                            <h3 class="our-history-year">1982</h3>
                            <p>For all of us at Go Galapagos - Kleintours, it is very important that we be environmentally and socially responsible. The details you will find, as standard, on board are designed such that at every level we can provide our guests with practical solutions to help minimize any ecological impact. Our vessels are certified to the highest national and international standards of good environmental practice.</p>
                            <p>Our fleet is operated with the utmost respect for the island ecology. Our aim is to reduce our ecological footprint at every level, by as much as possible. In deference to this ethos, our vessels are equipped with state-of-the-art technology in key areas such as waste management, water treatment and energy consumption.</p>
                        </div>
                        <div class="col-sm-5">
                            <img src="http://placehold.it/360x250?text=Legend%20OLD" class="img-responsive rotar-derecha">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <img src="http://placehold.it/360x250?text=Legend%20NEW" class="img-responsive rotar-izquierda">
                        </div>
                        <div class="col-sm-6">
                            <h3 class="our-history-year">2001</h3>
                            <p>For all of us at Go Galapagos - Kleintours, it is very important that we be environmentally and socially responsible. The details you will find, as standard, on board are designed such that at every level we can provide our guests with practical solutions to help minimize any ecological impact. Our vessels are certified to the highest national and international standards of good environmental practice.</p>
                            <p>Our fleet is operated with the utmost respect for the island ecology. Our aim is to reduce our ecological footprint at every level, by as much as possible. In deference to this ethos, our vessels are equipped with state-of-the-art technology in key areas such as waste management, water treatment and energy consumption</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-1">
                            <h3 class="our-history-year">2004</h3>
                            <p>For all of us at Go Galapagos - Kleintours, it is very important that we be environmentally and socially responsible. The details you will find, as standard, on board are designed such that at every level we can provide our guests with practical solutions to help minimize any ecological impact. Our vessels are certified to the highest national and international standards of good environmental practice.</p>
                            <p>Our fleet is operated with the utmost respect for the island ecology. Our aim is to reduce our ecological footprint at every level, by as much as possible. In deference to this ethos, our vessels are equipped with state-of-the-art technology in key areas such as waste management, water treatment and energy consumption</p>
                        </div>
                        <div class="col-sm-5">
                            <img src="http://placehold.it/360x250?text=Coral%20I" class="img-responsive rotar-derecha">
                        </div>
                    </div>
                    <div class="row year">
                        <div class="col-sm-5">
                            <img src="http://placehold.it/360x250?text=Coral%20II" class="img-responsive rotar-izquierda">
                        </div>
                        <div class="col-sm-6">
                            <h3 class="our-history-year">2006</h3>
                            <p>For all of us at Go Galapagos - Kleintours, it is very important that we be environmentally and socially responsible. The details you will find, as standard, on board are designed such that at every level we can provide our guests with practical solutions to help minimize any ecological impact. Our vessels are certified to the highest national and international standards of good environmental practice.</p>
                            <p>Our fleet is operated with the utmost respect for the island ecology. Our aim is to reduce our ecological footprint at every level, by as much as possible. In deference to this ethos, our vessels are equipped with state-of-the-art technology in key areas such as waste management, water treatment and energy consumption</p>
                        </div>
                    </div>
                    <div class="row year">
                        <div class="col-sm-6 col-sm-offset-1">
                            <h3 class="our-history-year">2011</h3>
                            <p>For all of us at Go Galapagos - Kleintours, it is very important that we be environmentally and socially responsible. The details you will find, as standard, on board are designed such that at every level we can provide our guests with practical solutions to help minimize any ecological impact. Our vessels are certified to the highest national and international standards of good environmental practice.</p>
                            <p>Our fleet is operated with the utmost respect for the island ecology. Our aim is to reduce our ecological footprint at every level, by as much as possible. In deference to this ethos, our vessels are equipped with state-of-the-art technology in key areas such as waste management, water treatment and energy consumption</p>
                        </div>
                        <div class="col-sm-5">
                            <img src="http://placehold.it/360x250?text=Karanki" class="img-responsive rotar-derecha">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var elemento = document.getElementById('elcanvas1');
        var alto = document.getElementById('history-timeline').offsetHeight;
        var ancho = document.getElementById('history-timeline').offsetWidth;            
        elemento.height = alto;
        elemento.width = ancho;

        var contexto = elemento.getContext("2d");

        contexto.beginPath();
        contexto.lineWidth = 10;
        contexto.setLineDash([0,30]);
        contexto.shadowColor = "rgba(0,0,0,.7)";
        contexto.shadowOffsetY = 2;
        contexto.shadowOffsetX = 2;
        contexto.shadowBlur = 5;
        contexto.lineCap = "round";
        contexto.moveTo(690,40);

        contexto.quadraticCurveTo(1200, 400, 600, 420);
        contexto.quadraticCurveTo(-150, 680, 630, 820);
        contexto.quadraticCurveTo(1200, 1000, 820, 1100);
        contexto.quadraticCurveTo(-150, 1370, 570, 1590);
        contexto.quadraticCurveTo(960, 1750, 820, 1890);
        contexto.quadraticCurveTo(670, 1920, 660, 1950);

        contexto.strokeStyle = "#bcb6aa";

        contexto.stroke();



        /*
        var c = document.getElementById("elcanvas");
        var ctx = c.getContext("2d");
        ctx.beginPath();
        ctx.moveTo(0, 660);
        ctx.quadraticCurveTo(1500, 920, 2000, 0);
        ctx.lineTo(2000,2000);
        ctx.lineTo(0, 960);
        grd = ctx.createLinearGradient(0, 0, 2000, 0);
        grd.addColorStop(0, "#feda75");
        grd.addColorStop(0.25, "#fa7e1e");
        grd.addColorStop(0.50, "#d62976");
        grd.addColorStop(0.75, "#962fbf");
        grd.addColorStop(1, "#4f5bd5");
        ctx.closePath();
        ctx.fillStyle = grd;
        ctx.fill();
        */

    </script>
</section-->
<section class="section sections">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>Galapagos Conservancy</h2>
                <span class="separator"></span>
                <p>For all of us at Go Galapagos - Kleintours, it is very important that we be environmentally and socially responsible. The details you will find, as standard, on board are designed such that at every level we can provide our guests with practical solutions to help minimize any ecological impact. Our vessels are certified to the highest national and international standards of good environmental practice. Our fleet is operated with the utmost respect for the island ecology. Our aim is to reduce our ecological footprint at every level, by as much as possible. In deference to this ethos, our vessels are equipped with state-of-the-art technology in key areas such as waste management, water treatment and energy consumption.</p>
                <h3>Go Galapagos - Kleintours is a proud partner of  Galapagos Conservancy.</h3>
                <p>Galapagos Conservancy works to balance both conservation and community in one of the world’s most remarkable ecosystems. Through support from its members, GC works to preserve, protect, and restore the Galapagos Islands and their extraordinary marine and terrestrial biodiversity through three main conservation programs: Giant Tortoise Restoration, Ecosystem and Species Restoration, and Education for Sustainability. Visit www.galapagos.org to learn more. Our work in Galapagos goes hand-in-hand with that of the Galapagos National Park Service, an institution key to the wellbeing of the islands.</p>
            </div>
        </div>
        <div class="row" style="margin-top: 36px;">
            <div class="col-sm-6">
                <img src="<?= get_template_directory_uri() ?>/images/galapagos-conservancy-gogalapagos.png" class="img-responsive logos-conservacy" style="display: block; margin: 0 auto;">
            </div>
            <div class="col-sm-6">
                <img src="<?= get_template_directory_uri() ?>/images/parque-nacional-galapagos-gogalapagos.png" class="img-responsive logos-conservacy" style="display: block; margin: 0 auto;">
            </div>  
        </div>
    </div>
</section>
<section class="section sections social-investment">
    <div class="nextSlide hidden-xs">
        <span class="fa fa-chevron-right"></span>        
    </div>
    <div class="prevSlide hidden-xs">
        <span class="fa fa-chevron-left"></span>
    </div>
    <div class="fullpage-slide">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Social Investment</h2>
                    <span class="separator"></span>
                    <p>Not only does Go Galapagos - Kleintours invest in the betterment of local communities within the islands but we also have some very successful projects on mainland Ecuador. We have a long history of working with the Karanki Magdalena indigenous community to the north of Quito. Through multi-level capacitation, in hospitality, tourism, cooking, health and accounting, visitors are now able to immerse themselves in participatory, cross-cultural, family visits with the community to mutual benefit.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="fullpage-slide">
        <div class="social-karanki">
            <div class="social-karanki1" style="display: flex;">
                <img src="http://placehold.it/2000x1333?text=karanki" class="img-responsive social-investment-img">
            </div>
        </div>
    </div>
</section>
<section class="section sections">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="proudly-title">Proudly members of</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="partners-container">
                    <?php
                        $args = array(
                            'post_type' => 'ggmembership',
                            'posts_per_page' => -1
                        );
                        $logos = get_posts($args);
                        //var_dump($logos);
                        if($logos){
                            foreach($logos as $logo){
                                $img = get_the_post_thumbnail_url( $logo->ID, 'medium' );
                                echo '<img src="'.$img.'" class="img-responsive">';
                            }
                        }else{
                            echo 'There are no memberships registred in wordpress administrator.';
                        }
                    ?>
                </div>
            </div>            
        </div>
    </div>
</section>
<?php /* POR DESARROLLAR EN MARKETING 
<section class="section sections">
    <h1>Let's create moments</h1>
</section>
*/ ?>
<?php get_footer(); ?>


