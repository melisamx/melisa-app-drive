Ext.define('Melisa.drive.view.desktop.folders.add.Wrapper', {
    extend: 'Melisa.view.desktop.wrapper.window.Add',
    alias: 'widget.driveFoldersAdd',
    
    requires: [
        'Melisa.view.desktop.wrapper.window.Add',
        'Melisa.controller.Create'
    ],
    
    controller: {
        type: 'create',
        eventSuccess: 'event.drive.folders.create.success',
        onLoadData: function(e) {
            this.getView().down('#txtIdFileParent').setValue(e.idFileParent);
        }
    },
    defaultFocus: 'txtName',
    width: 500,
    height: 250,
    layout: 'fit',
    title: {
        bind: '{wrapper.title}'
    },
    items: [
        {
            xtype: 'form',
            items: [
                {
                    xtype: 'textfield',
                    fieldLabel: 'Nombre de la carpeta',
                    itemId: 'txtName',
                    anchor: '100%',
                    allowBlank: false,
                    name: 'name'
                },
                {
                    xtype: 'textfield',
                    itemId: 'txtIdFileParent',
                    hidden: true,
                    name: 'idFileParent'
                }
            ]
        }
    ],
    listeners: {
        loaddata: 'onLoadData'
    }
    
});