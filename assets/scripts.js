jQuery(document).ready(function ($) {

    if ($('.sticky-menu').length) {
        let elements = $('.sticky-menu__elements'),
            count = 1,
            positionSticks = [],
            canScroll = true;

        $('*[data-stick="true"]').each(function () {
            let that = $(this),
                lnkText = that.html();

            if (undefined !== that.data('sm_title')) {
                lnkText = that.data('sm_title');
            }

            elements.append('<li class="sticky-menu-element" data-sm_to="' + count + '" >' + lnkText + '</li>');
            that.attr('data-sm_ancor', count);
            positionSticks.push([count, that.offset().top]);
            count++;
        });

        $(window).scroll(function () {
            if (!canScroll) {
                return false;
            }

            let windowTop = $(window).scrollTop(),
                windowsBot = $(window).scrollTop()  + $(window).height() / 6;

            for (let i = 0; i < positionSticks.length; i++) {

                if (windowsBot < positionSticks[i][1]) {
                    return false;
                }

                $('.sm-active').removeClass('sm-active');
                $('.sticky-menu-element[data-sm_to="' + positionSticks[i][0] + '"]').addClass('sm-active');
            }
        });

        $('body').on('click', '.sticky-menu-element', function (e) {
            let that = $(this),
                goTo = $('*[data-sm_ancor="' + that.data('sm_to') + '"]'),
                letMarginTop = 0,
                adminBar = $('#wpadminbar');

            if (goTo.length) {
                $('.sm-active').removeClass('sm-active');
                that.addClass('sm-active');

                if (adminBar.length) {
                    letMarginTop = adminBar.height();
                }

                canScroll = false;
                $('html,body').animate({
                    scrollTop: goTo.offset().top - letMarginTop
                }, 'slow', function () {
                    canScroll = true;
                });
            }
        });
    }

});