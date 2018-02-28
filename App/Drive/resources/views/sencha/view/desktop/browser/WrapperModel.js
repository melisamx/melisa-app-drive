Ext.define('Melisa.drive.view.desktop.browser.WrapperModel', {
    extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.drivebrowser',
    
    stores: {
        files: {
            autoLoad: true,
            remoteFilter: true,
            remoteSort: true,
            proxy: {
                type: 'ajax',
                url: '{modules.files}',
                reader: {
                    type: 'json',
                    rootProperty: 'data'
                }
            }
        },
        breadcrumb: Ext.create('Ext.data.TreeStore', {
            root: {
                text: 'Mi unidad',
                expanded: true,
                iconCls: 'x-fa fa-hdd-o'
            }
        })
    }
    
});
