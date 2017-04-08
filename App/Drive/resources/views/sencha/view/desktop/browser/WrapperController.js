Ext.define('Melisa.drive.view.desktop.browser.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.drivebrowser',
    
    requires: [
        'Melisa.drive.view.desktop.upload.manager.Wrapper'
    ],
    
    config: {
        manager: null
    },
    
    
    onRender: function() {
        
        var me = this,
            vm = me.getViewModel(),
            grid = me.getView().down('drivebrowser');
        
        me.callParent();
        
        grid.filesView = vm.get('modules.filesView');
        grid.imagesView = vm.get('modules.imagesView');
        
    },
    
    onItemdblclickFile: function (gv, record) {
        
        var me = this,
            vm = me.getViewModel(),
            url = vm.get('modules.filesView') + record.get('id') + '/',
            win = window.open(url, '_blank');
    
        win.focus();
        
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
        
        manager = Ext.create('widget.driveuploadmanager', {
            listeners: {
                uploadallfinish: me.onUploadAllFinish,
                scope: me
            }
        });
        manager.getViewModel().set('token', me.getViewModel().get('token'));
        me.setManager(manager);
        return manager;
        
    },
    
    onUploadAllFinish: function () {
        console.log('onUploadAllFinish');
        this.getViewModel().getStore('files').load();
        
    }
    
});
