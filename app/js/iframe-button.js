(function(){
    tinymce.create('tinymce.plugins.iframe', {
        init: function(ed, url){
            ed.addButton('iframe', {
                title: 'Iframe',
                cmd: 'iframeBtnCmd',
                image: (url.split('/').slice(0, -1) ).join('/') + '/img/iframe-button.png'
            });
            ed.addCommand('iframeBtnCmd', function(){
                var selectedText = ed.selection.getContent({format: 'html'});
                var win = ed.windowManager.open({
                    title: 'Paste iframe',
                    body: [
                        {
                            type: 'textbox',
                            name: 'content',
                            label: 'Iframe',
                            minWidth: 500,
                            multiline:true,
                            value: ''
                        }
                    ],
                    buttons: [
                        {
                            text: "Ok",
                            subtype: "primary",
                            onclick: function() {
                                win.submit();
                            }
                        },
                        {
                            text: "Cancel",
                            onclick: function() {
                                win.close();
                            }
                        }
                    ],
                    onsubmit: function(e){
                        var content = '';

                        if( e.data.content.length > 0 ) {
                            content = e.data.content;
                        }
                        ed.execCommand('mceInsertContent', 0, '[iframe]'+content+'[/iframe]');
                    }
                });
            });
        },
        getInfo: function() {
            return {
                longname : 'Iframe',
                author : 'HVH',
                authorurl : 'mailto:akumuliation@gmail.com',
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add( 'iframe', tinymce.plugins.iframe );
})();