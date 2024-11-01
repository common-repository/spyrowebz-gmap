
(function($) {
var google_map_address = $('#address').text();
   
// Google maps
jQuery(function ($) {
    
    $('#gmap').gmap3({
        marker: {
            address: google_map_address 
        },
        map: {
            options: {
                zoom: 14
            }
        }
    });
});
})(jQuery);
