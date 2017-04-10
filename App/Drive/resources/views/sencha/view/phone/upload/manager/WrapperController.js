Ext.define('Melisa.drive.view.phone.upload.manager.WrapperController', {
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
    
    onTapClose: function() {
        
        this.getView().fireEvent('closemanager', this);
        
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
                uploaditemsuccess: me.onUploadItemSucccess,
                scope: me
            }
        });
        
        me.setManager(manager);
        return manager;
        
    },
    
    onUploadItemSucccess: function(info) {
        
        var me = this;
        
        me.getView().fireEvent('uploaditemsuccess', info);
        
    },
    
    onUploadAllFinish: function(info) {
        
        var me = this;
        
        me.getView().fireEvent('uploadallfinish', info);
        
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
    
    addFiles: function(files) {        
        
        var me = this,
            manage = me.createManage();
        
        manage.addFiles(files);
            
    },
    
    onAddFileUpload: function(store, record) {
        
        var me = this,
            total = this.getStore('files').getCount();
        
        me.getViewModel().set('title', 
            'Subiendo ' + 
            total + 
            ' elemento' +
            ( total > 1 ? 's' : ''  )
        );
        
    }
    
});
