Ext.define('Melisa.drive.view.phone.files.select.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.drivefilesselect',
    
    requires: [
        'Melisa.drive.view.phone.upload.manager.Wrapper'
    ],
    
    config: {
        pitcher: null,
        pitcherListen: null,
        manager: null
    },
    
    init: function() {
        
        var me = this,
            view = me.getView();
        
        view.on('loaddata', me.onLoadData, me);
        me.callParent();
        
    },
    
    onRender: function() {
        
        var me = this,
            view = me.getView(),
            vm = me.getViewModel(),
            itemTpl = view.down('drivebrowser').getItemTpl(),
            btnTakePhoto = me.lookup('btnTakePhoto'),
            input = btnTakePhoto.el.down('.x-input-el').dom;
    
        /* necesary calculate width images */
        itemTpl.imagesView = vm.get('modules.imagesView');
        itemTpl.width = window.innerWidth / 2;
        /* ratio 4:3 */
        itemTpl.height = Math.round((itemTpl.width/4)*3);
        
        vm.getStore('files').load();
        input.addEventListener('change', Ext.bind(me.onChangeFile, me));
        
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
        
    },
    
    onTapSelect: function() {
        
        var me = this,
            view = me.getView(),
            lisFiles = view.down('drivebrowser'),
            selection = lisFiles.getSelections();
        
        if( Ext.isEmpty(selection)) {
            return;
        }
        
        lisFiles.deselectAll();
        me.getPitcher().fireEvent(me.getPitcherListen(), selection, me);
        me.activateMainModule();
        
    },
    
    onTapTakePhoto: function() {
        
        var me = this,
            btnTakePhoto = me.lookup('btnTakePhoto'),
            input = btnTakePhoto.el.down('.x-input-el').dom;
        
        input.click();
        
    },
    
    onChangeFile: function(e) {
        
        var me = this,
            view = me.getView(),
            manager = me.createManager();
        
        manager.addFiles(e.target.files);
        view.add(manager);
        view.setActiveItem(manager);
        e.target.value = '';
        
    },
    
    onCloseManager: function() {
        
        var me = this;
        
        me.getView().setActiveItem(me.lookup('lisBrowser'));
        
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
                closemanager: me.onCloseManager,
                uploaditemsuccess: me.onUploadItemSuccess,
                scope: me
            }
        });
        manager.setLastModule(me.getView());        
        manager.getViewModel().set('token', me.getViewModel().get('token'));
        manager.getViewModel().set('title', 'Subiendo archivos');
        me.setManager(manager);
        return manager;
        
    },
    
    onUploadItemSuccess: function(info) {
       
        var me = this,
            store = me.getViewModel().getStore('files');
    
        store.insert(0, {
            id: info.data.idFile,
            name: info.data.name,
            mimeType: info.data.mimeType,
            size: info.data.size,
            fileExtension: info.data.fileExtension,
            lastUpload: 'Nuevas'
        });
        
        me.getView().setActiveItem(me.lookup('lisBrowser'));
        
    },
    
    onUploadAllFinish: function () {
        
        var me = this,
            store = me.getViewModel().getStore('files');
        
        store.currentPage = 1;
        /* no refresh store */
        
    }
    
});
