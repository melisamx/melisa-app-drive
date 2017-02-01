Ext.define('Melisa.drive.view.desktop.browser.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.drivebrowser',
    
    requires: [
        'Melisa.drive.view.desktop.upload.manager.Wrapper'
    ],
    
    config: {
        manager: null
    },
    
    onClickBtnUploadFile: function() {
        
        var me = this,
            btnBrowseUpload = me.lookup('btnBrowseUpload');
        
        btnBrowseUpload.fileInputEl.dom.click();
        
    },
    
    onFilesSelected: function(button, files) {
        
        var me = this,
            manager = me.createManager();
        
        manager.addFiles(files);
        manager.show();
        
    },
    
    createManager: function() {
        
        var me = this,
            manager = me.getManager();
    
        if( manager) {
            return manager;
        }
        
        manager = Ext.create('widget.driveuploadmanager');
        manager.getViewModel().set('token', me.getViewModel().get('token'));
        me.setManager(manager);
        return manager;
        
    }
    
});
