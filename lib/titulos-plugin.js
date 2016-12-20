(function() {
    tinymce.create('tinymce.plugins.Wptuts', {
        init : function(ed, url) {
 
            ed.addButton('col_texto_izq', {
                title : 'Agrega formato encolumnado: texto/imagen',
                cmd : 'col_texto_izq',
                text : 'texto/imagen',
                icon : 'tablecellprops'
            });
            ed.addCommand('col_texto_izq', function() {
                var return_text = '<div class="row encolumnado">';
                return_text += '<div class="col-sm-6"><p>Texto</p></div>';
                return_text += '<div class="col-sm-6"><img src="/wp-content/themes/unacasa/dist/images/imagen-ejemplo.jpg" class="img-fluid wp-image-344" /></div>';
                return_text += '</div><p></p>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });

            ed.addButton('col_texto_der', {
                title : 'Agrega formato encolumnado: imagen/texto',
                cmd : 'col_texto_der',
                text : 'imagen/texto',
                icon : 'tablecellprops'
            });
            ed.addCommand('col_texto_der', function() {
                var return_text = '<div class="row encolumnado">';
                return_text += '<div class="col-sm-6 col-sm-push-6 bg-info"><p>Texto</p></div>';
                return_text += '<div class="col-sm-6 col-sm-pull-6"><img src="/wp-content/themes/unacasa/dist/images/imagen-ejemplo.jpg" class="img-fluid wp-image-344" /></div>';
                return_text += '</div><p></p>';
                ed.execCommand('mceInsertContent', 0, return_text);
            });
        },
        // ... Hidden code
    });
    // Register plugin
    tinymce.PluginManager.add( 'wptuts', tinymce.plugins.Wptuts );
})();