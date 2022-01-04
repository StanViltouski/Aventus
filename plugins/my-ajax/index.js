jQuery(document).ready(function ($) {

    var $section = $('.estate .estate_content');

    $('.sidebar_list a').click(function(e) {
        e.preventDefault();

        var linkCat = $(this).attr('href');
        sendRequest(linkCat);
    });



    function sendRequest(linkCat) {
        $section.animate({opacity: 0.5}, 300);

        $.post(
            url.ajaxurl,
            {
                action: 'get_cat',
                link: linkCat
            },
            function (response) {
                $section
                    .html(response)
                    .animate({opacity: 1}, 300);
            });
    }
});

