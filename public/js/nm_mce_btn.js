(function() {
    tinymce.PluginManager.add('nm_fontawesome_btn', function( editor, url ) {

        var items = [];
        jQuery.getJSON( "/wp-content/plugins/nm-font-awesome/public/metadata/icons5-5-0.json", function( data ) {

            jQuery.each( data, function( key, val ) {
                jQuery.each( val.styles, function( i, val2 ) {
                    var style = '';
                    if (val2 === "solid") {
                        style = 'fas';
                    } else if (val2 === "regular") {
                        style = 'far';
                    } else {
                        style = 'fab';
                    }
                    icon = {};
                    icon['text'] = val.label;
                    icon['styles'] = val2;
                    icon['icon'] = 'nm ' + style + ' fa-' + key
                    icon['onclick'] = function() {editor.insertContent('[nm_fa name="' + style + ' fa-' + key + '"]');}

                    items.push( icon );
                });


            });
        });

        editor.addButton( 'nm_fontawesome_btn', {
            text: 'Font Awesome',
            icon: 'nm fab fa-font-awesome-flag',
            type: 'menubutton',
            menu: items
        });
    });
})();
