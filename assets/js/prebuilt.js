(function($) {
    'use strict';
    
    $(document).ready(function() {
        $('#dashvio-demo-search').on('input', function() {
            var searchTerm = $(this).val().toLowerCase();
            filterDemos(searchTerm);
        });
    });
    
    function filterDemos(searchTerm) {
        $('.dashvio-prebuilt-demo').each(function() {
            var $demo = $(this);
            var demoName = $demo.find('.dashvio-prebuilt-demo-name').text().toLowerCase();
            var demoDescription = $demo.find('.dashvio-prebuilt-demo-description').text().toLowerCase();
            
            if (demoName.indexOf(searchTerm) !== -1 || demoDescription.indexOf(searchTerm) !== -1) {
                $demo.show();
            } else {
                $demo.hide();
            }
        });
    }
    
})(jQuery);

