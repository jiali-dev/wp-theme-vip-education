jQuery(function($) {
    "use strict";

	$('.filter-posts').on('change', function(){
        
        // Get current element
        let el = $(this);

        // Find the closest container
        var container = $(this).closest(".container");

        // Find the related posts-container inside that container
        var posts_container = container.find(".posts-container");

        // Get post type
        let post_type = el.data('post-type');

        // Get action
        let action = el.find('option:selected').val();

        $.ajaxSetup({cache: false});

        $.ajax({
            type: 'POST',
            url: jve_ajax.ajaxurl,
            data: {
                nonce:  jve_ajax.nonce,
                post_type: post_type,
                action: `jve_get_${action}_posts_ajax`
            },
            beforeSend: function() {

            },
            success: function(data) {

                posts_container.html(data.data)
            },
            error: function() {

            },
            complete: function() {

            },
        })

    })
	
});