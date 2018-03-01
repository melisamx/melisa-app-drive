Ext.define('Melisa.drive.view.desktop.browser.WrapperController', {
    extend: 'Melisa.controller.View',
    alias: 'controller.drivebrowser',
    
    requires: [
        'Melisa.controller.View',
        'Melisa.drive.view.desktop.upload.manager.Wrapper',
        'Melisa.drive.view.desktop.folders.add.Wrapper'
    ],
    
    config: {
        manager: null,
        windowAddFolder: null,
        fileParent: null
    },
    
    storeReload: 'files',
    
    listen: {
        global: {
            'event.drive.folders.create.success': 'onUpdatedRecord'
        }
    },
    
    onClickAddFolder: function() {
        var me = this,
            winAddFolder = me.createWindowAddFolder();
        
        winAddFolder.show();
        winAddFolder.fireEvent('loaddata', {
            idFileParent: me.getFileParent()
        });
        winAddFolder.down('#txtName').focus();
    },
    
    createWindowAddFolder: function() {
        var me = this,
            vm = me.getViewModel(),
            winAddFolder = me.getWindowAddFolder();
    
        if( winAddFolder) {
            return winAddFolder;
        }
        
        winAddFolder = Ext.create('widget.driveFoldersAdd', {
            closeAction: 'hide',
            viewModel: {
                data: {
                    token: vm.get('token'),
                    modules: {
                        submit: vm.get('modules.folders')
                    },
                    wrapper: {
                        title: 'Agregar carpeta'
                    },
                    i18n: {
                        btnSave: 'Agregar carpeta',
                        success: 'Carpeta agregada'
                    }
                }
            }
        });
        winAddFolder.initModule();
        me.setWindowAddFolder(winAddFolder);
        return winAddFolder;
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
            stoBreadcrump = vm.getStore('breadcrumb'),
            parent = record.get('parent'),
            child;
    
        if( record.get('mimeType') !== 'application/vnd.melisa-apps.folder') {
            win = window.open(url, '_blank').focus();
            return;
        }     
        
        if( !parent) {
            child = stoBreadcrump.getRoot().appendChild({
                id: record.get('id'),
                left: false,
                text: record.get('name'),
                expanded: true
            });
        } else {
            var parentNode = stoBreadcrump.getNodeById(parent.idFileParent);
            
            child = parentNode.appendChild({
                id: record.get('id'),
                left: false,
                text: record.get('name'),
                expanded: true,
                parentId: parent.idFileParent
            });
        }
        
        me.getView().down('drivebrowsernavigationbreadcrumb').setSelection(child);
    },
    
    onSelectionChangeBreadcrumb: function(cmp, record) {
        var me = this,
            vm = me.getViewModel(),
            files = vm.getStore('files');
        
        if( !record) {
            return;
        }
        
        if( record.get('root')) {
            files.clearFilter();
            return;
        }
        
        vm.getStore('files').addFilter({
            id: 'parent',
            property: 'idFileParent',
            value: record.get('id')
        });
        me.setFileParent(record.get('id'));
    },
    
    onClickBtnUploadFile: function() {
        
        var me = this,
            btnBrowseUpload = me.lookup('btnBrowseUpload');
        
        btnBrowseUpload.fileInputEl.dom.click();
        
    },
    
    onFilesSelected: function(button, files) {
        
        var me = this,
            manager = me.createManager(),
            idFileParent = me.getFileParent();
        
        manager.addFiles(files, idFileParent);
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
