jQuery(function ($) {
  "use strict";
  let paged = 1;

  $(".filter-posts").on("change", function () {
    // Get current element
    let el = $(this);

    // Find the closest container
    var container = $(this).closest(".container");

    // Find the related posts-container inside that container
    var posts_container = container.find(".posts-container");

    // Get post type
    let post_type = el.data("post-type");

    // Get action
    let action = el.find("option:selected").val();

    $.ajaxSetup({ cache: false });

    $.ajax({
      type: "POST",
      url: jve_ajax.ajaxurl,
      data: {
        nonce: jve_ajax.nonce,
        post_type: post_type,
        action: `jve_get_${action}_posts_ajax`,
      },
      beforeSend: function () {
        posts_container.css("opacity", 0.3);
      },
      error: function (xhr) {
        Notiflix.Notify.failure(xhr.responseJSON.message);
      },
      success: function (response) {
        posts_container.html(response.data);
      },
      complete: function () {
        posts_container.css("opacity", 1);
      },
    });
  });

  $("#archive-filter").on("submit", function(e) {

    e.preventDefault();

    // Get current element
    let el = $(this);

    // Posts contaniner
    let archive_container = $('.archive-posts');

    // Get Tax
    let cats_array = [];
    el.find('.tax[data-tax=category]:checked').each(function() {
        cats_array.push($(this).val());
    });

    let tech_cats_array = [];
    el.find('.tax[data-tax=technology_category]:checked').each(function() {
      tech_cats_array.push($(this).val());
    });

    // Get Author
    let authors_array = [];
    el.find('.author:checked').each(function() {
      authors_array.push($(this).val());
    });

    // Get Entity
    let entity = el.find('.entity:checked').val();

    $.ajaxSetup({ cache: false });

    $.ajax({
      type: "POST",
      url: jve_ajax.ajaxurl,
      data: {
        nonce: jve_ajax.nonce,
        cats_array : cats_array,
        tech_cats_array : tech_cats_array,
        authors_array : authors_array,
        entity : entity,
        action: `jve_get_archive_filtered_posts_ajax`,
      },
      beforeSend: function () {
        archive_container.css("opacity", 0.3);
      },
      error: function (xhr) {
        Notiflix.Notify.failure(xhr.responseJSON.message);
      },
      success: function (response) {
        $('.found-posts').text(response.found_posts);
        archive_container.html(response.data);
        paged = 1;
        if( response.max_num_pages > paged  ) {
          $('.ajax-load-more').show();
        }
      },
      complete: function () {
        archive_container.css("opacity", 1);
        $('.pagination').hide();
        $('.closebtn').click();
      },
    });
  });

  $(".ajax-load-more .btn-loader").on("click", function() {
    
    paged++;

    // Get current element
    let el = $('#archive-filter');

    // Posts contaniner
    let archive_container = $('.archive-posts');

    // Get Tax
    let cats_array = [];
    el.find('.tax[data-tax=category]:checked').each(function() {
        cats_array.push($(this).val());
    });

    let tech_cats_array = [];
    el.find('.tax[data-tax=technology_category]:checked').each(function() {
      tech_cats_array.push($(this).val());
    });

    // Get Author
    let authors_array = [];
    el.find('.author:checked').each(function() {
      authors_array.push($(this).val());
    });

    // Get Entity
    let entity = el.find('.entity:checked').val();

    $.ajaxSetup({ cache: false });

    $.ajax({
      type: "POST",
      url: jve_ajax.ajaxurl,
      data: {
        nonce: jve_ajax.nonce,
        cats_array : cats_array,
        tech_cats_array : tech_cats_array,
        authors_array : authors_array,
        entity : entity,
        paged: paged,
        action: `jve_get_archive_filtered_posts_ajax`,
      },
      beforeSend: function () {
        archive_container.css("opacity", 0.3);
      },
      error: function (xhr) {
        Notiflix.Notify.failure(xhr.responseJSON.message);
      },
      success: function (response) {
        $('.found-posts').text(response.found_posts);
        archive_container.append(response.data);
        if( paged >= response.max_num_pages ) {
          $('.ajax-load-more').hide();
        }
      },
      complete: function () {
        archive_container.css("opacity", 1);
      },
    });
  });

  $(".contact-form").on("submit", function(e) {

    e.preventDefault(); // Prevent default form submission
       
    var form = $(this);
    var form_data = $(this).serialize(); // Serialize form data // Serialize form data // Create FormData object

    $.ajaxSetup({ cache: false });

    $.ajax({
      type: "POST",
      url: jve_ajax.ajaxurl,
      data: {
        form_data: form_data,
        nonce: jve_ajax.nonce,
        action: `jve_contact_ajax`,
      },
      beforeSend: function () { 
        $('.send-message-spinner').show();
        $('.send-message-btn').prop("disabled", true);;
      },
      success: function (response) {
        Notiflix.Notify.success(response.message);
      },
      error: function (xhr) {
        Notiflix.Notify.failure(xhr.responseJSON.message);
      },
      complete: function () {
        $('.send-message-spinner').hide();
        $('.send-message-btn').prop("disabled", false);
        $(form).trigger("reset");
      },
    });
  });
});
