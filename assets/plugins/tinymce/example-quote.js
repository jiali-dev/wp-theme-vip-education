// This is just for example and not connected to project, it's just for another type of adding custom button
(function () {
  tinymce.create("tinymce.plugins.jve_quote", {
    init: function (editor, url) {
      editor.addButton("jve_quote", {
        title: "افزودن شورتکد نقل قول",
        image: url + "/quote-50.png",
        onclick: function () {
          editor.insertContent('[vip-education-quote quote="" quote-owner=""]');
        },
      });
    },
  });
  tinymce.PluginManager.add("jve_quote", tinymce.plugins.jve_quote);
})();
