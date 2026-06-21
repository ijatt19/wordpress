jQuery(document).ready(function($) {
    // Get AJAX URL dynamically
    var ajaxurl = '/wordpress/wp-admin/admin-ajax.php';
    if (typeof wc_checkout_params !== 'undefined' && wc_checkout_params.ajax_url) {
        ajaxurl = wc_checkout_params.ajax_url;
    } else if (typeof wc_cart_params !== 'undefined' && wc_cart_params.ajax_url) {
        ajaxurl = wc_cart_params.ajax_url;
    }

    // Handle Gift Wrap checkbox change
    $(document).on('change', '#pscf_enable_gift_wrap', function() {
        var isChecked = $(this).is(':checked');
        if (isChecked) {
            $('.pscf-gift-note-container').slideDown(300);
        } else {
            $('.pscf-gift-note-container').slideUp(300);
            $('#pscf_gift_note').val('');
        }
        
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'pscf_update_gift_wrap_session',
                enable_gift_wrap: isChecked ? 1 : 0
            },
            success: function(response) {
                // Check if we are on the modern checkout block page
                if ($('.wc-block-checkout').length > 0) {
                    // Reload page to reflect fee addition in the block total
                    window.location.reload();
                } else {
                    // Update order totals for classic checkout
                    $('body').trigger('update_checkout');
                }
            }
        });
    });

    // Handle Gift Note textarea change/keyup (save automatically)
    var noteTimeout;
    $(document).on('keyup change', '#pscf_gift_note', function() {
        clearTimeout(noteTimeout);
        var noteValue = $(this).val();
        
        noteTimeout = setTimeout(function() {
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: 'pscf_update_gift_note_session',
                    gift_note: noteValue
                }
            });
        }, 800); // Debounce Ajax calls
    });

    // Dynamic update of Free Tester Progress Bar when WooCommerce Blocks Cart/Checkout updates
    $(document).ajaxComplete(function(event, xhr, settings) {
        if (settings.url && (settings.url.indexOf('wc/store/v1/cart') !== -1 || settings.url.indexOf('wc/store/cart') !== -1)) {
            // Cart has updated, fetch the fresh progress bar markup
            var isCheckoutPage = $('.wc-block-checkout').length > 0 || $('.woocommerce-checkout').length > 0;
            $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                    action: 'pscf_get_updated_progress_bar',
                    context: isCheckoutPage ? 'checkout' : 'cart'
                },
                success: function(html) {
                    if (html) {
                        $('.pscf-free-tester-wrapper').replaceWith(html);
                    }
                }
            });
        }
    });

    // Handle Free Tester select change
    $(document).on('change', '#pscf_selected_tester', function() {
        var selectedVal = $(this).val();
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'pscf_update_tester_selection',
                selected_tester: selectedVal
            }
        });
    });

    // FAQ Accordion Trigger
    $(document).on('click', '.pscf-faq-trigger', function() {
        var $item = $(this).closest('.pscf-faq-item');
        var $content = $item.find('.pscf-faq-content');
        
        // Close other open items
        $('.pscf-faq-item').not($item).removeClass('active').find('.pscf-faq-content').css('max-height', '0');
        
        // Toggle active class on item
        $item.toggleClass('active');
        
        // Slide toggle content
        if ($item.hasClass('active')) {
            $content.css('max-height', $content[0].scrollHeight + 'px');
        } else {
            $content.css('max-height', '0');
        }
    });

    // Testimonials Slider Logic
    var $slider = $('.pscf-testimonials-slider');
    if ($slider.length > 0) {
        var $cards = $slider.find('.pscf-testimonial-card');
        var $dotsContainer = $('.pscf-slider-dots');
        
        // Generate dots
        $cards.each(function(index) {
            $dotsContainer.append('<span class="pscf-slider-dot' + (index === 0 ? ' active' : '') + '" data-index="' + index + '"></span>');
        });
        
        var $dots = $dotsContainer.find('.pscf-slider-dot');
        
        function updateActiveDot() {
            var scrollLeft = $slider.scrollLeft();
            var cardWidth = $cards.first().outerWidth(true);
            var activeIndex = Math.round(scrollLeft / cardWidth);
            $dots.removeClass('active');
            $dots.eq(activeIndex).addClass('active');
        }
        
        // Scroll event on slider to update dots dynamically (with a tiny debounce)
        var scrollTimer;
        $slider.on('scroll', function() {
            clearTimeout(scrollTimer);
            scrollTimer = setTimeout(function() {
                updateActiveDot();
            }, 100);
        });
        
        // Dot click handler
        $(document).on('click', '.pscf-slider-dot', function() {
            var index = $(this).data('index');
            var cardWidth = $cards.first().outerWidth(true);
            $slider.animate({
                scrollLeft: index * cardWidth
            }, 400);
            $dots.removeClass('active');
            $(this).addClass('active');
        });
        
        // Arrow click handlers
        $(document).on('click', '.pscf-slider-arrow.prev-arrow', function() {
            var cardWidth = $cards.first().outerWidth(true);
            var newScroll = $slider.scrollLeft() - cardWidth;
            $slider.animate({
                scrollLeft: newScroll
            }, 400, function() {
                updateActiveDot();
            });
        });
        
        $(document).on('click', '.pscf-slider-arrow.next-arrow', function() {
            var cardWidth = $cards.first().outerWidth(true);
            var newScroll = $slider.scrollLeft() + cardWidth;
            $slider.animate({
                scrollLeft: newScroll
            }, 400, function() {
                updateActiveDot();
            });
        });
    }
});

