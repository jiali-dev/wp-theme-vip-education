(function() {
    tinymce.create('tinymce.plugins.vip_education_video', {
        init : function(editor, url) {
            editor.addButton('vip_education_video', {
                title : 'افزودن شورتکد ویدئو',
                image : url + '/video-50.png',
                onclick : function() {
                    editor.insertContent('[vip-education-video src="" poster=""]');
                }
            });
        }
    });
    tinymce.PluginManager.add('vip_education_video', tinymce.plugins.vip_education_video);
})();
