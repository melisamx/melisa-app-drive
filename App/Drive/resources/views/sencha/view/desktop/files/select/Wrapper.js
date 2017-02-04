Ext.define('Melisa.drive.view.desktop.files.select.Wrapper', {
    extend: 'Melisa.view.desktop.window.Modal',
    
    requires: [
        'Melisa.core.Module',
        'Melisa.view.desktop.window.Modal',
        'Melisa.drive.view.desktop.browser.Browser',
        'Melisa.drive.view.desktop.files.select.WrapperController'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    controller: 'drivefilesselect',
    cls: 'app-drive-browser',
    layout: 'border',
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
