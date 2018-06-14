var info, lastinfo, elementoModal;
var innerscrollbar;
var wikimenu_abierto = false;
var fullPageArea = $('#gogafullpage'); 
var styles=[{"elementType": "geometry", "stylers": [{"color": "#1d2c4d"}]},{"elementType": "labels.text.fill", "stylers": [{"color": "#8ec3b9"}]},{"elementType": "labels.text.stroke", "stylers": [{"color": "#1a3646"}]},{"featureType": "administrative.country", "elementType": "geometry.stroke", "stylers": [{"color": "#4b6878"}]},{"featureType": "administrative.land_parcel", "elementType": "labels.text.fill", "stylers": [{"color": "#64779e"}]},{"featureType": "administrative.province", "elementType": "geometry.stroke", "stylers": [{"color": "#4b6878"}]},{"featureType": "landscape.man_made", "elementType": "geometry.stroke", "stylers": [{"color": "#334e87"}]},{"featureType": "landscape.natural", "elementType": "geometry", "stylers": [{"color": "#023e58"}]},{"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#283d6a"}]},{"featureType": "poi", "elementType": "labels.text.fill", "stylers": [{"color": "#6f9ba5"}]},{"featureType": "poi", "elementType": "labels.text.stroke", "stylers": [{"color": "#1d2c4d"}]},{"featureType": "poi.park", "elementType": "geometry.fill", "stylers": [{"color": "#023e58"}]},{"featureType": "poi.park", "elementType": "labels.text.fill", "stylers": [{"color": "#3C7680"}]},{"featureType": "road", "elementType": "geometry", "stylers": [{"color": "#304a7d"}]},{"featureType": "road", "elementType": "labels.text.fill", "stylers": [{"color": "#98a5be"}]},{"featureType": "road", "elementType": "labels.text.stroke", "stylers": [{"color": "#1d2c4d"}]},{"featureType": "road.highway", "elementType": "geometry", "stylers": [{"color": "#2c6675"}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#255763"}]},{"featureType": "road.highway", "elementType": "labels.text.fill", "stylers": [{"color": "#b0d5ce"}]},{"featureType": "road.highway", "elementType": "labels.text.stroke", "stylers": [{"color": "#023e58"}]},{"featureType": "transit", "elementType": "labels.text.fill", "stylers": [{"color": "#98a5be"}]},{"featureType": "transit", "elementType": "labels.text.stroke", "stylers": [{"color": "#1d2c4d"}]},{"featureType": "transit.line", "elementType": "geometry.fill", "stylers": [{"color": "#283d6a"}]},{"featureType": "transit.station", "elementType": "geometry", "stylers": [{"color": "#3a4762"}]},{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#0e1626"}]},{"featureType": "water", "elementType": "labels.text.fill", "stylers": [{"color": "#4e6d70"}]}]
var icon = goga_url.themeurl + '/images/marcador-map.png';

$(window).bind("load", function() {
    $('body').css('overflow', 'inherit');
    $('#loader').remove();
});


$(document).ready( function (){
    var timer;
    // ALTO DEL VIEWPORT
    //console.log($(window).height());
    // ANCHO DEL VIEWPORT
    //console.log($(window).width());
    // INICIALIZAR LIBRERIA FULLPAGE
    $('#desktop-side-alter-menu').niceScroll({
        background: "#121212",
        cursorborder: "0px",
        cursorwidth: "8px",
        autohidemode: false,
        smoothscroll: true,
    })

    // FIXES DE BUSCADOR
    $('#search-form input').val('');
    $('#search-form input').focusin( function(){            
        $('#search-form label').toggleClass('infocus')
    });
    $('#search-form input').focusout( function(){            
        $('#search-form label').toggleClass('infocus')
    });

    // FIXES DE FILTRO "COTIZADOR"
    $('.filter-transparent-box ul li select[name="trip"]').focusin( function(){
        $('.filter-transparent-box ul li label[for="trip"]').addClass('infocus');
    });
    $('.filter-transparent-box ul li select[name="departures"]').focusin( function(){
        $('.filter-transparent-box ul li label[for="departures"]').addClass('infocus');
    });
    $('.filter-transparent-box ul li select[name="trip"]').focusout( function(){
        if ( $(this).val().length == 0){
            $('.filter-transparent-box ul li label[for="trip"]').removeClass('infocus');
        }
    });
    $('.filter-transparent-box ul li select[name="departures"]').focusout( function(){
        if ( $(this).val().length == 0){
            $('.filter-transparent-box ul li label[for="departures"]').removeClass('infocus');
        }
    });
    // ABRIR NAVEGACION INTERNA BARCOS
    $('#phone-navbar-active-link').click( function(){
        var barra = $('.ship-phone-navbar');
        if(barra.hasClass('open')){
            barra.removeClass('open');
            return;
        }
        $('.ship-phone-navbar').addClass('open');
    });
    $('.regular-link').click( function(){
        var clickDeseado = $(this).children('span').text();
        $('#phone-navbar-active-link').children('span').text(clickDeseado);
        $('.ship-phone-navbar').removeClass('open');
    });
});

$('.regular-link').click(function(){
        $('.navTrigger, .navTrigger-ship').removeClass('active');
        $('#alter-nav').removeClass('active');
})

// REMOVER LA FUNCIONALIDAD DE SCROLL SI ESTA ENCIMA DEL ITINERARIO LARGO
$('.day-placeholder').mouseenter(function(){
    console.log('dentro');
    fullPageArea.fullpage.setAllowScrolling(false);
    fullPageArea.fullpage.setKeyboardScrolling(false);
});
$('.day-placeholder').mouseover(function(){
    console.log('dentro');
    fullPageArea.fullpage.setAllowScrolling(false);
    fullPageArea.fullpage.setKeyboardScrolling(false);
});
$('.day-placeholder').mouseout(function(){
    console.log('fuera');
    fullPageArea.fullpage.setAllowScrolling(true);
    fullPageArea.fullpage.setKeyboardScrolling(true);
});

// REMOVER LA FUNCIONALIDAD DE SCROLL SI ESTA ENCIMA DEL ITINERARIO LARGO
$('.itineraries-day-by-day-list').mouseenter(function(){
    console.log('dentro');
    fullPageArea.fullpage.setAllowScrolling(false);
    fullPageArea.fullpage.setKeyboardScrolling(false);
});
$('.itineraries-day-by-day-list').mouseover(function(){
    console.log('dentro');
    fullPageArea.fullpage.setAllowScrolling(false);
    fullPageArea.fullpage.setKeyboardScrolling(false);
});
$('.itineraries-day-by-day-list').mouseout(function(){
    console.log('fuera');
    fullPageArea.fullpage.setAllowScrolling(true);
    fullPageArea.fullpage.setKeyboardScrolling(true);
});


// ACTIVAR Y DESACTIVA LA NAVEGACION ALTERNATIVA (LATERAL)
$('.navTrigger, .navTrigger-ship').click(function(){
    $(this).toggleClass('active');
    $('#alter-nav').toggleClass('active');
    if( $('.navTrigger, .navTrigger-ship').hasClass('active') ){
        $(this).css('z-index',9999);
        $('.menu-word').html('Esc');
        $('.menu-word').prop('title','Press Esc to exit menu');
        fullPageArea.fullpage.setAllowScrolling(false);
        fullPageArea.fullpage.setKeyboardScrolling(false);
    }else{
        $(this).css('z-index',999);
        $('.menu-word').prop('title','Go Galapagos alternate menu');
        $('.menu-word').html('Menu');
        fullPageArea.fullpage.setAllowScrolling(true);
        fullPageArea.fullpage.setKeyboardScrolling(true);
        lastinfo = '';
    }
});
// ACTIVAR Y DESACTIVAR LA FUNCIONALIDAD DE BUSCADOR
$('.search-icon').click(function(){
    console.log('buscar');
    $(this).toggleClass('active');
    if( $(this).hasClass('active') ){
        $('.search-icon').css('z-index',10000);
        $('.search-box').addClass('active');
        fullPageArea.fullpage.setAllowScrolling(false);
        fullPageArea.fullpage.setKeyboardScrolling(false);
    }else{
        $('.search-box').removeClass('active');
        fullPageArea.fullpage.setAllowScrolling(true);
        fullPageArea.fullpage.setKeyboardScrolling(true);
        setTimeout( function(){
            $('.search-icon').css('z-index',999);
        },400);
    }
});
// Cambiar logo barra superior
$(window).scroll(function() {
    //console.log( $(this).scrollTop(),  $(window).height() - 1 );
    if ($(this).scrollTop() >= $(this).height() ){
        $('#header-logo').attr('src', goga_url.themeurl + '/images/go-logo.png');
    }else if( $(this).scrollTop() < $(this).height() ){
        $('#header-logo').attr('src', goga_url.themeurl + '/images/go-galapagos-logo.png');
    };
})
// FIXES PARA VALIDAR Y HA USADO LA TECLA "ESC"
$(document).keyup(function(e) {
    if (e.keyCode == 27) { // escape key maps to keycode `27`

        fullPageArea.fullpage.setAllowScrolling(true);
        fullPageArea.fullpage.setKeyboardScrolling(true);

        if( $('.navTrigger').hasClass('active') ){
            $('#alter-nav').removeClass('active');
            $('.navTrigger').toggleClass('active');
            $('.menu-word').html('Menu');
            $('.menu-word').prop('title','Go Galapagos alternate menu');
        }
        if( $('#search-icon').hasClass('active') ){
            $('#search-box').removeClass('active');
            $('#search-icon').removeClass('active');
            setTimeout( function(){
                $('#search-icon').css('z-index',999);
            },400);
        }
    }
});
/* FUNCIONALIDAD PARA MOSTRAR CONTENIDO ADICIONAL EN
* ANIMALES, SITIOS DE VISITA, ISLAS, ACTIVIDADES 
*/
$('#more-to-show, #close-more-information-frame').click( function(){
    $('#more-information-frame').toggleClass('active');
})
$('.get-in-love-control-circle').click( function(){
    //console.log($(this).data("goto-slide"));
    $.fn.fullpage.moveTo(2, $(this).data("goto-slide"));
    $('.get-in-love-control-circle').parent('li').removeClass('active');
    $(this).parent('li').addClass('active');
})
$('.rear-slider-controllers').mouseover( function(){
    $('.hero-mask').css('opacity','0');
    $('.single-hero-content').css('transform','translateX(-100%)');
})
$('.rear-slider-controllers').mouseout( function(){
    $('.hero-mask').css('opacity','1');
    $('.single-hero-content').css('transform','translateX(0)');
});

$('.btn-cabin-modal').click( function(){
    elementoModal = $(this).data('element');
    $('#'+elementoModal).toggleClass('hidden');
});
$('.close-cabin-placeholder').click( function(){
    $(this).parent('#'+elementoModal).toggleClass('hidden');
})

/*--- try ---*/

$(window).mousemove(function(e){
    if($('#headerelements').hasClass('moveUp')){
        if (e.pageY < 60){
            $('#headerelements').removeClass('moveUp');
            $('.navTrigger').removeClass('hidden');
            $('.search-icon').removeClass('hidden');
        }
    }

});
/*
$('#land-tours-fold').mousemove(function(e){
    var amountMovedX = (e.pageX * -1 / 200);
    var amountMovedY = (e.pageY * -1 / 120);
    $(this).css('background-position', amountMovedX + 'px ' + '50%');
});
*/
$(document).on('click', '.prevSlide', function(){
    $.fn.fullpage.moveSlideLeft();
    $('.cabin-floor-location-placeholder').addClass('hidden');
});
$(document).on('click', '.nextSlide', function(){
    $('.cabin-floor-location-placeholder').addClass('hidden');
    $.fn.fullpage.moveSlideRight();
});

/* COLLAPSE PANELLS */
(function() {

    $(".panel").on("show.bs.collapse hide.bs.collapse", function(e) {
        if (e.type=='show'){
            $(this).addClass('active');
            $(this).children('a').children('.panel-heading').children('.see-more-faqs-icon').removeClass('fa-plus');
            $(this).children('a').children('.panel-heading').children('.see-more-faqs-icon').addClass('fa-minus');
        }else{
            $(this).removeClass('active');
            $(this).children('a').children('.panel-heading').children('.see-more-faqs-icon').removeClass('fa-minus');
            $(this).children('a').children('.panel-heading').children('.see-more-faqs-icon').addClass('fa-plus');
        }
    });  

}).call(this);


var util = {
    f: {
        addStyle: function (elem, prop, val, vendors) {
            var i, ii, property, value
            if (!util.f.isElem(elem)) {
                elem = document.getElementById(elem)
            }
            if (!util.f.isArray(prop)) {
                prop = [prop]
                val = [val]
            }
            for (i = 0; i < prop.length; i += 1) {
                var thisProp = String(prop[i]),
                    thisVal = String(val[i])
                if (typeof vendors !== "undefined") {
                    if (!util.f.isArray(vendors)) {
                        vendors.toLowerCase() == "all" ? vendors = ["webkit", "moz", "ms", "o"] : vendors = [vendors]
                    }
                    for (ii = 0; ii < vendors.length; ii += 1) {
                        elem.style[vendors[i] + thisProp] = thisVal
                    }
                }
                thisProp = thisProp.charAt(0).toLowerCase() + thisProp.slice(1)
                elem.style[thisProp] = thisVal
            }
        },
        cssLoaded: function (event) {
            var child = util.f.getTrg(event)
            child.setAttribute("media", "all")
        },
        events: {
            cancel: function (event) {
                util.f.events.prevent(event)
                util.f.events.stop(event)
            },
            prevent: function (event) {
                event = event || window.event
                event.preventDefault()
            },
            stop: function (event) {
                event = event || window.event
                event.stopPropagation()
            }
        },
        getPath: function (cb, args) {
            GLOBAL.path = window.location.href.split("masterdemolition")[1].replace("inc.com/admin/", "").replace("inc.com/admin", "").replace("#!/", "").replace("#!", "").replace("#/", "").replace("#", "")
            if (GLOBAL.path.indexOf("?") >= 0) {
                GLOBAL.path = GLOBAL.path.split("?")[0]
            }
            if (typeof cb !== "undefined") {
                typeof args !== "undefined" ? cb(args) : cb()
            } else {
                return GLOBAL.path
            }
        },
        getSize: function (elem, prop) {
            return parseInt(elem.getBoundingClientRect()[prop], 10)
        },
        getTrg: function (event) {
            event = event || window.event
            if (event.srcElement) {
                return event.srcElement
            } else {
                return event.target
            }
        },
        isElem: function (elem) {
            return (util.f.isNode(elem) && elem.nodeType == 1)
        },
        isArray: function(v) {
            return (v.constructor === Array)
        },
        isNode: function(elem) {
            return (typeof Node === "object" ? elem instanceof Node : elem && typeof elem === "object" && typeof elem.nodeType === "number" && typeof elem.nodeName==="string" && elem.nodeType !== 3)
        },
        isObj: function (v) {
            return (typeof v == "object")
        },
        replaceAt: function(str, index, char) {
            return str.substr(0, index) + char + str.substr(index + char.length);
        }
    }
},
    //////////////////////////////////////
    // ok that's all the utilities      //
    // onto the select box / form stuff //
    //////////////////////////////////////
    form = {
        f: {
            init: {
                register: function () {

                    var child, children = document.getElementsByClassName("field"), i
                    for (i = 0; i < children.length; i += 1) {
                        child = children[i]
                        util.f.addStyle(child, "Opacity", 1)
                    }
                    children = document.getElementsByClassName("psuedo_select")
                    for (i = 0; i < children.length; i += 1) {
                        child = children[i]
                        child.addEventListener("click", form.f.select.toggle)
                    }
                },
                unregister: function () {
                    //just here as a formallity
                    //call this to stop all ongoing timeouts are ready the page for some sort of json re-route
                }
            },
            select: {
                blur: function (field) {
                    field.classList.remove("focused")
                    var child, children = field.childNodes, i, ii, nested_child, nested_children
                    for (i = 0; i < children.length; i += 1) {
                        child = children[i]
                        if (util.f.isElem(child)) {
                            if (child.classList.contains("deselect")) {
                                child.parentNode.removeChild(child)
                            } else if (child.tagName == "SPAN") {
                                if (!field.dataset.value) {
                                    util.f.addStyle(child, ["FontSize", "Top"], ["16px", "32px"])
                                }
                            } else if (child.classList.contains("psuedo_select")) {
                                nested_children = child.childNodes
                                for (ii = 0; ii < nested_children.length; ii += 1) {
                                    nested_child = nested_children[ii]
                                    if (util.f.isElem(nested_child)) {
                                        if (nested_child.tagName == "SPAN") {
                                            if (!field.dataset.value) {
                                                util.f.addStyle(nested_child, ["Opacity", "Transform"], [0, "translateY(24px)"])
                                            }
                                        } else if (nested_child.tagName == "UL") {
                                            util.f.addStyle(nested_child, ["Height", "Opacity"], [0, 0])
                                        }
                                    }
                                }
                            }
                        }
                    }
                },
                focus: function (field) {
                    field.classList.add("focused")
                    var bool = false, child, children = field.childNodes, i, ii, iii, nested_child, nested_children, nested_nested_child, nested_nested_children, size = 0
                    for (i = 0; i < children.length; i += 1) {
                        child = children[i]
                        util.f.isElem(child) && child.classList.contains("deselect") ? bool = true : null
                    }
                    if (!bool) {
                        child = document.createElement("div")
                        child.className = "deselect"
                        child.addEventListener("click", form.f.select.toggle)
                        field.insertBefore(child, children[0])
                    }
                    for (i = 0; i < children.length; i += 1) {
                        child = children[i]
                        if (util.f.isElem(child) && child.classList.contains("psuedo_select")) {
                            nested_children = child.childNodes
                            for (ii = 0; ii < nested_children.length; ii += 1) {
                                nested_child = nested_children[ii]
                                if (util.f.isElem(nested_child) && nested_child.tagName == "UL") {
                                    size = 0
                                    nested_nested_children = nested_child.childNodes
                                    for (iii = 0; iii < nested_nested_children.length; iii += 1) {
                                        nested_nested_child = nested_nested_children[iii]
                                        if (util.f.isElem(nested_nested_child) && nested_nested_child.tagName == "LI") {
                                            size += util.f.getSize(nested_nested_child, "height")
                                            console.log("size: " + size)
                                        }
                                    }
                                    util.f.addStyle(nested_child, ["Height", "Opacity"], [size + "px", 1])
                                }
                            }
                        }
                    }
                },
                selection: function (child, parent) {
                    var children = parent.childNodes, i, ii, nested_child, nested_children, time = 0, value
                    if (util.f.isElem(child) && util.f.isElem(parent)) {
                        parent.dataset.value = child.dataset.value
                        value = child.innerHTML
                    }
                    for (i = 0; i < children.length; i += 1) {
                        child = children[i]
                        if (util.f.isElem(child)) {
                            if (child.classList.contains("psuedo_select")) {
                                nested_children = child.childNodes
                                for (ii = 0; ii < nested_children.length; ii += 1) {
                                    nested_child = nested_children[ii]
                                    if (util.f.isElem(nested_child) && nested_child.classList.contains("selected")) {
                                        if (nested_child.innerHTML)  {
                                            time = 1E2
                                            util.f.addStyle(nested_child, ["Opacity", "Transform"], [0, "translateY(24px)"], "all")
                                        }
                                        setTimeout(function (c, v) {
                                            c.innerHTML = v
                                            util.f.addStyle(c, ["Opacity", "Transform", "TransitionDuration"], [1, "translateY(0px)", ".1s"], "all")
                                        }, time, nested_child, value)
                                    }
                                }
                            } else if (child.tagName == "SPAN") {
                                util.f.addStyle(child, ["FontSize", "Top"], ["12px", "8px"])
                            }
                        }
                    }
                },
                toggle: function (event) {
                    util.f.events.stop(event)
                    var child = util.f.getTrg(event), children, i, parent
                    switch (true) {
                        case (child.classList.contains("psuedo_select")):
                        case (child.classList.contains("deselect")):
                            parent = child.parentNode
                            break
                            case (child.classList.contains("options")):
                            parent = child.parentNode.parentNode
                            break
                            case (child.classList.contains("option")):
                            parent = child.parentNode.parentNode.parentNode
                            form.f.select.selection(child, parent)
                            break
                    }
                    parent.classList.contains("focused") ? form.f.select.blur(parent) : form.f.select.focus(parent)
                }
            }
        }}
window.onload = form.f.init.register