Ext.define('Melisa.drive.view.desktop.files.select.WrapperController', {
    extend: 'Melisa.core.ViewController',
    alias: 'controller.drivefilesselect',
    
    config: {
        pitcher: null,
        pitcherListen: null
    },
    
    init: function() {
        
        var me = this,
            view = me.getView();
        
        view.on('loaddata', me.onLoadData, me);
                
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
    
        view.close();
        
        me.getPitcher().fireEvent(me.getPitcherListen(), record, me);
        
    }
    
});