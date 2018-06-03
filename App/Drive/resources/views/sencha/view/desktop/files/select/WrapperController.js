Ext.define('Melisa.drive.view.desktop.files.select.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.drivefilesselect',
    
    requires: [
        'Melisa.drive.view.desktop.BrowserDetails',
        'Melisa.drive.view.desktop.upload.manager.Wrapper'
    ],
    
    control: {
        '#wrapperDetails': {
            collapse: 'onCollapseWrapperDetails'
        },
        '#': {
            hide: 'onHide'
        }
    },
    
    config: {
        pitcher: null,
        pitcherListen: null,
        manager: null
    },
    
    mixins: {
        details: 'Melisa.drive.view.desktop.BrowserDetails'
    },
    
    onHide: function() {
        
        var me = this,
            manager = me.getManager();
    
        if( !manager) {
            return ;
        }
        
        manager.hide();
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
        
    },
    
    init: function() {
        
        var me = this,
            view = me.getView();
    
        view.on('loaddata', me.onLoadData, me);
        me.callParent();
        
    },
    
    onRender: function() {
        
        var me = this,
            vm = me.getViewModel(),
            grid = me.getView().down('grid');
        
        grid.filesView = vm.get('modules.filesView');
        grid.imagesView = vm.get('modules.imagesView');
        
    },
    
    onLoadData: function(module, eventListen, data, launcher) {
        
        var me = this,
            view = me.getView(),
            event = {
                cancel: false,
                data: data,
                launcher: launcher
            };
            
        if( view.fireEvent('beforeloaddata', data, event) === false || event.cancel) {
            me.log('cancel flow load data', event);
            return;
        }
        
        me.setPitcher(module);
        me.setPitcherListen(eventListen || 'fileselect');
        
        me.getViewModel().set(data);
        view.show(launcher || null);
        
    },
    
    onItemdblclick: function (gv, record) {
        
        var me = this,
            view = me.getView();
    
        console.log('hol');
        
    },
    
    select: function() {
        
        var me = this,
            view = me.getView(),
            selection = me.lookup('griBrowser').getSelection();
        
        if( Ext.isEmpty(selection)) {
            return;
        }
    
        view.close();        
        me.getPitcher().fireEvent(me.getPitcherListen(), selection, me);
        
    }
    
});