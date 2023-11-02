(function($) {
        function lightboxImage() {
        $('.link-lightbox').on('click', function() {
            let imageUrl = $(this).closest('.entry-content').find('.wp-block-image img').attr('src');
            $(this).closest('.entry-content').addClass('image-actuelle')
            let categories = $(this).siblings('.cat-overlay').text()
            let titre = $(this).siblings('.titre-overlay').text()
            $('.custom-lightbox').show()
            $('.image-info-lightbox').append('<img src="' + imageUrl + '" class="lb-image"><div class="info-lightbox"><p class="titre-lightbox">'+titre+'</p><p class="cat-lightbox">'+categories+'</p></div>');
            $('.bouton-next').show()
            $('.bouton-prev').show()
            let nextImage = $('.image-actuelle').next('.entry-content')
            if (nextImage.length === 0) {
                $('.bouton-next').hide()
            }
            let prevImage = $('.image-actuelle').prev('.entry-content')
            if (prevImage.length === 0) {
                $('.bouton-prev').hide()
            }
        });
        $('.close-lightbox').on('click', function() {
            $('.custom-lightbox').hide();
            $('.image-actuelle').removeClass('image-actuelle')
            $('.custom-lightbox img').remove()
            $('.titre-lightbox').remove()
            $('.cat-lightbox').remove()

        });
    
        $('.bouton-next').on('click', function(){
    let nextImage = $('.image-actuelle').next('.entry-content')
    let nextImageUrl = nextImage.find('.wp-block-image img').attr('src');            
    $('.lb-image').attr('src',nextImageUrl)
    $(nextImage).siblings('.image-actuelle').removeClass('image-actuelle')
    let titre = nextImage.find('.titre-overlay').text()
    console.log(titre)
    $(this).siblings('.image-info-lightbox').find('.info-lightbox .titre-lightbox').text(titre)
    let categories = nextImage.find('.cat-overlay').text()
    $(this).siblings('.image-info-lightbox').find('.info-lightbox .cat-lightbox').text(categories)
    $(nextImage).addClass('image-actuelle')
    $('.bouton-prev').show()
    let lastImage = $('.image-actuelle').next('.entry-content')
    if (lastImage.length === 0) {
        $(this).hide()
    }
    })

    $('.bouton-prev').on('click', function(){
        let prevImage = $('.image-actuelle').prev('.entry-content');
        let prevImageUrl = prevImage.find('.wp-block-image img').attr('src');            
        $('.lb-image').attr('src', prevImageUrl);
        $(prevImage).siblings('.image-actuelle').removeClass('image-actuelle');
        let titre = prevImage.find('.titre-overlay').text();
        $(this).siblings('.image-info-lightbox').find('.info-lightbox .titre-lightbox').text(titre)
        let categories = prevImage.find('.cat-overlay').text()
        $(this).siblings('.image-info-lightbox').find('.info-lightbox .cat-lightbox').text(categories)
        $(prevImage).addClass('image-actuelle');
        $('.bouton-next').show();
        let firstImage = prevImage.prev('.entry-content')
        if (firstImage.length === 0) {
            $(this).hide();
        }

    });
}
lightboxImage()

$('.link-lightbox-single').on('click', function() {
    let imageUrl = $('.wp-block-image img').attr('src');
    $('.custom-lightbox').show()
    $('.image-info-lightbox').append('<img src="' + imageUrl + '" class="lb-image">');
    $('.bouton-prev').hide()
    $('.bouton-next').hide()
    })
})( jQuery);