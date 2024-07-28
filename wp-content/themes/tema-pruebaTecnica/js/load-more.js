jQuery(document).ready(function($) {
    var page = 1;

    $('#load-more').on('click', function() {
        page++;
        var data = {
            'action': 'load_more_flavours',
            'page': page
        };

        $.ajax({
            url: ajaxurl, // Esta variable es proporcionada automáticamente por WordPress
            type: 'post',
            data: data,
            success: function(response) {
                if (response) {
                    $('.flavours-grid').append(response);
                } else {
                    $('#load-more').hide();
                }
            }
        });
    });
});
