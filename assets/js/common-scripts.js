
(function($){
	$(function(){



        // Phone nav click function
        $('.hamburger-wrap').click(function () {
            $("body").toggleClass("navShown");
        });
        $('.navbar-wrap').click(function () {
            $("body").removeClass("navShown");
        });
        $('.navbar').click(function (e) {
            e.stopPropagation();
        });

        $('.popup-video').magnificPopup({
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false,
            iframe: {
                markup: '<div class="mfp-iframe-scaler">'+
                        '<div class="mfp-close"></div>'+
                        '<iframe class="mfp-iframe" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>'+
                    '</div>',
                patterns: {
                    youtube: {
                        index: 'youtube.com/',
                        id: 'v=',
                        // We keep it simple here, the PHP already built the URL
                        src: '%id%' 
                    }
                }
            },
            callbacks: {
                markupParse: function(template, values, item) {
                    // This ensures the URL in the <a> tag is passed exactly as-is to the iframe
                    values.src = item.el.attr('href');
                }
            }
        });




        if ($('.testimonial-component-wrap').length) {
            $('.testimonial-component-wrap').slick({
                autoplay: false,
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: true,
                dots:false,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 557,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            })
        
            $(window).on('resize', function () {
                $('.testimonial-component-wrap').slick('resize');
            });
        }

        var $window = $(window);

        if ($window.width() < 769) {
            $('.find-us-item-wrap').marquee({
                direction: 'left',
                speed: 60,
                gap: 50,
                delayBeforeStart: 0,
                duplicated: true,
                startVisible: true
            });
        }


        // Start Pricing JS
        $('.satisfied-clients-item-wrap').marquee({
            direction: 'left',
            speed: 60,
            gap: 50,
            delayBeforeStart: 0,
            duplicated: true,
            startVisible: true
        });

        $('.pricing-about-component-first').marquee({
            direction: 'left',
            speed: 60,
            gap: 50,
            delayBeforeStart: 0,
            duplicated: true,
            startVisible: true
        });
        $('.pricing-about-component-second').marquee({
            direction: 'right',
            speed: 60,
            gap: 50,
            delayBeforeStart: 0,
            duplicated: true,
            startVisible: true
        });
        $('.pricing-about-component-third').marquee({
            direction: 'left',
            speed: 70,
            gap: 50,
            delayBeforeStart: 0,
            duplicated: true,
            startVisible: true
        });


        $(".faq-accordion-item").each(function () {
            var $this = $(this);
            $this.find(".faq-accordion-item-title").on("click touch", function () {
                $(".faq-accordion-item").removeClass("active")
                $(".faq-accordion-item-content").slideUp();
                if ($this.find(".faq-accordion-item-content:visible").length) {
                    $(".faq-accordion-item").removeClass("active")
                    $(".faq-accordion-item-content").slideUp();
                } else {
                    $this.addClass("active")
                    $(".faq-accordion-item-content").slideUp();
                    $this.find(".faq-accordion-item-content").slideDown();
                }
            })
        });

        $('.contact-tab-trigger ul li').click(function(){
            $('.contact-tab-trigger ul li').removeClass('active');
            $(this).addClass('active');
            $('.contact-tab-item-wrap .contact-tab-item').hide();

            var activeTab = $(this).find('a').attr('href');
            $(activeTab).fadeIn();
            return false;
        });

        // End Pricing JS

        
        
        $('.counter em').each(function () {
            var size = $(this).text().split(".")[1] ? $(this).text().split(".")[1].length : 0;
            $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
            }, {
            duration: 5000,
            step: function (func) {
                $(this).text(parseFloat(func).toFixed(size));
            }
            });
        });

        $(function () {
            $(".team-component").slice(0, 6).show();
            $(".team-btn a").on('click touchstart', function (e) {
                e.preventDefault();
                $(".team-component:hidden").slice(0, 3).slideDown();
                if ($(".team-component:hidden").length == 0) {
                    $(".team-btn").fadeOut();
                }
                // $('html,body').animate({
                //     scrollTop: $(this).offset().top
                // }, 1000);
            });
        });
        
        
    




                gsap.registerPlugin(ScrollTrigger);

                if ($(window).width() > 380 && $(window).height() > 700) {
                    var lenis = new Lenis({
                        duration: 1.5,
                        easing: (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t)),
                        orientation: "vertical",
                        smoothWheel: true,
                        smoothTouch: true,
                        touchMultiplier: 1.5,
                    })

                    function raf(time) {
                        lenis.raf(time / 1.5)
                        requestAnimationFrame(raf)
                    }
                    requestAnimationFrame(raf)
                }

        
        if ($('.split-heading').length) {

            let splitWords = function (selector) {
                var elements = document.querySelectorAll(selector);

                elements.forEach(function (el) {
                    el.dataset.splitText = el.textContent;
                    el.innerHTML = el.textContent
                        .split(/\s/)
                        .map(function (word) {
                            return word
                                .split("-")
                                .map(function (word) {
                                    return '<dfn class="word">' + word + "</dfn>";
                                })
                                .join('<dfn class="hyphen">-</dfn>');
                        })
                        .join('<dfn class="whitespace"> </dfn>');
                });
            };

            let splitLines = function (selector) {
                var elements = document.querySelectorAll(selector);

                splitWords(selector);

                elements.forEach(function (el) {
                    var lines = getLines(el);

                    var wrappedLines = "";
                    lines.forEach(function (wordsArr) {
                        wrappedLines += '<dfn class="line"><dfn class="words">';
                        wordsArr.forEach(function (word) {
                            wrappedLines += word.outerHTML;
                        });
                        wrappedLines += "</dfn></dfn>";
                    });
                    el.innerHTML = wrappedLines;
                });
            };

            let getLines = function (el) {
                var lines = [];
                var line;
                var words = el.querySelectorAll("dfn");
                var lastTop;
                for (var i = 0; i < words.length; i++) {
                    var word = words[i];
                    if (word.offsetTop != lastTop) {
                        // Don't start with whitespace
                        if (!word.classList.contains("whitespace")) {
                            lastTop = word.offsetTop;

                            line = [];
                            lines.push(line);
                        }
                    }
                    line.push(word);
                }
                return lines;
            };

            splitLines(".split-heading");



            let revealText = document.querySelectorAll(".split-heading");

            $('.split-heading').each(function () {
                var $this = $(this);
                $this.find('.words').each(function (i) {
                    $(this).css('transition', '1.2s cubic-bezier(0.19,1,0.22,1) transform')
                    $(this).css('transition-delay', 0 + i * 0.2 + 's')
                })
            });

            var $animation_elements1 = $('.split-heading');

            function check_if_in_view1() {
                var window_height1 = $window.height() / 1.15;
                var insetAmount1 = window_height1 / 10 // fifth of the screen
                var window_top_position1 = $window.scrollTop();
                var window_bottom_position1 = (window_top_position1 + window_height1) - insetAmount1;

                $.each($animation_elements1, function () {
                    var $element1 = $(this);
                    var element_height1 = $element1.outerHeight();
                    var element_top_position1 = $element1.offset().top;
                    var element_bottom_position1 = (element_top_position1 + element_height1);

                    //check to see if this current container is within viewport
                    if (element_top_position1 <= window_bottom_position1) {
                        $element1.addClass('is-visible');

                    }
                });
            }
            $window.on('scroll orientationchange resize', check_if_in_view1);
            $window.trigger('scroll');

        }
        
        
        
		
	})// End ready function.
   

    var $animation_elements = $('.animate-from-bottom');
    var $window = $(window);

    function check_if_in_view() {
        var window_height = $window.height();
        var window_top_position = $window.scrollTop();
        var window_bottom_position = (window_top_position + window_height);
        $.each($animation_elements, function () {
            var $element = $(this);
            var element_height = $element.outerHeight();
            var element_top_position = $element.offset().top;
            var element_bottom_position = (element_top_position + element_height);
            if (element_top_position <= window_bottom_position) {
                $element.addClass('in-view');
            } else {}
        });
    }
    $window.on('scroll resize',check_if_in_view);$window.trigger('scroll');
	

})(jQuery)

