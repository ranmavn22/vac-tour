(function ($) {
    setTimeout(function () {
        if($('input.tourAttachment').val())
            $('input[name="attachments"]').val($('input.tourAttachment').val());
    },1000)
    $('.toggetInforTour h3').on('click', function (e) {
        let el = $(this).closest('.gdlr-core-pbf-element');
        if(el.hasClass('active')){
            el.removeClass('active');
        }else{
            el.addClass('active');
        }
    });
    
    $('.btnOpenContact a').on('click',function (e) {
        e.preventDefault();
        if($('.formModal').length != 0){
            $('.formModal').addClass('show');
        }
    });

    $('.formModal').on('click', function (e) {
        if($(e.target).closest('.diaLog').length == 0){
            $(this).removeClass('show');
        }
    })
    $('.fa-times').on('click',function (e) {
        $('.formModal').removeClass('show');
    })
}(jQuery));