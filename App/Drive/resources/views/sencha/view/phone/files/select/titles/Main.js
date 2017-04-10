Ext.define('Melisa.drive.view.phone.files.select.titles.Main', {
    extend: 'Ext.Toolbar',
    alias: 'widget.drivefilesselecttitlemain',
    reference: 'titMain',
    
    requires: [
        'Melisa.ux.field.Search'
    ],    
    
    hideAnimation: 'fadeOut',
    docked: 'top',
    layout: 'hbox',
    showAnimation: 'fadeIn',
    publishes: [
        'hidden'
    ],
    items: [
        {
            iconCls: 'x-fa fa fa-chevron-left',
            listeners: {
                tap: 'activateMainModule'
            },
            bind: {
                text: '{wrapper.title}'
            }
        },
        {
            xtype: 'spacer'
        },
        {
            iconCls: 'x-fa fa-camera',
            handler: 'onTapTakePhoto'
        },
        {
            xtype: 'filefield',
            reference: 'btnTakePhoto',
            iconCls: 'x-fa fa-camera',
            name: 'photo',
            accept: 'image',
            capture: 'camera',
            hidden: true              
        }
    ]
    
});
