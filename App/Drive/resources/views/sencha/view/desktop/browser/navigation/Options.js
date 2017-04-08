Ext.define('Melisa.drive.view.desktop.browser.navigation.Options', {
    extend: 'Ext.panel.Panel',
    alias: 'widget.drivebrowsernavigationoptions',
    
    cls: 'navigation-options',
    layout: {
        type: 'vbox',
        align: 'stretch'
    },
    defaults: {
        xtype: 'button',
        textAlign: 'left',
        enableToggle: true,
        toggleGroup: 'options',
        cls: 'option',
        height: 40
    },
    items: [
        {
            text: 'Mi unidad',
            iconCls: 'x-fa fa-hdd-o'
        },
        {
            text: 'Compartidos conmigo',
            iconCls: 'x-fa fa-users'
        },
        {
            text: 'Recientes',
            iconCls: 'x-fa fa-clock-o'
        },
        {
            text: 'Destacados',
            iconCls: 'x-fa fa-star'
        },
        {
            text: 'Papelera',
            iconCls: 'x-fa fa-trash'
        }
    ]
    
});
