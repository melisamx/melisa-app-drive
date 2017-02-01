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
        {
            text: 'Propietario', 
            dataIndex: 'property',
            flex: 1
        },
        {
            text: 'Ultima modificación',
            dataIndex: 'updatedAt'
        },
        {
            xtype: 'numbercolumn',
            text: 'Tamaño del archivo', 
            dataIndex: 'size',
            renderer: Ext.util.Format.fileSize
        }
    ],
    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true
    }
    
});
