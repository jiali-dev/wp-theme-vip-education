jQuery(function ($) {
  "use strict";

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
      success: function (data) {
        posts_container.html(data.data);
      },
      error: function (error) {},
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
      success: function (data) {
        $('.found-posts').text(data.found_posts);
        archive_container.html(data.data);
      },
      error: function (error) {},
      complete: function () {
        archive_container.css("opacity", 1);
      },
    });
  });
});
