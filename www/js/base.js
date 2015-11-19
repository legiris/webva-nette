$('#service-info').click(function(){
    $('#service-hidden').toggle();
    $('#service-hidden').removeClass('hidden');
});



$('#box-01-info').click(function(){
    if ($('.box-01').is(':visible')) {
        $('.box-01').hide();
        $('#circle-01').hide();
        $('#panel-01').removeClass('panel-bg');
        $('#panel-01').addClass('box-bg');
    } else {
        $('.box-01').show();
        $('.box-02').hide();
        $('.box-03').hide();
        $('#panel-01').addClass('panel-bg');
        $('#panel-02').removeClass('panel-bg');
        $('#panel-03').removeClass('panel-bg');
        $('#circle-01').show();
        $('#circle-02').hide();
        $('#circle-03').hide();
    }
});

$('#box-02-info').click(function(){
    if ($('.box-02').is(':visible')) {
        $('.box-02').hide();
        $('#panel-02').removeClass('panel-bg');
        $('#panel-02').addClass('box-bg');
        $('#circle-02').hide();
    } else {
        $('.box-02').show();
        $('.box-01').hide();
        $('.box-03').hide();
        $('#panel-02').addClass('panel-bg');
        $('#panel-01').removeClass('panel-bg');
        $('#panel-03').removeClass('panel-bg');
        $('#circle-02').show();
        $('#circle-01').hide();
        $('#circle-03').hide();
    }
});

$('#box-03-info').click(function(){
    if ($('.box-03').is(':visible')) {
        $('.box-03').hide();
        $('#panel-03').removeClass('panel-bg');
        $('#panel-03').addClass('box-bg');
        $('#circle-03').hide();
    } else {
        $('.box-03').show();
        $('.box-01').hide();
        $('.box-02').hide();
        $('#panel-03').addClass('panel-bg');
        $('#panel-01').removeClass('panel-bg');
        $('#panel-02').removeClass('panel-bg');
        $('#circle-03').show();
        $('#circle-01').hide();
        $('#circle-02').hide();
    }
});
