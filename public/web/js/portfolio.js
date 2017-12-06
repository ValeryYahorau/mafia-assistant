jQuery(function($) {

    /***********************************
     Global Variables
     ************************************/
    var $window = $(window);
    var $body = $('body');
    /***********************************
     Scrollers
     ************************************/
    function scrollTo(object, speed) {
        var $object;
        var scroll;
        if (typeof speed === "undefined" || speed === null) {
            speed = 1500;
        }

        if (typeof object === 'string') {
            $object = $(object);
            scroll = $object.offset().top - 70;
        } else if (object instanceof $) {
            $object = object;
            scroll = $object.offset().top - 70;
        } else if ($.isNumeric(object)) {
            scroll = object;
        } else {
            $object = $('body');
            scroll = $object.offset().top - 70;
        }

        scroll = (scroll >= 0) ? scroll : 0;
        $('body, html').animate({
            scrollTop: scroll
        }, speed);
    }

    $('a[data-scrollTo]').click(function(e) {
        var target = $(this).attr('data-scrollTo');
        scrollTo(target);
        e.preventDefault();
    });
    $('#backtotop').click(function() {
        scrollTo(0);
    });
    $('.next-section').click(function() {
        var $btn = $(this);
        var $parent = $btn.parents('section');
        var parentindex = $('section').index($parent);
        var $nextparent = $('section').eq(parentindex + 1);
        scrollTo($nextparent);
    });
    /***********************************
     Element Animation
     ************************************/
    if (jQuery.browser.mobile) {
        $('[data-animate]').css('visibility', 'visible')
    }

    function animate() {
        $('[data-animate]').each(function() {
            var $this = $(this);
            if ($this.isOnScreen()) {
                var animation = $this.attr('data-animate');
                var delay = $this.attr('data-animate-delay') ? $this.attr('data-animate-delay') : 0;
                setTimeout(function() {
                    $this.addClass('animated').addClass(animation);
                }, delay);
            }
        });
    }

    /***********************************
     Content Block Parallax
     ************************************/
    $('.parallax').each(function() {
        var $this = $(this);
        var parallax = $this.attr('data-parallax') ? $this.attr('data-parallax') : 0.3;
        $this.parallax("50%", parallax, true);
    });
    /***********************************
     Portfolio Lightbox
     ************************************/
    $('.portfolio').each(function() {
        $(this).magnificPopup({
            delegate: '.portfolio-project-lightbox',
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });
    $('.btn-lightbox').each(function() {
        $(this).magnificPopup({
            type: 'image',
            gallery: {
                enabled: false
            }
        });
    });
    /***********************************
     Fitvids
     ************************************/
    if ($('.fitvids').length > 0) {
        $('.fitvids').fitVids();
    }

    /***********************************
     Portfolio Isotope
     ************************************/
    $('.portfolio').each(function() {
        var $this = $(this);
        imagesLoaded($(this), function() {
            $this.isotope({
                itemSelector: '.portfolio-project',
                layoutMode: 'masonry',
                transitionDuration: '0.7s'
            });
        });
    });
    /***********************************
     Portfolio Isotope Filtering
     ************************************/
    $('.portfolio-filter').each(function() {
        var $this = $(this);
        var $listItem = $('li a', $this)
        var $target = $($this.attr('data-filter-target'));
        $listItem.click(function() {
            var $a = $(this);
            var filter = $a.attr('data-filter-value');
            if (!$a.hasClass('active')) {
                $listItem.removeClass('active');
                $a.addClass('active')
                $target.isotope({filter: filter});
            }
        });
    });
    /***********************************
     Ajax Project Loading
     ************************************/
    var projectOpen = false;
    var $projectLoadWrapper = $('#portfolio-project-load-wrapper');
    var $projectLoadContent = $('#portfolio-project-load-content');
    var $projectLoading = $('#portfolio-project-load-loading');
    var $scrollOnClose;
    $('.portfolio-project-link').each(function() {
        var href = $(this).attr('href');
        var targetPreview = href + " .load-wrapper";
        $.History.bind(href, function(state) {
            var currentPreview = $projectLoadWrapper.attr('data-project-link');
            if (currentPreview !== targetPreview) {
                projectOpen = true;
                $body.css({'overflow': 'hidden'});
                $projectLoading.show(0);
                $projectLoadWrapper.fadeIn(500);
                $projectLoadWrapper.attr('data-project-link', targetPreview);
                $projectLoadContent.empty();
                $projectLoadContent.load(targetPreview, function() {
                    setTimeout(function() {
                        $projectLoading.fadeOut(500);
                        var $carousel = $('.project-carousel', $projectLoadContent);
                        $carousel.each(function() {
                            var autoplay = true;
                            var $this = $(this);
                            if ($('.fitvids', $this).length > 0) {
                                autoplay = false;
                            }
                            $this.owlCarousel({
                                items: 1,
                                singleItem: true,
                                slideSpeed: 800,
                                autoPlay: autoplay,
                                pagination: true
                            });
                        });
                        if ($('.fitvids', $projectLoadContent).length > 0) {
                            $('.fitvids', $projectLoadContent).fitVids();
                        }
                        if (jQuery.browser.mobile) {
                            $('[data-animate]', $projectLoadContent).css('visibility', 'visible')
                        }
                        $window.trigger('scroll');
                    }, 2000)
                });
            } else {
                projectOpen = true;
                $projectLoadWrapper.fadeIn(500);
            }
        });
    });
    $('.portfolio-project-link').click(function(e) {
        var href = $(this).attr('href');
        $scrollOnClose = $(this).parents('section');
        $.History.go(href);
        e.preventDefault();
    });

    /***********************************
     Window Binding
     ************************************/
    var delay = (function() {
        var timer = 0;
        return function(callback, ms) {
            clearTimeout(timer);
            timer = setTimeout(callback, ms);
        };
    })();
    $window.scroll(function(e) {
        var scrolled = $window.scrollTop();
        if (!jQuery.browser.mobile) {
            animate();
        }

        if (scrolled > 0) {
            $('#navbar').removeClass('navbar-lg');
        } else {
            $('#navbar').addClass('navbar-lg');
        }

        if (scrolled > 100) {
            $('#backtotop').removeClass('opacity-hide');
        } else {
            $('#backtotop').addClass('opacity-hide');
        }
    }).trigger('scroll');
    $window.resize(function() {

    }).trigger('resize');

});