(function($) {
    $('.link-lightbox2').on('click', function() {
        let imageUrl = $(this).closest('.entry-content').find('.wp-block-image img').attr('src');
        $(this).closest('.entry-content').addClass('image-actuelle')
        let categories = $(this).siblings('.cat-overlay').text()
        let titre = $(this).siblings('.titre-overlay').text()
        $('.custom-lightbox').show()
        $('.image-info-lightbox').append('<img src="' + imageUrl + '" class="lb-image"><div class="info-lightbox"><p class="titre-lightbox">'+titre+'</p><p class="cat-lightbox">'+categories+'</p></div>');
    });
    $('.close-lightbox').on('click', function() {
        $('.custom-lightbox').hide();
        $('.image-actuelle').removeClass('image-actuelle')
        $('.custom-lightbox img').remove()
        $('.titre-lightbox').remove()
        $('.cat-lightbox').remove()

    });

})( jQuery)