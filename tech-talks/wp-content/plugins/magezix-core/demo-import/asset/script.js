(function ($) {
    "use strict"; // Start of use strict
        $(document).ready(function() {
            $('.ocdi__button').click(function(e){
                $('#wpwrap').addClass('open');
                e.preventDefault();
            });    

            $('.tx-close').click(function(e){
                $('#wpwrap').removeClass('open');
            });
        });    
})(jQuery);
