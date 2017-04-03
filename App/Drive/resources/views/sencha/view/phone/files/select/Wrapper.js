Ext.define('Melisa.drive.view.phone.files.select.Wrapper', {
    extend: 'Ext.dataview.List',
    
    requires: [
        'Melisa.core.Module',
        'Melisa.view.desktop.window.Modal',
        'Melisa.drive.view.phone.browser.Browser',
        'Melisa.drive.view.phone.files.select.WrapperController'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    controller: 'drivefilesselect',
    cls: 'app-drive-browser',
    layout: 'border',
    bodyPadding: 0,
    bind: {
        title: '{wrapper.title}'
    },
    viewModel: {
        stores: {
            files: {
                autoLoad: true,
                remoteFilter: true,
                proxy: {
                    type: 'ajax',
                    url: '{modules.files}',
                    reader: {
                        type: 'json',
                        rootProperty: 'data'
                    }
                }
            }
        }
    },
    items: [
        {
            region: 'center',
            xtype: 'drivebrowser',
            listeners: {
                itemdblclick: 'onItemdblclick'
            }
        }
    ]
    
});
