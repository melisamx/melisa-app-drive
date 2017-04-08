Ext.define('Melisa.drive.view.universal.upload.manager.WrapperModel', {
    extend: 'Ext.app.ViewModel',
    alias: 'viewmodel.driveuploadmanager',
    
    stores: {
        files: {
            listeners: {
                add: 'onAddFileUpload'
            }
        }
    },
    data: {
        title: 'Subiendo 1 elemento'
    }
});
