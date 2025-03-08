(function() {
    tinymce.create('tinymce.plugins.vip_education_quote', {
        init : function(editor, url) {
            editor.addButton('vip_education_quote', {
                title : 'افزودن شورتکد نقل قول',
                image : url + '/quote-50.png',
                onclick : function() {
                    editor.insertContent('[vip-education-quote quote="" quote-owner=""]');
                }
            });
        }
    });
    tinymce.PluginManager.add('vip_education_quote', tinymce.plugins.vip_education_quote);
})();
