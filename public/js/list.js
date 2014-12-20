$(function() {
    $('#filter a').on('click', function(e) {
        e.preventDefault();
        var clicked = $.trim( $(this).text().toLowerCase() );
        if ( clicked == 'all' ) {
            $('#one, #two, #three').show();
        }else{
            $('#one, #two, #three').hide();
            $('#' + clicked).show();
        }

        $(this).closest('li')
               .addClass('current')
               .siblings()
               .removeClass('current');
    });
});