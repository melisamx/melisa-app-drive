Ext.define('Melisa.drive.view.desktop.upload.manager.Grid', {
    extend: 'Ext.grid.GridPanel',
    alias: 'widget.driveuploadmanagergrid',
    
    bind: {
        store: '{files}'
    },
    hideHeaders: true,
    columns: [
        {
            dataIndex : 'type',
            width: 60,
            align: 'center',
            renderer: function(value, cell, record) {
                
                var iconCls = 'x-fa fa fa-';
                
                switch (value) {
                    case 'image/jpeg':
                        iconCls += 'picture-o';
                        break;
                    case 'image/png':
                        iconCls += 'picture-o';
                        break;
                    case 'application/pdf':
                        iconCls += 'file-pdf-o';
                        break;
                    default:
                        iconCls += 'file';
                        break;
                }
                
                return [
                    '<i class="',
                    iconCls,
                    '"></i> '
                ].join('');
                
            }
        },
        {
            dataIndex : 'name',
            flex: 1
        },
        {
            dataIndex : 'progress',
            align: 'center',
            renderer: function(value, cell, record) {
                return value + ' %';
            }
        }
    ]
});
