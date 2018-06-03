Ext.define('Melisa.drive.view.phone.upload.manager.titles.Main', {
    extend: 'Ext.Toolbar',
    alias: 'widget.driveuploadmanagertitlemain',
    
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
                tap: 'onTapClose'
            },
            bind: {
                text: '{title}'
            }
        }
    ]
    
});
