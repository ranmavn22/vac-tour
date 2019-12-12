(function ($) {
    //$('input[name="tesst2"]').val($('.attachmentUrl').html());
    $('.toggetInforTour h3').on('click', function (e) {
        let el = $(this).closest('.gdlr-core-pbf-element');
        if(el.hasClass('active')){
            el.removeClass('active');
        }else{
            el.addClass('active');
        }

    })
}(jQuery));