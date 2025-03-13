(function () {
  tinymce.create("tinymce.plugins.jve_custom_buttons", {
    init: function (editor, url) {
      editor.addButton("jve_custom_buttons", {
        text: "افزودن شورتکدها",
        type: "menubutton",
        menu: [
          {
            text: "شورتکد نقل قول",
            icon: "blockquote",
            onclick: function () {
              editor.insertContent(
                '[vip-education-quote quote="" quote-owner=""]'
              );
            },
          },
          {
            text: "شورتکد ویدئو",
            icon: "link",
            onclick: function () {
              editor.insertContent('[vip-education-video src="" poster=""]');
            },
          },
        ],
      });
    },
  });
  tinymce.PluginManager.add(
    "jve_custom_buttons",
    tinymce.plugins.jve_custom_buttons
  );
})();
