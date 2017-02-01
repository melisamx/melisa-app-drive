Ext.define('Melisa.drive.view.desktop.upload.manager.BrowseButton', {
    extend: 'Ext.form.field.File',
    alias: 'widget.driveuploadbrowsebutton',
    
    initComponent: function() {
        
        var me = this;
        
        me.on({
            afterrender: me.onAfterRender,
            change: me.onChange,
            scope: me
        });
        
        me.callParent(arguments);
        
    },
    
    onChange: function(button, file) {
        
        var me = this,
            files = me.fileInputEl.dom.files;
        
        if( Ext.isString(button)) {
            return;
        }
        
        me.fireEvent('fileselected', me, files);
        
    },
    
    onAfterRender: function(button) {
        
        inputEl = button.fileInputEl;
        inputEl.dom.setAttribute('multiple', '1');
        
    }
    
});