Ext.define('Melisa.drive.view.desktop.browser.Browser', {
    extend: 'Ext.grid.Panel',
    alias: 'widget.drivebrowser',
    
    requires: [
        'Melisa.ux.grid.Filters'
    ],

    cls: 'browser',
    bind: {
        store: '{files}'
    },
    columns: [
        {
            text: 'Nombre',
            dataIndex: 'name',
            flex: 1,
            renderer: function(value, cell, record) {
                
                var me = this,
                    imagesView = me.imagesView;
                
                if( record.data.mimeType.indexOf('image') !== -1) {
                    
                    return [
                        '<img class="preview" src="' + imagesView,
                            record.data.id,
                            '/32/32/" />',
                        '<span class="text">',
                            value,
                        '</span>'
                    ].join('');
                
                }
                
                return [
                    '<i class="fa fa-circle fa-stack-2x"></i>',
                    '<i class="',
                    record.data.iconCls,
                    '"></i> ',
                    '<span class="text">',
                        value,
                    '</span>'
                ].join('');
                
            }
        },
//        {
//            text: 'Propietario', 
//            dataIndex: 'property',
//            flex: 1
//        },
        {
            text: 'Ultima modificación',
            dataIndex: 'updatedAt',
            align: 'center',
            width: 170
        },
        {
            xtype: 'numbercolumn',
            text: 'Tamaño', 
            dataIndex: 'size',
            align: 'center',
            width: 100,
            renderer: Ext.util.Format.fileSize
        }
    ],
    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true
    }
    
});
