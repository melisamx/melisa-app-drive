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
//                    '<span class="fa-stack fa-lg">',
                        '<i class="fa fa-circle fa-stack-2x"></i>',
                        '<i class="',
                        record.data.iconCls,
                        '"></i> ',
                        '<span class="text">',
                            value,
                        '</span>'
//                    '</span>'
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
            decimalPrecision: 2,
            decimalSeparation: ',',
            thousandSeparation: '.'
//            format: '0,000.00'
        }
    ],
    bbar: {
        xtype: 'pagingtoolbar',
        displayInfo: true
    },
    plugins: [
        {
            ptype: 'autofilters',
            filters: {
                name: {
                    operator: 'like'
                },
                size: {
                    operator: 'like'
                }
            },
            filtersIgnore: [
                'createdAt',
                'updatedAt'
            ]
        }
    ]
    
});
