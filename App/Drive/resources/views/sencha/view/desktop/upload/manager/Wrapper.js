Ext.define('Melisa.drive.view.desktop.upload.manager.Wrapper', {
    extend: 'Ext.window.Window',
    alias: 'widget.driveuploadmanager',
    
    requires: [
        'Melisa.drive.view.desktop.upload.manager.WrapperController',
        'Melisa.drive.view.desktop.upload.manager.Grid',
        'Melisa.drive.view.universal.upload.manager.WrapperModel'
    ],
    
    closeAction: 'hide',
    defaultAlign: 'br-br',
    controller: 'driveuploadmanager',
    width: '35%',
    height: 100,
    collapsible: true,
    draggable: false,
    layout: 'fit',
    viewModel: {
        type: 'driveuploadmanager'
    },
    bind: {
        title: '{title}'
    },
    items: [
        {
            xtype: 'driveuploadmanagergrid'
        }
    ],
    listeners: {
        show: 'onShow'
    },
    
    addFiles: function(files) {
        this.getController().addFiles(files);
    }
});
