(function($) {
    $(document).ready(function(){
        let currentPage = 1;
        $('#load-more').on('click', function() {
            currentPage++;
            $.ajax({ 
                type: 'POST',
                url: frontendajax.ajaxurl,
                dataType: 'html',
                data: {
                    action: 'load_more_pictures',
                    paged: currentPage,
                    },
                    success: function (res) {
                        $('#load-more').remove();
                        $('.grille-photo').append(res);
                        $('.link-lightbox').remove()
                        $('.link-lightbox2').css('display','block')
                        $.getScript('wp-content/themes/motaphoto/js/lightbox-new.js', function(){})
                        }
                      })

            });
            
        });

        let bannerContact = new Image()
        let formulaireContact = $('.wpcf7')
        bannerContact.src = frontendajax.imagebanner
        formulaireContact.prepend(bannerContact)
        $('.wpcf7 img').addClass('banner-contact')

        var count = 0;

        $('select').each(function(){
            var $this = $(this), 
                numberOfOptions = $(this).children('option').length,
                uniqueClass = 'select-' + count
                uniqueClassUl = 'select-ul-'+count
            count++;
        
            $this.addClass('select-hidden')
            $this.wrap('<div class="select"></div>');
            $this.after('<div class="select-styled ' + uniqueClass + '"></div>');
        
            var $styledSelect = $this.next('div.select-styled');
            $styledSelect.text($this.children('option').eq(0).text());
        
            var $list = $('<ul />', {
                'class': 'select-options list-up ' + uniqueClassUl 
            }).insertAfter($styledSelect);
        
            for (var i = 0; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
                if ($this.children('option').eq(i).is(':selected')){
                    $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected');
                }
            
            }
            var $listItems = $list.children('li');
            $listItems.click(function(e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
              $list.find('li.is-selected').removeClass('is-selected');
              $list.find('li[rel="' + $(this).attr('rel') + '"]').addClass('is-selected');
                $list.hide();
            });
          
        })
        


            $('.select-0').click(function(e) {
            e.stopPropagation();
            $('.select-ul-0 li:first-child').css({'visibility': 'hidden', 'pointer-events':'none','cursor': 'default'})
            $('.select-0').toggleClass('active')
            $('.select-ul-0').show()
            $('.select-ul-0').toggleClass('list-down')
            $('.select-ul-0').toggleClass('list-up')
        }); 
            $('.select-1').click(function(e) {
            e.stopPropagation();
            $('.select-ul-1 li:first-child').css({'visibility': 'hidden', 'pointer-events':'none','cursor': 'default'})
            $('.select-1').toggleClass('active')
            $('.select-ul-1').show()
            $('.select-ul-1').toggleClass('list-down')
            $('.select-ul-1').toggleClass('list-up')
        }); 
            $('.select-2').click(function(e) {
            e.stopPropagation();
            $('.select-ul-2 li:first-child').css({'visibility': 'hidden', 'pointer-events':'none','cursor': 'default'})
            $('.select-2').toggleClass('active')
            $('.select-ul-2').show()
            $('.select-ul-2').toggleClass('list-down')
            $('.select-ul-2').toggleClass('list-up')
        }); 

        $(document).click(function() {
            $('.select-styled').removeClass('active');
            $('.list-down').each(function() {
                $(this).removeClass('list-down');
                $(this).addClass('list-up')
            });
        });
    
    
    $('.select-ul-0 li').on('click', function() {
        let selectedCategory = $(this).text();
        $.ajax({
            url: frontendajax.ajaxurl,
            type: 'POST',
            data: {
                action: 'filter_photos',
                taxonomy: selectedCategory
            },
            success: function(response) {
                $('.grille-photo').html(response);
                $('.select-ul-0').toggleClass('list-down')
                $('.select-ul-0').toggleClass('list-up')
            }
        });
    });
    $('.select-ul-1 li').on('click', function() {
        let selectedFormat = $(this).text();
        $.ajax({
            url: frontendajax.ajaxurl,
            type: 'POST',
            data: {
                action: 'filter_photos_format',
                taxonomy2: selectedFormat
            },
            success: function(response) {
                $('.grille-photo').html(response);
                $('.select-ul-1').toggleClass('list-down')
                $('.select-ul-1').toggleClass('list-up')
            }
        });
    });


    $('.select-ul-2 li').on('click', function() {
        let optionSelected = $(this).attr('rel')
        console.log(optionSelected)
        if(optionSelected === 'anciennes'){
            $.ajax({
                url: frontendajax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'filter_photos_date_DESC',
                },
                success: function(response) {
                   $('.grille-photo').html(response);
                    $('.select-ul-2').toggleClass('list-down')
                    $('.select-ul-2').toggleClass('list-up')
                }
            })
        }
        else if(optionSelected === 'recentes'){
            $.ajax({
                url: frontendajax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'filter_photos_date_ASC',
                },
                success: function(response) {
                   $('.grille-photo').html(response);
                    $('.select-ul-2').toggleClass('list-down')
                    $('.select-ul-2').toggleClass('list-up')
                }
            })
        }
    });

   
})(jQuery)
