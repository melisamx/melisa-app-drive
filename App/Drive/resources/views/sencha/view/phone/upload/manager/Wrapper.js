Ext.define('Melisa.drive.view.phone.upload.manager.Wrapper', {
    extend: 'Ext.Container',
    alias: 'widget.driveuploadmanager',
    
    requires: [
        'Melisa.core.Module',
        'Melisa.drive.view.phone.upload.manager.WrapperController',
        'Melisa.drive.view.phone.upload.manager.List',
        'Melisa.drive.view.universal.upload.manager.WrapperModel',
        'Melisa.drive.view.phone.upload.manager.titles.Main'
    ],
    
    mixins: [
        'Melisa.core.Module'
    ],
    
    controller: 'driveuploadmanager',
    layout: 'card',
    viewModel: {
        type: 'driveuploadmanager'
    },
    items: [
        {
            xtype: 'driveuploadmanagertitlemain'
        },
        {
            xtype: 'driveuploadmanagergrid'
        }
    ],    
    addFiles: function(files) {
        this.getController().addFiles(files);
    }
});
