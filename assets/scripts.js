jQuery(document).ready(function ($) {

    if ($('.sticky-menu').length) {
        let count = 1,
            elements = $('.sticky-menu__elements');

        $('h2').each(function () {
            elements.append('<li class="sticky-menu-element">' + count + '. ' + $(this).html() + '</li>');
            count++;
        });
    }

});