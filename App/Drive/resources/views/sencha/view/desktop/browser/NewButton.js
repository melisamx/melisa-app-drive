Ext.define('Melisa.drive.view.desktop.browser.NewButton', {
    extend: 'Ext.button.Split',
    alias: 'widget.drivebrowserbuttonnew',
    
    cls: 'button-new',
    text: 'Nuevo',
    plain: true,
    arrowVisible: false,
    flex: 1,
    margin: '0 18',
    menu: {
        xtype: 'menu',
        cls: 'button-new-menu',
        items: [
            {
                text: 'Carpeta nueva...',
                iconCls: 'x-fa fa-folder'
            },
            {
                text: 'Subir archivo',
                iconCls: 'x-fa fa-upload'
            },
            '-',
            {
                text: 'Documentos de Melisa',
                iconCls: 'x-fa fa-file-text'
            }
        ]
    },
    handler: function() {
        this.showMenu();
    }
});