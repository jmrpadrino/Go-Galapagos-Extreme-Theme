$(document).ready( function(){
    // CARGAR LA INFORMACION LATERIAL VIA AJAX
    $('li.load').mouseenter( function(e){
        timer = setTimeout( function(){
            if ( $('#' + e.currentTarget.id).hasClass('islands') ){
                info = 'islands';
                go_show_archive(info);
            }
            if ( $('#' + e.currentTarget.id).hasClass('activities') ){
                info = 'activities';
                go_show_archive(info);
            }
            if ( $('#' + e.currentTarget.id).hasClass('animals') ){
                info = 'animals';
                go_show_archive(info);
            }
            if ( $('#' + e.currentTarget.id).hasClass('pages') ){
                info = 'pages';
                go_show_archive(info);
            }
        }, 1000 );
    }).mouseleave( function(){
        clearTimeout(timer);
    });
    $('.land-link').click( function(){
        var tourgroup = $(this).data('tourgroup');
        go_show_land_tours(tourgroup);
    });
});
// ______FUNCIONES VARIAS_____
/* MUESTRA EL CONTENIDO 
* EN LA SECCION LATERIAL 
* DE LA NAVEGACION ALTERNATIVA
*/
function go_show_archive(info){
    // VALIDAR SI ESTA ENCIMA DEL MISMO ITEM PARA NO HACER DOBLE AJAX
    if (info != lastinfo ){
        lastinfo = info; // ALMACENO LA REFERENCIA DE LA INFORMACIÓN ANTERIOR
        /* HAGO EL AJAX
        * LLAMAR A FUNCION getAlterSectionInfo()
        * CUANDO FINALICE .DONE CONSTRUIR LA INFO EN UNA VARIABLE
        * MOSTRAR MARIABLE EN .HTML()
        */
        $.ajax({
            type: 'POST',
            url: goga_url.ajaxurl,
            data: {
                'action': 'ajaxConversion',
                'action': 'getAlterSectionInfo',
                'info': info
            },
            beforeSend: function (){
                $('.alter-nav-container').html('Loading, please wait');
            },
            success: function (result){
                setTimeout( function(){
                    $('.alter-nav-container').html('Gattering information');
                    setTimeout( function () {
                        $('.alter-nav-container').html(result);
                    },200); 
                },200);               
            },
            error: function (error) {
                $('.alter-nav-container').html('There\'s something wrong right now. Please try later!');
            }
        }).done( function(){
            clearTimeout(timer);
        })
    }
}
/* MUESTRA LOS LAND TOURS SEGUN LA CATEGORIA */
function go_show_land_tours(info){
    $.ajax({
        type: 'POST',
        url: goga_url.ajaxurl,
        data: {
            'action': 'ajaxConversion',
            'action': 'getLandtours',
            'info': info
        },
        dataType: 'json',
        beforeSend: function (){
            $('#show-tours').html('Loading, please wait');
        },
        success: function (result){
            console.log(result);
            var htmlResponse = '';
            htmlResponse += paint_ctegory_info(result.info_categoria);
            $.each(result.tours, function(index, value){
                htmlResponse += paint_tour_box(value);
            })
            $('#show-tours').html(htmlResponse);
            /*setTimeout( function(){
                $('#show-tours').html('Gattering information');
                setTimeout( function () {
                    $('#show-tours').html(result);
                },200); 
            },200);*/
        },
        error: function (error) {
            $('#show-tours').html('There\'s something wrong right now. Please try later!');
        }
    })
}
function paint_tour_box(valores){
    var cards = '';
    var precios = '';
    cards += '<div class="row tours-list">';
    cards += '<div id="'+valores.dispo_code+'" class="col-xs-12 tour-item">'; 
    cards += '<div class="row">';
    cards += '<div class="col-sm-3">';
    cards += '<div class="tour-img-placeholder">';
    if (valores.thumbnail){
        cards += '<img src="'+valores.thumbnail+'" alt="'+valores.post_title+'" title="'+valores.post_title+'" class="img-responsive tour-thumbnail">';
    }else{
        cards += '<img src="http://placehold.it/350x280?text=Tour" alt="'+valores.post_title+'" title="'+valores.post_title+'" class="img-responsive tour-thumbnail">';
    }
    cards += '</div>';
    cards += '</div>';
    cards += '<div class="col-sm-6 col-xs-6">';
    cards += '<h3 class="tour-name body-font">'+valores.post_title+'</h3>';
    cards += '<p class="tour-description">'+valores.post_excerpt+'</p>';
    cards += '<p class="tour-code">'+valores.dispo_code+'</p>';
    cards += '<span class="separator"></span>';
    cards += '<div class="tour-item-tools">';
    cards += '<div class="row">';
    cards += '<div class="col-sm-3">'+translations.adults+'</div>'; // fin del quotre link
    cards += '<div class="col-sm-3">';
    cards += '<input class="tour-people-counter tour-adults" data-tour="'+valores.dispo_code+'" onChange="recuperar_tarifa(this.dataset.tour)" onMouseup="recuperar_tarifa(this.dataset.tour)" type="number" min="1" max="9" value="1">';
    cards += '</div>'; // fin del quotre link
    cards += '<div class="col-sm-3">'+translations.children+'</div>'; // fin del quotre link
    cards += '<div class="col-sm-3">';
    cards += '<input class="tour-people-counter tour-children" data-tour="'+valores.dispo_code+'" onChange="recuperar_tarifa(this.dataset.tour)" onMouseup="recuperar_tarifa(this.dataset.tour)" type="number" min="0" max="9">';
    cards += '</div>'; // fin del quotre link
    cards += '</div>'; // fin del quotre link
    cards += '</div>'; // fin del quotre link
    cards += '<a href="#" class="tour-rates-link">'+translations.rates+' 2018 '+translations.per_person+'</a>';
    cards += '</div>'; // fin del col-xs-6
    cards += '<div class="col-sm-3 col-xs-6 text-right price-link">';
    cards += '<div class="featured-price">';
    cards += '<input type="hidden" name="tour-price" value="'+valores.precio+'">';
    precios = parseFloat(valores.precio);
    precios = String(valores.precio.toLocaleString('en',{minimumFractionDigits: 2, maximumFractionDigits: 2})).split('.');
    cards += '<span class="tour-price">$ '+precios[0]+'.<sup>'+precios[1]+'</sup></span>';
    cards += '<span class="total-estimated">'+translations.total_estimated+'</span>';
    cards += '</div>'; // fin del 2 columnas
    cards += '<div class="quote-link">';
    cards += '<a href="#">'+translations.request_quote+'</a>';
    cards += '</div>'; // fin del quotre link
    cards += '</div>'; // fin del 2 columnas
    cards += '</div>'; // fin del row
    cards += '</div>'; // fin del col-xs-12
    cards += '</div>'; // fin del row
    
    return cards;
}
function paint_ctegory_info(categoria){
    var html = '';
    html += '<div class="row">';
    html += '<div class="col-xs-12 text-center">';
    html += '<h2 id="cat'+categoria.term_id+'" class="category_title">'+categoria.name+'</h2>';
    html += '<span class="separator"></span>';
    html += '<p>'+categoria.description+'</p>';
    html += '</div>'; // fin div text-center
    html += '</div>';  // fin row
    return html;
}
function recuperar_tarifa(tour){
    var valor = '';
    var adults = $('#'+tour+' .tour-adults').val();
    var children = $('#'+tour+' .tour-children').val();
    var tarifa = $('#'+tour+' [name="tour-price"]').val();
    var precio = (adults + children) * tarifa;
    valor = String(precio.toLocaleString('en',{minimumFractionDigits: 2, maximumFractionDigits: 2})).split('.');
    console.log(valor);
    if(!valor[1]){
        valor[1] = '00';
    }
    $('#'+tour+' .tour-price').html('$ '+valor[0]+'.<sup>'+valor[1]+'</sup>');
}
