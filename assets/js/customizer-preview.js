( function( $ ) {

    // Update the site background color in real-time...
    wp.customize( 'background_color', function( value ) {
        value.bind( function( newval ) {
            $('body').css('background-color', newval );
        } );
    } );

} )( jQuery );
