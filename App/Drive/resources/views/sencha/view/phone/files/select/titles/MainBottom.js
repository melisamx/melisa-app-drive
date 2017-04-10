Ext.define('Melisa.drive.view.phone.files.select.titles.MainBottom', {
    extend: 'Ext.Toolbar',
    alias: 'widget.drivefilesselecttitlemainbottom',
    
    hideAnimation: 'fadeOut',
    docked: 'bottom',
    layout: 'hbox',
    showAnimation: 'fadeIn',
    publishes: [
        'hidden'
    ],
    items: [
        '->',
        {
            iconCls: 'x-fa fa-hand-o-up',
            iconAlign: 'left',
            text: 'Seleccionar',
            itemId: 'btnSelect',
            handler: 'onTapSelect'
        }
    ]
    
});
