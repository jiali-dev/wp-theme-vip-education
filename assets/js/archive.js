jQuery(function($) {

    $(document).on("click", ".filter_open", function() {
        $("#filter-sidebar").css("width", "320px");
    });
    
    $(document).on("click", ".closebtn", function() {
        $("#filter-sidebar").css("width", "0");
    });
      
});