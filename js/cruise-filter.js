$('.inner-btn').click( function(){
    var hijo = $(this).find('input[type="checkbox"]');
    hijo.trigger('click');
    if(hijo.val() == 'package'){
        console.log('aqui');
        $('.trip-type-list').find('input[type="checkbox"]').parent('inner-btn').removeClass('active');
    }
    if (hijo.is(':checked')){
        $(this).addClass('active');
    }else{
        $(this).removeClass('active');
    }
})
$('.inner-btn-radio').click( function(){
    var hijo = $(this).find('input[type="radio"]');
    hijo.prop('checked',true);
    if (hijo.is(':checked')){
        $('.month-list').find('input[type="radio"]').parent('.inner-btn-radio').removeClass('active');
        $(this).addClass('active');
    }
})
$('.inner-btn-radio-ship').click( function(){
    var hijo = $(this).find('input[type="radio"]');
    hijo.prop('checked',true);
    if (hijo.is(':checked')){
        $('.ship-list').find('input[type="radio"]').parent('.inner-btn-radio-ship').removeClass('active');
        $(this).addClass('active');
    }
})