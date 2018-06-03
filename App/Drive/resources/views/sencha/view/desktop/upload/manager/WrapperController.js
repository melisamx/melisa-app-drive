Ext.define('Melisa.drive.view.desktop.upload.manager.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.driveuploadmanager',
    
    requires: [
        'Melisa.drive.ux.uploader.data.Connection',
        'Melisa.drive.ux.uploader.Queue',
        'Melisa.drive.ux.uploader.Manager'
    ],
    
    config: {
        manager: null
    },
    
    onShow: function() {        
        this.updateAling();        
    },
    
    updateAling: function() {
        
        var me = this,
            view = me.getView(),
            vm = me.getViewModel(),
            stoFiles = vm.getStore('files'),
            initHeight = 100,
            height = initHeight + (stoFiles.getCount() * 30),
            heightBody = Ext.getBody().getHeight() - 150;
        
        if( !view.isVisible()) {
            return;
        }
        
        if( height >= heightBody) {
            height = heightBody;
        }
        
        view.setHeight(height);
        view.alignTo(Ext.getBody(), 'br-br', [-24, -24]);
        view.toFront();
        
    },
    
    createManage: function() {
        
        var me = this,
            vm = me.getViewModel(),
            manager = me.getManager();
    
        if( manager) {
            return manager;
        }
        
        manager = Ext.create('Melisa.drive.ux.uploader.Manager', {
            uploaderOptions: {
                url: '/drive.php/files/',
                headers: {
                    'X-CSRF-TOKEN': vm.get('token')
                }
            },
            listeners: {
                fileadd: me.onFileAdd,
                fileprogress: me.onFileProgress,
                uploadallfinish: me.onUploadAllFinish,
                scope: me
            }
        });
        
        me.setManager(manager);
        return manager;
        
    },
    
    onUploadAllFinish: function() {
        
        var me = this;
        
        me.getView().fireEvent('uploadallfinish');
        
    },
    
    onFileProgress: function(item) {
        
        var me = this,
            vm = me.getViewModel(),
            stoFiles = vm.getStore('files'),
            index = stoFiles.findExact('name', item.getName()),
            record = stoFiles.getAt(index);
        
        if( !record) {
            console.log('no exist in grid');
            return;
        }
        
        record.set('progress', item.getProgressPercent());
        record.save();
        
    },
    
    onFileAdd: function(fileObject) {
        
        var me = this,
            vm = me.getViewModel(),
            stoFiles = vm.getStore('files');
        
        stoFiles.insert(0, {
            type: fileObject.getType(),
            name: fileObject.getName(),
            size: fileObject.getSize(),
            progress: 0,
            fileObject: fileObject
        });
        
    },
    
    addFiles: function(files, idFileParent) {        
        var me = this,
            manage = me.createManage();
        
        manage.addFiles(files, idFileParent);            
    },
    
    onAddFileUpload: function(store, record) {
        
        var me = this,
            total = this.getStore('files').getCount();
        
        me.updateAling();
        me.getViewModel().set('title', 
            'Subiendo ' + 
            total + 
            ' elemento' +
            ( total > 1 ? 's' : ''  )
        );
        
    }
    
});
